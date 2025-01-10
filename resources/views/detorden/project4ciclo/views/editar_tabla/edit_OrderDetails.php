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
        <h2>Editar Detalles de Orden</h2>

        <?php
        
        include_once("../models/OrderDetailsModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $category = OrderDetailModel::getOrderDetailById($id);

            if($category) {

                $orders = OrderDetailModel::getOrders();
                $products = OrderDetailModel::getProducts();
                
                $selectedOrderID = isset($category['OrderID']) ? $category['OrderID'] : '';
                $selectedProductID = isset($_POST['ProductID']) ? $_POST['ProductID'] : '';
                
                ?>

                <form action="../controllers/OrderDetailController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="OrderDetailID" value="<?php echo $category['OrderDetailID']; ?>">

                    <label for="OrderID">Orden:</label><br>
                    <select id="OrderID" name="OrderID"  class="custom-select">
                        <?php foreach ($orders as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['OrderID']); ?>" 
                                <?php echo ($cat['OrderID'] == $selectedOrderID) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['OrderDate']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="ProductID">Producto:</label><br>
                    <select id="ProductID" name="ProductID"  class="custom-select">
                        <?php foreach ($products as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['ProductID']); ?>" 
                                <?php echo ($cat['ProductID'] == $selectedProductID) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['ProductName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="Quantity">Cantidad:</label><br>
                    <input type="text" id="Quantity" name="Quantity" value="<?php echo htmlspecialchars($category['Quantity']); ?>"><br><br>

                    <input type="submit" value="Guardar Cambios">
                </form>

                <?php
            } else {
                echo "No se encontró la categorías.";
                echo "<pre>";
                var_dump($category);
                echo "</pre>";
            }
        } else {
            echo "Falta el parámetro ID.";
        }
        ?>
    </div>
</body>
</html>