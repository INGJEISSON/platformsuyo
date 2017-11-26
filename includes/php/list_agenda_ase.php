<?php
//Busco los ficheros en formato json.
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
		
										
					$parametro='AgendaCallCenter';	 // Si son llamadas s贸lo para call center.								
$sql="select enc_procesadas.asesor, enc_procesadas.ciudad, enc_procesadas.tipo_agenda, tipo_encuesta.nombre as encuesta, enc_procesadas.cliente,  enc_procesadas.fecha_recepcion, enc_procesadas.Barrio,  estado.descripcion as estado, enc_procesadas.id_fasfield, enc_procesadas.telefono from  enc_procesadas, estado, tipo_encuesta where enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta and enc_procesadas.cod_estado=estado.cod_estado and enc_procesadas.tipo_encuesta=5 and enc_procesadas.tipo_agenda!='".$parametro."' and enc_procesadas.asesor='".$_POST['asesor']."'  ";
					$query=mysql_query($sql);
					$rows=mysql_num_rows($query);

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
       <strong>AGENDAMIENTOS DE VISITAS</strong>
     </center>
  </p>
  <div class="card-header d-flex align-items-center">
   <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="2%">#</th>
                <th width="6%">Asesor</th>
                <th width="11%">Nombre</th>
                <th width="7%">Ciudad</th>
                <th width="9%">Barrio</th>
                <th width="11%">Tel茅fono</th>
                <th width="12%">Estado de llamada</th>
                <th width="10%">Ultima llamada</th>
                <th width="10%">Observ</th>
                <th width="15%">Seguim.</th>
            </tr>
        </thead>
        <tbody>
         <?php
                $i=1;
                while($datos=mysql_fetch_assoc($query)){
			
				 $tipo_encuesta="Prospectos";                     
                        
						
									// BUscamos la cantidad de observaciones que tiene el prospecto
									 $sql2="select seguimientos.fecha_registro, estado.descripcion as estado from seguimientos, estado where seguimientos.cod_estado=estado.cod_estado and  seguimientos.id_fasfield='".$datos['id_fasfield']."' and seguimientos.cod_usuario!=0 and seguimientos.cod_estado!=0 order by seguimientos.id_segui_llam desc  ";
									$query2=mysql_query($sql2);
									$rows2=mysql_num_rows($query2);
									$datos2=mysql_fetch_assoc($query2);

                    ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $datos["asesor"] ?></td>
                <td><?php echo utf8_encode($datos['cliente']) ?></td>
                <td><?php echo utf8_encode($datos['ciudad']) ?></td>
                <td><?php echo utf8_encode($datos['Barrio']) ?></td>
                <td><?php echo utf8_encode($datos['telefono']) ?></td>
                <td><?php echo utf8_encode($datos2['estado']) ?></td>
                <td><?php echo utf8_encode($datos2['fecha_registro']) ?></td>
              <td><?php echo $rows2 ?></td>
               <td><a href="includes/php/revi_call.php?id_fasfield=<?php echo $datos['id_fasfield']; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' width="24" height="24"></a></td>       </tr>
             <?php
			 $i++;
           }
	  ?>
     </tbody>
    </table>
 </div>         
 <script type="text/javascript">
    
$(document).ready(function () {
 $('#table_id').DataTable();
    
});
</script>