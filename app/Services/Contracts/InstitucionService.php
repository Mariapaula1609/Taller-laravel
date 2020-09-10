<?php
namespace App\Services\Contracts;
 
use Illuminate\Http\Request;
use App\Models\Institucion;
use Illuminate\Database\Eloquent\Collection;

interface InstitucionService{
    public function registrarInstitucion(Request $resquest):Institucion;
    public function listarInstituciones():Collection;    
}