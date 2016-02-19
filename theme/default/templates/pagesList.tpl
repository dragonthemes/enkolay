<div class="main_pagePage">
	<div class="main_arrowTop_page"></div>
	<div class="row-fluid">	
		<div class="mainLeftSideToggle">
			<div class="addPage dropdown clearfix">
				<a class="dropdown-toggle addPageTab" data-toggle="dropdown" onclick="showaddpagelist();">{$LANG.add_page} +</a>
				<!--<a class="addPageTab" onclick="showaddpagelist();">{$LANG.add_page} +</a>-->
				<span class="arrow"></span>
				<ul class="dropdown-menu addPageToggle">
					<li onclick="addPageForDomain();">Standart Sayfa</li>
					<li onclick="showExternalLink();">Harici Bağlantı</li>
				</ul>
				<!--<a class="addPageTab" onclick="addSubPageForDomain();">{$LANG.main_sub_page} +</a>-->
			</div>
			<div class="mainLeftPageScroll nano">
				<ul class="menuUl marTop20 mainLeftPanelScrollActive contentNanoScroll LeftNone" id="sortablePage">
					{section name="pages" loop="$pagelist"}
						<li id="page_{$pagelist[pages].page_id}" class="posRel">
							<a {if $smarty.get.pageid eq $pagelist[pages].page_id}class="active"{elseif $smarty.get.pageid eq 0 and $smarty.section.pages.index eq 0}class="active"{/if} onclick="showPages('{$pagelist[pages].page_id}',0);"><img class="controlMidBg" src="{$SITE_BASEURL}/images/tablist.png" alt="tablist" title="tablist" /> <span>{$pagelist[pages].pagename}</span></a>
							<a class="pagePopDrop" onclick="showMapPopUp('dropdownpage_{$pagelist[pages].page_id}');">+</a>
							<div id="dropdownpage_{$pagelist[pages].page_id}" style="display:none;">
								<a class="addPageTabSec" onclick="addSubPageListing('{$pagelist[pages].page_id}','{$smarty.session.domain_id}');">{$LANG.main_sub_page} +</a>
								<ul id="sortablesubPage" class="pagelistUl">
									{$objCommon->pageListForDropDownList($pagelist[pages].page_id)}
									{section name="subpage" loop=$pagelistdropdown}
										<li id="page_{$pagelistdropdown[subpage].page_id}">
											<a {if $smarty.get.pageid eq $pagelistdropdown[subpage].page_id}class="active"{/if} onclick="showPages('{$pagelistdropdown[subpage].page_id}','{$pagelist[pages].page_id}');">{$pagelistdropdown[subpage].pagename}</a>
										</li>
									{/section}
								</ul>
							</div>
						</li>
						
					{/section}
				</ul>
			</div>
		</div>
		<div class="span6 mainRightSideToggle posRel marTop10">
            <div class="ajaxloadImg">
            <div class="ajaxloadImgInn">
            <div class="loadImg"><img src="{$SITE_BASEURL}/images/loading_circle.gif" alt="" title=""/></div>
            <div class="loadTxt">Loading...</div>
            </div>
            </div>
			<form name="addPage" method="post">
				<input type="hidden" name="page_parent_id" id="page_parent_id" value="{$pagefirstlist.0.page_parent_id}">
				<input type="hidden" name="pageid" id="pageid" value="{$pagefirstlist.0.page_id}">
                    <div id="sucs_page"></div>
					<div class="clearfix">
						<div class="subdomainLeft">{$LANG.page_name}</div>
						<div class="subdomainRight">
							<input type="text" class="PageMainRightTxtBx" name="page_name" id="page_name" value="{$pagefirstlist.0.pagename}">
						</div>
					</div>
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
					<div class="pagTabClickOuter" id="" style="{if $pagefirstlist.0.seo_title eq 'link'}display:none;{else}display:block;{/if}">
						<div class="pagTabClick subdomainLeft">{$LANG.advance_settings} <div class="pagTabClickArrowShow">[ Göster ]</div></div>
						<div class="pagTabShowHide">
							<div class="clearfix">
								<div class="subdomainRight">
									<div class="subdomainRightTitle">{$LANG.page_title}</div>
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
					<div id="external" style="{if $pagefirstlist.0.seo_title eq 'link'}display:block;{else}display:none;{/if}">
						<div id="domainv"></div>
						<div class="clearfix">
							<div class="subdomainLeft">{$LANG.external_site}</div>
							<div class="subdomainRight">
								<input type="text" class="PageMainRightTxtBx" name="link_site" id="link_site"  placeholder="http://example.com" value="{$pagefirstlist.0.link_site}">
							</div>
						</div>
						<div class="clearfix">
							<div class="subdomainRight marTop10">
								<input type="radio" class="PageMainRightTxtBx" name="link_status" id="link_status" value="same"{if $pagefirstlist.0.link_status eq 'same'}checked="checked"{/if}>Open Link In Same Tab
								<div class="clr"></div>
								<input type="radio" class="PageMainRightTxtBx" name="link_status" id="link_status1" value="new"{if $pagefirstlist.0.link_status eq 'new'}checked="checked"{/if}>Open Link In New Tab
								
							</div>
						</div>
					</div>
                     <!---banner need options start----->
                    <div class="clearfix" style="{if $pagefirstlist.0.seo_title eq 'link'}display:none;{else}display:block;{/if}">
                        <div class="subdomainLeft">Ana Slayt Gösterisi Bu Sayfada Gösterilsin Mi?</div>
        				<div class="subdomainRight">
                            <input type="radio" class="PageMainRightTxtBx" name="banner_status" id="banner_nec" value="need"{if $pagefirstlist.0.banner_status eq 'need'}checked="checked"{/if}>Evet
        					<input type="radio" class="PageMainRightTxtBx" name="banner_status" id="banner_nec1" value="no_need"{if $pagefirstlist.0.banner_status eq 'no_need'}checked="checked"{/if}>Hayır
           		        </div>
        			</div>
                    <!---banner need options end----->
					<div class="marTop10 clearfix">
						<input type="button" name="save" class="btn btn-success" value="{$LANG.save_edit}" onclick="validateLink();savePage({$smarty.session.domain_id});"/>
						<!--<input type="button" name="copy" class="btn" value="{$LANG.copy_page}" onclick="copyPage();">--> 
						 {if $pagefirstlist.0.main_page eq 'N'}
                        <input type="button" name="delete" class="btn btn-danger" value="{$LANG.delete_page}" onclick="deletePage({$smarty.session.domain_id});" /> 
                        {/if}
					</div> 
					<div class="spaceHei"></div>
			</form>
		</div>
	</div>
   
</div>
