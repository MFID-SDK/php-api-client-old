<?php

return [
    'app'    => 'service',
    'group'  => 'emission',
    'methods' => [
        [
            'name'   => 'reserve',
            'params' => [
                'series_name',
                'series_description',
                'count'
            ]
        ],
        [
            'name'   => 'confirm',
            'params' => [
                'series_name',
                'status',
            ]
        ],
        [
            'name'   => 'seriesList',
            'params' => [
                'app_id',
                'limit',
                'offset',
            ]
        ],
        [
            'name'   => 'seriesInfo',
            'params' => [
                'series_id',
                'series_name',
            ]
        ],
        [
            'name'   => 'numberList',
            'params' => [
                'series_id',
                'app_id',
                'merchant_id',
                'offset',
                'limit',
            ]
        ],
        [
            'name'   => 'numberInfo',
            'params' => [
                'pan',
                'key_name',
                'key_value',
            ]
        ],
        [
            'name'   => 'matching',
            'params' => [
                'data',
            ]
        ],
        [
            'name'   => 'matchingStatus',
            'params' => [
                'matching_key',
                'details',
            ]
        ],
    ],
];