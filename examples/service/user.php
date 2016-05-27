<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# user info
$response = $api->user->info();

Api::r(['user info' => $response ?: $api->error]);

# set callback
$response = $api->user->callbackSet('http://example.com/callback?md5=piy');

Api::r(['set callback' => $response ?: $api->error]);

# get callback
$response = $api->user->callbackGet();

Api::r(['get callback' => $response ?: $api->error]);

# start event
$response = $api->user->eventStart('customer', 'http://example.com/customer/callback?md5=LOOOOOOL');

Api::r(['start event' => $response ?: $api->error]);

# event status
$response = $api->user->eventStatus();

Api::r(['event status' => $response ?: $api->error]);

# event stop
$response = $api->user->eventStop('customer');

Api::r(['stop event' => $response ?: $api->error]);

$api->user->callbackSet('');






