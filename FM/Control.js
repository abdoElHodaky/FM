setTimeout(function() {
	$("button").removeClass("ui-btn ui-shadow ui-corner-all");
	
},100);
	$(document).foundation();
		var value;var vname;
		var xhr=new XMLHttpRequest();
		var data=new FormData();		
$(".warning td").children("a").click(function(event)
	{	
		event.preventDefault();
		var a=this;
		var _name=a.href.split($server);
		_name=_name[_name.length-1];
		var name=a.href.split("/");
		vname=name[name.length-1];
		name=name[name.length-1].split(".");
		var ext=name[name.length-1];
		with($("#View").foundation("open"))
		{	
			xhr.open("GET",a.href,true);
			xhr.responseType="blob";
			xhr.send();
			xhr.onload=function() {
			var file=xhr.response;
				var reader=new FileReader();
				if (ext=="json"||ext=="css"||ext=="txt"||ext=="js"||ext=="scss"||ext=="less"||ext=="jsm"||ext=="cs") {
				reader.readAsText(file);
				reader.onload=function(event) {
					var result;
					result=event.target.result;
					$("pre").eq(1).html(result+"<br>");
					$("#View").css({"width":"100%","height":"50%"});
					$("#edit").show();
					$("#edit").click(function(event) {
						$("#Value").val($.trim(result));
						value=$("#Value").val();
						$("#Edit").css({"width":"100%","height":"100%"})
					});
						
					}
				}
					if (ext=="png"||ext=="gif"||ext=="svg"||ext=="jpg")
					{	
						reader.readAsDataURL(file);
						reader.onload=function(event) {
						var result=event.target.result;
						$("pre").children().eq(1).attr("src",result);
						$("#View").css({"width":"50%","height":"50%"});
						$("#edit").hide();
						}
						var vs=new Viewer(document.getElementById('img'),{"navbar":false,"toolbar":false});
					}
			}

		}

		$("#View").on("closed.zf.reveal",function() {
			$("pre").eq(1).text(null);
			$("pre").children().eq(1).attr("src","");
			$("#DV").css({"width":"100%","height":"100%"});
		$("input[value=save]").click(function() {$(".reveal").foundation("close");});

		$("#Edit form").submit(function(event)
		{
			event.preventDefault();
			
			xhr.open("POST","Do/edit/"+vname,true);
			data.append("vname",_name);
			data.append("NValue",$("#Value").val());
			xhr.onload=function() {
				console.log(xhr.response);
			};	
			xhr.send(data);
		});

	});
		$("#delete").click(function(event)
			{
				event.preventDefault();
				$(".reveal").foundation("close");
				
				xhr.open("POST","Do/delete/"+vname,true);
				
				data.append("vname",_name);
				data.append("delete",true);
				xhr.send(data);
				xhr.onload=function()
				{
					console.log(xhr.response);
				}

				

			});

		$(".fi-download").click(function() {
			$(".fi-download").attr("href",a.href).attr("download",vname);
		});


	});
		$("#Create form").submit(function(event) {
			event.preventDefault();
			if (($("input[name=FName]").val()==""||$("textarea[name=Content]").val()=="")||($("input[name=FName]").val()==""&&$("textarea[name=Content]").val()=="")) 
			{
				document.location.reload();
			}
			else
			{	
				data.append("FName",$("input[name=FName]").val());
				data.append("Content",$("textarea[name=Content]").val());
				data.append("FPath",$("input[name=FPath]").val());
			}
			xhr.open("POST","Do/add/"+$("input[name=FName]").val(),true);
			xhr.onload=function()
			{
				console.log(xhr.response);
			}
			xhr.send(data);
		});
		$("input[value=Create]").click(function() {$(".reveal").foundation("close");});

		$("#VM").on("closed.zf.reveal",function() {
			console.log("closed");
		});
		var doc;
		$("#VD form").submit(function(event)
			{
				event.preventDefault();
				
				xhr.open("POST","Do/scan",true);
				
				xhr.responseType="document";
				if ($("input[name=VDN]").val()=="") {
					$("#VD").foundation("close");
				}
				else{

					if ($cookie!="root"&&$("input[name=VDN]").val()!="../") {
						data.append("VDN",$("input[name=VDN]").val());
					}
					if ($cookie=="root") {
						data.append("VDN",$("input[name=VDN]").val());
					}
				}
				xhr.send(data);
				xhr.onload=function(event) {
					var html=event.target.response;
					doc=html;
					var T1=doc.querySelector("#T1")
					$("#T4").html(T1.innerHTML);
					$("#VD").append($("#T4"));
					var i=0;var scripts;
					for (i = 0; i < doc.scripts.length&&doc.scripts.length<=2; i++) {
						$(document.body).append("<script>"+doc.scripts[i].innerHTML+"</script>");
						scripts=document.querySelectorAll("script");
						if(scripts.length>9){
							$(scripts).eq(scripts.length-1).remove();
							$(scripts).eq(scripts.length-2).remove();
						}
					}

					}
			});
