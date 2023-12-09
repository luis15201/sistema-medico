<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu Título</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS y Popper.js (Requeridos para el Offcanvas) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <style>
    /*.list-group-mine .list-group-item {
      background-color: #f1f9fb;
      border-top: 1px solid #0091b5;
      border-left-color: #fff;
      border-right-color: #fff;
    }*/

    .list-group-mine .list-group-item:hover {
      background-color: #1A6EDB;
      color:white;
    }

    .list-group-mine .list-group-item:active {
      background-color: #421ADB;
      color:white;
    }

    .list-group-mine .list-group-item:focus {
      background-color: #1AABDB;
    }
    
  </style>







</head>

<body>

  <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="material-icons">menu</i>
  </a>


  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menú Lateral</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div>



      <div class="list-group list-group-mine">
        <a href="#" class="list-group-item list-group-item-action">An item</a>

        <!-- Elemento con acordeón -->
        <div class="list-group-item list-group-item-action">
            <a href="#" data-bs-toggle="collapse" data-bs-target="#submenu" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action">A second item with Submenu</a>
            <div class="collapse" id="submenu" data-bs-parent="#submenu-container">
                <a href="#" class="list-group-item list-group-item-action">Subitem 1</a>
                <a href="#" class="list-group-item list-group-item-action">Subitem 2</a>
            </div>
        </div>

        <a href="#" class="list-group-item list-group-item-action">A third item</a>
        <a href="#" class="list-group-item list-group-item-action">And a fourth one</a>
    </div>

    






      </div>
      <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          Dropdown button
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </div>
  </div>









  <h2 style="padding: 5%;text-align: center;text-transform: uppercase;">Menú Principal Sistema de Pediatría</h2>

  <a href="menu-mant.php">
    <div class="card">
      <div class="card-title">Mantenimientos</div>
      <img src="IMAGENES/Mantenimientos.png" class="card-icon" alt="Mantenimientos">
      <div class="card-description">Esta opción te permite realizar operaciones de mantenimiento sobre las tablas de la base de datos, como crear, modificar, eliminar o consultar registros. También puedes realizar copias de seguridad y restaurar la información en caso de pérdida o daño.</div>
    </div>
  </a>

  <div class="card">
    <div class="card-title">Procesos</div>
    <img src="IMAGENES/procesos.png" class="card-icon" alt="Procesos">
    <div class="card-description">Esta opción te permite ejecutar procesos que involucran varias tablas de la base de datos, como calcular el salario de los empleados, generar facturas, actualizar el inventario, etc. Puedes ver el resultado de los procesos en pantalla o en archivos.</div>
  </div>

  <div class="card">
    <div class="card-title">Consultas</div>
    <img src="IMAGENES/consultas.png" class="card-icon" alt="Consultas">
    <div class="card-description">Esta opción te permite realizar consultas personalizadas sobre la base de datos, usando criterios de selección, ordenación, agrupación y filtrado. Puedes ver el resultado de las consultas en pantalla o en archivos.</div>
  </div>

  <div class="card">
    <div class="card-title">Reportes</div>
    <img src="IMAGENES/reportes.png" class="card-icon" alt="Reportes">
    <div class="card-description">Esta opción te permite generar reportes gráficos o estadísticos sobre la base de datos, usando diferentes tipos de gráficos, como barras, líneas, tortas, etc. Puedes ver el resultado de los reportes en pantalla o en archivos.</div>
  </div>
  <div style='width: 100%;float: left;'>
    <form action="index.php" method="POST">
      <input type="submit" value="Regresar al login">
    </form>
  </div>

</body>

</html>