<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/send-emails.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$data = json_decode((string) file_get_contents('php://input'));
if (!$data || ($data->action ?? '') !== 'contactUs') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$name = trim((string) ($data->name ?? ''));
$email = trim((string) ($data->email ?? ''));
$phone = trim((string) ($data->phone ?? ''));
$message = trim((string) ($data->message ?? ''));

$isValid = strlen($name) >= 2
    && filter_var($email, FILTER_VALIDATE_EMAIL)
    && preg_match('/^[+()\-\s\d]{7,20}$/', $phone)
    && strlen($message) >= 10;

if (!$isValid) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Please check the form fields.']);
    exit;
}

$data->name = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$data->email = htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$data->phone = htmlspecialchars($phone, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$data->message = nl2br(htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));

try {
    $emailSender = new EmailSender();
    $emailSent = $emailSender->sendEmailContactUs($data);

    if ($emailSent !== true) {
        throw new RuntimeException('Email delivery failed.');
    }

    echo json_encode(['success' => true, 'message' => 'Enquiry sent.']);
} catch (Throwable $error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Unable to send the enquiry.']);
}
