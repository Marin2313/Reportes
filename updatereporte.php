<!-- UPDATE -- >
<?php

include 'global/conn.php';
$con=conectar();

$id=$_POST['ID'];
$vehiculo=$_POST['VehiculoF'];
$concepto=$_POST['Concepto'];
$estatus=$_POST['Estatus'];

$sql="UPDATE reporte SET  Vehiculo='$vehiculo',Concepto='$concepto',Estatus='$estatus' WHERE ID='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: Reportes.php");
    }
?>