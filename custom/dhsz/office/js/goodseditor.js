var NitcGoodsEditor = new Class({
    Implements:[Options],
    options: {
        periodical: false,
        delay: 500,
        postvar:'finderItems',
        varname:'items',
        width:500,
        height:400
    },
    initialize: function(el, options){
        this.el = $(el);
        this.setOptions(options);
       // this.initEditorBody.call(this);
    },
	catalogSelect:function(typeid,id){
		typeid=typeid||1;
        var gtypeSelect=$('gEditor-GType-input');
        if(typeid!=gtypeSelect.getValue()){
			if(confirm(LANG_goodseditor['comfirm'])||id<0){
				gtypeSelect.getElement('option[value='+typeid+']').set('selected',true);
				this.updateEditorBody.call(this);
			}
		}
        this.cat_id = id;
	},
    initEditorBody:function(){         
        var _this=this;
        var gcatSelect=$('gEditor-GCat-input');
        var gtypeSelect=$('gEditor-GType-input');
        
        gtypeSelect.addEvent('click',function(){
           this.store('tempvalue',this.getValue());
        });
        gtypeSelect.addEvent('change',function(e){
            var tmpTypeValue = this.retrieve('tempvalue');
			if(this.getValue()&&confirm(LANG_goodseditor['comfirm'])){
					_this.updateEditorBody.call(_this);
					
					_this.type_id=this.getValue();
			}else{
				this.getElement('option[value='+tmpTypeValue+']').set('selected',true);
           }
        });
    },
    updateEditorBody:function(options){
		try{
		if($('productNode')&&$('productNode').retrieve('specOBJ')){
			$('productNode').appendChild($('productNode').retrieve('specOBJ').toHideInput($('productNode').getElement('tr')));		
		}
		}catch(e){}
	   var parma={
		   update:'gEditor-Body',
		  method:'post',
		data:$('gEditor').toQueryString(),
		url:'index.php?app=b2c&ctl=admin_goods_editor&act=update',
		onComplete:function(callHtml){
			   goodsEditFrame();
       }};
	   new Request.HTML(parma).send();
    //   W.page('index.php?app=b2c&ctl=admin_goods_editor&act=update',parma);
    },
    mprice:function(e){
        for(var dom=e.parentNode; dom.tagName!='TR';dom=dom.parentNode){;}
        var info = {};
        $ES('input',dom).each(function(el){
            if(el.name == 'price[]')
                info['price']=el.value;
            else if(el.name == 'goods[product][0][price]')
                info['price']=el.value;
            else if(el.getAttribute('level'))
                info['level['+el.getAttribute('level')+']']=el.value;
        });
        window.fbox = new Dialog('index.php?app=b2c&ctl=admin_goods_editor&act=set_mprice',{title:LANG_goodseditor['editvipprice'], ajaxoptions:{data:info,method:'post'},modal:true});
        window.fbox.onSelect = goodsEditor.setMprice.bind({base:goodsEditor,'el':dom});
    },
    setMprice:function(arr){
        var parr={};
        arr.each(function(p){
            parr[p.name] = p.value;
        });
        $ES('input',this.el).each(function(d){
            var level = d.getAttribute('level');
            if(level && parr[level]!=undefined){
                d.value = parr[level];
            }
        });
    },
    spec:{
        addCol:function(s,typeid){	
            this.dialog = new Dialog('index.php?app=b2c&ctl=admin_goods_editor&act=set_spec&_form='+(s?s:'goods-spec')+'&p[0]='+typeid,{ajaxoptions:{data:$('goods-spec').toQueryString()+($('nospec_body')?'&'+$('nospec_body').toQueryString():''),method:'post'},title:LANG_goodseditor['type']});
        },
        addRow:function(){
            this.dialog = new Dialog('index.php?app=b2c&ctl=admin_goods_editor/spec&act=addRow',{ajaxoptions:{data:$('goods-spec'),method:'post'}});
        }
    },
    adj:{
        addGrp:function(s){
            this.dialog = new Dialog('index.php?app=b2c&ctl=admin_goods_editor&act=addGrp&_form='+(s?s:'goods-adj'), {title:LANG_goodseditor['widget']});
        }
    },
    pic:{
        del:function(obj, img, img_id, is_default){
            if(confirm('确认删除本图片吗?')){
                obj = $(obj);
                var pic_box=obj.getParent('.gpic-box'),picNext=pic_box.getNext('.gpic-box');
			
                try{
                if(obj.get('ident')){
					   if($E('#all-pics input[name=image_default]'))
					   $E('#all-pics input[name=image_default]').value=obj.get('ident');
					   $('all-pics').eliminate('cururl');
					   pic_box.remove();

                   /*    if($E('#all-pics .gpic-box .current'))return;
                       if($$('#all-pics .gpic-box').length&&$$('#all-pics .gpic-box').length>0){
                         $('all-pics').empty().set('html','<div class="notice" style="margin:0 auto">请重新选择默认商品图片.</div>');
                       }else{
                         $('all-pics').empty().set('html','<div class="notice" style="margin:0 auto">您还未上传商品图片.</div>');
                       }   */                    
                }}catch(e){
                   pic_box.remove();
                }

			 if(this.getDefault()==img) {
		        if(imgdefinput = $E('#pic-area input[name=image_default]')){
                   imgdefinput.set('value','');
                } 
			 }
				//if(picNext)picNext.getElement('.gpic').onclick();

				removeImg1(img, img_id, is_default);
            }
        },
        setDefault:function(id, thumb){   

			var target=$E('#pic-area .gpic[image_id='+id+']');

			    if(target.hasClass('current')){return;}
				var cur,imgdefinput;
			    if(cur = $E('#pic-area .current')){
			         cur.removeClass('current');
			     }
		        if(imgdefinput = $E('#pic-area input[name=image_default]')){
                   imgdefinput.set('value',id+"|"+thumb);
                } 
			target.addClass('current');
        },
        getDefault:function(){
            
            var o = $E('#pic-area input[name=image_default]');
            
            if(o){
              return o.value;
            }else{
              return false
            };
        },
        viewSource:function(act){

			var objPos = '';
			var arr = act.split('|');
            var messContent="<div style='padding:5px 0 20px 20px; '><div style='font-size:10px'> 您可以在本页面下方复制图片的URL，该URL方便您将产品图片粘贴到需要使用该图片的目标位置</div> <br> <table width=100% border=0 cellspacing=2 cellpadding=2 align=center><tr><td>原图: </td><td><input type=text value='"+arr[0]+"' style='width:400px; font-size:10px;' onclick='this.select();'></td></tr><tr><td>中图: </td> <td><input type=text value='"+arr[1]+"' style='width:400px; font-size:10px;' onclick='this.select();'></td></tr> <tr><td>小图: </td> <td><input type=text value='"+arr[2]+"' style='width:400px; font-size:10px;' onclick='this.select();'></td></tr></table></div>";
            showMessageBox('查看图片信息',messContent,objPos,550);

         //  return new Dialog(act,{title:'查看图片信息',singlon:false,'width':650,'height':300});
        }
    },
    rateGoods:{
        add:function(){
            window.fbox = new Dialog('index.php?ctl=goods/product&act=select',{modal:true,ajaxoptions:{data:{onfinish:'goodsEditor.rateGoods.insert(data)'},method:'post'}});
        },
        del:function(){
        },
        insert:function(data){
            $ES('div.rate-goods').each(function(e){
                data['has['+e.getAttribute('goods_id')+']'] = 1;
            });
            new Request({url:'index.php?ctl=goods/product&act=ratelist',data:data,onComplete:function(s){$('x-rate-goods').innerHTML+=s}}).send();
        }
    }
});
