var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");

var guides={
	'gj' : {
		'gj_' : {
			'gj_1' : ['��ҵ�ʾ�','',''],          //������
			'gj_2' : ['�ճ̹���','test.htm','m'],       //��ܶ༶�𵼺�
			'a_dxyyj_22' : ['��ܶ༶2','test_add.htm','m'],       //��ܶ༶�𵼺�	
			'a_dxyyj_3' : ['�¿�ҳ��','test.htm','_blank'],    //�¿�ҳ��
			'a_dxyyj_4' : ['��ҳ��','test.htm','_parent']    //��ҳ��

		}},
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	'a_xxygj' : {
		'a_dxyyj' : {
			'a_dxyyj_1' : ['������','test.htm',''],          //������
			'a_dxyyj_2' : ['��ܶ༶','test.htm','m'],       //��ܶ༶�𵼺�
			'a_dxyyj_22' : ['��ܶ༶2','test_add.htm','m'],       //��ܶ༶�𵼺�	
			'a_dxyyj_3' : ['�¿�ҳ��','test.htm','_blank'],    //�¿�ҳ��
			'a_dxyyj_4' : ['��ҳ��','test.htm','_parent']    //��ҳ��

		}},
	'b_rsykq' : {
		'b_rsjg' : {
			'b_rsjg_1' : ['ѹ���ļ�','#',''],
			'b_rsjg_2' : ['�ĵ��ļ�','#',''],
			'b_rsjg_3' : ['ͼƬ�ļ�','#',''],
			'b_rsjg_4' : ['Ӱ���ļ�','#','']
         },
		'b_kqgl' : {
				'b_kqgl_1' : ['ѹ���ļ�','#',''],
				'b_kqgl_2' : ['�ĵ��ļ�','#',''],
				'b_kqgl_3' : ['ͼƬ�ļ�','#',''],
				'b_kqgl_4' : ['Ӱ���ļ�','#','']}},	
	'g_zlywd' : {
		'g_zlgl' : {
			'g_zlgl_1' : ['���Ͷ���Ϣ','dx_add.htm',''],
			'g_zlgl_2' : ['�ѷ�����Ϣ','dx_li1.htm',''],
			'g_zlgl_3' : ['��Ϣ����ģ��','dx_li2.htm',''],
			'g_zlgl_4' : ['�������ѷ���Ϣ','dx_li3.htm',''],
			'g_zlgl_5' : ['�������ѷ���Ϣ','dx_li4.htm','']
         },
		'g_wdgl' : {
				'g_wdgl_1' : ['�����ʼ�','#',''],
				'g_wdgl_2' : ['�ʼ��б�','#',''],
				'g_wdgl_3' : ['�ʼ�ģ��','#','']}},
	'h_khyzc' : {
				'glmk_3' : {
			'glmk_3_1' : ['�ճ������б�','kq_rclxlb.htm',''],
			'glmk_3_2' : ['�ճ̵ص��б�','kq_rcddlb.htm',''],
			'glmk_3_3' : ['�����ճ���Ϣ','kq_grrcxx.htm',''],
			'glmk_3_4' : ['��Ա�ճ���Ϣ','kq_gyrcxx.htm','']
			},
		'glmk_4' : {
			'glmk_4_1' : ['���������б�','gwlx.htm',''],
			'glmk_4_2' : ['���ı����б�','gwbt.htm',''],
			'glmk_4_3' : ['����ģ���б�','gwmb.htm',''],
			'glmk_4_4' : ['����·���б�','gwlj.htm',''],
			'glmk_4_5' : ['�������Ĺ���','gwcy.htm',''],
			'glmk_4_6' : ['���ʹ��Ĺ���','gwcyf.htm',''],
			'glmk_4_7' : ['�յ����Ĺ���','gwcys.htm',''],
			'glmk_4_8' : ['������������','gwsp.htm',''],
			'glmk_4_9' : ['������������','gwspf.htm',''],
			'glmk_4_10' : ['�յ���������','gwsps.htm',''],
			'glmk_4_11' : ['����ģ���б�','gw_lcmx.htm',''],
			'glmk_4_12' : ['������������','gw_cjlc.htm',''],
			'glmk_4_13' : ['�շ���������','gw_sflc.htm','']
			}},

	'glmk' : {
		'glmk_1' : {
			'glmk_1_1' : ['��������','glmk_1_1_list.htm','m']
			},
        'glmk_2' : {
			'glmk_2_4' : ['���µ���','yhss.htm',''],
			'glmk_2_6' : ['������Ϣ','grxx.htm',''],
			'glmk_2_1' : ['ְ�����','zwgl.htm',''],
			'glmk_2_2' : ['�ӻ�������','zjggl.htm',''],
			'glmk_2_3' : ['������Ϣ����','qtxx.htm',''],			
			'glmk_2_5' : ['ѧ��ͳ��','xltj.htm','']			
			}},

    'system' : {
		'system_1' : {
			'system_1_1' : ['������Ա','#',''],
			'system_1_2' : ['��Ա����','#',''],
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
			'diy_1' : ['�����շ�','#',''],
			'diy_2' : ['�ռ����','#',''],
			'diy_3' : ['ȫ������','#',''],
			'diy_4' : ['��ǩ����','#',''],
			'diy_5' : ['��־����','#',''],
			'diy_6' : ['��ʷ��¼','#','']}}
}
var titles={
	'gj_' : '�ճ�����',	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	'glmk_1' : '��������ģ��',
	'glmk_2' : '���¹���ģ��',
	'glmk_3' : '�ճ̹���ģ��',
	'glmk_4' : '���Ĺ���ģ��',
	'glmk_5' : '�ʼ�����ģ��',

	'a_dxyyj' : '�������ʼ�',
	'a_rsytx' : '�ճ�������',
	'a_grxx' : '������Ϣ',
	'a_kjgl' : '�ռ����',
	'a_grxx' : '������Ϣ',
	'a_grgj' : '��ݹ���',
	'b_rsjg' : '����Ӳ��',
	'b_kqgl' : '������Դ',
	'c_gzjh' : '�����ƻ�',
	'c_hygl' : '�������',	
	'd_gwlz' : '������ת',	
	'd_spdj' : '�����Ǽ�',
	'e_ykgl' : '�ÿ����',
	'e_bxgl' : '��������',
	'f_bgyp' : '�칫��Ʒ',
	'f_clgl' : '��������',	
	'g_zlgl' : '���Ϲ���',	
	'g_wdgl' : '�ĵ�����',	
	'h_zcgl' : '�ʲ�����',	
	'h_khzy' : '�ͻ���Դ',	
	'system_1' : '��Ա��Ϣ����',
	'system_2' : 'ϵͳ����',
	
	
	
	'settings' : '�����뿼��',
	'forummaneger' : '�ƻ������',
	'artmanager' : '����������',
	'attmanager' : '�ÿ��뱨��',
	'members' : '�칫�복��',
	'groups' : '�������ĵ�',
	'wholemanager' : '�ͻ����ʲ�',
	'log' : 'ϵͳ����',
	'hackstyle' : '������',
	'info' : '��Ϣ����',
	'assistant' : '��������',
	'supdel' : '����ɾ��',
	'task' : '�ƻ�����',
	'database' : '���ݿ�',
	'onlinepay' : '����֧������',
	'curren' : '��̳���ױ�',
	'diy' : '����ѡ��',
	'diy1' : 'ϵͳ���',
	'diy2' : '���¹���ģ��',
	'diy3' : '�ճ̹���ģ��',
	'diy4' : '���Ĺ���ģ��',
	'diy5' : '�ʼ�ģ��',
	'diy6' : '����ģ��'
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
	var html = '<span class="fr s1" style="margin:0 16px">��ǰ����-2007��07��04�� | �û�: admin������: manager��|��<a class="s0"  href="javascript:" onclick="return skin(\'?adskin=2\');">Ĭ�Ϸ��</a>  <a class="s0" href="vbscript:parent.main.location.reload" >ˢ��</a> <a class="s0" href="vbscript:history.back" >��һ��</a> <a class="s0" href="vbscript:history.forward">��һ��</a> <a class="s0" href="vbscript:exitsystem()">�˳�</a></span>';
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