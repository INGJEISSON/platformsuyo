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
<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>
 <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Mis agendas</h2>
            </div>
 </header>
          <!-- Dashboard Counts Section-->
          
          <!-- Charts Section-->
          
          
                     <div class="card-header d-flex align-items-center">
                      <table width="813" border="0" align="center" class="table responsive">
                        <tr>
                          <td width="188">Asesor:</td>
                        </tr>
                        <tr>
                          <td><select name="select" id="asesor" class='form-control'>
                          <option value="">Seleccione</option>
                       <?php while($datos=mysql_fetch_assoc($query)){  ?><option value=<?= $datos['asesor'] ?>><?php echo $datos['asesor']  ?></option>							
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
            var asesor=$("#asesor").val();         

             var datos='gene_agend_asesor='+1+'&asesor='+asesor;

                if(asesor!=""){
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