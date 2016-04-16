<?php

namespace App\Modules\Cerberus\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Dingo\Api\Exception\StoreResourceFailedException;
use Carbon\Carbon;
use App\Models\Hub;
use App\Http\Requests;

class HubController extends ApiController
{
    /**
     * Instantiate a new HubController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api.auth', ['except' => [
            'index'
        ]]);
    }

    /**
     * Display a listing of all hubs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubs = Hub::all();
        return $this->response->array($hubs->toArray());
    }

    /**
     * Store a newly created hub in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deploy(Request $request)
    {
        $user = app('Dingo\Api\Auth\Auth')->user();
        if (!($user->hasPermission('manage.hubs'))) {
            throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException(null, 'You do not have the required manage.hubs permission.');
        }

        $rules = [
            'key' => ['required', 'size:16', 'string'],
            'capacity' => ['required', 'integer', 'min:1']
        ];

        $payload = $request->only('key', 'capacity');
        $validator = app('validator')->make($payload, $rules);
        if ($validator->fails()) {
            throw new StoreResourceFailedException('Could not deploy hub.', $validator->errors());
        }

        $hub = Hub::where('key', $request->input('key'))->first();
        if ($hub == null) {
            throw new StoreResourceFailedException('Could not deploy hub because an invalid key was entered.', $validator->errors());
        }

        $hub->capacity = $request->input('capacity');
        $hub->active = true;
        $hub->deployed_at = Carbon::now();
        $hub->save();

        return $this->response->created();
    }
}
