<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\Tags;
use App\Models\PostTags;
use App\Models\PostCategory;
use App\Repositories\BaseRepository;

/**
 * Class PostsRepository
 * @package App\Repositories
 * @version January 30, 2020, 2:24 am UTC
*/

class PostsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'content',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Posts::class;
    }
    public function getArticleByCategory($slug){
        $catId=PostCategory::where('category',$slug)->first();
        
        if(!empty($catId)){

            return $this->model->where('category_id',$catId->id)->Active()->paginate(15);
        }
        return new \stdClass();
    }
    public function getArticleBySlug($slug){
       
        return $this->model->where('slug',$slug)->Active()->firstOrFail();
        
    }
    public function getArticleByDate($slug){
        $empl=explode('-', $slug);
     
        return $this->model->whereMonth('created_at',$empl[0])->whereYear('created_at',$empl[1])->Active()->paginate(15);
        
    }

    public function getPostsByTags($slug){
        $tag=Tags::where('tag',$slug)->first();
        
        if(!empty($tag)){
            
            $getTagPosts=PostTags::where('tag_id',$tag->id)->pluck('post_id');
            return $this->model->whereIn('id',$getTagPosts)->Active()->paginate(15);
        }
        return new \stdClass();
        
    }
    public function getDataByUserId($userId){
        return $this->model->where('user_id',$userId)->get();
    }  
    
}
