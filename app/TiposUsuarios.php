<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposUsuarios extends Model
{
    protected $fillable = ['usuarios_rol',];


    public function users()
     {

     	 return $this->hasMany(User::class);

     }
  
}


