<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserRoles
 * @package App\Models
 * @version February 17, 2020, 10:48 am UTC
 *
 * @property \App\Models\Role role
 * @property string model_type
 * @property integer model_id
 */
class UserRoles extends Model
{
    // use SoftDeletes;

    public $table = 'model_has_roles';
    public $timestamps = false;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'role_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role_id'=>'required',
        'model_type' => 'required',
        'model_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }
}
