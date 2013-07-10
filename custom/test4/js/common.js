
var metux_search = false;
var searchform = function(){
	$('search').addEvents({
		'blur':function(){
			if (this.getProperty('value') == '') this.setProperty('value','输入想要搜索的关键字');
			this.setStyle('font-style','normal');
			this.setStyle('color','#666');
			this.setStyle('font-size','13px');
		}, 
		'focus':function(){
			if (this.getProperty('value') == '输入想要搜索的关键字') this.setProperty('value','');
			this.setStyle('font-style','normal');
			this.setStyle('color','#000');
			this.setStyle('font-size','13px');
		}
	});
    

    $('search_form').getChildren('button').addEvent('click',function(){
        if( metux_search ) return;
        metux_search = true;
        var word = $('search').get('value');
        if( word=='' || word=='输入想要搜索的关键字' ){
            setTimeout( function(){
                metux_search = false;
            },800);
            return;
        }
        
        setTimeout( function(){
            metux_search = false;
        },800);
        return false;
    });
}

window.addEvent('domready',function(){
    searchform();
    var jsonRequest = new Request.JSON({
        url: "/?m=front&a=header_search_dictionary", 
        onComplete: function(arrJson){
            new autoComplete( 
                    $('autoCom'), 
                    $('search'), 
                    $('sub'),
                    arrJson,
                    4);
            }
        }).get();
	var obj = $('menu_main');  
	if (obj){
		window.addEvent('scroll',function(){
			if (obj.getStyle('position') != 'fixed' && window.getScroll().y>=90) {
				obj.addClass('menu_main_scroll');
			}
			if (obj.getStyle('position') == 'fixed' && window.getScroll().y<90){
				obj.removeClass('menu_main_scroll');
			}
			if (window.getScroll().y>=200) {
				$("goTop").setStyle('display','block');
				$("goTop").fade(1); 
			}else 
				$("goTop").fade(0);
		});
		window.addEvent('resize',function(){
			$("goTop").setStyle('left',990/2+window.getSize().x/2+10);
		});
	}
	$("goTop").setStyles({
		'display':'none',
		'left':990/2+window.getSize().x/2+10,
		'background-image':'url(/static/image/arrow_up.png)',
		'width':'26px',
		'height':'80px'
	});
	$("goTop").addEvents({
		'click':function(){
			window.location.href="#";
		}
	});
	new darken(0,$$('.logo_gohome'), 60, 100);

        show_egg = null;

        $('sae_egg').addEvent('click', function(){
        if(navigator.userAgent.indexOf("MSIE 6.0")>0){
            document.location.href = '/';
            return false;
        }
        if(navigator.userAgent.indexOf("MSIE 7.0")>0){
            document.location.href = '/';
            return false;
        }



            var jsonpRequest = new Request.JSONP({
                callbackKey: 'callback',
                url: 'http://stdjs.sinaapp.com/extra/funny/data.json',

                onRequest :function(){
                    if(1 == show_egg && !$('sae_if_egg')){fir_turn_on();}
                    else{fir_turn_down();}
                },
                onComplete: function(data){
                    show_egg = data.show;

                    if(!$('sae_if_egg') && show_egg == 1){
                        fir_turn_on();
                    }
                    else if(show_egg == 0){
                        document.location.href = '/';
                    }
                },
                onFailure : function(res){
                    document.location.href = '/';
                }
            }).send();

        });
});

function fir_turn_on(){
    var newObj  = new Element('iframe', {id: 'sae_if_egg'});
    newObj.inject($('sae_egg'), 'top');

    $('sae_egg').set({
        'styles':{
            'width'     : '100%',
            'height'    : '100%',
            'position'  : 'fixed',
            'backgroundImage':'url(/static/image/msg_layer_bg.png)',
            'margin'    : '0px',
            'top'       : '0px',
            'left'      : '0px',
            'z-index'   : '998'
        }
    });


    $('sae_if_egg').set({
        'width':800,
        'height':600,
        'frameborder':0,
        'allowtransparency':true,
        'marginwidth':0,
        'marginheight':0,
        'scrolling':'no',
        'border':0,
        'src':'http://stdjs.sinaapp.com/extra/funny/',
        'styles':{
            'display': 'block',
            'position': 'absolute',
            'z-index': '999',
            'marginLeft': '-400px',
            'left': '50%',
            'top': '45px'
        }
    });

}

function fir_turn_down(){
                    if($('sae_if_egg')){
                        $('sae_egg').set({
                            'styles':{
                                'width': '28px',
                                'height': '28px',
                                'position': 'absolute',
                                'marginLeft': '46px',
                                'marginTop': '24px',
                                'cursor': 'pointer',
                                'background-color': 'transparent',
                                'marginTop':'24px',
                                'marginLeft':'46px',
                                'left':'auto',
                                'top':'auto',
                                'backgroundImage':'none'
                            }
                        });
                        $('sae_if_egg').destroy();
                    }
 
}


