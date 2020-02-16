<?php

namespace App\Repositories;

use App\Models\ContactMe;
use App\Repositories\BaseRepository;

/**
 * Class ContactMeRepository
 * @package App\Repositories
 * @version February 16, 2020, 5:37 pm UTC
*/

class ContactMeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'subject',
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
        return ContactMe::class;
    }
}
