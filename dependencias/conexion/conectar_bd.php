<?php
$hostname_conectar_bd = "localhost";
$database_conectar_bd = "suyo_carpetas";
$username_conectar_bd = "root";
$password_conectar_bd = "";
$conectar_bd = mysqli_connect($hostname_conectar_bd, $username_conectar_bd, $password_conectar_bd, $database_conectar_bd ) or trigger_error(mysqli_error(),E_USER_ERROR); 

    if(isset($conectar_bd)){

    				echo "conectado";
	}else
	echo "no conectado";

?>
