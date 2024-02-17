<html>
	<head>
	<style type="text/css">

        progress::-webkit-progress-bar
        {
            background: linear-gradient(to bottom, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%);            border-radius: 10px;

        }
        progress::-webkit-progress-value
        {
          background: linear-gradient(to bottom, rgba(206,219,233,1) 0%,rgba(170,197,222,1) 0%,rgba(58,132,195,1) 49%,rgba(97,153,199,1) 50%,rgba(75,184,240,1) 50%,rgba(75,184,240,1) 50%,rgba(65,154,214,1) 50%,rgba(58,139,194,1) 100%,rgba(38,85,139,1) 100%);
          border-radius: 5px;
        }

        </style>
        <script type="text/javascript" src='../../jquery-2.2.2.js'></script>
	</head>


        
	<body>
		<form action="Themes.php" method="POST"enctype="multipart/form-data">
		<input type="file" name="Themes">
		<input type="submit" value="Import">
		</form>
		<progress value="0" min="0"></progress>
	</body>
	<script type="text/javascript">
		$("progress").css({"appearance":"none","-webkit-appearance":"none","width":"500px","height":"20px","border-radius":"10px","background":"linear-gradient(to bottom, rgba(181,189,200,1) 0%,rgba(130,140,149,1) 36%,rgba(40,52,59,1) 100%);"});

	

	$("form").submit(function(event){
		//event.preventDefault();
        var file=document.querySelector('input[type=file]').files[0];
		var data=new FormData();
		var xhr= new XMLHttpRequest();
		xhr.open("POST","Themes.php",true);
		xhr.upload.onprogress=function(e)
		{
			if (e.lengthComputable)
			{
				$("progress").attr("max",e.total);
				$("progress").val(e.loaded);
			}
		}
		xhr.send(data);
        
	});
	</script>
</html>
<?php
error_reporting(E_ERROR);
if ($_SERVER['REQUEST_METHOD']=="POST") {
$file=$_FILES['Themes'];
    mkdir("data/css");
move_uploaded_file($file["tmp_name"],"data/css/".$file["name"]);
}
?>
