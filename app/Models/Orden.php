<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orden extends Model
{

    use HasFactory;
    protected $table = 'ordenes';
    public $timestamps=true;
    protected $primaryKey='OrdenID';
    protected $fillable=['ClienteID','EmpleadoID','TransportistaID','fecha_orden'];
    protected $casts=['fecha_orden'=>'datetime'];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'ClienteID');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class,'EmpleadoID');
    }
    public function transportista()
    {
        return $this->belongsTo(Transporte::class,'TransportistaID');
    }
}
