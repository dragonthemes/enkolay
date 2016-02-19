<div class="main_pagePage" id="subAddPage">
	<div class="main_arrowTop_page"></div>
	<div class="row-fluid">	
		<div class="mainLeftSideToggle">
			<div class="addPage clearfix">
				<a class="addPageBack" onclick="showPages('0');"><< {$LANG.main_back}</a>
				{if $smarty.get.parent_page_id}
					<a class="addPageTabSec">{$objCommon->getPageName($smarty.get.parent_page_id)} </a>
					<a class="addPageTabSec" onclick="addSubPageListing('{$smarty.get.parent_page_id}','{$smarty.session.domain_id}');">{$LANG.main_sub_page} +</a>
				{elseif $smarty.get.page_id}
					<a class="addPageTabSec">{$objCommon->getPageName($smarty.get.page_id)} </a>
					<a class="addPageTabSec" onclick="addSubPageListing('{$smarty.get.page_id}','{$smarty.session.domain_id}');">{$LANG.main_sub_page} +</a>
				{else}
					<a class="addPageTabSec">{$objCommon->getPageName($smarty.post.page_id)} </a>
					<a class="addPageTabSec" onclick="addSubPageListing('{$smarty.post.page_id}','{$smarty.session.domain_id}');">{$LANG.main_sub_page} +</a>
				{/if}
			</div>
			<div class="mainLeftPageScroll nano">
				<ul class="menuUl marTop20 mainLeftPanelScrollActive contentNanoScroll LeftNone" id="sortablePage">
					{section name="pages" loop="$pagelist"}
						<li id="page_{$pagelist[pages].page_id}">
							<a {if $smarty.get.page_id eq $pagelist[pages].page_id}class="active"{elseif $smarty.get.page_id eq 0 and $smarty.section.pages.index eq 0}class="active"{/if} {if $smarty.post.action eq 'showsubPage'}onclick="showSubPages('{$smarty.post.page_id}','{$pagelist[pages].page_id}');"{elseif $smarty.get.action eq 'showSubPagelist'}onclick="showSubPages('{$smarty.get.parent_page_id}','{$pagelist[pages].page_id}');"{elseif $smarty.post.action eq 'addSubPage'}onclick="showSubPages('{$smarty.post.page_id}','{$pagelist[pages].page_id}');"{else}onclick="showAddSubPage('{$pagelist[pages].page_id}');"{/if}><img src="{$SITE_BASEURL}/images/tablist.png" alt="tablist" title="tablist" /> <span>{$pagelist[pages].pagename}</span></a>
						</li>
					{/section}
				</ul>
			</div>
		</div>
		<div class="span6 mainRightSideToggle marTop10">
			{if $pagefirstlist}
			<form name="addPage" method="post">
			<input type="hidden" name="pageid" id="pageid" value="{$pagefirstlist.0.page_id}">
			<div class="clearfix">
				<div class="subdomainLeft">{$LANG.page_name}</div>
				<div class="subdomainRight">
					<input type="text" class="PageMainRightTxtBx" name="page_name" id="page_name" value="{$pagefirstlist.0.pagename}">
				</div>
			</div>
			<!--<div class="marTop10 clearfix">
				<div class="subdomainLeft">{$LANG.page_layout}</div>
				<div class="subdomainRight">
					<div class="row-fluid">
						<div class="span3">
							<span class="page-tallheader"></span>
							<input type="radio" class="styled" name="page_layout" id="page_layout" value="tall" {if $pagefirstlist.0.page_layout eq 'tall'}checked{/if}>
							<label for="page_layout" class="pageLayoutLabel">{$LANG.tall_header}</label>
						</div>
						<div class="span3">
							<span class="page-shortheader"></span>
							<input type="radio" class="styled" name="page_layout" id="page_layout" value="short" {if $pagefirstlist.0.page_layout eq 'short'}checked{/if}>
							<label for="page_layout" class="pageLayoutLabel">{$LANG.short_header}</label>
						</div>
						<div class="span3">
							<span class="page-noheader"></span>
							<input type="radio" class="styled" name="page_layout" id="page_layout" value="no_header" {if $pagefirstlist.0.page_layout eq 'no_header'}checked{/if}>
							<label for="page_layout" class="pageLayoutLabel">{$LANG.no_header}</label>
						</div>
						<div class="span3">
							<span class="page-landheader"></span>
							<input type="radio" class="styled" name="page_layout" id="page_layout" value="lan_page" {if $pagefirstlist.0.page_layout eq 'lan_page'}checked{/if}>
							<label for="page_layout" class="pageLayoutLabel">{$LANG.landing_page}</label>
						</div>
					</div>
					<div class="row-fluid">
						<label class="span6">
							<input type="checkbox" name="hide_navigation" id="hide_navigation" value="1" {if $pagefirstlist.0.hide_navigation eq '1'}checked{/if}>{$LANG.hide_page}
						</label>
					</div>
				</div>
			</div>-->
			
			<!--<div class="marTop10 clearfix">
				<div class="subdomainLeft">{$LANG.page_layout}</div>
				<div class="subdomainRight">
					<div class="pageListHeader">
						<div class="tallHeader">
							<input type="radio" class="radio" name="page_layout" id="page_layout1" value="tall" {if $pagefirstlist.0.page_layout eq 'tall'}checked{/if}>
							<label for="page_layout1" class="txt1"><span class="navpageheaderBg">{$LANG.tall_header}</span></label>
						</div>
						<div class="shortHeader">
							<input type="radio" class="radio" name="page_layout" id="page_layout2" value="short" {if $pagefirstlist.0.page_layout eq 'short'}checked{/if}>
							<label for="page_layout2" class="txt1"><span class="navpageheaderBg">{$LANG.short_header}</span></label>
						</div>
						<div class="noHeader">
							<input type="radio" class="radio" name="page_layout" id="page_layout3" value="no_header" {if $pagefirstlist.0.page_layout eq 'no_header'}checked{/if}>
							<label for="page_layout3" class="txt1"><span class="navpageheaderBg">{$LANG.no_header}</span></label>
						</div>
						<div class="landingPage">
							<input type="radio" class="radio" name="page_layout" id="page_layout4" value="lan_page" {if $pagefirstlist.0.page_layout eq 'lan_page'}checked{/if}>
							<label for="page_layout4" class="txt1"><span class="navpageheaderBg">{$LANG.landing_page}</span></label>
						</div>
					</div>
					<div class="row-fluid">
						<label class="span6">
							<input type="checkbox" name="hide_navigation" id="hide_navigation" value="1" {if $pagefirstlist.0.hide_navigation eq '1'}checked{/if}>{$LANG.hide_page}
						</label>
					</div>
				</div>
			</div>-->
			
			
			
			<div class="pagTabClick subdomainLeft marTop10">{$LANG.advance_settings} <img width="11" height="11" src="{$SITE_BASEURL}/images/add.png" alt="add" title="add" /></div>
			<div class="pagTabShowHide">
				<div class="marTop10 clearfix">
					<div class="marTop10 clearfix">
						<div class="subdomainRight">
							{$LANG.page_title}
							<div class="clr"></div> 
							<input type="text" class="PageMainRightTxtBx marTop10" name="page_title" id="page_title" onkeyup="return checkpageTitle();"   value="{$pagefirstlist.0.seo_title}" placeholder="xxx-yyy or xxx only">
						</div>
					</div>
					<div class="marTop10 clearfix">
						<div class="subdomainLeft">{$LANG.page_desc}</div>
						<div class="subdomainRight">
							<input type="text" name="page_desc" class="PageMainRightTxtBx" id="page_desc" value="{$pagefirstlist.0.page_desc}">
						</div>
					</div>
					<div class="marTop10 clearfix">
						<div class="subdomainLeft">{$LANG.meta_key}</div>
						<div class="subdomainRight">
							<input type="text" name="meta_key" class="PageMainRightTxtBx" id="meta_key" value="{$pagefirstlist.0.meta_key}">
						</div>
					</div>
					<div class="marTop10 clearfix">
						<div class="subdomainLeft">{$LANG.footer_code}</div> 
						<div class="subdomainRight">
							<textarea name="footer_code" class="PageMainRightTxtBx hei100" id="footer_code">{$pagefirstlist.0.footer_code}</textarea>
						</div>
					</div>
					<div class="marTop10 clearfix">
						<div class="subdomainLeft">{$LANG.header_code}</div>
						<div class="subdomainRight">
							<textarea name="header_code" class="PageMainRightTxtBx hei100" id="header_code">{$pagefirstlist.0.header_code}</textarea>
						</div>
					</div>
				</div>
			</div> 
			<div class="marTop10 clearfix">
				<input type="button" name="save" class="btn btn-success" value="{$LANG.save_edit}" onclick="savePage();">
				<input type="button" name="delete" class="btn btn-danger" value="{$LANG.delete_page}" onclick="deletePage();"> 
			</div>
		</form>
		{else}
			<div class="chooseFile">
				<div class="chooseFileLft">
					<div class="chooseFileLftImg"></div>
					<div class="chooseFileLftTxt">{$LANG.choose_any_one_file}</div>
				</div>
				<div class="chooseFileMidImg"></div>
				<div class="chooseFileRht">
					<div class="chooseFileRhtImg"></div>
					<div class="chooseFileRhtTxt">{$LANG.add_sub_pages}</div>
				</div>
			</div>
		{/if}
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
$(document).ready(function(){
		$( "#sortablePage" ).sortable({
			update: function(event, ui) {
				$.post("ajaxPageSort.php", { pages: $('#sortablePage').sortable('serialize') } );
			},
			cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt'
		});
});
$( ".pagTabClick" ).click(function() {
	$(".pagTabShowHide").slideToggle();
});	
</script>
{/literal}