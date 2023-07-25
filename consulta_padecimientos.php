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

// Consulta para obtener los datos de la tabla "padecimientos_comunes"
$query = "SELECT id_padecimiento, nombre_padecimiento FROM padecimientos_comunes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de Padecimientos Comunes</title>
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

  <script>
    $(document).ready(function() {
      $('#tabla_padecimientos_comunes').DataTable({
        dom: 'frtip', // Mostrar solo búsqueda y paginación
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
        }
      });
    });

    function seleccionarPadecimiento(idPadecimiento, nombrePadecimiento) {
      var openerWindow = window.opener;
      openerWindow.document.getElementById("id_padecimiento").value = idPadecimiento;
      openerWindow.document.getElementById("nombre_padecimiento").textContent = nombrePadecimiento;
      window.close();
    }
  </script>
</head>

<body>
  <h3 style="padding:0; margin:0;">Consulta de Padecimientos Comunes</h3>

  <table id="tabla_padecimientos_comunes" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID Padecimiento</th>
        <th>Nombre Padecimiento</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Iterar a través de los resultados de la consulta y generar filas en la tabla
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr onclick=\"seleccionarPadecimiento('" . $row["id_padecimiento"] . "', '" . $row["nombre_padecimiento"] . "')\">";
          echo "<td>" . $row["id_padecimiento"] . "</td>";
          echo "<td>" . $row["nombre_padecimiento"] . "</td>";
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
      // Asignar un evento de clic a las filas de la tabla
      $("#tabla_padecimientos_comunes tbody").on("click", "tr", function() {
        // Obtener las celdas de la fila clicada
        var celdas = $(this).find("td");

        // Obtener los datos de las celdas
        var idPadecimiento = celdas.eq(0).text();
        var nombrePadecimiento = celdas.eq(1).text();

        // Asignar los valores al campo de texto y al label en paciente.php
        window.parent.document.getElementById("id_padecimiento").value = idPadecimiento;
        window.parent.document.getElementById("nombre_padecimiento").textContent = nombrePadecimiento;
      });

      // Asignar un evento de clic al botón de cierre del modal

      window.parent.document.querySelector("#ModalHistoriaClinica .close").addEventListener("click", function() {
        // Cerrar el modal
        window.parent.document.getElementById("ModalHistoriaClinica").style.display = "none";
      });

      // Evitar que el evento de clic en el modal cierre el modal
      window.parent.document.querySelector("#ModalHistoriaClinica .modal-content").addEventListener("click", function(event) {
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