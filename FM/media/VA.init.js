function checkb(userAgent,nameb) 
  {
    userAgent=userAgent.split("/");
    userAgent=userAgent[userAgent.length-2].split(" ");
    return(nameb==userAgent[userAgent.length-1])?true:false;
  }
function checkwe(userAgent)
  {
    var webe=navigator.userAgent.split(" ");
    webe=webe[webe.length-2].split("/");	
    webe=webe[0];
    return webe;
  }  
var Video=document.getElementsByTagName("video")[0];
var tooltip=document.getElementsByClassName("tooltip");
var figure=document.getElementsByClassName("video-player")[0];
var Controls=document.getElementById("controls");
var check=prompt("Audio||Video: ");
var _V;
var _A;//Only Choice [Video||Audio]---> [1,1]=>Audio , [0,1]||[1,0] => Video   
var plg;
var type;
var vatype;
function init(figure,Video,type,vtype,Controls)
{
  var figure=this.figure;
  var Video=this.Video;
  var type=this.type;
  var vtype=this.vatype;
  var Controls=this.Controls;
  return new VA(figure,Video,type,vtype,Controls);
}
       $(document).ready(function() { 
        if (check=="Audio") {
           _V=1;
           _A=1;
           Video.onplaying=function() 
           {
              $(Video).addClass("animated infinite bounce");
           }
           Video.onpause=function()
           {
              $(Video).removeClass("animated infinite bounce");
           }
        }
        if (check=="Video")
        {
           _V=0;
           _A=0;
        }
   $(document).foundation();
     vatype="MP3";
   if (_V&_A==1)//Audio
   {
      if (checkwe(navigator.userAgent)=="Gecko") {
        type="Video"&&"Audio";
        vatype="MP4"&&"MP3";
      }
      if (checkwe(navigator.userAgent)=="Webkit")
        {
          type="Video"&&"Audio";
          vatype="MKV"&&"MP3";
        }
      if (checkwe(navigator.userAgent)=="Trident") 
        {
          type="Video"&&"Audio";
          vatype="WMA"&&"MP3";

        }
   }
   else//Video
   {
      if (checkwe(navigator.userAgent)=="Gecko") {
        type="Video"||"Audio";
        vatype="MP4"||"MP3";
      }
      if (checkwe(navigator.userAgent)=="Webkit")
        {
          type="Video"||"Audio";
          vatype="MKV"||"MP3";
        }
        if (checkwe(navigator.userAgent)=="Trident") 
        {
          type="Video"||"Audio";
          vatype="MP4"||("WMV"||"MP3");
        }
   }

   plg=new VA(figure,Video,type,vatype,Controls)
  //init(figure,Video,type,vatype,Controls); 
    //plg= VA;
    //plg(figure,Video,type,vatype,Controls);
    var src;
    var source=[];
    $("#volume").on("moved.zf.slider",function()
    {
      Video.volume=(parseInt($(this).children(".slider-handle").css("left"))/$(this).width())/10;
  });  
    //plg.methods().init();
    plg["methods"]()["init"]();
    //plg.init();
    plg["methods"]()["get"]("../VAList.json","blob","json");
    if (Video.loop==true)
    {
      $("fi-play").removeClass("fi-play").addClass("fi-pasue");
    }
     
     $(".video-bar").click(function(event) {
        var pos=(event.pageX-this.offsetTop-this.offsetLeft)/this.offsetWidth;
        Video.currentTime=pos*Video.duration;
         console.log("X:"+event.pageX);
    });
});