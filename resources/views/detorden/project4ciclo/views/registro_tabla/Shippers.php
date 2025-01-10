<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario detalles Shipper</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
    <h1>Ingresando detalles del Shipper</h1>
    <div class="form-container">
    <form method="POST" action="../../controllers/ShipperController.php?option=registrar">
        

        <!--ShipperID-->
        <div>
            <label for="ShipperID">ShipperID</label>
            <input id="ShipperID" type="text" name="ShipperID" value="<?php echo isset($_POST['ShipperID']) ? htmlspecialchars($_POST['ShipperID']) : ''; ?>" required autofocus autocomplete="ShipperID" >
        </div>

        <!-- 	ShipperName -->
        <div >
            <label for="ShipperName" >ShipperName</label>
            <input id="ShipperName" type="text" name="ShipperName" value="<?php echo isset($_POST['ShipperName']) ? htmlspecialchars($_POST['ShipperName']) : ''; ?>" required autofocus autocomplete="ShipperName" >
            
        </div>

        <!-- 	Phone -->
        <div>
            <label for="Phone">Phone</label>
            <input id="Phone" type="Phone" name="Phone" value="<?php echo isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : ''; ?>" required autocomplete="Phone" >
            
        </div>
        
        
        <div class="imagen">
            <img src="https://previews.123rf.com/images/oliviart/oliviart2006/oliviart200600121/149000564-icono-de-entrega-aislado-sobre-fondo-blanco-icono-de-entrega-r%C3%A1pida-cami%C3%B3n-de-entrega-de-env%C3%ADo.jpg">
        </div>

        <!-- Register Button -->
        <div >
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Shippers.php">Desea regresar al menu?</a>
            <button type="submit" >Ingresando Datos</button>
        </div>
    </form>
  </div>
  </div>
</body>
</html>