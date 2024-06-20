<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function general()
    {
        $cliente=Cliente::all();
        $respouesta=
        [
            'Cliente'=>$cliente,
            'Estado'=>200
        ];
        return response()->json($respouesta, 200);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $cliente,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create([
            'cedula' => $request->cedula,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'clave' => $request->clave
        ]);

        if (!$cliente) {
            $data = [
                'message' => 'Error al crear el cliente',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'cliente' => $cliente,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $cliente->cedula = $request->cedula;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->direccion = $request->direccion;
        $cliente->celular = $request->celular;
        $cliente->clave = $request->clave;


        $cliente->save();

        $data = [
            'message' => 'cliente actualizado',
            'student' => $cliente,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'cliente no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $cliente->delete();

        $data = [
            'message' => 'cliente eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
