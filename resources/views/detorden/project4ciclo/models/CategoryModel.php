<?php

include_once("../models/conexion.php"); // Incluye la clase de conexión a la base de datos

class CategoryModel {

    
    public static function getAllCategories() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM categories";
        $result = $conn->query($sql);
        
        $count = 0;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $count = $row['total'];
            }
        }

        $conn->close();

        return $count;
    }

    
    public static function getCategoryById($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $sql = "SELECT CategoryID, CategoryName, descriptions FROM categories WHERE CategoryID = '$id'";
        $result = $conn->query($sql);

        $category = null;

        if ($result->num_rows == 1) {
            $category = $result->fetch_assoc();
        }

        $conn->close();

        return $category;
    }

    
    public static function updateCategory($id, $name, $description) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $description = $conn->real_escape_string($description);

        $sql = "UPDATE categories SET CategoryName = '$name', descriptions = '$description' WHERE CategoryID = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function deleteCategory($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);

        $sql = "DELETE FROM categories WHERE CategoryID = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function registerCategory($id,$name, $description) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $name = $conn->real_escape_string($name);
        $description = $conn->real_escape_string($description);

        $sql = "INSERT INTO categories (CategoryID,CategoryName, descriptions) VALUES ('$id','$name', '$description')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}
?>
