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
<div class="briefcontact">
	<p><?php echo $lang['brands_area'];?></p>
	<ul>
		<li>
		<?php echo $brand_list; ?>
        </li>
    </ul>
</div>
<div class="search">
<div class="autocomplete">
	<p><?php echo $lang['title_search'];?></p>
	<form name="searchform" action="<?php echo $conf['weburl'];?>/search.php" method="get">
	<select name="category" id="sea_type">
	<option value="0"><?php echo $lang['all_category'];?></option>
    <?php foreach ($category as $key => $value)  { ?>
		<option value="<?php echo $value['category_id'];?>" <?php if ($value['category_id']==intval($_GET['category'])) echo "selected"; ?>><?php echo $value['name'];?></option>
	<?php } ?>
	</select>
	<input type="hidden" value="<?php echo $cur_val['language_id'];?>" name="language" />
	<input type="text" class="searchinput" name="searchText" id="searchinput" value="<?php echo $_get['searchText'];?>"  onfocus="searchformh.focuscheck.value='Y';" autocomplete="off" />  <div id="autocompletepanel" class="suggestList" style="display: none;"></div>
	<input name="submit" type="submit" value="<?php echo $lang['button_search'];?>" class="searchbt" />
	</form>		
</div>
</div>

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

	<dl>
	<?php if ( $contact_arr['aliwangwang'] ) : ?>
	  <dd><?php echo $contact_arr['aliwangwang'];?></dd>
	<?php endif; ?>
	
	<?php if ( $contact_arr['qq'] ) : ?>
	  <dd><?php echo $contact_arr['qq'];?></dd>
	<?php endif; ?>	

	<?php if ( $contact_arr['msn'] ) : ?>
	  <dd><?php echo $contact_arr['msn'];?></dd>
	<?php endif; ?>

	<?php if ( $contact_arr['skype'] ) : ?>
	  <dd><?php echo $contact_arr['skype'];?></dd>
	<?php endif; ?>	

	<?php if ( $contact_arr['yahoo'] ) : ?>
	  <dd><?php echo $contact_arr['yahoo'];?></dd>
	<?php endif; ?>
	</dl>
</div>

