
<section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                
               
                    	<table width="117" border="1" cellpadding="0" cellspacing="0" class="table">
                              <tr align="center">
                                <td height="28" colspan="2" bgcolor="#0099FF" style="color:#FFF"><strong>Prospectos</strong></td>
                              </tr>
                              <tr style="font-size:12px" align="center">
                                <td width="105" height="28"><strong>Encuesta Propectos</strong></td>
                                <td width="142"> <strong>Encuesta Promotor</strong></td>
                          </tr>
                              <tr  style="font-size:16px;" align="center">
                                <td><?php echo $prospectos ?> </td>
                                <td><?php echo $n_pros_nom ?></td>
                              </tr>
                    </table>                    
                </div>
                 <div class="col-xl-9 col-sm-6 col-xs-3">
                
               
                    	<table width="287" border="1" cellpadding="0" cellspacing="0" class="table responsive">
                              <tr align="center">
                                <td height="28" colspan="5" bgcolor="#0099FF" style="color:#FFF"><strong>Diagnósticos</strong></td>
                              </tr>
                              <tr style="font-size:12px" align="center">
                                <td width="77" height="28"> <div class="brand-text brand-big hidden-lg-down"><strong>Gratuito</strong></div>
                                      <div class="brand-text brand-small"><strong>Grat</strong></div></td>
                                <td width="83"> <div class="brand-text brand-big hidden-lg-down"><strong>Vendidos</strong></div>
                                      <div class="brand-text brand-small"><strong>Vend</strong></div></td>
                                <td width="133"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Valor Ingresado</strong></div>
                                      <div class="brand-text brand-small"><strong>V.Ingreso</strong></div></strong></td>                            
                                <td width="87"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Documentos Entregados</strong></div>
                                      <div class="brand-text brand-small"><strong>DocuEntr.</strong></div></strong></td>
                          </tr>
                              <tr  style="font-size:16px" align="center">
                                <td><?php echo $gratuito; ?></td>
                                <td><?php echo $vendidos; ?></td>
                                <td>$<?php echo number_format($v_diagnos); ?></td>                               
                                <td><?php echo $entr_diag; ?></td>
                              </tr>
                    </table>                    
                  
                </div>
                
                  <div class="col-xl-12 col-sm-12">
                
               
                    	<table width="292" border="1" cellpadding="0" cellspacing="0" class="table responsive">
                              <tr align="center">
                                <td height="28" colspan="7" bgcolor="#0099FF" style="color:#FFF"><strong>Servicios</strong></td>
                              </tr>
                              <tr style="font-size:12px" align="center">
                                <td width="50" height="28"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Vendidos</strong></div>
                                      <div class="brand-text brand-small"><strong>Vend</strong></div></strong></td>
                                <td width="90"> <div class="brand-text brand-big hidden-lg-down"><strong>Valor ingresado</strong></div>
                                      <div class="brand-text brand-small"><strong>V.Ingreso</strong></div></strong></td>
                                <td width="86"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Valor ingresado por recaudo</strong></div>
                                      <div class="brand-text brand-small"><strong>V.IngRec</strong></div></td>
                                <td width="56"><div class="brand-text brand-small">
                                  <div class="brand-text brand-big hidden-lg-down"><strong>Valor ingresado Serv Express</strong></div>
                                  <strong>V.ingreso Express</strong>
                                </div></td>
                                <td width="56"><div class="brand-text brand-small">
                                  <div class="brand-text brand-big hidden-lg-down"><strong>NO vendidos</strong></div>
                                <strong>NOvend</strong></div></td>
                                <td width="56"><div class="brand-text brand-small">
                                  <div class="brand-text brand-big hidden-lg-down"><strong>Pendientes por venta</strong></div>
                                <strong>PenVent</strong></div></td>
                                <td width="56"><div class="brand-text brand-big hidden-lg-down"><strong>NO viables</strong></div>
                                <div class="brand-text brand-small"><strong>NOviabl</strong></div></td>
                          </tr>
                              <tr style="font-size:16px" align="center">
                                <td><?php echo $tom_servsi; ?> </td>
                                <td>$<?php echo number_format($valor_serv); ?></td>
                                <td>$<?php echo number_format($recaudo_cuotas); ?></td>
                                <td>$<?php echo number_format($recaudo_express); ?></td>
                                <td><?php echo $tom_servno; ?></td>
                                <td><?php echo $tom_servpendventa; ?></td>
                                <td><?php echo $tom_servnoviable; ?></td>
                              </tr>
                    </table>                    
                  
                </div>
                
                <div class="col-xl-6 col-sm-6">
                
               
                    	<table width="345" border="1" cellpadding="0" cellspacing="0" class="table" id="1">
                              <tr align="center">
                                <td height="28" colspan="3" bgcolor="#0099FF" style="color:#FFF"><strong>Seguimiento de créditos</strong></td>
                              </tr>
                               <tr style="font-size:12px" align="center">
                                <td width="84"><strong>Concretados</strong></td>
                                <td width="78"> <strong>No concretados</strong></td>
                                <td width="144"><strong>Valor ingresado por crédito</strong></td>
                          </tr>
                              <tr  style="font-size:12px">
                                <td><?php echo $aprob_credito; ?> </td>
                                <td><?php echo $repro_credito; ?> </td>
                                <td><?php echo number_format($valor_credito); ?> </td>
                              </tr>
                    </table>
                    	<table width="345" border="1" cellpadding="0" cellspacing="0" class="table" id="12">
                    	  <tr align="center">
                    	    <td height="28" colspan="3" bgcolor="#0099FF" style="color:#FFF"><strong>Seguimiento de créditos por aliado</strong></td>
                  	    </tr>
                    	  <tr style="font-size:12px" align="center">
                    	    <td width="84"><strong>Aliado</strong></td>
                    	    <td width="78">&nbsp;</td>
                    	    <td width="144"><strong>Valor ingresado por crédito</strong></td>
                  	    </tr>
                    	  <tr  style="font-size:12px">
                    	    <td>&nbsp;</td>
                    	    <td>&nbsp;</td>
                    	    <td>&nbsp;</td>
                  	    </tr>
                  	  </table>
                </div>
                <div class="col-xl-4 col-sm-6">      
                    	<table width="359" border="1" cellpadding="0" cellspacing="0" class="table responsive">
                              <tr align="center">
                                <td height="28" colspan="4" bgcolor="#0099FF" style="color:#FFF"><strong>Créditos dirgidos por aliado</strong></td>
                              </tr>
                               <tr style="font-size:12px" align="center">
                                <td width="80" height="28"><strong>FMSD</strong></td>
                                <td width="101"> <strong>Interactuar</strong></td>
                                <td width="98"><strong>Creditos Orbe</strong></td>
                                <td width="62"><strong>Av villas</strong></td>
                          </tr>
                              <tr  style="font-size:16px" align="center">
                                <td><?php echo $r1 ?></td>
                                <td><?php echo $r3 ?></td>
                                <td><?php echo $r2 ?></td>
                                <td><?php echo $r4 ?></td>
                              </tr>
                    </table>    
                </div>

 				<div class="col-xl-4 col-sm-6">      
                    	<table width="359" border="1" cellpadding="0" cellspacing="0" class="table">
                              <tr align="center">
                                <td width="341" height="28" colspan="4" bgcolor="#0099FF" style="color:#FFF"><strong>Valor total <?php if( $_POST['ciudad']!='Todos'){ ?> ingresado por la regional <?php }  ?> </strong></td>
                              </tr>
                              <tr  style="font-size:18px" align="center">
                                <td height="28" colspan="4"><strong>$<?php echo number_format($v_diagnos+$recaudo_cuotas+$valor_serv+$recaudo_express+$valor_credito) ?></strong></td>
                          </tr>
                    </table>    
                </div>                
 				<!-- Item --><!-- Item -->
                 <!--
                 <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                 
                    <div class="title"><span>Valor ingresado por venta (Diagnóstico)</span>
                    
                    </div>
                    <div class="number"><strong> $<?php echo number_format($datos71['valor']) ?> </strong></div>
                  </div>
                </div>
                
                
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                   
                    <div class="title"><span>Valor ingresado por venta (Servicio)</span> $ 
                    </div>
                    <div class="number"><strong></strong></div>
                  </div>
                </div>
                
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                  
                    <div class="title"><span>Diagnósticos gratuitos</span>:
                    
                    </div>
                    <div class="number"><strong><?php echo  $rows124 ?> </strong></div>
                  </div>
                </div>
                
                 <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                   
                    <div class="title"><span>Diagnósticos vendidos</span>:

                    </div>
                    <div class="number"><strong><?php echo  $rows125 ?></strong></div>
                  </div>
                </div>
                
                 <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                  
                    <div class="title"><span>Valor ingresado por cuotas:</span>
                      
                    </div>
                    <div class="number"><strong></strong></div>
                  </div>
                </div>
                
                <div class="col-xl-3 col-sm-6">
                     <div class="item d-flex align-items-center">                     
                        <div class="title"><span># De créditos dirigidos:</span></div>
                     </div>
                    <div class="number"><strong></strong></div>
                </div>
                
                 -->
                <div class="col-xl-3 col-sm-6">
                     <div class="item d-flex align-items-center">
                        <div><a href="includes/php/map_ases_prom.php" target="_blank"><img src='img/map-pin-location.jpg' width='64' height='64'></a></div>
                        <div class="title"><span>Seguimiento Asesor y Promotor</span>:</div>
                     </div>
                    <div class="number"><strong></strong></div>
                </div>
              </div>
             </div>
            </div>
          </section>
        
                
                
               <div class="col-lg-12">
                  <div class="bar-chart-example card">
                    <div class="card-body">                 
                    Para ver la información más detallada haga clic en <a class="edicion" id='info_general' style='cursor:pointer'><u>"Ver información"</u></a></div>
                    Descargar información en excel<a class="edicion" id='info_general2' style='cursor:pointer'><u>"Descargar"</u></a></div>
                    
                  </div>
                </div>

          <section class="charts">
            <div class="container-fluid">
                
                
              <div class="row">
                <!-- Line Charts-->
                <!--<div class="col-lg-8">
                  <div class="line-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Proyección con Metas (En Desarrollo)</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="lineChartExample"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="line-chart-example card no-margin-bottom">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Proyección con Metas (En Desarrollo)</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="lineChartExample1"></canvas>
                    </div>
                  </div>
                  <div class="line-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="lineChartExample2"></canvas>
                    </div>
                  </div>
                </div>-->

                 <div class="col-lg-12">
                  <div class="bar-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <!-- 
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Información General</h3>
                        </div>
                    <div class="card-body">
                      <canvas id="dash_general"></canvas>
                      <br>
                      Para ver la información más detallada haga clic en <a class="edicion" id='info_general' style='cursor:pointer'><u>"Ver información"</u></a><br>

                    </div>-->
                  </div>
                </div>
                
            </div>
          </section>
