<?php
require 'oauth.php';

function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);     
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Client-ID: nmhtpm541g3et40o6bq8ks8zvaukl5','stream_type:live','limit:25'
	));

	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$url = 'https://api.twitch.tv/kraken/streams/';
$json_array = json_decode(file_get_contents_curl($url), true);
//echo '<pre>';print_r($json_array);die;
?>
<?php include 'header.php';?>
<body id="lp-register">
<div id="page-contents">
	<div class="container">
		<div class="row">
			<div class="col-md-3 static">
				<div class="profile-card">
					<?php if(!empty($user)){
						foreach($user['data'] as $key => $val){
					?>
					<img src="<?php echo $val['profile_image_url']; ?>" alt="user" class="profile-photo" />
					<h5><a href="https://www.twitch.tv/<?php echo $val['login']; ?>" class="text-white"><?php echo $val['display_name']; ?></a></h5>
					<?php } } ?>
				</div><!--profile card ends-->
				<ul class="nav-news-feed">
				  <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
				  <li><i class="icon ion-ios-people"></i><div><a href="newsfeed-people-nearby.html">People Nearby</a></div></li>
				  <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
				  <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
				  <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
				  <li><i class="icon ion-ios-videocam"></i><div><a href="logout.php">Logout</a></div></li>
				</ul><!--news-feed links ends-->
			</div>
			<div class="col-md-6">
            	<div class="media">
					<iframe src="https://player.twitch.tv/?channel=<?php echo $json_array['streams'][0]['channel']['name']; ?>" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="500"></iframe>
            	</div>
            	<div class="row">
					<p>&nbsp;</p>
					<div class="col-md-6">
						<input class="form-control" placeholder="Search Streamer Name" type="text" id="streamer_name">
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary btnStreamer">Search Streamer</button>
					</div>
				</div>
            </div>
            <div class="col-md-3 static">
            	<div class="suggestions">
					<iframe src="https://www.twitch.tv/embed/<?php echo $json_array['streams'][0]['channel']['name']; ?>/chat" frameborder="0" scrolling="no" height="500" width="350"></iframe>
            	</div>
            </div>
		</div>
		<div class="row recentArea" style="display:none;">
			<h3>Recent highlights and uploads</h3>
			<div id="streamerVideos"></div>
			<input type="hidden" id="hdn_streamerName" value="<?php echo $json_array['streams'][0]['channel']['name']; ?>"/>
		</div>
	</div>
</div>

    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
         
      	</div>
      </div>
      </footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
	
	<!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-videos.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Jul 2018 14:15:26 GMT -->
</html>
