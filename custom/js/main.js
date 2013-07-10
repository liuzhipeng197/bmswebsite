//tab切换功能
function switchtabTag(tabtag,tabcontent,tabk)
{
	for(i=1; i <=4; i++)
	{
		if(i==tabk){
			document.getElementById(tabtag+i).className="menuOn";
		}
		else{
			document.getElementById(tabtag+i).className="menuNo";
		}
	}
}

function changeTab(i){
	if(i == 1){
		$("#stortest").css('display','block');
		$("#nodemonitor").css('display','none');
		$("#setparameter").css('display','none');
		$("#useradmin").css('display','none');
		$("#node_manage").css('display','none');
	}
	if(i == 2){
		$("#stortest").css('display','none');
		$("#nodemonitor").css('display','block');
		$("#setparameter").css('display','none');
		$("#useradmin").css('display','none');
		$("#node_manage").css('display','none');
	}
	if(i == 3){
		$("#stortest").css('display','none');
		$("#nodemonitor").css('display','none');
		$("#setparameter").css('display','block');
		$("#useradmin").css('display','none');
		$("#node_manage").css('display','none');
	}
	/*if(i == 4){
		$("#stortest").css('display','none');
		$("#nodemonitor").css('display','none');
		$("#setparameter").css('display','none');
		$("#useradmin").css('display','block');
		$("#node_manage").css('display','none');
	}*/
	if(i == 4){
		$("#stortest").css('display','none');
		$("#nodemonitor").css('display','none');
		$("#setparameter").css('display','none');
		$("#useradmin").css('display','none');
		$("#node_manage").css('display','block');
	}
}
function validate_required(field,text)
{
	with(field)
	{
		if(value==null||value=="") {alert(text);return false;}
		else return true;
	}
}
function validate_form(thisform)
{
	with(thisform)
	{
		if(validate_required(username,"请输入用户名")==false){username.focus();return false;}
		if(validate_required(pwd,"请输入密码")==false){pwd.focus();return false;}
		
	}
	
}


