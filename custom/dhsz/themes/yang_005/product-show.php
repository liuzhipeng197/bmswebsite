<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $product_detail['meta_title']?$product_detail['meta_title']:$product_detail['name']; ?></title>
<meta name="description" content="<?php echo $product_detail['meta_description']?$product_detail['meta_description']:$product_detail['name']; ?>" />
<meta name="keywords" content="<?php echo $product_detail['meta_keywords']?$product_detail['meta_keywords']:$product_detail['name']; ?>" />
<meta name="robots" content="all" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/common.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/form.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/click_cnt.php?product_id=<?php echo $id;?>"></script>

<link href="<?php echo $conf['weburl'];?>/js/search.css" type="text/css" rel="stylesheet" />

<script src="<?php echo $conf['weburl'];?>/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript"> var jQuery=$; </script>

<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/search.js"></script>

			<script type="text/javascript">
				Event.observe(window, 'load', function() {
					new Search($('searchinput'), $('autocompletepanel'));
				});
				
			</script>

<?php echo $navSubJs; ?>

</head>
<body>

<?php echo $navSubDiv; ?>
<?php echo $navSubJsSetup; ?>

<div class="wrapper">
<?php include("header.php"); ?>
	<div class="nav" id="ddtopmenubar">
	<ul>
		<?php foreach ($menu['channel_category'] as $key => $value)  { ?>
		<li <?php if ($value['channel_category_id']==$channel['channel_category_id']) echo "class='current'"; ?>><a href="<?php echo $value['url'];?>" <?php if ($value['target']<>'') echo $value['target']; ?> <?php if(is_sub_categories($value['channel_category_id'])) echo " rel=\"ddsubmenu".$value['channel_category_id']."\""; ?>><?php echo $value['name'];?></a></li>
        <?php } ?>
	</ul>
