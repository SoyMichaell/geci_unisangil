<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "departamento";

    protected $fillable = ['id','dep_nombre'];

    public function municipio(){
        return $this->hasMany(Municipio::class, 'id');
    }

}
