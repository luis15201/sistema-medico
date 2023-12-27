<?php
session_start();

error_reporting(E_ALL & ~E_WARNING);
require_once "../../include/conec.php";

$pagina = $_GET['pag'];

// Consultar el último ID de la tabla medicos
$query = "SELECT MAX(id_medico) AS max_id FROM medicos";
$result = $conn->query($query);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$lastId = $row["max_id"];
	$newId = $lastId + 1;
} else {
	// Si no hay registros en la tabla, asignar el ID inicial
	$newId = 1;
}

// Guardar el nuevo ID en una variable PHP
$idMedico = $newId;

// Función de validación de campos
function validarCampos($campos)
{
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            return false;
        }
    }
    return true;
}

// Validar campos antes de procesar el formulario
if (isset($_POST['btnregistrar'])) {
    $camposRequeridos = ['txtid', 'txtcedula', 'txtexequatur', 'txtnombre', 'txtapellido', 'txtespecialidad'];

    if (validarCampos($camposRequeridos)) {
        $idMedico = $_POST['txtid'];
        $cedula = $_POST['txtcedula'];
        $exequatur = $_POST['txtexequatur'];
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $idEspecialidad = $_POST['txtespecialidad'];

        // Insertar datos en la tabla medicos
        $queryAdd = mysqli_query($conn, "INSERT INTO medicos(id_medico, cedula, exequatur, nombre, apellido, id_especialidad) VALUES('$idMedico', '$cedula', '$exequatur', '$nombre', '$apellido', '$idEspecialidad')");

        if (!$queryAdd) {
            echo "Error con el registro: " . mysqli_error($conn);
        } else {
            echo "<script>window.location= '../../mant_medico.php?pag=1' </script>";
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos');</script>";
    }
}

?>
<html>

<head>
    <title>Sis_Pediátrico</title>
    <link rel="icon" type="image/x-icon" href="../../IMAGENES/hospital2.ico">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilo-paciente.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        /* Estilos personalizados aquí */
    </style>
    <script>
        // Función para validar campos antes de enviar el formulario
        function validarFormulario() {
            var idMedico = document.getElementById("txtid").value;
            var cedula = document.getElementById("txtcedula").value;
            var exequatur = document.getElementById("txtexequatur").value;
            var nombre = document.getElementById("txtnombre").value;
            var apellido = document.getElementById("txtapellido").value;
            var idEspecialidad = document.getElementById("txtespecialidad").value;

            if (idMedico.trim() === '' || cedula.trim() === '' || exequatur.trim() === '' || nombre.trim() === '' || apellido.trim() === '' || idEspecialidad.trim() === '') {
                alert("Por favor, complete todos los campos");
                return false;
            }

            return true;
        }
    </script>
<script type="text/javascript">
		// Obtener el campo de entrada y el nuevo ID
		var txtId = document.getElementById("txtid");
		var newId = <?php echo $idMedico; ?>;

		// Asignar el nuevo ID al campo de entrada
		txtId.value = newId;

		// Cambiar el fondo a gris claro
		txtId.style.backgroundColor = "#f0f0f0";




		function placeCursorAtEnd() {
			if (this.setSelectionRange) {
				// Double the length because Opera is inconsistent about 
				// whether a carriage return is one character or two.
				var len = this.value.length * 2;
				this.setSelectionRange(len, len);
			} else {
				// This might work for browsers without setSelectionRange support.
				this.value = this.value;
			}

			if (this.nodeName === "TEXTAREA") {
				// This will scroll a textarea to the bottom if needed
				this.scrollTop = 999999;
			}
		};

		window.onload = function() {
			var input = document.getElementById("txtseg");

			if (obj.addEventListener) {
				obj.addEventListener("focus", placeCursorAtEnd, false);
			} else if (obj.attachEvent) {
				obj.attachEvent('onfocus', placeCursorAtEnd);
			}

			input.focus();
		}
		
	</script>
	<?php

	include("../../menu_lateral_header.php");

	?>
</head>
<?php

include("../../menu_lateral.php");

?>

<body>
    <div class="container">
	<fieldset style=" height:900px;">
        <form class="contenedor_popup" method="POST" onsubmit="return validarFormulario();">
                <legend>Registrar nuevo médico</legend>
                <fieldset class="caja">
                    <legend class="cajalegend">══ Nuevo Médico ══</legend>
                    <p style="margin:0;">
                        <label for="txtid">ID Médico</label>
                        <input type="text" name="txtid" id="txtid" value="<?php echo $idMedico; ?>" required readonly>
                    </p>
                    <p>
                        <label for="txtcedula">Cédula</label>
                        <input type="text" autofocus name="txtcedula" id="txtcedula" value="<?php echo $cedula; ?>" required>
                    </p>
                    <p>
                        <label for="txtexequatur">Exequatur</label>
                        <input type="number" name="txtexequatur" id="txtexequatur" value="<?php echo $exequatur; ?>" required>
                    </p>
                    <p>
                        <label for="txtnombre">Nombre</label>
                        <input type="text" name="txtnombre" id="txtnombre" value="<?php echo $nombre; ?>" required>
                    </p>
                    <p>
                        <label for="txtapellido">Apellido</label>
                        <input type="text" name="txtapellido" id="txtapellido" value="<?php echo $apellido; ?>" required>
                    </p>
                    <p>
                        <label for="txtespecialidad">ID Especialidad</label>
                        <input type="number" name="txtespecialidad" id="txtespecialidad" value="<?php echo $idEspecialidad; ?>" required>
                    </p>
                </fieldset>
                <div class="botones-container">
                    <button type="submit" name="btnregistrar" value="Registrar">
                        <i class="material-icons" style="font-size:21px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i>
                        Registrar
                    </button>
                    <a class="boton" href="../../mant_medico.php?pag=<?php echo $pagina; ?>">
                        <i class="material-icons" style='font-size:21px;text-shadow:2px 2px 4px #000000;vertical-align: text-bottom;'>close</i> Cancelar
                    </a>
                </div>
                <iframe id="modal-iframe" src="../../consulta_medico.php" frameborder="0" style="width: 100%; height: 100%;max-height:500px;"></iframe>
            </fieldset>
        </form>
    </div>
</body>

</html>
