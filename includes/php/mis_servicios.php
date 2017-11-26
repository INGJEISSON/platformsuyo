<?php
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

	if($_SESSION['cod_usuario']==1)
	$sql="select * from usuarios where tipo_usuario=19 or tipo_usuario=6 or tipo_usuario=21";
	elseif($_SESSION['tipo_usuario']==6){
	$sql="select * from usuarios where tipo_usuario=21 or tipo_usuario=6";
	}
	else
	$sql="select * from usuarios where email='".$_SESSION['email']."' ";
	
	$query=mysql_query($sql); 
?>
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Mis Servicios</h2>
            </div>
 </header>
          <!-- Dashboard Counts Section-->
          
          <!-- Charts Section-->
          
          
                     <div class="card-header d-flex align-items-center">
                      <table width="813" border="0" align="center" class="table responsive">
                        <tr>
                          <td width="188">Usuario:</td>
                        </tr>
                        <tr>
                          <td><select name="select" id="email" class='form-control'>
                          <option value="">Seleccione</option>
                       <?php while($datos=mysql_fetch_assoc($query)){  ?><option value=<?= $datos['email'] ?>><?php echo $datos['email']  ?></option>							
							<?php  }  ?>           </select></td>
                        </tr>
                        <tr>
                          <td align="center"><input type="button" name="buscar"  value="Buscar "class='btn btn-primary' id="buscar"></td>
                        </tr>
                      </table>
              
                     
                    </div>

                    <img src='img/preloader.gif' id='cargando2'>
          <div id='repor'>
          	
         </div>
<script type="text/javascript">
      /*global $, document*/
$(document).ready(function () {
   
	
$("#cargando2").hide();	
	
			$("#buscar").click(function(){
            var email=$("#email").val();         

             var datos='mis_servicios='+1+'&email='+email;

                if(email!=""){
$("#cargando2").show();
                      $.ajax({

                              type: "POST",
                              data: datos,
                               url: 'includes/php/g_procesos.php',
                              success: function(valor){
                                  $("#cargando2").hide();
                                      $("#repor").html(valor);
                              }

                      });
                }else{

                    alert("Por favor seleccione asesor");
                }	


			});

});


  
</script>  