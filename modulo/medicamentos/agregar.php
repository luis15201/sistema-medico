<?php
session_start();

error_reporting(E_ALL & ~E_WARNING);
require_once "../../include/conec.php";
//require_once("../../mant_seguro.php");

$pagina = $_GET['pag'];

// Consultar el último ID de la tabla seguro
$query = "SELECT MAX(Id_medicamento) AS max_id FROM medicemanto";
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
$segid = $newId;
?>
<html>

<head>
	<title>medicamentos</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo-paciente.css">

	<style>
		.botones-container {
			display: flex;
			flex-wrap: wrap;
			margin: 2px;
			padding: 2px;
			box-sizing: border-box;
			justify-content: center;
		}

		.botones-container>a,
		.botones-container>input[type="button"],
		.botones-container>input[type="submit"],
		.botones-container>button {
			margin: 5px;
			padding: 10px 20px;
			border: none;
			border-radius: 20px;
			text-align: center;
			text-decoration: none;
			cursor: pointer;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			color: #fff;
			font-weight: bold;
			transition: background-color 0.3s ease;
			flex: 1 1 auto;
			/* Esto hace que los botones se expandan igualmente */
			max-width: 200px;
			/* Establece el ancho máximo para mantener la responsividad */
			font-size: 1.2em;
		}

		.botones-container>a:hover,
		.botones-container>input[type="button"]:hover,
		.botones-container>input[type="submit"]:hover,
		.botones-container>button:hover {
			background: linear-gradient(to right, #63b8ff, #4a90e2);
		}
	</style>
	<script type="text/javascript">
		// Obtener el campo de entrada y el nuevo ID
		var txtId = document.getElementById("txtid");
		var newId = <?php echo $segid; ?>;

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

include("menu_lateral_header.php");

?>
</head>
<?php

  include("menu_lateral.php");

  ?>

<body>
	<div class="caja_popup2">
		<form class="contenedor_popup" method="POST">
			<fieldset>

				<legend>Registrar NUEVO Medicamento</legend>
				<label for="txtid">ID Seguro</label>
				<input type="text" name="txtid" id="txtid" value="<?php echo $medid; ?>" required readonly>
				</br>
				<label for="txtseg">Nombre Medicamento</label>
				<input type="text"  autofocus name="txtmed" id="txtseg" value="<?php echo $mednom; ?>" required></br>
				</br>
                <label for="txtid">Descripcion</label>
				<input type="text" name="txtdesc" id="txtdesc" value="<?php echo $meddesc; ?>" required>
				</br>
                <label for="txtid">Formato</label>
				<input type="text" name="txtform" id="txtform" value="<?php echo $medform; ?>" required>
				</br>
                <label for="txtid">Cantidad total</label>
				<input type="text" name="txtcant" id="txtcant" value="<?php echo $medcant; ?>" required>
				</br>
				<div class="botones-container">
					<?php echo "<a href=\"../../mant_medicamentos.php?pag=$pagina\">Cancelar</a>"; ?>

					<input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este *NUEVO* medicamento');">
				</div>
				<div id="myModal" class="modal" style="width: 100%; height: 90%;">
					<div class="modal-content" style="width: 100%; height: 80%;">
						<span class="close">&times;</span>
						<iframe id="modal-iframe" src="../../consulta_medicamento.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
					</div>
				</div>
				<div class="botones-container">
            <a href="../../mant_medicamentos.php" class="claseboton">← Atrás</a>
            <a href="../../index.php" class="claseboton">Login</a>
            <a href="../../menu.php" class="claseboton">Menú Principal</a>

        </div>
			</fieldset>


		</form>
	</div>
</body>

</html>
<?php

if (isset($_POST['btnregistrar'])) {
	$vaimed 	= $_POST['txtmed'];
    $vaides 	= $_POST['txtdesc'];
    $vaiform 	= $_POST['txtform'];
    $vaicant 	= $_POST['txtcant'];


	$queryadd	= mysqli_query($conn, "INSERT INTO medicamento(Id_medicamento,nombre_medicamento,descripcion,formato,Cantidad_total) VALUES('$newId','$vaimed','$vaides','$vaiform','$vaicant')");

	if (!$queryadd) {
		echo "Error con el registro: " . mysqli_error($conn);
		//echo "<script>alert('DNI duplicado, intenta otra vez');</script>";

	} else {
		echo "<script>window.location= '../../mant_medicamentos.php?pag=1' </script>";
	}
}
?>