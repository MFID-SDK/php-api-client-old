<?php

return [
    'app'    => 'service',
    'group'  => 'market',
    'methods' => [
        [
            'name'   => 'list',
            'params' => [
                'market_id',
                'merchant_id',
                'limit',
                'offset'
            ]
        ],
        [
            'name'   => 'get',
            'params' => [
                'market_id',
                'merchant_id',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'market_id',
                'merchant_id',
                'weight',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'market_id',
                'merchant_id',
                'weight',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'market_id',
                'merchant_id',
            ]
        ],
    ],
];