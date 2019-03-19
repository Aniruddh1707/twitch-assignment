'use strict'

//Preloader
var preloader = $('#spinner-wrapper');
$(window).on('load', function() {
    var preloaderFadeOutTime = 500;

    function hidePreloader() {
        preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
});

jQuery(document).ready(function($) {

	if($('#hdn_streamerName').val() != ''){
			setTimeout(function(){ getinitialStream() }, 3000);
	}
    $('.btnStreamer').on('click',function(){
		var streamer_name = $('#streamer_name').val();
		$.ajax({
			url: "ajaxCall.php", 
			data:{'streamer_name':streamer_name},
			method:'POST',
			beforeSend: function() {
				$('#spinner-wrapper').show();
			},
			success: function(result){
				$('#streamerVideos').html(result);
				$('.recentArea').show();
			},
			complete: function() {
				$('#spinner-wrapper').hide();
			},
		});
	});
	
	$('.btnSetFav').on('click',function(){
		var streamer_name = $('#streamer_name').val();
		if($('#streamer_name').val() == ''){
			alert('Please search streamer to set favourite.');
			return false;
		}
		var video = "<iframe src='https://player.twitch.tv/?channel="+streamer_name+"' frameborder='0' allowfullscreen='true' scrolling='no' height='378' width='500'></iframe>";
		var chat = "<iframe src='https://www.twitch.tv/embed/"+streamer_name+"/chat' frameborder='0' scrolling='no' height='500' width='350'></iframe>";
		$('.media').html(video);
		$('.suggestions').html(chat);
	});
});

function getinitialStream(){
	if($('#hdn_streamerName').val() != ''){
		$.ajax({
			url: "ajaxCall.php", 
			data:{'streamer_name':$('#hdn_streamerName').val()},
			method:'POST',
			beforeSend: function() {
				$('#spinner-wrapper').show();
			},
			success: function(result){
				$('#streamerVideos').html(result);
				$('.recentArea').show();
			},
			complete: function() {
				$('#spinner-wrapper').hide();
			},
		});
	}
}
