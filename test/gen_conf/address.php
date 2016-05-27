<?php

return [
    'app'    => 'service',
    'group'  => 'address',
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
                'address_id',
                'yandex_id',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'merchant_id',
                'yandex_id',
                'name',
                'description',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'address_id',
                'yandex_id',
                'name',
                'description',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'address_id',
            ]
        ],
    ],
];