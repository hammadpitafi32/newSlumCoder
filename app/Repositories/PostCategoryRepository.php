<?php

namespace App\Repositories;

use App\Models\PostCategory;
use App\Repositories\BaseRepository;

/**
 * Class PostCategoryRepository
 * @package App\Repositories
 * @version January 30, 2020, 2:36 am UTC
*/

class PostCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category'
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
        return PostCategory::class;
    }
}
