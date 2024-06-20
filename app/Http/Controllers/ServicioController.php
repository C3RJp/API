<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicio;

class ServicioController extends Controller
{
    public function general()
    {
        $servicio=servicio::all();
        $respouesta=
        [
            'servicio'=>$servicio,
            'estado'=>200
        ];
        return response()->json($respouesta, 200);
    }

    public function show($id)
    {
        $servicio = servicio::find($id);

        if (!$servicio) {
            $data = [
                'message' => 'servicio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'servicio' => $servicio,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $servicio = servicio::create([
            'tipo' => $request->tipo,
            'cedulaEmpleado' => $request->cedulaEmpleado,
            'cedulaCliente' => $request->cedulaCliente,
            'adicionales' => $request->adicionales,
            'cuotas' => $request->cuotas,
            'valorAdicional' => $request->valorAdicional,
            'valorTotal' => $request->valorTotal
        ]);

        if (!$servicio) {
            $data = [
                'message' => 'Error al crear el servicio',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'cliente' => $servicio,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $servicio = servicio::find($id);

        if (!$servicio) {
            $data = [
                'message' => 'servicio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $servicio->tipo = $request->tipo;
        $servicio->cedulaEmpleado = $request->cedulaEmpleado;
        $servicio->cedulaCliente = $request->cedulaCliente;
        $servicio->adicionales = $request->adicionales;
        $servicio->cuotas = $request->cuotas;
        $servicio->valorAdicional = $request->valorAdicional;
        $servicio->valorTotal = $request->valorTotal;


        $servicio->save();

        $data = [
            'message' => 'servicio actualizado',
            'student' => $servicio,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $servicio = servicio::find($id);

        if (!$servicio) {
            $data = [
                'message' => 'servicio no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $servicio->delete();

        $data = [
            'message' => 'servicio eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
