<?php
@include('template.head')
?>

<div class="containers text-center">
  <img src="{{ asset('images/logo.jpg') }}" alt="Descripción">
    <nav>
      <ul style="list-style-type: none; text-align: center; padding: 0;">
          <li><a href="#" style="display: inline-block;">Informacion de la cuenta</a></li>
          <li><a href="../views/cambio_de_contraseña.php" style="display: inline-block;">Cambiar Contraseña</a></li>
          <li><a href="../controllers/logout.php" style="display: inline-block;">Cerrar Sesión</a></li>
      </ul>
    </nav>
</div>
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2">
        @include('template.menu')
    </div>
    <div class="col-sm-8">

      <?php //include 'template/tabla.php';?>

    </div>
    <div class="col-sm-2">
      <div class="well">
        <img src="{{ asset('images/enlace1.jpg') }}" alt="Descripción">
      </div>
      <div class="well">
        <img src="{{ asset('images/enlace2.jpg') }}" alt="Descripción">
        <img src="{{ asset('images/enlace3.jpg') }}" alt="Descripción">
      </div>
  </div>
  </div>
</div>
