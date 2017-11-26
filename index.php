<?php
require_once __DIR__.'/gplus-lib/vendor/autoload.php';
const CLIENT_ID = '449674911638-afs89gdh2nf1aqoetb29g64n7ju61vrr.apps.googleusercontent.com';
const CLIENT_SECRET = 'wGp9d1IFsW4EIZ_pTkJ6Q0Nz';
const REDIRECT_URI = 'http://app.suyo.io/index.php';

session_start();

include('browser_class_inc.php');

$br = new browser();
$br->whatBrowser();
$version = $br->version;
$navegador = $br->browsertype;
$platform = $br->platform;


$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

if (isset($_REQUEST['logout'])) {
   session_unset();
}
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');
  // Get User data
  $id = $me['id'];
  $name =  $me['displayName'];
  $email =  $me['emails'][0]['value'];
  $profile_image_url = $me['image']['url'];
  $cover_image_url = $me['cover']['coverPhoto']['url'];
  $profile_url = $me['url'];
  
        //Consultamos el dato del cliente...
        
          /*  $conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
            $bd=mysql_select_db("kendraco_suyoapp");
                        
                        $sql="Select usuarios.email,tipo_usuario.tipo_usuario, usuarios.cod_estado, usuarios.cod_usuario, tipo_usuario.id_grupo from usuarios, tipo_usuario where usuarios.tipo_usuario=tipo_usuario.tipo_usuario and  usuarios.email='".$email."' ";
                        $query=mysql_query($sql);
                        $rows=mysql_num_rows($query);
                        $datos=mysql_fetch_assoc($query);
                                if($rows){
                                $_SESSION['nombre']=$name;
                                $_SESSION['email']=$email;
                                $_SESSION['tipo_usuario']=$datos['tipo_usuario']; 
                                $_SESSION['imagen']=$profile_image_url;
                                $_SESSION['cod_usuario']=$datos['cod_usuario'];
                                
                                $_SESSION['id_grupo']=$datos['id_grupo'];
                                $access=1; // Acceso permitido..
                               
                                }else
                                $access=2; // Acceso denegado*/
                                

} else {
  $authUrl = $client->createAuthUrl();
//echo "rows: ".$rows;
    
}

?>
    <?php
    if (isset($authUrl)) {
       include('login.php');
    } else {
                if($access==1) // Si es un usuario habilitado..
                include('portal.php');
                else{
                     session_unset();
                     include('login.php');
                
                    
                }
    }
    ?>