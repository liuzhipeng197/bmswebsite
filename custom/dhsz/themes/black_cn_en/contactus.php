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
<?php if ($value['skype_detail']) : ?>
<script type="text/javascript" src="http://skype.tom.com/script/skypeCheck40.js">
<?php endif ; ?>
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


<?php if($company['googleMapKey'] &&  $company['googleMapAddress']) { ?>

    <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=<?php echo $company['googleMapKey']; ?>&hl=<?php if($language_cur==1) echo "eng"; else if($language_cur==2) echo "zh-CN";?>" type="text/javascript"></script>
    <script type="text/javascript">
 
    var map = null;
    var geocoder = null;
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
       // map.setCenter(new GLatLng(39.917, 116.397), 13);
	    map.addControl(new GLargeMapControl());
        geocoder = new GClientGeocoder();
		showAddress("<?php echo $company['googleMapAddress']; ?>");
      }
    }
 
    function createMarker(latlng) {

	  var myHtml = "<?php echo $lang['company_name'];?>：<?php echo $company_desc['company_name'];?> <br> <?php echo $lang['website'];?>：<?php echo $company_desc['website'];?> <br> <?php echo $lang['address'];?>：<?php echo $company_desc['address']; ?><br> <?php echo $lang['zip'];?>：<?php echo $company['zip']; ?>"
		
      var marker = new GMarker(latlng);

	  marker.openInfoWindowHtml(myHtml);

      GEvent.addListener(marker,"click", function() {
      marker.openInfoWindowHtml(myHtml);
      });
      return marker;
	}
             
    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert("不能解析: " + address);
            } else {
              map.setCenter(point, 13);
             // var marker = new GMarker(point);
              map.addOverlay(createMarker(point));


            }
          }
        );
      }
    }
    </script>
   <?php } ?>
</head>
<body <?php if($company['googleMapKey'] &&  $company['googleMapAddress']) { ?>onload="initialize()" onunload="GUnload()"<?php } ?>>
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
		<div class="crumbs"><a href="<?php echo $menu['index_url'];?>"><?php echo $lang['home'];?></a> &gt; <?php echo $lang['contactus'];?></div>
		 <div class="page">
            <div class="maintitle">
                <p><?php echo $lang['title_contactus'];?></p><span>&nbsp;</span>
            </div>
			<div class="contact">
				<ul>
                <?php if ($company_desc['company_name']) : ?>
					<li><span class="k1"></span><p><b><?php echo $lang['company_name'];?></b>
					<strong><?php echo $company_desc['company_name'];?></strong><br />
					<?php if ($company_desc['website']) : ?><?php echo $lang['website'];?>: <?php echo $company_desc['website'];?><?php endif ; ?>
					</p>
					</li>
				<?php endif ; ?>
                <?php if ($company_desc['address']) : ?>
					<li><span class="k2"></span><p><b><?php echo $lang['address'];?></b>
					<?php echo $company_desc['address'];?><br />
					<?php if ($company['zip']) : ?><?php echo $lang['zip'];?>: <?php echo $company['zip'];?><?php endif ; ?>
					</p>
					</li>
				<?php endif ; ?>
				</ul>
                
                
                <?php if($company['googleMapKey'] &&  $company['googleMapAddress']) { ?>
                
                <div id="map_canvas" style="width: 600px; height: 350px; margin:20px;"></div>

				<?php } ?>
                
                <?php foreach ($contact_detail as $key => $value)  { ?>
                <?php if (count($contact_detail)>1) : ?>
            	
                <ul class="department">
				<li class="departmentname">
				<?php if ($value['contact_detail']['company_name']){ echo $value['contact_detail']['company_name']; }?><?php if ($value['contact_detail']['company_name'] && $value['contact_detail']['department']){ echo "&nbsp;-&nbsp;"; }?><?php if ($value['contact_detail']['department']){ echo $value['contact_detail']['department']; }?></li>
                
				<?php else : ?>
                <ul>
				<?php endif ; ?>
					
                    <li>
                    <span class="k3"></span><p><b><?php echo $lang['phone'];?></b>
					<?php echo $lang['contact_person'];?>: <?php echo $value['contact_detail']['contact_person'];?><br />
                    <?php foreach ($value['detail_tel_arr'] as $keyx => $valuex)  { ?>
					<?php if ($keyx==0){ echo $lang['tel'].":"; }?> <?php echo $valuex;?> &nbsp;
                    <?php } ?><br />
					<?php if ($value['contact_detail']['fax']) : ?><?php echo $lang['fax'];?>: <?php echo $value['contact_detail']['fax'];?><?php endif ; ?>
					</p>
					</li>
                    
					<li>
                    <span class="k4"></span><p><b><?php echo $lang['email']; ?>:</b>
                    <?php foreach ($value['detail_email_arr'] as $keyx => $valuex) { ?>
					<?php echo $valuex;?><br /><?php } ?>
					</p></li>
                    
					<li>
                    <span class="k5"></span><p><b><?php echo $lang['chat'];?></b>
					<?php if ($value['qq_detail']) : ?><?php echo $value['qq_detail'];?><?php endif ; ?>
                    <?php if ($value['msn_detail']) : ?><?php echo $value['msn_detail'];?><?php endif ; ?>
                    <?php if ($value['skype_detail']) : ?><?php echo $value['skype_detail'];?><?php endif ; ?>
                    <?php if ($value['yahoo_detail']) : ?><?php echo $value['yahoo_detail'];?><?php endif ; ?>
					<?php if ($value['aliwangwang_detail']) : ?><?php echo $value['aliwangwang_detail'];?><?php endif ; ?>
					</p>
					</li>
                    
                    <?php if ($value['contact_detail']['address']) : ?>
					<li>
                    <span class="k2"></span><p><b><?php echo $lang['address'];?></b>
					<?php echo $value['contact_detail']['address'];?><br />
					<?php if ($value['contact_detail']['zip']) : ?><?php echo $lang['zip'];?>: <?php echo $value['contact_detail']['zip'];?><?php endif ; ?>
					</p>
					</li>
					<?php endif ; ?>
                    
				</ul>
				<?php } ?>
			<div class="clear"></div>
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