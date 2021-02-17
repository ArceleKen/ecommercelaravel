<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class UserModel
 * @package App\Models
 * @version December 4, 2017, 4:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property string login
 * @property string apikey
 * @property string apitoken
 */
//class UserModel extends Model
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserModel extends Model
{
    use SoftDeletes;
    use HasRoles;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];
    protected $guard_name = 'web';


    public $fillable = [
        'name',
        'email',
        'password',
        'type',
        'debut',
        'fin'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'type' => 'string',
        'debut' => 'string',
        'fin' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
