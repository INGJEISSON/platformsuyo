<?php
require_once "google/google-api-php-client/src/Google_Client.php";
require_once "google/google-api-php-client/src/contrib/Google_DriveService.php";
require_once "google/google-api-php-client/src/contrib/Google_Oauth2Service.php";
require_once "google/vendor/autoload.php";

$conexion=mysql_connect("localhost","kendraco_suyoapp","+B{xyonCDBv.");
$bd=mysql_select_db("kendraco_suyoapp");

date_default_timezone_set('America/Bogota');
$fecha_registro=date('Y-m-d H:i:s');
$DRIVE_SCOPE = 'https://www.googleapis.com/auth/drive';
$SERVICE_ACCOUNT_EMAIL = 'suyoapp@drivesuyo.iam.gserviceaccount.com';
$SERVICE_ACCOUNT_PKCS12_FILE_PATH = 'Drivesuyo-146684739597.p12';

// Consultamos los datos del cliente..

$_GET['cod_enc_proc']=$_POST['cod_enc_proc'];

 $sql="select enc_procesadas.id_fasfield, enc_procesadas.ciudad, enc_procesadas.id_cliente, enc_procesadas.cliente, tipo_encuesta.nombre as tipo_encuesta, enc_procesadas.arch_pdf from enc_procesadas, tipo_encuesta where enc_procesadas.cod_enc_proc='".$_GET['cod_enc_proc']."' and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta ";
$query=mysql_query($sql);
$rows=mysql_num_rows($query);
    if($rows){
      $datos=mysql_fetch_assoc($query);
    
        $nom_carp_client=$datos['cliente']."-".$datos['id_cliente'];
        $ciudad=$datos['ciudad'];
        $_GET['cod_enc_proc']=$datos['id_fasfield'];

            // Buscamos la ciudad para la carpeta del cliente
        $sql2="select ruta from carp_drive where nombre='".$datos['ciudad']."' ";
        $query2=mysql_query($sql2);
        $rows2=mysql_num_rows($query2);
        
                if($rows2){
   
                    $datos2=mysql_fetch_assoc($query2);
                    $ruta_carpeta=$datos2['ruta'];
                    $separar_id=explode("/",$ruta_carpeta);
                 $ciudad_carp=$separar_id[7];

                } 
      }
      
      // Revisamos que la carpeta no est¨¦ creada....
      $sql6="select id_fasfield from est_car_client where id_fasfield='".$datos['id_fasfield']."' ";
      $query6=mysql_query($sql6);
      $rows6=mysql_num_rows($query6);
      
    if($rows6){
        echo "4"; // Carpeta ya est¨¢ creada...
        
    }else{
        
  
function buildService() {//function for first build up service
global $DRIVE_SCOPE, $SERVICE_ACCOUNT_EMAIL, $SERVICE_ACCOUNT_PKCS12_FILE_PATH;

  $key = file_get_contents($SERVICE_ACCOUNT_PKCS12_FILE_PATH);
  $auth = new Google_AssertionCredentials(
      $SERVICE_ACCOUNT_EMAIL,
      array($DRIVE_SCOPE),
      $key);
  $client = new Google_Client();
  $client->setUseObjects(true);
  $client->setAssertionCredentials($auth);
  return new Google_DriveService($client);
}
function createPublicFolder($service, $folderName,$parentId) {//function for create a publlic folder

  $file = new Google_DriveFile();
  $file->setTitle($folderName);
  $file->setMimeType('application/vnd.google-apps.folder');
    $parent = new Google_ParentReference();
    $parent->setId($parentId);
    $file->setParents(array($parent));
  $createdFile = $service->files->insert($file, array(
      'mimeType' => 'application/vnd.google-apps.folder',
  ));
  //assign the file with MIME 
  $permission = new Google_Permission();
  $permission->setValue('me');
  $permission->setType('anyone');
  $permission->setRole('writer');
  //assign the permission

 $service->permissions->insert(
      $createdFile->getId(), $permission);

  return $createdFile;
}
try {



$root_id=$ciudad_carp; // CIUDAD DE LA CARPETA DEL CLIENTE......
$service=buildService();
$limit=1;

  $folderName=utf8_encode($nom_carp_client); // Nombre de la carpeta del cliente....
  $parent=createPublicFolder($service, $folderName,$root_id);
  $id_carpet_client=$parent->getId(); // Obtengo el id de la carpeta del cliente creado...
  } catch (Exception $e) {
  print "An error occurred1: " . $e->getMessage();
  } 
  
  // Creamos las subcarpetas del cliente...  ---------------------------------------
  
  
  try {



  $root_id=$id_carpet_client; // ID DE CARPETA DE CLIENTE
  $service=buildService(); 
  $folderName='Multimedia'; // Multimedia.. 
  $parent=createPublicFolder($service, $folderName,$root_id);
  $ruta_mult=$parent->getId();

  $root_id=$id_carpet_client; // ID DE CARPETA DE CLIENTE
  $service=buildService(); 
  $folderName='Reporte de Visita'; // Reporte de Visita. 
  $parent=createPublicFolder($service, $folderName,$root_id);
  $ruta_vist=$parent->getId();   

  } catch (Exception $e) {
  print "An error occurred1: " . $e->getMessage();
  }
  
  
//Ahora insertamos el diagnÃ³stico (pdf).

  // -----------------------------------------------------------------------------------------------------------------------------------------------



 function insertFile($service, $title, $description, $parentId, $mimeType, $filename) { // Insertamos el archivo...
 
  $file = new Google_DriveFile();
  $file->setTitle($title);
  $file->setDescription($description);
  $file->setMimeType($mimeType);

  // Set the parent folder.
  if ($parentId != null) {
    $parent = new Google_ParentReference();
    $parent->setId($parentId);
    $file->setParents(array($parent));
  }

  try {
    $data = file_get_contents($filename);

    $createdFile = $service->files->insert($file, array(
      'data' => $data,
      'mimeType' => $mimeType,
    ));


//set the file with MIME
$permission = new Google_Permission();
$permission->setRole( 'writer' );
$permission->setType( 'anyone' );
$permission->setValue( 'me' );
$service->permissions->insert( $createdFile->getId(), $permission );

//insert permission for the file


    
    return $createdFile;
  } catch (Exception $e) {
print "An error occurred1: " . $e->getMessage();
  }
}   



// BUscamos los archivos  del directorio original
 $dir_origin=$datos['tipo_encuesta']."/procesados/".$_GET['cod_enc_proc'];
 // $directorio="../suyoapp/".$dir_origin; // Obtengo el directorio original...
  $directorio="../fastfield/".$dir_origin; // Obtengo el directorio original.....
  
  
                      $root_id2=$root_id; // Carpeta creada del cliente...
                      $service=buildService();
                      $title="Encuesta DiagnÃ³stico";
                      $description='';
                      $parentId=$root_id2;
                      $file=$directorio."/".$datos['arch_pdf'];
                      $mimeType='application/pdf';
                      $filename=$file;
                      $parentId=insertFile($service, $title, $description, $parentId, $mimeType, $filename);
                      
         // Insertamos rutas de carpetas del drive de (Multimedia y del reporte de visita).
        
    $insert="insert into est_car_client (id_fasfield, ruta_drive, multimedia, repor_visita) values('".$_GET['cod_enc_proc']."', '".$root_id."', '".$ruta_mult."', '".$ruta_vist."')";
    $query=mysql_query($insert);
            if($query)
            echo "1";
            else
            echo "2";
    }


?>