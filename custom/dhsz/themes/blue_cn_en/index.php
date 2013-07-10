<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $meta['meta_title']; ?></title>
<meta name="description" content="<?php echo $meta['meta_description']; ?>" />
<meta name="keywords" content="<?php echo $meta['meta_keywords']; ?>" />
<meta name="robots" content="all" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/common.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/common.js"></script>

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
		<div class="crumbs">
            <a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $company_desc['company_name'];?>
		</div>
		<div class="ban" id="flash_content">
        	<script type="text/javascript" src="<?php echo $conf['weburl'];?>/vcall.php?language=<?php echo $cur_val['language_id'];?>&amp;flag=banner"></script>
		</div>
		<div class="home_box">
			<div>
			<div class="home_news">
			<?php  
					$category_id = 4; //这里填写需要调用的栏目ID
					$news_num = 4; //这里填写调用文章列表的条数
					$news_img_num = 1; //这里填写调用图片类表的条数 
					$news = call_channel($cur_val['language_id'],$category_id,$news_num,$news_img_num);
					$info = get_category_related_info($cur_val['language_id'],$category_id);
				?>
				<div class="title"><p><?php echo $info['name'];?></p><span><a href="<?php echo $info['url'];?>"><?php echo $lang['more'];?></a></span></div>
                    	<?php foreach ($news["newsimg"] as $key => $value)  { ?>
					<div class="newsimage">
							<?php if ($value['small_img']) { ?> 
							<a href="<?php echo $value['url'];?>"><img src="<?php echo $value['small_img'];?>" alt="<?php echo $value['name'];?>" /></a>
							<p><a href="<?php echo $value['url'];?>"><?php echo qt_news_title($value['return_name'],35);?></a><?php echo csubstr($value['abstract'],70);?></p>
							<?php } ?>
					</div>
						<?php } ?>
					<ul>
                        <?php foreach ($news["newslist"] as $key => $value)  { ?>
						<li><a href="<?php echo $value['url'];?>" title="<?php echo $value['name'];?>"><?php echo qt_news_title($value['return_name'],52);?></a></li>
						<?php } ?>
					</ul>
			</div>
			<div class="home_about">
				<div class="title"><p><?php echo $lang['title_aboutus'];?></p><span><a href="<?php echo $menu['aboutus_url'];?>"><?php echo $lang['more'];?></a></span></div>
				<div class="about"><?php echo csubstr($aboutus,300);?></div>
			</div>
			<div class="clear"></div>
			</div>
            <?php if ($featured_product) : ?>
				<div class="home_products">
				<div class="title"><p><?php echo $lang['title_featured_products'];?></p></div>
				<div class="home_ppics">
					<ul>
                        <?php foreach ($featured_product as $key => $value)  { ?>
						<li>
						<p><a href="<?php echo $value['product_url'];?>" target="_blank"><img src="<?php echo $value['image_url'];?>" alt="<?php echo $value['name'];?>" border="0" /></a></p>
						<span><a href="<?php echo $value['product_url'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo $value['cutname'];?></a></span>
						</li>
						<?php } ?>
					</ul>
				</div>
                </div>			
			<?php endif ; ?>
			
            <?php if ($new_product) : ?>
				<div class="clear"></div>
				<div class="home_products">
				<div class="title"><p><?php echo $lang['title_new_products'];?></p></div>
				<div class="home_ppics">
					<ul>
                      <?php foreach ($new_product as $key => $value)  { ?>
					  <li><p><a href="<?php echo $value['product_url'];?>" target="_blank"><img src="<?php echo $value['image_url'];?>" alt="<?php echo $value['name'];?>" border="0" /></a></p>
					  <span><a href="<?php echo $value['product_url'];?>" title="<?php echo $value['name'];?>" target="_blank"><?php echo $value['cutname'];?></a></span></li>
						<?php } ?>
					</ul>
				</div>
				</div>
			<?php endif ; ?>
		</div>
	</div>
	<div class="left"><?php include("left.php"); ?></div>
	<div class="clear"></div>
	<div class="mainfoot"></div>
</div>
<div class="clear"></div>
<div class="footer">
	<div class="footernav">
    	<ul>
        	<li><a href="<?php echo $menu['aboutus_url'];?>" rel="nofollow"><?php echo $lang['title_aboutus'];?></a></li>
            <li><a href="<?php echo $menu['product_url'];?>" rel="nofollow"><?php echo $lang['title_products'];?></a></li>
            <li><a href="<?php echo $menu['inquiry_url'];?>" rel="nofollow"><?php echo $lang['title_inquiry'];?></a></li>
            <li><a href="<?php echo $menu['contactus_url'];?>" rel="nofollow"><?php echo $lang['title_contactus'];?></a></li>
        </ul>
		<dl>
			<dd id="ft1"><a href="<?php echo $menu['index_url'];?>/feed.xml"><?php echo $lang['rss'];?></a></dd>
			<dd id="ft2"><a href="<?php echo $conf['weburl'];?>/sitemap.xml"><?php echo $lang['site_map'];?></a></dd>
			<dd id="ft3"><a href="<?php echo $menu['inquiry_url'];?>" rel="nofollow"><?php echo $lang['title_inquiry'];?></a></dd>
			<dd id="ft4">
			<a href="javascript:void(0);" target="_self" onclick="javascript:AddFavorite('<?php echo $conf['weburl'];?>','<?php echo $company_desc['company_name'];?>')" rel="nofollow" ><?php echo $lang['add_favoriter'];?></a>
			</dd>
        </dl>
    </div>
	
	<div class="links">
		<p><?php echo $lang['title_link'];?>:</p>
      <?php if ($link_logo || $link_text){ ?>
			<?php if ($link_logo) : ?>
			<ul>
				<?php foreach ($link_logo as $key => $value)  { ?>
				<li><a href="<?php echo $value['link_url'];?>" target="_blank"><?php echo $value
['link_logo'];?></a></li>		
				<?php } ?>
			</ul>
			<?php endif ; ?>
			<?php if ($link_text) : ?>
			<ul>
				<?php foreach ($link_text as $key => $value)  { ?>
				<li><a href="<?php echo $value['link_url'];?>" target="_blank"><?php echo $value
['link_name'];?></a></li>		
				<?php } ?>
			</ul>	
			<?php endif ; ?>
			<ul><li><a href="links.html"><?php echo $lang['link_more'];?></a></li></ul>
		<?php } ?>
	</div>

    <div class="copyright">
        <span>
        	 Copyright &copy; <?php echo $conf['copyright_year'];?> <?php echo $company_desc['company_name'];?> <?php echo $lang['all_rights_reserved'];?> <?php if ( $conf['beian'] ) : ?><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $conf['beian']; ?></a><?php endif ; ?> <?php echo $conf['flow_code'];?>
        </span>
        <p>
		<a href="http://www.nitc.cc" target="_blank"><img src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/nitc.jpg" alt="http://www.nitc.cc" title="http://www.nitc.cc" border="0" /></a>
		</p>
    </div>
</div>
<div class="clear"></div>
  <script>

var searchinputObj = document.getElementById('searchinput');
panelObjX = getX(searchinputObj);
panelObjY = getY(searchinputObj) + 24;

document.getElementById('autocompletepanel').style.left = panelObjX + 'px';
document.getElementById('autocompletepanel').style.top = panelObjY + 'px';

</script>
</div>
</body>
</html>