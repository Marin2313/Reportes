<?php

    include 'templates/cabecera.php';
    include 'global/config.php';
    include 'global/conn.php';
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM reporte WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: reportes.php");
    }
?>
