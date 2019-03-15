<?php
function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);     
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Client-ID: nmhtpm541g3et40o6bq8ks8zvaukl5','token:'.$_COOKIE['access_token']
	));

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$url = 'https://id.twitch.tv/oauth2/revoke?client_id=nmhtpm541g3et40o6bq8ks8zvaukl5&token='.$_COOKIE['access_token'];
$json_array = json_decode(file_get_contents_curl($url), true);
header("Location: login.php"); 
?>
