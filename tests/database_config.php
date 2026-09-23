<?php
require __DIR__ . '/../controller/config/database.php';

function check($condition, $message) {
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$method = new ReflectionMethod(Database::class, 'loadSettings');
$method->setAccessible(true);
$fixture = tempnam(sys_get_temp_dir(), 'lanyards-db-config-');
$original = [];
foreach (['HOST', 'NAME', 'USER', 'PASSWORD'] as $key) {
    $name = 'LANYARDS_DB_' . $key;
    $original[$name] = getenv($name);
    putenv($name);
}
try {
    $defaults = $method->invoke(null, $fixture . '.missing');
    check($defaults['user'] === 'root' && $defaults['password'] === '', 'XAMPP defaults changed.');

    file_put_contents($fixture, "<?php return ['host'=>'hosting-db','name'=>'catalogue','user'=>'hosting-user','password'=>'test-only'];");
    $settings = $method->invoke(null, $fixture);
    check($settings['user'] === 'hosting-user' && $settings['password'] === 'test-only', 'Hosting credentials were ignored.');
    check($settings['host'] === 'hosting-db' && $settings['name'] === 'catalogue', 'Hosting database was ignored.');

    putenv('LANYARDS_DB_USER=environment-user');
    putenv('LANYARDS_DB_PASSWORD=');
    $settings = $method->invoke(null, $fixture);
    check($settings['user'] === 'environment-user', 'Environment must override local settings.');
    check($settings['password'] === '', 'An explicit empty password must be preserved.');
    check($settings['name'] === 'catalogue', 'Partial environment settings discarded the local database.');
    echo "PASS: XAMPP defaults, hosting settings and environment precedence.\n";
} finally {
    unlink($fixture);
    foreach ($original as $name => $value) {
        putenv($value === false ? $name : $name . '=' . $value);
    }
}
