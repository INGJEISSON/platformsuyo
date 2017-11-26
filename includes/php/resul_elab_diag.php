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
                            <th>Fecha de Elab.</th>
                            <th>Fecha Final</th>
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
                       $sql4="select estado.descripcion, elab_diag.fecha_fin_registro from elab_diag, estado where elab_diag.cod_estado=estado.cod_estado and elab_diag.id_fasfield='".$datos['id_fasfield']."' ";
                        $query4=mysql_query($sql4);
                        $rows4=mysql_num_rows($query4);
                                if(!$rows4)
                                     $estado="Sin Diagnóstico";
                                else{
                                        $datos2=mysql_fetch_assoc($query4);
                                     $estado=$datos2['descripcion'];
                                }
                                    
                    ?>

                    <tr>                      
                     <th><?php echo $datos3['cliente'] ?></th>
                      <td><?php echo $datos3["asesor"] ?></td>
                      <td><?php if($estado=="Sin Diagnóstico") echo "<font color='red'>".$estado."</font>"; else echo "<font color='green'>".$estado."</font>" ?></td>
                      <td><?php echo $datos2["fecha_registro"]; ?></td>
                      <td><?php echo $datos2["fecha_fin_registro"] ?></td>
                      <td><?php if($estado!='Finalizado' or $_SESSION['tipo_usuario']==1){ ?><a href="includes/php/regi_elab_diag.php?id_fasfield=<?php echo $datos['id_fasfield']; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' width="24" height="24"></a><?php } ?></td>                     
                    </tr>
                     <?php
                  $i++;
                } 
                       ?>
                         
                        </tbody>
 </table>


