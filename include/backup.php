<?php
if (isset($_POST['hacerBackup'])) {
    $servername = "localhost";
    $username = "joel1";
    $password = "Hola@123";
    $database = "pediatra_sis";

    $fecha = date("Ymd");
    $ruta = __DIR__ . "/basededatos/";
    $nombre = "pediatra_sis_" . $fecha . ".sql";
    $archivo = $ruta . $nombre;

    $mysqldumpPath = "C:/wamp64/bin/mysql/mysql8.0.31/bin/mysqldump.exe"; // Ruta absoluta al ejecutable de mysqldump

    // Comando para realizar el backup usando mysqldump
    $command = "$mysqldumpPath -u $username -p$password -h $servername $database > $archivo 2>&1";

    exec($command, $output, $exitCode);

    if ($exitCode === 0) {
        $mensaje = "Backup completado correctamente. El archivo se ha guardado como: $nombre";
    } else {
        $mensaje = "Ha ocurrido un error durante el proceso de backup. Detalles del error:<br><pre>" . implode("\n", $output) . "</pre>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hacer Backup</title>
    <style>
        .banner {
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        .success {
            background-color: #7FFF7F; /* Verde */
        }

        .error {
            background-color: #FF7F7F; /* Rojo */
        }
    </style>
</head>
<body>
    <?php if (isset($mensaje)) { ?>
        <div class="banner <?php echo $exitCode === 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php } ?>

    <form method="post">
        <input type="submit" name="hacerBackup" value="Hacer Backup">
    </form>
</body>
</html>




