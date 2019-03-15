<?php
/*
Copyright 2017 Amazon.com, Inc. or its affiliates. All Rights Reserved.
Licensed under the Apache License, Version 2.0 (the "License"). You may not use this file except in compliance with the License. A copy of the License is located at
    http://aws.amazon.com/apache2.0/
or in the "license" file accompanying this file. This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
*/
require 'twitch.php';
$provider = new TwitchProvider([
    'clientId'                => 'nmhtpm541g3et40o6bq8ks8zvaukl5',     // The client ID assigned when you created your application
    'clientSecret'            => 'p3csbgo6u8ekti6ukkqz5m7hlortob', // The client secret assigned when you created your application
    'redirectUri'             => 'https://twitch-assignment.herokuapp.com/home.php',  // Your redirect URL you specified when you created your application
    'grant_type'                  => 'client_credentials',  // The scopes you would like to request,
]);
// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {
    // Fetch the authorization URL from the provider, and store state in session
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {
    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }
    exit('Invalid state');
} else {
    try {
		// Get an access token using authorization code grant.
		if(isset($_COOKIE['refresh_token'])){
			$accessToken = $provider->getAccessToken('refresh_token', [
				'refresh_token' => $_COOKIE['refresh_token']
			]);
		}else{
			$accessToken = $provider->getAccessToken('authorization_code', [
				'code' => $_GET['code']
			]);
			setcookie('refresh_token',$accessToken->getRefreshToken());
			setcookie('access_token',$accessToken->getToken());
		}
		// Using the access token, get user profile
        $resourceOwner = $provider->getResourceOwner($accessToken);
        $user = $resourceOwner->toArray();
    } catch (Exception $e) {
        exit('Caught exception: '.$e->getMessage());
    }
}
?>
