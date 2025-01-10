<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Órdenes</title>
    <style>
        body {
            justify-content: center;
            align-items: center;
            display: flex;
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
        }
        .contenedor {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: black;
            color: white;
        }
        .listaimg {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            padding: 10px 20px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #6C3483;
        }
        .edit-button, .delete-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="listaimg">
            <h1>Lista de Productos</h1>
            <div class="imagen">
                <img src="../../views/img/error.jpg" width="100px">
            </div>
        </div>

        <table>
            <tr>
                <th>ProductID</th>
                <th>Name Categoria</th>
                <th>Nombre Proveedor</th>
                <th>Unidades</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Actions</th>
            </tr>

            <?php
                include '../../models/conexion.php';
                $conexion = new Conexion();
                    $conn = $conexion->getConexion();

                    $sql = "SELECT  
                                products.ProductID,
                                categories.CategoryName,
                                suppliers.SupplierName,
                                products.Unidad,
                                products.ProductName,
                                products.Price
                            FROM products 
                            JOIN categories ON products.CategoryID = categories.CategoryID
                            JOIN suppliers ON products.SupplierID = suppliers.SupplierID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $rowNumber = 1; // Iniciar contador de filas
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["ProductID"] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($row["CategoryName"] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($row["SupplierName"] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($row["ProductName"] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($row["Unidad"] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($row["Price"] ?? '') . "</td>";
                            echo "<td>";
                            echo "<a href='../../controllers/ProductController.php?option=edit&id=" . $row["ProductID"] . "' class='edit-button'>Editar</a> ";
                            echo "<a href='../../controllers/ProductController.php?option=delete&id=" . $row["ProductID"] . "' class='delete-button'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                            $rowNumber++; // Incrementar número de fila
                        }
                    } else {
                        echo "<tr><td colspan='8'>No se encontraron registros</td></tr>";
                    }

                    $conn->close();
                    ?>
        </table>
        <br><br>
        <a href="../../views/registro_tabla/Products.php">Registrar nueva orden</a><br><br>
        <button type="button" onclick="window.location.href='../dashboard.php'">Volver a inicio</button>
    </div>
</body>
</html>
