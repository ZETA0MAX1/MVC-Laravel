<?php
include_once("../models/ProductModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_products.php");
        break;
    
    case 'editar':
        if (isset($_POST['ProductID'], $_POST['CategoryID'], $_POST['Price'])) {
            $ProductID = $_POST['ProductID'];
            $CategoryID = $_POST['CategoryID'];
            $Price = $_POST['Price'];
            $ProductName = $_POST['ProductName'];
            $SupplierID = $_POST['SupplierID'];
            $Unidad = $_POST['Unidad'];
            
            include_once("../models/ProductModel.php");
            $resultado = ProductModel::updateProduct($ProductID,$CategoryID, $Price, $ProductName,$SupplierID,$Unidad);

            if ($resultado) {
                header("Location:../views/lista_tabla/Products.php");
                exit; 
            } else {
                echo "Error al actualizar el empleado.";
            }
        } else {
            echo "Faltan datos necesarios para actualizar el empleado.";
        }
        break;

    
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
             if (filter_var($id, FILTER_VALIDATE_INT)) {
            
            $deleted = ProductModel::deleteProduct($id);

            if ($deleted) {
                header("Location: ../views/lista_tabla/Products.php");
                exit;
            } else {
                echo "Hubo un problema al eliminar el producto.";
            }
        } else {
            echo "ID de producto no válido.";
        }
    } else {
        echo "Falta el parámetro ID para eliminar.";
    }
    break;

    case 'register':
        include("../views/registro_tabla/Products.php");
        break;
    
    case 'registrar':
        if (isset($_POST['ProductID'], $_POST['CategoryID'], $_POST['Price'])) {
            $ProductID = $_POST['ProductID'];
            $CategoryID = $_POST['CategoryID'];
            $Price = $_POST['Price'];
            $ProductName = $_POST['ProductName'];
            $SupplierID = $_POST['SupplierID'];
            $Unidad = $_POST['Unidad'];

    
            $resultado = ProductModel::registerProduct($ProductID, $CategoryID, $Price,$ProductName, $SupplierID,$Unidad);
    
                if ($resultado) {
                    
                    header("Location: ../views/lista_tabla/Products.php");
                    exit();
                } else {
                    echo "Error al registrar el cliente.";
                }
            } else {
                echo "Faltan datos necesarios para registrar el cliente.";
            }break;
        
        

    default:
        echo "Opción no válida.";
        break;
}
?>

