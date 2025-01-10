<?php
include_once("../models/ShipperModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_shippers.php");
        break;
    
    case 'editar':
        if (isset($_POST['Phone'], $_POST['ShipperID'], $_POST['ShipperName'])) {
            $Phone = $_POST['Phone'];
            $ShipperID = $_POST['ShipperID'];
            $ShipperName = $_POST['ShipperName'];
            
            include_once("../models/ShipperNameModel.php");

            $resultado = ShipperModel::updateShipper($Phone,$ShipperID, $ShipperName);

            if ($resultado) {
                header("Location:../views/lista_tabla/Shippers.php");
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
                
                $deleted = ShipperModel::deleteShipper($id);
    
                if ($deleted) {
                    header("Location: ../views/lista_tabla/Shippers.php");
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
        include("../views/registro_tabla/Shippers.php");
        break;
    
    case 'registrar':
        if (isset($_POST['Phone'], $_POST['ShipperID'], $_POST['ShipperName'])) {
            $Phone = $_POST['Phone'];
            $ShipperID = $_POST['ShipperID'];
            $ShipperName = $_POST['ShipperName'];

    
            $resultado = ShipperModel::registerShipper($Phone,$ShipperID, $ShipperName);
    
                if ($resultado) {
                    
                    header("Location: ../views/lista_tabla/Shippers.php");
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

