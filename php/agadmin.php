<?php
if(!isset($_POST["nombreadm"]) ||
   !isset($_POST["correoadm"]) ||
   !isset($_POST["passadm"])
)exit();

include_once "../bd/base_de_datos.php"; //include_once solamente se ejecuta una vez
$nombreadm = $_POST["nombreadm"];
$correoadm = $_POST["correoadm"];
$passadm = $_POST["passadm"];

$insertar = $base_de_datos->prepare("INSERT INTO administradores (nombreadm,correoadm,passadm) VALUES (?,?,?);");
$resultado_insertar = $insertar->execute([$nombreadm, $correoadm, $passadm]);

if($resultado_insertar === TRUE){
    echo "
    <script>
        alert('El administrador se ha registrado con éxito...');
    </script>";
    header("Refresh:0; url=admin.php");
   
}else{
echo "
    <script>
        alert('¡Error de formulario!...');
        alert('¡Error de conexión a base de datos!');
    </script>";
    header("Refresh:0; url=admin.php");
}
?>