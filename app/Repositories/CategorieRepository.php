<?php

namespace App\Repositories;

use App\Models\Categorie;
use InfyOm\Generator\Common\BaseRepository;


class CategorieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        "description",
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Categorie::class;
    }
}
