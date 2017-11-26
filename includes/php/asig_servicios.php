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
                    
$sql="select distinct cliente.cod_cliente, cliente.nombre, cliente.ciudad, tipo_cliente.descripcion as tipo_cliente, servicios.nom_servicio, serv_cliente.cod_usu_resp, serv_cliente.id_serv_cliente from cliente, serv_cliente, tipo_cliente, servicios where $parametro servicios.cod_servicio=serv_cliente.cod_servicio and cliente.tipo_cliente=tipo_cliente.tipo_cliente and cliente.cod_cliente=serv_cliente.cod_cliente and serv_cliente.cod_estado_caso=23 order by serv_cliente.cod_usu_resp=0 desc";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
          
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
    <p><strong>ASIGNACI&Oacute;N DE SERVICIOS</strong></p>  
   <div class="col-lg-6">
                  <div class="bar-chart-example card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Servicios asignados por responsable</h3>
                    </div>
                    <div class="card-body">
                      <canvas id="carga_equipo_trabajo"></canvas>
                      
                      
                    </div>
     </div>
    </div>
  </center>
  </p>
  <div class="card-header d-flex-fluid">
    <table id="table_id" class='table responsive' cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="34">#</th>
          <th width="110">Identificaci√≥n</th>
          <th width="147">Cliente</th>
          <th width="300">Servicio</th>
           <th width="300">Ciudad</th>
          <th width="129">Recepci&oacute;n</th>
          <th width="137">Asignaci&oacute;n</th>
          <th width="175">Asignado/Reasignar</th>
          <th width="74"><p>&nbsp;</p>
          <p>Confirmar</p></th>
        </tr>
      </thead>
      <tbody>
      <?php
      $i=1;
        while($datos=mysql_fetch_assoc($query)){
                              if($_SESSION['tipo_usuario']!=6)
                                $sql3="select * from usuarios where tipo_usuario=19 ";
                                else
                              $sql3="select * from usuarios where tipo_usuario=21  or tipo_usuario=6 ";
                      $query3=mysql_query($sql3);
                              
                            $sql2="select usuarios.nombre, usuarios.cod_usuario, usuarios.apellidos from serv_cliente, usuarios where serv_cliente.cod_usu_resp=usuarios.cod_usuario and  serv_cliente.id_serv_cliente='".$datos['id_serv_cliente']."' and serv_cliente.cod_estado_caso=23 and serv_cliente.cod_usu_resp='".$datos['cod_usu_resp']."'   ";
                              $query2=mysql_query($sql2);
                              $rows2=mysql_num_rows($query2);
                                  if($rows2){
                                     
                                          $datos2=mysql_fetch_assoc($query2);
                                    $estado="Asignado";

                                  }else
                                  $estado="Sin asignar";

                            // Buscamoss la fecha de asignaci®Æn: 

                                  $sql4="select fecha_filtro from asigna_serv where id_serv_cliente='".$datos['id_serv_cliente']."' order by id_asig_serv desc limit 0,1  ";
                                  $query4=mysql_query($sql4);
                                  $rows4=mysql_num_rows($query4);
                                      if($rows4){
                                        $datos4=mysql_fetch_assoc($query4);    
                                        $fecha_filtro= $datos4['fecha_filtro'];                                   
                                      }else
                                      $fecha_filtro="";
      ?>

        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $datos['cod_cliente']; ?></td>
          <td><?php echo utf8_encode($datos['nombre']); ?></td>
          <td><?php echo utf8_encode($datos['nom_servicio']); ?></td>
          <td><?php echo utf8_encode($datos['ciudad']); ?></td>
          <td><?php?></td>
          <td><?php echo $fecha_filtro; ?></td>
          <td><select name="select" id="cod_usu_resp<?php echo $i ?>">
          
            <option value="0">Sin asignar</option>
            <
                    <?php
                     
                while($datos3=mysql_fetch_assoc($query3)){  
                    
                        if($rows2){
                    
                  ?>
                   <option value="<?= $datos3['cod_usuario'] ?>"<?php if($datos3['cod_usuario']==$datos2['cod_usuario']){    ?> selected='selected' <?php } ?> > <?php echo $datos3['nombre']." ". $datos3['apellidos']?></option>
             <?php
                }else{
            ?>
            <option value="<?= $datos3['cod_usuario'] ?>"> <?php echo $datos3['nombre']." ". $datos3['apellidos']?></option>
            <?php   
                }
            }
        ?>
          </select></td>
          <td><input type="button" class="btn btn-primary" id="confir<?php echo $i ?>" name="button"  value="Confirmar"></td>       </tr>
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
                                                            alert("Ocurri®Æ un problema, comun®™cate con el administrador");

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
 
  var BARCHARTEXMPLE    = $('#carga_equipo_trabajo');
    var diag_asesor = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: '#eee'
                    }
                }]
            },
        },
        data: {
            labels: [<?php echo $nom_responsable ?>],
            datasets: [
                {
                     label: "<?php echo $_POST['fecha_1']." - ".$_POST['fecha_2'] ?>",
                    backgroundColor: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                     hoverBackgroundColo: [
                        '#F00',
                        '#090',
                        '#44b2d7',
                        '#C00',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7',
                        '#44b2d7'
                    ],

                   
                    borderWidth: 0,
                    data: [<?php echo  $carga ?>, 50, 30]
                },
               
            ]
        }
    });
 
 var equipo=19;
 
                 var datos='consul_carga_usu='+1+'&equipo='+equipo;
 $.ajax({

            type: "POST",
            data: datos,
            url: 'includes/php/g_procesos.php',
            success: function(valor){
                
               
                 
                 /*if(valor==1){
                  /*  Push.create("Diagn√≥sticos",{
                          body: "Tienes diagn√≥sticos pendientes por revisar",
                          icon: 'img/suyo_colombia_img.jpg',
                          timeout: 10000 
                    });
                 }*/

            }
      });

    
});
    </script>
  </p>
  <p>&nbsp; </p>
