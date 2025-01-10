<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorías</title>
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
            <h1>Lista de Clientes</h1>
            <div class="imagen">
                <img src="../../views/img/error.jpg" width="100px">
            </div>
        </div>

        <table>
            <tr>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Contacto Nombre</th>
                <th>Pais</th>
                <th>CustomerID</th>
                <th>CustomerName</th>
                <th>PostalCode</th>
            </tr>

            <?php
                include '../../models/conexion.php';
                $conexion = new Conexion();
                $conn = $conexion->getConexion();
                $sql = "SELECT Addresss, City, ContactName,Country,CustomerID,CustomerName,PostalCode FROM customers"; // Usar el nombre correcto aquí
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["Addresss"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["City"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["ContactName"]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row["Country"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["CustomerID"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["CustomerName"]) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row["PostalCode"]) . "</td>"; 
                        echo "<td>";
                        echo "<a href='../../controllers/CustomerController.php?option=edit&id=" . $row["CustomerID"] . "' class='edit-button'>Editar</a> ";
                        echo "<a href='../../controllers/CustomerController.php?option=delete&id=" . $row["CustomerID"] . "' class='delete-button'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron registros</td></tr>";
                }

                $conn->close();
            ?>
        </table>
        <br><br>
        <a href="../../views/registro_tabla/Customers.php">Registrar nueva categoría</a><br><br>
        <button type="button" onclick="window.location.href='../dashboard.php'">Volver a inicio</button>
    </div>
</body>
</html>
