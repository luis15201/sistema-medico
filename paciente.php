<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
		input[type="date"],
		select {
			width: 45%;
			padding: 1vw;
			font-size: 1vw;
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

<body onload="checkFechaProvista()">
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

				<div id="myModal" class="modal" style="width: 100%; height: 90%;">
					<div class="modal-content" style="width: 100%; height: 80%;">
						<span class="close">&times;</span>
						<iframe id="modal-iframe" src="consulta_seguros.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
					</div>
				</div>


			</fieldset>

			<fieldset>
        <legend>Paciente-vacunas</legend>
        <div>
            <label for="id_vacuna">ID Vacuna:</label>
            <input type="text" id="id_vacuna" style="width: 45px;">
            <button class="boton" title="Buscar en los Seguros registrados">
                <i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
            </button>
        </div>
        <div>
            <label for="Nombre_vacuna">Nombre de la Vacuna:</label>
            <label id="nombre_vacuna"></label>
        </div>
        <div id="myModal" class="modal" style="width: 100%; height: 250%;">
            <div class="modal-content" style="width: 100%; height: 100%;">
                <span class="close">&times;</span>
                <iframe id="modal-iframe" src="consulta_vacunas.php" frameborder="0"
                    style="width: 100%; height: 100%;"></iframe>
            </div>
        </div>


        <div style="border-top:20px;">
            <label for="dosis">Dosis:</label>
            <select id="dosis" style=" width: 110px; ">
                <option value="1era">1era</option>
                <option value="2da">2da</option>
                <option value="3ra">3ra</option>
                <option value="4ta">4ta</option>
                <option value="5ta">5ta</option>
                <option value="6ta">6ta</option>
                <option value="7ma">7ma</option>
                <option value="8va">8va</option>
                <option value="9na">9na</option>
                <option value="10ma">10ma</option>
                <option value="NA">NA</option>
            </select>
        </div>
        <div>
            <label for="refuerzo">Refuerzo:</label>
            <select id="refuerzo" style=" width: 110px; ">
                <option value="1era">1era</option>
                <option value="2da">2da</option>
                <option value="3ra">3ra</option>
                <option value="4ta">4ta</option>
                <option value="5ta">5ta</option>
                <option value="6ta">6ta</option>
                <option value="7ma">7ma</option>
                <option value="8va">8va</option>
                <option value="9na">9na</option>
                <option value="10ma">10ma</option>
                <option value="NA">NA</option>
            </select>
        </div>
        <div>
            <label for="fecha_aplicacion">Fecha de Aplicación:</label>
            <select id="fecha_aplicacion_select" style="width: 180px;">
                <option value="fecha_provista">Fecha Provista</option>
                <option value="fecha_no_provista">Fecha No Provista</option>
            </select>
            <input type="date" id="fecha_aplicacion_input" style="display: none;">
        </div>
        <button id="agregarVacuna" class="boton" onclick="agregarVacuna(); return false;">
            <i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i>
            Agregar
        </button>

        <button id="modificarVacuna" class="boton" style="display: none;">
            <i class="material-icons" style="font-size:32px;color:#f33112;text-shadow:2px 2px 4px #000000;">edit</i>
            Modificar
        </button>

        <button id="cancelarEdicion" class="boton" style="display: none;">
            <i class="material-icons" style="font-size:32px;color:#f33112;text-shadow:2px 2px 4px #000000;">cancel</i>
            Cancelar
        </button>
        <table id="vacunasTabla">
            <thead>
                <tr>
                    <th>ID Vacuna</th>
                    <th>Nombre de Vacuna</th>
                    <th>Dosis</th>
                    <th>Refuerzo</th>
                    <th>Fecha de Aplicación</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <script>
        // Función para búsqueda dinámica del nombre de la vacuna por ID
        function buscarNombreVacuna() {
            var idVacuna = $("#id_vacuna").val();
            $.ajax({
                url: "buscar_nombre_vacuna.php", // Archivo PHP para buscar el nombre de la vacuna por ID
                type: "POST",
                data: {
                    id_vacuna: idVacuna
                },
                dataType: "json",
                success: function (data) {
                    $("#nombre_vacuna").text(data ? data.Nombre : "Valor no encontrado");
                },
                error: function (error) {
                    console.log("Error:", error);
                }
            });
        }

        // Evento para ejecutar la búsqueda al cambiar el valor del campo ID de la vacuna
        $("#id_vacuna").on("input", buscarNombreVacuna);
    </script>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		//FUNCIONES DEL BOTON MOFICAR DE LA TABLA AGREGAR VACUNA A PACIENTE*///
		
		// Función para verificar y mostrar el input de fecha al cargar la página
		function checkFechaProvista() {
			var fechaAplicacionSelect = document.getElementById('fecha_aplicacion_select');
			var fechaAplicacionInput = document.getElementById('fecha_aplicacion_input');

			if (fechaAplicacionSelect.value === 'fecha_provista') {
				fechaAplicacionInput.style.display = 'inline-block';
			} else {
				fechaAplicacionInput.style.display = 'none';
			}
		}

		// Variables para mantener los registros
		var registros = [];

		// Obtener referencias a los elementos del DOM
		var idVacunaInput = document.getElementById('id_vacuna');
		var nombreVacunaLabel = document.getElementById('nombre_vacuna');
		var dosisSelect = document.getElementById('dosis');
		var refuerzoSelect = document.getElementById('refuerzo');
		var fechaAplicacionSelect = document.getElementById('fecha_aplicacion_select');
		var fechaAplicacionInput = document.getElementById('fecha_aplicacion_input');
		var vacunasTabla = document.getElementById('vacunasTabla').getElementsByTagName('tbody')[0];
		var agregarVacunaBtn = document.getElementById('agregarVacuna');
		var modificarVacunaBtn = document.getElementById('modificarVacuna');
		var cancelarEdicionBtn = document.getElementById('cancelarEdicion');

		// Agregar evento al botón Agregar
		agregarVacunaBtn.addEventListener('click', function(event) {
			event.preventDefault(); // Evitar la recarga de la página al hacer clic en Agregar
			agregarVacuna();
		});

		// Agregar evento al botón Modificar (en el fieldset)
		modificarVacunaBtn.addEventListener('click', function(event) {
			event.preventDefault(); // Evitar la recarga de la página al hacer clic en Modificar
			guardarEdicion();
		});

		// Agregar evento al botón Cancelar (en el fieldset)
		cancelarEdicionBtn.addEventListener('click', function(event) {
			event.preventDefault(); // Evitar la recarga de la página al hacer clic en Cancelar
			cancelarEdicion();
		});

		// Agregar evento para eliminar registros
		vacunasTabla.addEventListener('click', function(event) {
			if (event.target.classList.contains('eliminar')) {
				var fila = event.target.closest('tr');
				var index = fila.rowIndex - 1;
				registros.splice(index, 1);
				fila.remove();
			} else if (event.target.classList.contains('modificar')) {
				var fila = event.target.closest('tr');
				var index = fila.rowIndex - 1;
				var registro = registros[index];
				cargarFormularioEdicion(registro, index);
			}
		});

		// Agregar evento para cambiar el input de fecha según la opción seleccionada
		fechaAplicacionSelect.addEventListener('change', function() {
			if (fechaAplicacionSelect.value === 'fecha_provista') {
				fechaAplicacionInput.style.display = 'inline-block';
			} else {
				fechaAplicacionInput.style.display = 'none';
			}
		});

		// Función para agregar una vacuna
		function agregarVacuna() {
			// Restaurar estilo de los campos de entrada
			resetFieldsetStyle();

			// Obtener valores de los campos
			var idVacuna = idVacunaInput.value;
			var nombreVacuna = nombreVacunaLabel.innerText;
			var dosis = dosisSelect.value;
			var refuerzo = refuerzoSelect.value;
			var fechaAplicacion = fechaAplicacionSelect.value;
			if (fechaAplicacion === 'fecha_provista') {
				fechaAplicacion = fechaAplicacionInput.value;
			}

			// Verificar que los campos requeridos no estén vacíos antes de agregar la vacuna
			if (idVacuna.trim() === '' || fechaAplicacion.trim() === '') {
				alert('Debe completar los campos de ID de Vacuna y Fecha de Aplicación.');
				return;
			}

			// Crear objeto de vacuna
			var vacuna = {
				id: idVacuna,
				nombre: nombreVacuna,
				dosis: dosis,
				refuerzo: refuerzo,
				fechaAplicacion: fechaAplicacion
			};

			// Agregar vacuna al arreglo de registros
			registros.push(vacuna);

			// Agregar fila a la tabla
			var fila = vacunasTabla.insertRow();
			var idVacunaCell = fila.insertCell();
			var nombreVacunaCell = fila.insertCell();
			var dosisCell = fila.insertCell();
			var refuerzoCell = fila.insertCell();
			var fechaAplicacionCell = fila.insertCell();
			var modificarCell = fila.insertCell();
			var eliminarCell = fila.insertCell();

			idVacunaCell.innerHTML = idVacuna;
			nombreVacunaCell.innerHTML = nombreVacuna;
			dosisCell.innerHTML = dosis;
			refuerzoCell.innerHTML = refuerzo;
			fechaAplicacionCell.innerHTML = fechaAplicacion;
			modificarCell.innerHTML = '<button type="button" class="modificar">Modificar</button>';
			eliminarCell.innerHTML = '<button type="button" class="eliminar">Eliminar</button>';

			// Limpiar campos de entrada
			idVacunaInput.value = '';
			nombreVacunaLabel.innerText = '';
			dosisSelect.value = '1era';
			refuerzoSelect.value = '1era';
			fechaAplicacionSelect.value = 'fecha_provista';
			fechaAplicacionInput.style.display = 'none';
			fechaAplicacionInput.value = '';
		}

		// Función para cargar el formulario de edición
		function cargarFormularioEdicion(registro, index) {
			// Restaurar estilo de los campos de entrada
			resetFieldsetStyle();

			idVacunaInput.value = registro.id;
			nombreVacunaLabel.innerText = registro.nombre;
			dosisSelect.value = registro.dosis;
			refuerzoSelect.value = registro.refuerzo;
			fechaAplicacionSelect.value = registro.fechaAplicacion;
			if (registro.fechaAplicacion === 'fecha_provista') {
				fechaAplicacionInput.style.display = 'inline-block';
				fechaAplicacionInput.value = registro.fechaAplicacion;
			} else {
				fechaAplicacionInput.style.display = 'none';
			}

			agregarVacunaBtn.style.display = 'none';
			modificarVacunaBtn.style.display = 'block';
			cancelarEdicionBtn.style.display = 'block';

			// Cambiar el estilo de los campos al modo de edición
			changeFieldsetStyle();

			// Guardar el índice del registro en un atributo personalizado en el botón Modificar (en el fieldset)
			modificarVacunaBtn.setAttribute('data-index', index);
		}

		// Función para guardar la edición
		function guardarEdicion() {
			var index = parseInt(modificarVacunaBtn.getAttribute('data-index'));

			var idVacuna = idVacunaInput.value;
			var nombreVacuna = nombreVacunaLabel.innerText;
			var dosis = dosisSelect.value;
			var refuerzo = refuerzoSelect.value;
			var fechaAplicacion = fechaAplicacionSelect.value;
			if (fechaAplicacion === 'fecha_provista') {
				fechaAplicacion = fechaAplicacionInput.value;
			}

			// Actualizar el registro en el arreglo
			registros[index] = {
				id: idVacuna,
				nombre: nombreVacuna,
				dosis: dosis,
				refuerzo: refuerzo,
				fechaAplicacion: fechaAplicacion
			};

			// Actualizar los valores en la tabla
			var fila = vacunasTabla.rows[index];
			fila.cells[0].innerText = idVacuna;
			fila.cells[1].innerText = nombreVacuna;
			fila.cells[2].innerText = dosis;
			fila.cells[3].innerText = refuerzo;
			fila.cells[4].innerText = fechaAplicacion;

			// Restaurar formulario de edición
			resetForm();
			agregarVacunaBtn.style.display = 'block';
			modificarVacunaBtn.style.display = 'none';
			cancelarEdicionBtn.style.display = 'none';

			// Restaurar el estilo de los campos
			resetFieldsetStyle();
		}

		// Función para cancelar la edición
		function cancelarEdicion() {
			// Restaurar formulario de edición
			resetForm();
			agregarVacunaBtn.style.display = 'block';
			modificarVacunaBtn.style.display = 'none';
			cancelarEdicionBtn.style.display = 'none';

			// Restaurar el estilo de los campos
			resetFieldsetStyle();
		}

		// Función para resetear el formulario de edición
		function resetForm() {
			idVacunaInput.value = '';
			nombreVacunaLabel.innerText = '';
			dosisSelect.value = '1era';
			refuerzoSelect.value = '1era';
			fechaAplicacionSelect.value = 'fecha_provista';
			fechaAplicacionInput.style.display = 'none';
			fechaAplicacionInput.value = '';
		}

		// Función para cambiar el estilo de los campos de entrada al modo de edición
		function changeFieldsetStyle() {
			var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
			for (var i = 0; i < inputs.length; i++) {
				inputs[i].style.backgroundColor = 'blue';
				inputs[i].style.color = 'white';
			}
		}

		// Función para restaurar el estilo de los campos de entrada al modo original
		function resetFieldsetStyle() {
			var inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');
			for (var i = 0; i < inputs.length; i++) {
				inputs[i].style.backgroundColor = '';
				inputs[i].style.color = '';
			}
		}



		
		



		//FIN DE FUNCIONES DEL BOTON MOFICAR DE LA TABLA AGREGAR VACUNA A PACIENTE*///



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