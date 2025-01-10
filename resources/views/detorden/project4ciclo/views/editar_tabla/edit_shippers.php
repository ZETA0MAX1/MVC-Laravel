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
        <h2>Editar Shipper</h2>

        <?php
        
        include_once("../models/ShipperModel.php");

        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            $category = ShipperModel::getShipperById($id);

            if($category) {
                
                ?>

                <form action="../controllers/ShipperController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="ShipperID" value="<?php echo $category['ShipperID']; ?>">

                    <label for="ShipperName">Nombre del Shipper:</label><br>
                    <input type="text" id="ShipperName" name="ShipperName" value="<?php echo htmlspecialchars($category['ShipperName']); ?>"><br><br>

                    <label for="Phone">Phone:</label><br>
                    <textarea id="Phone" name="Phone"><?php echo htmlspecialchars($category['Phone']); ?></textarea><br><br>

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