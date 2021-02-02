<?php

namespace App\Repositories;

use App\Models\Log;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LogRepository
 * @package App\Repositories
 * @version June 17, 2019, 1:04 pm UTC
 *
 * @method Log findWithoutFail($id, $columns = ['*'])
 * @method Log find($id, $columns = ['*'])
 * @method Log first($columns = ['*'])
*/
class LogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'description',
        'info_compl'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Log::class;
    }
}
