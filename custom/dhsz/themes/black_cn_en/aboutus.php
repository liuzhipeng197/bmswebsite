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
		<li <?php if ($value['channel_category_id']==$channel['channel_category_id']) echo "class='current'"; ?>><a href="<?php echo $value['url'];?>" <?php if ($value['target']<>'') echo $value['target']; ?> <?php if(is_sub_categories($value['channel_category_id'])) echo " rel=\"ddsubmenu".$value['channel_category_id']."\""; ?>><?php echo $value['name'];?></a></li>
        <?php } ?>
	</ul>
</div>
<div class="main">
	<div class="right">
		<div class="crumbs">
			<a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $lang['aboutus'];?>
		</div>
		
		<div class="page">
			<div class="maintitle">
				<p><?php echo $lang['title_aboutus'];?></p><span>&nbsp;</span>
			</div>
			<div class="about">
				<dl>
					<dd><?php echo $company_desc['description'];?></dd>
				</dl>
			</div>
		</div>
        <?php if ($company_desc['business_type'] || $company_desc['product_service'] || $company['year_company_registered'] || $company_desc['employee_number'] || $company_desc['brands'] || $company_desc['certification'] || $company_desc['annual_turnover'] || $company_desc['main_markets'] || $company_desc['export_percentage'] || $company_desc['factory_location'] || $company_desc['factory_size']) : ?>
		<div class="page" style="margin-top:15px;">
		<div class="maintitle"><p><?php echo $lang['basic_info'];?></p></div>
		<div class="company">
                <ul>
                	<?php if ($company_desc['business_type']) : ?>
                    <li><p><?php echo $lang['business_type'];?>:</p> <?php echo $company_desc['business_type'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['product_service']) : ?>
                    <li><p><?php echo $lang['product_service'];?>:</p> <?php echo $company_desc['product_service'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company['year_company_registered']) : ?>
                    <li><p><?php echo $lang['year_company_registered'];?>:</p> <?php echo $company['year_company_registered'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['employee_number']) : ?>
                    <li><p><?php echo $lang['employee_number'];?>:</p> <?php echo $company_desc['employee_number'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['brands']) : ?>
                    <li><p><?php echo $lang['brands'];?>:</p> <?php echo $company_desc['brands'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['certification']) : ?>
                    <li><p><?php echo $lang['certification'];?>:</p> <?php echo $company_desc['certification'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['annual_turnover']) : ?>
                    <li><p><?php echo $lang['annual_turnover'];?>:</p> <?php echo $company_desc['annual_turnover'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['main_markets']) : ?>
                    <li><p><?php echo $lang['main_markets'];?>:</p> <?php echo $company_desc['main_markets'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['export_percentage']) : ?>
                    <li><p><?php echo $lang['export_percentage'];?>:</p> <?php echo $company_desc['export_percentage'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['factory_location']) : ?>
                    <li><p><?php echo $lang['factory_location'];?>:</p> <?php echo $company_desc['factory_location'];?> </li>
                    <?php endif ; ?>
                    
                    <?php if ($company_desc['factory_size']) : ?>
                    <li><p><?php echo $lang['factory_size'];?>:</p> <?php echo $company_desc['factory_size'];?> </li>
                    <?php endif ; ?>
                </ul>
            </div>		
		</div>
        <?php endif ; ?>
	</div>
	<div class="left"><?php include("left.php"); ?></div>
	<div class="clear"></div>
	<div class="mainfoot"></div>	
</div>
<?php include("footer.php"); ?>
</div>
</body>
</html>