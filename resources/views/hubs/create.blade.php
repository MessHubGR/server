@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading">Register New Hub</div>

                <div class="panel-body">
                    <div class="form-group form-map">
                        <div class="col-md-3 control-label"></div>
                        <div class="col-md-7 form-map"><p class="bg-info" style="padding: 7px; text-align: center;">Drag the marker in the map below to change the coordinates of the new hub.</p><div id="create_map"></div></div>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('hub.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input readonly="readonly" type="username" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input readonly="readonly" type="username" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">

                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Register Hub
                                </button>
                                <a href="{{ route('hub.index') }}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link href="/styles/hubs.css" rel='stylesheet' type='text/css'>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAD-_lGwwWlTss8YJpOQrtLMx0N5MJnQ3Y&callback=initialization" async defer></script>
    <script src="/scripts/create_hub.js"></script>
@endsection