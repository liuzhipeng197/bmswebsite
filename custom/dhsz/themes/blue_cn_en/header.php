
<!--[if lte IE 6]> 
	<script src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/js/DD_belatedPNG.js"></script>
	<script>DD_belatedPNG.fix('.png');DD_belatedPNG.fix('img');
	</script>
	<![endif]-->
<div class="meta">
	<div class="metainner">
    <div class="hotline">
	<p><?php echo $lang['title_hot_tags'];?>: </p>
	<ul>
		<li>
		<?php echo $tags_list; ?>
        </li>
    </ul>
</div>
    	<span><a href="sitemap.html"><?php echo $lang['site_map'];?></a> <a href="<?php echo $conf['weburl'];?>/sitemap.xml"><img src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/sitemap.gif" alt="xml" /></a> 
		</span>
	</div>
</div>
<div class="header">
	<div class="logo">
	<?php if ( $company_desc['logo'] ) : ?><a href="<?php echo $menu['index_url'];?>"><img src="<?php echo $conf['weburl'];?>/upload/photo/<?php echo $company_desc['logo'];?>" alt="<?php echo $company_desc['company_name'];?>" /></a><?php endif; ?></div>
	<div class="headerright">
	<?php if (count($language_arr)>1) : ?>
		<dl>
			<dd>
            <?php foreach ($language_arr as $key => $value)  { ?>
				<a href="<?php echo $value['url'];?>"><?php echo $value['name'];?></a>
			<?php } ?>
			</dd>
		</dl>
		<?php endif ; ?>
		<div class="clear"></div>
		<ul>
			<li id="t1">
			<a href="javascript:void(0);" target="_self" onclick="javascript:SetHome(this,'<?php echo $conf['weburl'];?>')"><?php echo $lang['set_home_page'];?></a>
			</li>
			<li id="t2"><a href="mailto:<?php echo trim($contact_email_arr[0]);?>" rel="nofollow"><?php echo $lang['send_mail'];?></a></li>
			<li id="t3"><a href="<?php echo $menu['contactus_url'];?>" rel="nofollow"><?php echo trim($contact_tel_arr[0]);?></a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>