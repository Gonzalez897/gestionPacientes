<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultasModel extends Model
{
    use HasFactory;
    protected $table= 'consultas';
    protected $primaryKey='idConsultas';
    protected $fillable=['nombre_consultas','descripcion','f_consultas','idPacientes','idDoctores','created_at'];
}
