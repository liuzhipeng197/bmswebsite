$(window).addEvent('domready',function(){


    var feature_box = new switchTab(
                                $$('div.feature_box li.menu_item'),
                                $$('div.service_box div.tab'),
                                'user_select'
                                );

    var feature_box_cursor = new switchTab(
                                $$('div.feature_box li.menu_item div.cnt_menu'),
                                $$('ul.feature_cursor li.menu_sharp'),
                                'act_menu'
                                );


    var objTabs_apps = new switchTab(
                                    $$('.other_apps_list .app_icon'),
                                    $$('.apps_list .apps_content .app_content'),
                                    'std_cur',
                                    'mouseover'
                                    );

    var dark = new darken( 1, $$('li.app_icon'), 60, 100); 
	$$('div.service_box h2 a.service_title').addEvents({
		'mouseover':function(){
			this.getChildren('span').setStyle('display','inline');
		},
		'mouseout':function(){
			this.getChildren('span').setStyle('display','none');
		}
	});
	$$('div.feature_box li.menu_item').addEvent('click',function(){
		$$("div.user_select").getChildren('div.cnt_area img').each(function(imgitem,index){
			imgitem.each(function(item,index){
				if (!item.getProperty('src') && item.getProperty('data-src')){
					item.setProperty('src',item.getProperty('data-src'));
				}
			});
		});
	});
});
