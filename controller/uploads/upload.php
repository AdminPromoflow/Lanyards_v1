<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

function uploadError(string $message, int $status): void {
    http_response_code($status);
    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    uploadError('Method not allowed.', 405);
}

$image = $_FILES['image'] ?? null;
if (!$image || !isset($image['error']) || is_array($image['error'])) {
    uploadError('Please select an image.', 400);
}
if (in_array($image['error'], [UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE], true)) {
    uploadError('The image must not be larger than 1MB.', 413);
}
if ($image['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($image['tmp_name'])) {
    uploadError('The image could not be uploaded. Please try again.', 400);
}
if ($image['size'] > 1048576) {
    uploadError('The image must not be larger than 1MB.', 413);
}

$imageInfo = @getimagesize($image['tmp_name']);
$extensions = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];
$extension = $extensions[$imageInfo['mime'] ?? ''] ?? null;
if ($extension === null) {
    uploadError('Please upload a PNG, JPG, GIF or WebP image.', 415);
}

$uploadDir = __DIR__ . '/images/';
if (!is_dir($uploadDir) && !@mkdir($uploadDir, 0775, true) && !is_dir($uploadDir)) {
    uploadError('Image storage is unavailable. Please try again later.', 503);
}
if (!is_writable($uploadDir)) {
    uploadError('Image storage is unavailable. Please try again later.', 503);
}

// Unique server-generated names prevent one customer's logo replacing another.
$fileName = bin2hex(random_bytes(16)) . '.' . $extension;
if (!move_uploaded_file($image['tmp_name'], $uploadDir . $fileName)) {
    uploadError('The image could not be saved. Please try again.', 500);
}

echo json_encode([
    'success' => true,
    'imageUrl' => '../../controller/uploads/images/' . $fileName,
]);