/*
    older all_v8.js contents
*/
function jsunit() {
    return "it works"
}
function box_close() {
    $("#dh_box").hide();
    $("#dh_box").remove()
}
function show_url(a) {
    if ($("#dh_box").length == 0) {
        $('<div id="dh_box"></div>').appendTo(document.body)
    }
    $("#dh_box").html('<p><center><img src="static/image/loading.gif"/></center></p>');
    pos_it($("#dh_box"), "center");
    $("#dh_box").css({width: "90",height: "90",left: $(window).width() / 2,top: 150});
    $("#dh_box").animate({backgroundColor: "#fff",width: 650,height: 340,left: $(window).width() / 2 - 335,top: 100}, 500);
    $("#dh_box").load(a)
}
function pos_it(b, c) {
    var a = window.getCoordinates();
    doc = $(document);
    pTop = doc.scrollTop;
    pLeft = doc.scrollLeft;
    minTop = pTop;
    if (["center", "top", "right", "bottom", "left"].indexOf(c) >= 0) {
        c = [c == "right" || c == "left" ? c : "center", c == "top" || c == "bottom" ? c : "middle"]
    }
    if (c.constructor != Array) {
        c = ["center", "middle"]
    }
    if (c[0].constructor == Number) {
        pLeft += c[0]
    } else {
        switch (c[0]) {
            case "left":
                pLeft += 0;
                break;
            case "right":
                pLeft += a.width - $(b).offsetWidth;
                break;
            default:
            case "center":
                pLeft += (a.width - $(b).offsetWidth) / 2
        }
    }
    if (c[1].constructor == Number) {
        pTop += c[1]
    } else {
        switch (c[1]) {
            case "top":
                pTop += 0;
                break;
            case "bottom":
                pTop += a.height - $(b).offsetHeight;
                break;
            default:
            case "middle":
                pTop += (a.height - $(b).offsetHeight) / 2
        }
    }
    pTop = Math.max(pTop, minTop);
    $(b).setStyles({top: pTop,left: pLeft})
}
function show_it() {
    return "ok"
}
function send_form_pop(a) {
    $(a).set("send", {onSuccess: function(b) {
            set_float_box(b)
        },evalScripts: true});
    $(a).send()
}
function send_form(a) {
    $(a).set("send", {onSuccess: function(b) {
            show_result(b, a)
        },evalScripts: true});
    $(a).send()
}
function show_result(a, c) {
    if (a != "") {
        if (!$("riki_notice_div") && c != "") {
            var b = new Element("div", {id: "riki_notice_div"});
            b.addClass("cunotice");
            b.innerHTML = a;
            b.inject($(c), "top")
        } else {
            $("riki_notice_div").set("html", a)
        }
        $("riki_notice_div").set("styles", {display: "block"})
    } else {
        if ($("riki_notice_div")) {
            $("riki_notice_div").set("styles", {display: "none"})
        }
    }
}
function center_it(a) {
    var b = $(a).getSize();
    $(a).setStyle("left", get_center_left(b.x) + "px");
    var c = parseInt(get_center_top(b.y)) - 50;
    if (c < 100) {
        c = 100
    }
    $(a).setStyle("top", c + "px")
}
function get_center_top(a) {
    return window.getScrollTop() + ((document.documentElement.clientHeight - a) / 2)
}
function get_center_left(a) {
    return window.getScrollLeft() + ((window.getWidth() - a) / 2)
}
function show_float_box(a, b, c) {
    showMask();
    if (typeof c == 'string') {
        box = c;
    } else {
        box = 'riki_float_box';
    }
    if (!$(box)) {
        var c = new Element("div", {id: box});
        c.inject(document.body, "top")
    }
    if (a) {
        $(box).set("load", {onSuccess: function() {
                $(box).set("styles", {display: "block"});
                center_it(box)
            },evalScripts: true});
        center_it(box);
        $(box).set("html", '<div><center><img src="static/image/float_loading.gif" /></center></div>');
        $(box).load(a);
        if (typeof b == "function") {
            b()
        }
    } else {
        $(box).set("styles", {display: "block"});
        center_it(box)
    }
}
function set_float_box(a, box) {
    showMask();
    if (typeof box != 'string')
        box = "riki_float_box";
    if (!$(box)) {
        var b = new Element("div", {'id': box,  'class': 'set_float_box'});
        b.inject(document.body, "top")
    }
    $(box).set("html", a);
    $(box).set("styles", {display: "block"});
    center_it(box)
}
function close_float_box(a) {
    if ($("mask")) {
        hideMask()
    }
    if (typeof a != 'string') {
        a = 'riki_float_box';
    }
    $(a).set("styles", {display: "none"});
}
function close_float_boxre(a) {
    var url = document.location.href;
    var pos = url.indexOf('#');

    if(pos !== -1){
        url = url.substring(0,pos);
        document.location.href = url;
    } else {
        window.location.reload();
    }
}
function page_text_add(a) {
    if (!$("riki_ajax_data")) {
        var b = new Element("div", {id: "riki_ajax_data"})
    } else {
        b = $("riki_ajax_data")
    }
    b.set("load", {onSuccess: function(c) {
            page_list_push(c)
        },evalScripts: true});
    b.load("?m=doc&a=text_add&pid=" + a)
}
function page_list_push(a) {
    if (!$("riki_ajax_data")) {
        var b = new Element("div", {id: "riki_ajax_data"});
        b.set("html", a)
    } else {
        b = $("riki_ajax_data")
    }
    b.inject($("page_list"), "top")
}
function todo_set(c, b, a) {
    if (c.checked) {
        show_float_box("?m=todo&a=check&tid=" + b + "&fpid=" + a)
    } else {
        show_float_box("?m=todo&a=uncheck&tid=" + b + "&fpid=" + a)
    }
}
function show_todo_edit(b, a) {
    if (a) {
        $("todo_edit_" + b).setStyle("display", "none")
    } else {
        $("todo_edit_" + b).setStyle("display", "")
    }
}
function show_type_div(a) {
    if (a == 1 && $("type1").checked) {
        $("type1_desp").setStyle("display", "block");
        $("type2_desp").setStyle("display", "none");
        $("type3_desp").setStyle("display", "none")
    }
    if (a == 2 && $("type2").checked) {
        $("type2_desp").setStyle("display", "block");
        $("type1_desp").setStyle("display", "none");
        $("type3_desp").setStyle("display", "none")
    }
    if (a == 3 && $("type3").checked) {
        $("type3_desp").setStyle("display", "block");
        $("type2_desp").setStyle("display", "none");
        $("type1_desp").setStyle("display", "none")
    }
}
var nowtitle = document.title;
var title_handle = false;
function flash_title() {
    (function() {
        document.title = "【新消息】" + nowtitle
    }).delay(100);
    (function() {
        document.title = "【　　　】" + nowtitle
    }).delay(600);
    (function() {
        document.title = "【新消息】" + nowtitle
    }).delay(1100);
    (function() {
        document.title = "【　　　】" + nowtitle
    }).delay(1600);
    (function() {
        document.title = "【新消息】" + nowtitle
    }).delay(2100);
    (function() {
        document.title = "【　　　】" + nowtitle
    }).delay(2600);
    (function() {
        document.title = "【新消息】" + nowtitle
    }).delay(3100);
    title_handle = setTimeout(flash_title, 10000)
}
function flash_title_stop() {
    if (title_handle) {
        clearTimeout(title_handle);
        document.title = nowtitle
    }
}
function check_message() {
    if (!$("riki_ajax_data")) {
        var a = new Element("div", {id: "riki_ajax_data"})
    } else {
        a = $("riki_ajax_data")
    }
    a.set("load", {evalScripts: true});
    a.load("?m=message&a=check")
}
function set_radio(a, c) {
    var d = document.getElementsByName(a);
    for (var b = 0; b < d.length; b++) {
        if (d[b].type == "radio") {
            if (d[b].value == c) {
                d[b].checked = true
            }
        }
    }
}
function do_print(c) {
    var a = window.document.body.innerHTML;
    var b = window.open("");
    b.document.body.innerHTML = $(c).innerHTML;
    b.print();
    b.close()
}
function play_sound(b) {
    var a = "<embed hidden=true loop=false type=application/x-mplayer2 src=static/audio/message.mp3>";
    if (!$("__play_message_sound")) {
        sound = document.createElement("div");
        sound.id = "__play_message_sound";
        sound.style.position = "absolute";
        sound.innerHTML = a;
        document.body.appendChild(sound)
    } else {
    }
}
function rock_avatar(a, b) {
    if ($("contact_" + a)) {
        $("contact_" + a).setStyle("background", "#FBF5AA")
    }
}
function chkLogin(a, b) {
    show_float_box("/?m=ajax&a=login&u=" + a + "&p=" + b);
    return false
}
function invite(a, b) {
    show_float_box("/?m=coopmng&a=invite&u=" + a + "&app_id=" + b, function() {
        (function() {
            location.reload()
        }).delay(2000)
    });
    return false
}
function versionMakeDefault(a, b) {
    show_float_box("/?m=vermng&a=makeDefault&verId=" + a.trim() + '&app_id=' + b.trim());
    return false
}
function validate(e, g, d) {
    if (d == "") {
        d = g + "Err"
    }
    var j = $(d);
    var b = '<img src="static/image/ok.png" /> ';
    var h = '<img src="static/image/warning.png" /> ';
    var f = h + "该项不能为空！";
    var c = "";
    $(d).empty();
    switch (g) {
        case "email":
            var i = new Request({method: "get",url: "/",onSuccess: function(k) {
                    if (k == "1") {
                        c = b
                    } else {
                        c = h + k
                    }
                    j.set("html", c)
                }}).send("m=ajax&a=validateEml&v=" + e.trim());
            break;
        case "uname":
            if (/^[a-xA-Z0-9_-]{6,18}$/.test(e.trim())) {
                c = b
            } else {
                c = h + "输入有误，仅允许数字字、母下、划线,长度为6到18。"
            }
            break;
        case "tel":
            break;
        case "mobile":
            if (/^(\+86)?1\d{10}$/.test(e.trim())) {
                c = b
            } else {
                c = h + "手机号输入有误!"
            }
            break;
        case "required":
            if (e.trim() == "") {
                c = f
            } else {
                c = b
            }
            break;
        case "appname":
            var i = new Request({method: "get",url: "/",onSuccess: function(k) {
                    if (k == "1") {
                        c = b
                    } else {
                        c = h + k
                    }
                    j.set("html", c)
                }}).send("m=ajax&a=checkapp&v=" + e.trim());
            break;
        case "loginEml":
            var a = /^[\d\w_\.-]{1,20}@([\d\w][\d\w_-]+\.){1,3}[\d\w]{2,4}$/i;
            if (a.test(e.trim())) {
                c = b
            } else {
                c = h + " 邮箱填写有误!"
            }
            break
    }
    j.set("html", c)
}
function popMenu(l, g, f) {
    if (!$(g)) {
        var b = new Element("div", {id: g,"class": "popMenu"});
        b.inject(document.body, "top");
        if (f[0].text != "po") {
            for (var e = 0; e < f.length; e++) {
                (new Element("a", {href: f[e].link,text: f[e].text})).inject(b)
            }
        }
    }
    var c = $(g);
    c.setStyles({visibility: "visible"});
    var d = $(l).getPosition();
    var h = $(l).getSize();
    var j = c.getSize();
    var a = d.x;
    var k = d.y + h.y;
    c.setStyles({left: a + "px",top: k + "px"});
    $(document.body).addEvent("mousemove", function(i) {
        i = window.event || i;
        var m = i.srcElement || i.target;
        if (m.id != g && m != l && m.tagName.toLowerCase() != "a") {
            c.setStyle("visibility", "hidden")
        }
    })
}
function set_float_box2(a, c) {

    /*
    if (!$("riki_float_box")) {
        var e = new Element("div", {id: "riki_float_box"});
        e.inject(document.body, "top")
    }

    var d = a;
    if (typeof d == 'string')
        d = JSON.decode(d);
    var b  = '<div class="box_bg"></div>';
        b += '<div class="box_body">';
        b += '<div class="box_frame" id="msgbox">';
        b += '<div class="box_header">';
        b += '<div class="box_type">';
        b += d.title;
        b += '</div>';
        b += '<div class="box_sae">Sina App Engine</div>';
        b += '<div class="closer" onclick="close_float_box();"></div>';
        b += '</div>';
        b += '<div class="box_container">';

        var showQBoy = false;
        if('undefined'!=typeof(d.imgUrl)){showQBoy = true;}

        if(showQBoy == true){
            b += '<div class="img_pic img_tips"><img src="'+d.imgUrl+'" alt="" /></div>';
            b += '<div class="text_box">';
            b += d.msg;
            b += '</div>';
        }
        else{
            b += '<div class="wide_text_box">';
            b += d.msg;
            b += '</div>';
        }

        b += '<div class="msg_sae"></div>';
        b += '</div>';
        b += '</div>';
        b += '</div>';
        $("riki_float_box").set("html", b);
//    center_it("riki_float_box");
    if (d.status == 0) {
        if (c && c.onSuccess && typeof c.onSuccess == "function") {
            c.onSuccess(d.ext)
        }
    } else {
        if (c && c.onFailure && typeof c.onFailure == "function") {
            c.onFailure(d.status, d.ext)
        }
    }

    //calc if overflow
    var h_window = document.documentElement.clientHeight;
    var h_box_fra= $('msgbox').getStyle('height').toInt();
    var h_esp   = h_window - h_box_fra;

    if(h_window - h_box_fra < 0 ){
        $$('.box_body').setStyle('position','relative');
        $$('.box_body').setStyle('top', '200px' );
    }
    */
    if (!$("riki_float_box")) {
        var e = new Element("div", {id: "riki_float_box"});
        e.inject(document.body, "top")
    }
    var d = a;
    if (typeof d == 'string')
        d = JSON.decode(d);
    var b = '<div class="box_title">';
    b += '<div class="closer"><img src="static/image/cross.gif" onclick="close_float_box()" /></div>';
    b += d.title;
    b += "</div>";
    b += '<div class="box_container">';
    b += d.msg;
    b += "<p>&nbsp;</p>";
    b += '  <br clear="all"/>';
    b += "  </div>";
    $("riki_float_box").set("html", b);
    $("riki_float_box").set("styles", {display: "block"});
    center_it("riki_float_box");
    if (d.status == 0) {
        if (c && c.onSuccess && typeof c.onSuccess == "function") {
            c.onSuccess(d.ext)
        }
    } else {
        if (c && c.onFailure && typeof c.onFailure == "function") {
            c.onFailure(d.status, d.ext)
        }
    }
}
function showMask() {
    var a = $("mask");
    if (!a) {
        a = new Element("div", {id: "mask"})
    }
    a.setStyle("z-index", "200");
    a.setStyle("display", "");
    a.inject(document.body, "top");

    //>>soulteary
    adjustzIndex();
    //<<soulteary
}
function adjustzIndex(){
    var a = document.getElementsByTagName('body')[0].getElementsByTagName('*');
    var t = document.getElementById('mask').style.zIndex;

    for(var i=0;i<a.length;i++){
        if('SCRIPT' != a[i].nodeName && a[i].style.zIndex){
            if(t<= a[i].style.zIndex){a[i].style.zIndex = t -10;}
        }
    }
}
function hideMask() {
    if( !$('mask') || $("mask").length===0 ) return;
    $("mask").setStyle("display", "none")
}

