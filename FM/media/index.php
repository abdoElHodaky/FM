<?php
/*json_encode() export an object array to javascript*/

?>
<html>
    <head> 
        <link rel="icon" href="../../video-film-strip_318-41449.png"class="fi-video">
        <link rel="stylesheet" href="../../FF/foundation-icons.css">
        <link rel="stylesheet" href="../../JU/jquery-ui.min.css">
        <link rel="stylesheet" href="../../JU/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="../../FF/css/foundation.min.css">
	<!--link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.css"-->
        <script type="text/javascript" src='../../jquery-2.2.2.js'></script>
        <script src="../../JU/jquery-ui.min.js"></script>
        <script src="../../FF/js/vendor/foundation.min.js"></script>
        <!--script src="https://cdn.jsdelivr.net/foundation/6.2.3/foundation.min.js"></script-->
         <script type="text/javascript" src="../../modernizr.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Hover-master/Hover-master/animate.css">
   
    <link rel="stylesheet" type="text/css" href="videomq.css">
  <script>
       $("header").width($(window).width()).css({"background-size":"cover"});</script>
    <!--link rel="stylesheet/less"type='text/less' href="VA.less">
    <script src='../../less.js'></script-->
<link rel="stylesheet" type="text/css" href="video.css">
      <script type="text/javascript" src="VA.js" asyn></script>
      
     <title>Video 
    </title> 
    </head>
    <body>
      <div class="row container ui-content" style="position:relative;">
        <figure class="video-player secondary hollow small-3 medium-6 large-12"  allowfullscreen data-fullscreen>
                <div class="video"> 
                    <video src="" preload="auto" poster="video.png" id="video"></video>
                </div>
                <div id="controls" class="vertical">
                <div class="video-bar large">
                    <div class="video-load-bar">
                    </div>
                    
                    <div class="video-progress-bar ">
                        
                    </div>
                </div>

                <ul class="menu" style="position:relative">
                
                <li>
                <div class="Button-group">
                    <button id="prev"class="button fi-previous"></button>
                
                        
                
                <button class="button  fi-play large" id="Play">
                    </button>
               
               
                    <button id="next"class=" button fi-next"></button>
                
                </div>
                </li>
                <li><label class="label large" style="position: absolute;">00:00</label></li>
                <li style="margin:-15px;padding:0px;">
                <div class="Button-group" id="Btn-group" style="position: relative;">
                    <button  onclick="VA.About()"class=" button fi-info "></button>
                    <button class="button fi-list"onclick="$('#List').fadeToggle(1500);"></button>
                    <button class="button fi-projection-screen"></button>
                </div>
                </li>
                
                
            </ul>
                </div>

            
            <span class="tooltip top" id="value"style="left: 8px; position: absolute; z-index: 2147483647; border-radius: 30%;display:none">00:00</span>
        
            <ol>
                
            </ol>
        </figure>

        <div style="position:absolute;z-index:30000000000000;top:10%;left:34%;" class="reveal" data-reveal data-close-on-click="true" data-animation-in="slide-in-left" data-animation-out="slide-out-right">
  Made&nbsp;by&nbsp;<img src="../../abdo.png">&trade;
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        </div>
    </body>
    <script src="VA.init.js" asyn></script>
    <script type="text/javascript">
    var title=document.getElementsByTagName('title')[0];
    title.innerHTML=" Video- Abdo";
    </script>

</html>
<?php require_once"scan.php";?>