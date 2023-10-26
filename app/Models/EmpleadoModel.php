<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoModel extends Model
{
    use HasFactory;

    protected $table = 'empleados'; 
    protected $primaryKey = 'idEmpleados'; 
    protected $fillable = ['nombre','apellido', 'dui', 'cargo', 'f_nacimiento','id'];

    
}
