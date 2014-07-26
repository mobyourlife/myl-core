<?php

require_once "Facebook/FacebookRequest.php";
require_once "Facebook/FacebookResponse.php";
require_once "Facebook/FacebookSession.php";
require_once "Facebook/FacebookSignedRequestFromInputHelper.php";
require_once "Facebook/FacebookJavaScriptLoginHelper.php";
require_once "Facebook/Entities/AccessToken.php";
require_once "Facebook/Entities/SignedRequest.php";
require_once "Facebook/FacebookSDKException.php";
require_once "Facebook/FacebookRequestException.php";
require_once "Facebook/FacebookAuthorizationException.php";
require_once "Facebook/HttpClients/FacebookCurl.php";
require_once "Facebook/HttpClients/FacebookHttpable.php";
require_once "Facebook/HttpClients/FacebookCurlHttpClient.php";
require_once "Facebook/GraphObject.php";
require_once "Facebook/GraphSessionInfo.php";

use Facebook\FacebookRequest;
use Facebook\FacebookSession;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\Entities\AccessToken;
use Facebook\FacebookSDKException;

FacebookSession::setDefaultApplication($app_id, $app_secret);

$fb_helper = new FacebookJavaScriptLoginHelper();

try
{
	$fb_session = $fb_helper->getSession();
}
catch(FacebookRequestException $ex)
{
	// When Facebook returns an error
}
catch(\Exception $ex)
{
	// When validation fails or other local issues
}

if (isset($fb_session))
{
	$request = new FacebookRequest($fb_session, 'GET', '/me');
	$response = $request->execute();
	$fb_profile = $response->getGraphObject();
}

?>
