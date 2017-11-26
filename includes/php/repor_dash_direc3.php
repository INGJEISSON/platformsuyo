
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
                                <td>$<?php echo number_format($datos71['valor']); ?></td>                               
                                <td><?php echo $entr_diag; ?></td>
                              </tr>
                    </table>                    
                  
                </div>
                
                  <div class="col-xl-12 col-sm-12">
                
               
                    	<table width="292" border="1" cellpadding="0" cellspacing="0" class="table responsive">
                              <tr align="center">
                                <td height="28" colspan="6" bgcolor="#0099FF" style="color:#FFF"><strong>Servicios</strong></td>
                              </tr>
                              <tr style="font-size:12px" align="center">
                                <td width="50" height="28"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Vendidos</strong></div>
                                      <div class="brand-text brand-small"><strong>Vend</strong></div></strong></td>
                                <td width="90"> <div class="brand-text brand-big hidden-lg-down"><strong>Valor ingresado</strong></div>
                                      <div class="brand-text brand-small"><strong>V.Ingreso</strong></div></strong></td>
                                <td width="86"><strong><div class="brand-text brand-big hidden-lg-down"><strong>Valor ingresado por recaudo</strong></div>
                                      <div class="brand-text brand-small"><strong>V.IngRec</strong></div></td>
                                <td width="56"><div class="brand-text brand-big hidden-lg-down"><strong>NO vendidos</strong></div>
                                      <div class="brand-text brand-small"><strong>NOvend</strong></div></td>
                                <td width="56"><div class="brand-text brand-big hidden-lg-down"><strong>Pendientes por venta</strong></div>
                                <div class="brand-text brand-small"><strong>PenVent</strong></div></td>
                                <td width="56"><div class="brand-text brand-big hidden-lg-down"><strong>NO viables</strong></div>
                                <div class="brand-text brand-small"><strong>NOviabl</strong></div></td>
                          </tr>
                              <tr style="font-size:16px" align="center">
                                <td><?php echo $tom_servsi; ?> </td>
                                <td>$<?php echo number_format($valor_serv); ?></td>
                                <td>$<?php echo number_format($recaudo_cuotas); ?></td>
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
                                <td># </td>
                                <td>#</td>
                                <td>$</td>
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
                                <td height="28" colspan="4"><strong>$<?php echo number_format($datos71['valor']+$recaudo_cuotas+$valor_serv) ?></strong></td>
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
                
                <div class="col-lg-6">
                  <div class="bar-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Prospectos por promotor</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="pros_asesor"></canvas>
                   

                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="bar-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Diagnósticos vendidos por asesor</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="diag_asesor"></canvas>
                      
                      
                    </div>
                  </div>
                </div>
           
                <!-- Pie Chart -->
                <div class="col-lg-12">
                  <div class="pie-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Razones por las cuales no se concretaron ventas de diagnósticos</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="pieChartExample" width="400" height="400"></canvas>
                    </div>
                  </div>
                </div>
                 <!-- Pie Chart -->
                <div class="col-lg-6">
                  <div class="pie-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Razones por las cuales no se vendió el servicio</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="repor_espec"></canvas>
                    </div>
                  </div>
                </div>
                <!-- Radar Chart
                <div class="col-lg-6">
                  <div class="radar-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Actividades (Asesores y Líderes)</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="act_visit2"></canvas>
                    </div>
                  </div>
                </div>
              </div>-->
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
		
		var datos='tipo='+1+'&fecha_1='+fecha_1+'&fecha_2='+fecha_2+'&ciudad='+ciudad;
		
		$.colorbox({
          iframe:true, 
          width:"100%", 
          height:"100%",
		  href:'includes/php/detalle_dash.php?'+datos,
          overlayClose:false,
          //escKey:
          });
	});
	

    'use strict';


    // ------------------------------------------------------- //
   
    var BARCHARTEXMPLE    = $('#dash_general');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: ["Prospectos", "Diagnósticos", "Act.Promotores", "Act.Asesores y Líderes"],
            datasets: [
                {
                    label: "Rango de fecha: <?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],
                   
                    borderWidth: 0,
                    data: [<?php echo $prospectos ?>, <?php echo $diagnosticos ?>, <?php echo $repor_promotores ?>, <?php echo $repor_asesores ?>, 50, 30]
                },
               
            ]
        }
    });


     // ------------------------------------------------------- //
   
    var BARCHARTEXMPLE    = $('#pros_asesor');
    var pros_asesor = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: [<?php echo $nom_asesor ?>],
            datasets: [
                {
                    label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                   
                    borderWidth: 0,
                    data: [<?php echo $prospectos_ase ?>, 50, 30]
                },
               
            ]
        }
    });



    // ------------------------------------------------------- //
   
    var BARCHARTEXMPLE    = $('#diag_asesor');
    var diag_asesor = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: [<?php echo $nom_asesor2 ?>],
            datasets: [
                {
                     label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                   
                    borderWidth: 0,
                    data: [<?php echo  $vend_ase ?>, 50, 30]
                },
               
            ]
        }
    });
	
	
	  var BARCHARTEXMPLE    = $('#noventas_diag');
    var diag_asesor = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: [<?php echo $resul_visita ?>],
            datasets: [
                {
                     label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                   
                    borderWidth: 0,
                    data: [<?php echo  $rows_resul_visit ?>, 50, 30]
                },
               
            ]
        }
    });


      // ------------------------------------------------------- //
    // Pie Chart
    // ------------------------------------------------------ //
    var PIECHARTEXMPLE    = $('#pieChartExample');
    var pieChartExample = new Chart(PIECHARTEXMPLE, {
        type: 'pie',
        data: {
            labels: [<?php echo ($resul_visita) ?>],
            datasets: [
                {
                    data: [<?php echo $rows_resul_visit ?>],
                    borderWidth: 0,
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],
                    hoverBackgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ]
                }]
            }
    });


 var BARCHARTEXMPLE    = $('#act_visit2');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
           labels: [<?php echo $tipo_visita ?>],
            datasets: [
                {
                     label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],
                   
                    borderWidth: 0,
                    data: [<?php echo $rows_tipo_visit ?>]
                },
               
            ]
        }
    });


 var BARCHARTEXMPLE    = $('#repor_espec');
    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: ["No Tomaron el servicio", "Pendientes por Venta", "No Viables"],
            datasets: [
                {
                     label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],
                   
                    borderWidth: 0,
                    data: [<?php echo  $tom_servno ?>, <?php echo $tom_servpendventa ?>, <?php echo $tom_servnoviable ?>, 50, 30]
                },
               
            ]
        }
    });




});


  
</script>         