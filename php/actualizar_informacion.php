<?php
    if(
        !isset($_POST["nombrealum"])||
        !isset($_POST["fechaalum"])||
        !isset($_POST["correoalum"])||
        !isset($_POST["passalum"])||
        !isset($_POST["idalum"])
    )exit();

    include_once "../bd/base_de_datos.php";

    $id = $_POST["idalum"];
    $nombre = $_POST["nombrealum"];
    $fecha = $_POST["fechaalum"];
    $email = $_POST["correoalum"];
    $pass = $_POST["passalum"];

    $sql = $base_de_datos->prepare("UPDATE alumnos SET nombrealum = ?, fechaalum = ?, correoalum = ?, passalum = ? WHERE idalum = ?;");
    $ejecuta = $sql->execute([$nombre, $fecha, $email, $pass, $id]);

    if($ejecuta == true){
        header("refresh:0; url=menuadm.php");
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }