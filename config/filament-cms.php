<?php

return [
    'seed' => env('FILAMENT_CMS_SEED', false),

    'custom_blocks' => [
        'content' => [
            //
        ],
        'header' => [
            //
        ]
    ],

    'media' => [
        'variants' => [
            'thumbnail' => [
                'aspect_ratio' => '1/1',
                'width' => 400,
                'height' => 400
            ],
            'featured' => [
                'aspect_ratio' => '16/9',
                'width' => 1440,
                'height' => 810,
            ],
            'banner' => [
                'aspect_ratio' => '4/1',
                'width' => 1920,
                'height' => 480
            ],
        ],
    ],
];
