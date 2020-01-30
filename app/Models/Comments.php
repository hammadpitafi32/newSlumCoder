<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comments
 * @package App\Models
 * @version January 30, 2020, 2:43 am UTC
 *
 * @property integer post_id
 * @property integer user_id
 * @property string message
 */
class Comments extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'post_id',
        'user_id',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'post_id' => 'integer',
        'user_id' => 'integer',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'post_id' => 'required',
        'user_id' => 'required',
        'message' => 'required'
    ];

    
}
