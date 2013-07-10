var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");

var guides={
	'a_xxygj' : {
		'a_dxyyj' : {
			'a_dxyyj_1' : ['短信收发','#'],
			'a_dxyyj_2' : ['邮件中心','read.htm'],
			'a_dxyyj_3' : ['话题管理','#']
		},
		'a_rsytx' : {
				'a_rsytx_1' : ['个人日志','#'],
				'a_rsytx_2' : ['日程安排','#']
		},
		'a_grxx' : {
				'a_grxx_1' : ['个人信息','#']
		},
		'a_kjgl' : {
				'a_kjgl_1' : ['空间管理','#']
		},
		'a_grgj' : {
				'a_grgj_1' : ['名片与好友','#'],
				'a_grgj_2' : ['个人理财','#'],
				'a_grgj_3' : ['计算器','#'],
				'a_grgj_4' : ['便签与提醒','#'],
				'a_grgj_5' : ['便捷标签','#'],
				'a_grgj_6' : ['邮编区号','#'],
				'a_grgj_7' : ['电话号码查询','#'],
				'a_grgj_8' : ['IP查询','#'],
				'a_grgj_9' : ['航班列车时刻表','#']}},
	'b_rsykq' : {
		'b_rsjg' : {
			'b_rsjg_1' : ['信息维护','#'],
			'b_rsjg_2' : ['调动分配','#'],
			'b_rsjg_3' : ['离职人员','#'],
			'b_rsjg_4' : ['部门人事','#'],
			'b_rsjg_5' : ['全体人事','#'],
			'b_rsjg_6' : ['人事字典','#']
         },
		'b_kqgl' : {
				'b_kqgl_1' : ['请假销假','#'],
				'b_kqgl_2' : ['销假核准','#'],
				'b_kqgl_3' : ['加班确认','#'],
				'b_kqgl_4' : ['加班核准','#'],
				'b_kqgl_5' : ['统计生成','#'],
				'b_kqgl_6' : ['统计查询','#'],
				'b_kqgl_7' : ['个人查询','#'],
				'b_kqgl_8' : ['全部查询','#'],
				'b_kqgl_9' : ['参数维护','#'],
				'b_kqgl_10' : ['设置假日','#'],
				'b_kqgl_11' : ['类别维护','#'],				
				'b_kqgl_12' : ['假条统计','#']}},
	'c_jhyhy' : {
		'c_gzjh' : {
			'b_gzjh_1' : ['报告类别','#'],
			'b_gzjh_2' : ['计划类别','#'],
			'b_gzjh_3' : ['工作计划','#'],
			'b_gzjh_4' : ['填写日志','#'],
			'b_gzjh_5' : ['部门日志','#'],
			'b_gzjh_6' : ['全体日志','#'],
			'b_gzjh_7' : ['部门计划','#'],
			'b_gzjh_8' : ['全部计划','#'],
			'b_gzjh_9' : ['日志参数','#']
         },
		'c_hygl' : {
				'b_hygl_1' : ['视频会议','#'],
				'b_hygl_2' : ['会议室管理','#'],
				'b_hygl_3' : ['会议室查询','#'],
				'b_hygl_4' : ['会议登记','#'],
				'b_hygl_5' : ['会议通知','#'],
				'b_hygl_6' : ['会议纪要','#'],
				'b_hygl_7' : ['会议信息','#']}},
	'd_gwysp' : {
		'd_gwlz' : {
			'd_gwlz_1' : ['发文拟制','#'],
			'd_gwlz_2' : ['收文登记','#'],
			'd_gwlz_3' : ['公文办理','#'],
			'd_gwlz_4' : ['公文催办','#'],
			'd_gwlz_5' : ['公文跳转','#'],
			'd_gwlz_6' : ['归档销毁','#'],
			'd_gwlz_7' : ['公文查询','#'],
			'd_gwlz_8' : ['参数设置','#']
         },
		'd_spdj' : {
				'd_spdj_1' : ['事务审批','#'],
				'd_spdj_2' : ['事务登记','#'],
				'd_spdj_3' : ['事务打印','#'],
				'd_spdj_4' : ['申请类别','#'],
				'd_spdj_5' : ['事务查询','#']}},				
	'e_ykybx' : {
		'e_ykgl' : {
			'e_ykgl_1' : ['用款登记','#'],
			'e_ykgl_2' : ['归还登记','#'],
			'e_ykgl_3' : ['个人用款','#'],
			'e_ykgl_4' : ['全部用款','#'],
			'e_ykgl_5' : ['用款统计','#'],
			'e_ykgl_6' : ['类别维护','#']
         },
		'e_bxgl' : {
				'e_bxgl_1' : ['领款登记','#'],
				'e_bxgl_2' : ['个人报销','#'],
				'e_bxgl_3' : ['全部报销','#'],
				'e_bxgl_4' : ['报销统计','#'],
				'e_bxgl_5' : ['类别维护','#'],
				'e_bxgl_6' : ['字典维护','#'],
				'e_bxgl_7' : ['产品信息','#']}},				
	'f_bgycl' : {
		'f_bgyp' : {
			'f_bgyp_1' : ['用品管理','#'],
			'f_bgyp_2' : ['预算管理','#'],
			'f_bgyp_3' : ['用品采购','#'],
			'f_bgyp_4' : ['用品统计','#'],
			'f_bgyp_5' : ['部门统计','#'],
			'f_bgyp_6' : ['库存报警','#'],
			'f_bgyp_7' : ['用品类别','#']			
         },
		'f_clgl' : {
				'f_clgl_1' : ['车辆信息','#'],
				'f_clgl_2' : ['油耗登记','#'],
				'f_clgl_3' : ['里程补贴','#'],
				'f_clgl_4' : ['维修情况','#'],
				'f_clgl_5' : ['用车情况','#']}},				
	'g_zlywd' : {
		'g_zlgl' : {
			'g_zlgl_1' : ['资料信息','#'],
			'g_zlgl_2' : ['借阅申请','#'],
			'g_zlgl_3' : ['借阅回复','#'],
			'g_zlgl_4' : ['借阅登记','#'],
			'g_zlgl_5' : ['归还登记','#'],
			'g_zlgl_6' : ['缺库登记','#'],
			'g_zlgl_7' : ['缺库查询','#'],
			'g_zlgl_8' : ['资料统计','#'],
			'g_zlgl_9' : ['字典维护','#']
         },
		'g_wdgl' : {
				'g_wdgl_1' : ['类别管理','#'],
				'g_wdgl_2' : ['文档发布','#'],
				'g_wdgl_3' : ['文档查询','#']}},
	'h_khyzc' : {
		'h_zcgl' : {
			'h_zcgl_1' : ['资产信息','#'],
			'h_zcgl_2' : ['使用管理','#'],
			'h_zcgl_3' : ['部门资产','#'],
			'h_zcgl_4' : ['全部资产','#'],
			'h_zcgl_5' : ['字典维护','#']
         },
		'h_khzy' : {
				'g_wdgl_1' : ['销售人员','#'],
				'g_wdgl_2' : ['客户管理','#'],
				'g_wdgl_3' : ['联系记录','#'],
				'g_wdgl_4' : ['订单情况','#'],
				'g_wdgl_5' : ['销售情况','#'],
				'g_wdgl_6' : ['联系人员','#']}},

	'glmk' : {
		'glmk_1' : {
			'glmk_1_1' : ['档案管理模块','module/dagl/frame.htm'],
			'glmk_1_2' : ['模块','#'],
			'glmk_1_n' : ['模块','#']}},

    'system' : {
		'system_1' : {
			'system_1_1' : ['全局设置','#'],
			'system_1_2' : ['机构设置','#'],
			'system_1_3' : ['权限管理','#'],
			'system_1_4' : ['人员管理','#'],
			'system_1_5' : ['空间管理','#'],
			'system_1_6' : ['导航管理','#'],
			'system_1_7' : ['历史记录','#'],
			'system_1_8' : ['数据备份','#']}},
	'common' : {
		//'diy' : {
		//	'diy_1' : ['短信收发','#'],
		//	'diy_2' : ['空间管理','#'],
		//	'diy_3' : ['全局设置','#'],
		//	'diy_4' : ['便签管理','#'],
		//	'diy_5' : ['日志管理','#'],
		//	'diy_6' : ['历史记录','#']},
        'diy1' : {
			'diy1_1' : ['机构管理','jggl.htm'],
			'diy1_2' : ['模块管理','mkgl.htm'],
			'diy1_3' : ['用户管理','yhgl.htm'],
			'diy1_4' : ['操作日志','rz.htm']},
        'diy2' : {
			'diy2_1' : ['职务管理','zwgl.htm'],
			'diy2_2' : ['子机构管理','zjggl.htm'],
			'diy2_3' : ['其他信息类型','zwgl.htm'],
			'diy2_4' : ['用户搜索','yhss.htm'],
			'diy2_5' : ['学历统计','xltj.htm'],
			'diy2_6' : ['查看个人信息','grxx.htm']},
        'diy3' : {
			'diy3_1' : ['日程类型列表','read.htm'],
			'diy3_2' : ['日程地点列表','#'],
			'diy3_3' : ['个人日程信息','#'],
			'diy3_4' : ['雇员日程信息','#']},
        'diy4' : {
			'diy4_1' : ['公文类型列表','read.htm'],
			'diy4_2' : ['公文标题列表','#'],
			'diy4_3' : ['公文模板列表','#'],
			'diy4_4' : ['公文路径列表','#'],
			'diy4_5' : ['创建传阅公文','#'],
			'diy4_6' : ['发送传阅公文列表','#'],
			'diy4_7' : ['收到传阅公文列表','#'],
			'diy4_8' : ['创建审批公文','#'],
			'diy4_9' : ['发送审批公文列表','#'],			
			'diy4_10' : ['收到审批公文列表','#']},
        'diy5' : {
			'diy5_1' : ['收件箱','read.htm']},			
        'diy6' : {
			'diy6_1' : ['短信收发','read.htm']}}
}
var titles={
	'glmk_1' : '管理模块',
	'a_dxyyj' : '短信与邮件',
	'a_rsytx' : '日程与提醒',
	'a_grxx' : '个人信息',
	'a_kjgl' : '空间管理',
	'a_grxx' : '个人信息',
	'a_grgj' : '便捷工具',
	'b_rsjg' : '人事机构',
	'b_kqgl' : '考勤管理',
	'c_gzjh' : '工作计划',
	'c_hygl' : '会议管理',	
	'd_gwlz' : '公文流转',	
	'd_spdj' : '审批登记',
	'e_ykgl' : '用款管理',
	'e_bxgl' : '报销管理',
	'f_bgyp' : '办公用品',
	'f_clgl' : '车辆管理',	
	'g_zlgl' : '资料管理',	
	'g_wdgl' : '文档管理',	
	'h_zcgl' : '资产管理',	
	'h_khzy' : '客户资源',	
	'system_1' : '系统管理',
	
	
	
	
	'settings' : '人事与考勤',
	'forummaneger' : '计划与会议',
	'artmanager' : '公文与审批',
	'attmanager' : '用款与报销',
	'members' : '办公与车辆',
	'groups' : '资料与文档',
	'wholemanager' : '客户与资产',
	'log' : '系统管理',
	'hackstyle' : '插件风格',
	'info' : '信息管理',
	'assistant' : '辅助管理',
	'supdel' : '批量删除',
	'task' : '计划任务',
	'database' : '数据库',
	'onlinepay' : '网上支付设置',
	'curren' : '论坛交易币',
	'diy' : '常用选项',
	'diy1' : '系统框架',
	'diy2' : '人事管理模块',
	'diy3' : '日程管理模块',
	'diy4' : '公文管理模块',
	'diy5' : '邮件模块',
	'diy6' : '短信模块'
	}
