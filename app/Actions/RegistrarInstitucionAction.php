<?php

namespace App\Actions;
use App\Models\Institucion;

class RegistrarInstitucionAction
{
    public static function execute($data):Institucion{
        $institucion = Institucion::make([   //funcion de asignacion masiva
            'nombre'=>$data['nombre'],
            //'codigo'=>$data['codigo'],
        ]);
        $institucion->codigo = $data['codigo']; //como el codigo no es un valor de asignacion masiva debe ser declarado asi
        $institucion->cuenta_bancaria=$data['cuenta_bancaria'];
        $institucion->save();
        return $institucion;
    }
}