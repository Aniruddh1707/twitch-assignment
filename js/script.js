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

	setTimeout(function(){ getinitialStream() }, 3000);
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
