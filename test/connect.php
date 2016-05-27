<?php

require_once '../lib/MFID/autoload.php';

echo "test mfid connect ...<br/>";

$config = require 'config/bad.php';
//$config = require 'config/service.php';
//$config = require 'config/merchant.php';

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
