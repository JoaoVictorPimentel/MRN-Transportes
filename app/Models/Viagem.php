<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;

    protected $fillable = ['motorista_id', 'caminhao_id', 'destino'];

    public function caminhoes() {
        return $this->hasOne('App\Models\Camimnhao');
    }

    public function motoristas() {
        return $this->hasOne('App\Models\Motorista');
    }
}
