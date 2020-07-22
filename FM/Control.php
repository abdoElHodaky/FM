<html>
<head>
<title>FM-Control</title>
<link rel="icon" href="images.jpg">
<link rel="stylesheet" type="text/css" href="../../materialize-v0.97.7/materialize/css/materialize.min.css">
<link rel="stylesheet" href="../FF/css/foundation.min.css">
<link rel="stylesheet" href="../FF/foundation-icons.css">
<script type="text/javascript" src="../jquery-2.2.2.js"></script>
<script type="text/javascript" src="../FF/js/vendor/foundation.min.js"></script>
<script type="text/javascript" src="../../materialize-v0.97.7/materialize/js/materialize.min.js"></script>
<style type="text/css">*{outline: none;font-weight: bold;}</style>
<link rel="stylesheet" type="text/css" href="../110943/font/flaticon.css">
<script type="text/javascript" src="local.js"></script>
<link rel="stylesheet" type="text/css" href="../../viewerjs-master/dist/viewer.css">
<script type="text/javascript" src="../../viewerjs-master/dist/viewer.js"></script>
</head>
<body>
<?php 
require_once 
'../load.html';
?>
<div class="small-up-2 medium-up-10 large-up-12" id="content">
  <?php if ($_COOKIE): ?>
    <div class="top-bar">
    <div class="row hollow secondary callout">
    <section class="top-bar-section">
      <ul class="small-2 medium-7 large-12 columns dropdown menu" data-dropdown-menu>
        <li>
        <a>File</a>
          <ul class="menu">
            <li><a class="fi-plus" data-open="Create">&nbsp;Create&nbsp;</a></li>
            <li><a class="fi-upload" data-open="Upload">&nbsp;Upload&nbsp;</a></li>
          </ul>
        </li>
        <li>
        <a>View</a>
        <ul class="menu">
            <li><a class="fi-css3" data-open="Import" >&nbsp;Themes&nbsp;</a></li>
            <li><a href="media/">View&nbsp;media</a></li>
            <li><a href="image/">View&nbsp;Image</a></li>
            <li><a href="archive/">View&nbsp;Archive</a></li>
            <li><!--a data-open="Console">Console</a--></li>
            <li><a href="pdf/">View&nbsp;Pdf</a></li>
            <?php if ($_COOKIE&&$_COOKIE["FM_user"]=="root"): ?>
            <li><a data-open="VD">View&nbsp;Dir</a></li>
            <?php endif ?>
          </ul>

        </li>
        <?php if ($_COOKIE&&$_COOKIE["FM_user"]=="root"): ?>
          <li><a data-open="About">Author</a></li>
        <?php endif ?>
        
        <li>
        <a href="logout" target="_top">Logout</a>

        </li>
      </ul>
    </section>
    <?php if ($_COOKIE&&$_COOKIE["FM_user"]): ?>
      <p class='top-bar-section left fi-user'>&nbsp;LoginAs:&nbsp;<?php echo $_COOKIE['FM_user']; ?></p>
    <?php endif ?>
    </div>
  </div>
  <?php endif ?>
	
<?php require_once 'check.php';?>	
<?php require_once 'dir.php';?>
	</div>
	<div class="reveal callout success" id="Success" data-reveal>
  <h1>Access Done!</h1>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
	<div class="reveal" id="Upload" data-reveal>
  <h1>Upload&nbsp;Your&nbsp;Files</h1>
  <embed src="Up.php" width="600" heigth="600">
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


	<div class="reveal" id="Import" data-reveal>
  <h1>Import&nbsp;Themes</h1>
  <embed src="Themes.php" width="600" heigth="600">
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="reveal" id="View" data-reveal style="width:100%;height:50%;transition:all ease-in .9s 1s" data-animation-in="spin-in" data-animation-out="fade-out">
  <fieldset>
  <legend>View</legend>
  <pre style="max-width:100%;max-height:100%">
  	<pre>
  		
  	</pre>
  	<img id="img">
  </pre>
  </fieldset>
  <hr>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
  <fieldset>
  <legend>Options</legend>
  <ul class="menu Button-group">
  <li><a class="button large fi-page-edit top" id="edit" data-open="Edit">Edit</a></li>
  <li class="vertical"></li>
  <li><a class="button large fi-page-delete" id="delete">Delete</a></li>
  <li><a class="button fi-download">&nbsp;Download</a></li>
  </ul>
  </fieldset>
  <hr>
</div>


