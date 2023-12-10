



<?php
error_reporting(E_ERROR | E_PARSE);
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

// Consulta para obtener los datos de la tabla "paciente"
$query = "SELECT id_paciente, nombre, apellido, sexo, fecha_nacimiento, Nacionalidad, Con_quien_vive, Direccion_reside FROM paciente";
$result = $conn->query($query);

// Función para obtener los datos del paciente por ID
function obtenerDatosPaciente($idPaciente, $conn)
{
  $query = "SELECT nombre, apellido FROM paciente WHERE id_paciente = '$idPaciente'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $datosPaciente = array('nombre' => $row['nombre'], 'apellido' => $row['apellido']);
    return $datosPaciente;
  } else {
    return false;
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Pacientes</title>
  <!-- Enlaces a los archivos CSS de DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <!-- Enlaces a los scripts de JavaScript de jQuery y DataTables -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>


  <style>
  .dataTables_wrapper .dataTables_filter input {
    border: 1px solid #aaa;
    border-radius: 10px;
    padding: 5px;
    background-color: white;
    color: inherit;
    margin-left: 3px;
}
</style>


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
    #tabla_seguros tbody tr:hover {
       background-color: #A8A4DE;
       cursor: pointer;
   }
   #tabla_seguros tbody tr:active {
    background-color: #5bc0f7;
    cursor: pointer;
   border:4px solid red ;
    transition: background-color 0.8s ease, box-shadow 0.8s ease, color 0.5s ease, font-weight 0.8s ease; /* Animaciones de 0.5 segundos */
    box-shadow: 0 0 5px rgba(91, 192, 247, 0.8), 0 0 10px red; /* Sombra inicial y sombra roja */
    font-size: 25px;
    color: white; /* Cambiar el color del texto */
    font-weight: bold; /* Cambiar a negritas */
    font-family: "Copperplate",  Fantasy;
   }
  </style>
</head>

<body>
  <h3 style="padding:0; margin:0;">Consulta de Pacientes</h3>

  <table id="tabla_pacientes" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID Paciente</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Sexo</th>
        <th>Fecha Nacimiento</th>
        <th>Nacionalidad</th>
        <th>Con Quién Vive</th>
        <th>Dirección Reside</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Iterar a través de los resultados de la consulta y generar filas en la tabla
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id_paciente"] . "</td>";
          echo "<td>" . $row["nombre"] . "</td>";
          echo "<td>" . $row["apellido"] . "</td>";
          echo "<td>" . $row["sexo"] . "</td>";
          echo "<td>" . $row["fecha_nacimiento"] . "</td>";
          echo "<td>" . $row["Nacionalidad"] . "</td>";
          echo "<td>" . $row["Con_quien_vive"] . "</td>";
          echo "<td>" . $row["Direccion_reside"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='8'>No se encontraron resultados.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <script>
    $(document).ready(function() {
      $('#tabla_pacientes').DataTable({
        dom: 'frtip', // Mostrar solo búsqueda y paginación
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
        }
      });

      // Asignar un evento de clic a las filas de la tabla
      $("#tabla_pacientes tbody").on("click", "tr", function() {
        // Obtener las celdas de la fila clicada
        var celdas = $(this).find("td");

        // Obtener los datos de las celdas
        var idPaciente = celdas.eq(0).text();
        var nombrePaciente = celdas.eq(1).text();
        var apellidoPaciente = celdas.eq(2).text();
        // Asignar los valores al campo de texto y al label en el otro documento
        window.parent.document.getElementById("id_paciente").value = idPaciente;
        window.parent.document.getElementById("nombre_paciente").textContent = nombrePaciente;
        window.parent.document.getElementById("apellido_paciente").textContent = apellidoPaciente;
      });

      // Resto del script similar al código anterior
    });
  </script>

</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>