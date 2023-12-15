<?php
session_start();


require_once "../../include/conec.php";
/*require_once("../../mant_seguro.php");*/

$pagina = $_GET['pag'];
$coddni = $_GET['id_centro'];

$querybuscar = mysqli_query($conn, "SELECT * FROM institucion_de_salud WHERE id_centro =$coddni");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $centid     = $mostrar['id_centro'];
    $centnom     = $mostrar['nombre'];
    $centdire     = $mostrar['direccion'];
    $centtele     = $mostrar['telefono'];
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

                <legend>Modificar centro medico</legend>
                <label for="txtid">ID Centro Medico</label>
                <input type="text" name="txtid" id="txtid" value="<?php echo $centid; ?>" required readonly>
                </br>
                <label for="txtseg">Nombre de Centro de salud </label>
                <input type="text" name="txtnom" id="txtnom" value="<?php echo $centnom; ?>" required></br>
                </br>
                <label for="txtseg">Direccion de Centro medico</label>
                <input type="text" name="txtdire" id="txtdire" value="<?php echo $centdire; ?>" required></br>
                </br>
                <label for="txtseg">Telefono de Centro medico</label>
                <input type="text" name="txttel" id="txttel" value="<?php echo $centtele; ?>" required></br>
                </br>
                <div class="botones-container">
                    <?php echo "<a   href=\"../../mant-centromedico.php?pag=$pagina\">  Cancelar  </a>"; ?>

                    <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este centro medico?');">
                </div>
                <div id="myModal" class="modal" style="width: 100%; height: 90%;">
                    <div class="modal-content" style="width: 100%; height: 80%;">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="../../consulta_centromedico.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
                    </div>
                </div>
            </fieldset>


        </form>
    </div>
    
</body>

</html>

<?php

if (isset($_POST['btnmodificar'])) {
    $idcent1 = $_POST['txtid'];
    $cent1 = $_POST['txtnom'];
    $cent2 = $_POST['txtdire'];
    $cent3 = $_POST['txttel'];

    $querymodificar = mysqli_query($conn, "UPDATE institucion_de_salud SET id_centro ='$idcent1',nombre='$cent1',direccion='$cent2' ,telefono='$cent3' WHERE id_centro =$idcent1");
    echo "<script>window.location= '../../mant-centromedico.php?pag=$pagina' </script>";
}
?>