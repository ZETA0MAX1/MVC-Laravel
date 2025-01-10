<?php

include_once(__DIR__."/conexion.php"); // Incluye la clase de conexión a la base de datos

class ProductModel {

    // Método para obtener todos los empleados
    public static function getAllProduct() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM products";
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

    // Método para obtener un empleado por su ID
    public static function getProductById($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        
        $sql = "SELECT ProductID,CategoryID, Price, ProductName, SupplierID,Unidad FROM products WHERE ProductID = '$id'";
        $result = $conn->query($sql);

        $ProductID = null;

        if ($result->num_rows == 1) {
            $ProductID = $result->fetch_assoc();
        }

        $conn->close();

        return $ProductID;
    }

    // Método para actualizar un empleado
    public static function updateProduct($ProductID,$CategoryID, $Price, $ProductName,$SupplierID,$Unidad) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        // Escapar las variables para prevenir inyecciones SQL
        $ProductID = $conn->real_escape_string($ProductID);
        $CategoryID = $conn->real_escape_string($CategoryID);
        $Price = $conn->real_escape_string($Price);
        $ProductName = $conn->real_escape_string($ProductName);
        $SupplierID = $conn->real_escape_string($SupplierID);
        $Unidad = $conn->real_escape_string($Unidad);
    
        // Consulta SQL para actualizar el registro
        $sql = "UPDATE products SET ProductID = '$ProductID',CategoryID = '$CategoryID', Price = '$Price', ProductName = '$ProductName',SupplierID='$SupplierID',Unidad = '$Unidad' WHERE ProductID = '$ProductID'";
    
        // Ejecutar la consulta y verificar si fue exitosa
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Método para eliminar un empleado por su ID

    
    public static function deleteProduct($ProductID) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $ProductID = $conn->real_escape_string($ProductID);

        // Consulta SQL para eliminar el registro usando consultas preparadas
        $sql = "DELETE FROM products WHERE ProductID = '$ProductID'";

        // Preparar la declaración
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
    
        

    // Método para registrar un nuevo empleado
    public static function registerProduct($ProductID, $CategoryID, $Price,$ProductName, $SupplierID,$Unidad) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $ProductID = $conn->real_escape_string($ProductID);
        $CategoryID = $conn->real_escape_string($CategoryID);
        $Price = $conn->real_escape_string($Price);
        $ProductName = $conn->real_escape_string($ProductName);
        $SupplierID = $conn->real_escape_string($SupplierID);
        $Unidad = $conn->real_escape_string($Unidad);

        $sql = "INSERT INTO products (ProductID,CategoryID, Price,ProductName, SupplierID,Unidad) VALUES ('$ProductID','$CategoryID', '$Price','$ProductName','$SupplierID', '$Unidad')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
    public static function getCategories() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT CategoryID, CategoryName FROM categories";
        $result = $conn->query($sql);

        $categories = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }

        $conn->close();
        return $categories;
    }

    public static function getSuppliers() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT SupplierID, SupplierName FROM suppliers";
        $result = $conn->query($sql);

        $suppliers = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $suppliers[] = $row;
            }
        }

        $conn->close();
        return $suppliers;
    }
    
}
?>


