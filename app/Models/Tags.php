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
class Tags extends Model
{
    use SoftDeletes;

    public $table = 'tags';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tag','user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tag' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tag' => 'required'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id','id');
    }

    
}
