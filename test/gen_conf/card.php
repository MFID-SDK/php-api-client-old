<?php

return [
    'app'    => 'service',
    'group'  => 'card',
    'methods' => [
        [
            'name'   => 'list',
            'params' => [
                'merchant_id',
                'address_id',
                'issuer_id',
                'limit',
                'offset'
            ]
        ],
        [
            'name'   => 'get',
            'params' => [
                'card_id',
                'pan',
                'key_name',
                'key_value',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
                'pan',
                'status',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'card_id',
                'status',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'card_id',
            ]
        ],
        [
            'name'   => 'merchantList',
            'params' => [
                'card_id',
                'limit',
                'offset'
            ]
        ],
    ],
];