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
                    
$sql="SELECT DISTINCT cliente.cod_cliente, cliente.ciudad, cliente.nombre, serv_cliente.id_serv_cliente, servicios.nom_servicio FROM `seguimientos`, serv_cliente, cliente, servicios where seguimientos.tipo_seguimiento=7 and serv_cliente.id_serv_cliente=seguimientos.id_fasfield and cliente.cod_cliente=serv_cliente.cod_cliente and serv_cliente.cod_servicio=servicios.cod_servicio";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          /*
    if($_SESSION['tipo_usuario']!=6)
    $sql4="select * from usuarios where  tipo_usuario=19  ";
    else
    $sql4="select * from usuarios where  tipo_usuario=21 or tipo_usuario=6  ";
                    $query4=mysql_query($sql4);
                    $rows4=mysql_num_rows($query4);
                    $i=1;
                            while($datos4=mysql_fetch_assoc($query4)){
                                        
                                 if($i==$rows4)
                                     $nom_responsable.="'".$datos4['nombre'].' '.$datos4['apellidos']."'";
                                     else
                                     $nom_responsable.="'".$datos4['nombre'].' '.$datos4['apellidos']."', ";
                                        //Buscamos la carga que tenga el usuario
                                        
                                    $sql2="select * from serv_cliente where cod_usu_resp='".$datos4['cod_usuario']."' and cod_estado_caso=23 ";
                                    $query2=mysql_query($sql2);
                                    $datos2=mysql_fetch_assoc($query2);
                                    $rows2=mysql_num_rows($query2);
                                   
                                     if($i==$rows4)
                                     $carga.="'".$rows2."'";
                                     else
                                     $carga.="'".$rows2."', ";
                                     $i++;
                            }
  */

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
    <div class="card-header d-flex-fluid">
       <b><center>SOLICITUDES DE AJUSTES (SERVICIOS)</center></b> 
    <table id="table_id" class='table responsive' cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="34">#</th>
          <th width="110">Identificación</th>
          <th width="147">Cliente</th>
          <th width="300">Servicio</th>
           <th width="300">Ciudad</th>
          <th width="129">Ajustes</th>
          <th width="129">Resueltas</th>
          <th width="129">Acción</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $i=1;
        while($datos=mysql_fetch_assoc($query)){
                             
 $sql2="select * from seguimientos where tipo_seguimiento=7 and id_fasfield='".$datos['id_serv_cliente']."' ";
                              $query2=mysql_query($sql2);
                              $rows2=mysql_num_rows($query2);
                               
      ?>

        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $datos['cod_cliente']; ?></td>
          <td><?php echo utf8_encode($datos['nombre']); ?></td>
          <td><?php echo utf8_encode($datos['nom_servicio']); ?></td>
          <td><?php echo utf8_encode($datos['ciudad']); ?></td>
          <td><?php echo  $rows2 ?></td>
           <td><?php echo  $rows2 ?></td>
          <td><p><a href="../../includes/php/revi_solicitud.php?cod_cliente=<?php echo $datos['cod_cliente'] ?>&id_serv_cliente=<?php echo $datos['id_serv_cliente'] ?>" class='edicion'>Ver solicitudes</a></p></td>       </tr>
             </tr>
        </td>
        
        </tr>  


            <script type="text/javascript">

            $(document).ready(function(){


                        $("#confir<?php echo $i ?>").click(function(){

                          var cod_usu_resp=$("#cod_usu_resp<?php echo $i ?>").val();
                          var id_serv_cliente=<?php echo $datos['id_serv_cliente'] ?>;

                              var datos='asig_servicio='+1+'&cod_usu_resp='+cod_usu_resp+'&id_serv_cliente='+id_serv_cliente;
                              
                                           $.ajax({

                                                    data: datos,
                                                    type: "POST",
                                                    url:"includes/php/g_procesos.php",
                                                    success: function(valor){
                                                        
                                                            if(valor==1)
                                                            alert("Servicio asignado correctamente");
                                                            else
                                                            alert("Ocurrió un problema, comunícate con el administrador");

                                                    }
                                            });

                        });
             });
            </script>

        <?php   
        $i++; 

           }

        ?>
      </tbody>
    </table>
  </div>         
  <p>
    <script type="text/javascript">
    
$(document).ready(function () {
 //$('#table_id').DataTable();
 
 $('#table_id').DataTable( {
    //"bJQueryUI": true,
   // scrollY: 600,
    //paging: false
} );

$(".edicion").colorbox({
          iframe:false, 
          width:"100%", 
          height:"100%",
          overlayClose:false,
          //escKey:
          });
 
 
});
    </script>
  </p>
  <p>&nbsp; </p>
