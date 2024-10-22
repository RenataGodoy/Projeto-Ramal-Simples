<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas'; 

    protected $fillable = ['nome', 'local', 'setor', 'ramal_id']; 
 
    public function ramal()
    {
        return $this->hasOne(Ramal::class, 'id'); 
    }
}
