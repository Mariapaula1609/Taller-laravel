<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;
use App\Models\Materia;

class Docente extends Model
{
  use SoftDeletes;

  protected $table='docente';
  protected $fillable=[ // campos para asignacion masiva
    'nombre',
  ];

  protected $guarded= [ // campos para proteger
    'codigo',
    'institucion_id',
  ];

  public function institucion(){
    return $this->belongsTo(Institucion::class,'institucion_id');
  }

  public function materias(){
    return $this->belongsToMany(Materia::class, 'docente_materia',
      'docente_id', 'materia_id')->withPivot(['estado']);
  }
}
