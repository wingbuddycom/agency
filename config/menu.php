<?php

return [

    'public' => [
        [
            'key' => 'login.menuName',
            'route' => 'login',
            'icon' => '<i class="fa-solid fa-right-to-bracket"></i>',
            'bannerImage' => 'https://assets.wingbuddy.com/images/package/789/greek-islands-getaway-1687555295.jpg?v='.time()
        ],
    ],

    'agency' => [
        'title' => 'content.agency.title',
        'icon' => '<i class="fa-solid fa-compass"></i>',
        'items' => [
            [
                'key' => 'bookings.title',
                'route' => 'bookings',
                'icon' => '<i class="fa-solid fa-book"></i>',
                'bannerImage' => 'https://assets.wingbuddy.com/images/package/581/banner_authentic-greek-islands.jpg?v='.time()
            ],
            [
                'key' => 'commissions.title',
                'route' => 'commissions',
                'icon' => '<i class="fa-regular fa-file-invoice-dollar"></i>',
                'bannerImage' => 'https://assets.wingbuddy.com/images/packageImage_200217103136.jpg?v='.time()
            ],
        ]
    ]
];
