function getProgress(upid)
{
  var url = "ProcessBar.php";
  $.getJSON(
              url,
              { progress_key: upid,time:(new Date()).getTime() },
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
                           //$("#upstatus").html("Upload finish,processing file,please wait a moment");
						   //alert("上传成功");
							/* $.post("task.php",{action:"upload",fileid:'test_file'},function(data){
							if(data){
                    
							alert("上传成功");
						}
						});*/

						   
                            }
                            }
              )
}


function startProgress(upid)
 {
 
        //检测用户选择的文件是否合法
        /*var file_path=document.forms[0].test_file.value;
        alert(file_path);
        var exp="/^(\S+\.doc)|(\S+\.docx)|(\S+\.xls)|(\S+\.xlsx)|(\S+\.ppt)|(\S+\.pptx)|(\S+\.pdf)|(\S+\.jpg)|(\S+\.png)|(\S+\.jpeg)|(\S+\.rar)$/i";
        if(!exp.test(file_path)){
                alert("您上传的文件格式有误,本系统不支持此格式的文件上传");
               // return false;
        }else{ */
		$("#progressouter").css({ display:"block" });
		setTimeout(function(){
		getProgress(upid);
		}, 100);
	//}
 }
