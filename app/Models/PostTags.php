<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostTags
 * @package App\Models
 * @version February 14, 2020, 6:12 am UTC
 *
 * @property integer tag_id
 * @property integer post_id
 */
class PostTags extends Model
{
    use SoftDeletes;

    public $table = 'post_tags';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tag_id',
        'post_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tag_id' => 'integer',
        'post_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tag_id' => 'required',
        'post_id' => 'required'
    ];
    public function post()
    {
        return $this->belongsTo('App\Models\Posts','post_id','id');
    }
    public function tag()
    {
        return $this->belongsTo('App\Models\Tags','tag_id','id');
    }
    
}
