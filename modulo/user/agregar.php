<?php
session_start();


require_once "../../include/conec.php";
//require_once("../../mant-Agregaruser.php");

$pagina = $_GET['pag'];
?>
<html>

<head>
    <title>VaidrollTeam</title>
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

</head>

<body>
    <fieldset>
        <legend>Agregar Usuario</legend>
        <form class="form-container" method="POST">
            <fieldset>
                <legend> Usuario</legend>
                <div><label>Nombre de usuario<label>
                            <input type="text" name="txtnom" autocomplete="off"></div>
                <br>
                <div><label>Contraseña</label>
                    <input type="text" name="txtpass1" autocomplete="off">
                </div>
                <br>
                <div><label>Confirmar Pass</label>
                    <input type="text" name="txtconfi" autocomplete="off">
                </div>
                <br>
                <div><label>Estado</label>
                    <input type="text" name="txtest" autocomplete="off">
                </div>
                <br>
                <div><label>Nombre/s</label>
                    <input type="text" name="txtnomcom" autocomplete="off">
                </div>
                <br>
                <div><label>Rol</label>
                    <input type="text" name="txtrol" autocomplete="off">
                </div>
                <br>
            </fieldset>
            <div class='botones-container'>
                <?php echo "<a href=\"../../mant-agregaruser.php?pag=$pagina\">Cancelar</a>"; ?>
                <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario');">
            </div>
        </form>
        <div class="modal-content" style="width: 100%; height: 80%;">
            <span class="close">&times;</span>
            <iframe id="modal-iframe" src="../../consulta_usuario.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
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
    $vaiusu     = $_POST['txtnom'];
    $vaipass     = $_POST['txtpass1'];
    $vaiconf     = $_POST['txtconfi'];
    $vaiestado     = $_POST['txtest'];
    $vainomcom     = $_POST['txtnomcom'];
    $vairol     = $_POST['txtrol'];

    $queryadd    = mysqli_query($conn, "INSERT INTO usuario(nombre_usuario,pass1,confirm_pass,estado,nombre_completo,rol) VALUES('$vaiusu','$vaipass','$vaiconf','$vaiestado','$vainomcom','$vairol')");

    if (!$queryadd) {
        echo "Error con el registro: " . mysqli_error($conn);
        //echo "<script>alert('DNI duplicado, intenta otra vez');</script>";

    } else {
        echo "<script>window.location= '../../mant-Agregaruser.php?pag=1' </script>";
    }
}
?>