Array.prototype.removeAt = function(idx) {
    if (this.length == 0)
        return true;
    if (idx == (this.length - 1)) 
    {
        this.length--;
        return true;
    }
    if (idx >= this.length)
        return false;
    for (var i = idx; i < this.length - 1; i++) 
    {
        this[i] = this[i + 1];
    }
    this.length--;
    return true;
}
function show_loading(txt) 
{
    showMask();
    set_float_box2({'status': 0,'msg': '<img src="/static/image/float_loading.gif" style="vertical-align:middle;" /> ' + txt,'title': '正在加载...'});
}

function pop_login_form(_target, _callback, btn_txt, before_submit) 
{
    if (!btn_txt)
        btn_txt = '登录';
    if (!_target)
        _target = $$('body')[0];
    var outer = $('_pop_login_outer');
    var container = $('_pop_login_container');
    var intv = 0;
    if (!outer) {
        outer = new Element('div', {'id': '_pop_login_outer'});
    } 
    else {
        outer.removeClass('hide');
    }
    if (!container) {
        container = new Element('div', {'id': '_pop_login_container'});
    }
    outer.adopt(container);
    //_target.adopt(outer);
    outer.inject(_target, 'top');
    var html = '<form id="_pop_login_form" method="post" action="/?m=ajax&a=login2" >';
    html += '<p class="_pop_form_title">用户登录：<span class="closer" style="padding-right:5px;" onclick="$(\'_pop_login_outer\').addClass(\'hide\');hideMask();"><img src="static/image/cross.gif" /></span></p>';
    html += '<p id="_email_panel"><label class="form_tip">安全邮箱</label><input type="text" class="text" name="email" /></p>';
    html += '<p><label class="form_tip">密码</label><input type="password" class="text" name="psw" /></p>';
    html += '<p><label class="form_tip">验证码</label><input type="text" class="text" name="verify" /></p>';
    html += '<p><img src="/vc.php?' + Math.random() + '" onclick="this.src=\'/vc.php?\'+Math.random();" id="vcode_img" /></p>';
    html += '<p><a href="/?m=home&a=reg" target="_blank">创建帐号</a> <input type="submit" class="button" value="' + btn_txt + '" /></p>';
    container.set('html', html);
    center_it(outer);
    showMask();
    $('_pop_login_form').addEvent('submit', function(e) {
        e.stop();
        if (typeof before_submit == 'function')
            before_submit();
        this.set('send', {async: false,evalScripts: true,onSuccess: function(resp) {
                resp = JSON.decode(resp);
                if (resp.status === 0) {
                    g_logedin = true;
                    if (typeof _callback == 'function')
                        _callback();
                    else {
                        if (resp.redirect)
                            location.href = resp.redirect;
                        else
                            location.reload();
                    }
                    $('_pop_login_outer').toggleClass('hide');
                    hideMask();
                    clearInterval(intv);
                } 
                else {
                    $('vcode_img').src = '/vc.php?' + Math.random();
                    alert('登录失败,' + resp.msg);
                }
            }});
        this.send();
    });
    intv = setInterval("center_it('_pop_login_outer');", 200);
}
var adjust_height = function() {
    try {
        innerDoc = ($('LightFrame').contentDocument) ? $('LightFrame').contentDocument : $('LightFrame').contentWindow.document;
        var h = innerDoc.body.scrollHeight;
        var w = innerDoc.body.scrollWidth;
        $('LightFaceFrame').setStyles({width: (w + 60) + 'px',height: (h + 120) + 'px'});
        $('lightfaceContent').setStyles({width: (w + 40) + 'px',height: (h + 90) + 'px'});
        $('LightFaceMessageBox').setStyles({width: (w + 40) + 'px',height: (h + 20) + 'px'});
        $('LightFrame').setStyles({width: (w + 20) + 'px',height: (h + 20) + 'px'});
    } catch (ex) {
    }
    ;
};


