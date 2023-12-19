<?php
error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ALL & ~E_WARNING);
$servername = "localhost";
$username = "root";
$password = "";
$database = "pediatra_sis";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla "tipo_vacunas"
$query = "SELECT * FROM medicamento";
$result = $conn->query($query);

function in_iframe() {
    return $_SERVER['HTTP_REFERER'] !== null && $_SERVER['HTTP_REFERER'] !== $_SERVER['REQUEST_URI'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de medicamentos</title>
  <!-- Enlaces a los archivos CSS externos -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

  <!-- Enlaces a los scripts de JavaScript -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="css/estilo-paciente.css"> 
  
  <style>
    .dataTables_wrapper .dataTables_filter input {
      border: 1px solid #aaa;
      border-radius: 3px;
      padding: 5px;
      background-color: white;
      color: inherit;
      margin-left: 3px;
    }

    tr:hover {
      background-color: #A8A4DE;
    }

    .resaltado {
      background-color: #A8A4DE;
    }

    #tabla_medicamento tbody tr:hover {
      background-color: #A8A4DE;
      cursor: pointer;
    }

    #tabla_medicamento tbody tr:active {
     /* background-color: #5bc0f7;
      cursor: pointer;
      border: 4px solid red;
      transition: background-color 0.8s ease, box-shadow 0.8s ease, color 0.5s ease, font-weight 0.8s ease;
      /* Animaciones de 0.5 segundos */
      /*box-shadow: 0 0 5px rgba(91, 192, 247, 0.8), 0 0 10px red;
      /* Sombra inicial y sombra roja */
      /*font-size: 25px;
      color: white;
      /* Cambiar el color del texto */
     /* font-weight: bold;
      /* Cambiar a negritas */
      /*font-family: "Copperplate", Fantasy;*/
    }
  </style>
  <style>
        .caja {
            border: 3px solid #ddd;
            padding: 10px;
            box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
            margin: 10px;
            border-radius: 5px;
        }

        .cajalegend {
            border: 0px solid rgba(102, 153, 144, 0.0);
            font-weight: bolder;
            font-size: 16px;
            color: white;
            margin: 0;
            padding: 0;
            background-color: transparent;
            border-radius: 2px;
            margin-top: -20px;
            text-shadow: 2px 1px 2px #000000;


        }

        .container {
            display: grid;
            grid-template-columns: 80%;
            grid-template-rows: repeat(3, 1fr);
            grid-gap: 6px 10px;
            margin-left: 10%;
            margin-right: 10%;
        }

        label {
            font-size: 14px;
            color: #444;
            margin: 8px;
            font-weight: bold;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;

            font-size: 12px;
            line-height: 14px;
            margin: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {

            width: 150px;
            height: 40px;
            color: #444;
            margin-bottom: 6%;
            border: none;
            border-bottom: 0.1vw solid #444;
            outline: none;
            border-radius: 10px;

        }

        button {
            border: none;
            outline: none;
            color: #fff;
            font-size: 1.6vw;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            cursor: pointer;
            padding: 10px;
            border-radius: 2vw;

            margin: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            height: auto;
            min-height: 40px;
        }


        .boton_bus {
            border: none;
            outline: none;
            height: 4vw;
            color: #fff;
            font-size: 1.6vw;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            cursor: pointer;
            border-radius: 60px;
            width: 60px;
            margin-top: 2vw;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            height: auto;


        }

        .boton_bus:active {
            background-color: #5bc0f7;
            scale: 1.5;
            cursor: pointer;

            transition: background-color 0.8s ease, box-shadow 0.8s ease, color 0.8s ease, font-weight 0.8s ease;
            /* Animaciones de 0.5 segundos */
            box-shadow: 0 0 5px rgba(91, 192, 247, 0.8), 0 0 10px red;
            /* Sombra inicial y sombra roja */
            font-size: 25px;
            color: white;
            /* Cambiar el color del texto */
            font-weight: bold;
            /* Cambiar a negritas */
            font-family: "Copperplate", Fantasy;
        }

        /* Estilos específicos para el modal personalizado */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .custom-modal-content {
            width: 80%;
            height: 80%;
            margin: auto;
            background: linear-gradient(to right, #e4e5dc, #45bac9db);
            padding: 20px;
            border-radius: 20PX;
        }

        .custom-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .custom-close:hover,
        .custom-close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos adicionales específicos para el iframe dentro del modal */
        .custom-iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .clasebotonVER {
          color:#f0f0f0;
          text-shadow:2px 2px 4px #000000;
          font-weight: bold;
            border: none;
            outline: none;
            background: linear-gradient(to right, #05c20e, #84e788);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
          
            font-size: 16px;
            padding: 7px;
            margin: 5px;

        }

        .clasebotonVER:hover {
            background: linear-gradient(to right, #84e788, #05c20e);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
  <script>
    /* $(document).ready(function() {
      $('#tabla_seguros').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });*/
    $(document).ready(function() {
      $('#tabla_medicamento').DataTable({
        dom: 'frtip', // Mostrar solo búsqueda y paginación
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
        }
      });
      var table = $('#tabla_medicamento').DataTable();
      $('#tabla_medicamento').on('click', 'tr', function() {
        var data = table.row(this).data();
        // below some operations with the data
        // How can I set the row color as red?
        $(this).addClass('highlight').siblings().removeClass('highlight');
      });




    });




    function seleccionarmedicamento(idmedicamento, nombremedicamento, descripcionmed, formatomed, cantidadmed) {
      var openerWindow = window.opener;
      openerWindow.document.getElementById("Id_seguro_salud").value = idmed;
      openerWindow.document.getElementById("Nombre_med").textContent = nombremed;
      openerWindow.document.getElementById("descripcion_med").textContent = descripcionmed;
      openerWindow.document.getElementById("formato_med").textContent = formatomed;
      openerWindow.document.getElementById("cantidad_med").textContent = cantidadmed;
      window.close();
    }
  </script>
</head>

<body>
 

  <table id="tabla_medicamento" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre Medicamento</th>
        <th>Description</th>
        <th>Formato</th>
        <th>Medida</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Iterar a través de los resultados de la consulta y generar filas en la tabla
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr onclick=\"seleccionarmedicamento('" . $row["Id_medicamento"] . "', '" . $row["nombre_medicamento"] . "', '" . $row["descripcion"] . "', '" . $row["formato"] . "', '" . $row["Cantidad_total"] . "')\">";
          echo "<td>" . $row['Id_medicamento'] . "</td>";
          echo "<td>" . $row['nombre_medicamento'] . "</td>";
          echo "<td>" . $row['descripcion'] . "</td>";
          echo "<td>" . $row['formato'] . "</td>";
          echo "<td>" . $row['Cantidad_total'] . "</td>";
          echo "<td style='width:24%'> <a class='clasebotonVER' href=\"modulo/medicamentos/editar.php?Id_medicamento=$row[Id_medicamento]&pag=$pagina\" " . (in_iframe() ? 'target="_parent"' : '') . "><i class='material-icons' style='font-size:21px;color:#f0f0f0;text-shadow:2px 2px 4px #000000;'>edit</i>Editar</a> </td>";
          //echo "<td style='width:24%'><a class='clasebotonVER' href=\"modulo/medicamentos/editar.php?Id_medicamento=$row[Id_medicamento]&pag=$pagina\">Modificar</a> </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <script>
    //evento click para el mantenimiento del paciente

    $(document).ready(function() {
      var tablamedicamento = $('#tabla_medicamento').DataTable();

      // Asignar un evento de clic a las filas de la tabla
      $('#tabla_medicamento tbody').on('click', 'tr', function() {
        // Obtener la fila clicada
        var fila = $(this);

        // Obtener los datos de las celdas
        var idmed = tablaSeguros.row(fila).data()[0];
        var nombremed = tablaSeguros.row(fila).data()[1];
        var descmed = tablaSeguros.row(fila).data()[2];
        var formmed = tablaSeguros.row(fila).data()[3];
        var cantmed = tablaSeguros.row(fila).data()[4];

        // Asignar los valores al campo de texto y al label en paciente.php
        window.parent.document.getElementById('Id_medicamento ').value = idmed;
        window.parent.document.getElementById('nombremedicamento').textContent = nombremed;
        window.parent.document.getElementById('descripcionmed').textContent = descripcionmed;
        window.parent.document.getElementById('formatomed').textContent = formatomed;
        window.parent.document.getElementById('cantmed').textContent = cantmed;



        // Resaltar toda la fila con un delay de 2 segundos
        fila.addClass('resaltado');

        // Cerrar el modal después de 2 segundos
        setTimeout(function() {
          fila.removeClass('resaltado');
          window.parent.document.getElementById('myModal').style.display = 'none';
        }, 800);
      });

      // Asignar un evento de clic al botón de cierre del modal
      window.parent.document.querySelector('#myModal .close').addEventListener('click', function() {
        // Cerrar el modal
        window.parent.document.getElementById('myModal').style.display = 'none';
      });

      // Evitar que el evento de clic en el modal cierre el modal
      window.parent.document.querySelector('#myModal .modal-content').addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
  </script>

</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>