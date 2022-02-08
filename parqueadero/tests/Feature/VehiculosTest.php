<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Monolog\Formatter\JsonFormatter;
use Tests\TestCase;

class VehiculosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/vehiculos/listartodos');

        $response->assertStatus(200);
    }
    public function testFiltro()
    {
        $response = $this->get('/api/vehiculos/filtros/placa/FRG287');

        $response->assertStatus(200);
    }

    public function testGuardar()
    {

        $vBody='[
            {
                "nombres": "Albert",
                "apellidos": "Gomez",
                "identificacion": "44887777"
            },
            {
                "placa": "FR74666",
                "marca": "chevrolet",
                "modelo": "2023",
                "color": "Azul"
            }
        ]';

        $myArray = json_decode($vBody, true);
        $response = $this->post('/api/vehiculos/guardar',$myArray);

        $response->assertStatus(201);
    }
}
