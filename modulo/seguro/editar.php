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
    <style>
        input[type="text" i] {
            /*width: 45%;*/
            padding: 1vw;
            font-size: 1vw;
            color: #444;
            margin-bottom: 2vw;
            border: none;
            border-bottom: 0.1vw solid #444;
            outline: none;
            border-radius: 15px;
            margin: 10px
        }
    </style>
</head>

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
                <?php echo "<a class='claseboton' href=\"../../mant_seguro.php?pag=$pagina\">  Cancelar  </a>"; ?>
                <input class="claseboton" type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este seguro?');">
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