<?php

namespace App\Repositories;

use App\Models\UserRoles;
use App\Repositories\BaseRepository;

/**
 * Class UserRolesRepository
 * @package App\Repositories
 * @version February 17, 2020, 10:48 am UTC
*/

class UserRolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_type',
        'model_id'
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
        return UserRoles::class;
    }
}
