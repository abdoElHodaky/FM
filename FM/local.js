	var local=window.localStorage;
	var $cookie=document.cookie.split(";");
	if ($cookie.length>=1&&$cookie.length<2) {
	$cookie=$cookie[$cookie.length-1].split("=");
	$cookie=$cookie[$cookie.length-1];
	local.setItem("user",$cookie);
	$cookie=local.getItem("user");}
	if ($cookie.length==2) {
	$cookie=$cookie[$cookie.length-2].split("=");
	$cookie=$cookie[$cookie.length-1];
	local.setItem("user",$cookie);
	$cookie=local.getItem("user");}
	var $server=location.hostname;