<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodologia extends Model
{
    use HasFactory;
    protected $table = "metodologia";

    protected $fillable = [
        'id',
        'met_nombre',
    ];

    public function programas(){
        return $this->hasMany(Programa::class, 'id');
    }

}
