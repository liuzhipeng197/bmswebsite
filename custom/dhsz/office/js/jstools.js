Element.extend({
	 amongTo:function(elp,opts){
		var el=this;
		var elSize=el.getSize(),
		    elpSize=elp.getSize();
		var options={width:2,height:2};

		if(opts){options=Object.merge(options,opts);}

		el.setStyle('position','absolute');

		var pos={
			'top':Math.abs(((elpSize.size.y / options.height).toInt())-((elSize.size.y / options.height).toInt())+elp.getPosition().y+elpSize.scroll.y),
			'left':Math.abs(((elpSize.size.x / options.width).toInt())-((elSize.size.x / options.width).toInt())+elp.getPosition().x+elpSize.scroll.x)
		};
		el.setStyles(pos);

        if(el.getStyle('opacity')<1)el.setOpacity(1);
        if(el.getStyle('visibility')!='visible')el.setStyle('visibility','visible');
        if(el.getStyle('display')=='none')el.setStyle('display','');
		return this;
	 },
	 zoomImg:function(maxwidth,maxheight,v){
	   if(this.getTag()!='img'||!this.width)return;
       var thisSize={'width':this.width,'height':this.height}, zommC;
		   if (thisSize.width>maxwidth){
			  zommC=(maxwidth/thisSize.width).toFloat();
			  var zoomSizeH=(thisSize.height*zommC).toInt();
			  Object.append(thisSize,{'width':maxwidth,'height':zoomSizeH});
		   }
		   if (thisSize.height>maxheight){
			  zommC=(maxheight/thisSize.height).toFloat();
			  var zoomSizeW=(thisSize.width*zommC).toInt();
			  Object.append(thisSize,{'width':zoomSizeW,'height':maxheight});
		   }
	   if(!v)return this.set(thisSize);
	   return thisSize;
	 },
	 subText:function(count){
	    var txt=this.get('text');
		if(!count||txt.length<=count)return txt;
		this.setText(txt.substring(0,count)+"...");
		if(!this.retrieve('tip:title'))
		this.set('title',txt);
		return txt;
	 },
	 getValues:function(){
		var values = {};
		this.getFormElements().each(function(el){
			var name = el.name;
			var value = el.getValue();
			if (value === false || !name || el.disabled) return;
			values[el.name] = value;
		});
		return values;
	 },
	 getCis:function(){
		return this.getCoordinates(arguments[0]);
	},
	getContainer:function(){
		return this.getParent("*[container='true']")||$('main')||document.body;
	},
	show:function(){
          this.fireEvent('show',this);
          return this?this.setStyle('display',''):this;
	},
	hide:function(){
        this.fireEvent('hide',this);
        return this?this.setStyle('display','none'):this;
	},
    isDisplay:function(){
        if('none'==this.getStyle('display')||(this.offsetWidth+this.offsetHeight)===0){
        	return false;
        }
        return true;
    },

	toggleDisplay:function(){
		return this&&this.getStyle('display')=='none'?this.setStyle('display',''):this.setStyle('display','none');
	},

	getFormElementsPlus:function(ft){
		var elements=[];
		var nofilterEls=$$(this.getElements('input'), this.getElements('select'), this.getElements('textarea'));
    	if(ft){
    		nofilterEls=nofilterEls.filter(ft);
    	}
    	nofilterEls.each(function(el){
			var name = el.name;
			var value = el.getValue();
			if(!name||!value)return;
			if(el.getProperty('type')=='checkbox'||el.getProperty('type')=='radio'){
        		if(!!el.getProperty('checked')) return elements.include($(el).toHiddenInput());
				return;
			}
			elements.include(el);
		});
		return $$(elements);
	},
	toHiddenInput:function(){
	    return  new Element('input',{'type':'hidden','name':this.name,'value':this.value});
	},
    fixEmpty:function(){
         if(this.get('html').trim()=='&nbsp;'||this.get('html')===''){
			this.innerHTML=''; //Chrome fix by ChaoZhen
            return this.setStyles({fontSize:0});
         }
         return this.setStyles({fontSize:''});
    },
	getSelectedRange: function() {
		if (!Browser.Engine.trident) return {start: this.selectionStart, end: this.selectionEnd};
		var pos = {start: 0, end: 0};
		var range = this.getDocument().selection.createRange();
		if (!range || range.parentElement() != this) return pos;
		var dup = range.duplicate();
		if (this.type == 'text') {
			pos.start = 0 - dup.moveStart('character', -100000);
			pos.end = pos.start + range.text.length;
		} else {
			var value = this.value;
			var offset = value.length - value.match(/[\n\r]*$/)[0].length;
			dup.moveToElementText(this);
			dup.setEndPoint('StartToEnd', range);
			pos.end = offset - dup.text.length;
			dup.setEndPoint('StartToStart', range);
			pos.start = offset - dup.text.length;
		}
		return pos;
	  },
	  selectRange: function(start, end) {
		if (Browser.Engine.trident) {
			var diff = this.value.substr(start, end - start).replace(/\r/g, '').length;
			start = this.value.substr(0, start).replace(/\r/g, '').length;
			var range = this.createTextRange();
			range.collapse(true);
			range.moveEnd('character', start + diff);
			range.moveStart('character', start);
			range.select();
		} else {
			this.focus();
			this.setSelectionRange(start, end);
		}
		return this;
	}
});


