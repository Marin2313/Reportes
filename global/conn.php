<?php
function conectar(){   /*Inicio de la funmcion */
    
    /*creamos las variables que usaremos en la funcion con  los datos de 
    nuetra base de datos */
    $host="localhost";
    $user="root";
    $pass="";
    $bd="reportes";

    /*utilizamos una variable nueva para utilizar mas adelante que 
    contendra la funcion de conexion llamada msqil_connect que 
    utilizara las varibales previamente establecida*/
    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
