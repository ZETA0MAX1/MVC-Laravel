<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{

    use HasFactory;
    protected $table = 'proveedor';
    protected $primaryKey = 'ProveedorID';
    public $timestamps=true;
    protected $fillable=['Direccion','Ciudad','Pais','Celular'];
}
