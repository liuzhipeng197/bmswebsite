<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $category_ary['meta_title']?$category_ary['meta_title']:$category_ary['name']; ?></title>
<meta name="description" content="<?php echo $category_ary['meta_description']?$category_ary['meta_description']:$category_ary['name']; ?>" />
<meta name="keywords" content="<?php echo $category_ary['meta_keywords']?$category_ary['meta_keywords']:$category_ary['name']; ?>" />
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
            <a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $nav;?>
		</div>
		<div class="page">
			<div class="maintitle">
				<p><?php echo $category_ary['name']; ?></p>
			</div>
			<div class="product">

			<?php if(!$category_desc_no_show) {?>
				<div class="info">
					<dl>
						<dt><span><?php echo $lang['category_description'];?></span></dt>
						<dd><?php echo $description;?></dd>
					</dl>
				</div>
                <?php } if ($sub_category) : ?>
					<div class="ppics">
					<ul>
                    <?php foreach ($sub_category as $key => $value)  { ?>   
					<li>
					<p>
					<a href="<?php echo $value['category_url'];?>" title="<?php echo $value['name'];?>"><img src="<?php echo $value['sub_category_image_url'];?>" alt="<?php echo $value['name'];?>" border="0" width="110" height="110" /></a></p><div align="center" style="padding-top:6px"><a href="<?php echo $value['category_url'];?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?></a></div>
					</li>
					<?php } ?>		
					</ul>
					</div>
				<?php else : ?>
					<div style="font-size:18px;"><?php echo $lang['not_found']; ?></div>
				<?php endif ; ?>			
				<div class="clear"></div>
				<div class="function">
					<?php echo $page; ?>
				</div>
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