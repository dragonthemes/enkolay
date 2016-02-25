<ul class="contentNanoScroll mainLeftPanelScrollActive list-unstyled accordion" id="accordion2">
	<li class="{if $objAdmin->get_file_name() eq 'index.php'}active{/if}">
		<a href="index.php" class="hoverclass">
			<i class="fa fa-dashboard"></i>
			<span>Dashboard</span>
		</a>
	</li>
	 <li class="{if $objAdmin->get_file_name() eq 'site_setting.php' || $objAdmin->get_file_name() eq 'admin_change_pwd.php' || $objAdmin->get_file_name() eq 'paymentManage.php'  || $objAdmin->get_file_name() eq 'paymentEditManage.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="settingTogg" href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('setting')} hoverclass"><i class="fa fa-gear"></i> {$LANG.admin_settings} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'site_setting.php' || $objAdmin->get_file_name() eq 'admin_change_pwd.php' || $objAdmin->get_file_name() eq 'paymentManage.php'  || $objAdmin->get_file_name() eq 'paymentEditManage.php'}in{/if}" id="collapseOne">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
					<li class="{$objAdmin->setHeadderMenuActiv('site_setting.php')}"><a href="site_setting.php"><i class="fa fa-gear"></i> {$LANG.admin_site_setting}</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('icon_setting.php')}"><a href="icon_setting.php"><i class="fa fa-gear"></i> {$LANG.admin_icon_setting}</a></li>
                    <li class="{$objAdmin->setHeadderMenuActiv('admin_change_pwd.php')}"><a href="admin_change_pwd.php"><i class="fa fa-pencil "></i> {$LANG.admin_change_password}</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('paymentManage.php')} {$objAdmin->setHeadderMenuActiv('paymentEditManage.php')}"><a href="paymentManage.php"><i class="fa fa-tags"></i> {$LANG.admin_payment_manage}</a></li>
					<!--<li class="{$objAdmin->setHeadderMenuActiv('recentActivity.php')}"><a href="recentActivity.php"><i class="fa fa-wheelchair"></i> {$LANG.recent_activity}</a></li>-->
					
					
				</ul>
			</div>
		</div>
	</li>
	
    <li class="{if $objAdmin->get_file_name() eq 'languageManageAdmin.php' || $objAdmin->get_file_name() eq 'languageAddEdit.php' || $objAdmin->get_file_name() eq 'bannerManage.php' || $objAdmin->get_file_name() eq 'bannerManageAdd.php' || $objAdmin->get_file_name() eq 'thememanage.php' || $objAdmin->get_file_name() eq 'thememanageadd.php' || $objAdmin->get_file_name() eq 'fontManage.php'|| $objAdmin->get_file_name() eq 'fontManageAdd.php' || $objAdmin->get_file_name() eq 'staticPageManage.php' || $objAdmin->get_file_name() eq 'staticPageAddEdit.php' || $objAdmin->get_file_name() eq 'backgroundManage.php' || $objAdmin->get_file_name() eq 'backgroundManageAdd.php' || $objAdmin->get_file_name() eq 'blogManage.php' || $objAdmin->get_file_name() eq 'blogManageAdd.php' || $objAdmin->get_file_name() eq 'storeManage.php' || $objAdmin->get_file_name() eq 'storeManageAdd.php' || $objAdmin->get_file_name() eq 'currencyManage.php' || $objAdmin->get_file_name() eq 'currencyManageAdd.php' || $objAdmin->get_file_name() eq 'orderManage.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="accountTogg" href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('controls')} hoverclass"><i class="fa fa-table"></i> {$LANG.admin_controls} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'languageManageAdmin.php' || $objAdmin->get_file_name() eq 'languageAddEdit.php' || $objAdmin->get_file_name() eq 'bannerManage.php' || $objAdmin->get_file_name() eq 'bannerManageAdd.php' || $objAdmin->get_file_name() eq 'thememanage.php' || $objAdmin->get_file_name() eq 'thememanageadd.php' || $objAdmin->get_file_name() eq 'storeManage.php' || $objAdmin->get_file_name() eq 'storeManageAdd.php' || $objAdmin->get_file_name() eq 'currencyManage.php' || $objAdmin->get_file_name() eq 'currencyManageAdd.php' || $objAdmin->get_file_name() eq 'orderManage.php' || $objAdmin->get_file_name() eq 'fontManage.php'|| $objAdmin->get_file_name() eq 'fontManageAdd.php' || $objAdmin->get_file_name() eq 'staticPageManage.php' || $objAdmin->get_file_name() eq 'staticPageAddEdit.php' || $objAdmin->get_file_name() eq 'backgroundManage.php' || $objAdmin->get_file_name() eq 'backgroundManageAdd.php' || $objAdmin->get_file_name() eq 'blogManage.php' || $objAdmin->get_file_name() eq 'blogManageAdd.php'}in{/if}" id="collapseTwo">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
				    <li class="{$objAdmin->setHeadderMenuActiv('languageManageAdmin.php')}{$objAdmin->setHeadderMenuActiv('languageAddEdit.php')}"><a href="languageManageAdmin.php"><i class="fa fa-flag"></i> {$LANG.admin_language}</a></li>
				    {*<li class="{$objAdmin->setHeadderMenuActiv('bannerManage.php')} {$objAdmin->setHeadderMenuActiv('bannerManageAdd.php')}"><a href="bannerManage.php"><i class="fa fa-picture-o"></i> {$LANG.admin_banner_manage}</a></li>*}
					<li class="{$objAdmin->setHeadderMenuActiv('thememanage.php')} {$objAdmin->setHeadderMenuActiv('thememanageadd.php')}"><a href="thememanage.php"><i class="fa fa-clipboard"></i> {$LANG.admin_theme_management}</a></li>
					<!----blog manage start---->
					{*<li class="{$objAdmin->setHeadderMenuActiv('storeManage.php')} {$objAdmin->setHeadderMenuActiv('storeManageAdd.php')}"><a href="storeManage.php"><i class="fa fa-clipboard"></i> {$LANG.admin_store_management}</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('currencyManage.php')} {$objAdmin->setHeadderMenuActiv('currencyManageAdd.php')}"><a href="currencyManage.php"><i class="fa fa-clipboard"></i> {$LANG.admin_currency_management}</a></li>
                    <li class="{$objAdmin->setHeadderMenuActiv('storeManage.php')} {$objAdmin->setHeadderMenuActiv('orderManage.php')}"><a href="orderManage.php"><i class="fa fa-clipboard"></i> {$LANG.admin_order_management}</a></li>*}
					<!----blog manage end---->
                    <li class="{$objAdmin->setHeadderMenuActiv('fontManage.php')}{$objAdmin->setHeadderMenuActiv('fontManageAdd.php')}"><a href="fontManage.php"><i class="fa fa-font"></i> {$LANG.admin_font_management}</a></li>
				{*	<li class="{$objAdmin->setHeadderMenuActiv('staticPageManage.php')}{$objAdmin->setHeadderMenuActiv('staticPageAddEdit.php')}"><a href="staticPageManage.php"><i class="fa fa-file-text-o "></i> {$LANG.admin_static_management}</a></li> *}
                    <li class="{$objAdmin->setHeadderMenuActiv('blogManage.php')} {$objAdmin->setHeadderMenuActiv('blogManageAdd.php')}"><a href="blogManage.php"><i class="fa fa-comments"></i> {$LANG.admin_blog_management}</a></li>
                    {*<li class="{$objAdmin->setHeadderMenuActiv('backgroundManage.php')} {$objAdmin->setHeadderMenuActiv('backgroundManageAdd.php')} "><a href="backgroundManage.php"><i class="fa fa-square"></i> {$LANG.admin_background_management}</a></li>*}
                    
				</ul>
			</div>
		</div>
	</li>
    <li class="{if $objAdmin->get_file_name() eq 'domainManage.php' || $objAdmin->get_file_name() eq 'pointdomainManage.php' || $objAdmin->get_file_name() eq 'domainImageManage.php' || $objAdmin->get_file_name() eq 'blogSetListingManage.php' || $objAdmin->get_file_name() eq 'domainPageListManage.php' || $objAdmin->get_file_name() eq 'blogDomainManage.php' || $objAdmin->get_file_name() eq 'listPost.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="settingTogg" href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('domains')} hoverclass"><i class="fa fa-globe"></i> {$LANG.site_domain} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'domainManage.php' || $objAdmin->get_file_name() eq 'pointdomainManage.php' || $objAdmin->get_file_name() eq 'domainImageManage.php' || $objAdmin->get_file_name() eq 'blogSetListingManage.php' || $objAdmin->get_file_name() eq 'domainPageListManage.php' || $objAdmin->get_file_name() eq 'blogDomainManage.php' || $objAdmin->get_file_name() eq 'listPost.php'}in{/if}" id="collapseThree">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
                    <li class="{$objAdmin->setHeadderMenuActiv('domainManage.php')}"><a href="domainManage.php"><i class="fa fa-globe"></i> {$LANG.domain_name}</a></li>
                   {* <li class="{$objAdmin->setHeadderMenuActiv('pointdomainManage.php')}"><a href="pointdomainManage.php"><i class="fa fa-globe"></i> {$LANG.point_domain}</a></li>
                    <li class="{$objAdmin->setHeadderMenuActiv('domainPageListManage.php')}"><a href="domainPageListManage.php"><i class="fa fa-columns"></i> {$LANG.admin_domain_page}</a></li>                    
					<li class="{$objAdmin->setHeadderMenuActiv('domainImageManage.php')}"><a href="domainImageManage.php"><i class="fa fa-paste"></i> {$LANG.domain_image}</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('blogSetListingManage.php')}"><a href="blogSetListingManage.php"><i class="fa fa-file-text-o"></i> {$LANG.domain_blogSettingListingManage}</a></li>
                    <li class="{$objAdmin->setHeadderMenuActiv('blogDomainManage.php')} {$objAdmin->setHeadderMenuActiv('listPost.php')} {$objAdmin->setHeadderMenuActiv('listComments.php')}"><a href="blogDomainManage.php"><i class="fa fa-comments-o"></i> {$LANG.admin_blog_domain_management}</a></li>*}
				</ul>
			</div>
		</div>
	</li>
    <li class="{if $objAdmin->get_file_name() eq 'socialManage.php' || $objAdmin->get_file_name() eq 'fansManage.php' || $objAdmin->get_file_name() eq 'fansAddEdit.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="accountTogg" href="#collapseFour" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('social')} hoverclass"><i class="fa fa-user"></i> {$LANG.social_management} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'socialManage.php' || $objAdmin->get_file_name() eq 'fansManage.php' || $objAdmin->get_file_name() eq 'fansAddEdit.php'}in{/if}" id="collapseFour">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
				  {* <li class="{$objAdmin->setHeadderMenuActiv('socialManage.php')}"><a href="socialManage.php"><i class="fa fa-user"></i> {$LANG.admin_social_management}</a></li>*}
			       <li class="{$objAdmin->setHeadderMenuActiv('fansManage.php')} {$objAdmin->setHeadderMenuActiv('fansAddEdit.php')} "><a href="fansManage.php"><i class="fa fa-users"></i> {$LANG.admin_fans_management}</a></li>
				</ul>
			</div>
		</div>
	</li>
    <li class="{if $objAdmin->get_file_name() eq 'contactManage.php' || $objAdmin->get_file_name() eq 'contactManageEdit.php' || $objAdmin->get_file_name() eq 'contactListManage.php' || $objAdmin->get_file_name() eq 'inviteManage.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="settingTogg" href="#collapseFive" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('contacts')} hoverclass"><i class="fa fa-phone"></i> {$LANG.contacts} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'contactManage.php' || $objAdmin->get_file_name() eq 'contactManageEdit.php' || $objAdmin->get_file_name() eq 'contactListManage.php' || $objAdmin->get_file_name() eq 'inviteManage.php'}in{/if}" id="collapseFive">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
                  <li class="{$objAdmin->setHeadderMenuActiv('contactListManage.php')}"><a href="contactListManage.php"><i class="fa fa-list-alt"></i> {$LANG.admin_contactlist}</a></li>
                  <li class="{$objAdmin->setHeadderMenuActiv('contactManage.php')}{$objAdmin->setHeadderMenuActiv('contactManageEdit.php')}"><a href="contactManage.php"><i class="fa fa-phone"></i> {$LANG.admin_contact_management}</a></li>
                  <li class="{$objAdmin->setHeadderMenuActiv('inviteManage.php')}"><a href="inviteManage.php"><i class="fa fa-pencil-square"></i> {$LANG.admin_invite_management}</a></li>
				</ul>
			</div>
		</div>
	</li>
    <li class="{if $objAdmin->get_file_name() eq 'admin_change_pwd.php' || $objAdmin->get_file_name() eq 'userManage.php' || $objAdmin->get_file_name() eq 'transactions.php' || $objAdmin->get_file_name() eq 'manageDomainDetails.php' || $objAdmin->get_file_name() eq 'domainPageListManage.php' || $objAdmin->get_file_name() eq 'pageListManage.php' || $objAdmin->get_file_name() eq 'siteListManage.php' || $objAdmin->get_file_name() eq 'postListManage.php' || $objAdmin->get_file_name() eq 'commentListManage.php' || $objAdmin->get_file_name() eq 'listPageManage.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="accountTogg" href="#collapseSix" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('accounts')} hoverclass"><i class="fa fa-list-alt "></i> {$LANG.admin_accounts} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body collapse {if $objAdmin->get_file_name() eq 'admin_change_pwd.php' || $objAdmin->get_file_name() eq 'userManage.php' || $objAdmin->get_file_name() eq 'manageDomainDetails.php' || $objAdmin->get_file_name() eq 'transactions.php' || $objAdmin->get_file_name() eq 'domainPageListManage.php' || $objAdmin->get_file_name() eq 'pageListManage.php' || $objAdmin->get_file_name() eq 'siteListManage.php' || $objAdmin->get_file_name() eq 'postListManage.php' || $objAdmin->get_file_name() eq 'commentListManage.php' || $objAdmin->get_file_name() eq 'listPageManage.php'}in{/if}" id="collapseSix">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
					<li class="{$objAdmin->setHeadderMenuActiv('userManage.php')}"><a href="userManage.php"><i class="fa fa-male "></i> {$LANG.user_manage}</a></li>
                    <li class="{$objAdmin->setHeadderMenuActiv('transactions.php')}"><a href="transactions.php"><i class="fa fa-male "></i> {$LANG.admin_transactions}</a></li>
				</ul>
			</div>
		</div>
	</li>
	<li class="{if $objAdmin->get_file_name() eq 'pricemanage.php' || $objAdmin->get_file_name() eq 'pricemanageadd.php'}active{/if} accordion-group">
		<div class="accordion-heading">
			<a id="paymentTogg" href="#collapseSeven" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed {$objAdmin->setHeadderActivClass('payment')} hoverclass"><i class="fa fa-gear"></i> {$LANG.admin_price_manage} <span class="settingToggRhtArrow"></span></a>
		</div>
		<div class="accordion-body  collapse {if $objAdmin->get_file_name() eq 'pricemanage.php' || $objAdmin->get_file_name() eq 'pricemanageadd.php'}in{/if}" id="collapseSeven">
			<div class="accordion-inner">
				<ul class="leftNavMenu">
						<li class="{$objAdmin->setHeadderMenuActiv('pricemanage.php')} {$objAdmin->setHeadderMenuActiv('pricemanageadd.php')}"><a href="pricemanage.php"><i class="fa fa-tags"></i> {$LANG.admin_price_manage}</a></li>
				</ul>
			</div>
		</div>
	</li>
	
	<!--<li class="Rightmenu2"><a href="logout.php"><div class="clearfix dc"><img width="20" height="20" src="images/logout.png" /></div> {$LANG.admin_logout}</a></li>-->
</ul>