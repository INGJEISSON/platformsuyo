<link rel="stylesheet" href="js/colorbox-master/example1/colorbox.css" />
<script src="js/colorbox-master/jquery.colorbox-min.js"></script>

 <link href="js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <script src="js/bootstrap-datetimepicker-master/build/js/moment.js"></script>
 <script src="js/bootstrap-datetimepicker-master/build/js/transition.js"></script>
 <script src="js/bootstrap-datetimepicker-master/build/js/collapse.js"></script>
<script src="js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
 <header class="page-header"><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Call Center (LLamadas Grabadas)</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Call center</li>
            </div>
          </ul>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit" id="actualizar"> <i class="fa fa-gear"></i>Actualizar</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Información de Llamadas</h3>
                    </div>
                    <div class="card-body"> 
                    
                    <img src="img/loading_azul.gif" id="cargar">
                      <div id="list_enc"></div>
                    </div>
                  </div>
                </div>
               
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
  <script>

$(document).ready(function(){
    
	$(".edicion").colorbox({
					iframe:false, 
					width:"100%", 
					height:"100%",
					overlayClose:false,
					//escKey:
	});



                $('#datetimepicker1').datetimepicker();
     

	$("#actualizar").click(function(){


			 $.ajax({

		            type: "POST",
		            data: datos,
		            url: 'suyoapp/diagnosticos_arbol2017/procesar_arbol.php',
		            success: function(valor){


		            	var datos='listar='+1+'&tipo_encuesta='+1;
							 $.ajax({

							            type: "POST",
							            data: datos,
							            url: 'includes/php/consultar_enc.php',
							            success: function(valor){
							               
							                    $("#list_enc").html(valor);
							                     $('#cargar').hide();

							           }
						});
		               


		            }
     		});
	});
	
$('#cargar').show();
var datos='call_center='+1+'&listar_llamadas='+1;
 $.ajax({

            type: "POST",
            data: datos,
            url: 'includes/php/consultar_enc.php',
            success: function(valor){
               
                    $("#list_enc").html(valor);
                     $('#cargar').hide();


            }
      });

});

    </script>