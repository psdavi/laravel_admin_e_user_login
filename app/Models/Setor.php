<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;

    protected $table='setor';

    protected $fillable = [
        'nome',
        'id_user'
    ];

    public function relUsers(){

        return $this->hasOne('App\Models\User','id', 'id_user');
    }
}