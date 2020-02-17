<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version February 17, 2020, 7:57 am UTC
*/

class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'about',
        'email',
        'email_verified_at',
        'password',
        'image_url',
        'remember_token'
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
        return Users::class;
    }
    public function imagePath()
    {
        return asset('storage/users/');
    }

}
