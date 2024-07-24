<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'cnh', 'dt_nascimento'];

    public function caminhoes(){
        return $this->belongsToMany(Caminhao::class, 'viagems');
    }
}
