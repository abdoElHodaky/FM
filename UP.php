<!DOCTYPE html>
<html>
<head>
		<title>Upload your files</title>
	<link rel="icon" href="../upload-xxl.png">
	<link rel="stylesheet" href="FF/css/foundation.min.css">
	<script type="text/javascript" src="jquery-2.2.2.js"></script>
	<script type="text/javascript" src="FF/js/vendor/foundation.min.js"></script>
</head>
<body>
<form action="UP.php" enctype="multipart/form-data" method="post">
	<input type="file" name="File[]" multiple >
	<input type="submit" value="Upload">
</form>
	
</body>
</html>
<?php
	function _Do($source,$des)
	{
		file_put_contents($des, file_get_contents($source));
		return unlink($source);
	}
	error_reporting(E_ERROR);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$_dir=($_COOKIE["FM_user"]!="root")?"../".$_COOKIE["FM"]:"../Control";
	mkdir($_dir."/data");
	$files=$_FILES["File"];
	$filetypes=$files["type"];
	$names=$files["name"];$success;
	$tmp_names=$files["tmp_name"];
	$accespts=["video"=>
	array("video/flv","video/mkv","video/mp4","video/avi","application/x-shockwave-flash","video/webm",'video/ogg','video/wmv'),
	"image"=>
	array("image/svg+xml","image/jpeg","image/jpg","image/png","image/bmp","image/tiff"),
	"audio"=>
	array("audio/mpeg","audio/flac","audio/wma"),
	"archive"=>
	array("archive/rar","archive/rar5","archive/zip")
	,"docs"=>array("application/pdf")];
	$dirs=["$_dir/data/images/","$_dir/data/media/",
	"$_dir/data/images/png/","$_dir/data/images/bmp/",
	"$_dir/data/images/jpeg/","$_dir/data/images/svg/",
	"$_dir/data/images/gif/",
	"$_dir/data/images/tiff/","$_dir/data/media/flv/",
	"$_dir/data/media/flac/","$_dir/data/media/mp4/",
	"$_dir/data/media/mp3/","$_dir/data/media/avi/",
	"$_dir/data/media/mkv/","$_dir/data/media/swf/",
	"$_dir/data/media/webm/","$_dir/data/media/ogg/",
	"$_dir/data/media/wmv/","$_dir/data/media/wma/",
	"$_dir/data/archive/","$_dir/data/pdf/"
	];
	$rdirs=array(
	"image"=>
	array(
	"png"=>"$_dir/data/images/png/",
	"bmp"=>"$_dir/data/images/bmp/",
	"jpeg"=>"$_dir/data/images/jpeg/",
	"svg"=>"$_dir/data/images/svg/",
	"png"=>"$_dir/data/images/gif/",
	"tiff"=>"$_dir/data/images/tiff/"),
	###########################################
	"video"=>array(
	"flv"=>"$_dir/data/media/flv/",
	"mp4"=>"$_dir/data/media/mp4/",
	"avi"=>"$_dir/data/media/avi/",
	"mkv"=>"$_dir/data/media/mkv/",
	"webm"=>"$_dir/data/media/webm/",
	"ogg"=>"$_dir/data/media/ogg/",
	"wmv"=>"$_dir/data/media/wmv/"),
	##############################################
	"audio"=>array(
	"flac"=>"$_dir/data/media/flac/",
	"mpeg"=>"$_dir/data/media/mp3/",
	"wma"=>"$_dir/data/media/wma/"),
	"application"=>array(
	"pdf"=>"$_dir/data/pdf/",
	"swf"=>"$_dir/data/media/swf/"),NULL
	##############################################
	);
	$sucess;
	foreach ($dirs as $dir => $value) {
		mkdir($value);
	}
	for ($i=0; $i < count($files) ; $i++) { 
		if (count(explode('.',$names[$i]))==2) {
		_Do($tmp_names[$i],"$_dir/data/".$names[$i]);
		$typep=NULL;
		preg_replace("[/]"," ",$filetypes[$i]);
		preg_match_all("([a-z]+)",$filetypes[$i],$typep);
		$type=[$typep[0][0],$typep[0][1],$filetypes[$i]];
		assert($accespts[$type[0]]==$filetypes[$i]);
		$source="$_dir/data/$names[$i]";
		$des=$rdirs[$type[0]][$type[1]]."$names[$i]";
		rename($source, $des);
		$url=rawurlencode($SQL->real_escape_string($des));
		$name=$SQL->real_escape_string(filter_var($names[$i],FILTER_SANITIZE_STRING));
		$type=mime_content_type($des);
		$Upload_Date=gmdate("y/m/d h:m:s");
		}
		else{break;exit();}
	}
}
else{exit();}

?>