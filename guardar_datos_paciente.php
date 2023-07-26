<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pediatra_sis";

// Función para obtener el próximo ID de paciente
function obtenerProximoIdPaciente($conn)
{
    // Realizar la consulta SQL para obtener el próximo ID de paciente
    $query = "SELECT MAX(id_paciente) AS ultimoId FROM paciente";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $ultimoIdPaciente = $row['ultimoId'];

    // Si la tabla está vacía, asignamos el valor inicial de 1 al próximo ID de paciente
    if (empty($ultimoIdPaciente)) {
        $proximoIdPaciente = 1;
    } else {
        // Incrementar el último ID para obtener el próximo ID
        $proximoIdPaciente = $ultimoIdPaciente + 1;
    }

    return $proximoIdPaciente;
}

// Establecer la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el próximo ID de paciente
$proximoIdPaciente = obtenerProximoIdPaciente($conn);

// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$pais = $_POST['pais'];
$con_quien_vive = $_POST['con_quien_vive'];
$direccion = $_POST['direccion'];
$NSS = $_POST['NSS'];
$Id_seguro_salud = $_POST['Id_seguro_salud'];

// Insertar datos en la tabla paciente
$sql_paciente = "INSERT INTO paciente (id_paciente, nombre, apellido, sexo, fecha_nacimiento, Nacionalidad, Con_quien_vive, Direccion_reside) 
VALUES ($proximoIdPaciente, '$nombre', '$apellido', '$sexo', '$fecha_nacimiento', '$pais', '$con_quien_vive', '$direccion')";

if ($conn->query($sql_paciente) === TRUE) {
    // Insertar datos en la tabla seguro_paciente
    $sql_seguro_paciente = "INSERT INTO seguro_paciente (NSS, id_paciente, Id_seguro_salud) VALUES ('$NSS', $proximoIdPaciente, '$Id_seguro_salud')";
    if ($conn->query($sql_seguro_paciente) === TRUE) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
