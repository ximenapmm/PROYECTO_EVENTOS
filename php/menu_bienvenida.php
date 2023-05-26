<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else{
    echo "<script> alert('Debes de iniciar sesión.'); </script>";
    header("Refresh:0; url=login.html");
exit;
}
$now = time();

if($now > $_SESSION['expire']) {
    session_destroy(); //destruyendo la variable session_start();
    header("Refresh:0; url=login.html");
exit;
}
?>
<!-- Documento de seleccionar la tabla de datos -->
<?php
include_once "../bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM peventos;");
$solicitudes = $sentencia->fetchALL(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hoja_estilo.css">
    <link rel="icon" href="../images/icono-pagina.png">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title><?php echo "Usuario: " .$_SESSION['user'];?></title>
</head>
<body>
<script src="../js/imagen.js"></script>
<script src="../js/logout.js"></script>
<div class="content">
    <img src="../images/5.jpg" class="logo">
</div>
<div class="content2">
    <div class="nav-bg">
        <nav class="navegacion-principal">
            <a href="cerrar_sesion.php" class="enlace-logout" onclick="cerrar_sesion()">Cerrar Sesión</a>
        </nav>
    </div>
    <h2 class="usuarios-registrados"> Próximos Eventos </h2>
    <div class="menu-bienvenida">
        <a href="menu_bienvenida.php" class="registrar-admin">Actualizar</a>
    </div>
    <br><br>
        <table>
            <thead>
                <tr>
                <td>No. Identificador</td>
                    <td>Nombre del evento</td>
                    <td>Fecha</td>
                    <td>Lugar</td>
                    <td>Descripción</td>
                    <td>Hora</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($solicitudes as $solicitud){ ?>
                <tr>
                    <td><?php echo $solicitud->idev ?></td>
                    <td><?php echo $solicitud->nombreev ?></td>
                    <td><?php echo $solicitud->fechaev ?></td>
                    <td><?php echo $solicitud->lugar ?></td>
                    <td><?php echo $solicitud->descripcionev ?></td>
                    <td><?php echo $solicitud->horaev ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div>
</body>
</html>