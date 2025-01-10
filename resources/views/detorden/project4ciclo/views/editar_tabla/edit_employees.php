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
        <h2>Editar Employee</h2>

        <?php
        
        include_once("../models/EmployeeModel.php");

        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            
            $employee = EmployeeModel::getEmployeeById($id);

            if ($employee) {
                
                ?>

                <form action="../controllers/EmployeeController.php?option=editar" method="POST">
                    <input type="hidden" name="option" value="edit">
                    <input type="hidden" name="EmployeeID" value="<?php echo htmlspecialchars($employee['EmployeeID']); ?>">

                    <label for="FirstName">First Name:</label><br>
                    <input type="text" id="FirstName" name="FirstName" value="<?php echo htmlspecialchars($employee['FirstName']); ?>"><br><br>

                    <label for="lastName">Last Name:</label><br>
                    <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($employee['LastName']); ?>"><br><br>

                    <label for="BirthDate">Birth Date:</label><br>
                    <input type="text" id="BirthDate" name="BirthDate" value="<?php echo htmlspecialchars($employee['BirthDate']); ?>"><br><br>

                    <label for="Notes">Notes:</label><br>
                    <textarea id="Notes" name="Notes"><?php echo htmlspecialchars($employee['Notes']); ?></textarea><br><br>

                    <label for="Photo">Photo URL:</label><br>
                    <input type="text" id="Photo" name="Photo" value="<?php echo htmlspecialchars($employee['Photo']); ?>"><br><br>

                    <input type="submit" value="Guardar Cambios">
                </form>

                <?php
            } else {
                echo "No se encontró el empleado.";
            }
        } else {
            echo "Falta el parámetro ID.";
        }
        ?>
    </div>
</body>

</html>