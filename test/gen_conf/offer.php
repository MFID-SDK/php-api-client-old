<?php

return [
    'app'    => 'service',
    'group'  => 'offer',
    'methods' => [
        [
            'name'   => 'list',
            'params' => [
                'merchant_id',
                'limit',
                'offset'
            ]
        ],
        [
            'name'   => 'get',
            'params' => [
                'offer_id',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'merchant_id',
                'name',
                'description',
                'percent',
                'price',
                'weight',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'offer_id',
                'name',
                'description',
                'percent',
                'price',
                'weight',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'offer_id',
            ]
        ],
    ],
];