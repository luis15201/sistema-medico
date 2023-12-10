<?php
include("include/conec.php");

?>
<!--Busca por VaidrollTeam para más proyectos. -->
<html>

<head>
    <title>Centros Medicos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">


    <!--TODOS LOS JAVASCRIPTS DE DATATABLES-->
    <script src="js/buttons.html5.min.js"></script>
    <script src="js/buttons.print.min.js"></script>
    <script src="js/dataTables.buttons.min.js"></script>
    <script src="JS/jquery-3.7.0.js"></script>
    <script src="JS/jquery.dataTables.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>

    <!-- Incluir CSS de DataTables cdn online -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Incluir CSS de DataTables Buttons cdn online-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- Incluir jQuery y los archivos JS de DataTables y los botones desde CDN -->
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Incluir DataTables -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- Incluir DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <!-- Incluir JSZip -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <!-- Incluir pdfmake -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Incluir Botones HTML5 -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <!-- Incluir Botones de impresión -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


    <style>
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



<?php

  include("menu_lateral_header.php");

  ?>


</head>
<?php

  include("menu_lateral.php");

  ?>

<body>
    <?php

    $filasmax = 5;

    if (isset($_GET['pag'])) {
        $pagina = $_GET['pag'];
    } else {
        $pagina = 1;
    }

    if (isset($_POST['btnbuscar'])) {
        $buscar = $_POST['txtbuscar'];

        $sqlcentro = mysqli_query($conn, "SELECT * FROM institucion_de_salud where id_centro = '" . $buscar . "'");
    } else {
        $sqlcentro = mysqli_query($conn, "SELECT * FROM institucion_de_salud ORDER BY id_centro ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
    }

    $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_centro FROM institucion_de_salud");

    $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_centro'];

    ?>
    <div class="cont">
        <form method="POST">
        <fieldset>
        <legend>Lista de Centros Medicos </legend>

            <a  class='claseboton' href="menu-mant.php">Volver al menu</a>
            <a  class='claseboton' href="menu.php">Inicio</a>

            <?php echo "<a  class='claseboton' href=\"modulo/centrosdesalud/agregar.php?pag=$pagina\">Crear usuario</a>"; ?>
            <!--input type="submit" value="Buscar" name="btnbuscar"-->
            <!--input type="text" name="txtbuscar" placeholder="Ingresar DNI de usuario" autocomplete="off" style='width:20%'-->
        </form>
        <script>
            $(document).ready(function() {
                $('#ejemplo').DataTable({
                    dom: 'frtip',
                  /*  buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]*/
                });
            });
        </script>
        <table id="ejemplo" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>id centromedico</th>
                    <th>nombre del centro medico</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
            </thead>
            <?php

            while ($mostrar = mysqli_fetch_assoc($sqlcentro)) {

                echo "<tr>";
                echo "<td>" . $mostrar['id_centro'] . "</td>";
                echo "<td>" . $mostrar['nombre'] . "</td>";
                echo "<td>" . $mostrar['direccion'] . "</td>";
                echo "<td>" . $mostrar['telefono'] . "</td>";
                echo "<td style='width:24%'>
			
			<a  class='claseboton' href=\"modulo/centrosdesalud/editar.php?id_centro=$mostrar[id_centro]&pag=$pagina\">Modificar</a> 
			</td>";
            }

            ?>
        </table>

        <div style='text-align:right'>
            <br>
            <?php echo "Total de usuarios: " . $maxusutabla; ?>
        </div>
    </div>
    <div style='text-align:right'>
        <br>
    </div>
    <div style="text-align:center">
        <?php
        if (isset($_GET['pag'])) {
            if ($_GET['pag'] > 1) {
        ?>
                <a href="Agregaruser.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
            <?php
            } else {
            ?>
                <a href="#" style="pointer-events: none">Anterior</a>
            <?php
            }
            ?>

        <?php
        } else {
        ?>
            <a  class='claseboton' href="#" style="pointer-events: none">Anterior</a>
            <?php
        }

        if (isset($_GET['pag'])) {
            if ((($pagina) * $filasmax) < $maxusutabla) {
            ?>
                <a class='claseboton' href="mant-centromedico.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
            <?php
            } else {
            ?>
                <a  class='claseboton' href="#" style="pointer-events: none">Siguiente</a>
            <?php
            }
            ?>
        <?php
        } else {
        ?>
            <a  class='claseboton' href="mant-centromedico.php?pag=2">Siguiente</a>
        <?php
        }

        ?>
    </div>
    <a class='claseboton' href="menu-mant.php">Volver al menu</a>

    </fieldset>
    </form>
    </div>
</body>

</html>