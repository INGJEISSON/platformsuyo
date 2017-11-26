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
function updatePublicFolder($service, $folderName,$fileId) {//function for create a new folder

  $file = $service->files->get($fileId);
  $file->setTitle($folderName);
  $file->setMimeType('application/vnd.google-apps.folder');

 $createdFile=$service->files->delete($fileId);

  return $createdFile;
}
try {


$root_id='1vQQPjyuBsO7kFDxUw46stbLNQMKaC11Y';

$service=buildService();
$NewfolderName="Jei_prueba_update2";
$id=updatePublicFolder($service, $NewfolderName,$root_id);
  } catch (Exception $e) {
  print "An error occurred1: " . $e->getMessage();
  }
?>
