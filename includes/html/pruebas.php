 <header class="page-header">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Diagnósticos</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Pruebas</li>
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
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Actualizar</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Información de encuesta de pruebas</h3>
                    </div>
                    <div class="card-body">
                      <table class='table responsive'>
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Asesor</th>
                            <th>Encuestado</th>
                            <th>Fecha de recepción</th>
                            <th>Fecha de revisión</th>
                            <th>Archivos</th>
                            <th>Estado</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <img src="img/loading_azul.gif" id="cargar">
                        <tbody id="list_enc">
                       
                         
                        </tbody>
                      </table>
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
$('#cargar').show();
var datos='listar='+1+'&tipo_encuesta='+4;
 $.ajax({

            type: "POST",
            data: datos,
            url: 'includes/php/consultar_enc.php',
            success: function(valor){
               
                    $("#list_enc").html(valor);
                     $('#cargar').hide();


            }
      });


/*$("#actualizar"){

}*/

     


      
    
  


});

    </script>