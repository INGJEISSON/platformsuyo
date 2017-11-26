<?php
//Busco los ficheros en formato json.
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");
    
                    if($_POST['email']){
                        $parametro="serv_cliente.cod_usu_resp='".$datos['cod_usuario']."' and ";
                        
                        $cod_resp=base64_encode($datos['cod_usuario']);
                        
                    }
                    else
                    $parametro="";   
$sql="select  distinct cliente.cod_cliente, cliente.nombre, cliente.telefono_1, cliente.ciudad, cliente.barrio, tipo_cliente.descripcion as tipo_cliente from cliente, serv_cliente, tipo_cliente where $parametro cliente.tipo_cliente=tipo_cliente.tipo_cliente and cliente.cod_cliente=serv_cliente.cod_cliente and serv_cliente.cod_estado_caso=23 ";
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
          
        
    $('#table_id').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
          
          
  });
</script>


  <p>
     <center>
       <strong>SERVICIOS</strong>
     </center>
  </p>
  <div class="card-header d-flex-fluid">
    <table id="table_id" class='table responsive' cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="3%">#</th>
          <th width="8%">Identificación</th>
          <th width="18%">Cliente</th>
          <th width="18%">Teléfono</th>
          <th width="7%">Ciudad</th>
          <th width="9%">Barrio</th>
          <th width="7%">Tipo cliente</th>
          <th width="11%">Servicios</th>
          <th width="9%">Acción</th>
          <?php if($_SESSION['tipo_usuario']==1){ ?><th width="9%">Editar</th><?php }  ?>
        </tr>
      </thead>
      <tbody>
      <?php
      $i=1;
        while($datos=mysql_fetch_assoc($query)){
            
           $sql2="select * from serv_cliente where cod_cliente='".$datos['cod_cliente']."' and cod_estado_caso=23";
            $query2=mysql_query($sql2);
            $rows2=mysql_num_rows($query2);
      ?>

        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $datos['cod_cliente']; ?></td>
          <td><?php echo utf8_encode($datos['nombre']); ?></td>
          <td><?php echo $datos['telefono_1']; ?></td>
          <td><?php echo $datos['ciudad']; ?></td>
          <td><?php echo $datos['barrio']; ?></td>
          <td><?php echo utf8_encode($datos['tipo_cliente']); ?></td>
          <td><?php echo $rows2;  ?></td>
           <td><a href="includes/php/det_serv_client.php?cod_cliente=<?php echo $datos['cod_cliente']; ?>&cod_resp=<?php echo $cod_resp; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' width="24" height="24"></a></td> 
           <?php if($_SESSION['tipo_usuario']==1){ ?><td><a href="includes/php/edicion_usu.php?cod_cliente=<?php echo $datos['cod_cliente']; ?>&cod_resp=<?php echo $cod_resp; ?>" tittle='Revisar' class="edicion"><img src='img/edit.png' width="24" height="24"></a></td><?php }  ?>
           
                 </tr>
             </tr>
        </td>
        
        </tr>  

        <?php   
        $i++; 

           }

        ?>
      </tbody>
    </table>
  </div>         