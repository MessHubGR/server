<?php

namespace App\Modules\Cerberus\Http\Controllers;

use JWTAuth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends ApiController
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                throw new \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException(null, 'Invalid user credentials provided.');
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            throw new \Symfony\Component\HttpKernel\Exception\HttpException(null, 'Could not create JSON Web Token.');
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}