$(document).ready(
function()
{
	$('#dlone >dt').click(function()
	{
		changepng(this);
		$('#dlone >dd').slideToggle('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dltwo >dt').click(function()
	{
		changepng(this);
		$('#dltwo >dd').slideToggle('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dlthree >dt').click(function()
	{		
		changepng(this);
		$('#dlthree >dd').slideToggle('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dlfour >dt').click(function()
	{
		changepng(this);
		$('#dlfour >dd').slideToggle('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dlfive >dt').click(function()
	{
		changepng(this);
		$('#dlfive >dd').slideToggle('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dlsix >dt').click(function(){
		changepng(this);
		$('#dlsix >dd').slideToggle('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlseven >dd').slideUp('fast');
	}).css("cursor","pointer");
	
	$('#dlseven >dt').click(function(){
		changepng(this);
		$('#dlseven >dd').slideToggle('fast');
		$('#dlone >dd').slideUp('fast');
		$('#dltwo >dd').slideUp('fast');
		$('#dlthree >dd').slideUp('fast');
		$('#dlfour >dd').slideUp('fast');
		$('#dlfive >dd').slideUp('fast');
		$('#dlsix >dd').slideUp('fast');
		
	}).css("cursor","pointer");
	
	//show_flag=0;
	$('#job11').click(function(){snAjax(11)});
	$('#job12').click(function(){snAjax(12)});
	
	
	$('#job31').click(function(){snAjax(31)});
	$('#job32').click(function(){snAjax(32)});
	$('#job33').click(function(){snAjax(33)});
	$('#job34').click(function(){snAjax(34)});
	
	$('#job35').click(function(){snAjax(35)});
	$('#job36').click(function(){snAjax(36)});
	$('#job37').click(function(){snAjax(37)});
	$('#job38').click(function(){snAjax(38)});
	
	$('#job39').click(function(){snAjax(39)});
	$('#job40').click(function(){snAjax(40)});
	$('#job41').click(function(){snAjax(41)});
	$('#job42').click(function(){snAjax(42)});
	
	$('#job43').click(function(){snAjax(43)});
	$('#job44').click(function(){snAjax(44)});
	$('#job45').click(function(){snAjax(45)});
	$('#job46').click(function(){snAjax(46)});
	
	$('#job47').click(function(){snAjax(47)});
	$('#job48').click(function(){snAjax(48)});
	$('#job49').click(function(){snAjax(49)});
	
	$('#job50').click(function(){snAjax(50)});
	$('#job51').click(function(){snAjax(51)});
	
	$('#job52').click(function(){snAjax(52)});
	$('#job53').click(function(){snAjax(53)});
	$('#job54').click(function(){snAjax(54)});
	$('#job57').click(function(){snAjax(57)});

	snAjax(00);
});

function snAjax(keys)
{
	var src;
	var html;
	
	switch(keys)
	{
		case 00:
			src = "templates/welcome.php";
			break;
		case 11:
			src = "templates/kindedit/php/dyinfo_add.php";
			break;
		case 12:
			src = "templates/kindedit/php/dyinfo_show.php";
			break;
			
		case 31:
			src = 'templates/kindedit/php/coreinfo_add.php';
			
			break;
		case 32:
			src = 'templates/kindedit/php/coreinfo_show.php';
			break;
		case 33:
			src = 'templates/kindedit/php/service_add.php';
			break;
		case 34:
			src = 'templates/kindedit/php/service_show.php';
			break;
		case 35:
			src = 'templates/kindedit/php/result_add.php';
			break;
		case 36:
			src = 'templates/kindedit/php/result_show.php';
			break;
		case 37:
			src = 'templates/kindedit/php/test_req_add.php';
			break;
		case 38:
			src = 'templates/kindedit/php/test_req_show.php';
			break;
		case 39:
			src = 'templates/kindedit/php/member_add.php';
			break;
		case 40:
			src = 'templates/kindedit/php/member_show.php';
			break;
		case 41:
			src = 'templates/kindedit/php/download_add.php';
			break;
		case 42:
			src = 'templates/kindedit/php/download_show.php';
			break;
		case 43:
			src = 'templates/kindedit/php/quest_show.php';
			break;
		case 44:
			src = 'templates/kindedit/php/message_show.php';
			break;
		case 45:
			src = 'templates/welcome.php';
			break;
		case 46:
			src = 'templates/kindedit/php/connect_modify.php';
			break;
		case 47:
			src = 'templates/kindedit/php/reguser_show.php';
			break;
                case 57:
                        src = 'templates/kindedit/php/user_downshow.php';
                        break;

		case 48:
			src = 'templates/manage_add.php';
			break;
		case 49:
			src = 'templates/manage_show.php';
			break;
		case 50:
			src = 'templates/kindedit/php/frilink_add.php';
			break;
		case 51:
			src = 'templates/kindedit/php/frilink_show.php';
			break;
		case 52:
			src = 'templates/kindedit/php/employ_manage.php';
			break;
		case 53:
			src = 'templates/kindedit/php/work_manage.php';
			break;
		case 54:
			src = 'templates/kindedit/php/attend_manage.php';
			break;
		
		default:
		   alert('Error Id!!');
	}
	
   $("#right").html('');//清空内容区的内容
   html = '<iframe align="absmiddle" scrolling="no" width="100%" height="100%" src="'+src+'" id="iframe" name="iframe" frameborder="no"></iframe>';

   $("#right").html(html);
   return true;	
}

function changepng(obj)
{
	$('dt').find(".lastimg").attr("src","images/up.png");
	if($(obj).find(".lastimg").attr("src")=="images/up.png")
		{
			$(obj).find(".lastimg").attr("src","images/down.png");
		}
	else
		$(obj).find(".lastimg").attr("src","images/up.png");
}
//以下采用Ajax技术更新测试节点的状态
