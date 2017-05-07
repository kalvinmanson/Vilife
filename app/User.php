<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
    protected $fillable = ['name', 'slug', 'email', 'role', 'password', 'picture', 'document', 'birthdate', 'gender', 'ocupation', 'peso_usual', 'country', 'city', 'address', 'phone', 'mobile', 'bio', 'cv', 'rank', 'lat', 'lng', 'confirmed', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function diaries()
    {
        return $this->hasMany('App\Diary');
    }
    public function intolerances()
    {
        return $this->hasMany('App\Intolerance');
    }
    public function laboratories()
    {
        return $this->hasMany('App\Laboratory');
    }
    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }
    public function pathologies()
    {
        return $this->hasMany('App\Pathology');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function plans()
    {
        return $this->hasMany('App\Plan');
    }
    public function profiles()
    {
        return $this->hasMany('App\Profile');
    }
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
    public function surgicals()
    {
        return $this->hasMany('App\Surgical');
    }
    public function ticekts()
    {
        return $this->hasMany('App\Ticket');
    }
    public function visits()
    {
        return $this->hasMany('App\Visit');
    }
}
