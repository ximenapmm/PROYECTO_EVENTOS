<?php
    if(
        !isset($_POST["nombreev"])||
        !isset($_POST["fechaev"])||
        !isset($_POST["lugar"])||
        !isset($_POST["descripcionev"])||
        !isset($_POST["horaev"])
    )exit();

    include_once "../bd/base_de_datos.php";

    $id = $_POST["idev"];
    $nombre = $_POST["nombreev"];
    $fecha = $_POST["fechaev"];
    $lugar = $_POST["lugar"];
    $descripcion = $_POST["descripcionev"];
    $hora = $_POST["horaev"];

    $sql = $base_de_datos->prepare("UPDATE peventos SET nombreev = ?, fechaev = ?, lugar = ?, descripcionev = ?, horaev = ? WHERE idev = ?;");
    $ejecuta = $sql->execute([$nombre, $fecha, $lugar, $descripcion, $hora, $id]);

    if($ejecuta == true){
        header("refresh:0; url=eventos.php");
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }