<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetasModel extends Model
{
    use HasFactory;
    protected $table= 'recetas';
    protected $primaryKey='idRecetas';
    protected $fillable=['tipo_receta','descripcion_tratamiento','idConsultas','created_at'];
}
