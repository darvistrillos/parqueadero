<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';
    public function rules()
    {
        return [
            [['placa', 'idPropietario'], 'required', 'message' => 'Placa e id del propietario son obligatorios'],
            [['placa'], 'unique', 'message' => 'Ya existe esa placa'],
        ];
    }
    protected $fillable = ['placa', 'marca', 'modelo', 'color', 'idPropietario'];
}
