<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
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


    protected function validator(array $data)
    {
        Log::info('Validator data: ', $data);
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|alpha_dash|min:5|max:100|unique:users',
            'dob' => 'required|date',
            'details_type' => 'required|in:student,faculty',
            'password' => 'required|confirmed|min:6'
        ]);
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

        $validator = $this->validator($dataValues);

        if ($validator->fails()) {
            // validation exception
            Log::warning('Validation failed');
            $failedRules = $validator->failed();
            Log::info('Failed rules: ', $failedRules);
            $this->throwValidationException($request, $validator);
        }

        Log::info('Validator passed');

        // hash the password
        $dataValues['password'] = bcrypt($dataValues['password']);

        // create and save the user
        $user = User::create($dataValues);

        // save the password separately, because guarded property
        $user->password = $dataValues['password'];
        $user->save();

        Log::info('User saved');

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
