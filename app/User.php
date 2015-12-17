<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Validator;
use Log;
use Hash;

class User extends Model
implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'dob',
        'email',
        'password',
        'details_type'  // careful of this: the user should not CHANGE it
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    protected function validator(array $userdata) {
        Log::info('Validator data: ', $userdata);
        return Validator::make($userdata, [
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
     * Registers a new User
     *
     * Abstracts away actions for registering the user into the database.
     * Assumes valid information.
     */
    public static function register(array $userdata) {
        // // Salt for password followed by hash
        // $salt = str_random(32); // 32-character string
        // $userdata['password'] = $salt + $userdata['password'];
        $userdata['password'] = Hash::make($userdata['password']);

        $user = User::create($userdata);
        return $user;
    }

}
