<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style>
		.fieldset-container {
			float: left;
			width: 45%;

		}

		@media (min-width: 810px) {
	div.fieldset-container {
		float: left;
		width: 45%;
	}
}

@media (max-width: 800px) {
	div.fieldset-container {
		float: left;
		width: 100%;
	}
}
	</style>


</head>

<body>
	<div class="form">
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
				<legend>Datos de Seguro del paciente</legend>
				<div>
					<label for="NSS">Número de Seguro de Salud:</label>
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
							<button class="busquedaboton" title="Buscar en los Seguros registrados"><i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i></button>
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
		<div class="fieldset-container">
			<fieldset>
				<legend>Historia clínica</legend>
				<table>
					<tr>
						<td><label for="id_padecimiento">ID Padecimiento:</label></td>
						<td>
							<input type="text" id="id_padecimiento">
							<button class="busquedaboton" title="Buscar en los Seguros registrados"><i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i></button>
						</td>
					</tr>
					<tr>
						<td><label for="notas">Notas:</label></td>
						<td><input type="text" id="notas"></td>
					</tr>
					<tr>
						<td><label for="desde_cuando">Desde cuándo:</label></td>
						<td>
							<input type="date" id="desde_cuando" onchange="calculateYears()"><br>
							<span id="yearsSince"></span>
						</td>
					</tr>
				</table>
				<button id="agregarPadecimiento" class="boton"><i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i> Agregar</button>
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
			</fieldset>
		</div>
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