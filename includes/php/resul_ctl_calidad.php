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

<center><button class="btn btn-primary">Enviar</button></center>
<BR>
<table class='table responsive'>
                        <thead>
                          <tr>
                            <th>Cliente</th>
                            <th>Asesor</th>
                            <th>Estado</th>
                            <th># Revisiones</th>
                            <th>Ult.FechaRev</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                       
      <tbody>
      <?php
                $i=1;
                while($datos=mysql_fetch_assoc($query)){

                         // Buscamos el nombre del cliente...
                       $sql3="select cliente, asesor from enc_procesadas where id_fasfield='".$datos['id_fasfield']."' ";
                        $query3=mysql_query($sql3);
                         $rows3=mysql_num_rows($query3);

                             if($query3)
                                  $datos3=mysql_fetch_assoc($query3);
                        // Buscamos el n��mero de revisiones.
                        $sql4="select id_fasfield from revision_diag where id_fasfield='".$datos['id_fasfield']."' ";
                        $query4=mysql_query($sql4);
                        $rows4=mysql_num_rows($query4);
                    ?>

                    <tr>                      
                     <th><?php echo $datos3['cliente'] ?></th>
                      <td><?php echo $datos3["asesor"] ?></td>
                      <td><?php echo utf8_encode($datos["estado"]) ?></td>
                      <td><?php echo $rows4; ?></td>
                      <td><?php echo $datos["fecha"] ?></td>
                      <td><a href="includes/php/revi_diag.php?id_fasfield=<?php echo $datos['id_fasfield']; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' width="24" height="24"></a></td>                     
                    </tr>
                     <?php
                  $i++;
                } 
                       ?>
                         
                        </tbody>
 </table>


