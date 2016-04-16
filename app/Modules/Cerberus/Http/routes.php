<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->post('/authenticate', 'App\Modules\Cerberus\Http\Controllers\AuthenticateController@authenticate');

	$api->get('/hubs', 'App\Modules\Cerberus\Http\Controllers\HubController@index');
	$api->post('/hubs/deploy', 'App\Modules\Cerberus\Http\Controllers\HubController@deploy');
});