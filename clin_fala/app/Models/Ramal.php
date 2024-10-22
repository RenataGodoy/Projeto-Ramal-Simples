<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ramal extends Model
{
    protected $table = 'ramais';

    protected $fillable = ['ramal'];

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'ramal_id');
    }
}

