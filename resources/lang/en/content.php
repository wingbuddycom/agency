<?php
return [
    'general' => [
        'copyRight' => '© Wingbuddy '.date('Y').'. All rights reserved.',
        'logo' => 'https://assets.wingbuddy.com/images/logo/wingbuddy-logo-en.png?v='.time()
    ],
    'login' => [
        'menuName' => 'Login',
        'title' => 'Welcome Travel Advisor',
        'quote' => 'A journey of a thousand miles begins with a single step',
        'forgotPassword' => 'Forgot password?',
        'registrationText' => "Don't have an account yet?",
        'registrationUrl' => 'https://www.wingbuddy.com/agents',
        'errorInvalid' => 'Invalid credentials'
    ],
    'agency' => [
        'title' => 'Travel Advisor Portal',
        'icon' => '<i class="fa-solid fa-compass"></i>',
    ],
    'bookings' => [
        'title' => 'Bookings',
        'icon' => '<i class="fa-solid fa-book"></i>',
        'bannerImage' => 'https://assets.wingbuddy.com/images/package/581/banner_authentic-greek-islands.jpg?v='.time(),
        'table' => [
            'Reservation ID',
            'Package Name',
            'Reservation Date',
            'Status',
            'Departure Date',
            'Passengers',
            'Total Booking Price',
            'Commission',
            'Currency',
            'Travel Advisor',
        ]
    ],
    'commissions' => [
        'title' => 'Commissions',
        'icon' => '<i class="fa-regular fa-file-invoice-dollar"></i>',
        'bannerImage' => 'https://assets.wingbuddy.com/images/packageImage_200217103136.jpg?v='.time(),
        'table' => [
            'Reservation Id',
            'Amount Before Taxes',
            'Total Amount',
            'Status',
            'Invoice',
            'Payment Method'
        ]
    ]

];
