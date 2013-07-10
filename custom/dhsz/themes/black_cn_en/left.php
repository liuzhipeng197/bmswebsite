<?php if ($is_sub) : ?>
<div class="sort">
	<p><?php echo $left_sub_channel['name'];?></p>
	<?php echo $channel_menu;?>
</div>
<div class="freeheight"></div>
<?php endif ; ?>

<div class="markermenu" id="ddtopmenubar1">
	<p><?php echo $lang['title_category'];?></p>
	<?php echo $category_menu;?>
</div>

<div class="search">
	<p><?php echo $lang['title_search'];?></p>
	<div class="search">
	<div class="autocomplete">
	<form name="searchform" id="searchform" action="<?php echo $conf['weburl'];?>/search.php" method="get">
	<select name="category" id="sea_type">
	<option value="0"><?php echo $lang['all_category'];?></option>
    <?php foreach ($category as $key => $value)  { ?>
		<option value="<?php echo $value['category_id'];?>" <?php if ($value['category_id']==intval($_get['category'])) echo "selected"; ?>><?php echo $value['name'];?></option>
	<?php } ?>
	</select>
	<input type="hidden" value="<?php echo $cur_val['language_id'];?>" name="language" />
	<input type="text" class="searchinput" name="searchText" id="searchinput" value="<?php echo $_get['searchText'];?>" onfocus="searchformh.focuscheck.value='Y';" autocomplete="off" /><div id="autocompletepanel" class="suggestList" style="display: none;"></div>
	<input name="searchBtn" type="submit" value="<?php echo $lang['button_search'];?>" class="searchbt" />
	</form>
	<form name="searchformh" id="searchformh" style="display:none">
	<input type="hidden" name="focuscheck" value="N">
	</form>
	</div>
	</div>		
</div>

<?php if($brand_list) { ?>
<div class="briefcontact">
	<p><?php echo $lang['brands_area'];?></p>
	<ul>
		<li>
		<?php echo $brand_list; ?>
        </li>
    </ul>
</div>
<?php } ?>

<div class="briefcontact">
	<p><?php echo $lang['title_contactus'];?></p>
	<ul>
		<li><p><?php echo $lang['contact_person'];?>:</p><span><?php echo $contact['contact_person'];?></span></li>
        <?php foreach ($contact_tel_arr as $key => $value)  { ?>
		<li class="tel"><p><?php if ($key==0){ echo $lang['tel'].":"; }?></p><span><?php echo trim($value);?></span></li>
        <?php } ?>
		<li class="tel"><p><?php echo $lang['fax'];?>:</p><span><?php echo $contact['fax'];?></span></li>
        <?php foreach ($contact_email_arr as $key => $value)  { ?>
		<li><p><?php if ($key==0){ echo $lang['email'].":"; }?></p><span><a href="mailto:<?php echo trim($value);?>"><?php echo trim($value);?></a></span></li>
        <?php } ?>
	</ul>

	<?php if ( $contact_arr['aliwangwang'] ) : ?>
	<?php echo $contact_arr['aliwangwang'];?><br />
	<?php endif; ?>
	
	<?php if ( $contact_arr['qq'] ) : ?>
	<?php echo $contact_arr['qq'];?><br />
	<?php endif; ?>
	

	<?php if ( $contact_arr['msn'] ) : ?>
	<?php echo $contact_arr['msn'];?><br />
	<?php endif; ?>
    
	<?php if ( $contact_arr['skype'] ) : ?>
	<?php echo $contact_arr['skype'];?><br />
	<?php endif; ?>	
    	
	<?php if ( $contact_arr['yahoo'] ) : ?>
	<?php echo $contact_arr['yahoo'];?>
	<?php endif; ?>
</div>

<div class="linkbar">
	<p><?php echo $lang['title_subscribe'];?></p>
	
	<ul>
		<?php if ($directory=='cn') : ?>
            <?php if ($cur_val['default_value']==1) : ?>
				<li><a href="http://www.zhuaxia.com/add_channel.php?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_zhuaxia.gif" alt="抓虾" vspace="2" /></a></li>
				<li><a href="http://fusion.google.com/add?feedurl=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_google.gif" alt="google reader" vspace="2" /></a></li>
				<li><a href="http://add.my.yahoo.com/rss?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_yahoo.gif" alt="my yahoo" vspace="2" /></a></li>
				<li><a href="http://www.bloglines.com/sub/<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_bloglines.gif" alt="bloglines" vspace="2" /></a></li>
				<li><a href="http://www.xianguo.com/subscribe.php?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_xianguo.gif" alt="鲜果" vspace="2" /></a></li>
				<li><a href="http://inezha.com/add?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_nazha.gif" alt="哪吒" vspace="2" /></a></li>
			<?php else : ?>
				<li><a href="http://www.zhuaxia.com/add_channel.php?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_zhuaxia.gif" alt="抓虾" vspace="2" /></a></li>
				<li><a href="http://fusion.google.com/add?feedurl=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_google.gif" alt="google reader" vspace="2" /></a></li>
				<li><a href="http://add.my.yahoo.com/rss?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_yahoo.gif" alt="my yahoo" vspace="2" /></a></li>
				<li><a href="http://www.bloglines.com/sub/<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_bloglines.gif" alt="bloglines" vspace="2" /></a></li>
				<li><a href="http://www.xianguo.com/subscribe.php?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_xianguo.gif" alt="鲜果" vspace="2" /></a></li>
				<li><a href="http://inezha.com/add?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="http://img.feedsky.com/images/icon_subshot01_nazha.gif" alt="哪吒" vspace="2" /></a></li>				
			<?php endif ; ?>
			
		<?php else : ?>
			<?php if ($cur_val['default_value']==1) : ?>
			<li><a href="http://my.msn.com/addtomymsn.armx?id=rss&amp;ut=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomymsn.gif" alt="my msn" vspace="2" /></a></li>
			<li><a href="http://fusion.google.com/add?feedurl=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtogoogleplus.gif" alt="google reader" vspace="2" /></a></li>
			<li><a href="http://add.my.yahoo.com/rss?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomyyahoo.gif" alt="my yahoo" vspace="2" /></a></li>
			<li><a href="http://feeds.my.aol.com/add.jsp?url=<?php echo $conf['weburl'];?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomyaol.gif" alt="my aol" vspace="2" /></a></li>		
			<?php else : ?>
			<li><a href="http://my.msn.com/addtomymsn.armx?id=rss&amp;ut=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomymsn.gif" alt="my msn" vspace="2" /></a></li>
			<li><a href="http://fusion.google.com/add?feedurl=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtogoogleplus.gif" alt="google reader" vspace="2" /></a></li>
			<li><a href="http://add.my.yahoo.com/rss?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomyyahoo.gif" alt="my yahoo" vspace="2" /></a></li>
			<li><a href="http://feeds.my.aol.com/add.jsp?url=<?php echo $conf['weburl'];?>/<?php echo $directory;?>/feed.xml"><img border="0" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/addtomyaol.gif" alt="my aol" vspace="2" /></a></li>				
			<?php endif ; ?>
		<?php endif ; ?>
	</ul>
</div>