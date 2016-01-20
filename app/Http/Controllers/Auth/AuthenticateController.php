<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use JWTAuth;

use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthenticateController extends Controller
{
    /**
     * Authentication layer function
     * Handles user login
     *
     * @param username, password
     * @return array $token
     * @throws JWTException
     */
    protected function authenticate($username, $password) {
        // authenticate the request based on username and password

        $credentials = ['username'=>$username, 'password'=>$password];

        try {
            $token = JWTAuth::attempt($credentials);

            if (! $token) {
                return false;
            }

            // send back login data
            return ['token' => $token];

        } catch (JWTException $e) {
            // something screwed up
            // JWT exception originates here
            throw $e;
        }
    }

    public function postLogin(Request $request) {

        try {
            $loginData = $this->authenticate($request->username, $request->password);

            if ($loginData === false) {
                return response()->json(['error'=>'invalid_credentials'], 401);
            } else {
                return response()->json($loginData, 200);
            }
        } catch (JWTException $e) {
            // internal jwt error
            return response()->json(['error'=>'could_not_create_credentials'], 500);
        }
    }
}