function pop_relogin_frame(opt) 
{
    var redirect = opt.redirect ? encodeURIComponent(opt.redirect) : '';
    if (!window.LoginFrame)
        window.LoginFrame = new LightFace.IFrame({width: 600,height: 400,title: '安全认证',draggable: true /*,onComplete: function(){adjust_height();}*/}).addButton('Close', function() {
            this.close();
        }, 'blue');
    if (typeof opt.callback == 'function') 
    {
        window.LoginFrame.callback = opt.callback;
    } 
    else
        window.LoginFrame.callback = null;
    //window.LoginFrame.load('https://'+window.location.host+'/?m=user&a=login_frame&relogin=true&to='+redirect);
    window.LoginFrame.load('/?m=user&a=login_frame&relogin=true&to=' + redirect);
    window.LoginFrame.open();
}

function pop_login_frame(opt) 
{
    if (typeof opt.callback == 'function') 
    {
        scsso.login(opt.callback);
    } 
    else 
    {
        scsso.login();
    }
    return false;
}

/*
function pop_login_frame(opt)
{
    var redirect=opt.redirect ? encodeURIComponent(opt.redirect) : '';
    if(!window.LoginFrame)
*/
//        window.LoginFrame = new LightFace.IFrame({ width:600, height:400, title: '请使用新浪微博用户名和密码登录',dynamic_size:false,draggable:true /* ,onComplete: function(){adjust_height();} */  }).addButton('Close', function() { this.close(); },'blue');
/*
    if(typeof opt.callback == 'function')
    {
        window.LoginFrame.callback = opt.callback;
    }
    else window.LoginFrame.callback = null;
    window.LoginFrame.load('/?m=user&a=login_frame&to='+redirect);
    window.LoginFrame.open();
}
*/

