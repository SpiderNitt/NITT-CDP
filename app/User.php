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
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Returns flag indicating if user has admin privileges.
     *
     * @return bool
     */
    public function isAdmin() {
        if ($this->admin == true) {
            return true;
        }
        return false;
    }


    public function getPosts() {
        return $this->hasMany('App\Post', 'author');
    }

    public function getEvents() {
        return $this->hasMany('App\Event', 'creator');
    }

    public function getSubscribers() {
        return $this->morphToMany('App\User', 'subscribable', 'subscriptions')->withTimestamps();
    }

    public function getSubscribedToUsers() {
        return $this->morphedByMany('App\User', 'subscribable', 'subscriptions')->withTimestamps();
    }

    public function getSubscribedToTopics() {
        return $this->morphedByMany('App\Topic', 'subscribable', 'subscriptions')->withTimestamps();
    }

    public function getModeratingTopics() {
        return $this->morphedByMany('App\Topic', 'moddeable', 'role_moderators')->withTimestamps();
    }

    public function getModeratingCollections() {
        return $this->morphedByMany('App\Collection', 'moddeable', 'role_moderators')->withTimestamps();
    }

    public function getEditableTopics() {
        return $this->belongsToMany('App\Topic', 'role_editors')->withTimestamps();
    }


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
     *
     * @param array $userdata
     * @return User
     */
    public static function register(array $userdata) {
        // Hash user password
        $userdata['password'] = Hash::make($userdata['password']);
        $userdata['email'] = strtolower($userdata['email']);

        $user = new User;
        $fillableAttributes = $user->getFillable();

        foreach ($fillableAttributes as $attribute) {
            Log::info("Attrib ".$attribute);
            if (isset($userdata[$attribute])) {
                Log::info($attribute." isset");
                $user[$attribute] = $userdata[$attribute];
            }
        }

        $user->details_type = $userdata['details_type']; // guarded property being assigned
        $user->admin = FALSE;
        $user->save();
        return $user;
    }

}
