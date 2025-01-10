<?php
include_once("../models/OrderDetailsModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_OrderDetails.php");
        break;
    
    case 'editar':
        if (isset($_POST['OrderDetailID'], $_POST['OrderID'], $_POST['ProductID'], $_POST['Quantity'])) {
            
            $orderDetailID = $_POST['OrderDetailID'];
            $orderID = $_POST['OrderID'];
            $productID = $_POST['ProductID'];
            $quantity = $_POST['Quantity'];
            
            include_once("../models/OrderDetail.php");
            $resultado = OrderDetailModel::updateOrderDetail($orderDetailID, $orderID, $productID, $quantity);

            if ($resultado) {
                
                header("Location: ../views/lista_tabla/OrderDetails.php");
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
            
            
            $deleted = OrderDetailModel::deleteOrderDetail($id);
            
            if ($deleted) {
                header("Location: ../views/lista_tabla/OrderDetails.php");
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
        if (isset($_POST['OrderDetailID'], $_POST['OrderID'], $_POST['ProductID'], $_POST['Quantity'])) {

            $orderDetailID = $_POST['OrderDetailID'];
            $orderID = $_POST['OrderID'];
            $productID = $_POST['ProductID'];
            $quantity = $_POST['Quantity'];

    
            $resultado = OrderDetailModel::registerOrderDetail($orderDetailID, $orderID, $productID, $quantity);
    
                if ($resultado) {
                    // Redirigir después de registrar exitosamente
                    header("Location: ../views/lista_tabla/OrderDetails.php");
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

