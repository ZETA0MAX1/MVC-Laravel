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
        <h2>Editar Supplier</h2>

        <?php
        
        include_once("../models/SupplierModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            $category = SupplierModel::getSupplierById($id);

            if($category) {
                
                ?>

                <form action="../controllers/SupplierController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="SupplierID" value="<?php echo $category['SupplierID']; ?>">

                    <label for="name">Addresss:</label><br>
                    <input type="text" id="Addresss" name="Addresss" value="<?php echo htmlspecialchars($category['Addresss']); ?>"><br><br>

                    <label for="name">City:</label><br>
                    <input type="text" id="City" name="City" value="<?php echo htmlspecialchars($category['City']); ?>"><br><br>

                    <label for="name">ContactName:</label><br>
                    <input type="text" id="ContactName" name="ContactName" value="<?php echo htmlspecialchars($category['ContactName']); ?>"><br><br>

                    <label for="name">Country:</label><br>
                    <input type="text" id="Country" name="Country" value="<?php echo htmlspecialchars($category['Country']); ?>"><br><br>

                    <label for="name">Phone:</label><br>
                    <input type="text" id="Phone" name="Phone" value="<?php echo htmlspecialchars($category['Phone']); ?>"><br><br>

                    <label for="name">PostalCode:</label><br>
                    <input type="text" id="PostalCode" name="PostalCode" value="<?php echo htmlspecialchars($category['PostalCode']); ?>"><br><br>

                    <label for="name">SupplierID:</label><br>
                    <input type="text" id="SupplierID" name="SupplierID" value="<?php echo htmlspecialchars($category['SupplierID']); ?>"><br><br>

                    <label for="name">SupplierName:</label><br>
                    <input type="text" id="SupplierName" name="SupplierName" value="<?php echo htmlspecialchars($category['SupplierName']); ?>"><br><br>

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