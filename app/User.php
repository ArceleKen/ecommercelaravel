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


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'login',
        'apikey',
        'apitoken',
        'debut',
        'fin'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string',
        'login' => 'string',
        'apikey' => 'string',
        'apitoken' => 'string',
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
