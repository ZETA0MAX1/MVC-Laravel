<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;
    protected $table = 'transportista';
    protected $primaryKey = 'transportistaID';
    public $timestamps=true;
    protected $fillable=['NombreTransportista','Ciudad','Celular'];
}
