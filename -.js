
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
function table(names,links) {

	var src=$("#VD tbody tr td").children("a");
	for (i in src) {
		src[i].innerHTML=names[i];
		src[i].href=links[i];
	}
}
var Links;var Names;
	$("#VD table").on("dragstart dragenter dragover dragleave",function(event) {event.preventDefault();})
$("#VD table").on("drop",function(event) {
	event.preventDefault();
	var data=event.originalEvent.dataTransfer;
	var src=data.files[0];var result;
	var reader=new FileReader();
	reader.readAsText(src);
	reader.onload=function(event) {
		result=JSON.parse(event.target.result);
		var type=$("input[name=VDN]").val().split("/");
		type=type[type.length-1];
		if (type=="mp3") {
			Links=result.Audio.MP3.links; 
			Names=result.Audio.MP3.names;
			table(Names,Links);
		}
		if (type=="mp4") {
			Links=result.Video.MP4.links; 
			Names=result.Video.MP4.names;
			table(Names,Links);
		}
		if (type=="mkv") {
			Links=result.Video.MKV.links; 
			Names=result.Video.MKV.names;
			table(Names,Links);
		}

	}

});