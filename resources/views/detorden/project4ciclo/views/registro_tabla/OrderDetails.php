<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario detalles Pedido</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
    <h1>Ingresando detalles del pedido</h1>
    <?php
        // Incluir el modelo de Categoría
        include_once("../../models/OrderDetailsModel.php");
        $orders = OrderDetailModel::getOrders();
        $products = OrderDetailModel::getProducts();

        $selectedOrderID = isset($_POST['OrderID']) ? $_POST['OrderID'] : '';
        $selectedProductID = isset($_POST['ProductID']) ? $_POST['ProductID'] : '';
    
    ?>
    <div class="form-container">
    <form method="POST" action="../../controllers/OrderDetailController.php?option=registrar">
        
        <!--OrderDetailID-->
        <div>
            <label for="OrderDetailID">OrderDetailID</label>
            <input id="OrderDetailID" type="text" name="OrderDetailID" value="<?php echo isset($_POST['OrderDetailID']) ? htmlspecialchars($_POST['OrderDetailID']) : ''; ?>" required autofocus autocomplete="OrderDetailID" >
        </div>

        <!-- 	OrderID -->
        <div >
            <label for="OrderID" >OrderID</label>
            <select id="OrderID" name="OrderID" class="custom-select" required>
                <option value="" disabled selected>Seleccione el id de orden</option>
                <?php foreach ($orders as $order): ?>
                    <option value="<?php echo htmlspecialchars($order['OrderID']); ?>" <?php echo ($order['OrderID'] == $selectedOrderID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($order['OrderID']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
        </div>

        <!-- ProductID -->
        <div>
            <label for="ProductID">ProductID</label>
            <select id="ProductID" name="ProductID" class="custom-select" required>
                <option value="" disabled selected>Seleccione un producto</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?php echo htmlspecialchars($product['ProductID']); ?>" <?php echo ($product['ProductID'] == $selectedProductID) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($product['ProductName']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
        </div>
        <!--Quantity -->
        <div>
            <label for="Quantity">Quantity</label>
            <input id="Quantity" type="text" name="Quantity" value="<?php echo isset($_POST['Quantity']) ? htmlspecialchars($_POST['Quantity']) : ''; ?>" required autofocus autocomplete="Quantity" >
        </div>

        <div class="imagen">
            <img src="https://cdn-icons-png.flaticon.com/512/5220/5220625.png">
        </div>

        <!-- Register Button -->
        <div >
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/OrderDetails.php">Desea regresar al menu?</a>
            <button type="submit" >Ingresando Datos</button>
        </div>
    </form>
  </div>
  </div>
</body>
</html>
