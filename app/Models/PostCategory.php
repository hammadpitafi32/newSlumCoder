<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostCategory
 * @package App\Models
 * @version January 30, 2020, 2:36 am UTC
 *
 * @property string category
 */
class PostCategory extends Model
{
    use SoftDeletes;

    public $table = 'post_categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category' => 'required'
    ];

    
}
