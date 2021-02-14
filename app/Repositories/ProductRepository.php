<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        "description",
        'price',
        'status',
        'main_image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public function searchProducts($categorie_id, array $keywords)
    {
        $search1 = DB::table('products')->where('status', 1);
        
        if($categorie_id != '0')
            $search1 = $search1->where('categorie_id', $categorie_id);

        if (count($keywords) == 0)
            return $search1->get();

        $search2 = $search1->where('name', 'like', '%'.$keywords[0].'%');
        for ($i=0; $i < count($keywords); $i++) { 
            $search2 = $search2->orWhere('name', 'like', '%'.$keywords[$i].'%');
        }

        return $search2->get(); 

    }
}