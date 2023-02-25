<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio'];

    public function buscarPorNombre($nombre)
    {
        return $this->where('nombre', 'LIKE', '%' . $nombre . '%')->get();
    }

    public function buscarPorRangoPrecio($minPrecio, $maxPrecio)
    {
        return $this->whereBetween('precio', [$minPrecio, $maxPrecio])->get();
    }
}
