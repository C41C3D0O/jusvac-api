<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ConsultaMedicaApiRequest;
use App\Http\Response\Api\JsonHttpResponse;
use App\Models\ConsultaMedica;
use Illuminate\Http\Request;

class ConsultaMedicaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultamedica=ConsultaMedica::get();
        return JsonHttpResponse::successResponse($consultamedica, 'success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultaMedicaApiRequest $request)
    {
        
        $consultamedica = ConsultaMedica::create([
            "nombre_paciente"=> $request->nombre_paciente,
            "ubicacion"=> $request->ubicacion,
            "telefono"=> $request->telefono,
            "sintomas_paciente"=> $request->sintomas_paciente,
            "fecha_consulta"=> $request->fecha_consulta,
            "hora_consulta"=> $request->hora_consulta
        ]);

        return JsonHttpResponse::successResponse($consultamedica, 'creado');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consultamedica = ConsultaMedica::where("id", $id)->first();
        return JsonHttpResponse::successResponse($consultamedica, 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultaMedicaApiRequest $request, string $id)
    {
        $consultamedica = ConsultaMedica::where ('id',$id) -> update([
            "nombre_paciente"=> $request->nombre_paciente,
            "ubicacion"=> $request->ubicacion,
            "telefono"=> $request->telefono,
            "sintomas_paciente"=> $request->sintomas_paciente,
            "fecha_consulta"=> $request->fecha_consulta,
            "hora_consulta"=> $request->hora_consulta
        ]);
        return JsonHttpResponse::successResponse($consultamedica, 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consultamedica = ConsultaMedica::where ('id',$id) -> delete();
        return JsonHttpResponse::successResponse($consultamedica, 'eliminado');;
    }
}
