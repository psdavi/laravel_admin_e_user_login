<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atas extends Model
{
    protected $table='atas';
    protected $fillable=[
    'id_user',
    'titulo',
    'setor',
    'pauta',
    'emissor',
    'email',
    'descricao',
    'participantes',
    'convidados',
    'conteudo'
    ];

    use HasFactory;

    public function relUsers(){

        return $this->hasOne('App\Models\User','id', 'id_user');
    }
}
