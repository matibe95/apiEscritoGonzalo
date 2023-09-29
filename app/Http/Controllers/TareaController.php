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

    public function listarUnaTarea(Request $request)
    {
        $Tarea = Tarea::findOrFail($request->post("id"));
        return $Tarea;
    }
    public function crearTarea(Request $request)
    {
        var_dump($request->post("titulo"));
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
        try {
            $Tarea = Tarea::findOrFail($request->post("id"));
            $Tarea->titulo = $request->post('titulo');
            $Tarea->contenido = $request->post('contenido');
            $Tarea->estado = $request->post('estado');
            $Tarea->autor = $request->post('autor');

            $Tarea->save();
        } catch (\Throwable $th) {
            return ['message' => $th];
        }
    }
    public function eliminarTarea(Request $request)
    {
        $SelectedTask = Tarea::findOrFail($request->post("id"));
        $SelectedTask->delete();

        return response([
            'message' => "Task Eliminated Correctly"
        ]);
    }
}