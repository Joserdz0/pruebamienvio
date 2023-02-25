<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->save();
        return redirect()->route('productos.index');
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $minPrecio = $request->input('min_precio');
        $maxPrecio = $request->input('max_precio');
        $query = Producto::query();
    
        if (!empty($nombre)) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        }
    
        if (!empty($minPrecio)) {
            $query->where('precio', '>=', $minPrecio);
        }
        
        if (!empty($maxPrecio)) {
            $query->where('precio', '<=', $maxPrecio);
        }
    
        $productos = $query->orderBy('nombre')->get();
        return view('productos.index', compact('productos'));
    }
}
