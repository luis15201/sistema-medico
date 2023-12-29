<?php
session_start();

error_reporting(E_ALL & ~E_WARNING);
require_once "../../include/conec.php";

$pagina = $_GET['pag'];

// Consultar el último ID de la tabla datos_padres_de_pacientes
$query = "SELECT MAX(Numidentificador) AS max_id FROM datos_padres_de_pacientes";
$result = $conn->query($query);

// if ($result->num_rows > 0) {
// 	$row = $result->fetch_assoc();
// 	$lastId = $row["max_id"];
// 	$newId = $lastId + 1;
// } else {
// 	// Si no hay registros en la tabla, asignar el ID inicial
// 	$newId = 1;
// }

// // Guardar el nuevo ID en una variable PHP
// $numIdentificador = $newId;

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
    $camposRequeridos = ['txtnumidentificador', 'txttipo_identificador', 'txtnombre', 'txtapellido', 'txtparentesco', 'txtnacionalidad', 'txtsexo', 'txtdireccion', 'txtocupacion'];

    if (validarCampos($camposRequeridos)) {
        $numIdentificador = $_POST['txtnumidentificador'];
        $tipoIdentificador = $_POST['txttipo_identificador'];
        $nombre = $_POST['txtnombre'];
        $apellido = $_POST['txtapellido'];
        $parentesco = $_POST['txtparentesco'];
        $nacionalidad = $_POST['txtnacionalidad'];
        $sexo = $_POST['txtsexo'];
        $direccion = $_POST['txtdireccion'];
        $ocupacion = $_POST['txtocupacion'];

        // Insertar datos en la tabla datos_padres_de_pacientes
        $queryAdd = mysqli_query($conn, "INSERT INTO datos_padres_de_pacientes(Numidentificador, Tipo_Identificador, Nombre, Apellido, Parentesco, Nacionalidad, Sexo, Direccion, Ocupacion) VALUES('$numIdentificador', '$tipoIdentificador', '$nombre', '$apellido', '$parentesco', '$nacionalidad', '$sexo', '$direccion', '$ocupacion')");

        if (!$queryAdd) {
            echo "Error con el registro: " . mysqli_error($conn);
        } else {
            echo "<script>window.location= '../../mant_padres_pacientes.php?pag=1' </script>";
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
            var numIdentificador = document.getElementById("txtnumidentificador").value;
            var tipoIdentificador = document.getElementById("txttipo_identificador").value;
            var nombre = document.getElementById("txtnombre").value;
            var apellido = document.getElementById("txtapellido").value;
            var parentesco = document.getElementById("txtparentesco").value;
            var nacionalidad = document.getElementById("txtnacionalidad").value;
            var sexo = document.getElementById("txtsexo").value;
            var direccion = document.getElementById("txtdireccion").value;
            var ocupacion = document.getElementById("txtocupacion").value;

            if (numIdentificador.trim() === '' || tipoIdentificador.trim() === '' || nombre.trim() === '' || apellido.trim() === '' || parentesco.trim() === '' || nacionalidad.trim() === '' || sexo.trim() === '' || direccion.trim() === '' || ocupacion.trim() === '') {
                alert("Por favor, complete todos los campos");
                return false;
            }

            return true;
        }
    </script>
    <script type="text/javascript">
        // Obtener el campo de entrada y el nuevo ID
        var txtNumIdentificador = document.getElementById("txtnumidentificador");
        var newId = <?php echo $numIdentificador; ?>;

        // Asignar el nuevo ID al campo de entrada
        txtNumIdentificador.value = newId;

        // Cambiar el fondo a gris claro
        txtNumIdentificador.style.backgroundColor = "#f0f0f0";

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

        window.onload = function () {
            var input = document.getElementById("txtnumidentificador");

            if (input.addEventListener) {
                input.addEventListener("focus", placeCursorAtEnd, false);
            } else if (input.attachEvent) {
                input.attachEvent('onfocus', placeCursorAtEnd);
            }

            input.focus();
        }

    </script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s ease;
            flex: 1 1 auto;
            /* Esto hace que los botones se expandan igualmente */
            max-width: 150px;
            /* Establece el ancho máximo para mantener la responsividad. */
            font-size: 14px;
        }

        .botones-container>a:hover,
        .botones-container>input[type="button"]:hover,
        .botones-container>input[type="submit"]:hover,
        .botones-container>button:hover {
            background: linear-gradient(to right, #63b8ff, #4a90e2);

            box-shadow: 2px 3px 3px rgba(0, 0, 0, 0.1);
        }
    </style>



    <style>
        .caja {
            border: 3px solid #ddd;
            padding: 10px;
            box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
            margin: 10px;
            border-radius: 5px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* .caja {
            border: 3px solid #ddd;
            padding: 10px;
            box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
            margin: 10px;
            border-radius: 5px;
        } */

        .cajalegend {
            border: 0px solid rgba(102, 153, 144, 0.0);
            font-weight: bolder;
            font-size: 16px;
            color: white;
            margin: 0;
            padding: 0;
            background-color: transparent;
            border-radius: 2px;
            margin-top: -20px;
            text-shadow: 2px 1px 2px #000000;


        }

        .container {
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: auto auto auto;
            /* Cambié repeat(3, 1fr) por auto para ajustar la altura automáticamente */
            grid-gap: 6px 10px;
            margin-left: 10%;
            margin-right: 10%;
            padding: 0;

        }


        label {
            font-size: 14px;
            color: #444;
            margin: 0;
            font-weight: bold;
        }

        input[type="text"]:read-only {
            background-color: rgb(115, 140, 136);
            color: #000;
            font-weight: bold;
            width: 65px;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;

            font-size: 12px;
            line-height: 14px;
            margin: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {

            width: 150px;
            height: 40px;
            color: #444;
            margin-bottom: 0;
            border: none;
            border-bottom: 0.1vw solid #444;
            outline: none;
            border-radius: 10px;

        }

        button {
            border: none;
            outline: none;
            color: #fff;
            font-size: 14px;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;

            margin: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            height: auto;
            min-height: 40px;
        }


        .boton_bus {
            border: none;
            outline: none;
            height: 4vw;
            color: #fff;
            font-size: 1.6vw;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            cursor: pointer;
            border-radius: 60px;
            width: 60px;
            margin-top: 2vw;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            height: auto;


        }

        .boton_bus:active {
            background-color: #5bc0f7;
            scale: 1.5;
            cursor: pointer;

            transition: background-color 0.8s ease, box-shadow 0.8s ease, color 0.8s ease, font-weight 0.8s ease;
            /* Animaciones de 0.5 segundos */
            box-shadow: 0 0 5px rgba(91, 192, 247, 0.8), 0 0 10px red;
            /* Sombra inicial y sombra roja */
            font-size: 25px;
            color: white;
            /* Cambiar el color del texto */
            font-weight: bold;
            /* Cambiar a negritas */
            font-family: "Copperplate", Fantasy;
        }

        /* Estilos específicos para el modal personalizado */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .custom-modal-content {
            width: 80%;
            height: 80%;
            margin: auto;
            background: linear-gradient(to right, #e4e5dc, #45bac9db);
            padding: 20px;
            border-radius: 20PX;
        }

        .custom-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .custom-close:hover,
        .custom-close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos adicionales específicos para el iframe dentro del modal */
        .custom-iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        body {
            background: linear-gradient(to right, #E8A9F7, #e4e5dc);
        }

        fieldset {
            background: linear-gradient(to right, #e4e5dc, #62c4f9);
            border: 1px solid #ddd;
            border-radius: 2vw;

            padding: 1vw;
            box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
            margin-bottom: 2vw;
        }

        legend {
            font-weight: bold;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 1vw;
            background: linear-gradient(to right, #e4e5dc, #45bac9db);
            border: solid 1px #45bac9db;
            border-radius: 10px;
        }
    </style>
    <?php

    include("../../menu_lateral_header.php");

    ?>
</head>
<?php

include("../../menu_lateral.php");

?>

<body onload="cargarPagina()">
    <div class="container">
        <fieldset style=" height:1200px;">
            <form class="contenedor_popup" method="POST" onsubmit="return validarFormulario();">
                <legend>Registrar datos de padres de pacientes</legend>
                <fieldset class="caja">
                    <legend class="cajalegend">══ Datos de Padres de Pacientes ══</legend>
                    <p>
                        <label for="txttipo_identificador">Tipo Identificador</label>
                        <select id="txttipo_identificador" name="txttipo_identificador" style=" width: 110px; "
                            autocomplete="off" require>
                            <option selected value="Cédula" selected>Cédula</option>
                            <option value="Pasaporte">Pasaporte</option>
                        </select>
                        <!-- <input type="text" autofocus name="txttipo_identificador" id="txttipo_identificador" value="<?php //echo $tipoIdentificador; ?>" required> -->
                    </p>
                    <p style="margin:0;">
                        <label for="txtnumidentificador">Num. Identificador</label>
                        <input type="text" name="txtnumidentificador" id="txtnumidentificador"
                            value="<?php echo $numIdentificador; ?>" required>
                    </p>
                    <script>
                        // Obtenemos el elemento del campo de selección
                        const select = document.getElementById("txttipo_identificador");

                        // Obtenemos el elemento del campo de texto
                        const input = document.getElementById("txtnumidentificador");

                        // Agregamos un evento de cambio al campo de selección
                        select.addEventListener("change", function () {
                            // Obtenemos el valor seleccionado del campo de selección
                            const valorSeleccionado = select.value;

                            // Si el valor seleccionado es "Cédula"
                            if (valorSeleccionado === "Cédula") {
                                FORMATODECEDULA();
                                
                                // Establecemos el placeholder del campo de texto
                                input.placeholder = "123-1234567-1";
                                // Establecemos la máscara de entrada del campo de texto
                                input.inputmask("###-########-#");




                            } else {
                                FORMATODECEDULA();
                                // Establecemos el placeholder del campo de texto
                                input.placeholder = "XXXXXXXXX";
                                // Eliminamos la máscara de entrada del campo de texto
                                input.inputmask("");
                            }
                        });


                        function cargarPagina() {
                            // Obtener el elemento del campo de selección
                            const select = document.getElementById("txttipo_identificador");

                            // Obtener el elemento del campo de texto
                            const input = document.getElementById("txtnumidentificador");

                            // Agregar evento de cambio al campo de selección
                            select.addEventListener("change", function () {
                                // Obtener el valor seleccionado del campo de selección
                                const valorSeleccionado = select.value;

                                // Si el valor seleccionado es "Cédula"
                                if (valorSeleccionado === "Cédula") {
                                    // Establecer el placeholder del campo de texto
                                    input.placeholder = "123-1234567-1";
                                    // Establecer la máscara de entrada del campo de texto
                                    input.inputmask("###-########-#");


                                } else {
                                    // Establecer el placeholder del campo de texto
                                    input.placeholder = "XXXXXXXXX";
                                    // Eliminar la máscara de entrada del campo de texto
                                    input.inputmask("");
                                    // Eliminar el evento de máscara de entrada
                                    input.removeEventListener('input', cedulaMask);
                                }
                            });

                            // Disparar el evento de cambio al cargar la página
                            select.dispatchEvent(new Event("change"));
                        }


                    </script>



                    <script>
                        function FORMATODECEDULA() {
                            const valorSeleccionado = select.value;

                            // Si el valor seleccionado es "Cédula"
                            if (valorSeleccionado === "Cédula") {
                                // Obtener el elemento del campo de Cédula
                                var txtCedula = document.getElementById('txtnumidentificador');

                                // Definir la máscara de entrada
                                var cedulaMask = function (event) {
                                    var cedulaValue = event.target.value;
                                    var cedulaFormatted = cedulaValue.replace(/\D/g, '')
                                        .replace(/(\d{3})(\d{7})(\d{1})/, '$1-$2-$3');
                                    event.target.value = cedulaFormatted;
                                };
                                txtCedula.maxLength = 13;
                                // Aplicar la máscara de entrada al escribir en el campo
                                txtCedula.addEventListener('input', cedulaMask);

                                // Guardar la función de máscara en una propiedad del elemento
                                txtCedula.cedulaMask = cedulaMask;
                            } else {


                                // Obtener el elemento del campo de texto
                                var txtCedula = document.getElementById('txtnumidentificador');

                                // Remover la máscara de entrada del campo
                                if (txtCedula.cedulaMask) {
                                    txtCedula.removeEventListener('input', txtCedula.cedulaMask);
                                }
                            }
                        }

                    </script>
                    <br>
                    <p>
                        <label for="txtnombre">Nombre</label>
                        <input type="text" name="txtnombre" id="txtnombre" value="<?php echo $nombre; ?>" required>
                    </p>
                    <p>
                        <label for="txtapellido">Apellido</label>
                        <input type="text" name="txtapellido" id="txtapellido" value="<?php echo $apellido; ?>"
                            required>
                    </p>
                    <p>
                        <label for="txtparentesco">Parentesco</label>
                        <select id="txtparentesco" name="txtparentesco" style=" width: 110px; " autocomplete="off"
                            require>
                            <option selected value="Madre">Madre</option>
                            <option value="Padre">Padre</option>
                            <option value="Tutor/a Legal">Tutor/a Legal</option>
                            <option value="Abuela/o">Abuela/o</option>
                            <option value="Tía/o">Tía/o</option>
                            <option value="Padrastro/Madrastra">Padrastro/Madrastra</option>
                            <option value="hermano/a">Hermano/a</option>
                            <option value="Hermanastro/a">Hermanastro/a</option>
                            <option value="NA">No Aplica</option>
                        </select>
                        <!-- <input type="text" name="txtparentesco" id="txtparentesco" value="<?php //echo $parentesco; ?>" required> -->
                    </p>
                    <p>
                        <label for="txtnacionalidad">Nacionalidad</label>
                        <select id="txtnacionalidad" name="txtnacionalidad" title="Seleccione nacionalidad"
                            style=" width:250px" required>
                            <option value="AF">Afganistán</option>
                            <option value="AL">Albania</option>
                            <option value="DE">Alemania</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antártida</option>
                            <option value="AG">Antigua y Barbuda</option>
                            <option value="AN">Antillas Holandesas</option>
                            <option value="SA">Arabia Saudí</option>
                            <option value="DZ">Argelia</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaiyán</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrein</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BE">Bélgica</option>
                            <option value="BZ">Belice</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermudas</option>
                            <option value="BY">Bielorrusia</option>
                            <option value="MM">Birmania</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia y Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BR">Brasil</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="BT">Bután</option>
                            <option value="CV">Cabo Verde</option>
                            <option value="KH">Camboya</option>
                            <option value="CM">Camerún</option>
                            <option value="CA">Canadá</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CY">Chipre</option>
                            <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comores</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, República Democrática del</option>
                            <option value="KR">Corea</option>
                            <option value="KP">Corea del Norte</option>
                            <option value="CI">Costa de Marfíl</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croacia (Hrvatska)</option>
                            <option value="CU">Cuba</option>
                            <option value="DK">Dinamarca</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egipto</option>
                            <option value="SV">El Salvador</option>
                            <option value="AE">Emiratos Árabes Unidos</option>
                            <option value="ER">Eritrea</option>
                            <option value="SI">Eslovenia</option>
                            <option value="ES">España</option>
                            <option value="US">Estados Unidos</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Etiopía</option>
                            <option value="FJ">Fiji</option>
                            <option value="PH">Filipinas</option>
                            <option value="FI">Finlandia</option>
                            <option value="FR">Francia</option>
                            <option value="GA">Gabón</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GD">Granada</option>
                            <option value="GR">Grecia</option>
                            <option value="GL">Groenlandia</option>
                            <option value="GP">Guadalupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GY">Guayana</option>
                            <option value="GF">Guayana Francesa</option>
                            <option value="GN">Guinea</option>
                            <option value="GQ">Guinea Ecuatorial</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="HT">Haití</option>
                            <option value="HN">Honduras</option>
                            <option value="HU">Hungría</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IQ">Irak</option>
                            <option value="IR">Irán</option>
                            <option value="IE">Irlanda</option>
                            <option value="BV">Isla Bouvet</option>
                            <option value="CX">Isla de Christmas</option>
                            <option value="IS">Islandia</option>
                            <option value="KY">Islas Caimán</option>
                            <option value="CK">Islas Cook</option>
                            <option value="CC">Islas de Cocos o Keeling</option>
                            <option value="FO">Islas Faroe</option>
                            <option value="HM">Islas Heard y McDonald</option>
                            <option value="FK">Islas Malvinas</option>
                            <option value="MP">Islas Marianas del Norte</option>
                            <option value="MH">Islas Marshall</option>
                            <option value="UM">Islas menores de Estados Unidos</option>
                            <option value="PW">Islas Palau</option>
                            <option value="SB">Islas Salomón</option>
                            <option value="SJ">Islas Svalbard y Jan Mayen</option>
                            <option value="TK">Islas Tokelau</option>
                            <option value="TC">Islas Turks y Caicos</option>
                            <option value="VI">Islas Vírgenes (EEUU)</option>
                            <option value="VG">Islas Vírgenes (Reino Unido)</option>
                            <option value="WF">Islas Wallis y Futuna</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italia</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japón</option>
                            <option value="JO">Jordania</option>
                            <option value="KZ">Kazajistán</option>
                            <option value="KE">Kenia</option>
                            <option value="KG">Kirguizistán</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="LA">Laos</option>
                            <option value="LS">Lesotho</option>
                            <option value="LV">Letonia</option>
                            <option value="LB">Líbano</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libia</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lituania</option>
                            <option value="LU">Luxemburgo</option>
                            <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                            <option value="MG">Madagascar</option>
                            <option value="MY">Malasia</option>
                            <option value="MW">Malawi</option>
                            <option value="MV">Maldivas</option>
                            <option value="ML">Malí</option>
                            <option value="MT">Malta</option>
                            <option value="MA">Marruecos</option>
                            <option value="MQ">Martinica</option>
                            <option value="MU">Mauricio</option>
                            <option value="MR">Mauritania</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">México</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldavia</option>
                            <option value="MC">Mónaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="MS">Montserrat</option>
                            <option value="MZ">Mozambique</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Níger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk</option>
                            <option value="NO">Noruega</option>
                            <option value="NC">Nueva Caledonia</option>
                            <option value="NZ">Nueva Zelanda</option>
                            <option value="OM">Omán</option>
                            <option value="NL">Países Bajos</option>
                            <option value="PA">Panamá</option>
                            <option value="PG">Papúa Nueva Guinea</option>
                            <option value="PK">Paquistán</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Perú</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PF">Polinesia Francesa</option>
                            <option value="PL">Polonia</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="UK">Reino Unido</option>
                            <option value="CF">República Centroafricana</option>
                            <option value="CZ">República Checa</option>
                            <option value="ZA">República de Sudáfrica</option>
                            <option value="DO" selected>República Dominicana</option>
                            <option value="SK">República Eslovaca</option>
                            <option value="RE">Reunión</option>
                            <option value="RW">Ruanda</option>
                            <option value="RO">Rumania</option>
                            <option value="RU">Rusia</option>
                            <option value="EH">Sahara Occidental</option>
                            <option value="KN">Saint Kitts y Nevis</option>
                            <option value="WS">Samoa</option>
                            <option value="AS">Samoa Americana</option>
                            <option value="SM">San Marino</option>
                            <option value="VC">San Vicente y Granadinas</option>
                            <option value="SH">Santa Helena</option>
                            <option value="LC">Santa Lucía</option>
                            <option value="ST">Santo Tomé y Príncipe</option>
                            <option value="SN">Senegal</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leona</option>
                            <option value="SG">Singapur</option>
                            <option value="SY">Siria</option>
                            <option value="SO">Somalia</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="PM">St Pierre y Miquelon</option>
                            <option value="SZ">Suazilandia</option>
                            <option value="SD">Sudán</option>
                            <option value="SE">Suecia</option>
                            <option value="CH">Suiza</option>
                            <option value="SR">Surinam</option>
                            <option value="TH">Tailandia</option>
                            <option value="TW">Taiwán</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TJ">Tayikistán</option>
                            <option value="TF">Territorios franceses del Sur</option>
                            <option value="TP">Timor Oriental</option>
                            <option value="TG">Togo</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad y Tobago</option>
                            <option value="TN">Túnez</option>
                            <option value="TM">Turkmenistán</option>
                            <option value="TR">Turquía</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UA">Ucrania</option>
                            <option value="UG">Uganda</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistán</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="YE">Yemen</option>
                            <option value="YU">Yugoslavia</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabue</option>
                        </select>

                        <!-- <input type="text" name="txtnacionalidad" id="txtnacionalidad" value="<?php //echo $nacionalidad; ?>" required> -->
                    </p>
                    <p>
                        <label for="txtsexo">Sexo</label>
                        <select id="txtsexo" name="txtsexo" style=" width: 140px; " autocomplete="off" require>
                            <option selected value="Maculino" selected>Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        <!-- <input type="text" name="txtsexo" id="txtsexo" value="<?php echo $sexo; ?>" required> -->
                    </p>
                    <p>
                        <label for="txtdireccion">Dirección</label>
                        <textarea name="txtdireccion" id="txtdireccion" required><?php echo $direccion; ?></textarea>
                        <!-- <input type="text" name="txtdireccion" id="txtdireccion" value="<?php echo $direccion; ?>" required> -->
                    </p>
                    <p>
                        <label for="txtocupacion">Ocupación</label>
                        <input type="text" name="txtocupacion" id="txtocupacion" value="<?php echo $ocupacion; ?>"
                            required>
                    </p>
                </fieldset>
                <div class="botones-container">
                    <button type="submit" name="btnregistrar" value="Registrar">
                        <i class="material-icons"
                            style="font-size:21px;color:#12f333;text-shadow:2px 2px 4px #000000;">add</i>
                        Registrar
                    </button>
                    <a class="boton" href="../../mant_padres_pacientes.php?pag=<?php echo $pagina; ?>">
                        <i class="material-icons"
                            style='font-size:21px;text-shadow:2px 2px 4px #000000;vertical-align: text-bottom;'>close</i>
                        Cancelar
                    </a>
                </div>
                <iframe id="modal-iframe" src="../../consulta_padrespacientes2.php" frameborder="0"
                    style="width: 100%; height: 100%;max-height:500px;"></iframe>
        </fieldset>
        </form>
    </div>
</body>

</html>