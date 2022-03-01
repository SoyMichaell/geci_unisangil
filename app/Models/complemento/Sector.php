<?php

namespace App\Models\complemento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = "compl_sector";

    protected $fillable = [
        'id',
        'cose_nombre',
    ];

}
