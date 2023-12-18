<html>

<head>
<title>Sis_Pediátrico</title>
    <link rel="icon" type="image/x-icon" href="IMAGENES/hospital2.ico">
    <link rel="stylesheet" type="text/css" href="css/estilo-paciente.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php

include("menu_lateral_header.php");

?>
</head>
<?php

  include("menu_lateral.php");

  ?>

<body>

    <form>
        <div class="container">
            <fieldset>
                <legend>Padecimientos del Paciente</legend>
                <div>
                    <label for="id_paciente">ID PACIENTE:</label>
                    <input type="text" id="id_paciente" name="id_paciente" style="width: 45px;" onblur="cargarHistorialVacunas()" required>
                    <button id="buscarpaciente" class="busquedaboton" title="Buscar pacientes registrados">
                        <i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
                    </button>
                </div>


                <!-- Agregar un event listener para el evento input      //oninput="cargarDatosPaciente()"-->
                <script>
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
                <div id="Modalpaciente" class="modal" style="box-shadow: 10px 5px 5px black;margin:20px;">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="consulta_paciente.php" frameborder="0" style="width: 100%; "></iframe>
                    </div>
                </div>


                <!--▓▓▓▓▓▓  (┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)  ▓▓▓▓▓▓ -->
                <!--▓▓▓▓▓▓  (┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)(┬┬﹏┬┬)  ▓▓▓▓▓▓ -->

                <hr style="margin-top:35px;padding:5px; background-Color:rgba(29,167,226,0.39)">
                <label for="id_padecimiento">ID Padecimiento:</label>
                <input type="text" id="id_padecimiento" style="width:110px" required>
                <button id="busquedaHC" class="busquedaboton" title="Buscar Padecimientos/enfermedades registrados/as">
                    <i class="material-icons" style="font-size:32px;color:#a4e5dfe8;text-shadow:2px 2px 4px #000000;">search</i>
                </button>
                <div>
                    <label for="Nombre_padecimiento">Nombre del padecimiento:</label>
                    <label id="nombre_padecimiento"></label>
                </div>
                <div id="ModalHistoriaClinica" class="modal" style="width: 100%; ">
                    <div class="modal-content" style="width: 100%; ">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="consulta_padecimientos.php" frameborder="0" style="width: 100%; "></iframe>
                    </div>
                </div>




                <label for="notas">Notas:</label>
                <input type="text" id="notas">
                <br>
                <label for="desde_cuando">Desde cuándo:</label>
                <input type="date" id="desde_cuando" onchange="calculateYears()"><br>
                <span id="yearsSince"></span>
                <button id="btnAgregarPadecimiento" class="boton">
                    <i class="material-icons" style="font-size:32px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i> Agregar
                </button>
                <!-- Botones adicionales para Modificar y Cancelar -->
                <button id="btnModificarPadecimiento" style="display: none;">Modificar</button>
                <button id="btnCancelarEdicion" style="display: none;">Cancelar</button>
                <table id="padecimientosTabla" style="display: none;">
                    <thead>
                        <tr>
                            <th>ID Padecimiento</th>
                            <th>Nombre del Padecimiento</th>
                            <th>Notas</th>
                            <th>Desde cuándo</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <script>
                    function buscarNombrePadecimiento() {
                        var idPadecimiento = $("#id_padecimiento").val();
                        $.ajax({
                            type: "POST",
                            url: "buscar_padecimiento.php",
                            data: {
                                id_padecimiento: idPadecimiento
                            },
                            dataType: "json",
                            success: function(data) {
                                $("#nombre_padecimiento").text(data ? data.nombre_padecimiento : "Valor no encontrado");
                            },
                            error: function(error) {
                                console.log("Error:", error);
                            }
                        });
                    }

                    // Evento para ejecutar la búsqueda al cambiar el valor del campo ID de la vacuna
                    $("#id_padecimiento").on("input", buscarNombrePadecimiento);
                </script>
                <input type="hidden" id="tieneDatosPadecimientos" name="tieneDatosPadecimientos" value="">


                <div style=" margin-top:-20;padding:0; height:0cm;">
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
                <div id="error-message" style="color: red;"></div>

                <div id="mensajePadecimientoCapturado"></div>


            </fieldset>

            <fieldset>
                <legend>Historico-Padecimientos</legend>
                <div id="historial_padecimientos"></div>
            </fieldset>

            <!--▓▓▓▓╰(*°▽°*)╯╰(*°▽°*)╯(^///^)╰(*°▽°*)╯╰(*°▽°*)╯╰(*°▽°*)╯▓▓▓▓▓▓▓▓ -->





    </form>

</body>

<script>
    //▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓

    var idPacienteActual = "";
    var cantidadFilasPadecimientos = 0;

    //▓▓▒░▓▒▓▓▓▒░▓// Función para cargar el historial de padecimientos//▓▓▒░▓▒▓▓▓▒░▓
    function cargarHistorialPadecimientos() {
        var idPaciente = document.getElementById('id_paciente').value;
        var historialPadecimientosDiv = document.getElementById('historial_padecimientos');

        if (idPaciente === '') {
            historialPadecimientosDiv.innerHTML = '<p>Historial de Padecimientos no encontrado.</p>';
        } else {
            $.ajax({
                type: 'POST',
                url: 'consulta_padecimientos_pacientes.php',
                data: {
                    id_paciente: idPaciente
                },
                success: function(data) {
                    historialPadecimientosDiv.innerHTML = data;
                }
            });
        }
    }
    //▓▓▒░FIN ▓▒▓▓▓▒░▓// Función para cargar el historial de padecimientos//▓▓▒░▓▒▓▓▓▒░▓
    // Agregar evento oninput al elemento input
    document.getElementById('id_paciente').addEventListener('input', cargarHistorialPadecimientos);

    // Llamada inicial para cargar el historial al cargar la página
    cargarHistorialPadecimientos();






    //═════════════════════════════════════════════════════════
    /////////////////////modal del paciente/////////////////////////////////////
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

    ///////////fin//////////modal del paciente////////////

    //▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒FUNCIONES DE HISTORIA CLINICA░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓
    //▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓
    //✨✨✨busqueda de la historia clinina✨✨✨//
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener referencia al botón y al modal
        const btnBusquedaHC = document.getElementById("busquedaHC");
        const modalHC = document.getElementById("ModalHistoriaClinica");

        // Función para mostrar el modal
        function mostrarModal() {
            modalHC.style.display = "block";
        }

        // Función para ocultar el modal
        function ocultarModal() {
            modalHC.style.display = "none";
        }

        // Asignar evento de clic al botón para mostrar u ocultar el modal y evitar recargar la página
        btnBusquedaHC.addEventListener("click", function(event) {
            event.preventDefault(); // Evitar recargar la página
            if (modalHC.style.display === "none") {
                mostrarModal();
            } else {
                ocultarModal();
            }
        });

        // Asignar evento de clic al botón de cierre dentro del modal para ocultarlo
        modalHC.querySelector(".close").addEventListener("click", ocultarModal);

        // Evitar que el evento de clic en el contenido del modal cierre el modal
        modalHC.querySelector(".modal-content").addEventListener("click", function(event) {
            event.stopPropagation();
        });
    });
    //✨✨✨ fin busqueda de la historia clinina✨✨✨//

    // Función para cambiar el estilo del fieldset de Historia Clínica
    function changeFieldsetStyle() {
        var fieldset = $("fieldset");
        var inputs = fieldset.find('input[type="text"], input[type="date"], select');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.backgroundColor = 'blue';
            inputs[i].style.color = 'white';
        }
    }

    // Función para restaurar el estilo original del fieldset de Historia Clínica
    function restoreFieldsetStyle() {
        var fieldset = $("fieldset");
        var inputs = fieldset.find('input[type="text"], input[type="date"], select');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].style.backgroundColor = '';
            inputs[i].style.color = '';
        }
        $("#btnModificarPadecimiento, #btnCancelarEdicion").hide();
    }

    // Función para ocultar el botón "Agregar"
    function hideAgregarButton() {
        $("#btnAgregarPadecimiento").hide();
    }

    // Función para mostrar el botón "Agregar"
    function showAgregarButton() {
        $("#btnAgregarPadecimiento").show();
    }

    /////▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓

    function verificarIdPacienteCompleto() {
        var idPaciente = document.getElementById('id_paciente').value;

        if (idPaciente === '') {
            alert('Por favor, complete el campo "id_paciente" antes de agregar una nueva vacuna.');
            return false;
        }

        return true;
    }

    function verificarPadecimientoExistente(nombrePadecimiento) {
        // Obtener la tabla y las filas del historial de padecimientos
        var tabla = document.getElementById("historial_padecimientos").getElementsByTagName("table")[0];
        var filas = tabla.getElementsByTagName("tr");

        // Iterar sobre las filas (comenzando desde 1 para omitir la fila de encabezado)
        for (var i = 1; i < filas.length; i++) {
            var celdas = filas[i].getElementsByTagName("td");

            // Obtener el valor del nombre de padecimiento de la fila actual
            var nombreActual = celdas[1].innerText.trim(); // Asegurarse de quitar espacios en blanco alrededor

            // Verificar si el padecimiento ya existe
            if (nombrePadecimiento === nombreActual) {

                return true; // El padecimiento ya existe
            }
        }

        return false; // El padecimiento no existe
    }





    ///▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓


    $(document).ready(function() {
        // Restaurar estilos del fieldset y ocultar botones "Modificar" y "Cancelar"
        restoreFieldsetStyle();

        // Función para agregar un nuevo padecimiento a la tabla
        function agregarPadecimiento() {

            if (!verificarIdPacienteCompleto()) {
                return; // Salir de la función si no está completo
            }


            const idPadecimiento = $("#id_padecimiento").val();
            /* const nombrePadecimiento = $("#nombre_padecimiento").text(); /**/
            var nombrePadecimiento = $("#nombre_padecimiento").text();
            const notas = $("#notas").val();
            const desdeCuando = $("#desde_cuando").val();


            if (verificarPadecimientoExistente(nombrePadecimiento)) {
                alert('Este padecimiento ya existía, registrado para ese paciente, observe el historial');
                return;
            }

            if (idPadecimiento && notas && desdeCuando) {
                const table = $("#padecimientosTabla");
                const tbody = table.find("tbody");
                const row = $("<tr>");

                row.html(`
            <td>${idPadecimiento}</td>
			<td>${nombrePadecimiento}</td>
            <td>${notas}</td>
            <td>${desdeCuando}</td>
            <td><button class="modificarPadecimiento">Modificar</button></td>
            <td><button class="eliminarPadecimiento" onclick="confirm('¿Realmente desea eliminar este padecimiento?')">Eliminar</button></td>
          `);

                tbody.append(row);
                table.css("display", "table");
            }

            $("#id_padecimiento").val("");
            $("#nombre_padecimiento").text("");
            $("#notas").val("");
            $("#desde_cuando").val("");
            $("#yearsSince").text("");

            // Actualizar el valor del campo oculto tieneDatosPadecimientos
            const tieneDatosPadecimientos = document.getElementById("padecimientosTabla").getElementsByTagName("tbody")[0].hasChildNodes();
            document.getElementById("tieneDatosPadecimientos").value = tieneDatosPadecimientos;

            // Actualiza las variables globales
            idPacienteActual = $("#id_paciente").val();
            cantidadFilasPadecimientos = $("#padecimientosTabla tbody tr").length;
        }

        // Asignar el evento click al botón de agregar padecimiento
        $("#btnAgregarPadecimiento").click(function() {
            agregarPadecimiento();
            return false; // Evita el envío del formulario
        });

        // Evento delegado para los botones "Eliminar" dentro de la tabla
        // Código de evento delegado para los botones "Eliminar", sin cambios

        // Evento delegado para los botones "Modificar" dentro de la tabla
        $("#padecimientosTabla").on("click", ".modificarPadecimiento", function(event) {
            event.preventDefault();
            // Lógica para modificar el padecimiento
            // Aquí puedes implementar la lógica para editar los datos del padecimiento
            // Por ejemplo, mostrar un modal con un formulario de edición

            // Aplicar estilos al fieldset y mostrar botones "Modificar" y "Cancelar"
            changeFieldsetStyle();
            $("#btnModificarPadecimiento, #btnCancelarEdicion").show();

            // Ocultar el botón "Agregar" mientras se realiza la modificación
            hideAgregarButton();

            // Obtener la fila actual y guardarla en una variable global para su posterior modificación
            filaActual = $(this).closest("tr");
            const idPadecimiento = filaActual.find("td:eq(0)").text();
            const nombrePadecimiento = filaActual.find("td:eq(1)").text();
            const notas = filaActual.find("td:eq(2)").text();
            const desdeCuando = filaActual.find("td:eq(3)").text();

            // Colocar los valores en los campos del fieldset
            $("#id_padecimiento").val(idPadecimiento);
            $("#nombre_padecimiento").text(nombrePadecimiento);
            $("#notas").val(notas);
            $("#desde_cuando").val(desdeCuando);
        });

        // Evento click del botón "Modificar"
        $("#btnModificarPadecimiento").click(function() {
            // Lógica para aplicar la modificación a la fila de la tabla
            const idPadecimiento = $("#id_padecimiento").val();
            const nombrePadecimiento = $("#nombre_padecimiento").text();
            const notas = $("#notas").val();
            const desdeCuando = $("#desde_cuando").val();

            // Actualizar los valores de la fila actual con los datos modificados
            filaActual.find("td:eq(0)").text(idPadecimiento);
            filaActual.find("td:eq(1)").text(nombrePadecimiento);
            filaActual.find("td:eq(2)").text(notas);
            filaActual.find("td:eq(3)").text(desdeCuando);

            // Restaurar estilos del fieldset y ocultar botones "Modificar" y "Cancelar"
            restoreFieldsetStyle();

            // Mostrar nuevamente el botón "Agregar"
            showAgregarButton();

            // Restaurar los valores originales en los campos del fieldset
            $("#id_padecimiento").val("");
            $("#nombre_padecimiento").text("");
            $("#notas").val("");
            $("#desde_cuando").val("");
            return false; // Evitar el envío del formulario
        });

        // Evento click del botón "Cancelar"
        $("#btnCancelarEdicion").click(function() {
            // Lógica para cancelar la edición y restaurar los valores originales
            // Puedes hacer aquí lo que necesites para cancelar la modificación
            event.preventDefault();
            // Restaurar estilos del fieldset y ocultar botones "Modificar" y "Cancelar"
            restoreFieldsetStyle();

            // Mostrar nuevamente el botón "Agregar"
            showAgregarButton();

            // Restaurar los valores originales en los campos del fieldset
            $("#id_padecimiento").val("");
            $("#nombre_padecimiento").text("");
            $("#notas").val("");
            $("#desde_cuando").val("");
            return false; // Evitar el envío del formulario
        });
    });
    //▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓
    //▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓▓▓▒ FIN DE FUNCIONES DE HISTORIA CLINICA░▓▒▓▓▓▒░▓▒▓▓▓▒░▓▒▓


    function limpiarTablaPadecimientos() {
        $("#padecimientosTabla tbody").empty();
        cantidadFilasPadecimientos = 0;
    }

    document.getElementById('id_paciente').addEventListener('change', function() {
        // Verificar si hay un paciente actual y filas en la tabla
        if (idPacienteActual !== "" && cantidadFilasPadecimientos > 0) {
            // Pregunta al usuario si desea cambiar de paciente
            var respuesta = confirm('¿Desea cambiar de paciente?, al hacerlo se reiniciará el formulario');

            if (respuesta) {
                // Limpiar la tabla de padecimientos y actualizar el id del paciente actual
                limpiarTablaPadecimientos();
                idPacienteActual = this.value;
            } else {
                // Restaurar el valor anterior del input
                this.value = idPacienteActual;
            }
        } else {
            // Si no hay paciente actual o la tabla está vacía, simplemente actualizar el id del paciente actual
            idPacienteActual = this.value;
        }
        cargarHistorialPadecimientos();
    });
</script>

</html>