<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Usuarios extends Model
{
    protected $fillable = ['user_id', 'usuario_ad', 'fecha', 'cargo', 'dependencia', 'dispo_afectado', 'numero_contacto', 'email', 'cedula','estado','falla_detectada'];


      public function user()
      {

        return  $this->belongsTo(User::class);

      }



}

