var agt = navigator.userAgent.toLowerCase();
var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));
var is_gecko= (navigator.product == "Gecko");

var guides={
	'a_xxygj' : {
		'a_dxyyj' : {
			'a_dxyyj_1' : ['�����շ�','#'],
			'a_dxyyj_2' : ['�ʼ�����','read.htm'],
			'a_dxyyj_3' : ['�������','#']
		},
		'a_rsytx' : {
				'a_rsytx_1' : ['������־','#'],
				'a_rsytx_2' : ['�ճ̰���','#']
		},
		'a_grxx' : {
				'a_grxx_1' : ['������Ϣ','#']
		},
		'a_kjgl' : {
				'a_kjgl_1' : ['�ռ����','#']
		},
		'a_grgj' : {
				'a_grgj_1' : ['��Ƭ�����','#'],
				'a_grgj_2' : ['�������','#'],
				'a_grgj_3' : ['������','#'],
				'a_grgj_4' : ['��ǩ������','#'],
				'a_grgj_5' : ['��ݱ�ǩ','#'],
				'a_grgj_6' : ['�ʱ�����','#'],
				'a_grgj_7' : ['�绰�����ѯ','#'],
				'a_grgj_8' : ['IP��ѯ','#'],
				'a_grgj_9' : ['�����г�ʱ�̱�','#']}},
	'b_rsykq' : {
		'b_rsjg' : {
			'b_rsjg_1' : ['��Ϣά��','#'],
			'b_rsjg_2' : ['��������','#'],
			'b_rsjg_3' : ['��ְ��Ա','#'],
			'b_rsjg_4' : ['��������','#'],
			'b_rsjg_5' : ['ȫ������','#'],
			'b_rsjg_6' : ['�����ֵ�','#']
         },
		'b_kqgl' : {
				'b_kqgl_1' : ['�������','#'],
				'b_kqgl_2' : ['���ٺ�׼','#'],
				'b_kqgl_3' : ['�Ӱ�ȷ��','#'],
				'b_kqgl_4' : ['�Ӱ��׼','#'],
				'b_kqgl_5' : ['ͳ������','#'],
				'b_kqgl_6' : ['ͳ�Ʋ�ѯ','#'],
				'b_kqgl_7' : ['���˲�ѯ','#'],
				'b_kqgl_8' : ['ȫ����ѯ','#'],
				'b_kqgl_9' : ['����ά��','#'],
				'b_kqgl_10' : ['���ü���','#'],
				'b_kqgl_11' : ['���ά��','#'],				
				'b_kqgl_12' : ['����ͳ��','#']}},
	'c_jhyhy' : {
		'c_gzjh' : {
			'b_gzjh_1' : ['�������','#'],
			'b_gzjh_2' : ['�ƻ����','#'],
			'b_gzjh_3' : ['�����ƻ�','#'],
			'b_gzjh_4' : ['��д��־','#'],
			'b_gzjh_5' : ['������־','#'],
			'b_gzjh_6' : ['ȫ����־','#'],
			'b_gzjh_7' : ['���żƻ�','#'],
			'b_gzjh_8' : ['ȫ���ƻ�','#'],
			'b_gzjh_9' : ['��־����','#']
         },
		'c_hygl' : {
				'b_hygl_1' : ['��Ƶ����','#'],
				'b_hygl_2' : ['�����ҹ���','#'],
				'b_hygl_3' : ['�����Ҳ�ѯ','#'],
				'b_hygl_4' : ['����Ǽ�','#'],
				'b_hygl_5' : ['����֪ͨ','#'],
				'b_hygl_6' : ['�����Ҫ','#'],
				'b_hygl_7' : ['������Ϣ','#']}},
	'd_gwysp' : {
		'd_gwlz' : {
			'd_gwlz_1' : ['��������','#'],
			'd_gwlz_2' : ['���ĵǼ�','#'],
			'd_gwlz_3' : ['���İ���','#'],
			'd_gwlz_4' : ['���Ĵ߰�','#'],
			'd_gwlz_5' : ['������ת','#'],
			'd_gwlz_6' : ['�鵵����','#'],
			'd_gwlz_7' : ['���Ĳ�ѯ','#'],
			'd_gwlz_8' : ['��������','#']
         },
		'd_spdj' : {
				'd_spdj_1' : ['��������','#'],
				'd_spdj_2' : ['����Ǽ�','#'],
				'd_spdj_3' : ['�����ӡ','#'],
				'd_spdj_4' : ['�������','#'],
				'd_spdj_5' : ['�����ѯ','#']}},				
	'e_ykybx' : {
		'e_ykgl' : {
			'e_ykgl_1' : ['�ÿ�Ǽ�','#'],
			'e_ykgl_2' : ['�黹�Ǽ�','#'],
			'e_ykgl_3' : ['�����ÿ�','#'],
			'e_ykgl_4' : ['ȫ���ÿ�','#'],
			'e_ykgl_5' : ['�ÿ�ͳ��','#'],
			'e_ykgl_6' : ['���ά��','#']
         },
		'e_bxgl' : {
				'e_bxgl_1' : ['���Ǽ�','#'],
				'e_bxgl_2' : ['���˱���','#'],
				'e_bxgl_3' : ['ȫ������','#'],
				'e_bxgl_4' : ['����ͳ��','#'],
				'e_bxgl_5' : ['���ά��','#'],
				'e_bxgl_6' : ['�ֵ�ά��','#'],
				'e_bxgl_7' : ['��Ʒ��Ϣ','#']}},				
	'f_bgycl' : {
		'f_bgyp' : {
			'f_bgyp_1' : ['��Ʒ����','#'],
			'f_bgyp_2' : ['Ԥ�����','#'],
			'f_bgyp_3' : ['��Ʒ�ɹ�','#'],
			'f_bgyp_4' : ['��Ʒͳ��','#'],
			'f_bgyp_5' : ['����ͳ��','#'],
			'f_bgyp_6' : ['��汨��','#'],
			'f_bgyp_7' : ['��Ʒ���','#']			
         },
		'f_clgl' : {
				'f_clgl_1' : ['������Ϣ','#'],
				'f_clgl_2' : ['�ͺĵǼ�','#'],
				'f_clgl_3' : ['��̲���','#'],
				'f_clgl_4' : ['ά�����','#'],
				'f_clgl_5' : ['�ó����','#']}},				
	'g_zlywd' : {
		'g_zlgl' : {
			'g_zlgl_1' : ['������Ϣ','#'],
			'g_zlgl_2' : ['��������','#'],
			'g_zlgl_3' : ['���Ļظ�','#'],
			'g_zlgl_4' : ['���ĵǼ�','#'],
			'g_zlgl_5' : ['�黹�Ǽ�','#'],
			'g_zlgl_6' : ['ȱ��Ǽ�','#'],
			'g_zlgl_7' : ['ȱ���ѯ','#'],
			'g_zlgl_8' : ['����ͳ��','#'],
			'g_zlgl_9' : ['�ֵ�ά��','#']
         },
		'g_wdgl' : {
				'g_wdgl_1' : ['������','#'],
				'g_wdgl_2' : ['�ĵ�����','#'],
				'g_wdgl_3' : ['�ĵ���ѯ','#']}},
	'h_khyzc' : {
		'h_zcgl' : {
			'h_zcgl_1' : ['�ʲ���Ϣ','#'],
			'h_zcgl_2' : ['ʹ�ù���','#'],
			'h_zcgl_3' : ['�����ʲ�','#'],
			'h_zcgl_4' : ['ȫ���ʲ�','#'],
			'h_zcgl_5' : ['�ֵ�ά��','#']
         },
		'h_khzy' : {
				'g_wdgl_1' : ['������Ա','#'],
				'g_wdgl_2' : ['�ͻ�����','#'],
				'g_wdgl_3' : ['��ϵ��¼','#'],
				'g_wdgl_4' : ['�������','#'],
				'g_wdgl_5' : ['�������','#'],
				'g_wdgl_6' : ['��ϵ��Ա','#']}},

	'glmk' : {
		'glmk_1' : {
			'glmk_1_1' : ['��������ģ��','module/dagl/frame.htm'],
			'glmk_1_2' : ['ģ��','#'],
			'glmk_1_n' : ['ģ��','#']}},

    'system' : {
		'system_1' : {
			'system_1_1' : ['ȫ������','#'],
			'system_1_2' : ['��������','#'],
			'system_1_3' : ['Ȩ�޹���','#'],
			'system_1_4' : ['��Ա����','#'],
			'system_1_5' : ['�ռ����','#'],
			'system_1_6' : ['��������','#'],
			'system_1_7' : ['��ʷ��¼','#'],
			'system_1_8' : ['���ݱ���','#']}},
	'common' : {
		//'diy' : {
		//	'diy_1' : ['�����շ�','#'],
		//	'diy_2' : ['�ռ����','#'],
		//	'diy_3' : ['ȫ������','#'],
		//	'diy_4' : ['��ǩ����','#'],
		//	'diy_5' : ['��־����','#'],
		//	'diy_6' : ['��ʷ��¼','#']},
        'diy1' : {
			'diy1_1' : ['��������','jggl.htm'],
			'diy1_2' : ['ģ�����','mkgl.htm'],
			'diy1_3' : ['�û�����','yhgl.htm'],
			'diy1_4' : ['������־','rz.htm']},
        'diy2' : {
			'diy2_1' : ['ְ�����','zwgl.htm'],
			'diy2_2' : ['�ӻ�������','zjggl.htm'],
			'diy2_3' : ['������Ϣ����','zwgl.htm'],
			'diy2_4' : ['�û�����','yhss.htm'],
			'diy2_5' : ['ѧ��ͳ��','xltj.htm'],
			'diy2_6' : ['�鿴������Ϣ','grxx.htm']},
        'diy3' : {
			'diy3_1' : ['�ճ������б�','read.htm'],
			'diy3_2' : ['�ճ̵ص��б�','#'],
			'diy3_3' : ['�����ճ���Ϣ','#'],
			'diy3_4' : ['��Ա�ճ���Ϣ','#']},
        'diy4' : {
			'diy4_1' : ['���������б�','read.htm'],
			'diy4_2' : ['���ı����б�','#'],
			'diy4_3' : ['����ģ���б�','#'],
			'diy4_4' : ['����·���б�','#'],
			'diy4_5' : ['�������Ĺ���','#'],
			'diy4_6' : ['���ʹ��Ĺ����б�','#'],
			'diy4_7' : ['�յ����Ĺ����б�','#'],
			'diy4_8' : ['������������','#'],
			'diy4_9' : ['�������������б�','#'],			
			'diy4_10' : ['�յ����������б�','#']},
        'diy5' : {
			'diy5_1' : ['�ռ���','read.htm']},			
        'diy6' : {
			'diy6_1' : ['�����շ�','read.htm']}}
}
var titles={
	'glmk_1' : '����ģ��',
	'a_dxyyj' : '�������ʼ�',
	'a_rsytx' : '�ճ�������',
	'a_grxx' : '������Ϣ',
	'a_kjgl' : '�ռ����',
	'a_grxx' : '������Ϣ',
	'a_grgj' : '��ݹ���',
	'b_rsjg' : '���»���',
	'b_kqgl' : '���ڹ���',
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
	'system_1' : 'ϵͳ����',
	
	
	
	
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
var cate   = 'glmk'; //Ĭ����ʾ������
var action = 'glmk_1'; //Ĭ����ʾ��λ
var type   = 'glmk_1_1';//�¼��𵼺���ȷ 

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
	var html = '<span class="fr s1" style="margin:0 16px">��ǰ����-2007��07��04�� | �û�: admin������: manager��|��<a class="s0"  href="#" onclick="return skin(\'?adskin=2\');">Ĭ�Ϸ��</a>  <a class="s0" href="vbscript:parent.main.location.reload" >ˢ��</a> <a class="s0" href="vbscript:history.back" >��һ��</a> <a class="s0" href="vbscript:history.forward">��һ��</a> <a class="s0" href="vbscript:exitsystem()">�˳�</a></span>';
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