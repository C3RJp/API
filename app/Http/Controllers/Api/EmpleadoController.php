<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();

        // if ($students->isEmpty()) {
        //     $data = [
        //         'message' => 'No se encontraron estudiantes',
        //         'status' => 200
        //     ];
        //     return response()->json($data, 404);
        // }

        $data = [
            'empleados' => $empleados,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $empleado = Empleado::create([
            'cedula' => $request->cedula,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'clave' => $request->clave
        ]);

        if (!$empleado) {
            $data = [
                'message' => 'Error al crear el empleado',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'empleado' => $empleado,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $empleado,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $empleado->cedula = $request->cedula;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->correo = $request->correo;
        $empleado->direccion = $request->direccion;
        $empleado->celular = $request->celular;
        $empleado->clave = $request->clave;


        $empleado->save();

        $data = [
            'message' => 'Empleado actualizado',
            'student' => $empleado,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $empleado->delete();

        $data = [
            'message' => 'Empleado eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
