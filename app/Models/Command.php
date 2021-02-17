<?php

namespace App\Models;

use Eloquent as Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Command extends Model
{
  //  use SoftDeletes;

    public $table = 'commands';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'num_command' => 'string',
        'status' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'city' => 'string',
        'country' => 'string',
        'tel' => 'string',
        'user_id' => 'integer', 
        'comment' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function commandproducts()
    {
        return $this->hasMany('App\Models\Commandproduct', 'command_id');
    }

}