String.extend({
	format:function(){
	  if(arguments.length === 0)
		  return this;
		 var reg = /{(\d+)?}/g;
		 var args = arguments;
		 var string=this;
		 var result = this.replace(reg,function($0, $1) {
		   return  args[$1.toInt()]||"";
		  }
	 );
	 return result;
   },
   toFormElements:function(){
    if(!this.contains('=')&&!this.contains('&'))return new Element('input',{type:'hidden'});
    var elements=[];

    var queryStringHash=this.split('&');

    Array.from(queryStringHash).each(function(item){

        if(item.contains('=')){
            item=item.split('=');

            elements.push(new Element('input',{type:'hidden',name:item[0],value:decodeURIComponent(item[1])}));
        }else{
          elements.push(new Element('input',{type:'hidden',name:item}));
        }
    });
    return new Elements(elements);
  },

  getLength:function(charAt){
      var str = this;
      len = 0;
        for(i=0;i<str.length;i++){
            iCode = str.charCodeAt(i);
            if((iCode>=0 && iCode<=255)||(iCode>=0xff61 && iCode<=0xff9f)){
                len += 1;
            }else{
                len += charAt||3;
            }
        }
    return len;
  }
});

/*checkbox划选
  @params scope checkbox所在容器
  @params match 从容器去取得所有checkbox的selector
*/
Element.implement({
	easyCheck: function(match,fn){
		attachEsayCheck(this,match,fn&&fn.call(this));
	}
});
var attachEsayCheck=function(scope,match,callback){
	callback=callback||function(){};
	scope=$(scope);
	if(!scope)return;
	var checks=scope.getElements(match);

	if(!checks.length)return;

    var targetRoot;
	scope.addEvents({
		  'mousedown':function(e){
			  scope.store('eventState',e.type);
			  targetRoot=false;
		  },
		  'mouseup':function(e){
			  scope.eliminate('eventState');
		  },
		  'mouseleave':function(){
			  scope.eliminate('eventState');
		  }
	});
	checks.addEvent('mouseover',function(){
		if(scope.retrieve('eventState')!='mousedown')return;
		var _target= this.match('input')?this:this.getElement('input');

		if(!_target||_target.get('disabled'))return;
		if(!targetRoot){
			targetRoot=_target.set('checked',!_target.get('checked')).fireEvent('change');
			callback(targetRoot);
			return;
		}
		_target.set('checked',targetRoot.get('checked')).fireEvent('change');
		callback(_target);
	});
};

var ItemAgg = new Class({
		Implements: [Events,Options],
		options:{
		   // onActive:function(){},
		   // onBackground:function(){},
		   show:0,
		   eventName:'click',
		   activeName:'cur',
		   itemsClass:null,
		   firstShow:true
		},
		initialize: function(tabs, items, options){
			if(!tabs.length||!items.length)return;
			this.setOptions(options);
			this.tabs=$$(tabs);
			this.items=$$(items);
			this.curIndex=this.options.show||0;
			this.attach();
			if(this.options.firstShow) this.show(this.curIndex);
		},
		attach:function(){
			this.tabs.each(function(item,index){
			    this.items[index].hide();
				item.addEvent(this.options.eventName,function(e){
					if(this.curIndex==index||!this.items[index])return;
					this.show(index);
					this.hide(this.curIndex);
					this.curIndex=index;
				}.bind(this));
			},this);
		},
		show:function(index){
			this.items[index].show();
			if(this.options.itemsClass)
			this.items[index].addClass(this.options.itemsClass);
			this.tabs[index].addClass(this.options.activeName);
			this.fireEvent('active',[this.tabs[index],this.items[index],index],this);
		},
		hide:function(index){
			this.items[index].hide();
			if(this.options.itemsClass)
			this.items[index].removeClass(this.options.itemsClass);
			this.tabs[index].removeClass(this.options.activeName);
			this.fireEvent('background',[this.tabs[index],this.items[index],index],this);
		}
});

