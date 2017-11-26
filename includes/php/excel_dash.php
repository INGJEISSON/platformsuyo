<?php
//Busco los ficheros en formato json.
session_start();
header("Content-Type: application/vnd.ms-excel");
header("content-disposition: attachment;filename=reporte_dashboard.xls");
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
			
		/*	if($_GET['ciudad']=='Todos')  // Si son todas las ciudad
			     						$parametro='';
			     						else
			     						$parametro="enc_procesadas.ciudad='".utf8_decode($_GET['ciudad'])."' and";*/
			 
                            			if($_GET['ciudad']=='Todos')  // Si son todas las ciudad
			     						$parametro='';
			     						else if($_GET['ciudad']=='solbaq')  // Si son todas las ciudad
			     						$parametro="(enc_procesadas.ciudad='Barranquilla' or enc_procesadas.ciudad='Soledad')  and ";
			     						else
			     						$parametro="enc_procesadas.ciudad='".utf8_decode($_GET['ciudad'])."' and";
										
									if($_SESSION['tipo_usuario']==2)
$sql="select enc_procesadas.asesor, enc_procesadas.id_cliente, tipo_encuesta.nombre as encuesta, enc_procesadas.tipo_encuesta, enc_procesadas.cliente,  enc_procesadas.fecha_recepcion, enc_procesadas.fecha_fin_registro, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield from  enc_procesadas, det_repor_aseso, estado, tipo_encuesta where enc_procesadas.id_fasfield=det_repor_aseso.id_fasfield and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta and $parametro enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.fecha_filtro between '".$_GET['fecha_1']."' and '".$_GET['fecha_2']."'and enc_procesadas.tipo_encuesta=2 and (det_repor_aseso.valor>0 or det_repor_aseso.tipo_pago='Credito')  ";
			else
	$sql="select enc_procesadas.asesor, tipo_encuesta.nombre as encuesta, enc_procesadas.tipo_encuesta, enc_procesadas.cliente,  enc_procesadas.fecha_recepcion, enc_procesadas.fecha_fin_registro, enc_procesadas.archivos, estado.descripcion as estado, enc_procesadas.id_fasfield from  enc_procesadas, estado, tipo_encuesta where enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta and $parametro enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.fecha_filtro between '".$_GET['fecha_1']."' and '".$_GET['fecha_2']."'  ";
			
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);

?>

  <p>
     <center>
       <strong> INFORMACI脫N DETALLADA</strong>
     </center>
  </p>
 <div class="card-header d-flex align-items-center">
  
   <table width="306" border="0" align="center" class="table">
     <tr>
       <td width="157"><strong>Fecha inicial:</strong></td>
       <td width="191"><strong>Fecha final:</strong></td>
     </tr>
     <tr>
       <td><input type="text" name="textfield" readonly='readonly' class='form-control' value="<?php echo $_GET['fecha_1']; ?>" id="fecha_1"></td>
       <td><input type="text" name="textfield2" readonly='readonly' class='form-control' value="<?php echo $_GET['fecha_2']; ?>" id="fecha_2"></td>
     </tr>
   </table>
 </div>
 
 <div class="card-header d-flex align-items-center">
   <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="4%">#</th>
                <th width="10%">Asesor</th>
                 <th width="21%">Identificacion</th>
                <th width="21%">Cliente</th>
                <th width="9%">Tipo de Encuesta</th>
                <th width="11%">Detalle Encuesta</th>
                <th width="8%">Valor</th>
                 <th width="12%">Tomó el servicio</th>
                   <th width="12%">Estado</th>
            </tr>
        </thead>
        <tbody>
         <?php
                $i=1;
                while($datos=mysql_fetch_assoc($query)){
				if($datos['tipo_encuesta']==1)
				 $tipo_encuesta="Diagnóstico";
				 if($datos['tipo_encuesta']==2)
				 $tipo_encuesta="Asesor y Líderes";
				 if($datos['tipo_encuesta']==3)
				 $tipo_encuesta="Promotor";			
				 if($datos['tipo_encuesta']==5)
				 $tipo_encuesta="Prospectos";
                        $sql3="select id_cliente, cliente, asesor, arch_pdf from enc_procesadas where id_fasfield='".$datos['id_fasfield']."' ";
                        $query3=mysql_query($sql3);
                         $rows3=mysql_num_rows($query3);

                             if($query3){
                                  $datos3=mysql_fetch_assoc($query3);
								   $archivo_pdf=$datos3['arch_pdf']; 
							 }
							 // Buscamos informaci贸n del reporte de visita
							 
							 $sql4="select * from det_repor_aseso where id_fasfield='".$datos['id_fasfield']."' ";
							 $query4=mysql_query($sql4);
                         	 @$datos4=mysql_fetch_assoc($query4);
                         	 
                         	  $sql5="select seguimientos.fecha_registro, estado.descripcion as estado from seguimientos, estado where seguimientos.cod_estado=estado.cod_estado and  seguimientos.id_fasfield='".$datos['id_fasfield']."' and seguimientos.cod_usuario!=0 and seguimientos.cod_estado!=0 order by seguimientos.id_segui_llam desc ";
							 $query5=mysql_query($sql5);
							 $datos5=mysql_fetch_assoc($query5);

                    ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $datos3["asesor"] ?></td>
                 <td><?php echo utf8_encode($datos3['id_cliente']) ?></td>
                <td><?php echo utf8_encode($datos3['cliente']) ?></td>
                <td><?php echo($tipo_encuesta) ?></td>
                <td><?php if($datos4['resul_visita']=='') echo utf8_decode($datos4['tipo_visita']); else  echo utf8_decode($datos4['resul_visita']) ?></td>
                <td><?php echo($datos4['valor']) ?></td>
              <td><?php echo($datos4['tom_serv']) ?></td>
            <td><?php echo($datos5['estado']) ?></td></tr>
            </td>
            </tr>
             <?php
			 $i++;
           }
	  ?>
     </tbody>
    </table>
 </div>         