$("#Console input ").keydown(function(event)
	{
		if (event.keyCode==13) {
			
			if ($("input[name=command]").val()!="") {
				xhr.open("POST","exec",true);
				data.append("command",$("input[name=command]").val());}
				xhr.send(data);
			xhr.onload=function(event) {
				$("#Console").css({"width":"100%","height":"100%"});
				$("#Console pre").html(event.target.response);
			}
		}
	});
$("#Console").on("closed.zf.reveal",function() {
$("input[name=command]").val(null);
$("#Console pre").text(null);
});
	$(".darken-1.lime.white-text td").children("a").click(function(event) {
		event.preventDefault();
		
		var $name=this.href.split($server);
		var $path=$name[$name.length-1];
		$name=$path.split("/");
		$name=$name[$name.length-1];
		data.append("path",encodeURI($path));
		xhr.open("POST","Do/show/"+$name,true);
		xhr.responseType="document";
		xhr.send(data);
		xhr.onload=function() {
			$doc=xhr.response;
			var code=$doc.querySelector("code").innerHTML;
			$("#View pre").eq(1).text(code);
			with($("#View").foundation("open")){
				var result=$("#View pre").eq(1).text();
				$("#edit").click(function(event) {
						$("#Value").val($.trim(result));
						$("#Edit").css({"width":"100%","height":"100%"})
					});
			}
			$("#Edit form").submit(function(event)
		{	
			event.preventDefault();
			$("#Edit").foundation("close");
			
			xhr.open("POST","Do/edit/"+$name,true);
			data.append("vname",encodeURI($path));
			data.append("NValue",$("#Value").val());
			xhr.onload=function(event) {
				console.log(event.target.response);
			};	
			xhr.send(data);
		});

	
		$("#delete").click(function(event)
			{
				event.preventDefault();
				$(".#delete").foundation("close");
				
				xhr.open("POST","Do/delete/"+$name,true);
				
				data.append("vname",encodeURI($path));
				data.append("delete",true);
				xhr.onload=function(event)
				{
					console.log(event.target.response);
				}
				xhr.send(data);
				

			});
		}
	});
