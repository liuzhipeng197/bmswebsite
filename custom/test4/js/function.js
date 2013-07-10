	function isTel(object)
            {
            //国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)"

             var s =document.getElementById(object).value; 
             var pattern =/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
             //var pattern =/(^[0-9]{3,4}\-[0-9]{7,8}$)|(^[0-9]{7,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/; 
                 if(s!="")
                 {
                     if(!pattern.exec(s))
                     {
                      //alert('请输入正确的电话号码:电话号码格式为国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)"');
                      //object.value="";
                      //object.focus();
                      return false;
                     }else {
                     	return true;
                     }
                 }
            }
            
	function isEmail(object)
          { 
        	var s =document.getElementById(object).value; 
             var pattern =/^[a-zA-Z0-9_\-]{1,}@[a-zA-Z0-9_\-]{1,}\.[a-zA-Z0-9_\-.]{1,}$/;
                 if(s!="")
                 {
                     if(!pattern.exec(s))
                     {
                      //alert('请输入正确的邮箱地址');
                      //document.getElementById(object).value="";
                      //document.getElementById(object).focus();
                      	return false;
                     }else {
                     	return true;
                     }
                 }
                             
        }
	 function isMobile(object)
		{
            var s =document.getElementById(object).value; 
            var reg0 = /^1[358]\d{9}$/;

           
            var my = false;
            if (reg0.test(s))my=true;
           
                if(s!="")
                {
                    if (!my)
                    {
                       //alert('请输入正确的手机号码');
                       //object.value="";
                       //object.focus();
                       return false;
                    }else {
                     	return true;
                     }
                }
       }
       
       //校验(国内)邮政编码
	function isZip(object)
       {
             var s =document.getElementById(object).value; 
             var pattern =/^[0-9]{6}$/;
                 if(s!="")
                 {
                     if(!pattern.exec(s))
                     {
                      //alert('请输入正确的邮政编码');
                      //object.value="";
                      //object.focus();
                      return false;
                     }else {
                     	return true;
                     }
                 }
        }
        
      function ReadFile(filespec){ //传入的参数是文件所在路径 
    		var fso  = new ActiveXObject("Scripting.FileSystemObject"); 
    		var file = fso.OpenTextFile(filespec); 
    		var text = file.ReadLine(); 
    		file.Close(); 
    		return text;
    		//alert("Text content:"+text); 
		}

      function exitsystem(){
        if(confirm ("您确定要退出系统吗？")){
                jQuery.post("task.php",{action:"user_exit"},function(data){
                        //alert('系统推出成功');
                        window.location.href="../index.php";

                });

        }      

}

