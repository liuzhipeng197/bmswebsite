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
						   //alert("�ϴ��ɹ�");
							/* $.post("task.php",{action:"upload",fileid:'test_file'},function(data){
							if(data){
                    
							alert("�ϴ��ɹ�");
						}
						});*/

						   
                            }
                            }
              )
}


function startProgress(upid)
 {
 
        //����û�ѡ����ļ��Ƿ�Ϸ�
        /*var file_path=document.forms[0].test_file.value;
        alert(file_path);
        var exp="/^(\S+\.doc)|(\S+\.docx)|(\S+\.xls)|(\S+\.xlsx)|(\S+\.ppt)|(\S+\.pptx)|(\S+\.pdf)|(\S+\.jpg)|(\S+\.png)|(\S+\.jpeg)|(\S+\.rar)$/i";
        if(!exp.test(file_path)){
                alert("���ϴ����ļ���ʽ����,��ϵͳ��֧�ִ˸�ʽ���ļ��ϴ�");
               // return false;
        }else{ */
		$("#progressouter").css({ display:"block" });
		setTimeout(function(){
		getProgress(upid);
		}, 100);
	//}
 }
