<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /** @var array ajout  */

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //protected $dates = ['deleted_at'];
    
    public $fillable = [
        'name',
        'email',
        'password',
        'number',
        'login',
        'type',
        'debut',
        'fin'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'number' => 'string',
        'login' => 'string',
        'type' => 'string',
        'debut' => 'string',
        'fin' => 'string',
    ];

    public static $rules = [

    ];

    /* fin  ajout */

    /*
    protected $fillable = [
        'name', 'email', 'password', 'login', 'apikey', 'apitoken'
    ]; */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
