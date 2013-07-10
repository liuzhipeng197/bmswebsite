<div class="clear"></div>
<div class="footer">
    
	<div class="footernav">
    	<ul>
        	<li><a href="<?php echo $menu['aboutus_url'];?>" rel="nofollow"><?php echo $lang['title_aboutus'];?></a>&nbsp;&nbsp;| </li>
            <li><a href="<?php echo $menu['product_url'];?>" rel="nofollow"><?php echo $lang['title_products'];?></a>&nbsp;&nbsp;| </li>
            <li><a href="<?php echo $menu['inquiry_url'];?>" rel="nofollow"><?php echo $lang['title_inquiry'];?></a>&nbsp;&nbsp;| </li>
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
	
	<?php if($tags_list) { ?>
    <div class="links">
      <p><?php echo $lang['title_hot_tags'];?></p>
	  <div>
		<?php if($tags_list) { ?>
		<ul>
			<li><?php echo $tags_list; ?></li>		
		</ul>
		<?php } ?>
	  </div>
    </div>
	<?php } ?>
	
    <div class="copyright">
        <span>
        	 Copyright &copy; <?php echo $conf['copyright_year'];?> <?php echo $company_desc['company_name'];?> <?php echo $lang['all_rights_reserved'];?> <?php if ( $conf['beian'] ) : ?><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $conf['beian'];?></a><?php endif; ?> <?php echo $conf['flow_code'];?> <?php echo $conf['online'];?>
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

