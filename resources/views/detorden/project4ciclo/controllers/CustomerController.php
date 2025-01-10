<?php
include_once("../models/CustomerModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_customers.php");

		break;
    
    case 'editar':
        if (isset($_POST['id'], $_POST['name'], $_POST['ContactName'], $_POST['address'], $_POST['city'], $_POST['postal_code'], $_POST['country'])) {
            $id = $_POST['id']; 
            $name = $_POST['name']; 
            $contactName = $_POST['ContactName']; 
            $address = $_POST['address']; 
            $city = $_POST['city']; 
            $postalCode = $_POST['postal_code']; 
            $country = $_POST['country'];            
            $resultado = CustomerModel::updateCustomer($id, $name, $contactName, $address, $city, $postalCode, $country);
    
            if ($resultado) {
                header("Location: ../views/lista_tabla/customers.php");
                exit;
            } else {
                echo "Error al actualizar el cliente.";
            }
        } else {
            echo "Faltan datos necesarios para actualizar el cliente.";
        }
        break;
    case 'delete':
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            
            $deleted = CustomerModel::deleteCliente($id);
            
            if($deleted) {
                header("Location: ../views/lista_tabla/customers.php");
                exit;
            } else {
                echo "Hubo un problema al eliminar el cliente.";
            }
        } else {
            echo "Falta el parámetro ID para eliminar.";
        }
        break;

    case 'register':
        include("../views/registro_tabla/Clients.php");
        break;
    
    case 'registrar':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            if(isset($_POST['CustomerID'], $_POST['CustomerName'], $_POST['ContactName'], $_POST['Addresss'], $_POST['City'], $_POST['PostalCode'], $_POST['Country'])) {
                $customerID = $_POST['CustomerID'];
                $customerName = $_POST['CustomerName'];
                $contactName = $_POST['ContactName'];
                $address = $_POST['Addresss'];
                $city = $_POST['City'];
                $postalCode = $_POST['PostalCode'];
                $country = $_POST['Country'];
    
                
                include_once("../models/CustomerModel.php");
    
                
                $resultado = CustomerModel::registerCliente($customerID, $customerName, $contactName, $address, $city, $postalCode, $country);
    
                if($resultado) {
                    
                    header("Location: ../views/lista_tabla/customers.php");
                    exit; 
                } else {
                    echo "Error al registrar el cliente.";
                }
            } else {
                echo "Faltan datos necesarios para registrar el cliente.";
            }
        } else {
            echo "Método de solicitud no válido para registrar el cliente.";
        }
        break;

    default:
        echo "Opción no válida.";
        break;
}
?>
