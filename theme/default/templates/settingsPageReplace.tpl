<div class="main_arrowTop"></div>
{*==left side part starts==*}
<div class="row-fluid">
	<div id="selectionmenu" class="mainLeftSideToggle">
		<ul class="menuUl" id="sortablePage2">
			<li>
				<a id="general" class="active clearfix" onclick="ShowCorrectDiv('generalsetting','seosetting','mobilesetting','editorssetting','archivesetting');showActiveClass('general');"><img src="{$SITE_BASEURL}/images/storegeneral.png" alt="storegeneral" title="storegeneral" /> <span class="leftmenuname">{$LANG.main_general}</span></a>	
			</li>
			<li>				
				<a id="seo" class="clearfix" onclick="ShowCorrectDiv('seosetting','generalsetting','mobilesetting','editorssetting','archivesetting');showActiveClass('seo');"><img src="{$SITE_BASEURL}/images/storeseo.png" alt="storeseo" title="storeseo" /> <span class="leftmenuname">{$LANG.main_seo}</span></a>
			</li>
		{*	<li>
				<a onclick="ShowCorrectDiv('mobilesetting','seosetting','generalsetting','editorssetting','archivesetting');">{$LANG.main_mobile}</a>
			</li>
			<li>
				<a onclick="ShowCorrectDiv('editorssetting','generalsetting','seosetting','mobilesetting','archivesetting');">{$LANG.main_editors}</a>
			</li>
			<li>
				<a onclick="ShowCorrectDiv('archivesetting','generalsetting','seosetting','mobilesetting','editorssetting');">{$LANG.main_archive}</a>
			</li>*}
		</ul>
	</div>
	{*==left side part ends==*}
	
	{*===header logo parts starts==*}
		<div id="headerlogo_id">
			{if $settingpage.0.header_logo_config eq '1'}
				{if !empty($settingpage.0.header_title)}
					<span>{$settingpage.0.header_title}</span>
				{else}
					<span><a onclick="">{$LANG.user_head_site}</a></span>	
				{/if}
			{/if}
		</div>
		<div id="header_mouseover_id">
			<a></a>
			<a></a>
			<a></a>
		</div>
	{*===header logo parts ends==*}
	
	
	{*===rightside part starts ===*}
	<div class="span6 mainRightSideToggle" id="generalsetting">
		<nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top" id="cbp-spmenu-s3">
			{*===general starts==*}
				{*==update columns are starts==*}
				
				{*===site subdomain starts==*}
					<div id="subdomainBlock">
						{include file='subdomain.tpl'}
					</div>	
				{*===site subdomain ends==*}
				
				{*===site title starts==*}
				<div id="titleBlock">	
					{include file='sitetitle.tpl'}
				</div>	
				{*===site title ends==*}
				
				{*==SSL starts=*}
				 {*	<div class="marTop20 clearfix">
						<div class="subdomainLeft">{$LANG.main_site_ssl}</div>
						<div class="subdomainRight clearfix">
							<span>{$settingpage.0.ssl}</span>
							<a href="" class="btn btn-primary pull-right">{$LANG.main_upgrade}</a>
						</div>
					</div>*}
				{*==SSL ends=*}
				
				{*==favicon starts==*}
				 {*	<div class="marTop20 clearfix">
						<div class="subdomainLeft">{$LANG.main_site_favicon}</div>
						<div class="subdomainRight clearfix">
							<span><img src="{$SITE_BASEURL}/design/images/{$settingpage.0.favicon_image}"></span>
							<a href="" class="btn btn-primary pull-right">{$LANG.main_upgrade}</a>
						</div>
					</div>*}
				{*==favicon ends==*}
				
				{*==sitepassword starts===*}
				{*	<div class="marTop20 clearfix">
						<div class="subdomainLeft">{$LANG.main_site_password}</div>
						<div class="subdomainRight clearfix">
							<input class="TopPanelPassTxtBx" type="text" name="protectpage" id="protectpage" value="">
							<div class="clr"></div>
							[ {$LANG.main_whichpage} ]
							<input type="submit" class="btn btn-primary pull-right" name="save" id="save" value="{$LANG.main_save}" onclick="">
						</div>
					</div>*}
				{*==sitepassword starts===*}
				
				{*===navigation starts==*}
				{*	<div class="marTop20 clearfix">
						<div class="subdomainLeft">{$LANG.main_navigation}</div>
						<div class="subdomainRight clearfix">
							<input type="checkbox" name="excesspage" id="excesspage" value="">{$LANG.main_navi_group}
						</div>
					</div>*}
				{*===navigation ends==*}
				
				{*===facebook sharing starts===*}
					{*<div class="marTop20 clearfix">
						<div class="subdomainLeft">{$LANG.main_facebook_share}</div>
						<div class="subdomainRight clearfix">
							{if !empty($settingpage.0.facebook_connected)}
								<span>{$settingpage.0.facebook_connected}</span>										
							{else}
								<span>{$LANG.main_notconnect}</span>
							{/if}
							<a href="" class="btn btn-primary pull-right">{$LANG.main_setup}</a>
						</div>
					</div>*}
				{*=facebook sharing ends==*} 
					
				{*==update columns are ends==*}
			{*===general settings ends==*}
		</nav>
	</div>
	
	{*==seo starts==*}
	<div id="seosetting" class="span6 mainRightSideToggle" style="display:none">
		 {*===seo pages starts===*}
			 <div id="DescriptionBlock">
				{include file='sitedescription.tpl'}
			 </div>	
			 <div id="keywordBlock">
				{include file='sitemetakeyword.tpl'}
			 </div>
			 <div id="HeaderBlock">
				{include file='siteheader.tpl'} 
			 </div>
			 <div id="FooterBlock">  
				{include file='sitefooter.tpl'}
			 </div> 
			{* <div class="marTop20 clearfix">
				<div class="subdomainLeft">{$LANG.main_hide_site}</div>
				<input class="marTop0" type="checkbox" name="seo_optimize" id="seo_optimize" value="1"/> {$LANG.main_prevent}
			 </div>
			  <div class="marTop20 clearfix">
				<div class="subdomainLeft">{$LANG.main_redirect}</div>
				<div class="subdomainRight clearfix">
					<a href="" class="btn btn-primary pull-right">{$LANG.main_configure}</a>
				</div>
			 </div>*}
		 {*===seo pages ends===*}
	</div>	
	{*==seo ends==*}
	
	{*==mobile  starts==*}
	<div id="mobilesetting" class="span6 mainRightSideToggle" style="display:none">
		<div class="cbp_spmenuHead">{$LANG.main_mobile}</div>
		<div class="marTop10 clearfix">
			<div class="subdomainLeft">{$LANG.main_enable}</div>
			<div class="subdomainRight">
				<input type="checkbox" name="Mobileview" id="Mobileview" value="1">{$LANG.main_disply_mobile}
			</div>
		</div>
	</div>
	{*==mobile  ends==*}
	
	{*==editors  starts==*}
		<div id="editorssetting" class="span6 mainRightSideToggle" style="display:none">
			<div class="cbp_spmenuHead">{$LANG.main_edit_other}</div>
			<a href="" class="btn btn-primary marTop20">{$LANG.main_add_edit}</a>
			<ul class="row-fluid marTop20">
				<li class="span4">1.{$LANG.main_email}</li>
				<li class="span4">2.{$LANG.main_role}</li>
				<li class="span4">3.{$LANG.main_lastlogin}</li>
			</ul>
		</div>
	{*==editors  ends==*}
	
	{*==archive  starts==*}
		<div id="archivesetting" class="span6 mainRightSideToggle" style="display:none">
			<div class="cbp_spmenuHead">{$LANG.main_unpublish}</div>
			<div class="marTop10 clearfix">
				<div class="subdomainLeft">{$LANG.main_last_publish}</div>
				<div class="subdomainRight clearfix">
					<a onclick="" class="btn btn-primary pull-right">{$LANG.main_unpublish_site}</a>
				</div>
			</div>
			<div class="cbp_spmenuHead">{$LANG.main_archive}</div>
			<div class="marTop10 clearfix">
				<div class="subdomainLeft">{$LANG.create_zip}</div>
				<div class="subdomainRight clearfix">
					<a onclick="" class="btn btn-primary pull-right">{$LANG.main_create_archive}</a>
				</div>
			</div>
		</div>
	{*==archive  ends==*}
</div>
{*===rightside part ends ===*}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$( "#sortablePage2" ).sortable({
				update: function(event, ui) {
					$.post("ajaxPageSort.php", { pages: $('#sortablePage').sortable('serialize') } );
				},
				cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt'
			});
		});
	</script>
{/literal}