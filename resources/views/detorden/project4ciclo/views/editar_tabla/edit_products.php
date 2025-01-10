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
        <h2>Editar Product</h2>

        <?php
        
        include_once("../models/ProductModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
           
            $category = ProductModel::getProductById($id);
            
            if($category) {

                $categories = ProductModel::getCategories();
                $suppliers = ProductModel::getSuppliers();
                
                $selectedCategoryID = isset($category['CategoryID']) ? $category['CategoryID'] : '';
                $selectedSupplierID = isset($_POST['SupplierID']) ? $_POST['SupplierID'] : '';
                

                
                ?>

                <form action="../controllers/ProductController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="ProductID" value="<?php echo $category['ProductID']; ?>">

                    <label for="CategoryID">CategoryID:</label><br>
                    <select id="CategoryID" name="CategoryID">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['CategoryID']); ?>" 
                                <?php echo ($cat['CategoryID'] == $selectedCategoryID) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['CategoryName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="Price">Price:</label><br>
                    <input type="text" id="Price" name="Price" value="<?php echo htmlspecialchars($category['Price']); ?>"><br><br>

                    <label for="ProductName">ProductName:</label><br>
                    <input type="text" id="ProductName" name="ProductName" value="<?php echo htmlspecialchars($category['ProductName']); ?>"><br><br>

                    <label for="SupplierID">SupplierID:</label><br>
                    <select id="SupplierID" name="SupplierID">
                        <?php foreach ($suppliers as $cat): ?>
                            <option value="<?php echo htmlspecialchars($cat['SupplierID']); ?>" 
                                <?php echo ($cat['SupplierID'] == $selectedCategoryID) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['SupplierName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="Unidad">Unidad:</label><br>
                    <input type="text" id="Unidad" name="Unidad" value="<?php echo htmlspecialchars($category['Unidad']); ?>"><br><br>


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