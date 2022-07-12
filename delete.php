<?php

    include 'templates/cabecera.php';
    include 'global/config.php';
    include 'global/conn.php';
$con=conectar();

$id=$_GET['id'];
 /*Utilizamos una funcion simple DELETE que dice que si el Id del vehiculo elegido concuerda con el ID ecisatente sea eliminado de la tabla */
$sql="DELETE FROM vehiculo  WHERE id='$id'";
$query=mysqli_query($con,$sql);
 /*Si la funcion es realizada con exito nbos regresa en automatico a la pagina vehiculos */
    if($query){
        Header("Location: vehiculos.php");
    }
?>
