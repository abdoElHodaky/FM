var chunknums=3;
var media=new MediaSource();
Video.src=URL.createObjectURL(media);
function GET(File)
{
 
    var xhr=new XMLHttpRequest();
 xhr.open("GET",File,true);
    xhr.responseType="arraybuffer";
    xhr.onload=function()
    {
        Read(new Uint8Array(xhr.response));
    }
    xhr.send();
}
var i=0;var chsize;var Source;
function Read(unit8Array)
{
    Source=media.addSourceBuffer('video/webm; codecs="vorbis,vp8"');
    
    var R=new Blob([unit8Array],{type:"video/webm"});
    var chunksize=R.size/chunknums;
    chsize=chunksize;
    subRead(i);

    function subRead(i)
    {
        var Reader=new FileReader();
        Reader.onload=function()
        {
            Source.appendBuffer(new Uint8Array(Reader.result));
            if(i==chunknums-1)
            {
                media.endOfStream();
            }
            else{
                Video.play();
                subRead(i++);
            }
        }
        var startByte=chsize*i;
        var chunk=R.slice(startByte,chunksize+startByte)
        Reader.readAsArrayBuffer(chunk);
    }
}
media.addEventListener('sourceopen', Read, false);
media.addEventListener('mozsourceopen', Read, false);