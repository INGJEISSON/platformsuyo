<?php
require_once "google/google-api-php-client/src/Google_Client.php";

require_once "google/google-api-php-client/src/contrib/Google_DriveService.php";

require_once "google/google-api-php-client/src/contrib/Google_Oauth2Service.php";
 
require_once "google/vendor/autoload.php";

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
function createPublicFolder($service, $folderName) {//function for create a new folder
  $file = new Google_DriveFile();
  $file->setTitle($folderName);
  $file->setMimeType('application/vnd.google-apps.folder');

  $createdFile = $service->files->insert($file, array(
      'mimeType' => 'application/vnd.google-apps.folder',
  ));

  $permission = new Google_Permission();
  $permission->setValue('jibarguen@suyo.co');
  $permission->setType('anyone');
  $permission->setRole('writer');

 $service->permissions->insert(
      $createdFile->getId(), $permission);

  return $createdFile;
}
try {

$DRIVE_SCOPE = 'https://www.googleapis.com/auth/drive';
$SERVICE_ACCOUNT_EMAIL = 'suyoapp@drivesuyo.iam.gserviceaccount.com';
$SERVICE_ACCOUNT_PKCS12_FILE_PATH = 'Drivesuyo-146684739597.p12';


$service=buildService();
$folderName='PruebaJei';
$parent=createPublicFolder($service, $folderName);
echo $parent->getId();
  } catch (Exception $e) {
  print "An error occurred1: " . $e->getMessage();
  }
?>
