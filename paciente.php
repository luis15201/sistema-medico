<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style>
		.container {
			display: grid;
			grid-template-columns: repeat(2, 50%);
			grid-gap: 6px 10px;
		}

		fieldset {

			border: 1px solid #ddd;
			border-radius: 2vw;
			background: linear-gradient(to right, #e4e5dc, #45bac9db);
			padding: 1vw;
			box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
			margin-bottom: 2vw;
		}

		fieldset fieldset {

			background-color: transparent;
		}

		fieldset fieldset legend {
			font-size: 20px;
			text-transform: uppercase;
			padding-left: 10%;
			padding-right: 10%;
			background-color: transparent;
		}

		legend {
			font-weight: bold;
			font-size: 30px;
			font-weight: bold;
			margin-bottom: 1vw;
			background: linear-gradient(to right, #e4e5dc, #45bac9db);
			border: solid 1px #45bac9db;
			border-radius: 10px;
		}

		label {
			font-size: 1.4vw;
			color: #444;
			margin: 10px;
		}

		input[type="text"],
		input[type="date"] {
			width: 45%;
			padding: 1vw;
			font-size: 1.6vw;
			color: #444;
			margin-bottom: 2vw;
			border: none;
			border-bottom: 0.1vw solid #444;
			outline: none;
			border-radius: 15px;
			margin: 10px;
			/*background: transparent;*/
		}

		button {
			border: none;
			outline: none;
			/*height: 4vw;*/
			color: #fff;
			font-size: 1.6vw;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			cursor: pointer;
			padding: 10px;
			border-radius: 2vw;
			width: 10%;

			margin: 10px;


			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			height: auto;
			/* Ajusta la altura según tus necesidades */
			min-height: 40px;
			/* Establece un tamaño mínimo para el botón */
		}

		.boton {
			border: none;
			outline: none;
			height: 4vw;
			color: #fff;
			font-size: 1.6vw;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			cursor: pointer;
			border-radius: 2vw;
			width: 25%;
			margin-top: 2vw;

			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			height: auto;
			/* Ajusta la altura según tus necesidades */
			min-height: 40px;
			/* Establece un tamaño mínimo para el botón */
		}

		input[type="submit"] {
			border: none;
			outline: none;
			height: 4vw;
			color: #fff;
			font-size: 1.6vw;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			cursor: pointer;
			border-radius: 2vw;
			width: 25%;
			margin-top: 2vw;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			height: auto;
			/* Ajusta la altura según tus necesidades */
			min-height: 40px;
			/* Establece un tamaño mínimo para el botón */
		}

		input[type="submit"]:hover,
		button:hover {
			background: linear-gradient(to right, #63b8ff, #4a90e2);
		}

		/* Estilos para la tabla de vacunas y padecimientos */

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 1vw;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		td button {
			margin-right: 0.5vw;
			width: 65px;
			font-size: 12px;
		}



		@media (max-width: 800px) {
			.container {
				grid-template-columns: 100%;
				grid-gap: 20px;
			}
	</style>


</head>

<body>
	<div class="container">
		<!--div class="form"-->

		<div class="fieldset-container">
			<fieldset>
				<legend>Datos del Paciente</legend>
				<div>
					<label for="nombre">Nombre:</label>
					<input type="text" id="nombre" style="border-radius: 5px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;">
				</div>
				<div>
					<label for="apellido">Apellido:</label>
					<input type="text" id="apellido" style="border-radius: 5px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;">
				</div>
				<fieldset style="width:90%;">
					<legend>Sexo:</legend>
					<div style="width:35%;float:left; margin-left: 10%; padding: 1%; ">
						<label for="masculino">Masculino</label>
						<input type="radio" id="masculino" name="sexo" value="masculino">
					</div>
					<div style="width:35%;float:left;padding: 1%;">
						<label for="femenino">Femenino</label>
						<input type="radio" id="femenino" name="sexo" value="femenino">
					</div>
				</fieldset>
				<div>
					<label for="fecha_nacimiento">Fecha de nacimiento:</label>
					<input type="date" id="fecha_nacimiento" style="border-radius: 5px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;">
				</div>
			</fieldset>
		</div>

		<div class="fieldset-container">
			<fieldset>
				<legend>Historia Clínica</legend>
				<label for="id_padecimiento">ID Padecimiento:</label>
				<input type="text" id="id_padecimiento">
				<button class="busquedaboton" title="Buscar en los Seguros registrados"><i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i></button>
				<label for="notas">Notas:</label>
				<input type="text" id="notas">
				<br>
				<label for="desde_cuando">Desde cuándo:</label>
				<input type="date" id="desde_cuando" onchange="calculateYears()"><br>
				<span id="yearsSince"></span>
				<button id="agregarPadecimiento" class="boton">
					<i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000; vertical-align: middle;">add</i> Agregar
				</button>
			</fieldset>
			<table id="padecimientosTabla" style="display: none;">
				<thead>
					<tr>
						<th>ID Padecimiento</th>
						<th>Notas</th>
						<th>Desde cuándo</th>
						<th>Modificar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="fieldset-container">
			<fieldset>
				<legend>Datos de Seguro del paciente</legend>
				<div>
					<label for="NSS">Número de Seguro:</label>
					<input type="text" id="NSS" style="border-radius: 5px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;">
					<button class="busquedaboton" title="Buscar en los Seguros registrados"><i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i></button>
				</div>
				<div>
					<label for="Id_seguro_salud">ID Seguro de Salud:</label>
					<input type="text" id="Id_seguro_salud" style="border-radius: 5px; box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;">
				</div>
			</fieldset>
		</div>







		<div class="fieldset-container">
			<fieldset>
				<legend>Paciente-vacunas</legend>
				<table>
					<tr>
						<td><label for="id_vacuna">ID Vacuna:</label></td>
						<td>
							<input type="text" id="id_vacuna">
							<button class="boton" title="Buscar en los Seguros registrados"><i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i></button>
						</td>
					</tr>
					<tr>
						<td><label for="dosis">Dosis:</label></td>
						<td><input type="text" id="dosis"></td>
					</tr>
					<tr>
						<td><label for="refuerzo">Refuerzo:</label></td>
						<td><input type="text" id="refuerzo"></td>
					</tr>
				</table>
				<button id="agregarVacuna" class="boton"><i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i> Agregar</button>
				<table id="vacunasTabla" style="display: none;">
					<thead>
						<tr>
							<th>ID Vacuna</th>
							<th>Dosis</th>
							<th>Refuerzo</th>
							<th>Modificar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</fieldset>
		</div>


		<script>
			// Función para calcular los años desde la fecha seleccionada
			function calculateYears() {
				const fechaSeleccionada = document.getElementById("desde_cuando").value;
				const fechaActual = new Date();
				const diferencia = fechaActual.getFullYear() - new Date(fechaSeleccionada).getFullYear();
				document.getElementById("yearsSince").textContent = "Lleva padeciendo esta enfermedad durante " + diferencia + " años.";
			}

			// Función para agregar una vacuna a la tabla
			document.getElementById("agregarVacuna").addEventListener("click", function() {
				const idVacuna = document.getElementById("id_vacuna").value;
				const dosis = document.getElementById("dosis").value;
				const refuerzo = document.getElementById("refuerzo").value;

				if (idVacuna && dosis && refuerzo) {
					const table = document.getElementById("vacunasTabla");
					const tbody = table.getElementsByTagName("tbody")[0];

					const row = document.createElement("tr");
					row.innerHTML = `
					<td>${idVacuna}</td>
					<td>${dosis}</td>
					<td>${refuerzo}</td>
					<td><button>Modificar</button></td>
					<td><button onclick="confirm('¿Realmente desea eliminar esta vacuna?')">Eliminar</button></td>
				`;

					tbody.appendChild(row);
					table.style.display = "table";
				}

				// Limpiar los campos de vacuna
				document.getElementById("id_vacuna").value = "";
				document.getElementById("dosis").value = "";
				document.getElementById("refuerzo").value = "";
			});

			// Función para agregar un padecimiento a la tabla
			document.getElementById("agregarPadecimiento").addEventListener("click", function() {
				const idPadecimiento = document.getElementById("id_padecimiento").value;
				const notas = document.getElementById("notas").value;
				const desdeCuando = document.getElementById("desde_cuando").value;

				if (idPadecimiento && notas && desdeCuando) {
					const table = document.getElementById("padecimientosTabla");
					const tbody = table.getElementsByTagName("tbody")[0];

					const row = document.createElement("tr");
					row.innerHTML = `
					<td>${idPadecimiento}</td>
					<td>${notas}</td>
					<td>${desdeCuando}</td>
					<td><button>Modificar</button></td>
					<td><button onclick="confirm('¿Realmente desea eliminar este padecimiento?')">Eliminar</button></td>
				`;

					tbody.appendChild(row);
					table.style.display = "table";
				}

				// Limpiar los campos de padecimiento
				document.getElementById("id_padecimiento").value = "";
				document.getElementById("notas").value = "";
				document.getElementById("desde_cuando").value = "";
				document.getElementById("yearsSince").textContent = "";
			});
		</script>
</body>

</html>