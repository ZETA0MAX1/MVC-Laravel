<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'ClienteID';
    public $timestamps=true;
    protected $fillable =['cLienteNombre','ciudad','pais'];
}
