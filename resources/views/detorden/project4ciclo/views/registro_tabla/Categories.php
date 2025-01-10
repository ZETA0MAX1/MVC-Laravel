<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Categoria</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <img src="../img/index.png" alt="Fondo" class="background-image">
    <div class="content">
        <h1>Ingresando datos de Categoria</h1>
    
        <div class="form-container">
            <form method="POST" action="../../controllers/CategoryController.php?option=registrar">
                
                <!-- CategoryID -->
                <div>
                    <label for="CategoryID">CategoryID</label>
                    <input id="CategoryID" type="text" name="CategoryID" value="<?php echo isset($_POST['CategoryID']) ? htmlspecialchars($_POST['CategoryID']) : ''; ?>" required autofocus autocomplete="name" >
                </div>

                <!-- CategoryName -->
                <div >
                    <label for="CategoryName" >CategoryName</label>
                    <input id="CategoryName" type="text" name="CategoryName" value="<?php echo isset($_POST['CategoryName']) ? htmlspecialchars($_POST['CategoryName']) : ''; ?>" required autofocus autocomplete="dni" >
                    
                </div>

                <!-- Description -->
                <div>
                    <label for="Description">Description</label>
                    <input id="Description" type="Description" name="Description" value="<?php echo isset($_POST['Description']) ? htmlspecialchars($_POST['Description']) : ''; ?>" required autocomplete="username" >
                    
                </div>
                <div class="imagen">
                    <img src="https://png.pngtree.com/png-vector/20190118/ourlarge/pngtree-categorieschecklistlistingmark-white-glyph-icon-colorful-png-image_324915.jpg">
                </div>

                <!-- Register Button -->
                <div >
                    <a href="http://localhost/unac-task/Proyecto4/views/lista_tabla/Categories.php" >Desea regresar al menu?</a>
                    <button type="submit" >Ingresando Datos</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
