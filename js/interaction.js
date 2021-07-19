var video1;
var formattedHalfWay = 0;
var videoHalfWay = 0;

// Escolhas
var choicePart = 7;
var goodChoicePart = 7;
var badChoicePart = 20;
var goodChoiceChosen = false;

// Perguntas
var question1Asked = false;

$(document).ready(function(){
	
	$.featherlight.defaults.afterClose = playPause;

	video1 = $('#video1');

	//Info
	$('.box1').on('click', function() {
		playPause('.persona1PopUp');
	}); 
	$('.box2').on('click', function() {
		playPause('.persona2PopUp');
	}); 

	//Choices
	$('.goodChoice').on('click', function() {
		goodChoiceChosen = true;
		$.featherlight.close();
		video1[0].currentTime = goodChoicePart;
	});
	$('.badChoice').on('click', function() {
		$.featherlight.close();
		video1[0].currentTime = badChoicePart;
	});

	//Video time
	$(video1).on('loadeddata', function() {
		videoHalfWay = Math.round(this.duration/2);
	});

	$(video1).on('timeupdate', function() {
		var currentTime = Math.round(this.currentTime);
		var durationNum = Math.round(this.duration);

		onTrackedVideo(currentTime, durationNum);

		if(currentTime == choicePart && question1Asked == false) {
			question1Asked = true;
			video1[0].pause();
			//showChoiceQuestion();
			$.featherlight($('.question1'));
		}
		
		if(currentTime == badChoicePart && goodChoiceChosen == true) {
			video1[0].pause();
			video1[0].currentTime=durationNum;
		}

		if(currentTime == videoHalfWay) {
			//Metade do vídeo
		}

		if(currentTime == durationNum) {
			//Fim do vídeo
		}
	});
});

function playPause(popUp) {
	if(video1[0].paused) {
		video1[0].play();
	} else {
		video1[0].pause();
		$.featherlight($(popUp));
	}
}

function showChoiceQuestion() {
	$.featherlight($('.question1'));
}

function onTrackedVideo(currentTime, duration) {
	$('.current').text(secondsToHms(currentTime));
	$('.duration').text(secondsToHms(duration));
}

function secondsToHms(d) {
	d = Number(d);
	var h = Math.floor(d / 3600);
	var m = Math.floor(d % 3600 / 60);
	var s = Math.floor(d % 3600 % 60);
	return ((h > 0 ? h + ":" + (m < 10 ? "0" : "") : "") + m + ":" + (s < 10 ? "0" : "") + s); 
}
