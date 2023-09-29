<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function listarTareas()
    {
        return Tarea::all();
    }
    public function crearTarea(Request $request)
    {
        try {
            $Tarea = new Tarea();

            $Tarea->titulo = $request->post('titulo');
            $Tarea->contenido = $request->post('contenido');
            $Tarea->estado = $request->post('estado');
            $Tarea->autor = $request->post('autor');

            $Tarea->save();
            return $Tarea;
        } catch (\Throwable $th) {
            return ['message' => $th];
        }
    }
    public function editarTarea(Request $request)
    {
        $Usuario = Tarea::findOrFail($request->post("id_user"));
        // return Tarea::all();
    }
    public function eliminarTarea()
    {
        return Tarea::all();
    }
}