</div>
</div>
<div class="main">
	<div class="right">
		<div class="crumbs">
            <a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $nav;?>
		</div>
        <div class="page">
            
			<div class="categoriespicshow">
			<!--categories pic show begin-->
			<div class="infiniteCarousel">
				<div class="wrapper">
				<ul>
                	<?php foreach ($other_product as $key => $value)  { ?>  
					<li>
					<a href="<?php echo $value['product_url'];?>" rel="nofollow" title="<?php echo $value['name'];?>"><img src="<?php echo $value['image_url'];?>" height="75" width="75" alt="<?php echo $value['name'];?>" border="0" /></a>
					</li>
					<?php } ?>				
				</ul>        
				</div>
			</div>
			<!--categories pic show end-->
			</div>			
			
        	<div class="productsdetail">
            <div class="productsdetailinfo">
                <div class="left">
                    <?php foreach ($other_image as $key => $value)  { ?>  
					<div id="photo<?php echo $value['cnt']; ?>" <?php echo $value['style']; ?>>
						 <p><a href="<?php echo $value['image_original']; ?>" title="<?php echo $product_detail['name']; ?>" target="_blank"><img src="<?php echo $value['image_big']; ?>"  border="0" alt="<?php echo $product_detail['name']; ?>" /></a><br />
						<a href="<?php echo $value['image_original']; ?>" target="_blank"><?php echo $lang['original_pic']; ?></a></p>
					</div>
					<?php } ?>
					<div style="margin-bottom:10px;"></div>
                   <?php if (count($other_image)>1) : ?>
					 <ul>
                        <?php foreach ($other_image as $key => $value)  { ?>  
						<li><p>
						<a href="javascript:void(0);">
						<img src="<?php echo $value['image_small']; ?>" onmouseover="changeThumbnailImage('<?php echo $value['cnt']; ?>');" id="sphoto<?php echo $value['cnt']; ?>" width="35" height="35" border="0" class="imgBorder" alt="" /></a></p></li>
						<?php } ?>
					</ul>
					 <script type="text/javascript">
					 <!--
					function changeThumbnailImage(imgID){
						<?php foreach ($other_image as $key => $value)  { ?>  
						document.getElementById("photo<?php echo $value['cnt'];?>").style.display="none";
						document.getElementById("sphoto<?php echo $value['cnt'];?>").classname="imgBorder";
						<?php } ?>
						if(imgID!=''){
							document.getElementById("sphoto"+imgID).classname="imgBorderH";
							document.getElementById("photo"+imgID).style.display="";
						}
					}
					//-->
					</script>
                   <?php endif ; ?>
                </div>
				
                <div class="right">
                    <ul>
                    <li><p><?php echo $lang['product_name'];?>:</p> <a href="<?php echo $product_url;?>" title="<?php echo $product_detail['name'];?>"><?php echo $product_detail['name'];?></a></li>
                    <li><p><?php echo $lang['model'];?>:</p> <?php echo $product_detail['model'];?></li>
					<?php if($product_detail['brand']) { ?>
                    <li><p><?php echo $lang['brands'];?>:</p> <?php echo $product_detail['brand'];?></li>
					<?php } ?>
                    <?php if ($product_detail['price']){ ?>
					<li><p><?php echo $lang['price'];?>:</p> <?php echo $product_detail['price'];?></li>
					<?php } ?>
                    <?php if ($product_detail['minorder']){ ?>
					<li><p><?php echo $lang['minorder'];?>:</p> <?php echo $product_detail['minorder'];?></li>
					<?php } ?>

                    <?php if ($product_detail['attachment']){ ?>
					<li style='padding-top:10px;'><p><?php echo $product_detail['attachment_link'];?></p></li>
					<?php } ?>


					</ul>
                    <?php if ($product_detail['abstract']){ ?>
                    <div class="abstract">
                        <p><b><?php echo $lang['product_abstract'];?>:</b></p>
                        <?php echo $product_detail['abstract'];?>
                    </div>
                    <?php } ?>
					<br />
                   <a href="<?php echo $inquiry_url;?>" rel="nofollow" target="_blank"><img src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/send_inquiry.gif" border="0" alt="" /></a>
                    <br />
                </div>
				
				<div class="clear"></div>
            </div>
            <div class="info">
                <dl>
                    <dt><?php echo $lang['product_description'];?></dt>
                    <dd><?php echo $description;?></dd>
                </dl>
            </div>
			
            <?php if ($other_product) : ?>
				<div class="info">
					<dl><dt><?php echo $lang['other_products'];?></dt></dl>
				</div>
				<div class="ppics">
					<ul>
                    <?php foreach ($other_product as $key => $value)  { ?>   
                        <?php if ($key+1 <= $conf['other_product_cnt']) : ?>
							<li>
							<p>
							<a href="<?php echo $value['product_url'];?>" title="<?php echo $value['name'];?>"><img src="<?php echo $value['image_url'];?>" alt="<?php echo $value['name'];?>" border="0" /></a></p><span><a href="<?php echo $value['product_url'];?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?></a></span>
							</li>
						<?php endif ; ?>
					<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
			<?php endif ; ?>
			<div class="clear"></div>
			<div class="inquiry">
			<form name="theForm" action="<?php echo $conf['weburl'];?>/inquiry.php?action=send" method="post"  onsubmit="return doInquirySubmit()">
			<p><?php echo $lang['title_inquiry_info'];?></p>
			<ul>
			<li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_subject'];?>:</p>
				<span><span id="a">
				<span class="msgbase">
					<input type="text"  name="subject" onblur="subjectCheck('subject')" value="" style="width:250px;" id="subject" />
				</span>
				<span class="msg">
				<span class="" id="subjectMsg" style="display:none;"></span>
				</span>
				</span></span>
			</li>
			<li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_content'];?>:</p>
				<span><span id="b">
				<span class="msgbase">
					<textarea name="content" cols="45" rows="8" id="content" onblur="contentCheck('content')"></textarea>
				</span>
				<span class="msg" style="clear:both; width:400px;">
					<span class="" id="contentMsg" style="display:none;"></span>
				</span>
				</span></span>
			</li>
			<li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_tel'];?>:</p>
				<span><span id="c">
				<span class="msgbase">
					<input name="tel" type="text" id="tel" value="" onblur="telCheck('tel')" size="30" />
				</span>
				<span class="msg">
					<span class="" id="telMsg" style="display:none;"></span>
				</span>
				</span></span>
			</li>
			<li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_email'];?>:</p>
				<span><span id="d">
					<span class="msgbase">
						<input name="email" type="text" id="email" value="" onblur="emailCheck('email')" size="30" />
					</span>
					<span class="msg" style="clear:both; width:400px;">
						<span class="" id="emailMsg" style="display:none;"></span>
					</span>
				</span>
				</span>
			</li>
			<li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_confirm_text'];?>:</p>
				<span><span id="e">
					<span class="msgbase">
						<input name="confirmText" type="text" id="confirmText" onblur="confirmTextCheck('confirmText')" size="10" />
						  <img src="<?php echo $conf['weburl'];?>/captcha.php" alt="captcha" style="vertical-align:top;cursor:pointer;margin-top:5px;" onclick="this.src='<?php echo $conf['weburl'];?>/captcha.php?'+Math.random()" />
					</span>
					<span class="msg" style="width:250px;">
						<span class="" id="confirmTextMsg" style="display:none;"></span>
					</span>
				</span>
				</span>
			</li>
			<li><p></p>
			<span>
			<input type="hidden" name="id" value="<?php echo $id;?>" />
			<input type="hidden" name="language" value="<?php echo $directory;?>" />
			<input name="submit" value="<?php echo $lang['inquiry_submit'];?>" type="submit" />
			<input name="reset" value="<?php echo $lang['inquiry_reset'];?>" type="reset" />
			</span>
			</li>
			</ul>
			</form>
			</div>
			<div class="clear"></div>
            <div class="newsdetail">
                <dl>
                    <dt>[<a href="<?php echo $menu['index_url'];?>"><?php echo $lang['return_home'];?></a>] [<a href="javascript:window.print();"><?php echo $lang['print'];?></a>] [<a href="javascript:history.go(-1);"><?php echo $lang['back'];?></a>]</dt>
                </dl>
			</div>
		</div>
        </div>
	</div>
	<div class="left"><?php include("left.php"); ?></div>
	<div class="clear"></div>
	<div class="mainfoot"></div>	
</div>
<div class="clear"></div>
<?php include("footer.php"); ?>
<script src="<?php echo $conf['weburl'];?>/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
(function () {
	$.fn.infiniteCarousel = function () {
		function repeat(str, n) {
			return new Array( n + 1 ).join(str);
		}
		
		return this.each(function () {
			// magic!
			var $wrapper = $('> div', this).css('overflow', 'hidden'),
				$slider = $wrapper.find('> ul').width(9999),
				$items = $slider.find('> li'),
				$single = $items.filter(':first')
				
				singleWidth = $single.outerWidth(),
				visible = Math.ceil($wrapper.innerWidth() / singleWidth),
				currentPage = 1,
				pages = Math.ceil($items.length / visible);
				
			/* TASKS */
			
			// 1. pad the pages with empty element if required
			if ($items.length % visible != 0) {
				// pad
				$slider.append(repeat('<li class="empty" />', visible - ($items.length % visible)));
				$items = $slider.find('> li');
			}
			
			// 2. create the carousel padding on left and right (cloned)
			$items.filter(':first').before($items.slice(-visible).clone().addClass('cloned'));
			$items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
			$items = $slider.find('> li');
			
			// 3. reset scroll
			$wrapper.scrollLeft(singleWidth * visible);
			
			// 4. paging function
			function gotoPage(page) {
				var dir = page < currentPage ? -1 : 1,
					n = Math.abs(currentPage - page),
					left = singleWidth * dir * visible * n;
				
				$wrapper.filter(':not(:animated)').animate({
					scrollLeft : '+=' + left
				}, 500, function () {
					// if page == last page - then reset position
					if (page > pages) {
						$wrapper.scrollLeft(singleWidth * visible);
						page = 1;
					} else if (page == 0) {
						page = pages;
						$wrapper.scrollLeft(singleWidth * visible * pages);
					}
					
					currentPage = page;
				});
			}
			
			// 5. insert the back and forward link
			$wrapper.after('<a href="#" class="arrow back"></a><a href="#" class="arrow forward"></a>');
			
			// 6. bind the back and forward links
			$('a.back', this).click(function () {
				gotoPage(currentPage - 1);
				return false;
			});
			
			$('a.forward', this).click(function () {
				gotoPage(currentPage + 1);
				return false;
			});
			
			$(this).bind('goto', function (event, page) {
				gotoPage(page);
			});
			
			// THIS IS NEW CODE FOR THE AUTOMATIC INFINITE CAROUSEL
			$(this).bind('next', function () {
				gotoPage(currentPage + 1);
			});
		});
	};
})(jQuery);

$(document).ready(function () {
	// THIS IS NEW CODE FOR THE AUTOMATIC INFINITE CAROUSEL
	var autoscrolling = true;
	
	$('.infiniteCarousel').infiniteCarousel().mouseover(function () {
		autoscrolling = false;
	}).mouseout(function () {
		autoscrolling = true;
	});
	
	setInterval(function () {
		if (autoscrolling) {
			$('.infiniteCarousel').trigger('next');
		}
	}, 5000);
});

var CheResult = true;
function subjectCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_subject_empty'];?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function contentCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_content_empty'];?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function telCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_tel_emtpy'];?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function emailCheck(id){
	CtoH(id);
	if(!isEmail(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_email_error'];?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function confirmTextCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_code_emtpy'];?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function doInquirySubmit(){
	CheResult = true;
	firstErrorControl = "";
	
	if(subjectCheck("subject") == false)
		CheResult = false;

	if(contentCheck("content") == false)
		CheResult = false;

	if(telCheck("tel") == false)
		CheResult = false;

	if(emailCheck("email") == false)
		CheResult = false;

	if(confirmTextCheck("confirmText") == false)
		CheResult = false;
		
	SetMsgFocus();
	return CheResult;
}
//-->
</script>
</div>
</body>
</html>