<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Posts
 * @package App\Models
 * @version January 30, 2020, 2:24 am UTC
 *
 * @property integer user_id
 * @property string content
 * @property integer status
 */
class Posts extends Model
{
    use SoftDeletes;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'content',
        'category_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'category_id'=>'integer',
        'content' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'numeric',
        'category_id'=>'numeric',
        'content' => 'required',
        'status' => 'numeric'
    ];

    
}
