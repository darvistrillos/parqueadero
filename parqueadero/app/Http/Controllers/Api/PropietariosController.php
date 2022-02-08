<?php

namespace App\Http\Controllers\Api;

use App\Propietarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:products|max:255',
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required',
        ]);
        $propietario = Propietarios::create($request->all());

        return response()->json($propietario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function show(Propietarios $propietarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietarios $propietarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietarios $propietarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietarios $propietarios)
    {
        //
    }
}
