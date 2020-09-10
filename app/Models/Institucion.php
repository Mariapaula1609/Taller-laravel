<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;
Use App\Models\Rector;
class Institucion extends Model
{
    use SoftDeletes;

    protected $table='institucion';
    protected $fillable=[ // campos para asignacion masiva
      'nombre',

    ];

    protected $guarded= [ // campos para proteger
      'codigo',
      'cuenta_bancaria',
    ];

    public function rector(){
      return $this->hasOne(Rector::class,'institucion_id');
    }

    public function docentes(){
      return $this->hasMany(Docente::class,'institucion_id');
    }
}
