<?php
error_reporting(E_ERROR);
$dir="../../Control/data/media/" /*"../../".$_COOKIE["FM_user"]."/data/media/"*/;
$D=scandir($dir);
$D=array_splice($D,2);
$subd=[];
$links=[];
$names=[];
$_et=[];
$mp4_names=[];
$mp3_names=[];
$mkv_names=[];
$mp4_links=[];
$mp3_links=[];
$mkv_links=[];
$json_mkv_names;
$json_mp3_names;
$json_mp4_names;
$json_mkv_links;
$json_mp3_links;
$json_mp4_links;
$json="{";
foreach ($D as $key => $value) {
    $subd[$key]=scandir($dir.$value);
    $subd[$key]=array_splice($subd[$key],2);
    foreach ($subd[$key] as $i => $val) {
        $links[$key][$i]="$dir$value/$val";
        $names[$key][$i]=explode("/",$links[$key][$i]);
        $names[$key][$i]=$names[$key][$i][count($names[$key][$i])-1];
    }
}
foreach ($names as $key => $value) {
   foreach ($value as $i => $val) {
       $_et[$key][$i]=explode(".",$val);
       $_et[$key][$i]=$_et[$key][$i][count($_et[$key][$i])-1];
       if ($_et[$key][$i]="mp4") {
            $mp4_names=$names[5];
            $json_mp4_names=json_encode($mp4_names);
            $mp4_links=$links[5];
            $json_mp4_links=json_encode($mp4_links);
       }
       if ($_et[$key][$i]="mp3") {
           $mp3_names=$names[4];
           $json_mp3_names=json_encode($mp3_names);
           $mp3_links=$links[4];
           $json_mp3_links=json_encode($mp3_links);
       }
       if ($_et[$key][$i]="mkv") {
           $mkv_names=$names[3];
           $json_mkv_names=json_encode($mkv_names);
           $mkv_links=$links[3];
           $json_mkv_links=json_encode($mkv_links);
       }
   }
}
$type=json_encode('Video');
$_type=json_encode('MKV');
$_links=json_encode('links');
$_names=json_encode('names');
$json.="$type".":"."{"."$_type".":"."{"."$_names".":".$json_mkv_names.","."$_links".":".$json_mkv_links."}";
$_type=json_encode('MP4');
$json.=","."$_type".":"."{"."$_names".":".$json_mp4_names.","."$_links".":".$json_mp4_links."}";
$json.="},";
$type=json_encode('Audio');
$_type=json_encode('MP3');
$json.="$type".":"."{"."$_type".":"."{"."$_names".":".$json_mp3_names.","."$_links".":".$json_mp3_links."}";
$json.="}";
$json.="}";
$handle=fopen("../VAList.json","w");
fwrite($handle,$json);
fclose($handle);
?>