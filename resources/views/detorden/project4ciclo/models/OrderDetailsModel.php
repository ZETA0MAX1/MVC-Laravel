<?php

include_once(__DIR__."/conexion.php"); 

class OrderDetailModel {

    
    public static function getAllOrderDetail() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $sql = "SELECT COUNT(*) as total FROM orderdetails";
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

        public static function getOrderDetailById($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);
        $sql = "SELECT OrderDetailID, OrderID, ProductID, Quantity FROM orderdetails WHERE OrderDetailID = '$id'";
        $result = $conn->query($sql);

        
        $employee = null;

        if ($result->num_rows == 1) {
            $employee = $result->fetch_assoc();
        }

        $conn->close();

        return $employee;
    }

    
    public static function updateOrderDetail($OrderDetailID,$OrderID, $ProductID, $Quantity) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
    
        
        $OrderDetailID = $conn->real_escape_string($OrderDetailID);
        $OrderID = $conn->real_escape_string($OrderID);
        $ProductID = $conn->real_escape_string($ProductID);
        $Quantity = $conn->real_escape_string($Quantity);
    
        
        $sql = "UPDATE orderdetails SET OrderDetailID = '$OrderDetailID',OrderID = '$OrderID', ProductID = '$ProductID', Quantity = '$Quantity' WHERE OrderDetailID = '$OrderDetailID'";
    
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function deleteOrderDetail($id) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $id = $conn->real_escape_string($id);

        $sql = "DELETE FROM orderdetails WHERE OrderDetailID = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    
    public static function registerOrderDetail($OrderDetailID,$OrderID, $ProductID, $Quantity) {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();

        $OrderDetailID = $conn->real_escape_string($OrderDetailID);
        $OrderID = $conn->real_escape_string($OrderID);
        $ProductID = $conn->real_escape_string($ProductID);
        $Quantity = $conn->real_escape_string($Quantity);

        $sql = "INSERT INTO orderdetails (OrderDetailID,OrderID, ProductID, Quantity) VALUES ('$OrderDetailID','$OrderID', '$ProductID', '$Quantity')";
        
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    public static function getOrders() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT OrderID, OrderDate FROM orders";
        $result = $conn->query($sql);

        $orders = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $orders[] = $row;
            }
        }

        $conn->close();
        return $orders;
    }

    public static function getProducts() {
        $conexion = new Conexion();
        $conn = $conexion->getConexion();
        $sql = "SELECT ProductID, ProductName FROM products";
        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        $conn->close();
        return $products;
    }
}
?>


