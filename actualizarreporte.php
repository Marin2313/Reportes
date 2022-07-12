<?php
include 'templates/cabecera.php';
include 'global/conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
 

    <title>Reporte Diario</title>
        <link rel="stylesheet" href="css/styles.css">

</head>



<?php 
    
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM reporte WHERE ID='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>


    
                <div class="container mt-5">
                    <form action="updatereporte.php" method="POST">
                    
                                <input type="hidden" name="ID" value="<?php echo $row['ID']  ?>">

                                <label>Vehiculo</label>
  
	  <select name="VehiculoF">
		  <option value="0">Seleccione Vehiculo  </option>
		  

<?php 
  include ('global/conexion.php');
  $vehiculo="SELECT * FROM vehiculo";
  $resultado=mysqli_query($conexion,$vehiculo);
  while ($valores = mysqli_fetch_array($resultado)){
	  echo '<option value="'.$valores["Vehiculo"].'">'.$valores["Vehiculo"].'</option> ';
  }
   ?>
	  </select> <br><br>
                                
                                <input type="text" class="form-control mb-3" name="Concepto" placeholder="Concepto" value="<?php echo $row['Concepto']  ?>">
                                <input type="text" class="form-control mb-3" name="Estatus" placeholder="Estatus" value="<?php echo $row['Estatus']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>