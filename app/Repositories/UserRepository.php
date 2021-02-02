<?php

namespace App\Repositories;

use App\Models\UserModel;
use App\User;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserModelRepository
 * @package App\Repositories
 * @version December 4, 2017, 4:32 pm UTC
 *
 * @method UserModel findWithoutFail($id, $columns = ['*'])
 * @method UserModel find($id, $columns = ['*'])
 * @method UserModel first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token',
        'login',
        'apikey',
        'apitoken',
        'debut',
        'fin'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        //return UserModel::class;
        return User::class;
    }
}
