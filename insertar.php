<?php

include 'global/conn.php';
$con=conectar();
/* Lammamamos lam infomazcion almacena en el cuadro de texto con el metodo post */
$conductor=$_POST['Conductor'];
$vehiculo=$_POST['Vehiculo'];
$rancho=$_POST['Rancho'];

/* Realizamos un INSERT INTO a la base de datos que contenga todos los datos previamnete almacenadas con el metodfos post */
$sql="INSERT INTO vehiculo(Conductor,Vehiculo,Rancho) VALUES ('$conductor','$vehiculo','$rancho')";
$query= mysqli_query($con,$sql);



if($query){
    Header("Location: vehiculos.php");
    
}else {
}
?>