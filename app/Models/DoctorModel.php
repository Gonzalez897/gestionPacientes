<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    use HasFactory;

    protected $table = 'doctores'; 
    protected $primaryKey = 'idDoctores'; 
    protected $fillable = ['idEmpleados', 'especializacion', 'disponibilidad']; 
}
