<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacientesModel extends Model
{
    use HasFactory;

    protected $table = 'pacientes'; 
    protected $primaryKey = 'idPacientes'; 
    protected $fillable = ['nombre_paciente','apellido_paciene', 'dui_paciente', 'edad']; 
}
