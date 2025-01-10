<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard-container {
            display: flex;
            justify-content: space-between;
        }

        .dashboard-section {
            flex: 1;
            margin: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .dashboard-section.cards-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .dashboard-section.cards-section .card {
            flex: 0 0 calc(25% - 10px);
        }
    </style>
</head>
<body>
    <!--LISTON NEGRO DEL DASHBOARD-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PAGINA DE INICIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center">Bienvenidos</h1>

    <div class="container-fluid">
        @php
        $cards = [
            [
                'route' => 'categorias',
                'title' => 'Categoria',
                'color' => 'primary'
            ],
            [
                'route' => 'cliente',
                'title' => 'Cliente',
                'color' => 'success'
            ],
            [
                'route' => 'empleado',
                'title' => 'Empleado',
                'color' => 'warning'
            ],
            [
                'route' => 'det_orden',
                'title' => 'Detalle Orden',
                'color' => 'danger'
            ],
            [
                'route' => 'orden',
                'title' => 'Orden',
                'color' => 'info'
            ],
            [
                'route' => 'producto',
                'title' => 'Producto',
                'color' => 'dark'
            ],
            [
                'route' => 'transporte',
                'title' => 'Transportista',
                'color' => 'dark'
            ],
            [
                'route' => 'proveedor',
                'title' => 'Proveedor',
                'color' => 'primary'
            ]
        ];
        @endphp


<div class="dashboard-container">
    <div class="dashboard-section" style="flex: 0 0 15%;">
        <h3>SECCION D</h3>
    </div>

    <div class="dashboard-section cards-section" style="flex: 0 0 70%;">
        @foreach($cards as $card)
        <div class="card text-white bg-{{ $card['color'] }}">
            <div class="card-body">
                <h5 class="card-title">{{ $card['title'] }}</h5>
            </div>
        </div>
        @endforeach
    </div>

    <div class="dashboard-section" style="flex: 0 0 15%;">
        <h3>SECCION A</h3>
    </div>
</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
