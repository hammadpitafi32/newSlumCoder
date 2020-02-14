<?php

namespace App\Repositories;

use App\Models\Tags;
use App\Repositories\BaseRepository;

/**
 * Class TagsRepository
 * @package App\Repositories
 * @version February 14, 2020, 6:00 am UTC
*/

class TagsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tag'
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
        return Tags::class;
    }
}
