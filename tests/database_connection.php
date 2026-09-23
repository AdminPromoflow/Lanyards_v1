<?php
// Read-only integration check; requires the configured MySQL database.
require __DIR__ . '/../controller/config/database.php';

function checkConnection($condition, $message) {
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$first = new Database();
$pdo = $first->getConnection();
checkConnection($pdo instanceof PDO, 'The configured database is unavailable.');
$connectionId = $pdo->query('SELECT CONNECTION_ID()')->fetchColumn();
checkConnection($pdo->getAttribute(PDO::ATTR_PERSISTENT), 'Persistent connections are disabled.');
$first->closeConnection();
checkConnection($first->getConnection() === null, 'The wrapper was not released.');

for ($i = 0; $i < 200; $i++) {
    $next = new Database();
    checkConnection($next->getConnection() === $pdo, 'A model opened another PDO.');
    checkConnection(
        $next->getConnection()->query('SELECT CONNECTION_ID()')->fetchColumn() === $connectionId,
        'A model opened another MySQL connection.'
    );
    $next->closeConnection();
}

// A changed configuration must not silently reuse the working connection.
$originalName = getenv('LANYARDS_DB_NAME');
$log = tempnam(sys_get_temp_dir(), 'lanyards-db-integration-');
$previousLog = ini_set('error_log', $log);
try {
    putenv('LANYARDS_DB_NAME=lanyards_missing_diagnostic_fixture_20260923');
    ob_start();
    $missing = new Database();
    $output = ob_get_clean();
    $diagnostic = file_get_contents($log);
    checkConnection($missing->getConnection() === null, 'Different settings reused the cached connection.');
    checkConnection($output === '', 'Connection details were written into the HTTP response.');
    checkConnection(strpos($diagnostic, '"driver_code":1049') !== false, 'The MySQL error code was lost.');
    checkConnection(strpos($diagnostic, 'lanyards_missing_diagnostic_fixture') === false, 'Database details leaked into diagnostics.');
} finally {
    putenv($originalName === false ? 'LANYARDS_DB_NAME' : 'LANYARDS_DB_NAME=' . $originalName);
    ini_set('error_log', $previousLog);
    unlink($log);
}

checkConnection((new Database())->getConnection() === $pdo, 'A failed configuration invalidated the working connection.');
echo "PASS: 200 model connections reused one MySQL connection; settings isolation and safe errors.\n";
