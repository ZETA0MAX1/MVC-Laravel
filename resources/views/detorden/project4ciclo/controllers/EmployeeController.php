<?php
include_once("../models/EmployeeModel.php");

$option = $_GET['option'];

switch ($option) {
    case 'edit':
        include("../views/editar_tabla/edit_employees.php");
        break;
    
    case 'editar':
        if (isset($_POST['EmployeeID'], $_POST['FirstName'], $_POST['lastName'], $_POST['BirthDate'], $_POST['Notes'], $_POST['Photo'])) {
            
            $id = $_POST['EmployeeID'];
            $firstName = $_POST['FirstName'];
            $lastName = $_POST['lastName'];
            $birthDate = $_POST['BirthDate'];
            $notes = $_POST['Notes'];
            $photo = $_POST['Photo'];

            
            include_once("../models/EmployeeModel.php");
            $resultado = EmployeeModel::updateEmployee($id, $firstName, $lastName, $birthDate, $notes, $photo);

            if ($resultado) {
                
                header("Location: ../views/lista_tabla/employees.php");
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
            
            
            $deleted = EmployeeModel::deleteEmployee($id);
            
            if ($deleted) {
                header("Location: ../views/lista_tabla/employees.php");
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
        if (isset($_POST['EmployeeID'])) {

            $EmployeeID = $_POST['EmployeeID'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $BirthDate = $_POST['BirthDate'];
            $Notes = $_POST['Notes'];
            $Photo = $_POST['Photo'];
    
            $resultado = EmployeeModel::registerEmployee($EmployeeID, $FirstName, $LastName, $BirthDate, $Notes, $Photo);
    
                if ($resultado) {
                    
                    header("Location: ../views/lista_tabla/employees.php");
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

