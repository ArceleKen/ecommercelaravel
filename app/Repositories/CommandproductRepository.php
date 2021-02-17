<?php

namespace App\Repositories;

use App\Models\Commandproduct;
use InfyOm\Generator\Common\BaseRepository;


class CommandproductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'command_id',
        'product_id',
        'quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Commandproduct::class;
    }
}