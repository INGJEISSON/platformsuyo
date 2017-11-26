<?php
session_start();
include('conexion.php');

			$sql="select * from grupo_usuarios";
			$query=mysql_query($sql);
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="../js/datepicker-master/dist/datepicker.js"></script>
   <link rel="stylesheet" href="../js/datepicker-master/dist/datepicker.css">
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Creación de usuarios (Suyo Beta)</h2>
            </div>
 </header>
          <!-- Dashboard Counts Section-->
          
          <!-- Charts Section-->
          
          
                     <div class="card-header d-flex align-items-center">
                       <table width="376" border="0">
                         <tr>
                           <td width="214"><strong>Nombre:</strong></td>
                           <td width="152"><input type="text" name="nombre" id="nombre" class="form-control">
                           <label for="textfield"></label></td>
                         </tr>
                         <tr>
                           <td width="214"><strong>Apellidos:</strong></td>
                           <td width="152"><input type="text" class="form-control" name="nombre" id="apellidos">
                           <label for="textfield"></label></td>
                         </tr>
                         <tr>
                           <td><strong>Correo electrónico (Suyo):</strong></td>
                           <td><input type="text" name="email" id="email" class="form-control"></td>
                         </tr>
                         <tr>
                           <td>Grupo de usuario:</td>
                           <td><select name="id_grupo" id="id_grupo" class="form-control">
                               
                      <option value="0">Seleccione</option>
                           <?php
                           			while($datos=mysql_fetch_assoc($query)){

                           ?>

                           <option value="<?= $datos['cod_grupo']?>"><?php echo utf8_encode($datos['descripcion'])  ?></option>

                            <?php 

                            		} 
                           ?>
                           </select>
                          </td>
                         </tr>
                         <tr>
                           <td>Rol o tipo de usuario:</td>
                           <td><select name="tipo_usuario" id="tipo_usuario" class="form-control">
                           </select>
                           <label for="tipo_usuario"></label></td>
                         </tr>
                         <tr>
                           <td colspan="2"><input type="button" name="button" id="registrar" class="btn btn-primary" value="Registrar"></td>
                         </tr>
                       </table>
 </div>

                    <img src='img/preloader.gif' id='cargando2'>
          <div id='repor'>
          	
         </div>
<script type="text/javascript">
      /*global $, document*/
$(document).ready(function () {
	
$("#cargando2").hide();	
					

	
				$("#id_grupo").change(function(){

								var id_grupo = $("#id_grupo").val();

										$('#cargando2').show();				
										$.ajax({
											type:"POST",					
											 url: 'includes/php/g_procesos.php',
											data:"id_grupo="+id_grupo+'&g_user='+1+'&bus_rol='+1+'&create='+1,
											success:function(msg){
												$('#cargando2').hide();
				  								$("#tipo_usuario").show();
												$("#tipo_usuario").empty().removeAttr("disabled").append(msg);		
																										
													
												}
											});



				});


		
				$("#registrar").click(function(){

						var nombre = $("#nombre").val();
						var apellidos = $("#apellidos").val();
						var id_grupo = $("#id_grupo").val();
						var tipo_usuario = $("#tipo_usuario").val();
						var email = $("#email").val();

						if(tipo_usuario!=0){


								var datos ='g_user='+1+'&nombre='+nombre+'&apellidos='+apellidos+'&id_grupo='+id_grupo+'&tipo_usuario='+tipo_usuario+'&email='+email+'&create='+1;

												$.ajax({
													 type: "POST",
													 data: datos,
													 url: 'includes/php/g_procesos.php',
													 success: function(valor){

													 			if(valor!=2){

													 				alert("Registro realizado correctamente");
													 				$("#repor").html(valor);

													 			}else if(valor==2){
													 				alert("Ocurrió un problema al registrar el usuario");
													 			}
													 			else if(valor==3){
													 				alert("El Usuario ya existe");
													 			}
													 }

												});
						}else
						alert("Por favor seleccione a qué grupo de usuario va a pertenecer el usuario");

				});

var datos='g_user='+1+'&listar_usuarios='+1;
	$.ajax({
													 type: "POST",
													 data: datos,
													 url: 'includes/php/g_procesos.php',
													 success: function(valor){
                                                        	$("#repor").html(valor);
													 		
													 }

												});
			
});


  
</script>  