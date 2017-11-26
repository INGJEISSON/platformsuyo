<?php
require_once "google/google-api-php-client/src/Google_Client.php";

require_once "google/google-api-php-client/src/contrib/Google_DriveService.php";

require_once "google/google-api-php-client/src/contrib/Google_Oauth2Service.php";
 
require_once "google/vendor/autoload.php";

$DRIVE_SCOPE = 'https://www.googleapis.com/auth/drive';
$SERVICE_ACCOUNT_EMAIL = 'suyoapp@drivesuyo.iam.gserviceaccount.com';
$SERVICE_ACCOUNT_PKCS12_FILE_PATH = 'Drivesuyo-146684739597.p12';

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



//$root_id='0B2gB_eOQHKNGcjAxc1pwX2dTQlE'; // ID DE CLIENTES SUYO_APP
$root_id='0B0pYNK-KD79mVUdSU3VSMDJyWkU'; // ID DE CARPETA DE CLIENTE

$service=buildService();

$limit=1;
for($i=1;$i<=$limit;$i++){
  $folderName='PruebaJei'.$i;
  $parent=createPublicFolder($service, $folderName,$root_id);
  $root_id=$parent->getId();
}


  } catch (Exception $e) {
  print "An error occurred1: " . $e->getMessage();
  }
?>