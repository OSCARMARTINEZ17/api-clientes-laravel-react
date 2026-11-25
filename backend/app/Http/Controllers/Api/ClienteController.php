<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * GET /api/clientes — listar todos los clientes.
     */
    public function listar()
    {
        $clientes = Cliente::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Lista de clientes',
            'data' => $clientes,
        ], 200);
    }

    /**
     * POST /api/clientes — crear un cliente.
     */
    public function crear(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'required|string|max:100',
            'activo' => 'boolean',
        ]);

        $cliente = Cliente::create($datos);

        return response()->json([
            'success' => true,
            'message' => 'Cliente creado correctamente',
            'data' => $cliente,
        ], 201);
    }

    /**
     * GET /api/clientes/{cliente} — ver un cliente.
     */
    public function ver(Cliente $cliente)
    {
        return response()->json([
            'success' => true,
            'message' => 'Cliente encontrado',
            'data' => $cliente,
        ], 200);
    }

    /**
     * PUT/PATCH /api/clientes/{cliente} — actualizar un cliente.
     */
    public function actualizar(Request $request, Cliente $cliente)
    {
        $datos = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:clientes,correo,' . $cliente->id,
            'telefono' => 'sometimes|required|string|max:20',
            'direccion' => 'sometimes|nullable|string|max:255',
            'ciudad' => 'sometimes|required|string|max:100',
            'activo' => 'sometimes|boolean',
        ]);

        $cliente->update($datos);

        return response()->json([
            'success' => true,
            'message' => 'Cliente actualizado correctamente',
            'data' => $cliente,
        ], 200);
    }

    /**
     * DELETE /api/clientes/{cliente} — eliminar un cliente.
     */
    public function eliminar(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cliente eliminado correctamente',
        ], 200);
    }
}