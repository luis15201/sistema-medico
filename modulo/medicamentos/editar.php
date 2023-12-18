<?php
session_start();


require_once "../../include/conec.php";
/*require_once("../../mant_seguro.php");*/

$pagina = $_GET['pag'];
$coddni = $_GET['Id_medicamento'];

$querybuscar = mysqli_query($conn, "SELECT * FROM medicamento WHERE Id_medicamento =$coddni");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $medid     = $mostrar['Id_medicamento'];
    $mednom     = $mostrar['nombre_medicamento'];
    $meddesc    = $mostrar['descripcion'];
    $medform     = $mostrar['formato'];
    $medcant     = $mostrar['Cantidad_total'];
}
?>
<html>

<head>
    <title>Sis_Pediátrico</title>
    <link rel="icon" type="image/x-icon" href="../../IMAGENES/hospital2.ico">
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

                <legend>Modificar medicamentos</legend>
                <label for="txtid">ID medicamentos</label>
				<input type="text" name="txtid" id="txtid" value="<?php echo $medid; ?>" required readonly>
				</br>
				<label for="txtseg">Nombre Medicamento</label>
				<input type="text"  autofocus name="txtmed" id="txtmed" value="<?php echo $mednom; ?>" required></br>
				</br>
                <label for="txtid">Descripcion</label>
				<input type="text" name="txtdesc" id="txtdesc" value="<?php echo $meddesc; ?>" required>
				</br>
                <label for="txtid">Formato</label>
				<input type="text" name="txtform" id="txtform" value="<?php echo $medform; ?>" required>
				</br>
                <label for="txtid">Cantidad total</label>
				<input type="text" name="txtcant" id="txtcant" value="<?php echo $medcant; ?>" required>
				</br>
                <div class="botones-container">
                    <?php echo "<a   href=\"../../mant_medicamentos.php?pag=$pagina\">  Cancelar  </a>"; ?>

                    <input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este medicamento?');">
                </div>
                <div id="myModal" class="modal" style="width: 100%; height: 90%;">
                    <div class="modal-content" style="width: 100%; height: 80%;">
                        <span class="close">&times;</span>
                        <iframe id="modal-iframe" src="../../consulta_medicamento.php" frameborder="0" style="width: 100%; height: 100%;"></iframe>
                    </div>
                </div>
            </fieldset>


        </form>
    </div>
    
</body>

</html>

<?php

if (isset($_POST['btnmodificar'])) {
    $idmed1 = $_POST['txtid'];
    $med1 = $_POST['txtmed'];
    $med2 = $_POST['txtdesc'];
    $med3 = $_POST['txtform'];
    $med4 = $_POST['txtcant'];

    $querymodificar = mysqli_query($conn, "UPDATE medicamento SET Id_medicamento ='$idmed1',nombre_medicamento='$med1',descripcion='$med2',formato='$med3',Cantidad_total='$med4' WHERE Id_medicamento =$idmed1");
    echo "<script>window.location= '../../mant_medicamentos.php?pag=$pagina' </script>";
}
?>