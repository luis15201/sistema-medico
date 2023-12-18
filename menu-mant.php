


<html>

<head>
  <title>Sis_Pediátrico</title>
    <link rel="icon" type="image/x-icon" href="IMAGENES/hospital2.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Anton:regular" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Bitter:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <?php

include("menu_lateral_header.php");

?>







</head>

<?php

include("menu_lateral.php");

?>


<body style="background: linear-gradient(to right, #7789, #fff6);">
  <div style="width:100%; padding: 6px; width: 100%; display: flex; flex-direction: column; align-items: center;">
    <h2 style="padding: 1%;text-align: center;text-transform: uppercase;font-family: bitter; color:black; padding: 15px; width: 100%; display: flex; flex-direction: column; align-items: center;">Menú de Mantenimientos</h2>
    <img src="IMAGENES\app90.png" class="" alt="crud">
  </div>
  <a href="menu-pacientes.php">
    <div class="card" style="background: linear-gradient(to right, #7789,#e4e5dc ); ">
      <div class="card-title" style="font-family: Arial Black; color:black;">Pacientes</div>
      <img src="IMAGENES\pacientes.png" class="card-icon" alt="Mantenimientos">
      <div class="card-description">En este apartado podemos encontrar todo lo referente a los Pacientes. y sub-mantenimientos referentes</div>
    </div>
  </a>

  <a href="mant_seguro.php">
  <div class="card" style="background: linear-gradient(to right,#7789,#e4e5dc ); ">
  <div class="card-title" style="font-family: Arial Black; color:black;">Seguros</b></div>
    <img src="IMAGENES/seguros3.png" class="card-icon" alt="Procesos">
    <div class="card-description">Aqui podemos registrar las aseguradoras de salud.</div>
  </div>
</a>
<a href="mant-Agregaruser.php">
<div class="card" style="background: linear-gradient(to right,#7789,#e4e5dc ); ">
    
<div class="card-title" style="font-family: Arial Black; color:black;">Usuarios</div>
    <img src="IMAGENES/usuario-100.png" class="card-icon" alt="Procesos">
    <div class="card-description">Este el es el mantenimiento de usuarios del sistema.</div>
  </div>
</a>

<a href="mant-centromedico.php">
<div class="card" style="background: linear-gradient(to right,#7789,#e4e5dc ); ">
    
<div class="card-title" style="font-family: Arial Black; color:black;">centro medico</div>
    <img src="IMAGENES/usuario-100.png" class="card-icon" alt="Procesos">
    <div class="card-description">Este el es el mantenimiento de centros medicos.</div>
  </div>
</a>

<a href="mant_medicamentos.php">
<div class="card" style="background: linear-gradient(to right,#7789,#e4e5dc ); ">
    
<div class="card-title" style="font-family: Arial Black; color:black;">Medicamentos</div>
    <img src="IMAGENES/usuario-100.png" class="card-icon" alt="Procesos">
    <div class="card-description">Este el es el mantenimiento de Medicamentos.</div>
  </div>
</a>

  <div class="card">
    <div class="card-title">Subproceso #3</div>
    <img src="IMAGENES/none.png" class="card-icon" alt="Procesos">
    <div class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ullamcorper sapien. </div>
  </div>



  <div class="botones-container">
    <a href="index.php" class="claseboton">Login</a>
    <a href="menu.php" class="claseboton">Menú Principal</a>
  </div>

</body>

</html>