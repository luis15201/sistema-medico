<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Formulario de Vacunas del Paciente</title>
	<link rel="stylesheet" type="text/css" href="css/estilo-paciente.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
	<form>
		<div class="container">
			<fieldset>
				<legend>Paciente-vacunas</legend>
				<div>
					<label for="id_paciente">ID PACIENTE:</label>
					<input type="text" id="id_paciente" name="id_paciente" style="width: 45px;" onblur="cargarHistorialVacunas()">
					<button id="buscarpaciente" class="boton" title="Buscar pacientes registrados">
						<i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
					</button>
				</div>


				<!-- Agregar un event listener para el evento input      //oninput="cargarDatosPaciente()"-->
				<script>
					// Función para búsqueda dinámica del nombre y apellido del paciente por ID
					$("#id_paciente").on("input", function() {
						var idPaciente = $(this).val();
						// Realizar la solicitud AJAX para obtener los datos del paciente
						$.ajax({
							url: 'consulta_apellido_nombre_paciente.php', // Ruta al archivo PHP que creamos
							type: 'POST',
							data: {
								id_paciente: idPaciente
							},
							dataType: 'json',
							success: function(data) {
								$("#nombre_paciente").text(data.nombre || '');
								$("#apellido_paciente").text(data.apellido || '');
							},
							error: function() {
								alert('Hubo un error al obtener los datos del paciente.');
							}
						});
					});
				</script>
				<div>
					<label for="Nombre_paciente">Nombre del paciente:</label>
					<label id="nombre_paciente"></label>
				</div>
				<div>
					<label for="Apellido_paciente">Apellido del paciente:</label>
					<label id="apellido_paciente"></label>
				</div>
				<div id="Modalpaciente" class="modal" style="width: 100%; height: 250%;">
					<div class="modal-content" style="width: 100%; height: 100%;">
						<span class="close">&times;</span>
						<iframe id="modal-iframe" src="consulta_paciente.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
					</div>
				</div>


				<div>
					<label for="id_vacuna">ID Vacuna:</label>
					<input type="text" id="id_vacuna" style="width: 45px;">
					<button id="buscarvacuna" class="boton" title="Buscar vacunas registras en el sistema">
						<i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
					</button>
				</div>
				<div>
					<label for="Nombre_vacuna">Nombre de la Vacuna:</label>
					<label id="nombre_vacuna"></label>
				</div>
				<div id="Modalvacuna" class="modal" style="width: 100%; height: 250%;">
					<div class="modal-content" style="width: 100%; height: 100%;">
						<span class="close">&times;</span>
						<iframe id="modal-iframe" src="consulta_vacunas.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
					</div>
				</div>


				<div style="border-top:20px;">
					<label for="dosis">Dosis:</label>
					<select id="dosis" style=" width: 110px; ">
						<option selected value="1era">1era</option>
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
						<option value="1er">1era</option>
						<option value="2do">2da</option>
						<option value="3ro">3ra</option>
						<option value="4to">4ta</option>
						<option value="5to">5ta</option>
						<option value="6to">6ta</option>
						<option value="7mo">7ma</option>
						<option value="8vo">8va</option>
						<option value="9no">9na</option>
						<option value="10mo">10ma</option>
						<option selected value="NA">NA</option>
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
							success: function(data) {
								$("#nombre_vacuna").text(data ? data.Nombre : "Valor no encontrado");
							},
							error: function(error) {
								console.log("Error:", error);
							}
						});
					}

					// Evento para ejecutar la búsqueda al cambiar el valor del campo ID de la vacuna
					$("#id_vacuna").on("input", buscarNombreVacuna);
				</script>
			</fieldset>

			<fieldset>
				<legend>historico-vacunas</legend>
				<div id="historial_vacunas"></div>
				<!--iframe id="vacuna_paciente" src="consulta_vacunas.php" frameborder="0" style="width: 100%; height: 100%;"></iframe-->


			</fieldset>
		</div>
		<div style="width: 100%;">
			<button class="boton" id="btnguardar">
				<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">save</i> Guardar
			</button>
			<button class="boton" onclick="resetForm()" id="btnreset">
				<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">autorenew</i> Reset
			</button>
			<a href="menu-pacientes.php" class="claseboton" id="btnatras">
				<i class="material-icons" style="font-size:32px;color:#f0f0f0;text-shadow:2px 2px 4px #000;">arrow_back</i> Atrás
			</a>
		</div>

		<script>
			//▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓MODAL VACUNA▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒
			////////////////FIN FUNCIONES PARA EL MODAL DE VACUNA////////////////////
			//═════════════════════════════════════════════════════════
			// Obtener referencia al botón y al modal de vacuna
			const btnbusquedavacuna = document.getElementById("buscarvacuna");
			const modalvacuna = document.getElementById("Modalvacuna");
			// Función para mostrar el modal de vacuna
			function mostrarModalv() {
				modalvacuna.style.display = "block";
			}
			// Función para ocultar el modal vacuna
			function ocultarModalv() {
				modalvacuna.style.display = "none";
			}
			// Asignar evento de clic al botón para mostrar u ocultar el modal DE VACUNA y evitar recargar la página
			btnbusquedavacuna.addEventListener("click", function(event) {
				event.preventDefault(); // Evitar recargar la página
				if (modalvacuna.style.display === "none") {
					mostrarModalv();
				} else {
					ocultarModalv();
				}
			});
			//═════════════════════════════════════════════════════════
			//═════════════════════════════════════════════════════════
			function cargarHistorialVacunas() {
				var idPaciente = document.getElementById('id_paciente').value;
				var historialVacunasDiv = document.getElementById('historial_vacunas');

				if (idPaciente === '') {
					historialVacunasDiv.innerHTML = '<p>Historial de Vacunas no encontrado.</p>';
				} else {
					$.ajax({
						type: 'POST',
						url: 'consulta_paciente_vacuna.php',
						data: {
							id_paciente: idPaciente
						},
						success: function(data) {
							historialVacunasDiv.innerHTML = data;
						}
					});
				}
			}
			//═════════════════════════════════════════════════════════
			//═════════════════════════════════════════════════════════

			// Agregar evento oninput al elemento input
			document.getElementById('id_paciente').addEventListener('input', cargarHistorialVacunas);

			function cargarHistorialVacunas() {
				var idPaciente = document.getElementById('id_paciente').value;
				var historialVacunasDiv = document.getElementById('historial_vacunas');

				if (idPaciente === '') {
					historialVacunasDiv.innerHTML = '<p>Historial de Vacunas no encontrado.</p>';
				} else {
					$.ajax({
						type: 'POST',
						url: 'consulta_paciente_vacuna.php',
						data: {
							id_paciente: idPaciente
						},
						success: function(data) {
							historialVacunasDiv.innerHTML = data;
						}
					});
				}
			}

			//═════════════════════════════════════════════════════════
			///////////////////////////////////////////////////////////
			//═════════════════════════════════════════════════════════





			//═════════════════════════════════════════════════════════
			//////////////////////////////////////////////////////////
			//═════════════════════════════════════════════════════════
			// Obtener referencia al botón y al modal del paciente
			const btnbusquedapaciente = document.getElementById("buscarpaciente");
			const modalpaciente = document.getElementById("Modalpaciente");
			// Función para mostrar el modal de vacuna
			function mostrarModalp() {
				modalpaciente.style.display = "block";
			}
			// Función para ocultar el modal vacuna
			function ocultarModalp() {
				modalpaciente.style.display = "none";
			}
			// Asignar evento de clic al botón para mostrar u ocultar el modal DE VACUNA y evitar recargar la página
			btnbusquedapaciente.addEventListener("click", function(event) {
				event.preventDefault(); // Evitar recargar la página
				if (modalpaciente.style.display === "none") {
					mostrarModalp();
				} else {
					ocultarModalp();
				}
			});
			//═════════════════════════════════════════════════════════




			// Variable global para almacenar el resultado de la verificación datos vacunas
			var tieneDatosVacuna = false;
			// Función para verificar si la tabla tiene filas (datos agregados)
			function verificarTabla() {
				var tabla = document.getElementById("vacunasTabla");
				var tbody = tabla.getElementsByTagName("tbody")[0];
				tieneDatosVacuna = tbody.hasChildNodes();
			}
			// Función para verificar y mostrar el input de **Fecha** al cargar la página
			function checkFechaProvista() {
				var fechaAplicacionSelect = document.getElementById('fecha_aplicacion_select');
				var fechaAplicacionInput = document.getElementById('fecha_aplicacion_input');

				if (fechaAplicacionSelect.value === 'fecha_provista') {
					fechaAplicacionInput.style.display = 'inline-block';
				} else {
					fechaAplicacionInput.style.display = 'none';
				}
			}

			// Función para establecer la **Fecha** de hoy por defecto
			function setFechaHoy() {
				var fechaAplicacionInput = document.getElementById('fecha_aplicacion_input');
				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0');
				var yyyy = today.getFullYear();

				var fechaHoy = yyyy + '-' + mm + '-' + dd;
				fechaAplicacionInput.value = fechaHoy;
			}

			// Llamada a las funciones REFERENTES A LAS FECHAS al cargar la página
			window.addEventListener('DOMContentLoaded', function() {
				checkFechaProvista();
				setFechaHoy();
			});

			// También puedes llamar a setFechaHoy() cuando se cambie la opción del select
			document.getElementById('fecha_aplicacion_select').addEventListener('change', setFechaHoy);

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
		</script>
	</form>
</body>

</html>