/* 通过ajax发送请求,如果需要权限验证则显示登录框,登录成功后重新发送 */
function send_form_retry(form, redirect_to, reload_on_close) 
{
    form = $(form);
    if (!form)
        return false;
    form.addEvent('submit', function(e) {
        e && e.stop();
        if (!form.getProperty('send_set')) {
            form.set('send', {
                evalScripts: true,
                onRequest: function() {
                    show_loading('正在加载，请稍候……');
                },
                onComplete: function(resp) {
                    var auth = this.getHeader('Auth_needed');
                    if (this.getHeader('vcode')) {
                        if ($('vcode_img')) {
                            $('vcode_img').src = '/vc.php?r=' + Math.random();
                        }
                    }
                    if (!auth) 
                    {
                        set_float_box(resp);
                        if (reload_on_close && $('float_box_closer'))
                            $('float_box_closer').addEvent('click', function() {
                                location.reload();
                            });
                        var refresh = this.getHeader('refresh');
                        if (refresh && refresh.toInt() > 0)
                            (function() {
                                location.reload();
                            }).delay(refresh.toInt() * 1000);
                        else if (redirect_to && this.getHeader('sae_ok') == '1')
                            (function() {
                                location.href = redirect_to;
                            }).delay(1000);
                        return true;
                    }
                    if (auth == 'relogin') 
                    {
                        pop_relogin_frame({callback: function() {
                                form.fireEvent('submit');
                            }});
                        return true;
                    } 
                    else if (auth == 'login') 
                    {
                        pop_login_frame({callback: function() {
                                form.fireEvent('submit');
                            }});
                        return false;
                    }
                }
            });
            form.setProperty('send_set', '1');
        }
        form.send();
    });
    form.fireEvent('submit');
}

function show_float_box_retry(url, cb, reload_on_close) 
{
    var req = new Request({
        method: 'post',
        evalScripts: true,
        url: url,
        onRequest: function() {
            showMask();
        },
        onComplete: function(resp) {
            var hd = this.getHeader('Auth_needed');
            if (hd == 'relogin')
                return pop_relogin_frame({callback: function() {
                        show_float_box_retry(url, cb);
                    }});
            else if (hd == 'login')
                return pop_login_frame({callback: function() {
                        show_float_box_retry(url, cb);
                    }});
            else 
            {
                var refresh = this.getHeader('refresh');
                if (refresh && refresh.toInt() > 0) {
                    (function() {
                        location.reload();
                    }).delay(refresh.toInt() * 1000);
                } else if (this.getHeader('sae_ok') && (typeof cb == 'function')) {
                    set_float_box(resp);
                    cb();
                } else {
                    set_float_box(resp);
                }
                if (this.getHeader('sae_ok') && reload_on_close) {
                    $('float_box_closer').addEvent('click', function() {
                        location.reload();
                    });
                }
            }
        }
    }).send();
}


function pop_box_redirect(url, msg) 
{
    var info = {title: '系统消息','msg': msg,'status': 0};
    showMask();
    set_float_box2(info);
    (function() {
        location.href = url;
    }).delay(2000);
}

function pop_box_exec(url, callback) 
{
    var req = new Request({
        method: 'get',
        evalScripts: true,
        url: url,
        onComplete: function(resp) {
            set_float_box(resp);
            if (this.getHeader('sae_ok') && (typeof callback == 'function'))
                callback();
        }
    }).send();
}

function set_float_box3(html, title, callback) 
{
    remove_float_box();
    
    showMask();
    
    if (!html)
        html = '...';
    if (!title)
        title = '系统消息';
    if (!$('riki_float_box')) {
        var cdiv = new Element('div', {id: 'riki_float_box'});
        cdiv.inject(document.body, 'top');
    }
    var box_title = new Element('div', {'class': 'box_title'});
    var closer = new Element('div', {'class': 'closer'});
    var closer_img = new Element('img', {
        'src': 'static/image/cross.gif',
        'events': {
            'click': function() {
                remove_float_box();
                if (callback && typeof callback == 'function')
                    callback();
            }
        }
    });
    var title_text = new Element('span', {'html': title});
    var box_container = new Element('div', {'class': 'box_container','style': 'padding:10px','html': html});
    var box_clr = new Element('div', {'class': 'clr'});
    $('riki_float_box').empty().grab(box_title.grab(closer.grab(closer_img)).grab(title_text)).grab(box_container.grab(box_clr)).setStyle("display", "block");
    fixed_box('riki_float_box');

}

function set_float_box4(html, title, callback) 
{
    remove_float_box();
    
    showMask();
    
    if (!html)
        html = '...';
    if (!title)
        title = '系统消息';
    if (!$('riki_float_box')) {
        var cdiv = new Element('div', {id: 'riki_float_box','class': 'sae_float_box4'});
        cdiv.inject(document.body, 'top');
    }
    $('riki_float_box').set('html', '<table class="border"> <tr> <td class="filter c1">&nbsp;</td><td class="filter c2">&nbsp;</td> <td class="filter c1">&nbsp;</td> </tr> <tr> <td class="filter c3">&nbsp;</td> <td class="conbg"><div class="boxbd"><div class="boxtitle"><span class="titletext"></span><span class="closer">×</span><div class="clr"></div></div><div class="boxcontent"></div></div></td> <td class="filter c3">&nbsp;</td> </tr> <tr> <td class="filter c1">&nbsp;</td> <td class="filter c2">&nbsp;</td> <td class="filter c1">&nbsp;</td> </tr> </table>');
    
    $('riki_float_box').getElements(".boxbd .boxtitle span.titletext").set('html', title);
    $('riki_float_box').getElements(".boxbd .boxtitle span.closer").addEvent('click', function() {
        remove_float_box();
        if (callback && typeof callback == 'function')
            callback();
    });
    $('riki_float_box').getElements(".boxbd .boxcontent").set('html', html);
    
    var innerwidth = $('riki_float_box').getElement(".boxbd").getStyle('width').toInt();
    var outwidth = innerwidth + 20;
    
    $('riki_float_box').setStyles({
        "background": "none",
        "border": "1px solid #CCC",
        "width": outwidth
    });
    
    fixed_box('riki_float_box');

}


