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
	<div class="nav">
	<ul>
		<?php foreach ($menu['channel_category'] as $key => $value)  { ?>
		<li <?php if ($value['channel_category_id']==$channel['channel_category_id']) echo "class='current'"; ?>><a href="<?php echo $value['url'];?>" <?php if ($value['target']<>'') echo $value['target']; ?>><?php echo $value['name'];?></a></li>
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
			
			<div class="product">
				<div class="info">
					<dl>
						<dt><span><?php echo $lang['category_description'];?></span></dt>
						<dd><?php echo $description;?></dd>
					</dl>
				</div>
				<form name="theform" action="<?php echo $conf['weburl'];?>/inquiry.php" method="post">
				<input type="hidden" value="<?php echo $cur_val['language_id'];?>" name="language" />
                <div class="contactnow">
                	<ul>
                    <li><?php echo $lang['select'];?></li>
                    <li><input name="" type="checkbox" value="" /></li>
                    <li><?php echo $lang['to'];?></li>
                    <li>
					<input type="image" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/contactnow.gif" />
                    </li>
                    </ul>
                </div>
                <?php if ($product) : ?>
                    <?php if ($conf['view_style']==0) : ?>
						<div class="ptxts">
						<ul>
                    <?php foreach ($product as $key => $value)  { ?> 
					<li>
                    <input type="checkbox" name="product[]" value="<?php echo $value['product_id']; ?>" />
					<p><a href="<?php echo $value['product_url']; ?>" title="<?php echo $value['name']; ?>" target="_blank"><img src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name']; ?>" border="0" /></a></p>
					
					<a href="<?php echo $value['product_url']; ?>" title="<?php echo $value['name']; ?>" target="_blank"><?php echo qt_news_title($value['name'],50);?></a>
					<span><?php echo csubstr($value['description'], 90); 
				    //默认截取90个字节输出，也可以自己定义该数字。如果设置为0为全部输出
				?></span>
					<dl><dd><a href="<?php echo $value['product_url']; ?>"  title="<?php echo $value['name']; ?>" target="_blank"><?php echo $lang['detail']; ?></a></dd>
					<dd><a href="<?php echo $value['inquiry_url']; ?>" rel="nofollow" target="_blank"><?php echo $lang['inquiry']; ?></a></dd></dl>
					</li>
                    <?php } ?>	
					</ul>
						</div>
					<?php else : ?>
						<div class="ppics">
						<ul>
						<?php foreach ($product as $key => $value)  { ?>  
						<li>
						<p><a href="<?php echo $value['product_url']; ?>" title="<?php echo $value['name']; ?>" target="_blank"><img src="<?php echo $value['image_url']; ?>" alt="<?php echo $value['name']; ?>" border="0" /></a></p><span><input type="checkbox" name="product[]" value="<?php echo $value['product_id']; ?>" /><a href="<?php echo $value['product_url']; ?>" title="<?php echo $value['name']; ?>" target="_blank"><?php echo $value['name']; ?></a></span>
						</li>
						<?php } ?>		
						</ul>
						</div>
					<?php endif ; ?>
					<div class="contactnow">
                	<ul>
                    <li><?php echo $lang['select']; ?></li>
                    <li><input name="" type="checkbox" value="" /></li>
                    <li><?php echo $lang['to']; ?></li>
                    <li>
					<input type="image" src="<?php echo $conf['weburl'];?>/skin/<?php echo $skin;?>/<?php echo $directory;?>/images/contactnow.gif" />
                    </li>
                    </ul>
                </div>
					
				 <?php else : ?>
					<div style="font-size:18px;"><?php echo $lang['not_found']; ?></div>
				<?php endif ; ?>
				</form>		
				<div class="clear"></div>
				<div class="function">
					<?php echo $page;?>
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