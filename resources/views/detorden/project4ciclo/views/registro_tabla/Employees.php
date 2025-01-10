<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario del Empleado</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
    <h1>Ingresando datos del Empleado</h1>
    <div class="form-container">
    <form method="POST" action="../../controllers/EmployeeController.php?option=registrar">

    <!-- EmployeeID -->
    <div>
        <label for="EmployeeID">EmployeeID</label>
        <input id="EmployeeID" type="text" name="EmployeeID" value="<?php echo isset($_POST['EmployeeID']) ? htmlspecialchars($_POST['EmployeeID']) : ''; ?>" required autofocus autocomplete="EmployeeID" >
    </div>

    <!-- LastName -->
    <div>
        <label for="LastName">LastName</label>
        <input id="LastName" type="text" name="LastName" value="<?php echo isset($_POST['LastName']) ? htmlspecialchars($_POST['LastName']) : ''; ?>" required autofocus autocomplete="LastName" >
    </div>

    <!-- FirstName -->
    <div>
        <label for="FirstName">FirstName</label>
        <input id="FirstName" type="text" name="FirstName" value="<?php echo isset($_POST['FirstName']) ? htmlspecialchars($_POST['FirstName']) : ''; ?>" required autocomplete="FirstName" >
    </div>

    <!-- BirthDate -->
    <div>
        <label for="BirthDate">BirthDate</label>
        <input id="BirthDate" type="text" name="BirthDate" value="<?php echo isset($_POST['BirthDate']) ? htmlspecialchars($_POST['BirthDate']) : ''; ?>" required autofocus autocomplete="BirthDate" >
    </div>

    <!-- Photo -->
    <div>
        <label for="Photo">Photo</label>
        <input id="Photo" type="text" name="Photo" value="<?php echo isset($_POST['Photo']) ? htmlspecialchars($_POST['Photo']) : ''; ?>" required autofocus autocomplete="Photo" >
    </div>

    <!-- Notes -->
    <div>
        <label for="Notes">Description</label>
        <input id="Notes" type="text" name="Notes" value="<?php echo isset($_POST['Notes']) ? htmlspecialchars($_POST['Notes']) : ''; ?>" required autocomplete="Notes" >
    </div>

    <!-- Submit Button -->
    <button type="submit">Ingresando Datos</button>
</form>
</div>

  </div>
</body>
</html>
