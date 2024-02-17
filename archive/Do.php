<?php
error_reporting(E_ERROR);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$uri=urldecode($_SERVER["REQUEST_URI"]);
	$uri=explode("/Do",$uri);
	$uri=explode("/",$uri[count($uri)-1]);
	$action=$uri[1];
	$name="";
	if (isset($uri[2])==true) {
		$name=$uri[2];
	}
	$href=$_REQUEST["path"];
	$upath=$_REQUEST["upath"];
function scan($dir)
{
	$files=[];
	$files=glob($dir."/*");
	
	foreach ($files as $key => $value) {
		if (is_dir($dir.$value)) {
			$files=array_merge($files,scan(basename("$value/*")||basename("$dir$value/*")));
		}
	}
	return $files;
}

	
	  if ($_COOKIE["FM_user"]!=="root"){
	  $path="../../".$_COOKIE["FM_user"]."/data/unpacked/" ; 
	  	if (file_exists($path)==false) {
	  		mkdir($path);
	  	}
        }
         else{
         $path="../../Control/data/unpacked/" ;
       if (file_exists($path)==false) {
	  		mkdir($path);
	  	}
		}
     
	
	if ($action=="ex") {
		$zip=new ZipArchive;
		mkdir($path."$name",true);
		
			$zip = new ZipArchive;
				$zip->open("../..$href");
				$zip->extractTo($path);
				$zip->close();
				$name=explode("/",$href);
				$name=$name[count($name)-1];
				rmdir($path."/$name");
				

	}
	$result=[];
	$results=$result;
	$spath="../..".$_REQUEST["spath"];
	if ($action=="show") {
			$result=scan(urldecode($upath));
			echo "<table id='T2'>
			<thead>
				<th>Name</th>
				<th>Type</th>
			</thead>
			<tbody>";
			foreach ($result as $key => $value) {
				$name=explode($upath."/",$value);
				$name=$name[count($name)-1];
				$zname=explode("/",$href);
				$zname=$zname[count($zname)-1];
				echo "<tr class='red accent-1'>
						<td><a href='$value'>$name</a></td>"."<td>".mime_content_type($value)."</td><td>$zname</td>
					 </tr>";
			}
			echo "</tbody></table>";
	  	}
	if ($action=="scan") {
		  	$results=scan(urldecode($spath));
		  	echo "<table id='view'>
			<thead>
				<th>Name</th>
				<th>Type</th>
			</thead>
			<tbody>";
			foreach ($results as $key => $value) {
				$name=explode("/",$value);
				$name=$name[count($name)-1];
				if (mime_content_type($value)=="text/plain") {
				echo "<tr class='blue accent-1'>
						<td><a href='$value'>$name</a></td>"."<td>".mime_content_type($value)."</td>
					 </tr>";
				}
			}
			echo "</tbody></table>";
	  	}
}
?>