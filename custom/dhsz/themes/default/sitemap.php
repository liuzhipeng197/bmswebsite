<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $lang['title_site_map']; ?></title>
<meta name="description"  content="<?php echo $meta['meta_description']; ?>"/>
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
		<div class="crumbs"><a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $lang['site_map'];?></div>
	  	<div class="page">
			<div class="maintitle">
				<p><?php echo $lang['title_site_map'];?></p>
			</div>
			<div class="sitemap">
				<?php foreach ($channel_category_arr as $key => $value)  { ?>
				 <p><a href="<?php echo $value['url'];?>" <?php if ($value['target']<>'') echo $value['target']; ?>><?php echo $value['name'];?></a></p>
					<?php 
						if ($value['flag']=='products'){ 
							echo $category_sitemap;
						}else{
							if ($value['sub_category']) :
					?>
						<ul>
                        <?php foreach ($value['sub_category'] as $key => $valuem)  { ?>
						<li><a href="<?php echo $valuem['url'];?>" <?php if ($valuem['target']<>'') echo $valuem['target']; ?>><?php echo $valuem['name'];?></a></li>
						<?php } ?>
						</ul>
					<?php endif ; ?>
				   <?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="left"><?php include("left.php"); ?></div>
	<div class="clear"></div>
	<div class="mainfoot"></div>	
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>