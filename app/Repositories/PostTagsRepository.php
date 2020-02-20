<?php

namespace App\Repositories;

use App\Models\PostTags;
use App\Repositories\BaseRepository;

/**
 * Class PostTagsRepository
 * @package App\Repositories
 * @version February 14, 2020, 6:12 am UTC
*/

class PostTagsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag_id',
        'post_id'
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
        return PostTags::class;
    }
    public function getDataByUserId($userId){
        return $this->model->where('user_id',$userId)->get();
    }  
}
