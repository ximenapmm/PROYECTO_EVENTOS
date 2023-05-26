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
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM peventos WHERE idev = ?;");
$sentencia->execute([$id]);
$solicitud = $sentencia->fetch(PDO::FETCH_OBJ);
if($solicitud === FALSE){
	echo "¡No existe alguna solicitud con ese ID!";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/icono-pagina.png">
    <link rel="stylesheet" href="../css/hoja_estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <title>Editar evento</title>
</head>
<body>
<script src="../js/logout.js"></script>
<div class="nav-bg">
        <nav class="navegacion-principal">
            <a href="cerrar_sesion.php" class="enlace-logout" onclick="cerrar_sesion()">Cerrar Sesión</a>
        </nav>
    </div>
    <h2 class="usuarios-registrados">Editar Alumno</h2>
    <div class="menu-bienvenida">
        <a href="eventos.php" class="registrar-admin">Volver</a>
    </div>
    <br><br>
    <div class="informacion">
        <div class="imagen-formulario">
            <img src="../images/formulario.png" alt="" class="imagen">
        </div>
        <div>
            <form action="actualizarev.php" method="post" class="formulario-editar">
                <div class="id">
                    <label for="">No. Identificador</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->idev ?>" name="idev" id="" class="input-formulario-id" readonly>
                </div>
                <div class="nombrec">
                    <label for="">Nombre </label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->nombreev?>" name="nombreev" id="" class="input-formulario">
                </div>
                <div class="fecha">
                    <label for="">Fecha</label>
                    <br>
                    <input type="date" value="<?php echo $solicitud->fechaev?>" name="fechaev" id="" class="input-formulario">
                </div>
                <div class="correo">
                    <label for="">Lugar</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->lugar?>" name="lugar" id="" class="input-formulario">
                </div>
                <div class="pass">
                    <label for="">Descripcion</label>
                    <br>
                    <input type="text" value="<?php echo $solicitud->descripcionev?>" name="descripcionev" id="" class="input-formulario">
                </div>
                <div class="pass">
                    <label for="">Hora</label>
                    <br>
                    <input type="time" value="<?php echo $solicitud->horaev?>" name="horaev" id="" class="input-formulario">
                </div>
                <div class="submit">
                    <input type="submit" value="Actualizar Información" class="actualizar-datos">
                </div>
            </form>
        </div>
    </div>
</body>
</html>