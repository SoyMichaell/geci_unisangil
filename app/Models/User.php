<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "persona";

    protected $fillable = [
            'id',
            'per_tipo_documento',
            'per_numero_documento',
            'per_nombre',
            'per_apellido',
            'per_telefono',
            'per_correo',
            'password',
            'per_departamento',
            'per_ciudad',
            'per_tipo_usuario',
            'per_id_estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tiposusuario(){
        return $this->belongsTo(TipoUsuario::class, 'per_tipo_usuario');
    }

    public function programas(){
        return $this->hasMany(Programa::class, 'id');
    }

    public function trabajos(){
        return $this->hasMany(Trabajo::class, 'id');
    }

    public function horarios(){
        return $this->hasMany(ProgramaHorario::class, 'id');
    }

    public function participantes(){
        return $this->hasMany(ExtParticipante::class, 'id');
    }

    public function practicas(){
        return $this->hasMany(Practica::class, 'id');
    }

    public function softwarecurso(){
        return $this->hasMany(SoftwareRecurso::class, 'id');
    }

    public function internacionalizacioncurriculo(){
        return $this->hasMany(ExtInternacionalizacionCurriculo::class , 'id');
    }

}
