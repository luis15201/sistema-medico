<html>

<head>
  <title>Sis_Pediátrico</title>
  <link rel="icon" type="image/x-icon" href="IMAGENES/hospital2.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIS_Pediátrico</title>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Obtén todos los títulos de tarjetas
    var cardTitles = document.querySelectorAll('.card-title');

    // Agrega el evento hover a cada título de tarjeta
    cardTitles.forEach(function (cardTitle) {
        cardTitle.addEventListener('mouseenter', function () {
            // Encuentra la tarjeta padre de este título
            var card = this.closest('.card');

            // Aplica el efecto solo a la tarjeta encontrada
            if (card) {
                card.style.transform = 'scale(1.1)';
            }
        });

        cardTitle.addEventListener('mouseleave', function () {
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
      text-align: justify;
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
 justify-content: space-around; /* Ajusta según tus necesidades de espaciado */
 /*display: flex;
 flex-direction: column;*/
 display: grid;
   grid-template-columns: repeat(3, 30%);
   grid-template-rows: repeat(3, 1fr);
   /* "1fr" representa una fracción del espacio disponible */
   grid-gap: 6px 10px;
 width: 60%;
 margin:2% 20% 0% 20%;
}
  </style>
  <?php

  include("menu_lateral_header.php");

  ?>

</head>

<body>



  <?php

  include("menu_lateral.php");

  ?>


<div style="width:100%; padding: 6px; width: 100%; display: flex; flex-direction: column; align-items: center;">
    <h2 style="padding: 1%;text-align: center;text-transform: uppercase;font-family: bitter; color:black; padding: 15px; width: 100%; display: flex; flex-direction: column; align-items: center;">Menú Principal Sistema de Pediatría</h2>
    <img src="IMAGENES\Browser.256.png" class="" alt="crud" width="82px" heigth="82px">
  </div>

  <!-- <h2 style="padding: 5%;text-align: center;text-transform: uppercase;">Menú Principal Sistema de Pediatría</h2> -->


  <div style='width: 100%;float: left;'>
    <form action="index.php" method="POST">
      <input type="submit" value="Regresar al login">
    </form>
  </div>
  <div class="card-container">
    <a href="menu-mant.php">
    <div class="card-wrapper">
    <div class="card">
        <div class="card-title">Mantenimientos</div>
        <img src="IMAGENES/Mantenimientos.png" class="card-icon" alt="Mantenimientos">
        <div class="card-description">
          <p>Esta opción te permite realizar operaciones de mantenimiento sobre
            la base de datos.</p>
        </div>
      </div>
    </div>
    </a>
    <div class="card-wrapper">
    <div class="card">
      <div class="card-title">Procesos</div>
      <img src="IMAGENES/procesos.png" class="card-icon" alt="Procesos">
      <div class="card-description">
        <p>Esta opción te permite ejecutar procesos que involucran procedimientos medicos.</p>
      </div>
    </div>
    </div>

    <div class="card-wrapper">
    <div class="card">
      <div class="card-title">Consultas</div>
      <img src="IMAGENES/consultas.png" class="card-icon" alt="Consultas">
      <div class="card-description">
        <p>Esta opción te permite realizar consultas personalizadas sobre la base de datos.</p>
      </div>
    </div>
    </div>
    <div class="card-wrapper">
    <div class="card">
      <div class="card-title">Reportes</div>
      <img src="IMAGENES/reportes.png" class="card-icon" alt="Reportes">
      <div class="card-description">
        <p>Esta opción te permite generar reportes gráficos o estadísticos sobre la base de
          datos.</p>
      </div>
    </div>
    </div>
  </div>


</body>

</html>