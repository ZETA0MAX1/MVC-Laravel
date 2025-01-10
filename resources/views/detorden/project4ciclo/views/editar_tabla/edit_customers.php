<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
        }
        .contenedor {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: 0 auto;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Editar Cliente</h2>

        <?php
        
        include_once("../models/CustomerModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            $cliente = CustomerModel::getClienteById($id);

            if($cliente) {
                
                ?>

<form action="../controllers/CustomerController.php?option=editar" method="POST">
    <input type="hidden" name="option" value="edit">
    <input type="hidden" name="id" value="<?php echo isset($cliente['CustomerID']) ? htmlspecialchars($cliente['CustomerID']) : ''; ?>">

    <label for="name">Nombre del cliente:</label><br>
    <input type="text" id="name" name="name" value="<?php echo isset($cliente['CustomerName']) ? htmlspecialchars($cliente['CustomerName']) : ''; ?>"><br><br>

    <label for="ContactName">Nombre de Contacto:</label><br>
    <input type="text" id="ContactName" name="ContactName" value="<?php echo isset($cliente['ContactName']) ? htmlspecialchars($cliente['ContactName']) : ''; ?>"><br><br>

    <label for="address">Dirección:</label><br>
    <input type="text" id="address" name="address" value="<?php echo isset($cliente['Addresss']) ? htmlspecialchars($cliente['Addresss']) : ''; ?>"><br><br>

    <label for="city">Ciudad:</label><br>
    <input type="text" id="city" name="city" value="<?php echo isset($cliente['City']) ? htmlspecialchars($cliente['City']) : ''; ?>"><br><br>

    <label for="postal_code">Código Postal:</label><br>
    <input type="text" id="postal_code" name="postal_code" value="<?php echo isset($cliente['PostalCode']) ? htmlspecialchars($cliente['PostalCode']) : ''; ?>"><br><br>

    <label for="country">País:</label><br>
    <input type="text" id="country" name="country" value="<?php echo isset($cliente['Country']) ? htmlspecialchars($cliente['Country']) : ''; ?>"><br><br>

    <input type="submit" value="Guardar Cambios">
</form>

                <?php
            } else {
                echo "No se encontró el cliente.";
            }
        } else {
            echo "Falta el parámetro ID.";
        }
        ?>
    </div>
</body>
