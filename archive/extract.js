var xhr=new XMLHttpRequest();
  var data=new FormData();
  $(".lime.accent-2 td").children("a").click(function(event) {
    event.preventDefault();
    $path=this.href.split($server);
    $path=$path[$path.length-1];
    $name=$path.split("/");
    $name=$name[$name.length-1];
    xhr.open("POST","Do/ex/"+$name,true);
    data.append("path",encodeURI($path));
    xhr.send(data);
    xhr.onload=function() {
    if ($cookie!="root") {
      data.append("upath",encodeURI("../../"+$cookie+"data/unpacked"));
    }
    else{
       data.append("upath",encodeURI("../../"+"Control/data/unpacked"));
    }
    xhr.open("POST","Do/show",true);
    xhr.responseType="document";
    xhr.send(data);
    xhr.onload=function() {
      var html=xhr.response;
      var tables=html.querySelector("#T2 tbody");
      if (tables.innerHTML!=null||tables!=null) {
      $("#T tbody").html(tables.innerHTML);
      }
        scan();
      } 
    }
});
  function scan() {
    $(".red.accent-1 td").children("a").click(function(event) {
          event.preventDefault();
          xhr.open("POST","Do/scan",true);
          xhr.responseType="document";
          $path=this.href.split($server);
          $path=$path[$path.length-1];
          console.log($path);
          data.append("spath",$path);
          xhr.send(data);
          xhr.onload=function() {
            html=xhr.response;
            var view=html.querySelector("#view tbody");
            if (view!=null||view.innerHTML!=null) {
            $("#view tbody").html(view.innerHTML);}
          $(".blue.accent-1 td").children("a").click(function(event) {
            event.preventDefault();
                $path=this.href.split($server);
                $path=$path[$path.length-1];
                xhr.open("GET",$path,true);
                xhr.responseType="blob";
                xhr.send();
                $(".reveal").foundation("open");
              xhr.onload=function() {
                var reader=new FileReader();
                reader.readAsText(xhr.response);
                reader.onload=function() {
                  $("textarea").val(reader.result);
                }
              }
        });
          scan();
        }
         
      });


  };
$('textarea').trigger('autoresize');