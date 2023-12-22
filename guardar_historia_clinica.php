<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "pediatra_sis";

// Establecer la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener los datos enviados desde el formulario
$data = file_get_contents('php://input');
$dataArray = json_decode($data, true);

$pacientesPadecimientos = $dataArray['pacientesPadecimientos'];


// Función para guardar los datos de pacientes_Padecimientos
function guardarPacientesPadecimientos($conn, $pacientesPadecimientos)
{
    foreach ($pacientesPadecimientos as $Padecimientos) {
        $id_paciente = $Padecimientos['id_paciente'];
        $id_padecimiento = $Padecimientos['id_padecimiento'];
        $nombre = $Padecimientos['nombre_padecimiento'];
        $notas = $Padecimientos['notas'];
        $desde_cuando = $Padecimientos['desde_cuando'];

        

        // Crear una consulta preparada para insertar los datos en la tabla
        $sql_pacientes_padecimientos = "INSERT INTO historia_clinica (ID_Paciente ) VALUES (?)";
        // Preparar la declaración
        $stmt = $conn->prepare($sql_pacientes_padecimientos);

        // Vincular los parámetros
        $stmt->bind_param("s", $id_paciente);

        // Ejecutar la consulta preparada
        if ($stmt->execute() === FALSE) {
            $error_message = "Error al guardar los datos de pacientes_vacunas: " . $conn->error;
            error_log($error_message); // Registra el error en el archivo de registro del servidor o en otro lugar adecuado
            echo $error_message; // Muestra el mensaje de error al cliente
            return;
        }
    }

    echo "Datos de pacientes_padecimientos guardados exitosamente.";
}

// Verificar si la tabla de pacientes_padecimientos tiene datos
if ($pacientesPadecimientos) {
    guardarPacientesPadecimientos($conn, $pacientesPadecimientos);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);




?>