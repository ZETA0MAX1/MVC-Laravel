<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Supplier</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<img src="../img/index.png" alt="Fondo" class="background-image">
<div class="content">
    <h1>Ingresando datos del Supplier</h1>
    <div class="form-container">
    <form method="POST" action="../../controllers/SupplierController.php?option=registrar">
       
        <!--SupplierID -->
        <div>
            <label for="SupplierID">SupplierID</label>
            <input id="SupplierID" type="text" name="SupplierID" value="<?php echo isset($_POST['SupplierID']) ? htmlspecialchars($_POST['SupplierID']) : ''; ?>" required autofocus autocomplete="SupplierID" >
        </div>

        <!-- SupplierName -->
        <div >
            <label for="SupplierName" >SupplierName</label>
            <input id="SupplierName" type="text" name="SupplierName" value="<?php echo isset($_POST['SupplierName']) ? htmlspecialchars($_POST['SupplierName']) : ''; ?>" required autofocus autocomplete="SupplierName" >
            
        </div>

        <!-- ContactName -->
        <div>
            <label for="ContactName">ContactName</label>
            <input id="ContactName" type="Description" name="ContactName" value="<?php echo isset($_POST['ContactName']) ? htmlspecialchars($_POST['ContactName']) : ''; ?>" required autocomplete="ContactName" >
            
        </div>
        <!--Address -->
        <div>
            <label for="Addresss">Addresss</label>
            <input id="Addresss" type="text" name="Addresss" value="<?php echo isset($_POST['Addresss']) ? htmlspecialchars($_POST['Addresss']) : ''; ?>" required autofocus autocomplete="Addresss" >
        </div>

        <!-- City-->
        <div >
            <label for="City" >City</label>
            <input id="City" type="text" name="City" value="<?php echo isset($_POST['City']) ? htmlspecialchars($_POST['City']) : ''; ?>" required autofocus autocomplete="City" >
            
        </div>

        <!-- 	PostalCode -->
        <div>
            <label for="PostalCode">PostalCode</label>
            <input id="Description" type="PostalCode" name="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? htmlspecialchars($_POST['PostalCode']) : ''; ?>" required autocomplete="PostalCode" >
            
        </div>
        <!-- 	Country -->
        <div>
            <label for="Country">Country</label>
            <input id="Country" type="Country" name="Country" value="<?php echo isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : ''; ?>" required autocomplete="Country" >
            
        </div>
        <!-- 	Phone -->
        <div>
            <label for="Phone">Phone</label>
            <input id="Phone" type="Phone" name="Phone" value="<?php echo isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : ''; ?>" required autocomplete="Phone" >
            
        </div>
        
        <div class="imagen">
            <img src="https://cdn-icons-png.flaticon.com/512/3321/3321752.png">
        </div>

        <!-- Register Button -->
        <div >
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Suppliers.php" >Desea regresar al menu?</a>
            <button type="submit" >Ingresando Datos</button>
        </div>
    </form>
  </div>
  </div>
</body>
</html>