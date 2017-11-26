<?php
//Busco los ficheros en formato json.
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
			
			if(isset($_POST['listar'])){ // Buscamos las encuests

			 $sql="select enc_procesadas.asesor, enc_procesadas.cliente,  enc_procesadas.fecha_recepcion, enc_procesadas.fecha_fin_registro, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield from enc_procesadas, estado where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta='".$_POST['tipo_encuesta']."' order by enc_procesadas.cod_estado=1 desc ";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
							
							if($rows){
								include('resul_enc.php');
							}

			}

            if(isset($_POST['g_elab_diag'])){ // Chequeo de diagnósticos... Control de calidad.

		 	    
		 	    if($_SESSION['tipo_usuario']==7)
		 	     $sql="select  *  from entreg_diag where cod_receptor='".$_SESSION['cod_usuario']."' order by fecha";
		 	     else
		 	     $sql="select enc_procesadas.asesor, enc_procesadas.cliente, enc_procesadas.id_fasfield from enc_procesadas, estado where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=1 and enc_procesadas.cod_estado=2 ";
				
		 	     
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
							
							if($rows){
									include('resul_elab_diag.php');
							}
							else
							echo "2";

			}


			if(isset($_POST['g_proceso'])){ // Chequeo de diagnósticos... Control de calidad.

		 	    
		 	    if($_SESSION['tipo_usuario']==7)
		 	     $sql="select  *  from entreg_diag where cod_receptor='".$_SESSION['cod_usuario']."' order by fecha";
		 	     else
		 	     $sql="select enc_procesadas.asesor, enc_procesadas.cliente, enc_procesadas.id_fasfield from enc_procesadas, estado where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=1 and enc_procesadas.cod_estado=2 ";
				
		 	     
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
							
							if($rows){
									include('resul_ctl_calidad.php');
							}
							else
							echo "2";

			}
			
			if(isset($_POST['cheq_diag'])){ // Chequeo de diagnósticos...

				 $sql="select enc_procesadas.asesor, enc_procesadas.cliente,  enc_procesadas.fecha_recepcion, enc_procesadas.fecha_fin_registro, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield from enc_procesadas, estado where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta='".$_POST['tipo_encuesta']."' and enc_procesadas.cod_estado=1 ";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
							
							if($rows){
							echo "1";
							}
							else
							echo "2";


			}
			
				if(isset($_POST['call_center'])){ // Call center.... 
				
				        if(isset($_POST['listar_llamadas'])){
				             $sql="SELECT * FROM `call_center_grab` where fecha_llamada_1='9/27/2017' and estado='call'  order by fecha_llamada desc ";
				             $query=mysql_query($sql);
					$rows=mysql_num_rows($query);
							
    						 include('resul_call_llamadas.php');
				        
				        }
			}
			
			
			
?>
