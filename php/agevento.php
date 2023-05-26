<?php
if(!isset($_POST["nombreev"]) ||
   !isset($_POST["fechaev"]) ||
   !isset($_POST["lugar"]) ||
   !isset($_POST["descripcionev"])||
   !isset($_POST["horaev"])
)exit();

include_once "../bd/base_de_datos.php"; //include_once solamente se ejecuta una vez
$nombreev = $_POST["nombreev"];
$fechaev = $_POST["fechaev"];
$lugar = $_POST["lugar"];
$descripcionev = $_POST["descripcionev"];
$horaev = $_POST["horaev"];

$insertar = $base_de_datos->prepare("INSERT INTO peventos (nombreev,fechaev,lugar,descripcionev,horaev) VALUES (?,?,?,?,?);");
$resultado_insertar = $insertar->execute([$nombreev, $fechaev, $lugar, $descripcionev, $horaev]);

if($resultado_insertar === TRUE){
    echo "
    <script>
        alert('El evento se ha creado con éxito...');
    </script>";
    header("Refresh:0; url=eventos.php");
   
}else{
echo "
    <script>
        alert('¡Error de formulario!...');
        alert('¡Error de conexión a base de datos!');
    </script>";
    header("Refresh:0; url=eventos.php");
}
?>