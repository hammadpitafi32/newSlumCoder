<?php

namespace App\Models;

use Eloquent as Model;
use Laravel\Scout\Searchable;
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
    use Searchable;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'content',
        'category_id',
        'status',
        'title',
        'slug'
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
        'status' => 'integer',
        'title'=>'string'
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
        'status' => 'numeric',
        'title'=>'required'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function category()
    {
        return $this->hasOne('App\Models\PostCategory','id','category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comments::class,'post_id','id');
    }
    public function tags()
    {
        return $this->hasMany(PostTags::class,'post_id','id');
    }

    public function popArticle()
    {
        return self::orderBy('id','desc')->take(5)->get();
    }
    public function searchableAs()
    {
        return 'title';
    }
    
}
