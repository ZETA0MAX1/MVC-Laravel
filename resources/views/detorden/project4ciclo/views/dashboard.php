<?php
// session_start();
// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../views/login.php');
//     exit();
// };

 include 'template/head.php';
?>
<style>
  a{
    font-size: 15px; 
  }
  @media (min-width: 768px) {
  

  .containers nav ul {
      flex-direction: row;
      width: 100%;
      margin: 5px;
  }

  .containers nav ul a {
      width: 100%;
      text-align: left;
      padding: 2px;
    }
  .containers img{
      width: 150px;
  }
  
}
</style>
<div class="containers">
            <img src="../views/img/logo.jpg">
            <nav>
                <ul>
                    <a href="#">Informacion de la cuenta</a>
                    <a href="../views/cambio_de_contraseña.php">Cambiar Contraseña</a>
                    <a href="../controllers/logout.php">Cerrar Sesión</a>
                </ul>

            </nav>
</div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <?php include 'template/menu.php';?>
    </div>
    
    <?php include 'template/tabla.php';?>
    
  </div>
  <div class="col-sm-2 sidenav">
      <div class="well">
      <p><a href="#"><img src="../views/img/enlace1.jpg" alt="Link 1" style="width:100%;"></a></p>
      </div>
      <div class="well">
        <p><a href="#"><img src="../views/img/enlace2.jpg" alt="Link 2" style="width:100%;"></a></p>
        <p><a href="#"><img src="../views/img/enlace3.png" alt="Link 3" style="width:100%;"></a></p>
      </div>
  </div>
</div>
<?php

?>