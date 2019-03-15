<?php
function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);     
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Client-ID: nmhtpm541g3et40o6bq8ks8zvaukl5'
	));

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
$html='';
$url = 'https://api.twitch.tv/kraken/channels/'.$_POST['streamer_name'].'/videos';
$json_array = json_decode(file_get_contents_curl($url), true);
if(!empty($json_array) && !isset($json_array['status'])){
	foreach($json_array['videos'] as $key => $val){
		$html.='<div class="col-md-4" style="margin-bottom:5px;"><div class="media">';
		$html.='<iframe src="https://player.twitch.tv/?channel='.$val['channel']['name'].'" frameborder="0" allowfullscreen="true" scrolling="no" height="250" width="330"></iframe></div></div>';
	}
}else{
	$html.="Invalid Streamer Name / No Record Found";
}
echo $html;die;
?>
