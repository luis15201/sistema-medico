<?php
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

// Obtener el ID del paciente enviado por AJAX
$idpadre = $_POST['Numidentificador'];

// Consulta para obtener el nombre y el apellido del paciente
$query = "SELECT Nombre, Apellido FROM datos_padres_de_pacientes WHERE Numidentificador = '$idpadre'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nombrepadre = $row['Nombre'];
    $apellidopadre = $row['Apellido'];

    // Devolver el nombre y el apellido del paciente como JSON
    $response = array(
        'Nombre' => $nombrepadre,
        'Apellido' => $apellidopadre
    );
    echo json_encode($response);
} else {
    // No se encontró ningún paciente con ese ID
    $response = array(
        'Nombre' => '',
        'Apellido' => ''
    );
    echo json_encode($response);
}

// Cerrar la conexión
$conn->close();
?>