var _open = function(url,options){
	options = Object.append({
		width:window.getSize().x*0.8,
		height:window.getSize().y*0.8,
		left:0,
		top:0
	},options||{});
	var params = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width={width},height={height},left={left},top={top}';
	params = params.substitute(options);

	window.open(url||'about:blank','_blank',params);
};

getTplById = function(tplId,tplframe){

    tplframe = tplframe||'tplframe';
    var frameDoc = $(tplframe).contentWindow.document,_html = frameDoc.getElementById(tplId).innerHTML;
    if(!!_html){return _html;}

    return false;
};


window.setTab = function(c,a){
	var cur=c[0],el=c[1],cur_cls=a[0],el_cls=a[1];

	var url = $('_'+cur).getAttribute('url');
	if(url && !$(cur).getAttribute('url')){
		W.page(url,{update:cur});
		$(cur).setAttribute('url',url);
	}

	$(cur).style.display='';
	$('_'+cur).addClass(cur_cls);
	el.each(function(e){
		if(e!=cur){
			$(e).style.display='none';
			$('_'+e).removeClass(cur_cls);
		}
	});
};


function selectArea(sel,path,depth){
    sel=$(sel);
    if(!sel)return;
    var sel_value=sel.value;
    var sel_panel=sel.getParent();
    var selNext=sel.getNext();
    var areaPanel= sel.getParent('*[package]');
    var hid=areaPanel.getElement('input[type=hidden]');

    var setHidden=function(sel){
        var rst=[];
		var sel_break = true;
        var sels=$ES('select',areaPanel);
		sels.each(function(s){
		  if(s.getValue()!= '_NULL_' && sel_break){
			  rst.push($(s.options[s.selectedIndex]).get('text'));
		  }else{
		    sel_break = false;
		  }
		});
        if(sel.value != '_NULL_'){
		    $E('input',areaPanel).value = areaPanel.get('package')+':'+rst.join('/')+':'+sel.value;
		}else{
		    $E('input',areaPanel).value =function(sel){
			  var s=sels.indexOf(sel)-1;
			  if(s>=0){
				 return areaPanel.get('package')+':'+rst.join('/')+':'+sels[s].value;
			  }
			  return '';
            }(sel);
		}

    };
	if(sel_value=='_NULL_'&&selNext&&(selNext.getTag()=='span' && selNext.hasClass('x-areaSelect'))){
		sel.nextSibling.empty();
        setHidden(sel);
	}else{
		/*nextDepth*/
		var curOption=$(sel.options[sel.selectedIndex]);
		if(curOption.get('has_c')){
		  new Request({
				url:'index.php?app=ectools&ctl=tools&act=selRegion&path='+path+'&depth='+depth,
				onSuccess:function(response){
					var e;
					if(selNext && (selNext.getTag()=='span'&& selNext.hasClass('x-region-child'))){
						e = selNext;
					}else{
						e = new Element('span',{'class':'x-region-child'}).inject(sel_panel);
					}
                    setHidden(sel);
					if(response){
						e.set('html',response);
	                    if(hid){
                           hid.retrieve('sel'+depth,function(){})();
                           hid.retrieve('onsuc',function(){})();
                        }
					}else{
						sel.getAllNext().remove();
						setHidden(sel);
						hid.retrieve('lastsel',function(){})(sel);
					}
				}
			}).get();
            if($('shipping')){
				$('shipping').setText('');
            }
		}else{
		    sel.getAllNext().remove();
            setHidden(sel);
            if(!curOption.get('has_c')&&curOption.value!='_NULL_')
            hid.retrieve('lastsel',function(){})(sel);
		}
	}
}

/*
 * new Function & Class
 * by ChaoZhen
 * log:console.log的小封装
 * */

// Modified by site:paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog
(function() {
	var log, history, con = window.console;
	window.log = log = function() {
		history.push(arguments);
		con ? con.log[ con.firebug ? 'apply' : 'call'](con, Array.prototype.slice.call(arguments)) : alert(Array.prototype.slice.call(arguments).join('\n'));
	};
	log.history = history = [];
})();

//绑定常用自定义事件
Element.Events.enter = {
    base: 'keyup', //设置基类事件
    condition: function(event){ //用来检测其他事件触发条件
        return (event.key == 'enter');
    }
};
