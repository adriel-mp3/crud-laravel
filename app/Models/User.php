<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'nome_social', 'cpf_cnpj', 'foto', 'data_nascimento'
    ];
}
