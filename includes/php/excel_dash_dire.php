<?php
header("Content-Type: application/vnd.ms-excel");
header("content-disposition: attachment;filename=reporte_dashboard.xls");
$prospectos=$_GET['prospectos'];
$n_pros_nom=$_GET['n_pros_nom'];
$gratuito=$_GET['gratuito'];
$vendidos=$_GET['vendidos'];
$datos71['valor']=$_GET['valor'];
$entr_diag=$_GET['entr_diag'];
$tom_servsi=$_GET['tom_servsi'];
$valor_serv=$_GET['valor_serv'];
$recaudo_cuotas=$_GET['recaudo_cuotas'];
$tom_servno=$_GET['tom_servno'];
$tom_servpendventa=$_GET['tom_servpendventa'];
$tom_servnoviable=$_GET['tom_servnoviable'];
$r1=$_GET['r1'];
$r2=$_GET['r2'];
$r3=$_GET['r3'];
$r4=$_GET['r4'];
$_POST['ciudad']=$_GET['ciudad'];
$_POST['fecha_1']=$_GET['fecha_1'];
$_POST['fecha_2']=$_GET['fecha_2'];
?>
<body>
	<table width="200" border="0">
	  <tr>
	    <td width="84">Ciudad:</td>
	    <td width="106"><?php echo $_POST['ciudad'] ?></td>
      </tr>
	  <tr>
	    <td>Fecha inicio:</td>
	    <td><?php echo $_POST['fecha_1'] ?></td>
      </tr>
	  <tr>
	    <td>Fecha final:</td>
	    <td><?php echo $_POST['fecha_2'] ?></td>
      </tr>
</table>
	<table width="117" border="1" cellpadding="0" cellspacing="0" class="table">
                              <tr align="center">
                                <td height="28" colspan="2" bgcolor="#0099FF" style="color:#FFF"><strong>Prospectos</strong></td>
                              </tr>
                              <tr style="font-size:12px" align="center">
                                <td width="105" height="28"><strong>Encuesta Propectos</strong></td>
                                <td width="142"> <strong>Encuesta Promotor</strong></td>
                          </tr>
                              <tr  style="font-size:16px;" align="center">
                                <td><?php echo $prospectos ?></td>
                                <td><?php echo $n_pros_nom ?></td>
                              </tr>
                    </table> 
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
                    <table width="359" border="1" cellpadding="0" cellspacing="0" class="table">
                              <tr align="center">
                                <td width="341" height="28" colspan="4" bgcolor="#0099FF" style="color:#FFF"><strong>Valor total <?php if( $_POST['ciudad']!='Todos'){ ?> ingresado por la regional <?php }  ?> </strong></td>
                              </tr>
                              <tr  style="font-size:18px" align="center">
                                <td height="28" colspan="4"><strong>$<?php echo number_format($datos71['valor']+$recaudo_cuotas+$valor_serv) ?></strong></td>
                          </tr>
                    </table>         
<p>Informe generado desde: app.suyo.io </p>
<p> Fecha y hora de generación: <?php echo date('Y-m-d H:i:s'); ?>  </p>
</body>
</html>


