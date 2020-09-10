<?php

namespace App\Services;

use App\Actions\RegistrarInstitucionAction;
use App\Services\Contracts\InstitucionService;
use Illuminate\Http\Request;
use App\Models\Institucion;
use App\Validators\RegistrarInstitucionValidator;
use Illuminate\Database\Eloquent\Collection;
use App\Actions\registrarInstitucion;

class InstitucionServiceImpl implements InstitucionService{

    public function listarInstituciones():Collection{
        $instituciones = Institucion::with(['docentes','rector'])->get();
        return $instituciones;
    }
    public function registrarInstitucion(Request $request):Institucion{
        $data = $request->only(['nombre','codigo','cuenta_bancaria']); 
        RegistrarInstitucionValidator::execute($data);
        return RegistrarInstitucionAction::execute($data);
    }

}