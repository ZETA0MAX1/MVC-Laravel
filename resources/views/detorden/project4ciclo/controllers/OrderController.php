<?php
include_once("../models/OrderModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_orders.php");
        break;
    
    case 'editar':
        if (isset($_POST['CustomerID'], $_POST['EmployeeID'], $_POST['OrderDate'], $_POST['ShipperID'], $_POST['OrderID'])) {
            $CustomerID = $_POST['CustomerID'];
            $EmployeeID = $_POST['EmployeeID'];
            $OrderDate = $_POST['OrderDate'];
            $ShipperID = $_POST['ShipperID'];
            $OrderID = $_POST['OrderID'];
    
           
            include_once("../models/OrderModel.php");
            
            
            $resultado = OrderModel::updateOrder($CustomerID, $EmployeeID, $OrderDate, $OrderID, $ShipperID);
    
            if ($resultado) {
                
                header("Location: ../views/lista_tabla/Orders.php");
                exit; 
            } else {
                echo "Error al actualizar la orden.";
            }
        } else {
            echo "Faltan datos necesarios para actualizar la orden.";
        }
        break;
        

    
    case 'delete':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            $deleted = OrderModel::deleteOrder($id);
            
            if ($deleted) {
                header("Location: ../views/lista_tabla/Orders.php");
                exit;
            } else {
                echo "Hubo un problema al eliminar el empleado.";
            }
        } else {
            echo "Falta el parámetro ID para eliminar.";
        }
        break;

    case 'register':
        include("../views/registro_tabla/employees.php");
        break;
    
    case 'registrar':
        if (isset($_POST['CustomerID'], $_POST['OrderDate'], $_POST['ShipperID'])) {
            $CustomerID = $_POST['CustomerID'];
            $EmployeeID = $_POST['EmployeeID'];
            $OrderDate = $_POST['OrderDate'];
            $ShipperID = $_POST['ShipperID'];
            $OrderID = $_POST['OrderID'];

    
            $resultado = OrderModel::registerOrder($CustomerID, $EmployeeID, $OrderDate, $ShipperID,$OrderID);
    
                if ($resultado) {
                    
                    header("Location: ../views/lista_tabla/Orders.php");
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

