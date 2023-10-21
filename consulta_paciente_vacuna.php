<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$username = "root";
$password = "";
$database = "pediatra_sis";

// Obtener el ID de paciente desde el formulario o donde corresponda
$idPaciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : '';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener el historial de vacunas del paciente con el ID especificado
$query = "SELECT pv.id_vacuna_p, pv.id_paciente, pv.id_vacuna, pv.dosis, pv.refuerzo, pv.FECHA_APLICACION, tv.nombre AS nombre_vacuna
          FROM pacientes_vacunas pv
          INNER JOIN tipo_vacunas tv ON pv.id_vacuna = tv.id_vacuna
          WHERE pv.id_paciente = '$idPaciente'";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Vacunas del Paciente</title>
    <!-- Enlaces a los archivos CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Enlaces a los scripts de JavaScript de jQuery y DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h3 style="padding:0; margin:0;">Historial de Vacunas del Paciente</h3>

    <?php
    if ($result->num_rows > 0) {
    ?>
        <table id="tabla_vacunas" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID Vacuna</th>
                    <th>Nombre Vacuna</th>
                    <th>Dosis</th>
                    <th>Refuerzo</th>
                    <th>Fecha Aplicación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_vacuna"] . "</td>";
                    echo "<td>" . $row["nombre_vacuna"] . "</td>";
                    echo "<td>" . $row["dosis"] . "</td>";
                    echo "<td>" . $row["refuerzo"] . "</td>";
                    echo "<td>" . $row["FECHA_APLICACION"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p>Historial de Vacunas no encontrado.</p>";
    }
    ?>

    <script>
        $(document).ready(function() {
            $('#tabla_vacunas').DataTable({
                dom: 'frtip', // Mostrar solo búsqueda y paginación
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
                }
            });
        });
    </script>

</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>
