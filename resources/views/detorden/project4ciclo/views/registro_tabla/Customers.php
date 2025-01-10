<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Clientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
    <h1>Ingresando datos de Clientes</h1>
    <div class="form-container">
    <form method="POST" action="../../controllers/CustomerController.php?option=registrar">
        

        <!-- CustomerID -->
        <div>
            <label for="CustomerID">CustomerID</label>
            <input id="CustomerID" type="text" name="CustomerID" value="<?php echo isset($_POST['CustomerID']) ? htmlspecialchars($_POST['CustomerID']) : ''; ?>" required autofocus autocomplete="CustomerID">
        </div>

        <!-- CustomerName -->
        <div>
            <label for="CustomerName">CustomerName</label>
            <input id="CustomerName" type="text" name="CustomerName" value="<?php echo isset($_POST['CustomerName']) ? htmlspecialchars($_POST['CustomerName']) : ''; ?>" required autofocus autocomplete="CustomerName">
        </div>

        <!-- ContactName -->
        <div>
            <label for="ContactName">ContactName</label>
            <input id="ContactName" type="text" name="ContactName" value="<?php echo isset($_POST['ContactName']) ? htmlspecialchars($_POST['ContactName']) : ''; ?>" required autocomplete="ContactName">
        </div>

        <!-- Address -->
        <div>
            <label for="Addresss">Address</label>
            <input id="Addresss" type="text" name="Addresss" value="<?php echo isset($_POST['Addresss']) ? htmlspecialchars($_POST['Addresss']) : ''; ?>" required autofocus autocomplete="Addresss">
        </div>

        <!-- City -->
        <div>
            <label for="City">City</label>
            <input id="City" type="text" name="City" value="<?php echo isset($_POST['City']) ? htmlspecialchars($_POST['City']) : ''; ?>" required autofocus autocomplete="City">
        </div>

        <!-- PostalCode -->
        <div>
            <label for="PostalCode">PostalCode</label>
            <input id="PostalCode" type="text" name="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? htmlspecialchars($_POST['PostalCode']) : ''; ?>" required autocomplete="PostalCode">
        </div>

        <!-- Country -->
        <div>
            <label for="Country">Country</label>
            <input id="Country" type="text" name="Country" value="<?php echo isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : ''; ?>" required autocomplete="Country">
        </div>

        <div class="imagen">
            <img src="https://www.shutterstock.com/image-vector/customer-retention-patient-assistance-focus-600nw-1954825360.jpg">
        </div>

        <!-- Register Button -->
        <div>
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Customers.php">Desea regresar al menú?</a>
            <button type="submit">Ingresando Datos</button>
        </div>
    </form>
    </div>
    </div>
</body>
</html>
