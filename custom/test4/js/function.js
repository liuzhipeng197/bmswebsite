	function isTel(object)
            {
            //���Ҵ���(2��3λ)-����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"

             var s =document.getElementById(object).value; 
             var pattern =/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/;
             //var pattern =/(^[0-9]{3,4}\-[0-9]{7,8}$)|(^[0-9]{7,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/; 
                 if(s!="")
                 {
                     if(!pattern.exec(s))
                     {
                      //alert('��������ȷ�ĵ绰����:�绰�����ʽΪ���Ҵ���(2��3λ)-����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"');
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
                      //alert('��������ȷ�������ַ');
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
                       //alert('��������ȷ���ֻ�����');
                       //object.value="";
                       //object.focus();
                       return false;
                    }else {
                     	return true;
                     }
                }
       }
       
       //У��(����)��������
	function isZip(object)
       {
             var s =document.getElementById(object).value; 
             var pattern =/^[0-9]{6}$/;
                 if(s!="")
                 {
                     if(!pattern.exec(s))
                     {
                      //alert('��������ȷ����������');
                      //object.value="";
                      //object.focus();
                      return false;
                     }else {
                     	return true;
                     }
                 }
        }
        
      function ReadFile(filespec){ //����Ĳ������ļ�����·�� 
    		var fso  = new ActiveXObject("Scripting.FileSystemObject"); 
    		var file = fso.OpenTextFile(filespec); 
    		var text = file.ReadLine(); 
    		file.Close(); 
    		return text;
    		//alert("Text content:"+text); 
		}

      function exitsystem(){
        if(confirm ("��ȷ��Ҫ�˳�ϵͳ��")){
                jQuery.post("task.php",{action:"user_exit"},function(data){
                        //alert('ϵͳ�Ƴ��ɹ�');
                        window.location.href="../index.php";

                });

        }      

}

