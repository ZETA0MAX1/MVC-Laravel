<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario del Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
    <h1>Ingresando datos del Producto</h1>
    <?php
        
        include_once("../../models/ProductModel.php");
        $categories = ProductModel::getCategories();
        $suppliers = ProductModel::getSuppliers();

        $selectedCategoryID = isset($_POST['CategoryID']) ? $_POST['CategoryID'] : '';
        $selectedSupplierID = isset($_POST['SupplierID']) ? $_POST['SupplierID'] : '';
    ?>
    <div class="form-container">
    <form method="POST" action="../../controllers/ProductController.php?option=registrar">


        <!--ProductID -->
        <div>
            <label for="ProductID">ProductID</label>
            <input id="ProductID" type="text" name="ProductID" value="<?php echo isset($_POST['ProductID']) ? htmlspecialchars($_POST['ProductID']) : ''; ?>" required autofocus autocomplete="ProductID" >
        </div>

        <!-- ProductName -->
        <div >
            <label for="ProductName" >ProductName</label>
            <input id="ProductName" type="text" name="ProductName" value="<?php echo isset($_POST['ProductName']) ? htmlspecialchars($_POST['ProductName']) : ''; ?>" required autofocus autocomplete="ProductName" >
            
        </div>

        <!-- SupplierID -->
        <div>
                <label for="SupplierID">SupplierID</label>
                <select id="SupplierID" name="SupplierID" class="custom-select" required>
                    <option value="" disabled selected>Seleccione un proveedor</option>
                    <?php foreach ($suppliers as $supplier): ?>
                        <option value="<?php echo htmlspecialchars($supplier['SupplierID']); ?>" <?php echo ($supplier['SupplierID'] == $selectedSupplierID) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($supplier['SupplierName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
        </div>
        <!--CategoryID -->
        <div>
                <label for="CategoryID">CategoryID</label>
                <select id="CategoryID" name="CategoryID" class="custom-select" required>
                    <option value="" disabled selected>Seleccione una categoría</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars($category['CategoryID']); ?>" <?php echo ($category['CategoryID'] == $selectedCategoryID) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['CategoryName']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
        </div>

        <!-- Unit-->
        <div >
            <label for="Unidad" >Unit</label>
            <input id="Unidad" type="text" name="Unidad" value="<?php echo isset($_POST['Unidad']) ? htmlspecialchars($_POST['Unidad']) : ''; ?>" required autofocus autocomplete="Unidad" >
            
        </div>

        <!-- Price -->
        <div>
            <label for="Price">Price</label>
            <input id="Price" type="text" name="Price" value="<?php echo isset($_POST['Price']) ? htmlspecialchars($_POST['Price']) : ''; ?>" required autocomplete="Price" >
            
        </div>
        
        <div class="imagen">
            <img src="https://cdn-icons-png.flaticon.com/512/1312/1312307.png">
        </div>

        <!-- Register Button -->
        <div >
            <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Products.php" >Desea regresar al menu?</a>
            <button type="submit" >Ingresando Datos</button>
        </div>
    </form>
  </div>
  </div>
</body>
</html>