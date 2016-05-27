<?php

return [
    'app'    => 'service',
    'group'  => 'merchant',
    'methods' => [
        [
            'name'   => 'list',
            'params' => [
                'app_id',
                'limit',
                'offset'
            ]
        ],
        [
            'name'   => 'get',
            'params' => [
                'merchant_id',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'name',
                'description',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'merchant_id',
                'name',
                'description',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'merchant_id',
            ]
        ],
        [
            'name'   => 'offerList',
            'params' => [
                'merchant_id',
                'address_id',
            ]
        ],
        [
            'name'   => 'offerAdd',
            'params' => [
                'merchant_id',
                'address_id',
                'offer_id',
                'weight',
            ]
        ],
        [
            'name'   => 'offerDelete',
            'params' => [
                'merchant_id',
                'address_id',
                'offer_id',
            ]
        ],
        [
            'name'   => 'cardGet',
            'params' => [
                'merchant_id',
                'card_id',
            ]
        ],
    ],
];