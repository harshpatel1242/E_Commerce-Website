<?php

require_once 'google-api-php-client-2.4.0/vendor/autoload.php';


define('DB_HOST', 'localhost');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'register');
define('DB_USER_TBL', 'users');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
// Google API configuration
define('GOOGLE_CLIENT_ID', '150332019414-8h63otdebob2uhsgeucun4pcafdq087g.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '77bVbwmkfN8owuSW_Sfn2cUU');
define('GOOGLE_REDIRECT_URL', 'http://localhost/googlelogin/index.php');

// Start session
if(!session_id()){
    session_start();
}


require_once 'google-api-php-client-2.4.0/src/Google/Client.php';
//require_once 'google-api-php-client-2.4.0/vendor/google/apiclient-services.php';
require_once 'google-api-php-client-2.4.0/src/Google/Service.php';


 //Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
$gClient->addScope('https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email');

$google_oauthV2 = new Google_Service_Oauth2($gClient);

?>

