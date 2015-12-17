<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // handled by client
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         * [user::store]
         *     received at server
         *     validation
         *     hash password
         *     save in db
         *     call getToken with new user model
         *     return token
        */
        Log::info('Entered store function');

        $dataValues = $request->all();


        $dataValues['username'] = strtolower($dataValues['username']);
        $dataValues['email'] = strtolower($dataValues['email']);


        Log::info('Lowercased dataValues');

        // validation of stuff

        $validator = User::validator($dataValues);

        if ($validator->fails()) {
            // validation exception
            Log::warning('Validation failed');
            $failedRules = $validator->failed();
            Log::info('Failed rules: ', $failedRules);
            $this->throwValidationException($request, $validator);
        }

        Log::info('Validator passed');

        $user = User::register($dataValues);

        // call getToken
        $token = JWTAuth::fromUser($user);

        Log::info('Token created');

        // return token with response
        return response()->json(compact('token'), 200);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
