 



<html>

<head>
  <title>Sis_Pediátrico</title>
    <link rel="icon" type="image/x-icon" href="IMAGENES/hospital2.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Anton:regular" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Bitter:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />

  <?php

include("menu_lateral_header.php");

?>


</head>
<?php

  include("menu_lateral.php");

  ?>

<body style="background: linear-gradient(to right, #E8A9F7,#e4e5dc ); ">
  <div style="width:100%; padding: 6px; width: 100%; display: flex; flex-direction: column; align-items: center;">
    <h2 style="padding: 1%;text-align: center;text-transform: uppercase;font-family: bitter; color:black; padding: 15px; width: 100%; display: flex; flex-direction: column; align-items: center;">Procedimientos de los Pacientes</h2>
    <img src="IMAGENES\pacienteColor.png" class="" alt="crud">
  </div>
  <a href="paciente.php">
    <div class="card" style="background: linear-gradient(to right,#e4e5dc ,#62c4f9 ); ">
      <div class="card-title" style="font-family: Anton; color:black;">Pacientes</div>
      <img src="IMAGENES\revisionsalud.png" class="card-icon" alt="Mantenimientos">
      <div class="card-description">Registrar datos generales del niño/a</div>
    </div>
  </a>

  <a href="MANT-pacientevacuna.php">
    <div class="card" style="background: linear-gradient(to right,#e4e5dc ,#62c4f9 ); ">
      <div class="card-title" style="font-family: Anton; color:black;">Vacunas</div>
      <img src="IMAGENES\vacunacion.png" class="card-icon" alt="Mantenimientos">
      <div class="card-description">Registrar datos de las vacunas para un paciente ya existente del niño/a</div>
    </div>
  </a>

  <a href="mant_paciente_historiaClinica.php">
  <div class="card" style="background: linear-gradient(to right,#e4e5dc ,#62c4f9 ); ">
      <div class="card-title" style="font-family: Anton; color:black;">Padecimientos del Paciente</div>
    <img src="IMAGENES/historia2.png" class="card-icon" alt="Procesos">
    <div class="card-description">Insertar padecimientos/condición médica vigentes en el paciente/s</div>
  </div>

  <div class="card">
    <div class="card-title">Subproceso #3</div>
    <img src="IMAGENES/none.png" class="card-icon" alt="Procesos">
    <div class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ullamcorper sapien. Integer a nisi dapibus, dignissim leo sed, porta justo. Fusce ut volutpat est, ac lacinia est. In hac habitasse platea dictumst. Nunc non ligula non mi placerat tristique. Sed id elit non elit aliquet fringilla. Vivamus in dui vitae metus semper eleifend. Quisque ullamcorper ligula vel neque vulputate eleifend.</div>
  </div>



  <div class="botones-container">
  <a href="menu-mant.php" class="claseboton">← Atrás</a>
    <a href="index.php" class="claseboton">Login</a>
    <a href="menu.php" class="claseboton">Menú Principal</a>
    
  </div>
<script>

</script>
</body>

</html>