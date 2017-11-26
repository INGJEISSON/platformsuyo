 <?php
//Busco los ficheros en formato json.
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
      
       $sql="SELECT * FROM `call_center_grab` where fecha_llamada_1='9/27/2017' and estado='call'  order by fecha_llamada desc ";
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
       <strong>LLAMADAS GRABADAS</strong>
     </center>
  </p>
  <div class="card-header d-flex align-items-center">
   <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="2%">#</th>
                <th width="6%">Usuario Call center</th>
                <th width="11%">Número de teléfono</th>
                <th width="7%">Fecha de la llamada</th>
                <th width="9%">Reproducir</th>
                <th width="11%">Retroalimentación</th>
            </tr>
        </thead>
        <tbody>
         <?php
                $i=1;
                while($datos=mysql_fetch_assoc($query)){
			

                    ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $datos['nom_call'] ?></td>
                <td><?php echo $datos['telefono']; ?></td>
                <td><?php echo $datos['fecha_llamada'] ?></td>
                <td><!--<iframe src="includes/php/subir_archivo2.php?id=<?php echo $datos['id'] ?>" scrolling="no" height="100" width="300" />-->
    
   <audio src="includes/files/llamadas_call/<?php echo $datos['ruta'] ?>" controls>
<p>Tu navegador no implementa el elemento audio</p>
</audio></td>
                <td><a href="includes/php/retroalim_call.php?nom_call=<?php echo $datos['nom_call']; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' alt="" width="24" height="24"></a></td>
               </tr>
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