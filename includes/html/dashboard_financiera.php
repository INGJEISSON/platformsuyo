<?php
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="../js/datepicker-master/dist/datepicker.js"></script>
   <link rel="stylesheet" href="../js/datepicker-master/dist/datepicker.css">
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard (Financiero) </h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          
          <!-- Charts Section-->
          
          
                     <div class="card-header d-flex align-items-center">
                      <table width="813" border="0" align="center" class="table responsive">
                        <tr>
                          <td width="188">Ciudad:</td>
                          <td width="200">Tipo de informe</td>
                          <td width="214">Fecha inicial:</td>
                          <td width="193">Fecha final:</td>
                        </tr>
                        <tr>
                          <td><select name="select" id="ciudad" class='form-control'>
                            <?php if($_SESSION['tipo_usuario']==1 or  $_SESSION['tipo_usuario']==2 or  $_SESSION['tipo_usuario']==19 or  $_SESSION['tipo_usuario']==4){  ?><option value="Todos">Todos</option><?php  }  ?>
                            
                                                        <?php if($_SESSION['tipo_usuario']==1 or  $_SESSION['tipo_usuario']==2){  ?><option value="solbaq">Soledad y Barranquilla</option><?php  }  ?>
                            <?php if($_SESSION['tipo_usuario']==15 or $_SESSION['tipo_usuario']==1 or $_SESSION['tipo_usuario']==2  or $_SESSION['tipo_usuario']==11){  ?><option value="Barranquilla">Barranquilla</option><?php  }  ?>
                            <?php if($_SESSION['tipo_usuario']==16 or $_SESSION['tipo_usuario']==1 or $_SESSION['tipo_usuario']==2){  ?><option value="Bogotá">Bogotá</option><?php  }  ?>
                           <?php if($_SESSION['tipo_usuario']==14 or $_SESSION['tipo_usuario']==1 or $_SESSION['tipo_usuario']==2){  ?> <option value="Cali">Cali</option><?php  }  ?>
                            <?php if($_SESSION['tipo_usuario']==17 or $_SESSION['tipo_usuario']==1  or $_SESSION['tipo_usuario']==2){  ?><option value="Medellín">Medellín</option><?php  }  ?>
                            <?php if($_SESSION['tipo_usuario']==15 or $_SESSION['tipo_usuario']==1  or $_SESSION['tipo_usuario']==2  or $_SESSION['tipo_usuario']==11){  ?><option value="Soledad">Soledad</option><?php  }  ?>
                          </select></td>
                          <td><select name="select2" id="tipo_informe" class='form-control'>
                            <option value="1">Sin Gráficos</option>
                          </select></td>
                          <td><input type="text" name="textfield" readonly='readonly' class='form-control' id="fecha_1"></td>
                          <td><input type="text" name="textfield2" readonly='readonly' class='form-control' id="fecha_2"></td>
                        </tr>
                        <tr>
                          <td colspan="4" align="center"><input type="button" name="buscar"  value="Buscar "class='btn btn-primary' id="buscar"></td>
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
	
	$('#fecha_1').datepicker({
        autoHide: true,
        zIndex: 2048,
          format: 'yyyy-mm-dd'
      });
      
      $('#fecha_2').datepicker({
        autoHide: true,
        zIndex: 2048,
          format: 'yyyy-mm-dd'
      });
	
			$("#buscar").click(function(){


            var fecha_1=$("#fecha_1").val();
            var fecha_2=$("#fecha_2").val();
            var ciudad=$("#ciudad").val();
            var tipo_informe=$("#tipo_informe").val();

                var datos='gene_dash_direct_2='+1+'&fecha_1='+fecha_1+'&fecha_2='+fecha_2+'&ciudad='+ciudad+'&tipo_informe='+tipo_informe;

                if(fecha_1!="" && fecha_2!=""){
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

                    alert("Por favor seleccione las fechas en el cual quiere ver la información");
                }


			});

});


  
</script>  