var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");

var guides={
	'gj' : {
		'gj_' : {
			'gj_1' : ['��ҵ�ʾ�','test.php',''],          //û��
			'gj_2' : ['�ճ̹���','kq_rclxlb.htm',''],
			'gj_3' : ['����Ӳ��','wlyp.htm',''],          //û��
			'gj_4' : ['��ݱ�ǩ','kjbq.htm',''],          //û��
			'gj_5' : ['��Ƭ����','mpgl.htm',''],          //û��
			'gj_6' : ['���ò�ѯ','cycx.htm',''],          //û��
			'gj_7' : ['������Ϣ','grxx.htm','']}},
	'bg' : {
		'bg_1' : {
			'bg_1_1' : ['������','gwcy.htm',''],
			'bg_1_2' : ['�ѷ��ļ�','gwcyf.htm',''],
			'bg_1_3' : ['�յ��ļ�','gwcys.htm',''],
			'bg_1_4' : ['ģ������','mksz_1.htm','']},
		 'bg_2' : {
			'bg_2_1' : ['��������','gwsp.htm',''],
			'bg_2_2' : ['�ѷ�����','gwspf.htm',''],
			'bg_2_3' : ['�յ�����','gwsps.htm',''],
			'bg_2_4' : ['ģ������','gwlx.htm','']},
         'bg_3' : {
			'bg_3_1' : ['����ģ���б�','gw_lcmx.htm',''],
			'bg_3_2' : ['������������','gw_cjlc.htm',''],
			'bg_3_3' : ['�շ���������','gw_sflc.htm','']}},		
	'rs' : {
		'rs_' : {
			'rs_1' : ['���µ���','yhss.htm',''],         
			'rs_2' : ['ѧ��ͳ��','xltj.htm',''],
			'rs_3' : ['������Ϣ','grxx.htm',''],         
			'rs_4' : ['ģ������','zwgl.htm','']}}, 
		
	'da' : {
		'da_' : {
			'da_1_1' : ['��������','da_1.php','']}},		
	'jx' : {
		'jx_' : {
			'jx_1_1' : ['����ѧУ','wlxx.htm','']}},			
	'dx' : {
		'dx_' : {
			'dx_1' : ['�½�����','dx_add.htm',''],
			'bg_2' : ['�ѷ�����','dx_li1.htm',''],
			'bg_3' : ['����ģ��','dx_li2.htm',''],
			'bg_4' : ['��ʷ��¼','dx_li3.htm','']}},	 //�ϲ�	dx_li3.htm dx_li4.htm	
   'system' : {
		'system_1' : {
			'system_1_1' : ['������Ա','member_add.php',''],
			'system_1_2' : ['��Ա����','member_manager.php',''],
			'system_1_3' : ['���ڻ�Ա','#',''],
			'system_1_4' : ['������־','#','']
			},
	    'system_2' : {
			'system_2_1' : ['��������','jggl.htm',''],
			'system_2_2' : ['ģ�����','mkgl.htm',''],
			'system_2_3' : ['�û�����','yhgl.htm',''],
			'system_2_4' : ['������־','rz.htm',''],
			'system_2_5' : ['����ģ��','#',''],
			'system_2_6' : ['ҳ���ʽ','#',''],
			'system_2_7' : ['����ͼƬ','#',''],
			'system_2_8' : ['��ʽ���','#',''],
			'system_2_9' : ['��������','#','']}},
			
	'common' : {
		'diy' : {
			'diy_1' : ['��ҵ�ʾ�','test.php',''],
			'diy_2' : ['�ճ̹���','kq_rclxlb.htm',''],
			'diy_3' : ['����Ӳ��','wlyp.htm',''],
			'diy_4' : ['��ݱ�ǩ','kjbq.htm',''],
			'diy_5' : ['��Ƭ����','mpgl.htm',''],
			'diy_6' : ['���ò�ѯ','cycx.htm',''],
			'diy_7' : ['������Ϣ','grxx.htm','']}}
}
var titles={
	'gj_' : '�ճ�����',	
//	'bg_' : '�칫����',
	'bg_1' : '�ļ���ת',
	'bg_2' : '��������',
	'bg_3' : '��������',
	'rs_' : '���¹���',	
	'da_' : '��������',
	'jx_' : '����ѧУ',	
	'dx_' : '����ƽ̨',	
	'diy' : '����ѡ��',
	'system_1' : '��Ա��Ϣ����',
	'system_2' : 'ϵͳ����'
	}

//ע�⣺�±߲��������ǳ��׳���
//var cate   = 'glmk'; //Ĭ����ʾ������
//var action = 'glmk_1'; //Ĭ����ʾ��λ
//var type   = 'glmk_1_1';//�¼��𵼺���ȷ 

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
/*
 ����ϵͳҪ���ݻ���͹ȸ�����������Ҫ�����������˵��ϣ��Զ���ʾ�Ӳ˵���һ����ȥ��,����showguide����ע�͵�
*/

/*function showguide(id){

	var obj = document.getElementById('showmenu');

	var guide = guides[id];
	var html  = '<dl>';

	for(i in guide){
		var subs = guide[i];
		html += '<dd class=rl>';
		for(j in subs){
			var sub = subs[j];
				if(sub[2] == ''){
				html += '<a href="javascript:" onclick="return initguide(\''+id+'\',\''+j+'\')"><span class=ah>'+sub[0]+'</span></a>';
				} else {
					if(sub[2] == 'm'){
						html += '<a href="javascript:" onclick="return initguide2(\''+id+'\',\''+j+'\')"><span class=ah>'+sub[0]+'</span></a>';
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
}*/
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
	//var date="<?php echo date('Y-m-d'); ?>";
        //alert(date);
        var obj = document.getElementById('guide');
	var guide = guides[cate];
	var html = "<span class=\"fr s1\" style=\"margin:0 16px\">��ǰ����-" + "2012-10-14" + " | �û�: admin������: manager��|��<a class=\"s0\"  href=\"javascript:\" onclick=\"return skin(\'?adskin=2\');\">Ĭ�Ϸ��</a>  <a class=\"s0\" href=\"vbscript:parent.main.location.reload\" >ˢ��</a> <a class=\"s0\" href=\"vbscript:history.back\" >��һ��</a> <a class=\"s0\" href=\"vbscript:history.forward\">��һ��</a> <a class=\"s0\" href=\"vbscript:exitsystem()\">�˳�</a></span>";
	if(action && type){
		html += '<h1><span class="fr1">' + titles[action] + ' &raquo; ' + guide[action][type][0] + '</span></h1>';
	} else {
		html += '<h1><span class="fr1">��ʼҳ</span></h1>';
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
		html += '<div><a class="fr" style="color:#ff8800; position:absolute;right:1%;top:1%; cursor:pointer;" onclick="closemenu();">�ر�</a></div></div>';
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
