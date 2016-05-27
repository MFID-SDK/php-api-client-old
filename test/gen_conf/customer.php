<?php

return [
    'app'    => 'service',
    'group'  => 'customer',
    'methods' => [
        [
            'name'   => 'list',
            'params' => [
                'merchant_id',
                'address_id',
                'limit',
                'offset'
            ]
        ],
        [
            'name'   => 'get',
            'params' => [
                'customer_id',
                'phone',
            ]
        ],
        [
            'name'   => 'add',
            'params' => [
                'merchant_id',
                'address_id',
                'phone',
                'email',
                'name',
                'birthday',
            ]
        ],
        [
            'name'   => 'update',
            'params' => [
                'customer_id',
                'phone',
                'email',
                'name',
                'birthday',
            ]
        ],
        [
            'name'   => 'delete',
            'params' => [
                'customer_id',
                'reason',
            ]
        ],
        [
            'name'   => 'cardList',
            'params' => [
                'customer_id',
                'limit',
                'offset',
            ]
        ],
        [
            'name'   => 'marketList',
            'params' => [
                'customer_id',
            ]
        ],
        [
            'name'   => 'merchantList',
            'params' => [
                'customer_id',
                'limit',
                'offset',
            ]
        ],
        [
            'name'   => 'balanceGet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
            ]
        ],
        [
            'name'   => 'balanceSet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
                'balance_id',
                'value',
            ]
        ],
        [
            'name'   => 'rateGet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
            ]
        ],
        [
            'name'   => 'rateSet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
                'rate_id',
                'value',
            ]
        ],
        [
            'name'   => 'statsGet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
            ]
        ],
        [
            'name'   => 'statsSet',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
                'count',
                'sum',
                'discount',
            ]
        ],
        [
            'name'   => 'statsChange',
            'params' => [
                'customer_id',
                'merchant_id',
                'address_id',
                'count',
                'sum',
                'discount',
            ]
        ],
        [
            'name'   => 'offerConnect',
            'params' => [
                'customer_id',
                'offer_id',
                'address_id',
                'info',
            ]
        ],
       [
            'name'   => 'infoShare',
            'params' => [
                'customer_id',
                'merchant_id',
            ]
        ],



    ],
];