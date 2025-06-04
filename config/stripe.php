<?php
return [
    'stripe' => [
        'secret_key' => getenv('STRIPE_SECRET_KEY'),
        'public_key' => getenv('STRIPE_PUBLIC_KEY'),
        'success_url' => getenv('STRIPE_SUCCESS_URL'),
        'cancel_url' => getenv('STRIPE_CANCEL_URL')
    ]
];
