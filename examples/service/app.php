<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# app list by user_id
$response = $api->app->listByUserId(1);

Api::r(['app list by user_id' => $response ?: $api->error]);

# app list by type
$response = $api->app->listByType(1);

Api::r(['app list by type' => $response ?: $api->error]);

# users list
$response = $api->app->userList(1);

Api::r(['users list' => $response ?: $api->error]);






die();
# add new app
$response = $api->app->add(70, 1, 2, 'sdk test', 'piy piy');

Api::r(['add new app' => $response ?: $api->error]);
