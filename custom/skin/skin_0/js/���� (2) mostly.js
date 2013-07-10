var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");

var guides={
	'gj' : {
		'gj_' : {
			'gj_1' : ['企业邮局','',''],          //框架里打开
			'gj_2' : ['日程管理','test.htm','m'],       //框架多级别导航
			'a_dxyyj_22' : ['框架多级2','test_add.htm','m'],       //框架多级别导航	
			'a_dxyyj_3' : ['新开页打开','test.htm','_blank'],    //新开页打开
			'a_dxyyj_4' : ['本页打开','test.htm','_parent']    //本页打开

		}},
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	'a_xxygj' : {
		'a_dxyyj' : {
			'a_dxyyj_1' : ['框架里打开','test.htm',''],          //框架里打开
			'a_dxyyj_2' : ['框架多级','test.htm','m'],       //框架多级别导航
			'a_dxyyj_22' : ['框架多级2','test_add.htm','m'],       //框架多级别导航	
			'a_dxyyj_3' : ['新开页打开','test.htm','_blank'],    //新开页打开
			'a_dxyyj_4' : ['本页打开','test.htm','_parent']    //本页打开

		}},
	'b_rsykq' : {
		'b_rsjg' : {
			'b_rsjg_1' : ['压缩文件','#',''],
			'b_rsjg_2' : ['文档文件','#',''],
			'b_rsjg_3' : ['图片文件','#',''],
			'b_rsjg_4' : ['影音文件','#','']
         },
		'b_kqgl' : {
				'b_kqgl_1' : ['压缩文件','#',''],
				'b_kqgl_2' : ['文档文件','#',''],
				'b_kqgl_3' : ['图片文件','#',''],
				'b_kqgl_4' : ['影音文件','#','']}},	
	'g_zlywd' : {
		'g_zlgl' : {
			'g_zlgl_1' : ['发送短信息','dx_add.htm',''],
			'g_zlgl_2' : ['已发送信息','dx_li1.htm',''],
			'g_zlgl_3' : ['信息内容模版','dx_li2.htm',''],
			'g_zlgl_4' : ['本机构已发信息','dx_li3.htm',''],
			'g_zlgl_5' : ['各机构已发信息','dx_li4.htm','']
         },
		'g_wdgl' : {
				'g_wdgl_1' : ['发送邮件','#',''],
				'g_wdgl_2' : ['邮件列表','#',''],
				'g_wdgl_3' : ['邮件模版','#','']}},
	'h_khyzc' : {
				'glmk_3' : {
			'glmk_3_1' : ['日程类型列表','kq_rclxlb.htm',''],
			'glmk_3_2' : ['日程地点列表','kq_rcddlb.htm',''],
			'glmk_3_3' : ['个人日程信息','kq_grrcxx.htm',''],
			'glmk_3_4' : ['雇员日程信息','kq_gyrcxx.htm','']
			},
		'glmk_4' : {
			'glmk_4_1' : ['公文类型列表','gwlx.htm',''],
			'glmk_4_2' : ['公文标题列表','gwbt.htm',''],
			'glmk_4_3' : ['公文模板列表','gwmb.htm',''],
			'glmk_4_4' : ['公文路径列表','gwlj.htm',''],
			'glmk_4_5' : ['创建传阅公文','gwcy.htm',''],
			'glmk_4_6' : ['发送传阅公文','gwcyf.htm',''],
			'glmk_4_7' : ['收到传阅公文','gwcys.htm',''],
			'glmk_4_8' : ['创建审批公文','gwsp.htm',''],
			'glmk_4_9' : ['发送审批公文','gwspf.htm',''],
			'glmk_4_10' : ['收到审批公文','gwsps.htm',''],
			'glmk_4_11' : ['流程模型列表','gw_lcmx.htm',''],
			'glmk_4_12' : ['创建流程申请','gw_cjlc.htm',''],
			'glmk_4_13' : ['收发流程申请','gw_sflc.htm','']
			}},

	'glmk' : {
		'glmk_1' : {
			'glmk_1_1' : ['档案管理','glmk_1_1_list.htm','m']
			},
        'glmk_2' : {
			'glmk_2_4' : ['人事档案','yhss.htm',''],
			'glmk_2_6' : ['个人信息','grxx.htm',''],
			'glmk_2_1' : ['职务管理','zwgl.htm',''],
			'glmk_2_2' : ['子机构管理','zjggl.htm',''],
			'glmk_2_3' : ['其他信息类型','qtxx.htm',''],			
			'glmk_2_5' : ['学历统计','xltj.htm','']			
			}},

    'system' : {
		'system_1' : {
			'system_1_1' : ['新增会员','#',''],
			'system_1_2' : ['会员管理','#',''],
			'system_1_3' : ['到期会员','#',''],
			'system_1_4' : ['操作日志','#','']
			},
	    'system_2' : {
			'system_2_1' : ['机构管理','jggl.htm',''],
			'system_2_2' : ['模块管理','mkgl.htm',''],
			'system_2_3' : ['用户管理','yhgl.htm',''],
			'system_2_4' : ['操作日志','rz.htm',''],
			'system_2_5' : ['内容模块','#',''],
			'system_2_6' : ['页面版式','#',''],
			'system_2_7' : ['背景图片','#',''],
			'system_2_8' : ['样式风格','#',''],
			'system_2_9' : ['保存设置','#','']}},
			
	'common' : {
		'diy' : {
			'diy_1' : ['短信收发','#',''],
			'diy_2' : ['空间管理','#',''],
			'diy_3' : ['全局设置','#',''],
			'diy_4' : ['便签管理','#',''],
			'diy_5' : ['日志管理','#',''],
			'diy_6' : ['历史记录','#','']}}
}
var titles={
	'gj_' : '日常工具',	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	'glmk_1' : '档案管理模块',
	'glmk_2' : '人事管理模块',
	'glmk_3' : '日程管理模块',
	'glmk_4' : '公文管理模块',
	'glmk_5' : '邮件短信模块',

	'a_dxyyj' : '短信与邮件',
	'a_rsytx' : '日程与提醒',
	'a_grxx' : '个人信息',
	'a_kjgl' : '空间管理',
	'a_grxx' : '个人信息',
	'a_grgj' : '便捷工具',
	'b_rsjg' : '网络硬盘',
	'b_kqgl' : '共享资源',
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
	'system_1' : '会员信息管理',
	'system_2' : '系统管理',
	
	
	
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
//var cate   = 'glmk'; //默认显示主导航
//var action = 'glmk_1'; //默认显示方位
//var type   = 'glmk_1_1';//下级别导航明确 

var cate   = 'common';
var action = '';
var type   = '';

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
				if(sub[2] == ''){
				html += '<a href="javascript:" onclick="return initguide(\''+id+'\',\''+j+'\')">'+sub[0]+'</a>';
				} else {
					if(sub[2] == 'm'){
						html += '<a href="javascript:" onclick="return initguide2(\''+id+'\',\''+j+'\')">'+sub[0]+'</a>';
					} else {
						html += '<a href='+sub[1]+' target='+sub[2]+'>'+sub[0]+'</a>';
					}				
				}
			
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
			
			if(sub[2] == ''){
				html += '<a id="'+j+'" href="javascript:" onclick="return initguide(\''+id +'\',\''+j+'\')">'+sub[0]+'</a>';
				} else {
					if(sub[2] == 'm'){
						html += '<a id="'+j+'" href="javascript:" onclick="return initguide2(\''+id +'\',\''+j+'\')">'+sub[0]+'</a>';
					
					} else {
						html += '<a id="'+j+'" href='+sub[1]+' target='+sub[2]+'>'+sub[0]+'</a>';
					}				
				}
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
function showleft2(id,t,url){
	cate = id;
	var obj = document.getElementById('left');
	//var html = '<dl>';
	var guide = guides[id];	
	url = typeof url != 'undefined' ? url : '';
	type = typeof t != 'undefined' ? t : '';
	for(i in guide){
		var subs = guide[i];
		//html += '<dt>' + titles[i] + '</dt><dd>';
		for(j in subs){
			var sub = subs[j];
			//html += '<a id="'+j+'" href="javascript:" onclick="return initguide(\''+id +'\',\''+j+'\')">'+sub[0]+'</a>';
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
		//html += '</dd>';
	}
		//html += '<dt>'+type+'</dt><dd>';
		
		//html += '<iframe name="player" src="'+type+'_tree.htm" frameborder="0"  style="height:96%;width:132;z-index:1"></iframe>';
		//html += '</dd></dl>';
	obj.innerHTML = '<iframe name="tree" src="'+type+'_tree.htm" frameborder="0"  style="height:99.9%;width:134;z-index:1"></iframe>';
	uptopguide(cate);
	upleft(type);
	parent.main.location = url;
	return false;
}
function showtitle(){
	var obj = document.getElementById('guide');
	var guide = guides[cate];
	var html = '<span class="fr s1" style="margin:0 16px">当前日期-2007年07月04日 | 用户: admin　级别: manager　|　<a class="s0"  href="javascript:" onclick="return skin(\'?adskin=2\');">默认风格</a>  <a class="s0" href="vbscript:parent.main.location.reload" >刷新</a> <a class="s0" href="vbscript:history.back" >上一步</a> <a class="s0" href="vbscript:history.forward">下一步</a> <a class="s0" href="vbscript:exitsystem()">退出</a></span>';
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
function initguide2(id,t,url){
	showleft2(id,t,url);
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
					if(sub[2] == ''){
					html += '<a href="javascript:" onclick="return toguide(\''+i+'\',\''+k+'\')">'+sub[0]+'</a>';
					} else {
					if(sub[2] == 'm'){
					html += '<a href="javascript:" onclick="return toguide2(\''+i+'\',\''+k+'\')">'+sub[0]+'</a>';
					} else {
					html += '<a href='+sub[1]+' target='+sub[2]+'>'+sub[0]+'</a>';
					}
					}
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
function toguide2(id,t){
	closemenu();
	initguide2(id,t);
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