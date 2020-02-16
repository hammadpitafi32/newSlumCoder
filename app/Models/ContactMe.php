<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactMe
 * @package App\Models
 * @version February 16, 2020, 5:37 pm UTC
 *
 * @property string name
 * @property string email
 * @property string subject
 * @property string message
 */
class ContactMe extends Model
{
    use SoftDeletes;

    public $table = 'contact_mes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required'
    ];

    
}
