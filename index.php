<?php
include 'templates/cabecera.php';

?> 
<!-- Creamos un archvio html simple que incluria el titulo -->
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
<!-- Creamos un div que xciontendra los campos que yutilkizarenos -->
<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-15 user-img">
                    <!-- Insertamops el logo de la empresa  -->
                    <img src="img/logo.jpg" th:src="@{/img/logo.png}"/>
                </div>
                 <!-- Hacemos uso del ul para organizarr nuestros botones que nos mandara a 
                 cadfa parfte de la pagina werb -->
                <ul class="nav nav-pills nav-fill">
                
                <li class="nav-item">
                <a class="nav-link active" href="reportestotal.php">Reportes</a> 
                </li>
                
               
                <li class="nav-item">
                <a class="nav-link active" href="vehiculos.php">Vehiculo </a> 
                </li>

        </ul>

        <nav class="nav nav-pills nav-justified">
                <li class="nav-item">
                <a class="nav-link active" href="reportes.php">Reporte Diario</a> 
                </li>
                </nav>
            
            </div>
        </div>
    </div>


</body>
</html>
