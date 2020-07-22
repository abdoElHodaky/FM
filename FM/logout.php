<html>
<title>Log out</title>
<link rel="icon" href="../Control/56805.png">
<link rel="stylesheet" href="../FF/css/foundation.min.css">
	<script type="text/javascript" src='../jquery-2.2.2.js'></script>
	<script type="text/javascript" src='../FF/js/vendor/foundation.min.js'></script>
<div class="reveal callout alert" id="Logout" data-reveal data-animation-in="spin-in" data-animation-out="spin-out">
  <h1 class="center large secondary" style="text-shadow:0px 3px 5px black ;color:aqua"><?php echo " User/Admin: ".$_COOKIE['FM_user']
  ;?> are &nbsp;Logged&nbsp; Out</h1>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</html>
<?php
error_reporting(E_ERROR);
setcookie("FM_user",$_COOKIE["FM_user"],time()-36000);
echo "<script>".'
$(document).foundation();
$("#Logout").foundation("open");
	setTimeout(function() {$("#Logout").foundation("close");},2000);'."</script>";
header("REFRESH:3;url=http://abdo.com/FM/");
?>
