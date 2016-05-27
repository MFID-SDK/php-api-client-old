<?php

require_once '../lib/MFID/autoload.php';

echo "test mfid cache feature ...<br/>";

$config = [
    'auth' => [
        'login'    => 'test',
        'password' => 'test',
        'app_hash' => '9972dc662d',
        'expires'  => 3600,
    ],
    'cache' => [
        'save' => function ($key, $value) {
            echo "save($key)<br/>";
            $m = new Memcache();
            $m->connect('localhost', 11211);
            $m->set($key, $value);
        },
        'load' => function ($key) {
            echo "load($key)<br/>";
            $m = new Memcache();
            $m->connect('localhost', 11211);
            return $m->get($key);
        }
    ],
    'url' => 'https://mfid.kartagoroda.org/'
];

try {
    $api = MFID\Api::getInstance($config);
} catch (Exception $e) {
    echo "fail<br/>";
    die ('Exception :: ' . $e->getMessage());
}

if ($api instanceof MFID\Api) {
    echo "all right :)<br/>";
} else {
    echo "fail :(<br/>";
}