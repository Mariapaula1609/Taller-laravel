<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Institucion;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rector extends Model
{
    use SoftDeletes;

    protected $table='rector';
    protected $fillable=[ // campos para asignacion masiva
      'nombre',
    ];
  
    protected $guarded= [ // campos para proteger
      'codigo',
      'institucion_id',
    ];
  
    public function institucion(){
      return $this->belongsTo(Institucion::class, 'institucion_id');
    }
}
