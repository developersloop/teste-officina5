<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'name', 'email', 'telefone','data_nascimento','user_id'
    ];
}
