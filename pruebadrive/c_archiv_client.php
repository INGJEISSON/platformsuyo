<?php
session_start();
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

$_GET['cod_enc_proc']=$_POST['id_fasfield'];

// Buscamos la id de la carpeta diagnósticos y reporte de visita...
$sql="select enc_procesadas.id_fasfield, enc_procesadas.ciudad, enc_procesadas.id_cliente, enc_procesadas.cliente, tipo_encuesta.nombre as tipo_encuesta, enc_procesadas.arch_pdf from enc_procesadas, tipo_encuesta where enc_procesadas.cod_enc_proc='".$_GET['cod_enc_proc']."' and enc_procesadas.tipo_encuesta=tipo_encuesta.tipo_encuesta ";
 $query=mysql_query($sql);
 $rows=mysql_num_rows($query);
    if($rows){
        $datos=mysql_fetch_assoc($query);
                    
                     $sql="select * from est_car_client where id_fasfield='".$datos['id_fasfield']."' ";
                     $query=mysql_query($sql);
                     $rows=mysql_num_rows($query);
                        if($rows){
                            $datos2=mysql_fetch_assoc($query);
                            $ruta_mult=$datos2['multimedia'];
                            $repor_visit=$datos2['repor_visita'];
                          }
                    
      }








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
 // -----------------------------------------------------------------------------------------------------------------------------------------------
  //Ahora insertamos los archivos ..

  // -----------------------------------------------------------------------------------------------------------------------------------------------


  function tipo_archivo($archivo){
    
    $mime_types = array(

            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'php' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
            'swf' => 'application/x-shockwave-flash',
            'flv' => 'video/x-flv',

            // imagenes
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml',

            // archivos
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',

            // audio/video
            'mp3' => 'audio/mpeg',
            'mp4' => 'video/mp4',
            'qt' => 'video/quicktime',
            'mov' => 'video/quicktime',
            '3gp' => 'video/3gpp',

            // adobe
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/postscript',
            'eps' => 'application/postscript',
            'ps' => 'application/postscript',

            // ms office
            'doc' => 'application/msword',
            'docx' => 'application/msword',
            'rtf' => 'application/rtf',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',
            'pptx' => 'application/vnd.ms-powerpoint',

            // open office
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        );

        $ext = strtolower(array_pop(explode('.',$archivo)));
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME);
            $mimetype = finfo_file($finfo, $archivo);
            finfo_close($finfo);
            return $mimetype;
        }
        else {
            return 'application/octet-stream';
        }
     
 }


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
 $dir_origin=$datos['tipo_encuesta']."/procesados/".$datos['id_fasfield'];
 $directorio="../fastfield/".$dir_origin; // Obtengo el directorio original....

 $root_id2=$ruta_mult; // Carpeta creada del cliente...
 $service=buildService();
 $title=$_POST['nom_archivo'];
 $description='';
 $parentId=$root_id2;
 $file=$directorio."/".$_POST['nom_archivo'];
 $explode=explode("/",$file);
 $explode[1]; $mimeType=tipo_archivo($explode[1]);  //$mimeType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; 
 $filename=$file;
 $parentId=insertFile($service, $title, $description, $parentId, $mimeType, $filename);
        
        if(!empty($parentId)){
            
            //echo "Archivos cargados: ".$_SESSION['arch_cargados'];
        
           if($_SESSION['arch_cargados']<$_POST['total_arch']){
               echo $_SESSION['arch_cargados']=$_SESSION['arch_cargados']+1;
                  
              }else{
               $update="update enc_procesadas set cod_estado=2, fecha_fin_registro='".$fecha_registro."' where id_fasfield='".$datos['id_fasfield']."'  ";
           $query_insert2=mysql_query($update);
                  
              }
           
        }
        
      
?>