function tipmsg(container, msg, time) 
{
    if (!$(container))
        return;
    if (!msg)
        msg = "……";
    
    $(container) && $(container).set("html", msg).setStyle("display", "block");
    
    if (time && !isNaN(time)) {
        (function() {
            $(container) && $(container).setStyle("display", "none");
        }).delay(time);
    }

}

function remove_float_box(a) {
    if ($("mask")) {
        hideMask();
    }
    if (typeof a != 'string') {
        a = 'riki_float_box';
    }
    if ($(a)) {
        $(a).destroy();
    }
}

function fixed_box(boxid) {
    
    if (!boxid || boxid == '')
        boxid = 'riki_float_box';
    
    if ($(boxid) == null)
        return;
    
    var boxsize = $(boxid).getSize();
    var winh = document.documentElement.clientHeight;
    var winw = window.getWidth();
    var boxtop = (winh - boxsize.y) / 3;
    var boxleft = (winw - boxsize.x) / 2;
    if (boxtop < 0) {
        boxtop = 0;
        $$("#" + boxid + " div.container").setStyle('height', boxtop - 50);
    }
    if (boxleft < 0) {
        boxleft = 0;
    }
    $(boxid).setStyles({
        'display': 'block',
        'position': 'fixed',
        'left': boxleft,
        'top': boxtop
    });

}


