<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitasModel extends Model
{
    use HasFactory;
    protected $table= 'citas';
    protected $primaryKey='idCitas';
    protected $fillable=['idCitas','nombre_cita','motivo','fecha_cita','idPacientes','idDoctores','created_at'];
}
