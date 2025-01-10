<?php
include_once("../models/CategoryModel.php");

$option = $_GET['option'];

switch ($option) {
	case 'edit':
		include("../views/editar_tabla/edit_category.php");

		break;
    case 'editar':
        if(isset($_POST['id'], $_POST['name'], $_POST['description'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            // Actualizar la categoría usando CategoryModel
            $resultado = CategoryModel::updateCategory($id, $name, $description);

            if($resultado) {
                header("Location: ../views/lista_tabla/categories.php");
            } else {
                echo "Error al actualizar la categoría.";
            }
        } else {
            echo "Faltan datos necesarios para actualizar la categoría.";
        }
        break;
    
    case 'delete':
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $deleted = CategoryModel::deleteCategory($id); 
            if($deleted) {
                header("Location: ../views/lista_tabla/categories.php");
            } else {
                echo "Hubo un problema al eliminar el registro.";
            }
        } else {
            echo "Falta el parámetro ID para eliminar.";
        }
        break;
    case 'register':
        include("../views/registro_tabla/Categories.php");

        break;
    case 'registrar':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            if(isset($_POST['CategoryID'], $_POST['CategoryName'], $_POST['Description'])) {
                $categoryID = $_POST['CategoryID'];
                $categoryName = $_POST['CategoryName'];
                $description = $_POST['Description'];
    
                
                include_once("../models/CategoryModel.php");
    
                
                $resultado = CategoryModel::registerCategory($categoryID, $categoryName, $description);
    
                if($resultado) {
                    
                    header("Location: ../views/lista_tabla/Categories.php");
                    exit; 
                } else {
                    echo "Error al registrar la categoría.";
                }
            } else {
                echo "Faltan datos necesarios para registrar la categoría.";
            }
        } else {
            echo "Método de solicitud no válido para registrar la categoría.";
        }
        break;
        

	

	
	
	default:
        echo "Opción no válida.";
		break;
}