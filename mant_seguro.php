<?php

error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
$username = "root";
$password = "";
$database = "pediatra_sis";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla "tipo_vacunas"
$query = "SELECT * FROM seguro";
$result = $conn->query($query);

?>



<!--Busca por VaidrollTeam para más proyectos. -->
<html>

<head>
    <title>VaidrollTeam</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--link rel="stylesheet" type="text/css" href="css/estilo-paciente.css"-->
    <link rel="icon" href="logo.png">
    <!--link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css"-->
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <!--link rel="stylesheet" type="text/css" href="css/datatables.css"-->

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
    <!--link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"-->
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
    <!--script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script-->

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
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
    <script>
        /*$(document).ready(function() {
    $('#ejemplo').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Red',
                className: 'red'
            },
            {
                text: 'Orange',
                className: 'orange'
            },
            {
                text: 'Green',
                className: 'green'
            }
        ]
    } );
} );*/
        /* $(document).ready(function() {
             $('#ejemplo').DataTable({
                 dom: 'Bfrtip',
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print', {
                         text: 'Mi Botón',
                         className: 'mi-boton-clase', // Asigna una clase personalizada al botón
                         action: function(e, dt, node, config) {
                             // Funcionalidad personalizada del botón
                         }
                     }
                 ],
                 language: {
                     url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json' // Ruta al archivo de traducción
                 }
             });
         });*/


        $(document).ready(function() {
            var table = $('#ejemplo').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        className: 'dtbotopersonal'
                    },
                    {
                        extend: 'csv',
                        className: 'dtbotopersonal'
                    },
                    {
                        extend: 'excel',
                        className: 'dtbotopersonal'
                    },
                    {
                        extend: 'pdf',
                        className: 'dtbotopersonal'
                    },
                    {
                        extend: 'print',
                        className: 'dtbotopersonal'
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json'
                }
            });
        });
    </script>

</head>

<body>
    <div>
        <?php

        /*$filasmax = 5;

        if (isset($_GET['pag'])) {
            $pagina = $_GET['pag'];
        } else {
            $pagina = 1;
        }

        if (isset($_POST['btnbuscar'])) {
            $buscar = $_POST['txtbuscar'];

            $sqlseg = mysqli_query($conn, "SELECT * FROM seguro where Id_seguro_salud = '" . $buscar . "'");
        } else {
            $sqlseg = mysqli_query($conn, "SELECT * FROM seguro ORDER BY Id_seguro_salud ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);
        }

        $resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_seguros FROM seguro");

        $maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_seguros'];
*/
        ?>
        <div class="cont">

            <form method="POST">

                <fieldset>

                    <legend>Registrar ARS</legend>
                    <div class="botones-container">
                        <a href="menu-mant.php" class="claseboton">← Atrás</a>
                        <a href="index.php" class="claseboton">Login</a>
                        <a href="menu.php" class="claseboton">Menú Principal</a>
                        <a href="mant_seguro.php" class="claseboton">Inicio</a>
                    </div>


                    <?php echo "<a  class='claseboton' href=\"modulo/seguro/agregar.php?pag=$pagina\">Crear seguro</a></br> </br>"; ?>
                    <input type="hidden" value="Buscar" name="btnbuscar">

            </form>



            <table id="ejemplo" class="display nowrap mi-tabla" style="width:90%">
                <thead>
                    <tr>
                        <th>ID SEGUROS</th>
                        <th>ASEGURADORA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>" . $row['Id_seguro_salud'] . "</td>";
                        echo "<td>" . $row['Nombre'] . "</td>";
                        echo "<td style='width:24%'>
			<a class='claseboton' href=\"modulo/seguro/ver.php?Id_seguro_salud=$row[Id_seguro_salud]&pag=$pagina\">Ver</a> 
			<a class='clasebotonVER' href=\"modulo/seguro/editar.php?Id_seguro_salud=$row[Id_seguro_salud]&pag=$pagina\">Modificar</a> 
			
			</td>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No se encontraron resultados.</td></tr>";
                }

                ?>
            </table>

            <div style='text-align:right'>
                <br>
                <?php /*echo "<p style='margin-left:-10px'>Total de seguros: " . $maxusutabla."</p>";*/ ?>
            </div>
        </div>
        <div style='text-align:right'>
            <br>
        </div>
        <div style="text-align:center">

        </div>
        </fieldset>

        </form>
    </div>
    </div>
</body>

</html>