function getProgress(upid)
{
  var url = "ProcessBar.php";
  $.getJSON(
              url,
              { progress_key: upid ,time:(new Date()).getTime()},
              function(json){
                           $("#progressinner").width(json.per+"%");
                           $("#upstatus").html('filesize:'+json.total+'KB'+' '+'uploaded:'+json.current+'KB');
                           if (json.per < 100)
                           {
                                 setTimeout(function(){
                                  getProgress(upid);
                                  }, 10);
                           }
                           else
                           {
                           $("#upstatus").html("Upload finish,processing file,please wait a moment");
                            }
                            }
              )
}


function startProgress(upid)
 {
 $("#progressouter").css({ display:"block" });
 setTimeout(function(){
 getProgress(upid);
 }, 100);
 }
