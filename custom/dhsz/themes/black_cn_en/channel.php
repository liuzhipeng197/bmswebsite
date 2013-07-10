<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $channel['meta_title']?$channel['meta_title']:$channel['name']; ?></title>
<meta name="description" content="<?php echo $channel['meta_description']?$channel['meta_description']:$channel['name']; ?>" />
<meta name="keywords" content="<?php echo $channel['meta_keywords']?$channel['meta_keywords']:$channel['name']; ?>" />
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
		<li <?php if ($value['channel_category_id']==$channel['channel_category_id'] || $value['channel_category_id']==$channel_category_id) echo "class='current'"; ?>><a href="<?php echo $value['url'];?>" <?php if ($value['target']<>'') echo $value['target']; ?> <?php if(is_sub_categories($value['channel_category_id'])) echo " rel=\"ddsubmenu".$value['channel_category_id']."\""; ?>><?php echo $value['name'];?></a></li>
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
                <p><?php echo $channel['name'];?></p>
            </div>
			<?php
			if ($channel['sta']==1) {
			?>
			<div class="list">
			<?php echo $channel['description']; ?>
			</div>
			<?
			}elseif ($channel['sta']==0) {
				if ($content){
			?>
			<div class="list">
				<ul>
				<?php foreach ($content as $key => $value)  { ?>
				<li>
				<?php if ($value['small_image']!=""){ ?>
				<a href="<?php echo $value['content_url'];?>" title="<?php echo $value['name'];?>"><img src="<?php echo $value['small_image']; ?>" border="0" alt="<?php echo $value['name'];?>" /></a>
				<?php }?>
				<p><a href="<?php echo $value['content_url'];?>" title="<?php echo $value['name'];?>"><?php echo $value['return_name'];?></a></p>
				<?php echo $value['description'];?>
				[<a href="<?php echo $value['content_url'];?>"><?php echo $lang['view_details'];?></a>] <?php if ($value['filetype']=='file'){ ?>[<a href="<?php echo $value['filename'];?>"><?php echo $lang['file_down'];?></a>]<?php } ?></li>
				<?php } ?>
				</ul>
				<div class="function">
					<?php echo $page;?>
				</div>
			</div>
				<?
				}
			}else {
				if ($content){
			?>
			<div class="cpics">
				<ul>
				<?php foreach ($content as $key => $value)  { ?>
				<li>
				<p><?php if ($value['small_image']!=""){ ?>
				<a href="<?php echo $value['content_url'];?>" title="<?php echo $value['name'];?>"><img src="<?php echo $value['small_image']; ?>" border="0" alt="<?php echo $value['name'];?>" /></a>
				<?php }?></p>
				<span><a href="<?php echo $value['content_url'];?>" title="<?php echo $value['name'];?>"><?php echo $value['return_name'];?></a></span>
				<?php echo $value['description'];?>
				</li>
				<?php } ?>
				</ul>
				<div class="function">
					<?php echo $page;?>
				</div>
			</div>
				<?
				}
			}
			?>
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