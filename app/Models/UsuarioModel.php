<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; 
    protected $primaryKey = 'idUsuarios'; 
    protected $fillable = ['usuario', 'clave', 'estado','idEmpleados']; 
}