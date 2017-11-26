 <?php
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
      if(isset($_GET['id_fasfield'])){ // Buscamos las encuestas

      $sql="select  enc_procesadas.cod_enc_proc, enc_procesadas.asesor, enc_procesadas.cliente, enc_procesadas.fecha_recepcion, enc_procesadas.fecha_revision, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield, enc_procesadas.ciudad, enc_procesadas.arch_pdf, tipo_encuesta.nombre as tipo_encuesta from enc_procesadas, estado, tipo_encuesta where enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta  and enc_procesadas.id_fasfield='".$_GET['id_fasfield']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          $datos=mysql_fetch_assoc($query);
	      $archivo_pdf=$datos['arch_pdf'];    
        }
?>


 <header class="page-header">
           <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Información de Diagnóstico de:  <?php echo utf8_encode($datos['cliente']);  ?> - Ciudad: <?php echo utf8_encode($datos['ciudad']);  ?> </h3>
                    </div>
                    <div class="card-body">

                         <p>
                           <?php
                         // Buscamos los archivos....


      if(isset($_GET['id_fasfield'])){ // Buscamos los archivos de la encuesta..

               
        }
?>
                         </p>
                         <table width="436" border="0" class="table responsive">
                           <tr>
                             <td width="245"><strong>Estado:</strong></td>
                             <td width="25">&nbsp;</td>
                             <td width="152"><strong>Observación:</strong></td>
                           </tr>
                           <tr>
                             <td><select name="select" id="cod_estado" class="form-control">
                               <option value="1" selected="selected">Sin revisar</option>
                               <option value="2">Revisado</option>
                               <option value="3">Revisado pero con observaciones</option>
                             </select></td>
                             <td>&nbsp;</td>
                             <td><input type="text" name="textfield" class="form-control" id="observacion"></td>
                           </tr>
                         </table>
                         <p>
                           <input type="button" class="btn btn-primary" name="button" id="c_carpeta" value="Registrar">
                           <input type="button" class="btn btn-primary" name="n_subir_archivo" id="n_subir_archivo" value="Subir Archivos (Nuevamente)">
                         <div id='cargar2' align="center"> 
                           <img src="img/loading_azul.gif" id="cargar2">
                           <p>Por favor espere  mientras se crea el carpeta del cliente en el drive.</p>
                          </div>
                         </p>
                         <table width="130" border="0" class="table responsive"align="center" cellpadding="0" cellspacing="0">
                           <tr>
                             <td width="87">Diagnóstico</td>
                           </tr>
                           <tr>
                             <td><a href="fastfield/diagnosticos_2017/procesados/<?php echo $_GET['id_fasfield']."/".$archivo_pdf ?>" target="_blank"><img src="img/icono_pdf.png" width="93" height="90"> </a></td>
                           </tr>
                         </table>
                         <p>&nbsp;</p>
                    </div>
                  </div>
                </div>
               
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
         
  <script>

$(document).ready(function(){
$('#cargar').show();
$("#cargar2").hide();
$("#n_subir_archivo").hide();
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


$("#c_carpeta").click(function(){  // Creamos la carpeta.... en el drive...

var cod_estado=$("#cod_estado").val();
var observacion=$("#observacion").val();
var datos='cod_enc_proc='+<?php echo ($datos['cod_enc_proc']); ?>+'&cod_estado='+cod_estado+'&observacion='+observacion;
    
$("#n_subir_archivo").click(function(){
	
	 var datos='cod_enc_proc='+<?php echo ($datos['cod_enc_proc']); ?>;
										 
										 				 $.colorbox({
															iframe:false, 
															width:"100%", 
															height:"100%",
															overlayClose:false,
														    href: 'includes/php/eval_archiv.php?'+datos,
          												});
	
	
});
    if(cod_estado==2){

            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'pruebadrive/c_carpeta_client.php',
                        success: function(valor){
                           
                               if(valor==1){
                                $("#cargar2").hide();
                                  alert("Carpeta creada correctamente, ahora se abrirá una ventana para cargar los archivos, haga clic en 'Aceptar'");
								  
										 var datos='cod_enc_proc='+<?php echo ($datos['cod_enc_proc']); ?>;
										 
										 				 $.colorbox({
															iframe:false, 
															width:"100%", 
															height:"100%",
															overlayClose:false,
														    href: 'includes/php/eval_archiv.php?'+datos,
          												});
												 /*  $.ajax({
				
															  type: "POST",
															  data: datos,
															  url: 'includes/php/cargar_archiv.php',
															  success: function(valor){
																 			
																	  $("#cargar_archv").html(valor);
																	  $("#cargar_archv").show();	
																	  			
													 }
										});*/


                               }else if(valor==4){
                                $("#cargar2").hide();
                                alert("La carpeta del cliente ya se encuentra creada en el drive de 'Clientes', por favor verifique e intente de nuevo, si deseas subir nuevamente los archivos, haz clic en el botón respectivo.");
								$("#n_subir_archivo").show();
                                
                                            
                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear la carpeta, por favor comuníquese con el administrador.");

                               }


                        }
                  });

    }
    else
      alert("Para crear la carpeta, debe cambiar el estado a Revisado. ");


});



});

    </script>