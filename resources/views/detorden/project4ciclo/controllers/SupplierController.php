<?php
include_once("../models/SupplierModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_suppliers.php");
        break;
    
    case 'editar':
        if (isset( $_POST['ContactName'])) {
            $Addresss = $_POST['Addresss'];
            $City = $_POST['City'];
            $ContactName = $_POST['ContactName'];
            $Country = $_POST['Country'];
            $Phone = $_POST['Phone'];
            $PostalCode = $_POST['PostalCode'];
            $SupplierID = $_POST['SupplierID'];
            $SupplierName = $_POST['SupplierName'];
            
            include_once("../models/ProductModel.php");
            $resultado = SupplierModel::updateSupplier($Addresss,$City, $ContactName, $Country,$Phone,$PostalCode,$SupplierID,$SupplierName);

            if ($resultado) {
                header("Location:../views/lista_tabla/Suppliers.php");
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
                
                $deleted = SupplierModel::deleteSupplier($id);
    
                if ($deleted) {
                    header("Location: ../views/lista_tabla/Suppliers.php");
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
        include("../views/registro_tabla/Suppliers.php");
        break;
    
    case 'registrar':
        if (isset($_POST['Addresss'], $_POST['City'])) {
            $Addresss = $_POST['Addresss'];
            $City = $_POST['City'];
            $ContactName = $_POST['ContactName'];
            $Country = $_POST['Country'];
            $Phone = $_POST['Phone'];
            $PostalCode = $_POST['PostalCode'];
            $SupplierID = $_POST['SupplierID'];
            $SupplierName = $_POST['SupplierName'];

    
            $resultado = SupplierModel::registerSupplier($Addresss,$City, $ContactName, $Country,$Phone,$PostalCode,$SupplierID,$SupplierName);
    
                if ($resultado) {
                    
                    header("Location: ../views/lista_tabla/Suppliers.php");
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

