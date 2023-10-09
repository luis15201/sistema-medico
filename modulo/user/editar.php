<?php
session_start();

error_reporting(E_ERROR | E_PARSE);
require_once "../../include/conec.php";
/*require_once("../../mant-Agregaruser.php");*/

$pagina = $_GET['pag'];
$coddni = $_GET['id_usuario'];

$querybuscar = mysqli_query($conn, "SELECT * FROM usuario WHERE id_usuario=$coddni");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $usuid     = $mostrar['id_usuario'];
    $usunom     = $mostrar['nombre_usuario'];
    $usupass     = $mostrar['pass1'];
    $usuconfpass     = $mostrar['confirm_pass'];
    $usuestado     = $mostrar['estado'];
    $usunomcom     = $mostrar['nombre_completo'];
    $usurol     = $mostrar['rol'];
}
?>
<html>

<head>
    <title>VaidrollTeam</title>
    <meta charset="UTF-8">



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
            border-radius: 20px;
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
            width: 30%;
            margin-bottom: 10px ;

        }


         label {
            width: 40%;
            text-align: right;
           /*margin-right: 10%;*/
        }


         input {
            border:none;
            width: 40%;
            border-radius: 6px;
            padding: 5px;
           /* text-align: left;
            padding: 5px;
            margin-bottom: 10px;*/
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
    <div class="caja_popup2">
        <form method="POST">

            <fieldset>
                <legend>Modificar usuario</legend>
                <div class="form-container">
                    <label  for="txtid">ID del usuario:</label>
                    <input  type="text" name="txtid" value="<?php echo $usuid; ?>" required readonly><br>

                    <label for="txtnom">Nombre del usuario:</label>
                    <input type="text" name="txtnom" value="<?php echo $usunom; ?>" required><br>

                    <label for="txtpass">Contraseña:</label>
                    <input type="number" name="txtpass" value="<?php echo $usupass; ?>" required><br>

                    <label for="txtconfpass">Confirmar contraseña:</label>
                    <input type="number" name="txtconfpass" value="<?php echo $usuconfpass; ?>" required><br>

                    <label for="txtestado">Estado:</label>
                    <input type="text" name="txtestado" value="<?php echo $usuestado; ?>" required><br>

                    <label for="txtnomcom">Nombre completo:</label>
                    <input type="text" name="txtnomcom" value="<?php echo $usunomcom; ?>" required><br>

                    <label for="txtrol">Rol:</label>
                    <input type="text" name="txtrol" value="<?php echo $usurol; ?>" required><br>
                </div>
                <div class="botones-container">
                    <?php echo "<a  href=\"../../mant-Agregaruser.php?pag=$pagina\">Cancelar</a>"; ?>
                    <input  type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este usuario?');">

                </div>


                <div id="myModal" class="modal" style="width: 100%; height: 90%;">
                    <div class="modal-content" style="width: 100%; height: 80%;">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="../../consulta_usuario.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['btnmodificar'])) {
    $iduser1 = $_POST['txtid'];
    $nom1 = $_POST['txtnom'];
    $pass1 = $_POST['txtpass'];
    $confpass1 = $_POST['txtconfpass'];
    $estado1 = $_POST['txtestado'];
    $nomcom1 = $_POST['txtnomcom'];
    $rol1 = $_POST['txtrol'];

    $querymodificar = mysqli_query($conn, "UPDATE usuario SET id_usuario='$iduser1',nombre_usuario='$nom1', pass1='$pass1',confirm_pass='$confpass1',estado='$estado1',nombre_completo='$nomcom1',rol='$rol1' WHERE id_usuario=$iduser1");
    echo "<script>window.location= '../../mant-Agregaruser.php?pag=$pagina' </script>";
}
?>