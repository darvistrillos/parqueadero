<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietarios extends Model
{
    public $timestamps = false;
    protected $table = 'propietarios';
    public function rules()
    {
        return [
            [['nombres', 'identificacion'], 'required', 'message' => 'Nombre e identificación son obligatorios'],
        ];
    }

    protected $fillable = ['nombres', 'apellidos', 'identificacion'];
}
