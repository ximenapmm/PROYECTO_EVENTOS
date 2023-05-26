<?php
session_start(); /*Creamos sesiones de trabajo*/
?>
<?php
$correoadm = $_POST['correoadm'];
$passadm = $_POST['passadm'];

$conexion = mysqli_connect("localhost","root","","eventos");
$consulta = "SELECT *
             FROM administradores
             WHERE correoadm = '$correoadm'
             AND passadm = '$passadm'";

$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    $_SESSION['loggedin'] = true;
    $_SESSION['user'] = $correoadm;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60); //10 minutos
if($correoadm == TRUE){
    header("location:menuadm.php");
}
}
else{
    header("Refresh:0; url=login.html");
}
mysqli_free_result($resultado);
mysqli_close($conexion);