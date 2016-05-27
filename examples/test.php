<?php

use MFID\Api;

require_once '../lib/MFID/autoload.php';

$api = Api::getInstance(require 'config/service.php');

app_add_bag($api);


function servise_emission_matching_status($api)
{
    # matching status
    $response = $api->emission->matchingStatus('3f76e69e242fbe03');

    Api::r(['matching emission' => $response ?: $api->error]);
}

function app_add_bag ($api)
{
    $api->app->add(1, 1, 1, "test1", '');
    $api->app->add(1, 2, 4, "test2", '');

    echo 'ok';
}