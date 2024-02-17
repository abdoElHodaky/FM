<?php
error_reporting(E_ERROR);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
function scan($maindir)
{	$files=[];
	$files=glob($maindir."/*");
	foreach ($files as $file) {
		$files=array_merge($files,scan(basename("$file/*")||basename("$maindir$file/*")||dirname("$maindir$file/*")));
	}
	return $files;
}
$uri=explode("/",$_SERVER["REQUEST_URI"]);
$action=$uri[count($uri)-2];
$user=$_COOKIE["FM_user"];
	if ($action=="show") {
			$path=urldecode($_REQUEST["path"]);
			echo "<code>";
			echo fread(fopen("..".$path,"r"), filesize("..".$path));
			echo "</code>";
		}	

	if ($action=="edit") {
		$newValue=$_REQUEST["NValue"];
		$handle;
		if ($user!="root") {
				$handle=fopen("..".$_REQUEST["vname"],"w+");
				if (fwrite($handle,$newValue)) {
					fclose($handle);
					echo "OK";
				}
			}
			else{
				$handle=fopen("../".$_REQUEST["vname"],"w+");
				if (fwrite($handle,$newValue)) {
					fclose($handle);
					echo "OK";
				}

			}
		}
	if ($action=="delete"&&$_REQUEST["delete"]==true) {
				if ($user!="root") {
					if (unlink("..".$_REQUEST["vname"])) {
						echo "OK";
					}
				}
				else{
					if (unlink("../".$_REQUEST["vname"])) {
						echo "OK";
					}
				}
			}

	if ($action=="add") {
						if ($user!="root") {
							$des="../$user/".$_REQUEST["FPath"]."/".$_REQUEST["FName"];
						assert(mime_content_type($des)=="text/plain") ;
						$handle=fopen($des,"w+");
						$content=$_REQUEST["Content"];
						if(fwrite($handle,$content)){
							fclose($handle);
							echo "OK";
						}
					}
					else{
						$handle=fopen("../".$_REQUEST["FPath"]."/".$_REQUEST["FName"],"w+");
						$content=$_REQUEST["Content"];
						if(fwrite($handle,$content)){
							fclose($handle);
							echo "OK";
						}
					}
				}
	if ($action=="download"&&$_REQUEST["download"]==true) {
							$name="../".$user."/".$name;
							header('Content-Type:'+mime_content_type($name));
							header('Content-Disposition: attachment; filename="$name"');
							echo "OK";	
				}
	if ($action="scan"&&isset($_REQUEST["VDN"])) {
		$VDN="..".$_REQUEST["VDN"];
		if ($VDN=="../") {
			$VDN="..";
		}
		if (!empty($VDN)) {
		echo "<table id='T1' class='table row'>
		<thead>
		<th>Name</th>
		<th>Type</th>
		<th>options</th>
		</thead>
		<tbody>";
		foreach (scan($VDN) as $key => $value) {
			$name=explode("/",$value);
			$name=$name[count($name)-1];
			$ext=explode(".",$name);
			$ext=$ext[count($ext)-1];
			$ext=strtolower($ext);
			if (!is_dir($value)) {
				
			
			if ($ext=="mp3") {
				echo "<tr class='callout success hollow' style='color:rgb(0,50,100)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td><td>"."<div class='Button-group menu'><button class='button fi-play'>"."</button><button class='button fi-page-delete'></button></div></td></tr>";
				}
			elseif ($ext=="mp4") {
				echo "<tr class='callout success hollow' style='color:rgb(200,10,10)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td><td><div class='Button-group menu'><button class='button fi-play'>"."</button><button class='button fi-page-delete'></button></div></td></tr>";
				}
				elseif ($ext=="mkv") {
					echo "<tr class='callout success hollow' style='color:rgb(200,10,10)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td><td><div class='Button-group menu'><button class='button fi-play'>"."</button><button class='button fi-page-delete'></button></div></td></tr>";
				}
			elseif($ext=="php"){
				echo "<tr class='callout success hollow' style='color:rgb(20,10,100)'><td><img src='php.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
			}
			elseif ($ext=="eps") {
				echo "<tr class='callout white ligthen-5 hollow' style='color:rgb(20,10,100)'><td><img src='eps.png' width='30' height='50'>$name</td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif ($ext=="psd") {
				echo "<tr class='callout green ligthen-2 hollow' style='color:rgb(20,10,100)'><td><img src='psd.png' width='30' height='50'>$name</td><td>".mime_content_type($value)."</td></tr>";
				}		
			elseif ($ext=="jpg"||$ext=="png"||$ext=="svg"||$ext=="gif") 
				{
				echo "<tr class='purple ligthen-2'><td>&nbsp;<a href='$value'>$name</a></td><td>".mime_content_type($value).'</td><td>'."<img src='$value'width='50' height='30'></td></tr>";
				}
			}
			else{
				echo "<tr><td><img src='folder.png' width='30' height='50'> <a href='$value'>$name</a></td><td>".mime_content_type($value).'</td><td></td></tr>';
			}
		}
		echo "</tbody></table>";						
		}		
	}	
	if ($action="scan"&&$_REQUEST["empty"]==true&&isset($_REQUEST["DN"])) {
		$DN="..".$_REQUEST["DN"];
		echo "<table id='T2' class='table row'>
		<thead>
		<th>Name</th>
		<th>Type</th>
		<th>options</th>
		</thead>
		<tbody>";
		foreach (scan($DN)/*scandir($path)*/ as $key => $value) {

			$name=explode("/",$value);
			$name=$name[count($name)-1];
			$ext=explode(".", $name);
			$ext=$ext[count($ext)-1];

			if (!is_dir($value)) {
				
			if ($ext=="mp3") {
				echo "<tr class='callout blue-text hollow' style='color:rgb(0,50,100)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif ($ext=="mp4") {
				echo "<tr class='callout blue-text hollow' style='color:rgb(200,10,10)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif ($ext=="mkv") {
				echo "<tr class='callout blue-text hollow' style='color:rgb(200,10,0)'><td><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}	
			elseif($ext=="php"){
				echo "<tr class='callout success hollow darken-1 lime  white-text'><td><img src='php.png' width='30' height='50'><a href='$value' target=_blank>$name</a></td><td>".mime_content_type($value)."</td></tr>";
			}	
			elseif($ext=="txt")
				{
					echo "<tr class='callout warning hollow'><td><img src='txt.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif($ext=="js"||$ext=="jsm")
				{
					echo "<tr class='callout warning hollow'><td><img src='js.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif($ext=="json")
				{
					echo "<tr class='callout warning hollow'><td><img src='json.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif($ext=="css")
				{
					echo "<tr class='callout warning hollow'><td><img src='css.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}	
				elseif($ext=="less")
				{
					echo "<tr class='callout warning hollow'><td><img src='less.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif($ext=="scss")
				{
					echo "<tr class='callout warning hollow'><td><img src='sass.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}

			elseif($ext=="gif")
				{
					echo "<tr class='callout warning hollow'><td><img src='gif.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
			elseif($ext=="png")
				{
					echo "<tr class='callout warning hollow'><td><img src='png.png'  width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif($ext=="svg")
				{
					echo "<tr class='callout warning hollow'><td><img src='svg.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif($ext=="jpg")
				{
					echo "<tr class='callout warning hollow'><td><img src='jpg.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif ($ext=="eps") {
				echo "<tr class='callout white ligthen-5 hollow' style='color:rgb(20,10,100)'><td><img src='eps.png' width='30' height='50'>$name</td><td>".mime_content_type($value)."</td></tr>";
				}
				elseif ($ext=="psd") {
				echo "<tr class='callout green ligthen-2 hollow' style='color:rgb(20,10,100)'><td><img src='psd.png' width='30' height='50'>$name</td><td>".mime_content_type($value)."</td></tr>";
				}	
				else{
					echo "<tr><td>$name</td><td>".mime_content_type($value).'</td></tr>';

				}
			}
			else{
				echo "<tr class='alert callout hollow'><td><img src='folder.png' width='30' height='50'><a href='$value'>$name</a></td><td>".mime_content_type($value).'</td></tr>';
			}
		}
		echo "</tbody></table>";						
		
	}
	unset($_REQUEST);

}
?>
<script type="text/javascript">
var xhr=new XMLHttpRequest();
var video=document.querySelector("video");
xhr.open("GET","VAList.json",true);
xhr.responseType="blob";
xhr.send();
xhr.onload=function() {
	var reader=new FileReader();
	reader.readAsText(xhr.response);
	reader.onload=function() {
		result=JSON.parse(reader.result);
		var type=$("input[name=VDN]").val().split("/");
		type=type[type.length-1];
		if (type=="mp3") {
			table(result.Audio.MP3.names,
			result.Audio.MP3.links
			);
		}
		if (type=="mp4") {
			table(result.Audio.MP4.names,
			result.Audio.MP4.links
			);
		}
		if (type=="mkv") {
			table(result.Video.MKV.names,
			result.Video.MKV.links
			);
		}

	}
}

	$("tr[style='color:rgb(0,50,100)'] a , tr[style='color:rgb(200,10,10)'] a").click(function(event) {
		video.controls=true;
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
			table(result.Audio.MP3.names,
			result.Audio.MP3.links
			);
		}
		if (type=="mp4") {
			table(result.Audio.MP4.names,
			result.Audio.MP4.links
			);
		}
		if (type=="mkv") {
			table(result.Video.MKV.names,
			result.Video.MKV.links
			);
		}

	}

});
$("#T4 tr img[src='folder.png']").siblings("a").click(function(event) {
	event.preventDefault();
	$path=this.href.split($server);
	$path=$path[$path.length-1];
	$("input[name=VDN]").val($path);
});
$("#Create").children("input[type=text]").val(null);
</script>