<!--<script src="../js/charts/js/highcharts.js"></script>
<script src="../js/charts/js/modules/exporting.js"></script>-->
<script type="text/javascript">
      /*global $, document*/
$(document).ready(function () {
	$("#info_general").click(function(){
	    
		var fecha_1="<?php echo "$_POST[fecha_1]" ?>";
		var fecha_2="<?php echo "$_POST[fecha_2]" ?>";
		var ciudad="<?php echo "$_POST[ciudad]" ?>";
		var asesor="<?php echo "$_POST[asesor]" ?>";
		
		var datos='tipo='+1+'&fecha_1='+fecha_1+'&fecha_2='+fecha_2+'&ciudad='+ciudad+'&asesor='+asesor;
		
		$.colorbox({
          iframe:true, 
          width:"100%", 
          height:"100%",
		  href:'includes/php/detalle_dash.php?'+datos,
          overlayClose:false,
          //escKey:
          });
	});
	
	$("#info_general2").click(function(){
	    
		var fecha_1="<?php echo "$_POST[fecha_1]" ?>";
		var fecha_2="<?php echo "$_POST[fecha_2]" ?>";
		var ciudad="<?php echo "$_POST[ciudad]" ?>";
		
		var datos='tipo='+1+'&fecha_1='+fecha_1+'&fecha_2='+fecha_2+'&ciudad='+ciudad;
		
		$.colorbox({
          iframe:true, 
          width:"100%", 
          height:"100%",
		  href:'includes/php/excel_dash.php?'+datos,
          overlayClose:false,
          //escKey:
          });
	});
	

    'use strict';


});


  
</script>         