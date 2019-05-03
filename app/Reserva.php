<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'data_reserva', 'hora_inicio','hora_fim','user_id','equipamento_id'
    ];
}
