<?php
require_once 'types.php';
function _Dir($maindir='')
{   $maindir=dirname(chdir($maindir));
	$result=scandir($maindir);
	foreach ($result as $key => $value) {
		if (is_dir($maindir."/".$value)) {
			$result=array_merge($result,scandir("$maindir/$value"));
		}
		
	}
	return $result;
}
echo "<pre>";
print_r(_Dir("../"));
echo "</pre>";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
if ($_COOKIE["FM_user"]=="root") {
		$dir="..".$_REQUEST["dir"];
	}	
else{
	$dir="..".$_REQUEST["dir"];
}
echo "<div class='row small-collapse medium-uncollapse'>";
echo "<div class='row small-up-4 medium-up-10 large-up-12 align-middle column'>";
echo "<div class='small-4 small-uncenterd medium-8 medium-centered large-centered large-11 '>";
echo "<table id='scan'>
<thead>
<th>Name</th>
<th>Type</th>
<th>Preview</th>
</thead>
<tbody>";
foreach (_Dir($dir) as $key => $value) {
	if (is_dir($dir."/".$value)) {
		if ($value==".."||$value==".") {
			echo "<tr class='alert callout' style='color:rgb(200,50,20)'><td><a href='$dir/$value/../../'class='fi-folder'>&nbsp;&nbsp;$value</a></td><td>DIR</td><td><a>View</a></td></tr>";
		}
		else{
		echo "<tr class='alert callout' style='color:rgb(200,50,20)'><td><a href='$dir/$value'class='fi-folder'>&nbsp;&nbsp;$value</a></td><td>DIR</td><td><a>View</a></td></tr>";
		}
	}
	else{
		
			if (mime_content_type($dir."/$value")==$types["js"]) {
				echo "<tr class='warning callout'><td><a href='$dir$value'class='flaticon-js-file-format-symbol '>&nbsp;&nbsp;$value</a></td><td>JS</td><td><a href=$dir$value>View</a></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["txt"]) {
				echo "<tr class='warning callout'><td><a href='$dir$value'class='flaticon-txt-open-file-format'>&nbsp;&nbsp;$value</a></td><td>TXT</td><td><a href=$dir$value >View</a></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["php"]) {
				echo "<tr class='success callout'><td><a href='$dir$value' target='_blank' class='flaticon-php'>&nbsp;&nbsp;$value</a></td><td>PHP</td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["jpg"]) {
				echo "<tr class='warning callout' style='color:rgba(200,0,50,.3)'><td><a href='$dir/$value'class='flaticon-jpg-compressed-image-file-extension'>&nbsp;&nbsp;$value</a></td><td>JPG</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["gif"]) {
				echo "<tr class='warning callout' style='color:rgba(20,100,5,.5)'><td><a href='$dir$value'class='flaticon-gif-image-extension'>&nbsp;&nbsp;$value</a></td><td>JPG</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["png"]) {
				echo "<tr class='warning callout' style='color:rgba(20,10,50,.7)'><td><a href='$dir$value'class='flaticon-png-file-format-symbol-variant'>&nbsp;&nbsp;$value</a></td><td>PNG</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["svg"]) {
				echo "<tr class='warning callout' style='color:rgba(0,100,5,.8)'><td><a href='$dir$value'class='flaticon-svg-open-file-format'>&nbsp;&nbsp;$value</a></td><td>SVG</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["bmp"]) {
				echo "<tr class='warning callout' style='color:rgba(0,10,50,.8)'><td><a href='$dir$value'class='flaticon-bmp-open-file-format'>&nbsp;&nbsp;$value</a></td><td>BMP</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["tiff"]) {
				echo "<tr class='warning callout' style='color:rgba(100,1,0,.5)'><td><a href='$dir$value' class='flaticon-tiff-image-extension-interface-symbol'>&nbsp;&nbsp;$value</a></td><td>BMP</td><td><img src=$dir/$value></td></tr>";
			}
			elseif (mime_content_type($dir."/$value")==$types["mp3"]) {
				echo "<tr class='warning callout' style='color:rgba(10,0,10,.5)'><td><a href='$dir$value' class='flaticon-mp3-symbol-with-disc-and-musical-note'>&nbsp;&nbsp;$value</a></td><td>MP3</td></tr>";
			}

	
	}
}
echo "<tr class='callout secondary hollow'><td><video controls></video></td></tr>";
echo "</tbody></table>";
echo "</div>";
echo "</div>";	
echo "</div>";
}
?>
<link rel="stylesheet" href="../FF/css/foundation.min.css">
<link rel="stylesheet" href="../FF/foundation-icons.css">
<script type="text/javascript" src="../jquery-2.2.2.js"></script>
<script type="text/javascript"src ="../FF/js/vendor/foundation.min.js"></script>
<link rel="stylesheet" type="text/css" href="../110943/font/flaticon.css">
<script>
$(document).foundation();
var xhr=new XMLHttpRequest();
var data=new FormData();
$("a").css({"width":"100%","height":"150%"});
$("img").css({"width":"5%","height":"5%"});
$("tr[style='color:rgba(10,0,10,.5)'] a").click(function(event) {
	event.preventDefault();
	xhr.open("GET",this.href,true);
	xhr.responseType='blob';
	xhr.send();
	xhr.onload=function(event) {
		$("video").attr("src",URL.createObjectURL(event.target.response));
	}
});


/*$(".alert a").click(function(event) {
	event.preventDefault();
	var id=$(this).index("a");
	var dir=String.toLowerCase(this.href);
	dir.split("abdo.com"||"localhost");
	dir=dir[dir.length-1];
	data.append("dir",dir);
	xhr.open("POST","scan",true);
	xhr.responseType='document';
	xhr.send(data);
	xhr.onload=function(event) {

		$(document.body).html(event.target.response.body.innerHTML);
	}
});*/
</script>