<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

/**
 * Class Users
 * @package App\Models
 * @version February 17, 2020, 7:57 am UTC
 *
 * @property string name
 * @property string about
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string image_url
 * @property string remember_token
 */
class Users extends Authenticatable
{
    use SoftDeletes,HasRoles,Notifiable;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    protected $guard_name = 'web';


    public $fillable = [
        'name',
        'about',
        'email',
        'email_verified_at',
        'password',
        'image_url',
        // 'remember_token',
        // 'role'
    ];

    protected $hidden = ['password'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'about' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        // 'password' => 'string',
        'image_url' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        // 'role' => 'required',
        // 'image_url' => 'required',
        // 'password' => 'required'
    ];

    
}
