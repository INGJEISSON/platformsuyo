<?php
include('../../../dependencias/path.php'); // cciontrolador de sesiones..

echo " valor de: ".$conectar_bd;

   		if(isset($conectar_bd)){

   				echo "conectado";
   		}	
   		else
   			echo "no conectado";

?>