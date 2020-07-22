<?#php require_once '../../load.html';?>
<!DOCTYPE html>
<html>
<head>
	<title>
		PDF
	</title>
	<link rel="icon" href="images.png">
	<link rel="stylesheet" href="../../FF/css/foundation.min.css">
	<link rel="stylesheet" href="../../FF/foundation-icons.css">
	<style type="text/css">
	#LIST
	{
	background: rgba(0,0,0,.2);
	margin: -5px;
	padding: 2px;
	text-align: center;
	float: left;
	position: absolute;
	z-index: 1;
	list-style: none;
	}
	body
	{
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fcfff4+0,dfe5d7+40,b3bead+100;Wax+3D+%233 */
	background: #fcfff4; /* Old browsers */
	background: -moz-linear-gradient(top,  #fcfff4 0%, #dfe5d7 40%, #b3bead 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%) no-repeat border-box; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 ); /* IE6-9 */
	background-size:cover; 
	}

	</style>
	
	<script type="text/javascript" src='../../jquery-2.2.2.js'></script>
	<script type="text/javascript" src='../../FF/js/vendor/foundation.min.js'></script>
</head>

<body>
<div class="row">
	<ul class="small-2 medium-4 large-5 columns menu vertical" id="LIST">
	<?php
		$dir=($_COOKIE["FM_user"]!="root")?"../../".$_COOKIE["FM_user"]."/data/pdf/":"../../Control/data/pdf/";
		$D=scandir($dir);
		$D=array_splice($D,2);
	?>
	<?php foreach ($D as $key => $value): ?>
		<li><a class="fi-page-pdf" href="http://abdo.com/ViewerJs/#<?php echo $dir.$value ;?>"><?php echo "&nbsp;".$value ?></a></li>
	<?php endforeach ?>
	</ul>
	<iframe src=""  allowfullscreen></iframe>

	<script type="text/javascript">
	$("iframe").animate({height:$(window).height()-200,width:$(window).width()-200,margin:"100px auto"},2000,"linear");
	$("a.fi-page-pdf").click(function(e) {
		e.preventDefault();
		$("ul").fadeOut();
		$("iframe").attr("src",$(this).attr("href"));
		$("iframe").animate({height:$(window).height()-300,width:$(window).width()-100},2000,"swing");
	});
	$("iframe").mousemove(function() {
		$("ul").fadeIn();
	});
	</script>

</div>
</body>
</html>