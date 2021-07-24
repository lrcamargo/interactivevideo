var video1;
var formattedHalfWay = 0;
var videoHalfWay = 0;
var a = 0;

// Escolhas
var choicePart = [];
var goodChoiceChosen = false;

// Perguntas
var questionAsked = [];

$(document).ready(function(){
	
	$.featherlight.defaults.afterClose = playPause;

	video1 = $('#video1');

	var questions = document.querySelectorAll(".question");
	for (var i = 0; i<questions.length; i++) {
		choicePart.push(questions[i].id);
		questionAsked.push(false);
		console.log(choicePart);
	}
	//console.log(questions[0].id);
	//Info
	/*$('.box1').on('click', function() {
		playPause('.persona1PopUp');
	}); 
	$('.box2').on('click', function() {
		playPause('.persona2PopUp');
	});*/ 

	//Choices
	$('.goodChoice').on('click', function() {
		goodChoiceChosen = true;
		console.log("ok");
		$.featherlight.close();
		if(questionAsked[a]){
			video1[0].play();
		}
	});
	$('.badChoice').on('click', function() {
		goodChoiceChosen = false;
		questionAsked[a-1]=false;
		$.featherlight.close();
		if(a-1==0) {
			video1[0].currentTime = 0;
		} else {
			var newTime = choicePart[a-2];
			video1[0].currentTime = newTime;
		}
		a=a-1;
		console.log(a);
	});

	//Video time
	$(video1).on('loadeddata', function() {
		videoHalfWay = Math.round(this.duration/2);
	});

	$(video1).on('timeupdate', function() {
		var currentTime = Math.round(this.currentTime);
		var durationNum = Math.round(this.duration);

		onTrackedVideo(currentTime, durationNum);

		if(currentTime == choicePart[a]) {
			if(questionAsked[a] == false) {
				questionAsked[a] = true;
				showChoiceQuestion('.question',a);
			}
		}
		
						
		//if(currentTime == badChoicePart && goodChoiceChosen == true) {
		//	video1[0].pause();
		//	video1[0].currentTime=durationNum;
		//}

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

function showChoiceQuestion(question,i) {
	video1[0].pause();
	$.featherlight($(question+'.q'+i))
	a = a+1;
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
