<?php
include_once("../models/CategoryModel.php");
include_once("../models/CustomerModel.php");
include_once("../models/EmployeeModel.php");
include_once("../models/OrderDetailsModel.php");
include_once("../models/OrderModel.php");
include_once("../models/ProductModel.php");
include_once("../models/ShipperModel.php");
include_once("../models/SupplierModel.php");

$totalCategories = CategoryModel::getAllCategories();
$totalCustomer = CustomerModel::getAllCustomer();
$totalEmployee = EmployeeModel::getAllEmployee();
$totalOrderDetails = OrderDetailModel::getAllOrderDetail();
$totalOrder = OrderModel::getAllOrder();
$totalProduct = ProductModel::getAllProduct();
$totalShipper = ShipperModel::getAllShipper();
$totalSupplier = SupplierModel::getAllSupplier();
?>

    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bienvenido</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <!-- Categorias -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $totalCategories ?></h3>
                                    <p style="font-size: 15px;">CATEGORIAS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="../views/lista_tabla/Categories.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Customers -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $totalCustomer ?></h3>
                                    <p style="font-size: 15px;">CLIENTES</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="../views/lista_tabla/Customers.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Employees -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $totalEmployee ?></h3>

                                    <p style="font-size: 15px;">EMPLEADOS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="../views/lista_tabla/Employees.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- OrderDetails -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $totalOrderDetails ?></h3>

                                    <p style="font-size: 15px;">DETALLES DE ORDEN</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="../views/lista_tabla/OrderDetails.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Orders -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $totalOrder ?></h3>

                                    <p style="font-size: 15px;">ORDENES</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="../views/lista_tabla/Orders.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Products -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $totalProduct ?></h3>

                                    <p style="font-size: 15px;">PRODUCTOS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="../views/lista_tabla/Products.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Shippers -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $totalShipper ?></h3>

                                    <p style="font-size: 15px;">TRANSPORTISTAS</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="../views/lista_tabla/Shippers.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Suppliers -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $totalSupplier ?></h3>

                                    <p style="font-size: 15px;">PROVEEDORES</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="../views/lista_tabla/Suppliers.php" class="small-box-footer">Más info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

        </div>



    </body>
