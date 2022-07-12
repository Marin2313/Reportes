<?php
include 'templates/cabecera.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <br></br><br></br>
 <div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Reporte Diario</h1>
				<p></p>		
			</div>
	</div>

    <title>Reportes Diario</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">

</head>

<?php
/*Funcion para obtener la fecha del dia y convertirla en una variante*/
date_default_timezone_set('America/Mexico_City'); 
$fecha_actual=date("Y-m-d");


?>

  <body>

  <form action="ingresar.php" method="post" accept-charset="utf-8">
	 
  <br><br>
<!-- Label que contendra la variablñe fecha previamente creada, para mostarsela al usuario -->
  <label>Fecha: <br><input type="datetime" name="fecha" value="<?php echo $fecha_actual; ?>" ></label><br>
  
  <label>Vehiculo</label>
  
	  <select name="VehiculoF">
		  <option value="0">Seleccione Vehiculo  </option>
		  

<?php 
/*Realizamos un SELECT a la tabla vehiculo y un echo que contendra una lista desplegable con los resultados para que eñl usuario la seleccione */ 
  include ('global/conexion.php');
  $vehiculo="SELECT * FROM vehiculo";
  $resultado=mysqli_query($conexion,$vehiculo);
  while ($valores = mysqli_fetch_array($resultado)){
	  echo '<option value="'.$valores["Vehiculo"].'">'.$valores["Vehiculo"].'</option> ';
  }
   ?>
	  </select> <br><br>
 
	
	<div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-6">
		
			<div class="form-group">				
				<input type="text" class="form-control" name="Concepto" placeholder="Concepto" required>			
		  </div>
		  
		  
		  <div class="form-group">				
				<input type="text" class="form-control" name="Estatus" placeholder="Estatus" required>
			</div>
		
		  
		  <button type="submit" class="btn btn-success btn-block">Enviar reporte</button>
	  

<br> 
<br>

		</form>		
		</div>		
	</div>
</div>

<!-- Reportes -->

<?php include 'global/conn.php';

$con=conectar();
 /* Usamos un SELECT para mostrar todos los reportes realizados que concuenden copn la fecha acxtyual para llevar un control der lñas actrividades en el dia sinngenerar un reporte fibnal */
    $sql="SELECT *  FROM reporte WHERE Fecha='$fecha_actual'";
    $query=mysqli_query($con,$sql);
    
    
    ?>

<div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Fechar</th>
                                        <th>Vehiculo</th>
                                        <th>Concepto</th>
                                        <th>Estatus</th>
                                       
                                        
                            
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>

                                                <th><?php  echo $row['Fecha']?></th>
                                                <th><?php  echo $row['Vehiculo']?></th>  
                                                <th><?php  echo $row['Concepto'] ?></th>
                                                <th><?php  echo $row['Estatus'] ?></th>
                                                <th><a href="actualizarreporte.php?id=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deletereporte.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  





                    </script>
                    
                    
<nav class="nav nav-pills nav-fill">
  <a class="nav-item nav-link active" href="reportestotal.php">Reportes</a>
  <a class="nav-item nav-link"></a>
  <a class="nav-item nav-link"></a>
  <a class="nav-item nav-link active" href="pdf.php">Generar PDF</a>

</nav>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
 
</body>
</html>
