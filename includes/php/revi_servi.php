<?php
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
     

      $sql="select  * from cliente where cod_cliente='".$_GET['cod_cliente']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          $datos=mysql_fetch_assoc($query);        

// Buscamos la etapa de la última actuación..
$sql2="selec cod_activi_etapa from activ_serv where id_serv_cliente='".$_GET['id_serv_cliente']."' ";
$query2=mysql_query($sql2);
$rows2=mysql_num_rows($query2);
		if($rows2){
					// Buscamos si ya realizó todas las etapas obligatorias..
					
				$sql4="select * from activi_etapa where cod_etapa=2 and cod_servicio='".$_GET['cod_servicio']."' ";
					
		}else{ // SI no hay etapa aaún realiazada entonces listo las actviades de la etapa.
		
			$sql3="select * from activi_etapa where cod_etapa=1 and cod_servicio='".$_GET['cod_servicio']."' ";
				$query3=mysql_query($sql3);	
				
				$sql4="select * from etapa_activ where cod_etapa=1";
				$query4=mysql_query($sql4);
				$datos4=mysql_fetch_assoc($query4);		
		}

	
?>

 <header class="page-header">
           <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Actividades del servicio:  <?php echo utf8_encode($datos['nombre']);  ?> </h3>
                      <p><strong>ETAPA ACTUAL:</strong> <?php echo strtoupper(utf8_encode($datos4['descripcion']));  ?> </p>
                    </div>
                    <div class="card-body">
                         <table width="870" border="0" id="pan_add_revision" class="table responsive" cellpadding="1" cellspacing="4">
                           <tr>
                             <td width="189"><strong>Actividad</strong></td>
                             <td width="26">&nbsp;</td>
                             <td width="227"><strong>Observación:</strong></td>
                             <td width="11">&nbsp;</td>
                             <td width="242"><strong>Fecha de Actividad</strong></td>
                             <td width="16" >&nbsp;</td>
                             <td width="113"><strong>Acción</strong></td>
                           </tr>
                           <tr>
                             <td height="46"><select name="select" id="cod_activi_etapa" class="form-control">
                               <option value="1" selected="selected">Sin actividad</option>
                              <?php while($datos2=mysql_fetch_assoc($query3)){ ?>
                               
                               <option value="<?= $datos2['cod_activi_etapa'] ?>"> <?php echo utf8_encode($datos2['descripcion'])?></option>
                               <?php } ?>
                             </select></td>
                             <td><label for="textfield"></label></td>
                             <td><input type="text" class="form-control" name="textfield2" id="observacion"></td>
                             <td>&nbsp;</td>
                             <td><input type="date" class="form-control" name="textfield2" id="fecha_actividad"></td>
                             <td>&nbsp;</td>
                             <td><input type="button" class="btn btn-primary" name="button" id="g_revision" value="Registrar"></td>
                           </tr>
                         </table>
                         <div id='historial_revi' align="center">
                           <hr>&nbsp;</hr>
                           <table width="155" border="0" cellpadding="0" cellspacing="0">
                             <tr align="center">
                               <td width="106"><strong>Agregar revisión</strong></td>
                             </tr>
                             <tr align="center">
                               <td><img src="../../img/if_Plus_206460.png" id="add_revision" style="cursor:pointer" title="Agregar revisión" width="38" height="38"></td>
                             </tr>
                           </table>
                           <strong>Observaciones</strong>
                           
                           
                           <div id='history_revi' align="center">
                           </div>
                      </div>
                      <p>
                      <div id='cargar2' align="center"> 
                            <img src="../../img/loading_azul.gif" id="cargar2">
                      </div>
                         </p>
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
$("#cargar2").hide();
$("#archrev").hide();
$("#archrev2").hide();
$("#pan_add_revision").hide();

$('#fecha_actividad').datepicker({
        autoHide: true,
        zIndex: 2048,
          format: 'yyyy-mm-dd'
      });

$("#add_revision").click(function(){
$("#pan_add_revision").show();

});
	
$("#cod_estado").change(function(){
        var cod_estado=$("#cod_estado").val();

           if(cod_estado=='Agendada'){
            $("#archrev").show();
$("#archrev2").show();
		   }
            else{
             $("#archrev").hide();
$("#archrev2").hide();
			}

  });




$("#g_revision").click(function(){  // Abregamos revisión .....

var cod_activi_etapa=$("#cod_activi_etapa").val();
var observacion=$("#observacion").val();
var fecha_actividad=$("#fecha_actividad").val();
var id_serv_cliente="<?php echo "$_GET[id_serv_cliente]" ?>";
var datos='id_serv_cliente='+id_serv_cliente+'&cod_activi_etapa='+cod_activi_etapa+'&observacion='+observacion+'&add_revi_serv='+1+'&fecha_actividad='+fecha_actividad;
    
    if(cod_activi_etapa!=1){
		
			if(fecha_actividad==""){
						alert("Por favor introduzca la fecha que ha realizado la actividad.");
			}else{

            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'g_procesos.php?'+datos,
                        success: function(valor){
                           
                               if(valor!=2){
                                $("#cargar2").hide();
                                  alert("Se ha agregado su actividad al cliente");   
                                  $("#history_revi").html(valor);
                                  
                                   var datos='id_serv_cliente='+id_serv_cliente+'&cod_activi_etapa='+cod_activi_etapa+'&observacion='+observacion+'&revi_serv2='+1+'&fecha_actividad='+fecha_actividad;
    
            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'g_procesos.php?'+datos,
                        success: function(valor){
                           
                               if(valor!=2){
                                $("#cargar2").hide();

                              //    alert("Se ha agregado su observación al cliente");   
                                  $("#history_revi3").html(valor);
                                 

                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear el registro de la observación, por favor intenta de nuevo o comuníquese con el administrador.");

                               }


                        }
                  });

                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear el registro de la observación, por favor intenta de nuevo o comuníquese con el administrador.");

                               }


                        }
                  });
			}

    }
    else
      alert("Por favor selecione un estado de la actividad. ");


});

var id_serv_cliente="<?php echo "$_GET[id_serv_cliente]" ?>";
var datos='id_serv_cliente='+id_serv_cliente+'&cod_activi_etapa='+cod_activi_etapa+'&observacion='+observacion+'&revi_serv='+1+'&fecha_actividad='+fecha_actividad;
    
            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'g_procesos.php?'+datos,
                        success: function(valor){
                           
                               if(valor!=2){
                                $("#cargar2").hide();

                              //    alert("Se ha agregado su observación al cliente");   
                                  $("#history_revi").html(valor);
                                 

                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear el registro de la observación, por favor intenta de nuevo o comuníquese con el administrador.");

                               }


                        }
                  });
                  
                  var datos='id_serv_cliente='+id_serv_cliente+'&cod_activi_etapa='+cod_activi_etapa+'&observacion='+observacion+'&revi_serv2='+1+'&fecha_actividad='+fecha_actividad;
    
            $("#cargar2").show();
              $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'g_procesos.php?'+datos,
                        success: function(valor){
                           
                               if(valor!=2){
                                $("#cargar2").hide();

                              //    alert("Se ha agregado su observación al cliente");   
                                  $("#history_revi3").html(valor);
                                 

                               }else{
                                      $("#cargar2").hide();
                                alert("Ocurrió un error al crear el registro de la observación, por favor intenta de nuevo o comuníquese con el administrador.");

                               }


                        }
                  });



});

    </script>