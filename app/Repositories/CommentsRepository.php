<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Repositories\BaseRepository;

/**
 * Class CommentsRepository
 * @package App\Repositories
 * @version January 30, 2020, 2:43 am UTC
*/

class CommentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'post_id',
        'user_id',
        'message'
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
        return Comments::class;
    }
}
