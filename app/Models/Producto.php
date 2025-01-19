<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    public $timestamps=true;
    protected $primaryKey='ProductoID';
    protected $fillable=['nombreProducto','Cantidad','Precio'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'CategoriaID');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'ProveedorID');
    }

}


