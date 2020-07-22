function VA(elemContain,elem,type,vtype,Controls){
   var repeat=true;
    VA.dropped=false;
    VA.type=type;
    VA.__type=vtype;
    VA.Control=Controls;
    
    function XHR()
    {   if (window.XMLHttpRequest) {
        return new XMLHttpRequest();}
        return false;
    }
var differX,differY;var bar;
        $(VA.Control).hide();
         $(tooltip).hide();
    VA.respon=function(){
     VA.methods()["get"]("videodmq.css","blob","style");//VA.get()
      $(elemContain).removeClass("small-3 medium-6 large-11 large-12");
    }
        $(".fi-play").click(function(){PlayPause();});

       function PlayPause()
        {
            if(elem.paused)
            {
                elem.play();
                $(".fi-play").removeClass("fi-play").addClass("fi-pause");
                
            }
            else
            {
                elem.pause();
                $(".fi-pause").removeClass("fi-pause").addClass("fi-play");
            }
        }
        
        function Status()
        {
            if(elem.buffered.length)
            {
                var buffer=((elem.buffered.end(0)-elem.buffered.start(0))/elem.duration)*100;
                $(".video-load-bar").css("width",buffer.toString()+"%");
            }
        }
        
        $(elem).on("progress",function(){Status()});
        $(elem).on("loadstart",function(){Status()});
        $(elem).on("loadeddata",function(){Status()});
        
        
        
        
        elem.ontimeupdate=function(){
            
            var mins=Math.floor(elem.currentTime/60);
            var secs=Math.floor(elem.currentTime-mins*60);
            var durmins=Math.floor(elem.duration/60);
            var dursecs=Math.floor(elem.duration-durmins*60);
            
            if(mins<10)mins="0"+mins
            if(secs<10)secs="0"+secs
            if(durmins<10)durmins="0"+durmins
            if(dursecs<10)dursecs="0"+dursecs
            $("label").text(mins+":"+secs+"/"+durmins+":"+dursecs);
            
            
           var pos=(elem.currentTime/elem.duration)*100; 
            
          $(".video-progress-bar").css("width",pos.toString()+"%") ; 
            
           $(tooltip).css("left",$(".video-progress-bar").width().toString()+"px").text(mins+":"+secs); 
            
            
       
        }   
          
    var handleFullscreen = function() {
   if (isFullScreen()) {

      if (document.exitFullscreen) {document.exitFullscreen();$(elem).css({"width":"97.5%","height":"90%"});}
      else if (document.mozCancelFullScreen) {document.mozCancelFullScreen();$(elem).css({"width":"97.5%","height":"90%"});}
      else if (document.webkitCancelFullScreen) {document.webkitCancelFullScreen();$(elem).css({"width":"97.5%","height":"90%"});}
      else if (document.msExitFullscreen) {document.msExitFullscreen();$(elem).css({"width":"97.5%","height":"90%"});}
      setFullscreenData(false);
       $("#List").animate({"top":"10%"},1000,"swing");
       
       if (Modernizr.mq("(min-width:640px) and (max-width:768px)"))
       {
           $(tooltip).css("transform","translate(-50%, -534%)");
       }
       if(Modernizr.mq("(device-width:1024px)"))
        {
          $(tooltip).css("transform","translate(-52%, -540%)");
          //$("label").css({"right":"1rem"});
        }
        if(Modernizr.mq("(device-width:1280px)"))
       {
           $(tooltip).css("transform","translate(-2rem, -22em)");
           //$("label").css({"right":"-53rem"});
       }

        if(Modernizr.mq("(min-width:1707px) and (max-width:1920px)"))
       {
           $(tooltip).css("transform","translate(-2rem, -17rem)");
           //$("label").css({"right":"-52rem"});
       }
        if(Modernizr.mq("(min-width:1500px) and (max-width:1700px)"))
       {
           $(tooltip).css("transform","translate(-53%, -23rem)");
           //$("label").css({"right":"-54rem"});
       }
       
   }
   else {
          $("#List").animate({"top":"20%"},1000,"swing");
      if (elemContain.requestFullscreen) {elemContain.requestFullscreen();$(elem).css('width',"97%").css('height','100%');}
      else if (elemContain.mozRequestFullScreen) {elemContain.mozRequestFullScreen();$(elem).css('width',"97%").css('height','100%');}
      else if (elemContain.webkitRequestFullScreen) {elemContain.webkitRequestFullScreen();$(elem).css('width',"100%").css('height','100%');}
      else if (elemContain.msRequestFullscreen) {elemContain.msRequestFullscreen();$(elem).css('width',"97%").css('height','100%');}
      setFullscreenData(true);
      
      if (window.matchMedia("(min-width:640px) and (max-width:768px)").matches)
      {
        $(tooltip).css({"transform":"translate(-34%, -577%)"});
        //$("label").css({"right":"1rem"});
         $(elem).css('margin-left','12px');
      }
       if(window.matchMedia("(device-width:1024px)").matches){
        $(tooltip).css("transform","translate(-31%, -457%)");
        //$("label").css({"right":"1em"});
         $(elem).css('margin-left','15px');
      }
       if(window.matchMedia("(min-width:1707px) and (max-width:1920px)").matches)
       {
           $(tooltip).css({"transform":"translate(-1rem, -14rem)"});
          // $("label").css({"right":"-93rem"});
            $(elem).css('margin-left','0px');
           
       }
       if(window.matchMedia("(min-width:1500px) and (max-width:1700px)").matches)
       {
           $(tooltip).css({"transform":"translate(-1rem, -31em)"});
           //$(VA.Control).css({"right":"1%","left":"1%"}); 
            $(elem).css('margin-left','20px');
             //$("label").css({"right":"-80rem"});
       }
       if(window.matchMedia("(device-width:1280px)").matches)
       {
           $(tooltip).css("transform","translate(-1rem, -19em)");
           //$("label").css({"right":"-57rem"});
           $(elem).css('margin-left','20px');
       }

   }
}
    var isFullScreen = function() {
   return !!(document.fullScreen || document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || document.fullscreenElement);
}
    
    var setFullscreenData = function(state) {
   elemContain.setAttribute('data-fullscreen', !!state);
}
    
    document.addEventListener('fullscreenchange', function(e) {
   setFullscreenData(!!(document.fullScreen || document.fullscreenElement));
});
document.addEventListener('webkitfullscreenchange', function() {
   setFullscreenData(!!document.webkitIsFullScreen);
});
document.addEventListener('mozfullscreenchange', function() {
   setFullscreenData(!!document.mozFullScreen);
});
document.addEventListener('msfullscreenchange', function() {
   setFullscreenData(!!document.msFullscreenElement);
});
        $(".fi-projection-screen").click(function(){handleFullscreen();});
with(VA.dropped=true){
 drop();
}
function drop() {

$(elem).on("dragenter dragend dragleave dragover",function(event)
                   {
        event.preventDefault();
    });
   var src; $(elem).on("drop",function(event)
        {   $(tooltip).show();
            $(VA.Control).show();
            $("label").text("00"+":"+"00"+"/"+"00"+":"+"00");
            $(".tooltip").text("00"+":"+"00");
            event.preventDefault();
            
         src=event.originalEvent.dataTransfer.files[0];
        var reader=new FileReader();
            reader.onload=function(e)
                {
                result=e.target.result
                result=JSON.parse(result);
                rels=result;
                VA.methods()["Do"](rels);//VA.Do()
              }
              if (VA.checkete(src.name,"json")==true) {
              reader.readAsText(src);}
              
              else
              {
                VA.type=null;
                $("ol").remove();
                elem.src=URL.createObjectURL(src);
                 with(elem.autoplay=true) {
                $('.fi-play').removeClass('fi-play').addClass('fi-pause');
                }
                if (VA.methods().check["checkwe"](navigator.userAgent)=="Trident") {VA.hide();}//VA.checkwe();
                if(VA.methods().check["checkete"](src.name,"mp4")==true||VA.checkete(src.name,"mkv")==true||VA.checkete(src.name,"wmv")==true)//VA.checkete();
                {
                   //VA.methods().Video.respon();//VA.respon();
                   //VA.methods().Video.Control();//VA.Control();
                   VA["methods"]()["Video"]["respon"]();
                   VA["methods"]()["Video"]["Control"]();
                  $(".fi-list").remove();
                  elem.onplaying=function() {
                  if (elem.getAttribute("class")=="animated") {
                  elem.removeAttribute("class");}
                  }
                }
                if(VA.methods().check["checkete"](src.name,"mp3")==true||VA.checkete(src.name,"wma")==true)
                {
                  //VA.methods().Audio.init(elemContain,"100%","54%");//VA.Audio();
                  //VA.methods().Audio.respon();//VA.Audio.Respon();
                  //VA.methods().Audio.respon.Control();//VA.Audio.Respon.Control();
                  VA["methods"]()["Audio"]["init"](elemContain,"100%","54%");
                  VA["methods"]()["Audio"]["respon"]();
                  VA["methods"]()["Audio"]["respon"]["Control"]();
                  elem.onplaying=function() {elem.setAttribute("class","animated infinite tada")}
                } elem.onpause=function() {elem.removeAttribute("class");};
                
                }
                elem.onended=function() 
                {
                  
                  event.originalEvent.dataTransfer.clearData();
                  drop();
                }
    });
  }
      var title=document.getElementsByTagName("title")[0];
     VA.Do=function(files,type,_type)
           {  _type=VA.__type;
              type=VA.type;
              source=files;

              if (type=="Audio")
               {  VA["methods"]()["Audio"]["init"](elemContain,"100%","54%");//VA.Audio();
                  VA["methods"]()["Audio"]["respon"]();//VA.Audio.Respon();
                  VA["methods"]()["Audio"]["respon"]["Control"]();//VA.Audio.Respon.Control();
                 if (_type=="MP3")
                  { 
                 /*source.type.names,source.type.links*/
                 VA["methods"]()["list"]["init"](source[type][vtype]["names"],source[type][vtype]["links"],"blob",type);//VA.list()
                  }
               }

              else if(type=="Video")
                {  VA["methods"]()["Video"]["respon"]();//VA.respon();
                   VA["methods"]()["Video"]["Control"]();//VA.Control();
                  if (_type=="MP4"||_type=="MKV")
                  {
                    /*source.type.vtype.names,source.vtype.type.links*/
                    VA["methods"]()["list"]["init"](source[type][vtype]["names"],source[type][vtype]["links"],"blob",type);//VA.list()
                  }
                }
              else{document.location.reload();}
           }
  VA.list=function(names,links,_type,rtype)
    {   
        var ol=document.querySelector("ol");
        var items=[];ol.id="List";
        for(i=0;i<names.length;i++)
        {
            items[i]=document.createElement("li");
            ol.appendChild(items[i]);
            items[i].innerHTML=names[i];
        }
        ol.style="position: absolute;"+
    "z-index: 300000000000000000000000000000;"+"bottom: 50%;top:10%;"+
    "-moz-columns: 10 300px;-o-columns: 10 300px;ms-columns: 10 300px;"+
    "list-style: none;color:rgba(180,2,136,1);font-size:115%;margin-left:8%;height:30%;overflow:scroll";
        ol.setAttribute('class',"small-up-2 medium-up-6 large-up-10");
        $("ol li").click(function()
    {
            var link;
         var id=$(this).index();
          if (window.location.protocol=="http:") 
          { 
            link=links[id].replace('https','http');
            console.log(VA.methods()["get"](link,_type,rtype));//VA.get()
          }
          else
          {
            console.log(VA.methods()["get"](links[id],_type,rtype));//VA.get()
          }
            
            VA["methods"]()["list"]["respon"](id);//VA.list.respon()

        elem.onended=function(){
            
            $("#Play").removeClass("fi-pause").addClass("fi-play");
            $(tooltip).text("00"+":"+"00");
            $("label").text("00"+":"+"00"+"/"+"00"+":"+"00");
            
            
            
            
            if(id==links.length-1)
            {   repeat=confirm("repeat");
                repeat=VA["methods"]()["repeat"](repeat);
                if (repeat==true) {id=0;VA["methods"]()["autoplay"]();}
                else{
                $("label").text("00"+":"+"00"+"/"+"00"+":"+"00");
                setTimeout(function() {
                   $("ol li").eq(links.length-1).attr("class","decative");
                    elem.removeAttribute("src");
                    elem.removeAttribute("class");
                    elem.currentSrc=null;
                    elem.removeAttribute("autoplay");
                },10);
              }
                
            }
            else
            {
                 id++;
                 elem.autoplay=true;
                VA["methods"]()["autoplay"]();
            }
            if (window.location.protocol=='http:') {
              link=links[id].replace('https','http')
            console.log(VA.methods()["get"](link,_type,rtype));}//VA.get()
            else{console.log(VA.methods()["get"](links[id],_type,rtype));} //VA.get()
            
            VA["methods"]()["list"]["respon"](id);//VA.list.respon()

        

        }    
            
           $("#next").click(function()
            {

              if(id==links.length-1)
            {
                 id=0;
                 elem.autoplay=false;
            }
            else
            {
                 id++;
                 VA["methods"]()["autoplay"]();
            }
            if (window.location.protocol=='http:') {
              link=links[id].replace('https','http')
            console.log(VA.methods()["get"](link,_type,rtype));}//VA.get()
            else{console.log(VA.methods()["get"](links[id],_type,type));} //VA.get()
             VA["methods"]()["list"]["respon"](id);//VA.list.respon()
            });
             
            $("#prev").click(function()
            {

              if(id==-1)
            {
                 id=links.length-1;
                 elem.autoplay=false;
            }
            else
            {
                 id--;
                VA["methods"]()["autoplay"]();
            }

            if (window.location.protocol=='http:') {
              link=links[id].replace('https','http')
            console.log(VA.methods()["get"](link,_type,rtype));}//VA.get()
            else{console.log(VA["methods"]()["get"](links[id],_type,rtype));} //VA.get()
             VA["methods"]()["list"]["respon"](id);//VA.list.respon()
            });
             
        }).css({"cursor":"pointer","border-radius":"15px"});    
          
    }
  VA.list.respon=function(id){
             $("ol li").eq(id).attr("class","active");
             $("ol li").eq(id).prevAll().attr("class","decative");
             $("ol li").eq(id-1).attr("class","decative");
             $("ol li").eq(id).nextAll().attr("class","decative");}
    
  VA.get=function(file,_type,rtype)
    {   var name=file.toString().split("/");
        name=name[name.length-1];
        var type=VA.type;
        var xhr=new XHR();
        if (rtype==type) {
        xhr.open("GET",file,true);
        xhr.send(); 
        xhr.responseType=_type;
        xhr.onload=function(event)
        {   
            file=event.target.response;
            if (_type=="blob") {
              elem.src=URL.createObjectURL(file);
              }
        }

        }
        else
        {
            if (_type=="blob") {
          if (rtype=="style") {
              document.body.appendChild(document.createElement("style"));
              var styles=document.querySelectorAll("style");
              if (styles.length>2) {document.body.removeChild(styles[styles.length-1]);}
              var style=styles[1]||styles[styles.length-1];
                xhr.open("GET",file,true);
                xhr.responseType=_type;
                xhr.onload=function(event) {
                  file=event.target.response;
                  var reader=new FileReader();
                  reader.readAsText(file);
                  reader.onload=function(event) {
                    $(style).html(event.target.result);
                  }
                }
                xhr.send(); 
              }
            
              if (rtype=="script") {
                 var script=document.querySelector("script");
                      xhr.open("GET",file,true);
                      xhr.responseType=_type;
                      xhr.onload=function(event) {
                      file=event.target.response;
                      var reader=new FileReader();
                      reader.readAsText(file);
                      reader.onload=function(event) {
                      $(script).html(event.target.result);
                    }
                  }
                xhr.send();
                 
              }
              if (rtype=="json") {
                xhr.open("GET",file,true);
                xhr.responseType=_type;
                var reader=new FileReader();
                xhr.onload=function(event) {
                  reader.readAsText(event.target.response);
                  reader.onload=function(event) {
                    VA.Do(JSON.parse(event.target.result));
                  }
                }
                xhr.send();
              }
              
        } 
  }
  if (rtype==_type)
   {
      xhr.open("GET",file,true);
      xhr.responseType=_type;
       var reader=new FileReader();
                xhr.onload=function(event) {
                  $(document.body).html(event.target.response.body.innerHTML);
                }
                xhr.send();
   }
   return {name:name,date:new Date().toLocaleString(),DONE:xhr.DONE};
}
 
    VA.respon.Control=function() {
        $(document).keydown(function(event)
        {
        if(event.keyCode==39)
        {
            elem.currentTime+=5;
              return false;
        }
         if(event.keyCode==37)
        {
            elem.currentTime-=5;
              return false;
        }
        if(event.keyCode==38)
        {
            
            if(elem.volume>1) {
              elem.volume=1;
            }
            else{
              elem.volume+=0.1;
              if (elem.volume>1) {
                elem.volume=1
              }
            }
              return false;
        }
         if(event.keyCode==40)
        {
            if(elem.volume<0) {
              elem.volume=0;
            }
            else{
              elem.volume-=0.1;
              if (elem.volume<0) {
                elem.volume-=elem.volume
              }
            }
               return false;
        }
         if(event.keyCode==32)
        {
            PlayPause();
             return false;
        }
        if (event.keyCode==13)
        {
          handleFullscreen();
            return false;
        }
        if (event.keyCode==27)
        { 
          event.preventDefault();
            return false;
        }
       
      });
    }

   VA.Audio=function(elemContain,width,height) 
{
  if(elemContain.removeAttribute("data-fullscreen")&&(!elemContain.removeAttribute("data-fullscreen")))
    elemContain.removeAttribute("data-fullscreen");
  if(elemContain.removeAttribute("allowfullscreen")&&(!elemContain.removeAttribute("allowfullscreen")))
    elemContain.removeAttribute("allowfullscreen");
  $(".fi-projection-screen").remove();
}
VA.Audio.Respon=function()
{ 
  VA.methods()["get"]("Audiodmq.css","blob","style");//VA.get()
  $(elemContain).removeClass("small-3 medium-6 large-11 large-12");
}
  VA.Audio.Respon.Control=function()
  {
      $(document).keydown(function(event)
        {
        if(event.keyCode==39)
        {
            elem.currentTime+=5;
            return false;
             
        }
         if(event.keyCode==37)
        {
            elem.currentTime-=5;
            return false;
             
        }
        if(event.keyCode==38)
        {
            
            if(elem.volume>1) {
              elem.volume=1;
            }
            else{elem.volume+=0.1;}
            return false;
             
        }
         if(event.keyCode==40)
        {
            if(elem.volume<0) {
              elem.volume=0;
            }
            else{elem.volume-=0.1;}
            return false;
              
        }
         if(event.keyCode==32)
        {
            PlayPause();
            return false;
        }

      });
  }

  VA.About=function()
  {
    $(".reveal").foundation("open");
    $("#List").css("z-index","0");
    $(tooltip).css("z-index","0");
    $(VA.Control).css("z-index","0");
    //console.info({"version":"0.1","Author":"abdo"});
    return{"version":"0.1","Author":"abdo"};
  }
  VA.init=function()
  {        differX=200;
           differY=200;var pos=0;
           $(VA.Control).css({"transition":"all ease-in-out .6s 1s"});
           $(elem).css({"transition":"all .7s 1s ease"});
         $(elem).click(function()
              {
                PlayPause();
              });
         $(elem).dblclick(function(event)
              {
                if (VA.type=="Video"&&VA.type!=null) {
                    handleFullscreen();}
               if(VA.type==null){event.preventDefault();}
              });

            if (VA.checkwe(navigator.userAgent)=="Trident") 
            {
                VA.hide();
                //if (VA.type=="Audio"||VA.type=="Video") {VA["get"]("../FM/List.json","blob","json");}
            }
            else{
            with(VA.dropped=false){$(VA.Control).show();$(tooltip).show();}}

            $(document).keydown(function(event) {
                  if (event.keyCode==76) {
                  var loop=(elem.loop==false)?true:false;
                  VA["methods"]()["loop"](loop);  
                }
                if (event.keyCode==86) {
                  $("ol").toggle({duration:1000,easing:"linear"},function() {
                    if ($(this).css("display")=="block") {
                      $(this).css("display")="none";
                    }
                    else{$(this).css("display")="block";}
                  });
                }
                if (event.keyCode==67) {
                  $("#controls").toggle({duration:1000,easing:"linear"},function() {
                        if ($(this).css("display")=="block") {
                          $(this).css("display")="none";
                        }
                        else{
                              $(this).css("display")="block";
                            }
                  })
                   $(tooltip).toggle({duration:1000,easing:"linear"},function() {
                        if ($(this).css("display")=="block") {
                          $(this).css("display")="none";
                        }
                        else{
                              $(this).css("display")="block";
                            }
                  })
                }
               
            });
}

 VA.checkete=function(name,ex)
  { name=name.split(".");
    if (ex==name[name.length-1])
    {
      return true;
    }
    return false;
  }
  VA.hide=function() {
    elem.controls=true;
    $(VA.Control).hide();
    $(tooltip).hide();
  }
   VA.args=()=>{
    return{
        elemContain:elemContain,
        elem:elem,
        type:type,
        vtype:vtype,
        Controls:Controls,
        methods:VA["methods"](),
        repeat:repeat
        };
      }

    VA.checkb=function(userAgent,nameb) 
    {
        userAgent=userAgent.split("/");
        userAgent=userAgent[userAgent.length-2].split(" ");
        return(nameb==userAgent[userAgent.length-1])?true:false;
    }
    VA.checkwe=function(userAgent)
    {
      /*var webe=navigator.userAgent.split("/")[1].split(";")[1].split(" ");
      webe=webe[webe.length-1];
      return webe;*/
      var webe=navigator.userAgent.split(" ");
      webe=webe[webe.length-2].split("/");  
      webe=webe[0];
      return webe;
    } 
    VA.new=function() {
      return new VA(elemContain,elem,type,vtype,Controls);
    }
    VA.new.methods=function() {
      var methods={args:VA.args,init:VA.init,autoplay:()=>{with(elem.autoplay=true){$(".fi-play").addClass("fi-pause").removeClass("fi-play");}},repeat:(repeat)=>{return (repeat==true)?true:false},loop:(loop)=>{var repeat=(loop==true)?true:false;return elem.loop=repeat;},Do:VA.Do,list:{init:VA.list,respon:VA.list.respon},get:VA.get,Video:{respon:VA.respon,Control:VA.respon.Control},Audio:{init:VA.Audio,respon:VA.Audio.Respon,Control:VA.Audio.Respon.Control},check:{checkwe:VA.checkwe,checkete:VA.checkete,checkb:VA.checkb}};
      return methods;
    }
    VA.methods=function() {
      return VA.new.methods();
    }
    return {elem:elem,type:type,vatype:vtype,methods:VA.new.methods}; 
}