<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhao extends Model
{
    use HasFactory;

    protected $table = 'caminhoes';

    protected $fillable = ['placa', 'modelo'];

    public function motoristas(){
        return $this->belongsToMany(Motorista::class, 'viagems');
    }
}
