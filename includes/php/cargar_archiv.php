 <?php
    //  if(isset($_GET['id_fasfield'])){ // Buscamos las encuestas
$_SESSION['arch_cargados']=0;
  $sql="select   enc_procesadas.archivos, enc_procesadas.id_fasfield, tipo_encuesta.nombre as tipo_encuesta from enc_procesadas, estado, tipo_encuesta where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta  and enc_procesadas.cod_enc_proc='".$_GET['cod_enc_proc']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          $datos=mysql_fetch_assoc($query);
	 		//Buscamos los archivos del cliente...
					// BUscamos los archivos  del directorio original
  $dir_origin=$datos['tipo_encuesta']."/procesados/".$datos['id_fasfield'];
  $directorio="../../fastfield/".$dir_origin; // Obtengo el directorio original.... 
	  
	   		$ficheros  = scandir($directorio,1);
				 foreach ($ficheros as $nom_archivo) { 
				 $extension=explode(".",$nom_archivo);
				 $nom_archivo2= $extension[0];
				 		if($extension[1]!="json" && $extension[1]!="pdf" && $nom_archivo!=".." && $nom_archivo[0]!="."){
				 ?>
                 
                  <script type="text/javascript">	
				  $(document).ready(function(){
				    
					var nom_archivo='<?php echo $nom_archivo; ?>';
					var id_fasfield=<?php echo $_GET['cod_enc_proc']; ?>;
					var total_arch=<?php echo $datos['archivos'] ?>;
					var arch_carg=$("#arch_carg").html();								
					var datos='nom_archivo='+nom_archivo+'&id_fasfield='+id_fasfield+'&total_arch='+total_arch+'&arch_carg='+arch_carg;
					 $('#cargar23').show();
									   $.ajax({
				
												  type: "POST",
												  data: datos,
												  url: 'pruebadrive/c_archiv_client.php',
												  success: function(valor){
													  
													 
													  $("#arch_carg").html(valor);
													  
													  if(valor==total_arch){
													   $('#cargar23').hide();
													     var datos='listar='+1+'&tipo_encuesta='+1;			
															$.ajax({
										
																			 type: "POST",
																			 data: datos,
																			 url: 'includes/php/consultar_enc.php',
																			 success: function(valor){
																						 
																			   $("#list_enc").html(valor);
																			   $('#cargar').hide();
										
										
																		}
																});
													  }
													  
													  
													  
				
											  }
										});
										
				  });

				 </script>
                 
<?php
						}
				 }	
				  ?>
                  
<?php				 
				 
     //   }
?>

 
                 <html>
                 <body>
<h3 class="h4">Almacenando archivos del cliente: <?php echo $datos['archivos'] ?></h3>
<div id='cargar23'> 
  <p align="center"><img src="img/loading_azul.gif" alt="" id="cargar2"></p>
  <p>Por favor espere  mientras se terminan de subir los archivos al drive, (El proceso puede demorar dependiendo de la cantidad de archivos que tenga el cliente).</p>
</div>
<p><strong>Archivos cargados:  <div id='arch_carg'> <?php  echo $_SESSION['arch_cargados'] ?></div></strong>
<!--<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $_SESSION['arch_cargados'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $datos['archivos'] ?>"  id='arch_carg'  style="width:<?php echo $_SESSION['arch_cargados'] ?>%">
  <?php echo $_SESSION['arch_cargados'] ?>
  </div>-->
</div>
 </p>
<p>&nbsp;</p>
                 </body>
                 </html>
