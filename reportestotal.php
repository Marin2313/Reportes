<?php
include 'templates/cabecera.php';
include 'global/conn.php';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Empacadora de Cítricos del Totonacapan S.A. de C.V.</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
</head>
<body>
        

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="Reportes.php">Reporte Diario</a>
  </li>
       
<?php 

$con=conectar();
/* Realizamos una consulta a la base de datos igual a la de reporte diario, la diferencia sers que aqui no especificaremos un dato, para poder inmp´rimir todas las actividades pasasdas y poder hacer una busqueda especifica */

    $sql="SELECT *  FROM reporte";
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
              <!---                                  
              
              <th><a href="actualizar.php?id=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>
              <th><a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th>  -->                                      
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  

                    
                    </script>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
 
</body>
</html>