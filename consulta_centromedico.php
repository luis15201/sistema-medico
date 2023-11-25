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

// Consulta para obtener los datos de la tabla "usuario"
$query = "SELECT id_centro, nombre, direccion, telefono FROM institucion_de_salud";
$result = $conn->query($query);

// Función para obtener los datos del usuario por ID
function obtenerdatoscentro($id_centro, $conn)
{
  $query = "SELECT nombre FROM institucion_de_salud WHERE id_centro = '$id_centro'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $datoscentro = array('nombre' => $row['nombre']);
    return $datoscentro;
  } else {
    return false;
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
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

  <style>
  .dataTables_wrapper .dataTables_filter input {
    border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: white;
    color: inherit;
    margin-left: 3px;
}
</style>
</head>

<body>
  <h3 style="padding:0; margin:0;">Consulta de centros medicos</h3>

  <table id="tabla_centro" class="display" style="width:100%">
  <thead>
                <tr>
                    <th>id centromedico</th>
                    <th>nombre del centro medico</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                </tr>
            </thead>
    <tbody>
      <?php
      // Iterar a través de los resultados de la consulta y generar filas en la tabla
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $mostrar['id_centro'] . "</td>";
          echo "<td>" . $mostrar['nombre'] . "</td>";
          echo "<td>" . $mostrar['direccion'] . "</td>";
          echo "<td>" . $mostrar['telefono'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No se encontraron resultados.</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <script>
    $(document).ready(function() {
      $('#tabla_centro').DataTable({
        dom: 'frtip', // Mostrar solo búsqueda y paginación
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
        }
      });

      // Asignar un evento de clic a las filas de la tabla
      $("#tabla_centro tbody").on("click", "tr", function() {
        // Obtener las celdas de la fila clicada
        var celdas = $(this).find("td");

        // Obtener los datos de las celdas
        var id_centro = celdas.eq(0).text();
        var nombre = celdas.eq(1).text();
        
        // Asignar los valores al campo de texto y al label en el otro documento
        window.parent.document.getElementById("id_centro").value = id_centro;
        window.parent.document.getElementById("nombre").textContent = nombre;
       
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