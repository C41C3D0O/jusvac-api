<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UsuariosApiRequest;
use App\Http\Response\Api\JsonHttpResponse;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuarioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios =Usuarios::get();
        return JsonHttpResponse::successResponse($usuarios, 'success');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuariosApiRequest $request)
    {
        
        $usuarios = Usuarios::create([
            "nombre"=> $request->nombre,
            "correo"=> $request->correo,
            "cedula"=> $request->cedula,
            "contrasena"=> $request->contrasena
        ]);

        return JsonHttpResponse::successResponse($usuarios, 'creado');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarios = Usuarios::where("id", $id)->first();
        return JsonHttpResponse::successResponse($usuarios, 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuariosApiRequest $request, string $id)
    {
        $usuarios = Usuarios::where ('id',$id) -> update([
            "nombre"=> $request->nombre,
            "correo"=> $request->correo,
            "cedula"=> $request->cedula,
            "contrasena"=> $request->contrasena
        ]);
        return JsonHttpResponse::successResponse($usuarios, 'actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios = Usuarios::where ('id',$id) -> delete();
        return JsonHttpResponse::successResponse($usuarios, 'eliminado');;
    }
}
