<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $channel['meta_title']?$channel['meta_title']:$channel['name']; ?></title>
<meta name="description" content="<?php echo $channel['meta_description']?$channel['meta_description']:$channel['name']; ?>" />
<meta name="keywords" content="<?php echo $channel['meta_keywords']?$channel['meta_keywords']:$channel['name']; ?>" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/common.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/form.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/quickview.js"></script>
<link href="<?php echo $conf['weburl'];?>/js/search.css" type="text/css" rel="stylesheet" />
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
<div class="main">
	<div class="right">
		<div class="crumbs"><a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $lang['inquiry'];?></div>
		<div class="page">
            <div class="maintitle">
                <p><?php echo $lang['inquiry'];?></p><span>&nbsp;</span>
            </div>
            <div class="inquiry">
            	<?php if ($message){ ?>
                    <div class="successA"><?php echo $message;?></div>
                <?php } ?>
                <?php if ($errors){ ?>
					<div class="errorA">
                    <?php foreach ($errors as $key => $value)  { ?>
						<?php echo $value;?><br />
					<?php } ?>
					</div>
                <?php } ?>
                <form name="theForm" action="<?php echo $conf['weburl'];?>/inquiry.php?action=send" method="post"  onsubmit="return doInquirySubmit()">
                    <?php if ($product){ ?>
                    <p><?php echo $lang['confirm_inquiry'];?>:	</p>
                    <div class="inquirylist">
							<ul>
                            <?php foreach ($product as $key => $value)  { ?>
							<li>
							<p><input type="checkbox" name="cart[]" value="<?php echo $value['product_id'];?>" checked="checked" /></p>
							<dl>
							<dt>
							<p>
                            <?php if ($value['image']){ ?>
								<a href="<?php echo $value['product_url'];?>" title="<img src='<?php echo $value['image'];?>'>" target="_blank"><img src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/setimage.gif" border="0" alt="" /></a>
							<?php } ?>						
							</p>
							<span><a href="<?php echo $value['product_url'];?>" target="_blank"><?php echo $value['name'];?></a></span>
							</dt>
							<dd><?php echo $value['model'];?></dd>
							<dd><input type="text" size="5" name="quantity_<?php echo $value['product_id'];?>" value="<?php echo $value['minorder'];?>" onKeyUp="value=value.replace(/[^0123456789]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^0123456789]/g,''))"/> <?php echo $lang['quantity'];?></dd>
                            <?php if ($value['price']){ ?>
							<dd><?php echo $value['price'];?></dd>
							<?php } ?>
							</dl>
							</li>
							<?php } ?>
							</ul>
						</div>				
					<?php } ?>
					
                    <p><?php echo $lang['title_inquiry_info'];?></p>
                    <ul>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_subject'];?>:</p><span><span id="a">
                    <span class="msgbase">
                        <input type="text"  name="subject" onblur="subjectCheck('subject')" value="<?php echo $subject;?>" style="width:250px;" id="subject" />
                    </span>
                    <span class="msg">
                        <span class="" id="subjectMsg" style="display:none;"></span>
                    </span>
                    </span></span></li>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_content'];?>:</p><span><span id="b">
                    <span class="msgbase">
                        <textarea name="content" cols="60" rows="8" id="content" onblur="contentCheck('content')"><?php echo $content;?></textarea>
                    </span>
                    <span class="msg" style="clear:both; width:500px;">
                        <span class="" id="contentMsg" style="display:none;"></span>
                    </span>
                    </span></span></li>
                    </ul>
                    <span class="clear"></span>
                    <p><?php echo $lang['title_inquiry_basic_info'];?></p>
                    <ul>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_company'];?>:</p><span><span id="c">
                            <span class="msgbase">
                                <input name="companyName" type="text" id="companyName" value="<?php echo $companyName;?>" onblur="companyNameCheck('companyName')" size="30" />
                            </span>
                            <span class="msg">
                                <span class="" id="companyNameMsg" style="display:none;"></span>
                            </span>
                        </span></span></li>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_name'];?>:</p><span>
                   <span><input  type="radio"  name="sex"  value="<?php echo $lang['inquiry_mr'];?>" checked="checked"  /><label><?php echo $lang['inquiry_mr'];?></label>
                        <input  type="radio"  name="sex"  value="<?php echo $lang['inquiry_ms'];?>" <?php if ($sex == $lang['inquiry_ms']){ echo "checked='checked'"; } ?> /><label><?php echo $lang['inquiry_ms'];?></label>
                        </span>
                        <span id="d">
                            <span class="msgbase">
                                <input name="name" type="text" id="name" onblur="nameCheck('name')" value="<?php echo $name;?>" size="14" style="margin-left:10px;" />
                            </span>
                            <span class="msg">
                                <span class="" id="nameMsg" style="display:none;"></span>
                            </span>
                        </span>	</span></li>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_email'];?>:</p><span><span id="e">
                            <span class="msgbase">
                                <input name="email" type="text" id="email" value="<?php echo $email;?>" onblur="emailCheck('email')" size="30" />
                            </span>
                            <span class="msg" style="clear:both; width:500px;">
                                <span class="" id="emailMsg" style="display:none;"></span>
                            </span>
                        </span></span></li>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_tel'];?>:</p><span><span id="f">
                            <span class="msgbase">
                                <input name="tel" type="text" id="tel" value="<?php echo $tel;?>" onblur="telCheck('tel')" size="30" />
                            </span>
                            <span class="msg">
                                <span class="" id="telMsg" style="display:none;"></span>
                            </span>
                        </span></span></li>
                    <li><p><?php echo $lang['inquiry_fax'];?>:</p><span><span><input name="fax" type="text" value="<?php echo $fax;?>" id="fax" size="30" /></span></span></li>
                    <?php if ($directory=='en'){ ?>
                    <li><p><?php echo $lang['inquiry_country'];?>:</p><span><span><select name="country">
                    <option value="0">--------<?php echo $lang['inquiry_please_select'];?>--------</option>
                    <?php echo $country;?>
					</select></span></span></li>
                    <?php } ?>
                    <li><p><?php echo $lang['inquiry_address'];?>:</p><span><span><input name="address" type="text" value="<?php echo $address;?>" id="address" size="60" /></span></span></li>
                    <li><p><?php echo $lang['inquiry_website'];?>:</p><span><span><input name="website" id="website" value="<?php echo $website;?>" type="text" size="60" /></span></span></li>
                    <li><p><font color="#FF0000">*</font><?php echo $lang['inquiry_confirm_text'];?>:</p><span><span id="g">
                            <span class="msgbase">
                                <input name="confirmText" type="text" id="confirmText" onblur="confirmTextCheck('confirmText')" size="10" />
                                  <img src="captcha.php?<?php echo $rand;?>" alt="captcha" style="vertical-align:top;cursor:pointer;margin-top:5px;" onclick="this.src='captcha.php?'+Math.random()" />
                            </span>
                            <span class="msg" style="width:250px;">
                                <span class="" id="confirmTextMsg" style="display:none;"></span>
                            </span>
                        </span></span></li>
                    <li>
                        <p></p><span><input type="hidden" name="language" value="<?php echo $directory;?>" />
                        <input name="Submit" value="<?php echo $lang['inquiry_submit'];?>" type="submit" />
                        <input name="reset" value="<?php echo $lang['inquiry_reset'];?>" type="reset" />
                        </span>
                    </li>
                    </ul>
              		</form>
                    <div class="clear"></div>
            </div>  
        </div>
	</div>	
	<div class="left"><?php include("left.php"); ?></div>
    <div class="clear"></div>
	<div class="mainfoot"></div>
</div>
<script type="text/javascript">
<!--
var CheResult = true;
function subjectCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_subject_empty']; ?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function contentCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_content_empty']; ?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function companyNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_company_empty']; ?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function nameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_name_empty']; ?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function telCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_tel_emtpy']; ?>");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function emailCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_email_empty']; ?>");
		return false;
	}else{
		if(!isEmail(GE(id).value) == true ){
			SetMsg("error",id,"block","<?php echo $lang['msg_email_error']; ?>");
			return false;
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function confirmTextCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","<?php echo $lang['msg_code_emtpy']; ?>");
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

	if(companyNameCheck("companyName") == false)
		CheResult = false;

	if(nameCheck("name") == false)
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
<?php include("footer.php"); ?>
</div>
</body>
</html>