<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Docente;

class Materia extends Model
{
    use SoftDeletes;

    protected $table='materia';
    protected $fillable=[ // campos para asignacion masiva
      'nombre',
    ];
  
    protected $guarded= [ // campos para proteger
  
    ];
  
    public function docentes(){
      return $this->belongsToMany(Docente::class, 'docente_materia',
         'materia_id','docente_id');
    }
}
