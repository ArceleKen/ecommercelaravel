<?php

namespace App\Repositories;

use App\Models\Command;
use InfyOm\Generator\Common\BaseRepository;


class CommandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        "num_command",
        'status',
        'firstname',
        'lastname',
        'address',
        'city',
        'country',
        'tel',  
        'comment' 
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Command::class;
    }
}
