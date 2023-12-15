<?php
session_start();


require_once "../../include/conec.php";
//require_once("../../mant-Agregaruser.php");

$pagina = $_GET['pag'];

// Consultar el último ID de la tabla usuarios
$query = "SELECT MAX(id_centro) AS max_id FROM institucion_de_salud";
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
$centroid = $newId;
?>
<html>

<head>
    <title>Centros Medicos</title>
    <meta charset="UTF-8">


    <style>
        .botones-container2 {
            margin: 2px;
            padding: 2px;
            box-sizing: unset;
            width: 100%;
            float: left;
            text-align: left;
            /*justify-content: center;*/
        }

        .botones-container {
            display: flex;
            flex-wrap: wrap;
            margin: 2px;
            padding: 2px;
            box-sizing: border-box;
            justify-content: left;
        }

        .botones-container>a,
        .botones-container>input[type="button"],
        .botones-container>input[type="submit"],
        .botones-container>button {
            margin: 5px;
            padding: 5px 5px;
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

        .form-container {
            display: flex;
            flex-wrap: wrap;
            align-content: space-between;
            gap: 10px;
            width: 55%;
            margin-bottom: 10px;

        }


        label {
            width: 40%;
            text-align: right;

        }


        input {
            border: none;
            width: 40%;
            border-radius: 6px;
            padding: 5px;

        }


        .claseboton {
            border: none;
            outline: none;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
            padding: 7px;

        }

        .claseboton:hover {
            background: linear-gradient(to right, #63b8ff, #4a90e2);
        }

        .botones-container {
            margin: 2px;
            padding: 2px;
            box-sizing: unset;
            width: 100%;
            float: left;
            text-align: center;
            /*justify-content: center;*/
        }

        fieldset {
            border: 1px solid #ddd;
            border-radius: 2vw;
            background: linear-gradient(to right, #e4e5dc, #45bac9db);
            padding: 1vw;
            box-shadow: 0 0 0.5vw rgba(0, 0, 0, 0.1);
            margin-bottom: 2vw;
        }


        .clasebotonVER {
            border: none;
            outline: none;
            background: linear-gradient(to right, #05c20e, #84e788);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
            color: #080808;
            font-size: 16px;
            padding: 7px;

        }

        .clasebotonVER:hover {
            background: linear-gradient(to right, #84e788, #05c20e);
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        }

        .dt-button.dtbotopersonal {
            border: none;
            outline: none;
            background: linear-gradient(to right, #4a90e2, #63b8ff);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
            padding: 7px;
        }

        .dt-button.dtbotopersonal:hover {
            background: linear-gradient(to right, #63b8ff, #4a90e2);
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

        input[type="search"] {
            /* Tus estilos personalizados aquí */
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            background-color: #f2f2f2;
            color: #333;
            width: 200px;
            /* Ancho personalizado */
        }

        .dataTables_filter input {
            color: white;
            background-color: red;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 170px;
            padding: 10px;
            font-size: 1vw;
            color: #444;
            margin-bottom: 2vw;
            border: none;
            border-bottom: 0.1vw solid #444;
            outline: none;
            border-radius: 15px;
            margin: 10px;
            background-color: white;

        }

        .dataTables_wrapper .dataTables_length,
        div.dataTables_wrapper div.dataTables_filter label,
        div.dataTables_wrapper div.dataTables_info {
            color: black;
            font-weight: bold;

        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            /*padding: 0.5em 1em;*/
            margin-left: 2px;
            text-align: center;
            /*text-decoration: none !important;*/
            cursor: pointer;
            color: #fff;
            border: 1px solid transparent;


            background: linear-gradient(to right, #4a90e2, #63b8ff);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
            font-size: 16px;
            padding: 7px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;

            margin-left: 2px;
            text-align: center;

            cursor: pointer;
            color: #fff;
            border: 1px solid transparent;


            background: linear-gradient(to right, #63b8ff, #4a90e2);
            border-radius: 7px;
            width: auto;
            text-decoration: none;
            height: 40px;
            font-size: 16px;
            padding: 7px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
     <script type="text/javascript">
		// Obtener el campo de entrada y el nuevo ID
		var txtId = document.getElementById("txtid");
		var newId = <?php echo $centroid; ?>;

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
			var input = document.getElementById("txtnom");

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
    <fieldset>
        <legend>Agregar Centro de Salud</legend>
        <form class="form-container" method="POST">
            <fieldset>
                <legend> Centro De Salud </legend>
                <div><label>ID<label>
                            <input type="text" name="txtid" autocomplete="off" value=<?php echo $centroid; ?> require readonly></div>
                <br>
                <div><label>Nombre del centro<label>
                            <input type="text" autofocus name="txtnom" autocomplete="off" require></div>
                <br>
                <div><label>Direccion</label>
                    <input type="text" name="txtdire" autocomplete="off" require>
                </div>
                <br>
                <div><label>Telefono</label>
                    <input type="text" name="txttele" autocomplete="off" require>
                </div>
                <br>
                
            </fieldset>
            <div class='botones-container'>
                <?php echo "<a href=\"../../mant-centromedico.php?pag=$pagina\">Cancelar</a>"; ?>
                <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario');">
            </div>
        </form>
        <div class="modal-content" style="width: 100%; height: 80%;">
            <span class="close">&times;</span>
            <iframe id="modal-iframe" src="../../consulta_centromedico.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
        </div>

        <div class="botones-container2">
            <a href="../../mant-Agregaruser.php" class="claseboton">← Atrás</a>
            <a href="../../index.php" class="claseboton">Login</a>
            <a href="../../menu.php" class="claseboton">Menú Principal</a>

        </div>
    </fieldset>
</body>

</html>
<?php

if (isset($_POST['btnregistrar'])) {
    $vainom     = $_POST['txtnom'];
    $vaidire     = $_POST['txtdire'];
    $vaitelefono     = $_POST['txttele'];
    

    $queryadd    = mysqli_query($conn, "INSERT INTO institucion_de_salud(id_centro, nombre, direccion, telefono) VALUES('$centroid','$vainom','$vaidire','$vaitelefono')");

    if (!$queryadd) {
        echo "Error con el registro: " . mysqli_error($conn);
        //echo "<script>alert('DNI duplicado, intenta otra vez');</script>";

    } else {
        echo "<script>window.location= '../../mant-centromedico.php?pag=1' </script>";
    }
}
?>