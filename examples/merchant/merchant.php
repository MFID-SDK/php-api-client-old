<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/merchant.php');

# get merchant info

$info = $api->merchant->info();

Api::r(['info' => $info]);

$addresses = $api->merchant->addressList();

Api::r(['addresses' => $addresses]);

$offers = $api->merchant->offerList();

Api::r(['offers' => $offers]);