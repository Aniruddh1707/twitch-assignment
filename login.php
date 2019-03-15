<?php
require 'oauth.php';
?>
<!DOCTYPE html>
<html lang="en">
	<?php include 'header.php';?>
	<body>
		<!-- Landing Page Contents
		================================================= -->
		<div id="lp-register">
			<div class="container wrapper">
				<div class="row">
					<div class="col-sm-5">
						<div class="intro-texts">
							<h1 class="text-white">Don't just watch, join in</h1>
							<p>Welcome to Twitch. We are a global community of millions who come together each day to create their own entertainment: unique, live, unpredictable, never-to-be repeated experiences created by the magical interactions of the many. With chat built into every stream, you don’t just watch on Twitch, you’re a part of the show.</p>
						</div>
					</div>
					<div class="col-sm-6 col-sm-offset-1">
						<div class="reg-form-container"> 
							<!-- Register/Login Tabs-->
							<div class="reg-options">
								<ul class="nav nav-tabs">
									<li><a href="#login" data-toggle="tab">Login With Twitch</a></li>
								</ul><!--Tabs End-->
							</div>
							<div class="tab-content">
							<!--Login-->
								<div class="tab-pane active" id="login">
									<img src="img/twitch.png" alt="logo" style="width:380px;heght:250px;"/> 
									<p>&nbsp;</p>
									<center><h3>Login With Twitch</h3></center>
									<p>&nbsp;</p>
									<center><a href="<?php echo $authorizationUrl; ?>"><button class="btn btn-primary">Link Your Twitch Account</button></a></center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
</html>

