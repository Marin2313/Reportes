<?php
/*    Usamos la funcion include para llamar archviuos que requerimos, en este caso la cabecera y la conexcion a njestra base de datos*/
include 'templates/cabecera.php';
include 'global/conn.php';

$con=conectar();
/* Realizamos una consulta a nuestra base de datos para obtener todos los datos de la tabla vehiculo */
    $sql="SELECT *  FROM vehiculo";
    $query=mysqli_query($con,$sql);
?>

<head>
        <title>Vehiculos</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <div class="container text-center">
    <h1>Vehiculos</h1>
    


</div> 
<body>
     

    
<div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-8">
                            <!--Creamos una tabla que contendra todos los datos que obtuvimos en la consulta previamente realizada  -->
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Conductor</th>
                                        <th>Vehiculo</th>
                                        <th>Rancho</th>
                                        <th></th>
                                        <th></th>
                                        
                            
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php 
                                        /* Hacemos un array para los dtaos de la tabla*/
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                 <!-- En los datos que contendra la tabla, en lugar de ponerlos manualmente usarmoes lam funcion      echo insertara diretamente los datos de la tabla -->
                                                <th><?php  echo $row['Conductor']?></th>
                                                <th><?php  echo $row['Vehiculo']?></th>  
                                                <th><?php  echo $row['Rancho'] ?></th>
                                                <!-- Utilizamos href para dirigir a una página en concreto que realizara operacionbes especificas -->
                                                <th><a href="actualizar.php?id=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
</body>

</script>

<!-- Creamos un botionm que arrojara una funcion modal para de ser necesario insertar un nuevo vehiculo a la tabla -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
    data-whatever="@mdo">Nuevo vehiculo</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
  
                            <h1>Nuevo vehiculo</h1>
                                <form action="insertar.php" method="POST">
                  
                                    <input type="text" class="form-control mb-3" name="Conductor" placeholder="Conductor">
                                    <input type="text" class="form-control mb-3" name="Vehiculo" placeholder="Vehiculo">
                                    <input type="text" class="form-control mb-3" name="Rancho" placeholder="Rancho">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
      
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>