<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
		{	
				$SQL=new mysqli('localhost','root','279348','__FM__');
				header("REFRESH:1");
				$U=filter_var($SQL->real_escape_string(strtolower(base64_decode($_REQUEST['FM_User']))),FILTER_SANITIZE_STRING,array("flags"=>array(FILTER_FLAG_NO_ENCODE_QUOTES, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_BACKTICK, FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH, FILTER_FLAG_ENCODE_AMP)));
				$P=filter_var($SQL->real_escape_string(strtolower(base64_decode($_REQUEST['FM_Pass']))),FILTER_SANITIZE_STRING,array("flags"=>array(FILTER_FLAG_NO_ENCODE_QUOTES, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_BACKTICK, FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH, FILTER_FLAG_ENCODE_AMP)));
				$q=$SQL->query("SELECT Name,AES_DECRYPT(Password,'$P')  FROM fm ");
				if ((empty($U)||empty($P))||(empty($U)&&empty($P))) {
						header("LOCATION:/Control/FM/");
				}
				while($R=mysqli_fetch_assoc($q)){
					$RP=$R["AES_DECRYPT(Password,'$P')"];
					$RU=$R["Name"];
					if ($RP==$P&&$U==$RU) {
						setcookie("FM_user","$RU");
						COOKIE_DIR();
					}
					else
					{
						header("REFRESH:2;url=/Control/FM/");
					}
				}
			}
			else
			{	
				if ($_COOKIE&&$_COOKIE['FM_user']) {

					COOKIE_DIR();
					echo "<script>".
				"$('.row').css('display','block');"
				."</script>";

				}
				else{
				header("LOCATION:/FM/");
					}
			}
?>