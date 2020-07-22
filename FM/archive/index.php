<html>
	<head>
        <title>Archive</title>
        <link rel="icon" href="../archive-icon.png">
		<link rel="stylesheet" href="../../FF/css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="../../materialize-v0.97.7/materialize/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="../../Control/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
		<script type="text/javascript" src="../../jquery-2.2.2.js"></script>
		<script type="text/javascript" src="../../materialize-v0.97.7/materialize/js/materialize.js"></script>
		<script type="text/javascript" src="../../FF/js/vendor/foundation.min.js"></script> 
    <script type="text/javascript" src="../local.js"></script>
  </head>
  <?php require_once '../../load.html';?>
  <body class="container">
  <div class="row">
  <div class="s12 m6 l8 cols">
    <?php require_once 'check.php';?>
    </div>
    <table id="T">
    <caption>Upacked Folders</caption>
      <thead>
        <th>Name</th>
        <th>Type</th>
        <th>ArchiveName</th>
      </thead>
      <tbody>
      </tbody>
</table>
<table id="view">
    <caption>Upacked Files</caption>
      <thead>
        <th>Name</th>
        <th>Type</th>
      </thead>
      <tbody>
      </tbody>
</table>
<div class="reveal" id="view" data-reveal data-animation-in="spin-in" data-animation-out="spin-out">
  <div class="row">
    <div class="small-3 l12 col columns">
      <fieldset class="row input-field">
      <legend>View</legend>
        <textarea rows="10" cols="100" spellcheck="false"></textarea>
      </fieldset>
    </div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  <script type="text/javascript" src="extract.js"></script>
  <script type="text/javascript">
  $(document).foundation();
  if (!$cookie) {
    location.assign("/FM/");
  }
  </script>
  </body>
</html>