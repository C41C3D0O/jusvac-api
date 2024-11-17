<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuarios =Usuarios::get();
        return response()->json($usuarios);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $usuarios = Usuarios::create([
            "nombre"=> $request->nombre,
            "correo"=> $request->correo,
            "contrasena"=> $request->contrasena
        ]);

        return response()->json(data: $usuarios);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuarios = Usuarios::where("id", $id)->first();
        return response()->json(data: $usuarios);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuarios = Usuarios::where ('id',$id) -> update([
            "nombre"=> $request->nombre,
            "correo"=> $request->correo,
            "contrasena"=> $request->contrasena
        ]);
        return response()->json(data: $usuarios);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios = Usuarios::where ('id',$id) -> delete();
        return response()->json(data: $usuarios);
    }
}
