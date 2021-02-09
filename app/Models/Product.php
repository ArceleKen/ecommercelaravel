<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    //use SoftDeletes;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];


    public $fillable = [
        'categorie_id',
        'name',
        'description',
        'price',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'categorie_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function categorie(){
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function images()
    {
        return $this->hasMany(App\Models\Image::class);
    }
    
}