var tabdropdown = {disappeardelay: 200,disablemenuclick: false,enableiframeshim: 1,dropmenuobj: null,ie: document.all,firefox: document.getElementById && !document.all,previousmenuitem: null,currentpageurl: window.location.href.replace("http://" + window.location.hostname, "").replace(/^\//, ""),getposOffset: function(d, c) {
        var b = (c == "left") ? d.offsetLeft : d.offsetTop;
        var a = d.offsetParent;
        while (a != null) {
            b = (c == "left") ? b + a.offsetLeft : b + a.offsetTop;
            a = a.offsetParent
        }
        return b
    },showhide: function(c, b, a) {
        if (this.ie || this.firefox) {
            this.dropmenuobj.style.left = this.dropmenuobj.style.top = "-500px"
        }
        if (b.type == "click" && c.visibility == hidden || b.type == "mouseover") {
            if (a.parentNode.className.indexOf("default") == -1) {
                a.parentNode.className = "selected"
            }
            c.visibility = "visible"
        } else {
            if (b.type == "click") {
                c.visibility = "hidden"
            }
        }
    },iecompattest: function() {
        return (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body
    },clearbrowseredge: function(e, c) {
        var b = 0;
        if (c == "rightedge") {
            var d = this.ie && !window.opera ? this.standardbody.scrollLeft + this.standardbody.clientWidth - 15 : window.pageXOffset + window.innerWidth - 15;
            this.dropmenuobj.contentmeasure = this.dropmenuobj.offsetWidth;
            if (d - this.dropmenuobj.x < this.dropmenuobj.contentmeasure) {
                b = this.dropmenuobj.contentmeasure - e.offsetWidth
            }
        } else {
            var a = this.ie && !window.opera ? this.standardbody.scrollTop : window.pageYOffset;
            var d = this.ie && !window.opera ? this.standardbody.scrollTop + this.standardbody.clientHeight - 15 : window.pageYOffset + window.innerHeight - 18;
            this.dropmenuobj.contentmeasure = this.dropmenuobj.offsetHeight;
            if (d - this.dropmenuobj.y < this.dropmenuobj.contentmeasure) {
                b = this.dropmenuobj.contentmeasure + e.offsetHeight;
                if ((this.dropmenuobj.y - a) < this.dropmenuobj.contentmeasure) {
                    b = this.dropmenuobj.y + e.offsetHeight - a
                }
            }
            this.dropmenuobj.firstlink.style.borderTopWidth = (b == 0) ? 0 : "1px"
        }
        return b
    },dropit: function(c, b, a) {
        if (this.dropmenuobj != null) {
            this.dropmenuobj.style.visibility = "hidden";
            if (this.previousmenuitem != null && this.previousmenuitem != c) {
                if (this.previousmenuitem.parentNode.className.indexOf("default") == -1) {
                    this.previousmenuitem.parentNode.className = ""
                }
            }
        }
        this.clearhidemenu();
        if (this.ie || this.firefox) {
            c.onmouseout = function() {
                tabdropdown.delayhidemenu(c)
            };
            c.onclick = function() {
                return !tabdropdown.disablemenuclick
            };
            this.dropmenuobj = document.getElementById(a);
            this.dropmenuobj.onmouseover = function() {
                tabdropdown.clearhidemenu()
            };
            this.dropmenuobj.onmouseout = function(d) {
                tabdropdown.dynamichide(d, c)
            };
            this.dropmenuobj.onclick = function() {
                tabdropdown.delayhidemenu(c)
            };
            this.showhide(this.dropmenuobj.style, b, c);
            this.dropmenuobj.x = this.getposOffset(c, "left");
            this.dropmenuobj.y = this.getposOffset(c, "top");
            this.dropmenuobj.style.left = this.dropmenuobj.x - this.clearbrowseredge(c, "rightedge") + "px";
            this.dropmenuobj.style.top = this.dropmenuobj.y - this.clearbrowseredge(c, "bottomedge") + c.offsetHeight + 1 + "px";
            this.previousmenuitem = c;
            this.positionshim()
        }
    },contains_firefox: function(d, c) {
        while (c.parentNode) {
            if ((c = c.parentNode) == d) {
                return true
            }
        }
        return false
    },dynamichide: function(c, b) {
        var a = window.event ? window.event : c;
        if (this.ie && !this.dropmenuobj.contains(a.toElement)) {
            this.delayhidemenu(b)
        } else {
            if (this.firefox && c.currentTarget != a.relatedTarget && !this.contains_firefox(a.currentTarget, a.relatedTarget)) {
                this.delayhidemenu(b)
            }
        }
    },delayhidemenu: function(a) {
        this.delayhide = setTimeout(function() {
            tabdropdown.dropmenuobj.style.visibility = "hidden";
            if (a.parentNode.className.indexOf("default") == -1) {
                a.parentNode.className = ""
            }
        }, this.disappeardelay)
    },clearhidemenu: function() {
        if (this.delayhide != "undefined") {
            clearTimeout(this.delayhide)
        }
    },positionshim: function() {
        if (this.enableiframeshim && typeof this.shimobject != "undefined") {
            if (this.dropmenuobj.style.visibility == "visible") {
                this.shimobject.style.width = this.dropmenuobj.offsetWidth + "px";
                this.shimobject.style.height = this.dropmenuobj.offsetHeight + "px";
                this.shimobject.style.left = this.dropmenuobj.style.left;
                this.shimobject.style.top = this.dropmenuobj.style.top
            }
            this.shimobject.style.display = (this.dropmenuobj.style.visibility == "visible") ? "block" : "none"
        }
    },hideshim: function() {
        if (this.enableiframeshim && typeof this.shimobject != "undefined") {
            this.shimobject.style.display = "none"
        }
    },isSelected: function(a) {
        var a = a.replace("http://" + a.hostname, "").replace(/^\//, "");
        return (tabdropdown.currentpageurl == a)
    },init: function(e, c) {
        this.standardbody = (document.compatMode == "CSS1Compat") ? document.documentElement : document.body;
        var f = document.getElementById(e).getElementsByTagName("a");
        for (var d = 0; d < f.length; d++) {
            if (f[d].getAttribute("rel")) {
                var a = f[d].getAttribute("rel");
                document.getElementById(a).firstlink = document.getElementById(a).getElementsByTagName("a")[0];
                f[d].onmouseover = function(h) {
                    var g = typeof h != "undefined" ? h : window.event;
                    tabdropdown.dropit(this, g, this.getAttribute("rel"))
                }
            }
            if (c == "auto" && typeof b == "undefined" && this.isSelected(f[d].href)) {
                f[d].parentNode.className += " selected default";
                var b = true
            } else {
                if (parseInt(c) == d) {
                    f[d].parentNode.className += " selected default"
                }
            }
        }
    }};


var sae = {};
sae.over_text = function(id) {
    if (!$(id) || !$(id).getProperty('title'))
        return false;
    $(id).addClass('grayTxt').set('value', $(id).getProperty('title'));
    $(id).addEvents({
        'focus': function() {
            if (this.value.trim() == this.getProperty('title')) {
                this.value = '';
                this.removeClass('grayTxt');
            }
        },
        'blur': function() {
            if (this.value.trim() == '') {
                this.value = this.getProperty('title');
                this.addClass('grayTxt');
            }
        }
    });
};

function getparam(paras) {

    var url = location.href;
    var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
    var paraObj = {}
    for (i = 0; j = paraString[i]; i++) {
        paraObj[j.substring(0, j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=") + 1, j.length);
    }
    var returnValue = paraObj[paras.toLowerCase()];
    if (typeof (returnValue) == "undefined") {
        return "";
    } else {
        return returnValue;
    }
}

function show_vcode() {
    if ($('vcode_area') && !$('vcode_img')) {
        $('vcode_area').set('html', '<img src="/vc.php" onclick="this.src=\'/vc.php?r=\'+Math.random();" style="cursor:pointer;" id="vcode_img" />');
    }
}

//get mootool extended element by name and type
function $n(an, t) {
    if (!an || typeof an != 'string') {
        return false;
    }
    
    t = t || '*';
    
    var arr = $$(t + '[name=' + an + ']');
    if (arr) {
        return arr[0];
    } 
    else {
        return false;
    }
}



/*-----这段是新版topright的JS------*/

window.addEvent("domready",function(){
    if ($('accmenu')) { 
        $('accmenu').addEvents({
        'mouseover':function(){
            this.addClass('new_my_active');
            var accx = $('accmenu').getPosition().x;
            $('accdrop').setStyles({
                'left':accx+1
            });
            $('accdrop').setStyle('display','block');	
            $('accSel_title').setStyle('color','#08C');
        },
        'mouseout':function(){
            this.removeClass('new_my_active');
            $('accdrop').setStyle('display','none');
            $('accSel_title').setStyle('color','#036AC2');
        },
        'click':function(){
            window.open("/?m=home&a=tab");
        }
        });
    }
    if ($('accdrop') && $('accmenu')){
        $('accdrop').addEvents({
        'mouseover':function(){
            $('accmenu').addClass('new_my_active');
            $('accdrop').setStyle('display','block');	
            $('accSel_title').setStyle('color','#08C');
        },
        'mouseout':function(){
            $('accmenu').removeClass('new_my_active');
            $('accdrop').setStyle('display','none');
            $('accSel_title').setStyle('color','#036AC2');
        }
        });
    }
    if ($('new_myapp')) {
        $('new_myapp').addEvents({
        'mouseover':function(){
            this.addClass('new_my_active');
            if( top_dropdown_partiapps_exist == true )
                $('appSelMenu').setStyles({'display':'block','width':'260px'});
            else
                $('appSelMenu').setStyles({'display':'block','width':'130px'});
            var appx = $('new_myapp').getPosition().x;
            var appw = $('new_myapp').getCoordinates().width;
            var menuw = $('appSelMenu').getCoordinates().width;
            if( $('appSelMenu_inject') === null ){
                var inject = new Element('div', {id: 'appSelMenu_inject'});
                inject.setStyles({
                            'height'    : '1px',
                            'width'     : ( parseInt(appw)-2 )+'px',
                            'background': '#fff',
                            'display'   : 'block',
                            'position'  : 'absolute',
                            'z-index'   : '99999',
                            'top'       : ( parseInt($('appSelMenu').getStyle('top')) )+'px',
                            'left'      : ( parseInt(appx)+2 )+'px'
                }).inject( $('body') );
            
                $('appSelMenu_inject').addEvent('mouseover',function(){
                    $('new_myapp').addClass('new_my_active');
                    $('appSelMenu').setStyle('display','block');
                    $('appSel_title').setStyle('color',"#08C");
                });
            }
            else{
                $('appSelMenu_inject').setStyles({
                    'top'   : ( parseInt($('appSelMenu').getStyle('top')) )+'px',
                    'left'  : ( parseInt(appx)+2 )+'px'
                });    
            }

            $('appSelMenu').setStyles({
                'left':appx+1,
                'z-index':'99998'
            });



            $('appSel_title').setStyle('color',"#08C");
        },
        'mouseout':function(){
            this.removeClass('new_my_active');
            $('appSelMenu').setStyle('display','none');
            $('appSel_title').setStyle('color',"#036AC2");
        }
        });
    }
    if ($('appSelMenu')){
        $('appSelMenu').addEvents({
        'mouseover':function(){
            $('new_myapp').addClass('new_my_active');
            $('appSelMenu').setStyle('display','block');
            $('appSel_title').setStyle('color',"#08C");
        },
        'mouseout':function(){
            $('new_myapp').removeClass('new_my_active');
            $('appSelMenu').setStyle('display','none');
            $('appSel_title').setStyle('color',"#036AC2");
        }
        });
    }

});
/*------结束了------*/

//TIPBOX
function showTipsBox(objName,msg){

    //read cookies
    var myCookie_exist = Cookie.read(objName);
    if(1 == myCookie_exist)
    {
        return;
    }
    var finder = document.getElementById(objName);
    if (!finder) {
        return;
    }
    //FONT :12PX ==> MSGBOX WIDTH
    var tmpMsg = msg;
        tmpMsg = tmpMsg.replace(/<\/?[^>]*>/g,'');//去除HTML tag
        tmpMsg = tmpMsg.replace(/[ | ]*\n/g,'\n');//去除行尾空白
        tmpMsg = tmpMsg.replace(/\n[\s| | ]*\r/g,'\n');//去除多余空行
    var msgLen = tmpMsg.length * 12 + 10;
    var topTips = document.createElement('div');
        topTips.id = "newTips";
        topTips.className = "topTips";
        topTips.style.top = parseInt(finder.offsetHeight+finder.offsetTop+10)+"px";
        topTips.style.position = "absolute";
        topTips.style.float = "left";
    finder.appendChild(topTips);

        var layer_tips = document.createElement('div');
            layer_tips.id = "tipLayer"
            layer_tips.className = "layer_tips";
            layer_tips.style.top = "-4px";
            layer_tips.style.width = msgLen + 'px';
            var layerLeft = msgLen - 20;
            layer_tips.style.left = "-" + layerLeft+"px";

            //layer_tips.style.left = tmpNum +"px";
            layer_tips.style.position = "absolute";
        topTips.appendChild(layer_tips);

            var inner = document.createElement('div');
                inner.className = "inner";
            layer_tips.appendChild(inner);

                var inner_text = document.createElement('div');
                    inner_text.className = "inner_text";
                    inner_text.innerHTML = "<span>"+msg+"</span>"
                inner.appendChild(inner_text);

            var a = document.createElement('a');
                a.href="javascript:;";
                a.className="tips_close";

            layer_tips.appendChild(a);

            $$('.tips_close').addEvent('click',function(){
                    var node = document.getElementById('newTips');
                    node.parentNode.removeChild(node);
                    //Add a cookies 
                    var myCookie = Cookie.write(objName, '1', {duration: 1});
                });

            var span = document.createElement('span');
                span.className="arrow_up";
            layer_tips.appendChild(span);

}

// MooTools: the javascript framework.
// Load this file's selection again by visiting: http://mootools.net/more/0119174cc074dcb3c71d29e9b0ee39d9 
// Or build this file again with packager using: packager build More/Request.JSONP
/*
---
copyrights:
  - [MooTools](http://mootools.net)

licenses:
  - [MIT License](http://mootools.net/license.txt)
...
*/
MooTools.More={version:"1.4.0.1",build:"a4244edf2aa97ac8a196fc96082dd35af1abab87"};Request.JSONP=new Class({Implements:[Chain,Events,Options],options:{onRequest:function(a){if(this.options.log&&window.console&&console.log){console.log("JSONP retrieving script with url:"+a);
}},onError:function(a){if(this.options.log&&window.console&&console.warn){console.warn("JSONP "+a+" will fail in Internet Explorer, which enforces a 2083 bytes length limit on URIs");
}},url:"",callbackKey:"callback",injectScript:document.head,data:"",link:"ignore",timeout:0,log:false},initialize:function(a){this.setOptions(a);},send:function(c){if(!Request.prototype.check.call(this,c)){return this;
}this.running=true;var d=typeOf(c);if(d=="string"||d=="element"){c={data:c};}c=Object.merge(this.options,c||{});var e=c.data;switch(typeOf(e)){case"element":e=document.id(e).toQueryString();
break;case"object":case"hash":e=Object.toQueryString(e);}var b=this.index=Request.JSONP.counter++;var f=c.url+(c.url.test("\\?")?"&":"?")+(c.callbackKey)+"=Request.JSONP.request_map.request_"+b+(e?"&"+e:"");
if(f.length>2083){this.fireEvent("error",f);}Request.JSONP.request_map["request_"+b]=function(){this.success(arguments,b);}.bind(this);var a=this.getScript(f).inject(c.injectScript);
this.fireEvent("request",[f,a]);if(c.timeout){this.timeout.delay(c.timeout,this);}return this;},getScript:function(a){if(!this.script){this.script=new Element("script",{type:"text/javascript",async:true,src:a});
}return this.script;},success:function(b,a){if(!this.running){return;}this.clear().fireEvent("complete",b).fireEvent("success",b).callChain();},cancel:function(){if(this.running){this.clear().fireEvent("cancel");
}return this;},isRunning:function(){return !!this.running;},clear:function(){this.running=false;if(this.script){this.script.destroy();this.script=null;
}return this;},timeout:function(){if(this.running){this.running=false;this.fireEvent("timeout",[this.script.get("src"),this.script]).fireEvent("failure").cancel();
}return this;}});Request.JSONP.counter=0;Request.JSONP.request_map={};

function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }
