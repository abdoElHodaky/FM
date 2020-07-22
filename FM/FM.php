<html>
    <head>
        <title>FM</title>
        <link rel="icon" href="images.jpg">
        <link rel="stylesheet" href="../FF/css/foundation.min.css">
         <link rel="stylesheet" href="../FF/foundation-icons.css">
        <script src="../jquery-2.2.2.js"></script>
        <script src="../FF/js/vendor/foundation.min.js"></script>
        
    </head>
    <body>
<?php require_once '../load.html';?>
      <div class='reveal' data-reveal id="Signup" style="width:50%;height:50%;border-radius:10%">
      <div class="row  align-center medium-unstack">
        <form class="  small-3  medium-6 large-12 columns" action="Signup.php" method="post" enctype="application/x-www-form-urlencoded" style="position:relative;top:30px">
            <div class=" large-12  large-2 columns">
            <table>
                <tbody>
            <tr><td><input type="text" name="User" placeholder="User" style="border-radius:30px;padding:10px;padding-left:45px;background:url(images.png)no-repeat 2%"></td></tr>
            <tr><td><input type="password" name="Pass" placeholder="Password"style="border-radius:30px;padding:10px;padding-left:45px;background:url(Security-Password-2-icon.png)no-repeat 2%"></td></tr>
            <tr><td><input type="email" name="Email" placeholder='Email'style="border-radius:30px;padding:10px;padding-left:45px;background:url(interface.png)no-repeat 2%"></td></tr>
                    <tr><td><input type="submit" name="SignUp" value="SignUp" class="button" style="border-radius:20px;"></td></tr>
                <tr><td><a data-open='Login' class="secondary callout">Login</a></td></tr>
                </tbody>
                </table>
            </div>
        </form>
        </div>
        <button class="close-button " data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class='reveal' data-reveal id="Login" style="width:50%;height:50%;top:120px;border-radius:10%">
 <div class="row  align-center medium-unstack">
        <form class=" small-3  medium-6 large-12 columns" action="Control" method="post"  style="position:relative;top:50px;">
            <div class=" large-12  large-2 columns">
            <table>
            <tbody>
            <tr><td><input type="text" name="FM_User" placeholder="FM_User"style="border-radius:30px;padding:10px;padding-left:45px;background:url(images.png)no-repeat 2%;"></td></tr>  
            <tr><td><input type="password" name="FM_Pass" placeholder="FM_Password"style="border-radius:30px;padding:10px;padding-left:45px;background:url(Security-Password-2-icon.png)no-repeat 2%;"></td></tr>  
            <tr><td><input type="submit" name="Login" value="Login" class="button" style="border-radius:20px;"></td></tr>  
            <tr><td><a data-open='Signup' class="secondary callout">Signup</a></td></tr>  
            </tbody>
            </table>
            </div>
        </form>
        </div>
        <button class="close-button " data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>





<script type="text/javascript">
    $(document).foundation();
    setTimeout(function() {
          $("button").removeClass('ui-btn ui-shadow ui-corner-all');
    },100);
    $('#Signup').foundation('open');
    $('form').eq(0).on('submit',function(event){
      $('#Signup').foundation('close');
        var xhr=new XMLHttpRequest();
        event.preventDefault();
        var data=new FormData();
        xhr.open('POST','Signup.php',true);
        data.append('User',btoa($('input[name=User]').val()));
        data.append('Pass',btoa($('input[name=Pass]').val()));
        data.append('Email',btoa($('input[name=Email]').val()));
        xhr.send(data);
        
       
    });
      var xhr=new XMLHttpRequest();
    $("form").eq(1).on("submit",function(event) {
    	
        event.preventDefault();
        var data=new FormData();
    xhr.open('POST','Control.php',true);
    if (($('input[name=FM_User]').val()==""||$('input[name=FM_Pass]').val()=="")||($('input[name=FM_User]').val()==""&&$('input[name=FM_Pass]').val()=="")) 
        {
            document.location.reload();
        }
        else
        {
            data.append('FM_User',btoa($('input[name=FM_User]').val()));
            data.append('FM_Pass',btoa($('input[name=FM_Pass]').val()));
        }
        
        xhr.send(data);
         $('#Login').foundation('close');
         setTimeout(function() {document.location.href="/FM/Control"},2000);
    });
    
      $('.close-button').click(function() {
        $('.reveal').on('closed.zf.reveal',function() {
            document.location.href='/';
        });
        
      });

</script>

    </body>
</html>




