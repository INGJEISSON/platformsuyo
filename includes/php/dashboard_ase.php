<?php
session_start();
$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

	if($_SESSION['cod_usuario']==1)
	$sql="select * from ciudad_asesor ";
	else
	$sql="select * from ciudad_asesor where asesor='".$_SESSION['email']."' ";
	
	$query=mysql_query($sql); 
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="../js/datepicker-master/dist/datepicker.js"></script>
   <link rel="stylesheet" href="../js/datepicker-master/dist/datepicker.css">
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Mis encuestas</h2>
            </div>
 </header>
          <!-- Dashboard Counts Section-->
          
          <!-- Charts Section-->
          
          
                     <div class="card-header d-flex align-items-center">
                      <table width="813" border="0" align="center" class="table responsive">
                        <tr>
                          <td width="188">Asesor:</td>
                          <td width="214">Fecha inicial:</td>
                          <td width="193">Fecha final:</td>
                        </tr>
                        <tr>
                          <td><select name="select" id="asesor" class='form-control'>
                       <?php while($datos=mysql_fetch_assoc($query)){  ?><option value=<?= $datos['asesor'] ?>><?php echo $datos['asesor']  ?></option>							
							<?php  }  ?>           </select></td>
                          <td><input type="text" name="textfield" readonly='readonly' class='form-control' id="fecha_1"></td>
                          <td><input type="text" name="textfield2" readonly='readonly' class='form-control' id="fecha_2"></td>
                        </tr>
                        <tr>
                          <td colspan="3" align="center"><input type="button" name="buscar"  value="Buscar "class='btn btn-primary' id="buscar"></td>
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
            var asesor=$("#asesor").val();         

             var datos='gene_dash_asesor='+1+'&fecha_1='+fecha_1+'&fecha_2='+fecha_2+'&asesor='+asesor;

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