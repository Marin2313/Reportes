<?php


include 'global/conexion.php';

$fecha=$_POST["fecha"];
$vehiculo=$_POST["VehiculoF"];
$concepto=$_POST["Concepto"];
$estatus=$_POST["Estatus"];

$insertar="INSERT INTO reporte(Fecha,Vehiculo,Concepto,Estatus) VALUES ('$fecha','$vehiculo','$concepto','$estatus')";
$resultado = mysqli_query($conexion,$insertar);

if($resultado){ 
    header("Location: Reportes.php");


}else {
}

?>

