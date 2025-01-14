<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tus propios estilos CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <img src="{{ asset('images/logo.jpg') }}" alt="Descripción de la imagen">
            <ul>
                <li><a href="#">Informacion de la cuenta</a></li>
                <li><a href="../views/cambio_de_contraseña.php">Cambiar Contraseña</a></li>
                <li><a href="../controllers/logout.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light vh-100">
                <ul class="nav flex-column py-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empleado.index') }}">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('det_orden.index') }}">Detalle Orden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orden.index') }}">Ordenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('producto.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transporte.index') }}">Transportistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedor.index') }}">Proveedores</a>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <div class="py-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
