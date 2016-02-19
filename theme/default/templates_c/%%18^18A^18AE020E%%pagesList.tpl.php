<?php /* Smarty version 2.6.3, created on 2015-12-10 18:44:46
         compiled from pagesList.tpl */ ?>
<div class="main_pagePage">
	<div class="main_arrowTop_page"></div>
	<div class="row-fluid">	
		<div class="mainLeftSideToggle">
			<div class="addPage dropdown clearfix">
				<a class="dropdown-toggle addPageTab" data-toggle="dropdown" onclick="showaddpagelist();"><?php echo $this->_tpl_vars['LANG']['add_page']; ?>
 +</a>
				<!--<a class="addPageTab" onclick="showaddpagelist();"><?php echo $this->_tpl_vars['LANG']['add_page']; ?>
 +</a>-->
				<span class="arrow"></span>
				<ul class="dropdown-menu addPageToggle">
					<li onclick="addPageForDomain();">Standart Sayfa</li>
					<li onclick="showExternalLink();">Harici Bağlantı</li>
				</ul>
				<!--<a class="addPageTab" onclick="addSubPageForDomain();"><?php echo $this->_tpl_vars['LANG']['main_sub_page']; ?>
 +</a>-->
			</div>
			<div class="mainLeftPageScroll nano">
				<ul class="menuUl marTop20 mainLeftPanelScrollActive contentNanoScroll LeftNone" id="sortablePage">
					<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=($this->_tpl_vars['pagelist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
						<li id="page_<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
" class="posRel">
							<a <?php if ($_GET['pageid'] == $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']): ?>class="active"<?php elseif ($_GET['pageid'] == 0 && $this->_sections['pages']['index'] == 0): ?>class="active"<?php endif; ?> onclick="showPages('<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
',0);"><img class="controlMidBg" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/tablist.png" alt="tablist" title="tablist" /> <span><?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['pagename']; ?>
</span></a>
							<a class="pagePopDrop" onclick="showMapPopUp('dropdownpage_<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
');">+</a>
							<div id="dropdownpage_<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
" style="display:none;">
								<a class="addPageTabSec" onclick="addSubPageListing('<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
','<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_sub_page']; ?>
 +</a>
								<ul id="sortablesubPage" class="pagelistUl">
									<?php echo $this->_tpl_vars['objCommon']->pageListForDropDownList($this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']); ?>

									<?php unset($this->_sections['subpage']);
$this->_sections['subpage']['name'] = 'subpage';
$this->_sections['subpage']['loop'] = is_array($_loop=$this->_tpl_vars['pagelistdropdown']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subpage']['show'] = true;
$this->_sections['subpage']['max'] = $this->_sections['subpage']['loop'];
$this->_sections['subpage']['step'] = 1;
$this->_sections['subpage']['start'] = $this->_sections['subpage']['step'] > 0 ? 0 : $this->_sections['subpage']['loop']-1;
if ($this->_sections['subpage']['show']) {
    $this->_sections['subpage']['total'] = $this->_sections['subpage']['loop'];
    if ($this->_sections['subpage']['total'] == 0)
        $this->_sections['subpage']['show'] = false;
} else
    $this->_sections['subpage']['total'] = 0;
if ($this->_sections['subpage']['show']):

            for ($this->_sections['subpage']['index'] = $this->_sections['subpage']['start'], $this->_sections['subpage']['iteration'] = 1;
                 $this->_sections['subpage']['iteration'] <= $this->_sections['subpage']['total'];
                 $this->_sections['subpage']['index'] += $this->_sections['subpage']['step'], $this->_sections['subpage']['iteration']++):
$this->_sections['subpage']['rownum'] = $this->_sections['subpage']['iteration'];
$this->_sections['subpage']['index_prev'] = $this->_sections['subpage']['index'] - $this->_sections['subpage']['step'];
$this->_sections['subpage']['index_next'] = $this->_sections['subpage']['index'] + $this->_sections['subpage']['step'];
$this->_sections['subpage']['first']      = ($this->_sections['subpage']['iteration'] == 1);
$this->_sections['subpage']['last']       = ($this->_sections['subpage']['iteration'] == $this->_sections['subpage']['total']);
?>
										<li id="page_<?php echo $this->_tpl_vars['pagelistdropdown'][$this->_sections['subpage']['index']]['page_id']; ?>
">
											<a <?php if ($_GET['pageid'] == $this->_tpl_vars['pagelistdropdown'][$this->_sections['subpage']['index']]['page_id']): ?>class="active"<?php endif; ?> onclick="showPages('<?php echo $this->_tpl_vars['pagelistdropdown'][$this->_sections['subpage']['index']]['page_id']; ?>
','<?php echo $this->_tpl_vars['pagelist'][$this->_sections['pages']['index']]['page_id']; ?>
');"><?php echo $this->_tpl_vars['pagelistdropdown'][$this->_sections['subpage']['index']]['pagename']; ?>
</a>
										</li>
									<?php endfor; endif; ?>
								</ul>
							</div>
						</li>
						
					<?php endfor; endif; ?>
				</ul>
			</div>
		</div>
		<div class="span6 mainRightSideToggle posRel marTop10">
            <div class="ajaxloadImg">
            <div class="ajaxloadImgInn">
            <div class="loadImg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loading_circle.gif" alt="" title=""/></div>
            <div class="loadTxt">Loading...</div>
            </div>
            </div>
			<form name="addPage" method="post">
				<input type="hidden" name="page_parent_id" id="page_parent_id" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['page_parent_id']; ?>
">
				<input type="hidden" name="pageid" id="pageid" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['page_id']; ?>
">
                    <div id="sucs_page"></div>
					<div class="clearfix">
						<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['page_name']; ?>
</div>
						<div class="subdomainRight">
							<input type="text" class="PageMainRightTxtBx" name="page_name" id="page_name" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['pagename']; ?>
">
						</div>
					</div>
				<!--<div class="marTop10 clearfix">
					<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['page_layout']; ?>
</div>
					<div class="subdomainRight">
						<div class="pageListHeader">
							<div class="tallHeader">
								<input type="radio" class="radio" name="page_layout" id="page_layout1" value="tall" <?php if ($this->_tpl_vars['pagefirstlist']['0']['page_layout'] == 'tall'): ?>checked<?php endif; ?>>
								<label for="page_layout1" class="txt1"><span class="navpageheaderBg"><?php echo $this->_tpl_vars['LANG']['tall_header']; ?>
</span></label>
							</div>
							<div class="shortHeader">
								<input type="radio" class="radio" name="page_layout" id="page_layout2" value="short" <?php if ($this->_tpl_vars['pagefirstlist']['0']['page_layout'] == 'short'): ?>checked<?php endif; ?>>
								<label for="page_layout2" class="txt1"><span class="navpageheaderBg"><?php echo $this->_tpl_vars['LANG']['short_header']; ?>
</span></label>
							</div>
							<div class="noHeader">
								<input type="radio" class="radio" name="page_layout" id="page_layout3" value="no_header" <?php if ($this->_tpl_vars['pagefirstlist']['0']['page_layout'] == 'no_header'): ?>checked<?php endif; ?>>
								<label for="page_layout3" class="txt1"><span class="navpageheaderBg"><?php echo $this->_tpl_vars['LANG']['no_header']; ?>
</span></label>
							</div>
							<div class="landingPage">
								<input type="radio" class="radio" name="page_layout" id="page_layout4" value="lan_page" <?php if ($this->_tpl_vars['pagefirstlist']['0']['page_layout'] == 'lan_page'): ?>checked<?php endif; ?>>
								<label for="page_layout4" class="txt1"><span class="navpageheaderBg"><?php echo $this->_tpl_vars['LANG']['landing_page']; ?>
</span></label>
							</div>
						</div>
						<div class="row-fluid">
							<label class="span6">
								<input type="checkbox" name="hide_navigation" id="hide_navigation" value="1" <?php if ($this->_tpl_vars['pagefirstlist']['0']['hide_navigation'] == '1'): ?>checked<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['hide_page']; ?>

							</label>
						</div>
					</div>
				</div>-->
					<div class="pagTabClickOuter" id="" style="<?php if ($this->_tpl_vars['pagefirstlist']['0']['seo_title'] == 'link'): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
						<div class="pagTabClick subdomainLeft"><?php echo $this->_tpl_vars['LANG']['advance_settings']; ?>
 <div class="pagTabClickArrowShow">[ Göster ]</div></div>
						<div class="pagTabShowHide">
							<div class="clearfix">
								<div class="subdomainRight">
									<div class="subdomainRightTitle"><?php echo $this->_tpl_vars['LANG']['page_title']; ?>
</div>
									<div class="clr"></div> 
									<input type="text" class="PageMainRightTxtBx marTop10" name="page_title" id="page_title" onkeyup="return checkpageTitle();"   value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['seo_title']; ?>
" placeholder="xxx-yyy or xxx only">
								</div>
							</div>
							<div class="marTop10 clearfix">
								<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['page_desc']; ?>
</div>
								<div class="subdomainRight">
									<input type="text" name="page_desc" class="PageMainRightTxtBx" id="page_desc" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['page_desc']; ?>
">
								</div>
							</div>
							<div class="marTop10 clearfix">
								<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['meta_key']; ?>
</div>
								<div class="subdomainRight">
									<input type="text" name="meta_key" class="PageMainRightTxtBx" id="meta_key" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['meta_key']; ?>
">
								</div>
							</div>
							<div class="marTop10 clearfix">
								<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['footer_code']; ?>
</div> 
								<div class="subdomainRight">
									<textarea name="footer_code" class="PageMainRightTxtBx hei100" id="footer_code"><?php echo $this->_tpl_vars['pagefirstlist']['0']['footer_code']; ?>
</textarea>
								</div>
							</div>
							<div class="marTop10 clearfix">
								<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['header_code']; ?>
</div>
								<div class="subdomainRight">
									<textarea name="header_code" class="PageMainRightTxtBx hei100" id="header_code"><?php echo $this->_tpl_vars['pagefirstlist']['0']['header_code']; ?>
</textarea>
								</div>
							</div>
						</div>
					</div>  
					<div id="external" style="<?php if ($this->_tpl_vars['pagefirstlist']['0']['seo_title'] == 'link'): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
						<div id="domainv"></div>
						<div class="clearfix">
							<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['external_site']; ?>
</div>
							<div class="subdomainRight">
								<input type="text" class="PageMainRightTxtBx" name="link_site" id="link_site"  placeholder="http://example.com" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['link_site']; ?>
">
							</div>
						</div>
						<div class="clearfix">
							<div class="subdomainRight marTop10">
								<input type="radio" class="PageMainRightTxtBx" name="link_status" id="link_status" value="same"<?php if ($this->_tpl_vars['pagefirstlist']['0']['link_status'] == 'same'): ?>checked="checked"<?php endif; ?>>Open Link In Same Tab
								<div class="clr"></div>
								<input type="radio" class="PageMainRightTxtBx" name="link_status" id="link_status1" value="new"<?php if ($this->_tpl_vars['pagefirstlist']['0']['link_status'] == 'new'): ?>checked="checked"<?php endif; ?>>Open Link In New Tab
								
							</div>
						</div>
					</div>
                     <!---banner need options start----->
                    <div class="clearfix" style="<?php if ($this->_tpl_vars['pagefirstlist']['0']['seo_title'] == 'link'): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
                        <div class="subdomainLeft">Ana Slayt Gösterisi Bu Sayfada Gösterilsin Mi?</div>
        				<div class="subdomainRight">
                            <input type="radio" class="PageMainRightTxtBx" name="banner_status" id="banner_nec" value="need"<?php if ($this->_tpl_vars['pagefirstlist']['0']['banner_status'] == 'need'): ?>checked="checked"<?php endif; ?>>Evet
        					<input type="radio" class="PageMainRightTxtBx" name="banner_status" id="banner_nec1" value="no_need"<?php if ($this->_tpl_vars['pagefirstlist']['0']['banner_status'] == 'no_need'): ?>checked="checked"<?php endif; ?>>Hayır
           		        </div>
        			</div>
                    <!---banner need options end----->
					<div class="marTop10 clearfix">
						<input type="button" name="save" class="btn btn-success" value="<?php echo $this->_tpl_vars['LANG']['save_edit']; ?>
" onclick="validateLink();savePage(<?php echo $_SESSION['domain_id']; ?>
);"/>
						<!--<input type="button" name="copy" class="btn" value="<?php echo $this->_tpl_vars['LANG']['copy_page']; ?>
" onclick="copyPage();">--> 
						 <?php if ($this->_tpl_vars['pagefirstlist']['0']['main_page'] == 'N'): ?>
                        <input type="button" name="delete" class="btn btn-danger" value="<?php echo $this->_tpl_vars['LANG']['delete_page']; ?>
" onclick="deletePage(<?php echo $_SESSION['domain_id']; ?>
);" /> 
                        <?php endif; ?>
					</div> 
					<div class="spaceHei"></div>
			</form>
		</div>
	</div>
   
</div>