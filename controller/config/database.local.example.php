<?php
// Copy to database.local.php on the hosting server only, then use its existing
// MySQL credentials. Never commit database.local.php or overwrite it on deploy.
return [
    'host' => 'localhost',
    'name' => 'YOUR_HOSTING_DATABASE',
    'user' => 'YOUR_HOSTING_DATABASE_USER',
    'password' => 'YOUR_HOSTING_DATABASE_PASSWORD',
];
