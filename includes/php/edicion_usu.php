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
$sql="select  distinct cliente.cod_cliente, cliente.nombre, cliente.telefono_1, cliente.ciudad, cliente.barrio, tipo_cliente.descripcion as tipo_cliente from cliente, tipo_cliente where $parametro cliente.tipo_cliente=tipo_cliente.tipo_cliente  and cliente.cod_cliente='".$_GET['cod_cliente']."' ";
          $query=mysql_query($sql);
          $rows=mysql_num_rows($query);
		  $datos=mysql_fetch_assoc($query);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" href="../../js/colorbox-master/example1/colorbox.css" />
<script src="../../js/colorbox-master/jquery.colorbox-min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../../js/datepicker-master/dist/datepicker.js"></script>
<link rel="stylesheet" href="../../js/datepicker-master/dist/datepicker.css">



<script>
  $(document).ready(function(){
        
        $(".edicion").colorbox({
          iframe:false, 
          width:"100%", 
          height:"100%",
          overlayClose:false,
          //escKey:
          });
          
        $("#actualizar").click(function(){
		 var cod_cliente=$("#cod_cliente").val();
		 var cod_cliente_origin=<?php echo $datos['cod_cliente'] ?>;
		 var id_serv_cliente=<?php echo $_GET['id_serv_cliente'] ?>;
		 var cliente=$("#cliente").val();
		 var telefono1_=$("#telefono_1").val();
		 var ciudad=$("#ciudad").val();
		 var barrio=$("#barrio").val();
		 var respuesta=<?php echo $_GET['nom_estado'] ?>;
		 var tipo=2; //actualizar clientes de servicios..
		 var datos='g_actuali_cliente='+1+'&tipo='+tipo+'&cod_cliente='+cod_cliente+'&telefono_1='+telefono1_+'&ciudad='+ciudad+'&barrio='+barrio+'&cod_cliente_origin='+cod_cliente_origin+'&cliente='+cliente+'&id_serv_cliente='+id_serv_cliente+'&respuesta='+respuesta;
		 
		 if(cod_cliente!="" && cliente!=""){
		 
		 				$.ajax({
							type: "POST",
							data: datos,
							url: "g_procesos.php",
							success: function(valor){
										if(valor==1)
										alert("Información actualizada");
										else
										alert("Ocurrió un problema, por favor comunícate con el super administrador");
							}
						});
			 }else
			 alert("Por favor completa los campos con asteríscos, son obligatorios (*)");
		 
		
		});
          
          
  });
</script>


  <p>
     <center>
       <strong>ACTUALIZACIÓN DATOS DEL CLIENTE</strong>
     </center>
  </p>
  <div class="card-header"> <table width="732" border="0">
    <tr>
      <td width="136">(*) Identificación</td>
      <td width="416"><input type="text" name="cod_cliente" id="cod_cliente" class="form-control" value="<?php echo $datos['cod_cliente'] ?>">
     </td>
    </tr>
    <tr>
      <td>(*) Cliente</td>
      <td><input type="text" name="cliente" id="cliente" class="form-control" value="<?php echo $datos['nombre'] ?>"></td>
    </tr>
    <tr>
      <td>Teléfono</td>
      <td><input type="text" name="telefono_1" id="telefono_1" class="form-control" value="<?php echo $datos['telefono_1'] ?>"></td>
    </tr>
    <tr>
      <td>Ciudad</td>
      <td><input type="text" name="ciudad" id="ciudad" class="form-control" value="<?php echo $datos['ciudad'] ?>"></td>
    </tr>
    <tr>
      <td>Barrio</td>
      <td><input type="text" name="barrio" id="barrio" class="form-control" value="<?php echo $datos['barrio'] ?>"></td>
    </tr>
    <tr>
      <td>Tipo de Cliente</td>
      <td><input type="text" name="textfield6" id="textfield6" class="form-control" value="<?php echo $datos['cod_cliente'] ?>"></td>
    </tr>
  </table>
    <p>
      <input type="submit" name="button" id="actualizar" value="Actualizar" class='btn btn-primary'>    
    </p>
    <table width="378" border="0">
      <tr>
        <td width="84"><strong>Motivo</strong>:</td>
        <td width="284">Solicitud de ajuste: <?php echo $_GET['nom_estado'] ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
      
  