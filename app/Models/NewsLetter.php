<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tags
 * @package App\Models
 * @version February 14, 2020, 6:00 am UTC
 *
 * @property string tag
 */
class NewsLetter extends Model
{
    use SoftDeletes;

    public $table = 'newsletter_subscriptions';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
  
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|unique:newsletter_subscriptions,email'
    ];

    
}
