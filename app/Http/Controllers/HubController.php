<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hub;
use App\Http\Requests;

class HubController extends Controller
{

    /**
     * Instantiate a new HubController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:manage.hubs', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of all hubs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hubs = Hub::all();
        return view('hub.index')->with(compact('hubs'));
    }

    /**
     * Show the form for registering a new hub.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hub.create');
    }

    /**
     * Store a newly created hub in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        
        $hub_key = str_random(16);
        Hub::create([
            "key" => $hub_key,
            "latitude" => $request->input('latitude'),
            "longitude" => $request->input('longitude')
        ]);

        $status = (object)[
            'class' => 'alert-success',
            'message' => 'Hub registered successfully. Please use the following key to deploy the hub: <b>' . $hub_key . '</b>'
        ];

        return redirect(route('hub.index'))->with(compact('status'));
    }

    /**
     * Display the specified hub.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hub = Hub::findOrFail($id);
        return view('hub.show')->with(compact('hub'));
    }

    /**
     * Show the form for editing the specified hub.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hub = Hub::findOrFail($id);
        return view('hub.edit')->with(compact('hub'));
    }

    /**
     * Update the specified hub in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hub = Hub::findOrFail($id);

        $this->validate($request, [
            'latitude' => 'required_unless:key,regenerate',
            'longitude' => 'required_unless:key,regenerate'
        ]);
        if ($request->input('key') != null) {
            $hub->key = str_random(16);
        } else {
            $hub->latitude = $request->input('latitude');
            $hub->longitude = $request->input('longitude');
        }
        $hub->save();
        
        return redirect(route('hub.show', $id));
    }

    /**
     * Remove the specified hub from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hub = Hub::findOrFail($id);
        $hub->active = !$hub->active;
        $hub->save();
        return redirect(route('hub.show', $id));
    }
}
