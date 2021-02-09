<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Categorie extends Model
{
  //  use SoftDeletes;

    public $table = 'categories';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        "description",
        'status' // 0=desactive, 1=active 
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        "description"=>"string",
        'status' => 'integer' 
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    

}
