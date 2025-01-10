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
        <h2>Editar Ordenes</h2>

        <?php
        
        include_once("../models/OrderModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $category = OrderModel::getOrderById($id);
            
            if($category) {
                $shippers = OrderModel::getShippers();
                $employees = OrderModel::getEmployees();
                $customers = OrderModel::getCustomers();
                
                $selectedShipperID = isset($category['ShipperID']) ? $category['ShipperID'] : '';
                $selectedEmployeeID = isset($category['EmployeeID']) ? $category['EmployeeID'] : '';
                $selectedCustomerID = isset($category['CustomerID']) ? $category['CustomerID'] : '';
                
                
                ?>

            <form action="../controllers/OrderController.php?option=editar" method="POST">
                <input type="hidden" name="option" value="edit">
                <input type="hidden" name="OrderID" value="<?php echo htmlspecialchars($category['OrderID']); ?>">

                <label for="CustomerID">CustomerID:</label><br>
                <select id="CustomerID" name="CustomerID">
                    <?php foreach ($customers as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat['CustomerID']); ?>" 
                            <?php echo ($cat['CustomerID'] == $category['CustomerID']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['CustomerName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for="EmployeeID">EmployeeID:</label><br>
                <select id="EmployeeID" name="EmployeeID">
                    <?php foreach ($employees as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat['EmployeeID']); ?>" 
                            <?php echo ($cat['EmployeeID'] == $category['EmployeeID']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['EmployeeName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for="OrderDate">OrderDate:</label><br>
                <input type="text" id="OrderDate" name="OrderDate" value="<?php echo htmlspecialchars($category['OrderDate']); ?>"><br><br>

                <label for="ShipperID">ShipperID:</label><br>
                <select id="ShipperID" name="ShipperID">
                    <?php foreach ($shippers as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat['ShipperID']); ?>" 
                            <?php echo ($cat['ShipperID'] == $category['ShipperID']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['ShipperName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br><br>

                <input type="submit" value="Guardar Cambios">
            </form>
            <?php
            } else {
                echo "No se encontró la categoría.";
            }
        } else {
            echo "Falta el parámetro ID.";
        }
        ?>
    </div>
</body>
</html>