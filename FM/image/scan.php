<?php 
$dir=$_COOKIE["FM_user"]=="root"?"../../Control/data/images/":"../../".$_COOKIE["FM_user"]."/data/images";
$rim=[];
$names=[];
$links=[];
$GIFJSONN;
$PNGJSONN;
$JPGJSONN;
$SVGJSONN;
$GIFJSONL;
$PNGJSONL;
$JPGJSONL;
$SVGJSONL;
$D=scandir($dir);
foreach (array_splice($D,2) as $key => $value) {
	if (is_dir($dir."$value")==true) {
		$D2=scandir($dir."$value");
		foreach (array_splice($D2,2)as $k => $val) {
		$rim[$key][$k]=$dir."$value/$val";	
		}
	}
		
}

foreach ($rim as $key => $value) {
	foreach ($value as $k => $val) {
		$links[$key][$k]=$val;
		$names[$key][$k]=explode("/",$val);	
		$names[$key][$k]=$names[$key][$k][count($names[$key][$k])-1];	
	}
}

$GIFJSONN=json_encode($names[1]);
$GIFJSONL=json_encode($links[1]);

$PNGJSONN=json_encode($names[3]);
$PNGJSONL=json_encode($links[3]);

$SVGJSONN=json_encode($names[4]);
$SVGJSONL=json_encode($links[4]);

$JPGJSONN=json_encode($names[2]);
$JPGJSONL=json_encode($links[2]);
$JPG=json_encode("jpg");
$SVG=json_encode("svg");
$PNG=json_encode("png");
$GIF=json_encode("gif");
$name=json_encode("names");
$link=json_encode("links");

$json="{";
$json.="$GIF:{".$name.":".$GIFJSONN.
",".$link.":".$GIFJSONL."},";
$json.="$PNG:{".$name.":".$PNGJSONN.
",".$link.":".$PNGJSONL."},";
$json.="$SVG:{".$name.":".$SVGJSONN.
",".$link.":".$SVGJSONL."},";
$json.="$JPG:{".$name.":".$JPGJSONN.
",".$link.":".$JPGJSONL."}";
$json.="}";
$handle=fopen("../IMGList.json","w+");

fwrite($handle,$json);
fclose($handle);
?>