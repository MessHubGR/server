<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->get('/hub', 'App\Modules\Cerberus\Http\Controllers\HubController@index');
	$api->post('/hub/deploy', 'App\Modules\Cerberus\Http\Controllers\HubController@deploy');
});
