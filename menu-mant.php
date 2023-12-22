<html>

<head>
  <title>Sis_Pediátrico</title>
  <link rel="icon" type="image/x-icon" href="IMAGENES/hospital2.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Anton:regular" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Bitter:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Obtén todos los títulos de tarjetas
      var cardTitles = document.querySelectorAll('.card-title');

      // Agrega el evento hover a cada título de tarjeta
      cardTitles.forEach(function(cardTitle) {
        cardTitle.addEventListener('mouseenter', function() {
          // Encuentra la tarjeta padre de este título
          var card = this.closest('.card');

          // Aplica el efecto solo a la tarjeta encontrada
          if (card) {
            card.style.transform = 'scale(1.1)';
          }
        });

        cardTitle.addEventListener('mouseleave', function() {
          // Encuentra la tarjeta padre de este título
          var card = this.closest('.card');

          // Restablece la transformación solo a la tarjeta encontrada
          if (card) {
            card.style.transform = 'scale(1)';
          }
        });
      });
    });
  </script>
  <style>
    body {
      background: linear-gradient(to right, #E8A9F7, #e4e5dc);
    }

    fieldset {
      background: linear-gradient(to right, #e4e5dc, #62c4f9);
    }

    /* Estilos para las tarjetas (card) */
    .card {
      float: left;
      width: 200px;
      height: 200px;
      padding: 10px;
      border-radius: 10px;
      box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.2);
      background: linear-gradient(to right, #e4e5dc, #62c4f9);
      text-align: center;
      margin-bottom: 30px;
      color: #444;
      margin: 10px;
      transition: transform 0.3s;
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .card img {
      width: 50px;
      /* Ajusta el tamaño del icono según sea necesario */
      height: 50px;
      margin-top: 10px;
      /* Espaciado entre el icono y el texto */
    }

    /*.card:hover {
    transform: scale(1.1);
}*/

    .card-title {
      font-size: 20px;
      font-weight: bold;
    }

    .card-description {
      display: none;
    }

    .card:hover .card-description {
      display: block;
      text-align: justify;
    }

    .card-container {

      display: flex;
      justify-content: space-around;
      /* Ajusta según tus necesidades de espaciado */
      /*display: flex;
 flex-direction: column;*/
      display: grid;
      grid-template-columns: repeat(3, 30%);
      grid-template-rows: repeat(3, 1fr);
      /* "1fr" representa una fracción del espacio disponible */
      grid-gap: 6px 10px;
      width: 60%;
      margin: 2% 20% 0% 20%;
    }
  </style>
  <?php

  include("menu_lateral_header.php");

  ?>
</head>

<?php
include("menu_lateral.php");
?>

<body>

  <div style="width:100%; padding: 6px; width: 100%; display: flex; flex-direction: column; align-items: center;">
    <h2 style="padding: 1%;text-align: center;text-transform: uppercase;font-family: bitter; color:black; padding: 15px; width: 100%; display: flex; flex-direction: column; align-items: center;">Menú de Mantenimientos</h2>
    <img src="IMAGENES\app90.png" class="" alt="crud">
  </div>
  <div class="botones-container" style="margin-top:0%;">
    <a href="index.php" class="claseboton">Login</a>
    <a href="menu.php" class="claseboton">Menú Principal</a>
  </div>
  <div class="card-container">
    <a href="menu-pacientes.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">
          <div class="card-title" style="font-family: Arial Black; color:black;">Pacientes</div>
          <img src="IMAGENES\rs.png" class="card-icon" alt="Mantenimientos">
          <div class="card-description">
            <p> En este apartado tenemos lo referente a Pacientes y subtareas.</p>
          </div>
        </div>
      </div>
    </a>

    <a href="mant_seguro.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">
          <div class="card-title" style="font-family: Arial Black; color:black;">Seguros</b></div>
          <img src="IMAGENES/seguros3.png" class="card-icon" alt="Procesos">
          <div class="card-description">
            <p> Registrar y editar listado las aseguradoras de salud.</p>
          </div>
        </div>
      </div>
    </a>
    <a href="mant-Agregaruser.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">

          <div class="card-title" style="font-family: Arial Black; color:black;">Usuarios</div>
          <img src="IMAGENES/usuario-100.png" class="card-icon" alt="Procesos">
          <div class="card-description"> Registrar y editar listado usuarios del sistema.</div>
        </div>
      </div>
    </a>

    <a href="mant-centromedico.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">

          <div class="card-title" style="font-family: Arial Black; color:black;">Centro Médico</div>
          <img src="IMAGENES/clinica.png" class="card-icon" alt="Procesos">
          <div class="card-description">Registrar y editar listado de centros medicos, clinicas, etc.</div>
        </div>
      </div>
    </a>

    <a href="mant_medicamentos.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">
          <div class="card-title" style="font-family: Arial Black; color:black;">Medicamentos</div>
          <img src="IMAGENES/pildoras.png" class="card-icon" alt="Procesos">
          <div class="card-description">Registrar y editar listado de Medicamentos.</div>
        </div>
      </div>
    </a>
    <a href="mant_vacunas.php">
      <div class="card-wrapper">
        <div class="card" style="background: linear-gradient(to right, #e4e5dc, #62c4f9); ">
          <div class="card-title" style="font-family: Arial Black; color:black;">Vacunas</div>
          <img src="IMAGENES/vacunabyn.png" class="card-icon" alt="Procesos">
          <div class="card-description">Registrar y editar listado de vacunas.</div>
        </div>
      </div>
    </a>
    <!-- <div class="card">
    <div class="card-title">Subproceso #3</div>
    <img src="IMAGENES/none.png" class="card-icon" alt="Procesos">
    <div class="card-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget ullamcorper sapien. </div>
  </div> -->

  </div>



</body>

</html>