<?php

namespace App\Http\Controllers\ApiSample;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  //los php al mismo nivel no se importan
use App\Models\Institucion;
use App\Services\Contracts\InstitucionService; 
use Venoudev\Results\Contracts\Result;
use App\Http\Resources\InstitucionResource;
use Venoudev\Results\ApiJsonResources\PaginatedResource;
class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $instService;
    protected $result;
    public function __construct(InstitucionService $service,Result $result){
        $this->instService = $service;
        $this->result = $result;
    }

    public function index()
    {
        //$institucion = Institucion::all();
        $institucion=$this->instService->listarInstituciones();
        $data = InstitucionResource::collection($institucion);
        $this->result->success();
        $this->result->setDescription('Listado de instituciones del cauca');
        $this->result->addMessage('LIST_DATA','Lista de modelos');
        //$this->result->addDatum('instituciones',$data);
        $this->result->addDatum('instituciones-paginadas',PaginatedResource::make($data->paginate(15), 'instituciones'));

        return $this->result->getJsonResponse();
        //return response()->json($institucion,200);  //enviar un json con su codigo de respuesta
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institucion=$this->instService->registrarInstitucion($request);
        $this->result->success();
        $this->result->setDescription('Institucion registrada correctamente');
        $this->result->addMessage('REGISTERED','institucion registrada');
        $this->result->addDatum('institucion', InstitucionResource::make($institucion));

        return $this->result->getJsonResponse();

        // Instanciar un result con ResultManager sin inyeccion de dependencias =>
        // $result_dos = ResultManager::createResult();
        // $result_dos->success();
        // $result_dos->setDescription('Institucion registrada correctamente');
        // $result_dos->addMessage('REGISTERED','institucion registrada');
        // $result_dos->addDatum('institucion', InstitucionResource::make($institucion));
        //
        // return $result_dos->getJsonResponse();
        //return response()->json($institucion,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
