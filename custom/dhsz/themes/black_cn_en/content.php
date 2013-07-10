<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $content['meta_title']?$content['meta_title']:$content['name']; ?></title>
<meta name="description" content="<?php echo $content['meta_description']?$content['meta_description']:$content['name']; ?>" />
<meta name="keywords" content="<?php echo $content['meta_keywords']?$content['meta_keywords']:$content['name']; ?>" />
<meta name="robots" content="all" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/style/common.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/common.js"></script>

<link href="<?php echo $conf['weburl'];?>/js/search.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/ajax.js"></script>
<script type="text/javascript" src="<?php echo $conf['weburl'];?>/js/prototype.js"></script>
<script> var weburl = "<?php echo $conf['weburl'];?>"; </script>
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
		<div class="crumbs"><a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $nav;?></div>
		<div class="page">
            <div class="maintitle">
                <p><?php echo $cat_name;?></p>
            </div>
        	<div class="newsdetail">
            	<div class="newstitle"><?php echo $content['name'];?></div>
                <dl>
                    <dt><?php echo $content['date_added'];?></dt>
                    <dd>
                    <?php if ($filename){ ?><?php if ($filename_type=='image'){ ?><br /><center><img src="<?php echo $filename;?>" alt='<?php echo $content['name'];?>' border="0" /></center><?php }else{ ?><a href="<?php echo $filename;?>" target="_blank"><?php echo $lang['download'];?></a><br /><?php } ?><?php } ?>
　<?php echo $content['description'];?><br />
                    </dd>
                    <dt><?php echo $pre_link; ?> &nbsp;&nbsp;[<a href="<?php echo $menu['index_url'];?>"><?php echo $lang['return_home'];?></a>] [<a href="javascript:window.print();"><?php echo $lang['print'];?></a>] [<a href="javascript:history.go(-1);"><?php echo $lang['back'];?></a>] &nbsp;&nbsp;<?php echo $next_link; ?></dt>
                </dl>
                <?php if ($relate_news) { ?>
					<div class="newsrelated">
						<p><?php echo $lang['title_related_information'];?></p>
						<ul>
                        	<?php foreach ($relate_news as $key => $value)  { ?>
                            <?php  if ($content['channel_content_id']!=$value['channel_content_id']){ ?>
							<li><a href="<?php echo $value['content_url'];?>" title="<?php echo $value['name'];?>"><?php echo $value['name'];?></a></li>
							<?php } ?>
							<?php } ?>
						</ul>
						<div class="clear"></div>
					</div>
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