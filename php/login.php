<?php
session_start(); /*Creamos sesiones de trabajo*/
?>
<?php
$correoalum = $_POST['user'];
$pass = $_POST['password'];

$conexion = mysqli_connect("localhost","root","","eventos");
$consulta = "SELECT *
             FROM alumnos
             WHERE correoalum= '$correoalum'
             AND passalum = '$pass'";

$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $correoalum;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (100 * 60); //10 minutos
if($correoalum == TRUE){
    header("location:menu_bienvenida.php");
}
}
else{
    header("Refresh:0; url=login.html");
}
mysqli_free_result($resultado);
mysqli_close($conexion);