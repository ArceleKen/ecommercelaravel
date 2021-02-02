<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Log
 * @package App\Models
 * @version June 17, 2019, 1:04 pm UTC
 *
 * @property integer user_id
 * @property string description
 * @property string info_compl
 */
class Log extends Model
{
    use SoftDeletes;

    public $table = 'logs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'description',
        'info_compl'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'description' => 'string',
        'info_compl' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function user(){
        return $this->belongsTo(UserModel::class, 'user_id');
  }
    
}
