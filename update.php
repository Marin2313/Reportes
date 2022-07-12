<?php

include 'global/conn.php';
$con=conectar();
/* Lammamamos lam infomazcion almacena en el cuadro de texto con el metodo post */
$id=$_POST['ID'];
$conductor=$_POST['Conductor'];
$vehiculo=$_POST['Vehiculo'];
$rancho=$_POST['Rancho'];
/* rEALKIZNMOA UN UPDATE para remplazar los datos previamnete almacenados */
$sql="UPDATE vehiculo SET  Conductor='$conductor',Vehiculo='$vehiculo',Rancho='$rancho' WHERE ID='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: vehiculos.php");
    }
?>