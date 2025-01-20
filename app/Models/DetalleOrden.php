<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleOrden extends Model
{

    use HasFactory;
    protected $table = 'detalle_orden';
    public $timestamps=true;
    protected $primaryKey='DetalleOrdenID';
    protected $fillable=['cantidad'];
    public function orden()
    {
        return $this->belongsTo(Orden::class,'OrdenID');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class,'ProductoID');
    }

}
