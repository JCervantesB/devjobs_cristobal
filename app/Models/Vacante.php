<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Candidato;
use App\Models\User;


class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario',
        'categoria',
        'empresa',
        'ultimo_dia',
        'descripcion',  
        'imagen',
        'user_id'
 ];

 public function candidatos(){
    return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');

 }

 
 public function reclutador(){
     //Una vacante pertenece  un usuario
     return $this->belongsTo(User::class, 'user_id');
 }


}
