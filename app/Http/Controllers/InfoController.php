<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $infos = Info::all();
        return view('info', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            //quien soy (description)
            'description' => 'required|string',
            // mi experiencia (experience)
            'experience' => 'required|string',
            // linkedIn (linkedin)
            'linkedin' => 'required|url',
            // github (github)
            'github' => 'required|url',
            // location (location)
            'location' => 'required|string',
        ]);

        dd('Validación pasada');

        try {
            Info::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
                'experience' => $request->experience,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
                'location' => $request->location,
            ]);
    
            // Depuración: Verifica que el registro se creó correctamente
            dd('Registro creado');
        } catch (\Exception $e) {
            // Depuración: Muestra el error si ocurre una excepción
            dd('Error al crear el registro: ' . $e->getMessage());
        }

        return redirect()->route('info')->with('success', 'Información agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(info $info)
    {
        Info::destroy($info->id);
        return redirect()->route('dashboard')->with('success', 'Información eliminada.');
    }
}
