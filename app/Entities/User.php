<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $table = 'users';
    protected $fillable = ["id_cpf" , "name" , "adress" , "cep" , "lat" , "lon" , "email" , "password" , "permission"];

    protected $hidden = ['password', 'remember_token',];

    public function setPasswordAttribute( $value){
        $this-> attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

}