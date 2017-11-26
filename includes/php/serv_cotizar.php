<?php
include('conexion.php');
// Listamos los servicios
$sql="select * from servicios";
$query=mysql_query($sql);

// Lsitamos los servicios a cotizar

$sql2="select serv_recom_diag.id_serv_recom, produc_servi.nom_producto, produc_servi.plazo, servicios.nom_servicio from serv_recom_diag, servicios, produc_servi where servicios.cod_servicio=produc_servi.cod_servicio and serv_recom_diag.cod_servicio=servicios.cod_servicio and id_elab_diag='".$_GET['id_elab_diag']."' ";
$query2=mysql_query($sql2);

?>
<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<form>
                                <div class="form-group">
                                 <div id='recomendar'>   
                                  <table width="569" border="0" class="table">
                                    <tr>
                                            <td width="108">Servicio(s) a recomendar:</td>
                                            <td width="31">&nbsp;</td>
                                            <td width="162"><span class="form-group row">
                                              <label class="col-sm-9 form-control-label">"Párrafo del servicio":</label>
                                            </span></td>
                                    </tr>
                                          <tr>
                                            <td><select name="select" id="cod_servicio" class="form-control">                                       
                                             <?php
									while($datos=mysql_fetch_assoc($query)){
											?>
                                              <option value='<?= $datos['cod_servicio'] ?>'><? echo utf8_encode($datos['nom_servicio']) ?></option>
                                              
                                              <?php
                                              }
											  ?>
                                            </select></td>
                                            <td>&nbsp;</td>
                                            <td><textarea name="pr_servi_n" id="pr_servi_n" class="form-control"></textarea></td>
                                          </tr>
                                  </table>
                              
                                  <div class="form-group row">
                                    <div class="col-sm-12">
                                      <p>
                                        <input type="button" class="btn btn-primary" name="button" id="add_servicio" value="Agregar/Grabar">
                                      </p>
                                    </div>
                                  </div>
                                  </div>
                            <div id='cotizacion'>     
                              <?php
									if($_SESSION['id_grupo']==3 or $_SESSION['id_grupo']==1){
											?> 
                                
                                  <p><strong>SERVICIOS A COTIZAR</strong></p>
                                  <table width="916" border="0" class="table">
                                    <tr>
                                      <td width="159"><strong>Servicio a cotizar: </strong></td>
                                      <td width="161"><strong>Producto Final</strong></td>
                                      <td width="101"><strong>Plazo</strong></td>
                                      <td width="102">Gráfica del servicio</td>
                                      <td width="66"><strong>Cotizar</strong></td>
                                    </tr>
                                     <?php
									 $i=1;
									while($datos2=mysql_fetch_assoc($query2)){
											?>
                                    <tr>
                                     
                                      <td height="46"><?php echo utf8_encode($datos2['nom_servicio']) ?></td>
                                      <td><?php echo utf8_encode($datos2['nom_producto']) ?></td>
                                      <td><?php echo utf8_encode($datos2['plazo']) ?></td>
                                      <td>&nbsp;</td>
                                      <td><strong><a data-fancybox data-type="iframe" href="cotizacion.php?nom_servicio=<?php echo utf8_encode($datos2['nom_servicio']) ?>&id_serv_recom=<?php echo utf8_encode($datos2['id_serv_recom']) ?>" class="btn btn-primary">COTIZAR</a></strong></td>
                                      
                                    </tr>
                                     <?php
									 		$i++;
                                              }
											  ?>
                                  </table>
                               </div>
                                  <?php
									 		
                                         } /// Fin si es del grupo analítico o super administrador (para cotizar).
									?>  
                                                                  
  </div>
  
  
                                <div class="form-group row">
                                  <table width="879" border="0" align="center" class="table">
                                    <tr>
                                      <td><strong>Listado de servicios agregados</strong>/cotizados</td>
                                    </tr>
                                    <tr>
                                      <td id="list_serv"></td>
                                    </tr>
                                  </table>
  </div>
                              
</form>

<script>
$(document).ready(function(){

var tipo=<?php echo $_GET['tipo'] ?>;

if(tipo==1){
$("#recomendar").show();
$("#cotizacion").hide();

}
else if(tipo==2){
	$("#recomendar").hide();

$("#cotizacion").show();
}
		var id_fasfield="<?php echo "$_GET[id_fasfield]" ?>";
		var id_elab_diag=<?php echo $_GET['id_elab_diag'] ?>;
		
		var datos='add_serv='+1+'&list_serv='+1+'&id_fasfield='+id_fasfield;
		  $.ajax({

                        type: "POST",
                        data: datos,
                        url: 'g_procesos.php?'+datos,
                        success: function(valor){
							$("#list_serv").html(valor);								
						}
		});
		
		$("#add_servicio").click(function(){  // Pendiente.. por programar..
				var cod_servicio=$("#cod_servicio").val();
				var pr_servi_n=$("#pr_servi_n").val();
				
				var datos='add_serv='+1+'&crea_serv_recom='+1+'&id_fasfield='+id_fasfield+'&cod_servicio='+cod_servicio+'&pr_servi_n='+pr_servi_n+'&id_elab_diag='+id_elab_diag;
						
						if(cod_servicio!=0 && pr_servi_n!=""){
							
									$.ajax({

													type: "POST",
													data: datos,
													url: 'g_procesos.php?'+datos,
													success: function(valor){
														
															if(valor==3)
															alert("El servicio ya se encuentra recomendado, por favor intente de nuevo");
															else if(valor==2)
															alert("Ocurrió un problema aquí, por favor comuníquese con el administrador");
															else if(valor==1){
															    alert("Servicio recomendado agregado");																
															var datos2='add_serv='+1+'&list_serv='+1+'&id_fasfield='+id_fasfield;
																
																	 $.ajax({
								
																					type: "POST",
																					data: datos2,
																					url: 'g_procesos.php?'+datos,
																					success: function(valor){
																						$("#list_serv").html(valor);								
																					}
																	  });
																
															}
															
													}
									  });
									
						}
						else
						alert("Por favor complete los campos con asterícos(*), son obligatorios");
		});
	
});

</script>