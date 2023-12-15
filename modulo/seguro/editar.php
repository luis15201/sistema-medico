<?php
session_start();


require_once "../../include/conec.php";
/*require_once("../../mant_seguro.php");*/

$pagina = $_GET['pag'];
$coddni = $_GET['Id_seguro_salud'];

$querybuscar = mysqli_query($conn, "SELECT * FROM seguro WHERE Id_seguro_salud =$coddni");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $segid     = $mostrar['Id_seguro_salud'];
    $segnom     = $mostrar['Nombre'];
}
?>
<html>

<head>
    <title>VaidrollTeam</title>
    <meta charset="UTF-8">

    <!--link rel="stylesheet" type="text/css" href="../../css/style.css"-->
    <link rel="stylesheet" type="text/css" href="../../css/estilo-paciente.css">

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
    </style>
<?php

include("menu_lateral_header.php");

?>
</head>
<?php

  include("menu_lateral.php");

  ?>

<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">
            <fieldset>

                <legend>Modificar seguro</legend>
                <label for="txtid">ID Seguro</label>
                <input type="text" name="txtid" id="txtid" value="<?php echo $segid; ?>" required readonly>
                </br>
                <label for="txtseg">Nombre de Aseguradora de Salud</label>
                <input type="text" name="txtseg" id="txtseg" value="<?php echo $segnom; ?>" required></br>
                </br>
                <div class="botones-container">
                    <?php echo "<a   href=\"../../mant_seguro.php?pag=$pagina\">  Cancelar  </a>"; ?>

                    <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este seguro?');">
                </div>
                <div id="myModal" class="modal" style="width: 100%; height: 90%;">
                    <div class="modal-content" style="width: 100%; height: 80%;">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="../../consulta_seguros.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
                    </div>
                </div>
            </fieldset>


        </form>
    </div>
    
</body>

</html>

<?php

if (isset($_POST['btnmodificar'])) {
    $idseg1 = $_POST['txtid'];
    $seg1 = $_POST['txtseg'];

    $querymodificar = mysqli_query($conn, "UPDATE seguro SET Id_seguro_salud ='$idseg1',Nombre='$seg1' WHERE Id_seguro_salud =$idseg1");
    echo "<script>window.location= '../../mant_seguro.php?pag=$pagina' </script>";
}
?>