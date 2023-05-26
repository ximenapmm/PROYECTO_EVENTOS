<?php
    if(
        !isset($_POST["nombreadm"])||
        !isset($_POST["passadm"])||
        !isset($_POST["correoadm"])
    )exit();

    include_once "../bd/base_de_datos.php";

    $id = $_POST["idadm"];
    $nombre = $_POST["nombreadm"];
    $pass = $_POST["passadm"];
    $correo = $_POST["correoadm"];

    $sql = $base_de_datos->prepare("UPDATE administradores SET nombreadm = ?, passadm = ?, correoadm = ? WHERE idadm = ?;");
    $ejecuta = $sql->execute([$nombre, $pass, $correo, $id]);

    if($ejecuta == true){
        header("refresh:0; url=admin.php");
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }