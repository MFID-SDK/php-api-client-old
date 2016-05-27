<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# number info by pan
$response = $api->emission->numberInfoByPan("9643812094579119");

Api::r(['number info by pan' => $response ?: $api->error]);

# number info by key
$response = $api->emission->numberInfoByAdditionalKey('nfc', '61133C29');

Api::r(['number info by key' => $response ?: $api->error]);

# series list
$response = $api->emission->seriesList();

Api::r(['series list' => $response ?: $api->error]);

# number list by series id
$response = $api->emission->numberListBySeriesId(4);

Api::r(['number list by series id' => $response ?: $api->error]);

# reserve new emission
$series_name = 'test_mfid_sdk' . date('Ymd');
$pans = $api->emission->reserve(3, $series_name);

Api::r(['reserve new emission' => $pans ?: $api->error]);

# confirm emission
$response = $api->emission->confirm($series_name, 1);

Api::r(['confirm emission' => $response ?: $api->error]);

# matching
$matching_data  = "pan,merchant_id,nfc,key\n";
$matching_data .= "{$pans[0]},0,FF133C29,1\n";
$matching_data .= "{$pans[1]},0,FF133C30,2\n";
$matching_data .= "{$pans[2]},0,FF133C31,3\n";

$response = $api->emission->matching($matching_data);

Api::r(['matching emission' => $response ?: $api->error]);

$matching_key = $response['matching_key'];

# matching status
$response = $api->emission->matchingStatus($matching_key);

Api::r(['matching emission' => $response ?: $api->error]);

