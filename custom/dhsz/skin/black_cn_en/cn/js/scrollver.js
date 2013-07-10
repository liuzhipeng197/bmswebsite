﻿scrollVertical.prototype.scrollArea=null;      // 滚动的区域
scrollVertical.prototype.scrollMsg=null;       // 要滚动的内容
scrollVertical.prototype.unitHeight=0;         // 单独一行滚动内容的高度（程序中通过过的要滚动行的一个节点的offsetHeight获得） 
scrollVertical.prototype.msgHeight=0;          // 整个滚动内容的高度
scrollVertical.prototype.copyMsg=null;         // 复制滚动内容（程序中使用复制scrollMsg.innerHTML来获得的）
scrollVertical.prototype.scrollValue=0;        // 滚动的值
scrollVertical.prototype.scrollHeight=0;       // 滚动高度
scrollVertical.prototype.isStop=true;          // 停止滚动
scrollVertical.prototype.isPause=false;        // 暂停滚动 
scrollVertical.prototype.scrollTimer=null;     // 滚动计时器
scrollVertical.prototype.speed=2000;           // 滚动的时间间隔

/**
 * @method isMoz - 判断是否为Mozilla系列浏览器
 */ 
scrollVertical.prototype.isMoz = function(){
	return navigator.userAgent.toLowerCase().indexOf('gecko') > 0;
};

/**
 * @method play - 滚动信息的处理方法（函数）
 * @param {Object} o - 滚动类
 */ 
scrollVertical.prototype.play = function(o){
	var s_msg = o.scrollMsg;
	var c_msg = o.copyMsg;
	var s_area = o.scrollArea;
	var msg_h = o.msgHeight;
	
	var anim = function(){
		// 如果已经开始计时（间隔时间执行向上滚动），
		// 就停止它（以免无限制执行，耗系统资源）。
		if (o.scrollTimer) { 
			clearTimeout(o.scrollTimer);
		}
		// 如果暂停了滚动（鼠标放到了滚动层上）
		// 开始以10毫秒的时间间隔运行滚动	
		if (o.isPause) {
			o.scrollTimer = setTimeout(anim, 10);
			return;
		}
		// 当显示完所有信息后（这时滚动的距离就等于要滚动信息的高度msg_h）
		// 这时又重新开始滚动，将滚动距离清零
		if (msg_h - o.scrollValue <= 0) {
			o.scrollValue = 0;
		}
		else {
			o.scrollValue += 1;
			o.scrollHeight += 1;
		}
		// 根据浏览器的不同，处理滚动
		if (o.isMoz) { // Mozilla引擎浏览器
			s_area.scrollTop = o.scrollValue;
		}
		else { // 其余的浏览器则使用控制CSS样式处理滚动
			s_msg.style.top = -1 * o.scrollValue + "px";
			c_msg.style.top = (msg_h - o.scrollValue) + "px";
		}
        // 滚动高度等于显示滚动区域高度时（滚动完一行，一行内容全部显示）
		// 暂停4秒中，然后再开始执行下依次滚动。
		if (o.scrollHeight % s_area.offsetHeight == 0) {
			o.scrollTimer = setTimeout(anim, o.speed);
		}
		else {
			// 在两行内容之间过度滚动时，每10豪秒上升1px
			o.scrollTimer = setTimeout(anim, 30);
		}
	};
	// 执行滚动
	anim();
};

/**
 * scrollVertical 垂直滚动的构造函数
 * @param {Object} disp  -  必须  显示滚动区域的DOM节点（或节点ID） 
 * @param {Object} msg    -  必须  被显示的信息的DOM节点（或节点ID）
 * @param {string} tg     -  可选  以什么标记为一行的标签名称（tagName）
 */
function scrollVertical(disp, msg, tg){
	// 给在之前定义的this.scrollArea付值
	if (typeof(disp) == 'string') {
		// 如果disp给的是节点的ID，通过document.getElementById获取该节点
		// 然后付值给this.scrollArea
		this.scrollArea = document.getElementById(disp);
	}
	else {
		// 如果是DOM节点，直接付给this.scrollArea
		this.scrollArea = disp;
	}
	// 以给this.scrollArea相同的方法给this.scrollMsg付值
	if (typeof(msg) == 'string') {
		this.scrollMsg = document.getElementById(msg);
	}
	else {
		this.scrollMsg = msg;
	}
	
	// 为了开发方便，
	// 不用一直写this.scrollMsg这么常的名字，
	// 将两个对象付给局部变量
	var s_msg = this.scrollMsg;
	var s_area = this.scrollArea;
	
	// 如果没有给定一行的识别标签，
	// 默认将li标签认为是一行的标签
	// 所以上面介绍的，tag参数是可选的
	if (!tg) {
		var tg = 'li';
	}
	
	// 获取单行的高度
	// 获取到第一(s_msg.getElementsByTagName(tg)[0])tg(一行的标签)的高度，作为单行的高度
	this.unitHeight = s_msg.getElementsByTagName(tg)[0].offsetHeight;
	// 获取整个信息框的高度
	// 公式为 单行高度（unitHeight）*行数（s_msg.getElementsByTagName(tg).length，显示信息中包含多少个tg(行)标签）
	this.msgHeight = this.unitHeight * s_msg.getElementsByTagName(tg).length;

    /* 
     * 复制要显示的信息：
     * 连续滚动的实现其实就是通过复制信息，
     * 并将复制的信添加到原始信息后
     * 当原始信息滚动显示完成，就接着滚动显示复制的信息
     * 但给人的错觉是，我们看到信息连续不断的显示
	 */
	// 创建复制内容节点
	var copydiv = document.createElement('div');
	// 这个地方感觉有点嵌妥
	// 直接使用element.id的方式，不过看上去，主流的浏览器都支持
	// 标准的DOM Core方法：
	// copydiv.setAttribute('id',s_area.id + "_copymsgid")
	copydiv.id = s_area.id + "_copymsgid";
    // 复制原始的信息
	// 将原始的信息s_msg中的内容，直接用innerHTML写到
	copydiv.innerHTML = s_msg.innerHTML;
	// 设置复制信息节点的高度
	copydiv.style.height = this.msgHeight + "px";
	// 将复制节点添加到原始接点（scrollMsg）后
	// 其实实现的方法就是将复制信息节点（copydiv）添家到显示区域的节点（scrollArea）中
	s_area.appendChild(copydiv);
	
	this.copyMsg = copydiv;
	// 开始执行滚动方法
	this.play(this);
}