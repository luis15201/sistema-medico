<!DOCTYPE html>
<html>

<head>
	<title>Formulario Emergente</title>


	<style>
		#formContainer {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 9999;
		}

		.form {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			padding: 20px;
			border-radius: 5%;
			width: 30%;
		}

		#openFormButton {
			margin-top: 20px;
		}

		#closeFormButton {
			margin-top: 10px;
		}

		h2 {
			margin-top: 0;
		}

		label {
			font-size: 14px;
			color: #444;
		}

		input[type="text"],
		input[type="date"] {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			color: #444;
			margin-bottom: 20px;
			border: none;
			border-bottom: 1px solid #444;
			outline: none;
			background: transparent;
		}

		input[type="submit"] {
			border: none;
			outline: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			cursor: pointer;
			border-radius: 20px;
			width: 100%;
			margin-top: 10px;
		}

		input[type="submit"]:hover {
			background: linear-gradient(to right, #63b8ff, #4a90e2);
		}


		button {
			border: none;
			outline: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			cursor: pointer;
			border-radius: 20px;
			width: 100%;
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<button id="openFormButton">Nuevo</button>

	<div id="formContainer">
		<form id="myForm" class="form">
			<h2>Registro del Paciente</h2>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" required>
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" required>
			<fieldset style="border-radius: 6px; border: 2px solid gray; padding: 10px; display: flex; flex-direction: column; align-items: center; margin:15px;">
				<legend>Sexo</legend>
				<div style="  width: 100%;">
					<label for="Masculino" style="padding:5px;">
						Masculino
						<input type="radio"  style="padding:5px;" name="sexo" value="masculino" required>
					</label>
					<label for="Femenino" style="padding:5px;">
						Femenino
						<input type="radio" style="padding:5px;" name="sexo" value="femenino" required>
					</label>
				</div>
			</fieldset>


			<label for="fecha_nacimiento">Fecha de Nacimiento</label>
			<input type="date" name="fecha_nacimiento" required>
			<input type="submit" name="submit_paciente" value="Guardar Datos del Paciente">

			<button id="closeFormButton">Cerrar</button>
		</form>
	</div>

	<script>
		document.getElementById("openFormButton").addEventListener("click", function() {
			document.getElementById("formContainer").style.display = "block";
		});

		document.getElementById("closeFormButton").addEventListener("click", function() {
			document.getElementById("formContainer").style.display = "none";
		});

		document.getElementById("myForm").addEventListener("submit", function(event) {
			event.preventDefault(); // Evita el envío del formulario
			// Aquí puedes realizar el procesamiento del formulario, como enviar los datos a través de una solicitud AJAX
			alert("Formulario enviado correctamente");
		});
	</script>
</body>

</html>