<?php
function Check($arr1,$arr2){
  foreach ($arr1 as $key => $value) {
   foreach ($value as $key2 => $value2) {
       foreach ($arr2 as $key3 => $value3) {
         if ($value3==$value2) {
           return"Equal";break;
         }
       }
     }  
  }
}
  error_reporting(E_ERROR);
  if ($_SERVER['REQUEST_METHOD']=="POST") {
  sleep(3);
  $SQL=new mysqli("localhost",'root','279348');
  $SQL->query("CREATE DATABASE IF NOT EXISTS __FM__");
  $SQL->select_db('__FM__');
  $SQL->query('CREATE TABLE IF NOT EXISTS FM(Name varchar(10),Email varchar(30),Password varchar(50))');
  $U=filter_var($SQL->real_escape_string(base64_decode($_REQUEST['User'])),FILTER_SANITIZE_STRING,array('flags'=>array(FILTER_FLAG_NO_ENCODE_QUOTES, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_BACKTICK, FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH, FILTER_FLAG_ENCODE_AMP)));
  $E=filter_var($SQL->real_escape_string(base64_decode($_REQUEST['Email'])),FILTER_SANITIZE_STRING,array('flags'=>array(FILTER_FLAG_NO_ENCODE_QUOTES, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_BACKTICK, FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH, FILTER_FLAG_ENCODE_AMP)));
  $P=filter_var($SQL->real_escape_string(base64_decode($_REQUEST['Pass'])),FILTER_SANITIZE_STRING,array('flags'=>array(FILTER_FLAG_NO_ENCODE_QUOTES, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH, FILTER_FLAG_STRIP_BACKTICK, FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH, FILTER_FLAG_ENCODE_AMP)));
  $r=$SQL->query("SELECT COUNT(*) FROM FM WHERE Name='$U'");
  $count=$r->fetch_all()[0][0];
  if (count($count>1)) {
    $SQL->query("DELETE FROM FM WHERE Name='$U' LIMIT $count-1");
  }
   $SQL->query("INSERT INTO FM(Name,Email,Password)VALUES('$U', '$E',AES_ENCRYPT('$P','$P'))");
  header("REFRESH:2;url=/FM/");
}
else{header("Location:/FM/");}

?>
<html>
<head>
        <title>Control&nbsp; -&nbsp; FM&nbsp;Signup</title>
        <link rel="stylesheet" href="../FF/css/foundation.min.css">
        <script src="../jquery-2.2.2.js"></script>
        <script src="../FF/js/vendor/foundation.min.js"></script>
        <style type="text/css">
        body
        {
            background: rgb(255,255,255);
            background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%); 
            background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); 
            background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); 
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 );

        }
        </style>
</head>
<body>
</html>