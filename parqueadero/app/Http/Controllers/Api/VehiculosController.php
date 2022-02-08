<?php

namespace App\Http\Controllers\Api;

use App\Propietarios;
use App\Vehiculos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vehiculos::all();
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
        $propietarios = $request[0];

        //Validacion de eerores de propietarios
        $validator = Validator::make($propietarios, [
            'identificacion' => 'required',
            'nombres' => 'required',
        ]);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return response()->json($failedRules, 400);
        }



        //Validacion de eerores de vehiculos
        $vehiculos = $request[1];
        $validation = Validator::make($vehiculos, [
            'placa' => ['required', Rule::unique('vehiculos', 'placa')],
            'marca' => 'required',

        ]);
        if ($validation->fails()) {
            $failedRules = $validation->failed();
            return response()->json($failedRules, 400);
        }

        //Guarda propietario
        $propietario = Propietarios::create($propietarios);

        $vehiculos["idPropietario"] = $propietario->id;
        $vehiculos["marca"] = mb_convert_case($vehiculos["marca"], MB_CASE_TITLE, "UTF-8");
        //Guarda Vehiculo
        $vehiculo = Vehiculos::create($vehiculos);
        $response = array($vehiculo, $propietario);
        return response()->json($response, 201);
    }

    /**
     * Muestra una lista de vehiculos por placa, con la informacion de su propietario
     *
     * @return \Illuminate\Http\Response
     */
    public function listarfiltros($busqueda = '', $parametro = '')
    {
        switch ($busqueda) {
            case 'placa':
                $vBusqueda = 'vehiculos.placa';
                break;
            case 'cedula':
                $vBusqueda = 'propietarios.identificacion';
                break;
            case 'nombre':
                $vBusqueda = 'propietarios.nombres';
                break;
            default:
            if($busqueda=='*'){
            $vBusqueda=$busqueda;
            }else{
                $response=array("Por favor escriba un valor correcto para el parametro campo de busqueda");
                return response()->json($response,400);
            }
                break;
        }
        if ($vBusqueda != '*') {
            $resultado = Vehiculos::join("propietarios", "propietarios.id", "=", "vehiculos.idPropietario")
                ->select("*")
                ->where($vBusqueda, "=", $parametro)
                ->get();
        } else {
            $resultado = Vehiculos::join("propietarios", "propietarios.id", "=", "vehiculos.idPropietario")
                ->select("*")
                ->get();
        }
       // return $resultado;
        //echo json_encode($resultado);
        return response()->json($resultado,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
