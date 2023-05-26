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
$sentencia = $base_de_datos->query("SELECT * FROM administradores;");
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
    <title><?php echo "Administrador: " .$_SESSION['user'];?></title>
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
    <h2 class="usuarios-registrados">Administradores Registrados</h2>
    <div class="menu-bienvenida">
        <a href="menuadm.php" class="registrar-admin"> Alumnos registrados </a>
        <a href="eventos.php" class="registrar-admin" > Eventos </a>
        <a href="#" class="registrar-admin" > Administradores </a>
        <a href="agadmin.html" class="registrar-admin" > Agregar administrador </a>
    </div>
    <br><br>
        <table>
            <thead>
                <tr>
                    <td>No. Identificador</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>Contraseña</td>
                    <td>Editar</td>
                    <td>Eliminar</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($solicitudes as $solicitud){ ?>
                <tr>
                    <td><?php echo $solicitud->idadm ?></td>
                    <td><?php echo $solicitud->nombreadm ?></td>
                    <td><?php echo $solicitud->correoadm ?></td>
                    <td><?php echo $solicitud->passadm ?></td>
                    <td><a href="<?php echo "editaradm.php?idadm=" . $solicitud->idadm?>"><div><img src="../images/editar-usuario.png" class="imagen-boton"></div></a></td>
                    <td><a href="<?php echo "eliminaradm.php?idadm=" . $solicitud->idadm?>"><div><img src="../images/eliminar-usuario.png" class="imagen-boton"></div></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
</div>
</body>
</html>