<?php
include('includes/php/conexion.php');
date_default_timezone_set('America/Bogota');
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  @$client->setAccessToken($_SESSION['access_token']);
  @$me = $plus->people->get('me');

  // Get User data
  @$id = $me['id'];
  @$name =  $me['displayName'];
  @$email =  $me['emails'][0]['value'];
  @$profile_image_url = $me['image']['url'];
  @$cover_image_url = $me['cover']['coverPhoto']['url'];
  @$profile_url = $me['url'];

     /* $sql="select * from enc_procesadas";
      $query=mysql_query($sql);
      $rows=mysql_query($query);*/

 //registro la sessión del usuario...
        @$actualizar_session="insert into sesion (cod_usuario, ip, fecha_inicio, navegador, version, plataforma, mes_inicio) values ('".$_SESSION['cod_usuario']."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d H:i:s')."',  '".$navegador."', '".$version."', '".$platform."', '".date('m')."') ";
        @$session_actualizada=mysql_query($actualizar_session);
      //  echo "algo";
}else{
   
}
?>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Suyo Colombia (Fastfield)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Suyo </span><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>SY</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications-
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red"><?php echo $rows ?></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
              Messages                        -
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                  </ul>
                </li>->
               Logout    -->
                <li class="nav-item"><a href="javascript:;" id='logout'>Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">

    
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo $_SESSION['imagen'] ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo $_SESSION['nombre'] ?></h1>
              <p><?php echo $_SESSION['email']  ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"> <a href="javascript:;" id="inicio"><i class="icon-home"></i>Inicio</a></li>

               <?php include('includes/php/menus.php') ?>

                <li><a href="#dashvariants8" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Encuestas</a>
                    <ul id="dashvariants8" class="collapse list-unstyled">
                      <li><a href="javascript:;" id="btndiagnostico">Diagnósticos</a></li>                           
                    </ul>
                </li>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
<center><img src="img/loading.gif" id="carga_modulo"></center>
         <div id='contenido'>           
         </div>

          <!-- Page Footer-->
          <footer class="main-footer" id="footer">
            <?php include('includes/html/footer.php') ?>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
   
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="js/charts-home.js"></script>
     <script src="js/push/push.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');

$(document).ready(function(){

  setInterval(refres_estado, 300000);

function refres_estado(){


  var datos='cheq_diag='+1+'&tipo_encuesta='+1;
 $.ajax({

            type: "POST",
            data: datos,
            url: 'includes/php/consultar_enc.php',
            success: function(valor){
               
                 
                 if(valor==1){
                    Push.create("Diagnósticos",{
                          body: "Tienes diagnósticos pendientes por revisar",
                          icon: 'img/suyo_colombia_img.jpg',
                          timeout: 10000 
                    });
                 }

            }
      });
    
}

            function prueba_notificacion() {
                    if (Notification) {
                    if (Notification.permission !== "granted") {
                    Notification.requestPermission()
                    }
                    var title = "Xitrus"
                    var extra = {
                    icon: "http://xitrus.es/imgs/logo_claro.png",
                    body: "Notificaci贸n de prueba en Xitrus"
                    }
                    var noti = new Notification( title, extra)
                    noti.onclick = {
                    // Al hacer click
                    }
                    noti.onclose = {
                    // Al cerrar
                    }
                    setTimeout( function() { noti.close() }, 10000)
                    }
            }
           

           $("#inicio").click(function(){

                   $('#carga_modulo').show();
                      $("#contenido").toggle();    
                          $("#contenido").empty();        
                           $("#contenido").load("includes/html/dashboard_director.php",
                            function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );                        
           });

          

            $("#logout").click(function(){
                
                var datos='logout='+1;
                     $.ajax({
            
                        type: "POST",
                        data: datos,
                        url: 'logout.php',
                        success: function(valor){
                           
                               if(valor==1)
                               parent.location='index.php';
                               else
                               alert("No se pudo cerrar sesi杌妌, contacte con el administrador");
                        }
                  });
                
            });

 $("#footer").hide();

       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/dashboard_director.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      
 $("#cr_diagnostico").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/elab_diag.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      
  });


  $("#btndiagnostico").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/diagnosticos.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      


  });
  
  $("#btnreporvisita").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/repor_visita.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      


  });

  $("#ctl_calidad").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/ctl_calidad.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      


  });

  $("#btnpruebas").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/pruebas.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      


  });
  
  $("#llamad_grabadas").click(function(){
   
 $('#carga_modulo').show();
       $("#contenido").toggle();    
                  $("#contenido").empty();        
                    $("#contenido").load("includes/html/call_grab.php",
                           function(){                                  
                              $('#carga_modulo').hide();
                              $("#contenido").show();
                               $("#footer").show();
                          }                               
                    );      


  });
  
  
 


  


});

    </script>



  </body>
</html>