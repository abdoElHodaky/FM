<?php
    $exits=(isset($_COOKIE["FM_user"])==true)?true:false;
    if ($exits){require_once 'scan.php';} 
    else{header("LOCATION:../");}
?>
<html>

<head>
    <title>Image-Viewer</title>
    <link rel="icon"href="../Pictures-icon.png">
    <link rel="stylesheet" href="../../FF/foundation-icons.css">    
    <link rel="stylesheet" href="../../FF/css/foundation.min.css">
    <link rel="stylesheet" href="../../Control/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="../../jquery-2.2.2.js"></script>
    <script src="../../FF/js/vendor/foundation.min.js"></script>
    <script src="../../Control/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link  href="../../viewerjs-master/dist/viewer.css" rel="stylesheet">
<script src="../../viewerjs-master/dist/viewer.js"></script>
</head>
<header style="background:black;"></header>
<body>
<?php require_once '../../load.html';?>          
	<div class='row'>
  <ul id="images" class="menu">
  
  <?php //foreach ($links as $key => $value): ?>
      <?php //foreach ($value as $k => $val): ?>
          <!--li><img src=<?php //echo $val ?>></li-->
      <?php //endforeach ?>
  <?php //endforeach; ?>
  </ul>
</div>

</body>
<script>

var xhr=new XMLHttpRequest();
xhr.open("GET","../IMGList.json",true);
xhr.send();var links=[];
xhr.responseType="blob";var js;
xhr.onload=function() {
	var reader=new FileReader();
	reader.readAsText(xhr.response);
	reader.onload=function() {
		js=JSON.parse(reader.result);
		list(js)	
	}
}
function list(json) {
	var links=[];
	links=json["gif"]["links"].concat(json["png"]["links"],json["jpg"]["links"],json["svg"]["links"]);
	for (var i = 0; i < links.length; i++) {
		$("ul").append("<li><img src="+links[i]+"></li>");
	};
	var vs=new Viewer(document.getElementById('images'));
	$("img").css("cursor","pointer");
}

</script>
</html>