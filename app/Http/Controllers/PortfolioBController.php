<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioBController extends Controller
{
    /**
     * Display a listing of the proyectos.
     * 
     * Listar los proyectos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $portafolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4'],
         ];

        return view('portfolio', compact('portafolio')); //devolvemos la vista y la variable
    }

    /**
     * Show the form for creating a new proyecto.
     * 
     * Crear un nuevo proyecto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Almacenar un proyecto en la BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * Mostrar el proyecto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     * Editar un proyecto
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * Guardar cambios del formulario de edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * Eliminar un proyecto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
