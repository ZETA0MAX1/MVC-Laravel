<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ordenes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<img src="../img/index.png" alt="Fondo" class="background-image">
<div class="content">
    <h1>Ingresando la orden</h1>
    <?php
        // Incluir el modelo de Categoría
        include_once("../../models/OrderModel.php");
        $shippers = OrderModel::getShippers();
        $employees = OrderModel::getEmployees();
        $customers = OrderModel::getCustomers();

        $selectedShipperID = isset($_POST['ShipperID']) ? $_POST['ShipperID'] : '';
        $selectedEmployeeID = isset($_POST['EmployeeID']) ? $_POST['EmployeeID'] : '';
        $selectedCustomerID = isset($_POST['CustomerID']) ? $_POST['CustomerID'] : '';
    ?>



<div class="form-container">
    <form method="POST" action="../../controllers/OrderController.php?option=registrar">
        <!--OrderID-->
        <div>
            <label for="OrderID">OrderID</label>
            <input id="OrderID" type="text" name="OrderID" value="<?php echo isset($_POST['OrderID']) ? htmlspecialchars($_POST['OrderID']) : ''; ?>" required autofocus autocomplete="off">
        </div>

        <!-- CustomerID -->
        <div>
            <label for="CustomerID">CustomerID</label>
            <select id="CustomerID" name="CustomerID" class="custom-select" required>
                <option value="" disabled selected>Seleccione un cliente</option>
                <?php foreach ($customers as $customer): ?>
                    <option value="<?php echo htmlspecialchars($customer['CustomerID']); ?>" <?php echo ($customer['CustomerID'] == $selectedCustomerID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($customer['CustomerName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- EmployeeID -->
        <div>
            <label for="EmployeeID">EmployeeID</label>
            <select id="EmployeeID" name="EmployeeID" class="custom-select" required>
                <option value="" disabled selected>Seleccione un empleado</option>
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo htmlspecialchars($employee['EmployeeID']); ?>" <?php echo ($employee['EmployeeID'] == $selectedEmployeeID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($employee['EmployeeName']); ?>
            </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- OrderDate -->
        <div>
            <label for="OrderDate">OrderDate</label>
            <input id="OrderDate" type="date" name="OrderDate" value="<?php echo isset($_POST['OrderDate']) ? htmlspecialchars($_POST['OrderDate']) : ''; ?>" required autocomplete="off">
        </div>

        <!-- ShipperID -->
        <div>
            <label for="ShipperID">ShipperID</label>
            <select id="ShipperID" name="ShipperID" class="custom-select" required>
                <option value="" disabled selected>Seleccione un transportista</option>
                <?php foreach ($shippers as $shipper): ?>
                    <option value="<?php echo htmlspecialchars($shipper['ShipperID']); ?>" <?php echo ($shipper['ShipperID'] == $selectedShipperID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($shipper['ShipperName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Imagen -->
        <div class="imagen">
            <img src="https://cdn-icons-png.freepik.com/512/1356/1356594.png" alt="Icono">
        </div>

        <!-- Botones -->
        <div>
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Orders.php">¿Desea regresar al menú?</a>
            <button type="submit">Ingresar Datos</button>
        </div>
    </form>
</div>
</div>
</body>
</html>
