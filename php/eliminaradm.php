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

if(!isset($_GET["idadm"])) exit();
$id = $_GET["idadm"];

include_once "../bd/base_de_datos.php";

$sentencia = $base_de_datos->prepare("DELETE FROM administradores WHERE idadm = ?;");
$resultado = $sentencia->execute([$id]);

if($resultado === TRUE){
    echo "<script>alert('Se ha eliminado el administrador.');</script>";
    header("refresh:0; url=eventos.php");
}
else{
    echo "<h2>Algo salio mal, verfica con el encargado de sistemas</h2>";
}
?>