<?php
		$sql="select distinct menu.descripcion, menu.ruta, menu.cod_menu FROM permisos_menu, menu where permisos_menu.cod_menu=menu.cod_menu and permisos_menu.cod_usuario='".$_SESSION['cod_usuario']."' and permisos_menu.cod_permiso=5 ";
				$query=mysql_query($sql);
			$rows=mysql_num_rows($query);

					if($rows){ // Encontró menus...  y sub menus habilitados..

											$i=2;
											
											while($datos=mysql_fetch_assoc($query)){	

	$sql2="select  submenu.descripcion, submenu.ruta, submenu.comentario from submenu, permisos_menu where submenu.cod_submenu=permisos_menu.cod_submenu and permisos_menu.cod_menu='".$datos['cod_menu']."' and permisos_menu.cod_permiso=5 and  permisos_menu.cod_usuario='".$_SESSION['cod_usuario']."' order by submenu.m_order ";
												$query2=mysql_query($sql2);
										 	$rows2=mysql_num_rows($query2);				

?>
<li><a href="#dashvariants<?php echo $i ?>" aria-expanded="false" data-toggle="collapse"><i class="icon-interface-windows"></i><?php echo utf8_encode($datos['descripcion']); ?></a>

																	<?php
																	
																	if($rows2){

																	?>

														 <ul id="dashvariants<?php echo $i ?>" class="collapse list-unstyled">

													<?php
															$j=2;
																	while($datos2=mysql_fetch_assoc($query2)){
													?>
									             
									               					 <li><a href="javascript:;" id='var<?php echo $i."".$j ?>'><?php echo utf8_encode($datos2['descripcion']); ?></a></li> 

									               					 				<script>
																 					  			$(document).ready(function(){
																 					  			    
																 					  			   



																 					  						$("#var<?php echo $i."".$j ?>").click(function(){
																 					  						   

																 					  								$('#carga_modulo').show();
																												       $("#contenido").toggle();    
																												                  $("#contenido").empty();        
																												                    $("#contenido").load("includes/php/<?php echo $datos2['ruta'] ?>",
																												                           function(){                                  
																												                              $('#carga_modulo').hide();
																												                              $("#contenido").show();
																												                               $("#footer").show();
																												                          }                               
																												     );     
																 					  						});
																 					  						
																 					  			});
																    				</script> 
									               					 <?php
									               					 			$j++;

									               					 	} // Fin bucle de los submenús...

									               					 ?>
									              </ul>
 </li>



 <?php
 															

 															}
 													$i++;
 												}// Fin bucle de los menús...
		
					}				

?>
