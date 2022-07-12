<?php
include 'templates/cabecera.php';
include 'global/conn.php';
    
$con=conectar();

$id=$_GET['id'];
 /*Consulta simple que nos arrojara los datos que vamos a editar */
$sql="SELECT * FROM vehiculo WHERE ID='$id'";
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
        <link rel="stylesheet" href="css/styles.css">

    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="ID" value="<?php echo $row['ID']  ?>">
                                <!-- Creamos unos imput donde seran escritos los datos a mopdioficar y los arropjamos al archivo update que se encargara de hacer el camnio a la tabla --> 
                                <input type="text" class="form-control mb-3" name="Conductor" placeholder="Conductor" value="<?php echo $row['Conductor']  ?>">
                                <input type="text" class="form-control mb-3" name="Vehiculo" placeholder="Vehiculo" value="<?php echo $row['Vehiculo']  ?>">
                                <input type="text" class="form-control mb-3" name="Rancho" placeholder="Rancho" value="<?php echo $row['Rancho']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>