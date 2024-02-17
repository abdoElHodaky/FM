var xhr=new XMLHttpRequest();
var video=document.querySelector("video");
video.controls=true;
	$("tr[style='color:rgb(0,50,100)'] a , tr[style='color:rgb(200,10,10)'] a").click(function(event) {
		event.preventDefault();
		var id=$(this).index("a");
		xhr.open("GET",this.href,"true");
		xhr.responseType="blob";
		xhr.onload=function(event) {
			video.src=URL.createObjectURL(event.target.response);
		}
		xhr.send();	
	});
	$(".fi-play").click(function() {
		var id=$(this).index("button");
		if (video.paused==true) {
			video.play();
			$("button").eq(id).removeClass("fi-play").addClass("fi-pause");
		}
		else{
			video.pause();
			$("button").eq(id).removeClass("fi-pause").addClass("fi-play");
		}
		video.onended=function() {
			$("button").eq(id).removeClass("fi-pause").addClass("fi-play");
		}
		video.onplaying=function() {$("button").eq(id).removeClass("fi-play").addClass("fi-pause");};
		video.onpause=function() {$("button").eq(id).removeClass("fi-pause").addClass("fi-play");};

	});