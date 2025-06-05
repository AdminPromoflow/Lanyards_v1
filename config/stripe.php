<?php
return[
    'stripe' => [
        'secret_key' => getenv('sk_test_51RVWm7Iy7ZwkjsYRhmh4hsLctFV3lGr2HlAK5qn8eb7yAOTc9z2BTYRc2DVzvyRhLrndFR4MYMWBe6Kw2PA9Od3Z00UpRTyB8P'),
        'public_key' => getenv('pk_test_51RVWm7Iy7ZwkjsYRR8yv9KOR4aEL7cKYBRjG6yg2h7eLXU1TJ4kzQ4f0vMbLefo62Lr7VCgaZe38vgLlKSqaVUEA00MmM5pqoO'),
        'success_url' => getenv('https://lanyardsforyou.com/views/success_payment/sections/success_payment.php'),
        'cancel_url' => getenv('https://lanyardsforyou.com/views/success_payment/sections/success_payment.php')
    ]
];
