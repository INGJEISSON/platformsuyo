<?php
//Busco los ficheros en formato json.
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
$cod_resp=base64_decode($_GET['cod_resp']);
		        if($cod_resp){
		          //  $parametro="serv_cliente.cod_usu_resp='".$cod_resp."' and ";
		            $parametro="";
		        }else
		        $parametro="";
										
					//$parametro='AgendaCallCenter';	 // Si son llamadas s贸lo para call center.				
$sql="select distinct  serv_cliente.cod_usu_resp, serv_cliente.id_serv_cliente, servicios.nom_servicio, acuer_pago.descripcion as acuer_pago, serv_cliente.porc_pagado, serv_cliente.valor, estado.descripcion as estado from acuer_pago, servicios, estado, serv_cliente where $parametro servicios.cod_servicio=serv_cliente.cod_servicio  and acuer_pago.cod_acuer_pago=serv_cliente.cod_fase_pago and estado.cod_estado=serv_cliente.cod_estado_caso and serv_cliente.cod_cliente='".$_GET['cod_cliente']."' and serv_cliente.cod_estado_caso=23   ";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);
$sql2="select * from cliente where  cod_cliente='".$_GET['cod_cliente']."' ";
$query2=mysql_query($sql2);
$datos2=mysql_fetch_assoc($query2);


        

?>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>


<script>
  $(document).ready(function(){
        
        $(".edicion").colorbox({
          iframe:false, 
          width:"100%", 
          height:"100%",
          overlayClose:false,
          //escKey:
          });
          
          
  });
</script>


  <p>
     <center>
       <strong>SERVICIOS DEL CLIENTE: <?php utf8_encode($datos2['nombre']) ?> </strong>
     </center>
  </p>
 <div class="card-header d-flex-fluid">
    <table id="table_id2" class='table responsive' cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="3%">#</th>
          <th>Servicio</th>
          <th>Fase (Acuerdo al pago)</th>
          <th>% Pagado</th>
          <th>Costo</th>
          <th >Ver Cuotas</th>
          <th>Estado</th>
          <th>Última Actuación</th>
          <th>Fecha  actuación</th>
          <th>Seguimiento</th>
        </tr>
      </thead>
      <tbody>
      <?php
	  $i=1;
	   while($datos=mysql_fetch_assoc($query)){ 
	       
	        $sql11="select usuarios.nombre as usuario, activ_serv.observacion, activ_serv.fecha_actividad, activ_serv.fecha_registro, etapa_activ.descripcion as etapa, activi_etapa.descripcion as actividad from usuarios, etapa_activ, activ_serv, activi_etapa where usuarios.cod_usuario=activ_serv.cod_usu_respon and etapa_activ.cod_etapa=activi_etapa.cod_etapa and activ_serv.cod_activi_etapa=activi_etapa.cod_activi_etapa and activ_serv.id_serv_cliente='".$datos['id_serv_cliente']."' order by activ_serv.id_activi_serv desc limit 0,1 ";
    $query11=mysql_query($sql11);
    @$datos11=mysql_fetch_assoc($query11);
    
	   
	   ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td width="5%"><?php echo utf8_encode($datos['nom_servicio']); ?></td>
          <td><?php echo utf8_encode($datos['acuer_pago']); ?></td>
          <td><?php echo $datos['porc_pagado']; ?>%</td>
          <td><?php echo number_format($datos['valor']); ?></td>
          <td><a href="includes/php/ver_cuotas.php?cod_cliente=<?php echo $_GET['cod_cliente']; ?>" tittle='Ver cuotas' target='_blank'><img src='img/edit.png' alt="" width="24" height="24"></a></td>
          <td><?php echo $datos['estado']; ?></td>
          <td style="alignment-adjust:auto"><?php echo utf8_encode($datos11['etapa'].": ".$datos11['actividad']); ?></td>
          <td><?php echo $datos11['fecha_actividad']; ?></td>
          <td><?  if(($cod_resp==$datos['cod_usu_resp']) or $_SESSION['tipo_usuario']==1){ ?><a href="includes/php/segui_serv.php?nom_servicio=<?php echo base64_encode(utf8_encode($datos['nom_servicio'])); ?>&id_serv_cliente=<?php echo base64_encode($datos['id_serv_cliente']); ?>" tittle='Seguimiento' target='_blank'><img src='img/edit.png' width="24" height="24"></a><?php } ?></td>
           </tr>
          <?php 
          
          
		  		$i++;		  
		  }  ?>
      </tbody>
    </table>
  </div>         
 <script type="text/javascript">
    
$(document).ready(function () {
 $('#table_id2').DataTable();
    
});
</script>