//注意：下边参数必须是成套出现
var cate   = 'glmk'; //默认显示主导航
var action = 'glmk_1'; //默认显示方位
var type   = 'glmk_1_1';//下级别导航明确 

function uptopguide(id){
	var obj = document.getElementById('topguide-entry');
	var objs=obj.getElementsByTagName('li');
	for(var i=0;i<objs.length;i++){
		objs[i].className = objs[i].id==id ? 'li1' : '';
	}
}
function showguide(id){

	var obj = document.getElementById('showmenu');

	var guide = guides[id];
	var html  = '<dl>';

	for(i in guide){
		var subs = guide[i];
		html += '<dd>';
		for(j in subs){
			var sub = subs[j];
			html += '<a href="#" onclick="return initguide(\''+id+'\',\''+j+'\')">'+sub[0]+'</a>';
		}
		html += '</dd>';
	}
	obj.innerHTML = html + '</dl>';
	
	var obj1  = document.getElementById(id);
	var left  = findPosX(obj1) + ietruebody().scrollLeft;
	var top   = findPosY(obj1) + ietruebody().scrollTop + 24;

	obj.style.display = "";
	obj.style.top	= top + 'px';
	obj.style.left	= left + 'px';
	
	addEvent(document,"mouseout",doc_mouseout);
}
function closeguide(){
	var obj = document.getElementById('showmenu');
	obj.style.display = "none";
	uptopguide(cate);
	removeEvent(document,"mouseout",doc_mouseout);
}
function upleft(t){
	var obj  = document.getElementById('left');
	var objs = obj.getElementsByTagName('a');
	for(var i=0;i<objs.length;i++){
		objs[i].className = objs[i].id==t ? 'a1' : '';
	}
}
function showleft(id,t,url){
	cate = id;
	var obj = document.getElementById('left');

	var html = '<dl>';
	var guide = guides[id];
	
	url = typeof url != 'undefined' ? url : '';
	type = typeof t != 'undefined' ? t : '';

	for(i in guide){
		var subs = guide[i];
		html += '<dt>' + titles[i] + '</dt><dd>';
		for(j in subs){
			var sub = subs[j];
			html += '<a id="'+j+'" href="#" onclick="return initguide(\''+id +'\',\''+j+'\')">'+sub[0]+'</a>';
			if(url == ''){
				if(type == ''){
					url = sub[1];
					type = j;
				} else if(j == type){
					url = sub[1];
				}
				action = i;
			}
		}
		html += '</dd>';
	}
	obj.innerHTML = html + '</dl>';
	uptopguide(cate);
	upleft(type);

	parent.main.location = url;
	return false;
}
function showtitle(){
	var obj = document.getElementById('guide');
	var guide = guides[cate];
	var html = '<span class="fr s1" style="margin:0 16px">当前日期-2007年07月04日 | 用户: admin　级别: manager　|　<a class="s0"  href="#" onclick="return skin(\'?adskin=2\');">默认风格</a>  <a class="s0" href="vbscript:parent.main.location.reload" >刷新</a> <a class="s0" href="vbscript:history.back" >上一步</a> <a class="s0" href="vbscript:history.forward">下一步</a> <a class="s0" href="vbscript:exitsystem()">退出</a></span>';
	if(action && type){
		html += '<h1><span class="fr1">' + titles[action] + ' &raquo; ' + guide[action][type][0] + '</span></h1>';
	} else {
		html += '<h1><span class="fr1">开始页</span></h1>';
	}
	obj.innerHTML = html;
}
function initguide(id,t,url){
	showleft(id,t,url);
	showtitle();
	return false;
}
function showmenu(){
	var obj = document.getElementById('menu');
	//top.main.showselect('hidden');
	if(!IsElement('menubg')){
		var html = '<div id="menu2" class="inner">';
		for(i in guides){
			if(i=='common') continue;
			var guide = guides[i];
			html += "<dl>";
			for(j in guide){
				html += "<dt><h3>" + titles[j] + "</h3></dt><dd>";
				var subs = guide[j];
				for(k in subs){
					var sub = subs[k];
					html += '<a href="#" onclick="return toguide(\''+i+'\',\''+k+'\')">'+sub[0]+'</a>';
				}
				html += "</dd>";
			}
			html += '</dl>';
		}
		html += '<div><a class="fr" style="color:#ff8800; position:absolute;right:1%;top:1%; cursor:pointer;" onclick="closemenu();">关闭</a></div></div>';
		obj.innerHTML = html;
		var obj2 = document.createElement("div");
		obj2.id = "menubg";
		obj.parentNode.insertBefore(obj2,obj);
	} else {
		var obj2 = document.getElementById('menubg');
		obj2.style.display = "";
	}
	obj.style.display = "";
	addEvent(document,"mousedown",doc_mousedown);
}
function closemenu(){
	var obj = document.getElementById('menu');
	obj.style.display = "none";
	var obj2 = document.getElementById('menubg');
	obj2.style.display = "none";
	removeEvent(document,"mousedown",doc_mousedown);
	//top.main.showselect('');
}
function toguide(id,t){
	closemenu();
	initguide(id,t);
	return false;
}
function doc_mousedown(e){
	var e = is_ie ? event: e;
	obj	= document.getElementById("menu");
	_x	= is_ie ? e.x : e.pageX;
	_y	= is_ie ? e.y + ietruebody().scrollTop : e.pageY;
	_x1 = obj.offsetLeft;
	_x2 = obj.offsetLeft + obj.offsetWidth;
	_y1 = obj.offsetTop - 20;
	_y2 = obj.offsetTop + obj.offsetHeight;

	if(_x<_x1 || _x>_x2 || _y<_y1 || _y>_y2){
	   closemenu();
	}
}
function doc_mouseout(e){
	var e = is_ie ? event: e;
	obj	= document.getElementById("showmenu");
	_x	= is_ie ? e.x : e.pageX;
	_y	= is_ie ? e.y + ietruebody().scrollTop : e.pageY;
	_x1 = obj.offsetLeft + 2;
	_x2 = obj.offsetLeft + obj.offsetWidth;
	_y1 = obj.offsetTop - 20;
	_y2 = obj.offsetTop + obj.offsetHeight;

	if(_x<_x1 || _x>_x2 || _y<_y1 || _y>_y2){
		closeguide();
	}
}
function IsElement(id){
	return document.getElementById(id)!=null ? true : false;
}
function addEvent(el,evname,func){
	if(is_ie){
		el.attachEvent("on" + evname,func);
	} else{
		el.addEventListener(evname,func,true);
	}
};
function removeEvent(el,evname,func){
	if(is_ie){
		el.detachEvent("on" + evname,func);
	} else{
		el.removeEventListener(evname,func,true);
	}
};
function findPosX(obj){
	var curleft = 0;
	if (obj.offsetParent){
		while (obj.offsetParent){
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}
	else if (obj.x)
		curleft += obj.x;
	return curleft - ietruebody().scrollLeft;
}
function findPosY(obj){
	var curtop = 0;
	if (obj.offsetParent){
		while (obj.offsetParent){
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	} else if (obj.y){
		curtop += obj.y;
	}
	return curtop - ietruebody().scrollTop;;
}
function ietruebody(){
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body;
}
initguide(cate,type,'main.htm');