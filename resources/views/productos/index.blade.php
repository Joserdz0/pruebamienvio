<!DOCTYPE html>
<html>
<head>
    <title>Lista de productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
    }
</style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Lista de productos</h1>

        <div class="row mb-3">
            <div class="col-12 col-md-6 mb-3">
                <form method="POST" action="{{ route('productos.buscar') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar por nombre">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="min_precio" name="min_precio" placeholder="Precio mínimo">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="max_precio" name="max_precio" placeholder="Precio máximo">
                        <button type="submit" class="btn btn-secondary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>${{ $producto->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('productos.create') }}" class="btn btn-secondary">Agregar nuevo producto</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>
</html>
