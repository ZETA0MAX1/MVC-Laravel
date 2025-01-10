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
        <h2>Editar Categoría</h2>

        <?php
        include_once("../models/CategoryModel.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $category = CategoryModel::getCategoryById($id);

            if($category) {
                ?>

                <form action="../controllers/CategoryController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="id" value="<?php echo $category['CategoryID']; ?>">

                    <label for="name">Nombre de la Categoría:</label><br>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['CategoryName']); ?>"><br><br>

                    <label for="description">Descripción:</label><br>
                    <textarea id="description" name="description"><?php echo htmlspecialchars($category['descriptions']); ?></textarea><br><br>

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
