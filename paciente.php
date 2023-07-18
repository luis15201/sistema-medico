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
		}

		button {
			border: none;
			outline: none;
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
			min-height: 40px;
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
			text-decoration: none;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			height: auto;
			min-height: 40px;
		}

		.claseboton {
			border: none;
			outline: none;
			background: linear-gradient(to right, #4a90e2, #63b8ff);
			border-radius: 30px;
			width: auto;
			text-decoration: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
			padding-top: 2.5%;
			padding-bottom: 2%;
			padding-left: 5%;
			padding-right: 5%;
			font-size: 1.6vw;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			height: auto;
			min-height: 40px;
			align-items: center;
		}

		.claseboton:hover {
			background: linear-gradient(to right, #63b8ff, #4a90e2);
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
			min-height: 40px;
		}

		input[type="submit"]:hover,
		button:hover {
			background: linear-gradient(to right, #63b8ff, #4a90e2);
		}

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
		}
	</style>
</head>

<body>
	<form id="myForm">
		<div class="container">
			<fieldset>
				<legend>Datos del Paciente</legend>
				<div>
					<label for="nombre">Nombre:</label>
					<input type="text" id="nombre">
				</div>
				<div>
					<label for="apellido">Apellido:</label>
					<input type="text" id="apellido">
				</div>
				<fieldset style="width:90%;">
					<legend>Sexo:</legend>
					<div style="width:35%;float:left; margin-left: 10%; padding: 1%;">
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
					<input type="date" id="fecha_nacimiento">
				</div>
			</fieldset>

			<fieldset>
				<legend>Historia Clínica</legend>
				<label for="id_padecimiento">ID Padecimiento:</label>
				<input type="text" id="id_padecimiento">
				<button class="busquedaboton" title="Buscar en los Seguros registrados">
					<i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
				</button>
				<label for="notas">Notas:</label>
				<input type="text" id="notas">
				<br>
				<label for="desde_cuando">Desde cuándo:</label>
				<input type="date" id="desde_cuando" onchange="calculateYears()"><br>
				<span id="yearsSince"></span>
				<button id="agregarPadecimiento" class="boton">
					<i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i> Agregar
				</button>
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

			<fieldset>
				<legend>Datos de Seguro del paciente</legend>
				<div>
					<label for="NSS">Número de Seguro:</label>
					<input type="text" id="NSS">
				</div>
				<div>
					<label for="Id_seguro_salud">ID Seguro de Salud:</label>
					<input type="text" id="Id_seguro_salud" oninput="buscarSeguro()">
					<a href="#" class="busquedaboton" title="Buscar en los Seguros registrados" onclick="mostrarModal()">
						<i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
					</a>
				</div>
				<div>
					<label for="Nombre_seguro">Nombre del Seguro:</label>
					<label id="Nombre_seguro"></label>
				</div>
				<br>

				<div id="myModal" class="modal" style="width: 100%;">
					<div class="modal-content" style="width: 100%;">
						<span class="close">&times;</span>
						<iframe id="modal-iframe" src="consulta_seguros.php" frameborder="0" style="width: 100%;"></iframe>
					</div>
				</div>


			</fieldset>



			<fieldset>
				<legend>Paciente-vacunas</legend>
				<table>
					<tr>
						<td><label for="id_vacuna">ID Vacuna:</label></td>
						<td>
							<input type="text" id="id_vacuna">
							<button class="boton" title="Buscar en los Seguros registrados">
								<i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
							</button>
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
				<button id="agregarVacuna" class="boton">
					<i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i> Agregar
				</button>
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
			<div style="width: 100%;">
				<button class="boton">
					<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">save</i> Guardar
				</button>
				<button class="boton" onclick="resetForm()">
					<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">autorenew</i> Reset
				</button>
				<a href="menu-pacientes.php" class="claseboton">
					<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">arrow_back</i> Atrás
				</a>
			</div>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script>
//Evento click celda del modal
$(document).ready(function() {
  // Obtener la tabla generada por DataTables
  var tablaSeguros = $("#tabla_seguros").DataTable();

  // Asignar un evento de clic a las celdas de la tabla
  $("#tabla_seguros tbody").on("click", "td", function() {
    // Obtener la fila y las celdas de la tabla
    var fila = $(this).closest("tr");
    var celdas = fila.find("td");

    // Obtener los datos de la fila
    var idSeguro = celdas.eq(0).text();
    var nombreSeguro = celdas.eq(1).text();
    // ... Obtener los demás datos que necesites

    // Mostrar los datos en un alert
    alert("ID Seguro: " + idSeguro + "\nNombre Seguro: " + nombreSeguro);
  });
});

///Fin del Evento click del modal

//funcion para busqueda dinamica seguro por text-change
		function buscarSeguro() {
			var idSeguro = $("#Id_seguro_salud").val();
			$.ajax({
				url: "buscar_seguro.php",
				type: "POST",
				data: {
					id_seguro: idSeguro
				},
				dataType: "json",
				success: function(data) {
					$("#Nombre_seguro").text(data ? data.Nombre : "Dato no encontrado");
				},
				error: function(error) {
					console.log("Error:", error);
				}
			});
		}
// fin de  funcion para busqueda dinamica seguro por text-change
		function mostrarModal() {
			var idSeguro = $("#Id_seguro_salud").val();
			$.ajax({
				url: "obtener_datos_seguro.php",
				type: "POST",
				data: {
					id_seguro: idSeguro
				},
				dataType: "json",
				success: function(data) {
					$("#datos_seguro_table").remove();
					var table = $("<table>").attr("id", "datos_seguro_table").addClass("datos-seguro-table");
					var thead = $("<thead>").appendTo(table);
					var tbody = $("<tbody>").appendTo(table);
					var trHead = $("<tr>").appendTo(thead);
					$("<th>").text("ID Seguro de Salud").appendTo(trHead);
					$("<th>").text("Nombre del Seguro").appendTo(trHead);
					$.each(data, function(index, row) {
						var tr = $("<tr>").appendTo(tbody);
						$("<td>").text(row.Id_seguro_salud).appendTo(tr);
						$("<td>").text(row.Nombre).appendTo(tr);
					});
					table.insertAfter($("#Nombre_seguro"));
				},
				error: function(error) {
					console.log("Error:", error);
				}
			});
		}

		function resetForm() {
			document.getElementById("myForm").reset();
		}

		function calculateYears() {
			const fechaSeleccionada = document.getElementById("desde_cuando").value;
			const fechaActual = new Date();
			const diferencia = fechaActual.getFullYear() - new Date(fechaSeleccionada).getFullYear();
			document.getElementById("yearsSince").textContent = "Lleva padeciendo esta enfermedad durante " + diferencia + " años.";
		}

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
			document.getElementById("id_vacuna").value = "";
			document.getElementById("dosis").value = "";
			document.getElementById("refuerzo").value = "";
		});

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
			document.getElementById("id_padecimiento").value = "";
			document.getElementById("notas").value = "";
			document.getElementById("desde_cuando").value = "";
			document.getElementById("yearsSince").textContent = "";
		});
	</script>
</body>

</html>