<div class="reveal row small-2 medium-5 large-10 columns" id="Create" data-reveal style="width:100%;height:50%;transition:all ease-in .9s 1s" data-animation-in="spin-in" data-animation-out="fade-out">
  <fieldset class="row medium-4 large-7 small-2 columns">
  <legend>Create</legend>
  <form method="post" action="Do" class="small-3 medium-7 large-12 column">
  <table class="table row" cellpadding="10" cellspacing="20">

  	<div class="small-3 medium-10 large-12 columns">
  	<tbody>
  		<tr>
  		<td>
  		<label for="FName">FileName</label>
  		<input type="text" name="FName"></td></tr>
  		<tr><td>
  		<label for="FPath">FilePath</label>
  		<input type="text" name="FPath"></td></tr>
  		<tr><td>
  			<label for="Content">FileContent</label>
  			<textarea cols="2000" rows="10" id="Content" name="Content" spellcheck='false'></textarea>
  		</td></tr>
  		<tr><td><input type="submit" value="Create" class="button large fi-page-add"></td></tr>
  	</tbody>
  	</div>
  </table>
  </form>
  </fieldset>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal row small-2 medium-5 large-10 columns" id="Edit" data-reveal style="width:100%;height:100%;transition:all ease-in .9s 1s" data-animation-in="spin-in" data-animation-out="fade-out">
  <fieldset class="row medium-4 large-7 small-2 columns s12 l10 col">
  <legend>Edit</legend>
  <form method="post" action="Do" class="small-3 medium-7 large-12 columns col l11 s12">
  <table class="table row">
  	<div class="small-3 medium-10 large-12 columns">
  	<tbody>
  		<tr><td>
  			<textarea cols="200" rows="50" id="Value" name="NValue" spellcheck='false'></textarea>
  		</td></tr>
  		<tr><td><input type="submit" value="save" class="button large fi-save"></td></tr>
  	</tbody>
  	</div>
  </table>
  </form>
  </fieldset>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="reveal row small-2 medium-5 large-10 columns" id="VD" data-reveal data-animation-in="spin-in" data-animation-out="fade-out" style="width:100%;height:100%;transition:all ease-in .9s 1s">
  <fieldset class="row medium-4 large-7 small-2 columns">
  <legend>View&nbsp;DIR</legend>
  <form method="POST" class="small-4 medium-7 large-12 small-centered medium-centered large-centered column">
  <label>
	Dir-Name 
  </label>
  <input type="text" minlength="5" name="VDN"style="background:url(folder-32.png) no-repeat 1% 0%;padding:0px 20px 0px 45px">
  <input type="submit" value="Scan" class="button  callout">
  <video></video>

  </form>
  </fieldset>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <table class="table row" id="T3">
  	<div class="small-3 medium-10 large-12 columns  ">
  	<tbody>

  	</tbody>
  	</div>
  </table>
<div class="reveal row small-2 medium-5 large-10 columns flex-video full" id="VM" data-reveal data-animation-in="spin-in" data-animation-out="fade-out" style="width:100%;height:100%;transition:all ease-in .9s 1s">
 <embed src="../<?php echo $_COOKIE['FM_user'];?>/media/">
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal row  callout secondary" data-reveal id="DV">
  <button class="close-button" data-close>
  	<span>&times;</span>
  </button>
 </div>
  <table class="table row justify-content column" id="T4">
  	<div class="small-3 medium-10 large-12 columns  ">
  	<tbody>

  	</tbody>
  	</div>
  </table>

<div class="reveal" id="Console" data-reveal>
 <input type="text" name="command">
 <pre></pre>
  <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="reveal container purple lighten-5" id="About" data-reveal>
 <div class="row">
 	<div class="row columns small-up-2 large-up-10">
 		<div class="column">
 			
 		</div>
 	</div>
 </div>
  <button class="close-button" data-close aria-label="Close Accessible Modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<script type="text/javascript">
if (docuemnt.cookie=="") {
  location.assign("/FM/");
}
$("textarea").addClass("materialize-textarea");
	$("a[data-open=About]").click(function() {
	var xhr=new XMLHttpRequest();
	xhr.open("GET","About",true);
	xhr.responseType="document";
	xhr.onload=function(event) {
		var html=event.target.response;
		$("#About .column").html(html.querySelectorAll(".row")[1].innerHTML).removeClass("column");
		$("#About").css({"width":"110%"}).addClass("wide-screen");
		}
	xhr.send();
});
</script>
</body>
<script type="text/javascript" src="Control.js" aysn>
</script>
</html>