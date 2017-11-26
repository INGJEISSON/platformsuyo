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
<table class='table responsive'>
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Asesor</th>
                            <th>Encuestado</th>
                            <th>Fecha Recepci√≥n</th>
                            <th>Fecha Revisi√≥n</th>
                            <th>Archivos</th>
                            <th>Estado</th>
                            <th>Acci®Æn</th>
                          </tr>
                        </thead>
                       
      <tbody>
      <?php
                $i=1;
                while($datos=mysql_fetch_assoc($query)){

                //  $fecha=
                  $separar_fecha=explode("T", $datos["fecha_recepcion"]);
                  $fecha1=$separar_fecha[0];

                    $separar2=explode(".",  $separar_fecha[1]);

                    $fecha_recepcion=$fecha1." ".$separar2[0];                  
                    ?>

                    <tr>                      
                     <th><?php echo $i ?></th>
                      <td><?php echo $datos["asesor"] ?></td>
                      <td><?php echo utf8_encode($datos["cliente"]) ?></td>
                      <td><?php echo $fecha_recepcion; ?></td>
                      <td><?php echo $datos["fecha_fin_registro"] ?></td>
                      <td><?php echo $datos["archivos"] ?></td>
                      <td><?php if($datos["estado"]=="Revisado") echo "<font color='green'><b>".$datos["estado"]."</font>"; 
                          else
                            echo "<font color='red'><b>".$datos["estado"]."</font>"; 

                      ?></td>
                      <td><a class="edicion" title="Editar" href="includes/php/ver_encuesta.php?id_fasfield=<?php echo $datos['id_fasfield'] ?>">Editar</a></td>

                        </tr>
                     <?php
                  $i++;
                } 
                       ?>
                         
                        </tbody>
 </table>


