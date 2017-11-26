 <?php
 session_start();
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
      if(isset($_GET['cod_enc_proc'])){ // Buscamos las encuestas
	  		include('cargar_archiv.php');
	  }	