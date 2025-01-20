<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{

    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'EmpleadoID	';
    public $timestamps='true';
    protected $fillable=['Empleadonombre','fecha_nacimiento','foto'];
}
