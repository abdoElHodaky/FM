 <!DOCTYPE html>
<html>
<head>
   
        <title><?php echo "Control - FM ";?>Login</title>
        <link rel="stylesheet" href="../FF/css/foundation.min.css">
        <script src="../jquery-2.2.2.js"></script>
        <script src="../FF/js/vendor/foundation.min.js"></script>
        <style type="text/css">
        body
        {
           /* Permalink - use to edit and share this gradient: htM://colorzilla.com/gradient-editor/#ffffff+0,f3f3f3+50,ededed+51,ffffff+100;White+Gloss+%232 */
            background: rgb(255,255,255); /* Old browsers */
            background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(243,243,243,1) 50%, rgba(237,237,237,1) 51%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(243,243,243,1) 50%,rgba(237,237,237,1) 51%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
        }
        *{outline: none;font-weight: bold;}
        </style>
</head>
<body>
<div class='reveal' data-reveal id="Login" style="width:50%;height:30%;top:120px;">
 <div class="row  align-center medium-unstack">
        <form class=" small-3  medium-6 large-12 columns" action="FM-Control.php" method="post" enctype="application/x-www-form-urlencoded" style="position:relative;top:50px;">
            <div class=" large-12  large-2 columns  ">
            <input type="text" name="FM_User" placeholder="FM_User"style="border-radius:30px;padding:10px;padding-left:45px;background:url(images.png)no-repeat 2%;">
                
            <input type="password" name="FM_Pass" placeholder="FM_Password"style="border-radius:30px;padding:10px;padding-left:45px;background:url(Security-Password-2-icon.png)no-repeat 2%;">
            <input type="submit" name="Login" value="Login" class="button" style="border-radius:20px; color:rgb(218, 0, 255);box-shadow:0px 0px 20px #13be32 ">
            </div>
        </form>
        </div>
        <button class="close-button " data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="reveal hollow callout warning" data-reveal id='W'>
    <h1>Enter Empty Fields</h1>
    <button class="close-button " data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
    
<!--div class="callout hollow warning" id="E" data-closable="spin-out">
<h1>Warning:Empy Fields</h1>
<button class='close-button' aria-label='Dismiss warning' type='button' data-close>
<span aria-hidden='true'>&times;</span>
</button>
</div-->   
    
    
    
    
    
    
    
</body>
<script type="text/javascript">
    $(document).foundation();
    $('#Login').foundation("open");
    setTimeout(function() {
          $("button").removeClass('ui-btn ui-shadow ui-corner-all');
    },100);
    $("#Login").on("closed.zf.reveal",function(){
        document.location.href='/Control/FM/';
    });

        /*
    
        $('form').on('submit',function(event)
            {
                event.preventDefault();
                var data=new FormData();
                var xhr=new XMLHttpRequest();
                data.append('FM_User',$('input[name=FM_User]').val());
                data.append('FM_Pass',$('input[name=FM_Pass]').val());
                xhr.open('POST','FM-Control.php',true);
              
                
            
                xhr.onload=function()
                {   
                    if(xhr.DONE)
                   
                setTimeout(function(){
                    document.location.href
                    ='FM-Control.php';
                    },2000);
                }
            
                xhr.send(data);
            });
*/
</script>
</html>