var $doc;
var T=document.querySelectorAll("table");
var xhr=new XMLHttpRequest();
var data=new FormData();
Do();
function Do() {
$("table .alert a").click(function(event) {
	event.preventDefault();
	var dir=this.href||String.toLowerCase(this.href);
	dir=($server=="localhost"||$server==location.host)?dir=dir.split($server):false;
	dir=dir[dir.length-1];
	var empty=true;
	//data.append("dir",dir);
	data.append("DN",dir);
	data.append("empty",empty);
	xhr.open("POST","Do/scan",true);
	//xhr.open("POST","scan",true);
	xhr.send(data);
	xhr.responseType="document";
	xhr.onload=function(event) {
		var html=event.target.response;
		var T2=html.querySelector("#T2");
		if (T2!=null) {
		$("#T3").html(T2.innerHTML);
		with($("#T3").children("thead").children().children().eq(2).remove())
		{
			$("#DV").append($("#T3"));
			$("#DV").foundation("open");
		}
		}
		$(".warning td").children("a").click(function(event)
	{	
		event.preventDefault();
		var a=this;
		var _name=a.href.split($server);
		_name=_name[_name.length-1];
		var name=a.href.split("/");
		vname=name[name.length-1];
		name=name[name.length-1].split(".");
		var ext=name[name.length-1];
		with($("#View").foundation("open"))
		{	
			xhr.open("GET",a.href,true);
			xhr.responseType="blob";
			xhr.send();
			xhr.onload=function() {
			var file=xhr.response;
				var reader=new FileReader();
				if (ext=="json"||ext=="css"||ext=="txt"||ext=="js"||ext=="jsm"||ext=="less"||ext=="scss"||ext=="cs") {
				reader.readAsText(file);
				reader.onload=function(event) {
					var result=event.target.result;
					$("pre").eq(1).html(result+"<br>");
					$("#View").css({"width":"100%","height":"50%"});
					$("#edit").show();
					$("#edit").click(function(event) {
						$("#Value").val($.trim(result));
						value=$("#Value").val();
						$("#Edit").css({"width":"100%","height":"100%"})
					});
						
					}
				}
					if (ext=="png"||ext=="gif"||ext=="svg"||ext=="jpg")
					{
						reader.readAsDataURL(file);
						reader.onload=function(event) {
						var result=event.target.result;
						$("pre").children().eq(1).attr("src",result);
						$("#View").css({"width":"50%","height":"50%"});
						$("#edit").hide();
						}
							var vs=new Viewer(document.getElementById('img'),{"navbar":false,"toolbar":false});
					}
					/*if (ext=="mp3"||ext=="mp4"||ext=="mkv") {
						$("#DV video").attr("src",URL.createObjectURL(file));
						$("#View").foundation("close");
						$("#DV").foundation("open");
					}*/
				
			}

		}

		$("#View").on("closed.zf.reveal",function() {
			$("pre").eq(1).text(null);
			$("pre").children().eq(1).attr("src",null);
			$("#DV").css({"width":"100%","height":"100%"});
		$("input[value=save]").click(function() {$(".reveal").foundation("close");});
		var xhr=new XMLHttpRequest();
		
		$("#Edit form").submit(function(event)
		{
			event.preventDefault();
			var data=new FormData();
			xhr.open("POST","Do/edit/"+vname,true);
			data.append("vname",_name);
			data.append("NValue",$("#Value").val());
			xhr.onload=function(event) {
				console.log(event.target.response);
			};	
			xhr.send(data);
		});

	});
		$("#delete").click(function(event)
			{
				event.preventDefault();
				$(".reveal").foundation("close");
				var xhr=new XMLHttpRequest();
				xhr.open("POST","Do/delete/"+vname,true);
				var data=new FormData();
				data.append("vname",_name);
				data.append("delete",true);
				xhr.onload=function(event)
				{
					console.log(event.target.response);
				}
				xhr.send(data);
				

			});

		$(".fi-download").click(function() {
			$(".fi-download").attr("href",a.href).attr("download",vname);
		});


	});
	if ($cookie=="root") {
	$(".darken-1.lime.white-text td").children("a").click(function(event) {
		event.preventDefault();

		var $name=this.href.split($server);
		var $path=$name[$name.length-1];
		$name=$path.split("/");
		$name=$name[$name.length-1];
		data.append("path",$path);
		xhr.open("POST","Do/show/"+$name,true);
		xhr.responseType="document";
		xhr.send(data);
		xhr.onload=function() {
			$doc=xhr.response;
			var code=$doc.querySelector("code").innerHTML;
			$("#View pre").eq(1).text(code);
			with($("#View").foundation("open")){
				var result=$("#View pre").eq(1).text();
				$("#edit").click(function(event) {
						$("#Value").val($.trim(result));
						$("#Edit").css({"width":"100%","height":"100%"})
					});
			}
			$("#Edit form").submit(function(event)
		{	
			event.preventDefault();
			$("#Edit").foundation("close");
			
			xhr.open("POST","Do/edit/"+$name,true);
			data.append("vname",$path);
			data.append("NValue",$("#Value").val());
			xhr.onload=function(event) {
				console.log(event.target.response);
			};	
			xhr.send(data);
		});

	
		$("#delete").click(function(event)
			{
				event.preventDefault();
				$(".#delete").foundation("close");
				
				xhr.open("POST","Do/delete/"+$name,true);
				
				data.append("vname",$path);
				data.append("delete",true);
				xhr.onload=function(event)
				{
					console.log(event.target.response);
				}
				xhr.send(data);
				

			});
		}
	});
	}
		Do();
		
	}
	
});
	for (var i of data.entries()){
		data.delete(i[0])
		}
}