<?php

return [
    'auth' => [
        'login'    => 'test',
        'password' => 'test',
        'app_hash' => '9972dc662d',
        'expires'  => 3600,
    ],
    /*'cache' => [
        'save' => function ($key, $value) {
            $m = new Memcache();
            $m->connect('localhost', 11211);
            $m->set($key, $value);
        },
        'load' => function ($key) {
            $m = new Memcache();
            $m->connect('localhost', 11211);
            return $m->get($key);
        }
    ],/**/
];