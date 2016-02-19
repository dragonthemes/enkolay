<?php /* Smarty version 2.6.3, created on 2015-12-09 11:31:19
         compiled from mainpage.tpl */ ?>
<div class="row-fluid relatediv">
	<div class="toppanel">
	<?php if ($this->_tpl_vars['req_file_name'] == 'main.php'): ?>
		<div class="<?php if ($this->_tpl_vars['req_file_name'] == 'index.php'): ?>header<?php endif;  if ($this->_tpl_vars['req_file_name'] != 'index.php'): ?>headerSec<?php endif; ?>">
			<div class="<?php if ($this->_tpl_vars['req_file_name'] == 'index.php'): ?>container<?php endif;  if ($this->_tpl_vars['req_file_name'] != 'index.php'): ?>containerSec<?php endif; ?>">
				<div class="TopMenuNav clearfix">
					<?php if ($this->_tpl_vars['req_file_name'] != 'index.php'): ?>
						<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
" class="logoSec <?php if ($this->_tpl_vars['req_file_name'] != 'main.php' && $this->_tpl_vars['req_file_name'] != 'onboarding.php'): ?>marLefUserHome <?php endif; ?>">
							<img src="<?php echo $this->_tpl_vars['SITE_LOGO']; ?>
" alt="logo" title="" />
						</a>
					<?php endif; ?>
					<ul class="nav row unstyled TopMenuNavListSec <?php if ($this->_tpl_vars['req_file_name'] != 'index.php'): ?> <?php endif; ?>">
						<?php if ($this->_tpl_vars['req_file_name'] == 'index.php'): ?>
							<li class="rightLine borNone">
								<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/right-line.png" alt="right-line" title="" />
							</li>
						<?php endif; ?>
						
					<?php if (! $_SESSION['user_id']): ?>
						
					<?php else: ?>
							
						<?php if ($this->_tpl_vars['req_file_name'] == 'main.php'): ?>
							<li class="main_rightNav_opt"><a class="navListtop optListMar optionslist" onclick="commonTop('topoptions');"><span class="fa fa-bars"></span></a></li>
							<li class="main_rightNav_pub"><a class="navListtop"  id="_publishPop" onclick="publishPage('<?php echo $_SESSION['domain_id']; ?>
'); $('#publishPopup').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['header_publish']; ?>
</a></li>
							<?php if ($this->_tpl_vars['settingpage']['0']['payment_status'] == 'No' || $this->_tpl_vars['settingpage']['0']['payment_status'] == ''): ?>
							  <li class="main_rightNav_buy"><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>subscription/<?php echo $_SESSION['domain_id']; ?>
/invoice<?php else: ?>subscription.php?domain_id=<?php echo $_SESSION['domain_id']; ?>
&inv=invoice<?php endif; ?>">SATIN AL</a></li>
							<?php endif; ?>	
							<li><a class="navListtop" id="showTop" onclick="commonToogle('settingpage');showSettingPage('<?php echo $_SESSION['domain_id']; ?>
');"><span class="arrow marLft50"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/headerottArrow.png" alt="headerottArrow" title="" /></span> <?php echo $this->_tpl_vars['LANG']['header_settings']; ?>
</a></li>
							<li><a class="navListtop mainPageTogg" onclick="showPages('0');"><span class="arrow"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/headerottArrow.png" alt="headerottArrow" title="" /></span> <?php echo $this->_tpl_vars['LANG']['header_pages']; ?>
</a></li>
							<li><a class="navListtop" id="siteTitleAndAllChanges" onclick="showBuildPages('<?php echo $_SESSION['domain_id']; ?>
');showDesign();"><span class="arrow"><img class="marLft20" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/headerottArrow.png" alt="headerottArrow" title="" /></span> <?php echo $this->_tpl_vars['LANG']['header_design']; ?>
</a></li>
							<li class="headerNavBorLft"><a class="navListtop active"  onclick="showBuildPages('<?php echo $_SESSION['domain_id']; ?>
');"><span class="arrow"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/headerottArrow.png" alt="headerottArrow" title="" /></span> <?php echo $this->_tpl_vars['LANG']['header_build']; ?>
</a></li>
						<?php endif; ?>	
							
					<?php endif; ?>	
						
					</ul>
					
				</div>
			</div>
		</div>
		<div id="topoptions" style="display:none">
			<li><a onclick="FullSreeen();"><?php echo $this->_tpl_vars['LANG']['header_opt_full']; ?>
</a></li>
			<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>userhome<?php else: ?>userHome.php<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_opt_mysite']; ?>
</a></li>
			<li><a href=""><?php echo $this->_tpl_vars['LANG']['header_opt_stats']; ?>
</a></li>
			<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>myhome<?php else: ?>MyHome.php<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_opt_domain']; ?>
</a></li>
			<li><a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>userhome<?php else: ?>userHome.php<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['header_opt_exiteditor']; ?>
</a></li>
		</div>
	<?php endif; ?>
        <?php if ($_SESSION['domain_id']): ?>
		<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($_SESSION['domain_id'],'backgroundimage'); ?>

		<?php echo $this->_tpl_vars['objCommon']->getBannerEnable($_SESSION['domain_id']); ?>

        <?php echo $this->_tpl_vars['objCommon']->getBacgroundColor_status(); ?>

       	<?php endif; ?>
			<!--<span class="hidebg"></span>-->
		<div class="mainLeftPanel clearfix overhidden">
			<ul class="mainLeftPanelUl clearfix" id="toolssection">
				<li>
					<a class="mainTabNav basicnav active" href="javascript:void(0);" id="basic_section">
						<span class="inlineblock"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" /></span><span class="inlineblock">Temel</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="more_section">
						<span class="inlineblock"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/social-icons2.png" alt="social" title="social" /></span><span class="inlineblock">Sosyal</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="media_section">
						<span class="inlineblock"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/media2.png" alt="media2" title="media2" /></span><span class="inlineblock">Medya</span>
					</a>
				</li>
				<li>
					<a class="mainTabNav" href="javascript:void(0);" id="structure_section">
						<span class="inlineblock"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/structure2.png" alt="structure2" title="structure2" /></span><span class="inlineblock">Yapı</span>
					</a>
				</li>			
			</ul>
			<ul class="mainLeftPanelUl clearfix" id="draggable_content"> 
				<li class="mainLeftPanelScroll toolone basictool toolsectioncontent" id="basic_section_content">					
					<ul class="mainLeftPanelUlContent basictab">
						<li class="sectioncontent">
							<ul class="clearfix leftuldiv mainLeftPanelScrollActive">
								<li class="dragableBox listbox slide" id="box1" data-title="box1">
									<div class="outerToolwrap">
									<span class="dc"><span class="titleimgclass bgicon"></span></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_title']; ?>
</span></div>
									</div>
								</li>
								<li class="dragableBox listbox" id="box2" data-title="box2"><div class="outerToolwrap"><span class="paraimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_paragraph']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box3" data-title="box3"><div class="outerToolwrap"><span class="imgtxtimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_image_plus_text']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box4" data-title="box4"><div class="outerToolwrap"><span class="sinimimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_image']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box5" data-title="box5"><div class="outerToolwrap"><span class="cntfrmimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_contact_form']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box9" data-title="box9"><div class="outerToolwrap"><span class="galleryimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_gallery']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box10" data-title="box10"><div class="outerToolwrap"><span class="mapimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_map']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box11" data-title="box11"><div class="outerToolwrap"><span class="slideimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_slider']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box13" data-title="box13"><div class="outerToolwrap"><span class="columnimgclass bgicon"></span><div class="title-box"><span class="title">SÜTUN</span></div></div></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="mainLeftPanelScroll tooltwo socialtool toolsectioncontent" id="more_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
								<ul class="clearfix leftuldiv">
									<li class="dragableBox listbox" id="box8" data-title="box8"><div class="outerToolwrap"><span class="socialimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_social_icons']; ?>
</span></div></div></li>
									<li class="dragableBox listbox" id="box16" data-title="box16"><div class="outerToolwrap"><span class="socialimgclass bgicon"></span><div class="title-box"><span class="title">Image & Text Columns</span></div></div></li>
								</ul>
								<div style="clear:both"></div>
							</li>
					</ul>
				</li>
				
				<li class="mainLeftPanelScroll tooltwo mediatool toolsectioncontent" id="media_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
							<ul class="clearfix leftuldiv">
								<li class="dragableBox listbox" id="box7" data-title="box7"><div class="outerToolwrap"><span class="utubeimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_youtube']; ?>
</span></div></div></li>
								<li class="dragableBox listbox" id="box14" data-title="box14"><div class="outerToolwrap"><span class="fileiconclass bgicon"></span><div class="title-box"><span class="title">DOSYA</span></div></div></li>
								<li class="dragableBox listbox" id="box12" data-title="box12"><div class="outerToolwrap"><span class="addonimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_google_adsense']; ?>
</span></div></div></li>								
								<!--<li class="dragableBox listbox" id="box15" data-title="box15"><div class="outerToolwrap"><span class="documenticonclass bgicon"></span><div class="title-box"><span class="title">Document</span></div></div></li>-->
							</ul>
							<div style="clear:both"></div>
						</li>
					</ul>
				</li>
				<li class="mainLeftPanelScroll tooltwo structuretool toolsectioncontent" id="structure_section_content" style="display:none;">
					
					<ul class="mainLeftPanelUlContent othertab">
						<li class="sectioncontent">
								<ul class="clearfix leftuldiv">
									<li class="dragableBox listbox" id="box6" data-title="box6"><div class="outerToolwrap"><span class="dividerimgclass bgicon"></span><div class="title-box"><span class="title"><?php echo $this->_tpl_vars['LANG']['main_page_divider']; ?>
</span></div></div></li>
								</ul>
								<div style="clear:both"></div>
							</li>
					</ul>
				</li>				
			</ul>
			<div id="designleft" style="display:none;">
				<div class="maindesignleftDiv">
					<div class="headerNav">
						<h3 class="mainTabNav active">
							<span class="arrow"></span>
							<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" />
							<br/>
							<?php echo $this->_tpl_vars['LANG']['main_page_design']; ?>

						</h3>
					</div>
					<div class="selectTheme widAuto clearfix">
						<button id="change-theme-button" class="mainleftthemeAlign" onclick="$('#themelist').show();$('#build').hide();">
							<i class="fa fa-copy"></i> <br />
							<?php echo $this->_tpl_vars['LANG']['main_page_change_theme']; ?>

						</button>
						<button id="change-fonts-button" class="mainleftthemeAlign">
							<i class="fa fa-font"></i>  <br />
							<?php echo $this->_tpl_vars['LANG']['main_page_change_font']; ?>

						</button>
						<button id="change-back-button" class="mainleftthemeAlign">
							<i class="fa fa-picture-o"></i>  <br />
							<?php echo $this->_tpl_vars['LANG']['main_page_change_background']; ?>

						</button>
					</div>
				</div>
				
				<div class="maindesignleftChange" style="display:none;">
					<div class="selectTheme no-mar clearfix">
						<input type="hidden" name="fontchange" id="fontchange" value="">
						<div class="selectlist">
							<h3 class="fontlistdivHead marLftmin60 active">
								<span class="arrow"></span>
								<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" />
								<br/>
								<?php echo $this->_tpl_vars['LANG']['main_page_select_options']; ?>
<a class="fontback">GERİ</a>
							</h3>
							<ul class="nav">
								<li id="site_title">
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_site_title']; ?>

								</li>
								<li id="nav_menu">
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_page_navigation_menu']; ?>

								</li>
								<li id="main_headline">
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_page_headline']; ?>

								</li>
								<li id="main_title">
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_page_title']; ?>

								</li>
								<li id="main_paragraph">
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_page_paragraph']; ?>

								</li>
								<li id="main_imagetitle">	
									<i class="fa fa-copy"></i> <br />
									<?php echo $this->_tpl_vars['LANG']['main_page_image_captions']; ?>

								</li>
							</ul>	
						</div>						
						<div class="fontlistdiv fontlistdivSel" style="display:none;">
							<h3 class="fontlistdivHead marLftmin60 active">
								<span class="arrow"></span>
								<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" />
								<br/>
								<?php echo $this->_tpl_vars['LANG']['main_page_select_font_family']; ?>
<a class="fontback">GERİ</a>
							</h3>
							<div class="mainLeftPanelScrollNew">
								<div class="nav fontfamily fontlistdivInn">
									<ul class="nav fontfamily fontScrollUl">
										<?php unset($this->_sections['fontdetails']);
$this->_sections['fontdetails']['name'] = 'fontdetails';
$this->_sections['fontdetails']['loop'] = is_array($_loop=$this->_tpl_vars['fontlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fontdetails']['show'] = true;
$this->_sections['fontdetails']['max'] = $this->_sections['fontdetails']['loop'];
$this->_sections['fontdetails']['step'] = 1;
$this->_sections['fontdetails']['start'] = $this->_sections['fontdetails']['step'] > 0 ? 0 : $this->_sections['fontdetails']['loop']-1;
if ($this->_sections['fontdetails']['show']) {
    $this->_sections['fontdetails']['total'] = $this->_sections['fontdetails']['loop'];
    if ($this->_sections['fontdetails']['total'] == 0)
        $this->_sections['fontdetails']['show'] = false;
} else
    $this->_sections['fontdetails']['total'] = 0;
if ($this->_sections['fontdetails']['show']):

            for ($this->_sections['fontdetails']['index'] = $this->_sections['fontdetails']['start'], $this->_sections['fontdetails']['iteration'] = 1;
                 $this->_sections['fontdetails']['iteration'] <= $this->_sections['fontdetails']['total'];
                 $this->_sections['fontdetails']['index'] += $this->_sections['fontdetails']['step'], $this->_sections['fontdetails']['iteration']++):
$this->_sections['fontdetails']['rownum'] = $this->_sections['fontdetails']['iteration'];
$this->_sections['fontdetails']['index_prev'] = $this->_sections['fontdetails']['index'] - $this->_sections['fontdetails']['step'];
$this->_sections['fontdetails']['index_next'] = $this->_sections['fontdetails']['index'] + $this->_sections['fontdetails']['step'];
$this->_sections['fontdetails']['first']      = ($this->_sections['fontdetails']['iteration'] == 1);
$this->_sections['fontdetails']['last']       = ($this->_sections['fontdetails']['iteration'] == $this->_sections['fontdetails']['total']);
?>
											<li style="font-family:<?php echo $this->_tpl_vars['fontlist'][$this->_sections['fontdetails']['index']]['font_name']; ?>
;"><?php echo $this->_tpl_vars['fontlist'][$this->_sections['fontdetails']['index']]['font_name']; ?>
</li>
										<?php endfor; endif; ?>
									</ul>
								</div>
							</div>
							<h3 class="fontlistdivHead active">
								<span class="arrow"></span>
								<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" />
								<br/>
								<?php echo $this->_tpl_vars['LANG']['main_page_select_font_size']; ?>

							</h3>
							<div class="fontSizeModify clearfix">
								<span class="plusminusfont decreasefont"><i class="fa fa-minus-circle"></i></span>
								<input type="text" class="inputfont" value="20" />
								<span class="plusminusfont increasefont"><i class="fa fa-plus-circle"></i></span>
							</div>	
							<h3 class="fontlistdivHead active lineht">
								<span class="arrow"></span>
								<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/basic.png" alt="basic" title="basic" />
								<br/>
								Select Line Height
							</h3>
							<div class="fontSizeModify clearfix lineht">
								<span class="plusminusfont decreaselineht"><i class="fa fa-minus-circle"></i></span>
								<input type="text" class="inputlineht" value="20" />
								<span class="plusminusfont increaselineht"><i class="fa fa-plus-circle"></i></span>
							</div>						
						</div>
					</div>
				</div>
			</div>
			<div class="bgmaskTop"></div>
		</div>	
		</div>	
			
	
		<div class="mainRightPanel">
		<div class="container">
						<div id="themelist" style="display:none;">
						<?php if ($_SESSION['themeOnuse']): ?>
						<div id="themeselection" class="themeselectionOuter chooseDomainPop container">
							<div class="ChooseThemeTxt"><?php echo $this->_tpl_vars['LANG']['main_page_choose_a_theme']; ?>
 </div>
							<div id="sucess_disp"></div>
							<div class="row-fluid marTop40">
								<?php unset($this->_sections['themedetails']);
$this->_sections['themedetails']['name'] = 'themedetails';
$this->_sections['themedetails']['loop'] = is_array($_loop=$this->_tpl_vars['themeval']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['themedetails']['show'] = true;
$this->_sections['themedetails']['max'] = $this->_sections['themedetails']['loop'];
$this->_sections['themedetails']['step'] = 1;
$this->_sections['themedetails']['start'] = $this->_sections['themedetails']['step'] > 0 ? 0 : $this->_sections['themedetails']['loop']-1;
if ($this->_sections['themedetails']['show']) {
    $this->_sections['themedetails']['total'] = $this->_sections['themedetails']['loop'];
    if ($this->_sections['themedetails']['total'] == 0)
        $this->_sections['themedetails']['show'] = false;
} else
    $this->_sections['themedetails']['total'] = 0;
if ($this->_sections['themedetails']['show']):

            for ($this->_sections['themedetails']['index'] = $this->_sections['themedetails']['start'], $this->_sections['themedetails']['iteration'] = 1;
                 $this->_sections['themedetails']['iteration'] <= $this->_sections['themedetails']['total'];
                 $this->_sections['themedetails']['index'] += $this->_sections['themedetails']['step'], $this->_sections['themedetails']['iteration']++):
$this->_sections['themedetails']['rownum'] = $this->_sections['themedetails']['iteration'];
$this->_sections['themedetails']['index_prev'] = $this->_sections['themedetails']['index'] - $this->_sections['themedetails']['step'];
$this->_sections['themedetails']['index_next'] = $this->_sections['themedetails']['index'] + $this->_sections['themedetails']['step'];
$this->_sections['themedetails']['first']      = ($this->_sections['themedetails']['iteration'] == 1);
$this->_sections['themedetails']['last']       = ($this->_sections['themedetails']['iteration'] == $this->_sections['themedetails']['total']);
?>
									<div class="<?php if ($this->_sections['themedetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif;  if ($_SESSION['themename'] == $this->_tpl_vars['objCommon']->getThemeNameForActive($this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id'])): ?> active<?php endif; ?>">
										<div class="themeBg">
											<div id="themeimgrep_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" title="<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_name']; ?>
">
												<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_image']; ?>
" alt="<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_name']; ?>
" />
											</div>
											<div class="themeMenu">	
												<div class="row-fluid">
													<ul class="theme-colors span7" id="color_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
">
														<li id="blue_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" style="background-color:#107db5" data-color="blue" class="active" onclick="changeThemeImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_image']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','blue_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
');"></li>
														<?php if ($this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['red_theme_image']): ?>
															<li id="red_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" style="background-color:#e50d0e" data-color="red" onclick="changeThemeImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['red_theme_image']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','red_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['green_theme_image']): ?>
															<li id="green_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" style="background-color:#8fb81e" data-color="green" onclick="changeThemeImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['green_theme_image']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','green_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['orange_theme_image']): ?>
															<li id="orange_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" style="background-color:#f27e0d" data-color="orange" onclick="changeThemeImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['orange_theme_image']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','orange_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['violet_theme_image']): ?>
															<li id="violet_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
" style="background-color:#b812be" data-color="pink" onclick="changeThemeImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['violet_theme_image']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','violet_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
');"></li>
														<?php endif; ?>
													</ul>
													<a class="btn btn-success pull-right marRht10" onclick="updateTheme('<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_name']; ?>
','<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_choose']; ?>
</a>
												</div>
											</div>
										</div>
									</div>
								<?php endfor; endif; ?>	
							</div>
						</div> 	
						<?php endif; ?>
						<?php if ($_SESSION['blogonuse']): ?>
						<div id="blogthemeselection" class="chooseDomainPop">
							<div class="ChooseThemeTxt"><?php echo $this->_tpl_vars['LANG']['main_page_choose_a_theme']; ?>
 </div>
								
								<div class="row-fluid marTop20">
									<?php unset($this->_sections['blogdetails']);
$this->_sections['blogdetails']['name'] = 'blogdetails';
$this->_sections['blogdetails']['loop'] = is_array($_loop=$this->_tpl_vars['blogval']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blogdetails']['show'] = true;
$this->_sections['blogdetails']['max'] = $this->_sections['blogdetails']['loop'];
$this->_sections['blogdetails']['step'] = 1;
$this->_sections['blogdetails']['start'] = $this->_sections['blogdetails']['step'] > 0 ? 0 : $this->_sections['blogdetails']['loop']-1;
if ($this->_sections['blogdetails']['show']) {
    $this->_sections['blogdetails']['total'] = $this->_sections['blogdetails']['loop'];
    if ($this->_sections['blogdetails']['total'] == 0)
        $this->_sections['blogdetails']['show'] = false;
} else
    $this->_sections['blogdetails']['total'] = 0;
if ($this->_sections['blogdetails']['show']):

            for ($this->_sections['blogdetails']['index'] = $this->_sections['blogdetails']['start'], $this->_sections['blogdetails']['iteration'] = 1;
                 $this->_sections['blogdetails']['iteration'] <= $this->_sections['blogdetails']['total'];
                 $this->_sections['blogdetails']['index'] += $this->_sections['blogdetails']['step'], $this->_sections['blogdetails']['iteration']++):
$this->_sections['blogdetails']['rownum'] = $this->_sections['blogdetails']['iteration'];
$this->_sections['blogdetails']['index_prev'] = $this->_sections['blogdetails']['index'] - $this->_sections['blogdetails']['step'];
$this->_sections['blogdetails']['index_next'] = $this->_sections['blogdetails']['index'] + $this->_sections['blogdetails']['step'];
$this->_sections['blogdetails']['first']      = ($this->_sections['blogdetails']['iteration'] == 1);
$this->_sections['blogdetails']['last']       = ($this->_sections['blogdetails']['iteration'] == $this->_sections['blogdetails']['total']);
?>
										<div class="<?php if ($this->_sections['blogdetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif;  if ($_SESSION['themename'] == $this->_tpl_vars['objCommon']->getBlogNameForActive($this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id'])): ?> active<?php endif; ?>">
											<div class="themeBg">
											   <div id="blogimgrep_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
">
													<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_image']; ?>
" alt="<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_name']; ?>
" />			</div>
												<div class="themeMenu">
													<div class="row-fluid">
														<ul class="theme-colors span7" id="blogcolor_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
">
															<li style="background-color:#107db5" data-color="blue" id="blogblue_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
" class="active" onclick="changeBlogImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_image']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','blogblue_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
');"></li>
															<?php if ($this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['red_blog_image']): ?>
																<li style="background-color:#e50d0e" data-color="red" id="blogred_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
" onclick="changeBlogImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['red_blog_image']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','blogred_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
');"></li>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['green_blog_image']): ?>
																<li style="background-color:#8fb81e" data-color="green" id="bloggreen_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
" onclick="changeBlogImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['green_blog_image']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','bloggreen_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
');"></li>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['orange_blog_image']): ?>
																<li style="background-color:#f27e0d" data-color="orange" id="blogorange_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
" onclick="changeBlogImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['orange_blog_image']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','blogorange_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
');"></li>
															<?php endif; ?>
															<?php if ($this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['violet_blog_image']): ?>
																<li style="background-color:#b812be" data-color="pink" id="blogviolet_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
" onclick="changeBlogImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['violet_blog_image']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','blogviolet_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
');"></li>
															<?php endif; ?>
														</ul>
														<a class="btn btn-success pull-right marRht10" onclick="updateBlog('<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_name']; ?>
','<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_choose']; ?>
</a>
													</div>
												</div>
											</div>
										</div>
									<?php endfor; endif; ?>	
								</div>
													</div>
					<?php endif; ?>
					<?php if ($_SESSION['storeonuse']): ?>
					<div id="storethemeselection" class="chooseDomainPop">
						<div class="ChooseThemeTxt"><?php echo $this->_tpl_vars['LANG']['main_page_choose_a_theme']; ?>
 </div>
							
							<div class="row-fluid marTop20">
							<?php unset($this->_sections['storedetails']);
$this->_sections['storedetails']['name'] = 'storedetails';
$this->_sections['storedetails']['loop'] = is_array($_loop=$this->_tpl_vars['storeval']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['storedetails']['show'] = true;
$this->_sections['storedetails']['max'] = $this->_sections['storedetails']['loop'];
$this->_sections['storedetails']['step'] = 1;
$this->_sections['storedetails']['start'] = $this->_sections['storedetails']['step'] > 0 ? 0 : $this->_sections['storedetails']['loop']-1;
if ($this->_sections['storedetails']['show']) {
    $this->_sections['storedetails']['total'] = $this->_sections['storedetails']['loop'];
    if ($this->_sections['storedetails']['total'] == 0)
        $this->_sections['storedetails']['show'] = false;
} else
    $this->_sections['storedetails']['total'] = 0;
if ($this->_sections['storedetails']['show']):

            for ($this->_sections['storedetails']['index'] = $this->_sections['storedetails']['start'], $this->_sections['storedetails']['iteration'] = 1;
                 $this->_sections['storedetails']['iteration'] <= $this->_sections['storedetails']['total'];
                 $this->_sections['storedetails']['index'] += $this->_sections['storedetails']['step'], $this->_sections['storedetails']['iteration']++):
$this->_sections['storedetails']['rownum'] = $this->_sections['storedetails']['iteration'];
$this->_sections['storedetails']['index_prev'] = $this->_sections['storedetails']['index'] - $this->_sections['storedetails']['step'];
$this->_sections['storedetails']['index_next'] = $this->_sections['storedetails']['index'] + $this->_sections['storedetails']['step'];
$this->_sections['storedetails']['first']      = ($this->_sections['storedetails']['iteration'] == 1);
$this->_sections['storedetails']['last']       = ($this->_sections['storedetails']['iteration'] == $this->_sections['storedetails']['total']);
?>
									<div class="<?php if ($this->_sections['storedetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif;  if ($_SESSION['themename'] == $this->_tpl_vars['objCommon']->getStoreNameForActive($this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id'])): ?> active<?php endif; ?>">
										<div class="themeBg">
										   <div id="storeimgrep_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
">
												<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_image']; ?>
">									  
											</div>
											<div class="themeMenu">	
												<div class="row-fluid">
													<ul class="theme-colors span7" id="storecolor_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
">
														<li style="background-color:#107db5" data-color="blue" id="storeblue_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
" class="active" onclick="changeStoreImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_image']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','storeblue_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
');"></li>
														<?php if ($this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['red_store_image']): ?>
															<li style="background-color:#e50d0e" data-color="red" id="storered_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
" onclick="changeStoreImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['red_store_image']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','storered_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['green_store_image']): ?>
															<li style="background-color:#8fb81e" data-color="green" id="storegreen_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
" onclick="changeStoreImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['green_store_image']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','storegreen_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['orange_store_image']): ?>
															<li style="background-color:#f27e0d" data-color="orange" id="storeorange_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
" onclick="changeStoreImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['orange_store_image']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','storeorange_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
');"></li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['violet_store_image']): ?>
															<li style="background-color:#b812be" data-color="pink" id="storeviolet_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
" onclick="changeStoreImage('<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_store/<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['violet_store_image']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','storeviolet_<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
');"></li>
														<?php endif; ?>
													</ul>
													<a class="btn btn-success pull-right marRht10" onclick="updateStore('<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_name']; ?>
','<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_choose']; ?>
</a>
												</div>
											</div>
										</div>
										<!--<div class="themeMenuDescript"><?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_description']; ?>
</div>-->
									</div>
								<?php endfor; endif; ?>	
									</div>
													</div>
					<?php endif; ?>
				</div>
						</div>
					<div id="settingpage" class="main_settingpage main_settingpageTab" style="display:none">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'settingsPageReplace.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
				
		<div class="clearfix mainRightPanelInner mainRightPanelInnerSec">
			
			<div id="pages">
			
			</div>
			<div id="build" class="posRel">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['pagelistpath'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			
			<!----Publish the site---->
				
						<div id="modals">
				<div id="myModal" class="modal hide" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" style="display: none;">
					<div class="domainChangeOne">
						<div class="domainOuterHead">
							<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Www.png" alt="domain" title="domain" />
							<div>WEB SİTENİZİN ADRESİNİ SEÇİN</div>
						</div>
						<div class="chooseDomainPop">
														<div id="sucess_disp"></div>
								<div id="error_msg"></div>
												<div class="notify"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/notification.png" alt="notification" title="notification" /><span><?php echo $this->_tpl_vars['LANG']['main_chose_reverse']; ?>
</span></div>
						<!--	<div class="head"><?php echo $this->_tpl_vars['LANG']['main_choose_subdomain']; ?>
</div>
							<div class="webstart"><?php echo $this->_tpl_vars['LANG']['main_website_started']; ?>
</div>-->
							<div class="chooseDomainInner">
								<form name="domainform" class="chooseDomainInnerForm" id="domainform" method="post" action="javascript:void(0);" onsubmit="AddSubDomain();">
									<input type="hidden" name="popupuse" id="popupuse" value="<?php echo $_SESSION['popuponuse']; ?>
"/>
									<?php if (! empty ( $this->_tpl_vars['themelist']['0']['theme_id'] )): ?>
										<?php if ($this->_tpl_vars['themelist']['0']['theme_id'] != '0'): ?>
											<input type="hidden" name="id_theme" id="id_theme" value="<?php echo $this->_tpl_vars['themelist']['0']['theme_id']; ?>
"/>
										<?php endif; ?>
									<?php endif; ?>
									<?php if (! empty ( $this->_tpl_vars['bloglist']['0']['blog_id'] )): ?>
										<?php if ($this->_tpl_vars['bloglist']['0']['blog_id'] != '0'): ?>	
											<input type="hidden" name="id_blog" id="id_blog" value="<?php echo $this->_tpl_vars['bloglist']['0']['blog_id']; ?>
"/>
										<?php endif; ?>	
									<?php endif; ?>
									<?php if (! empty ( $this->_tpl_vars['storelist']['0']['store_id'] )): ?>
										<?php if ($this->_tpl_vars['storelist']['0']['store_id'] != '0'): ?>	
											<input type="hidden" name="id_store" id="id_store" value="<?php echo $this->_tpl_vars['storelist']['0']['store_id']; ?>
"/>
										<?php endif; ?>	
									<?php endif; ?>
									<div class="chooseDomainSubdomain">
										<div class="chooseDomainSubdomainTop"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
 altında yer alacak bir alan adı seçin</div>
										<div class="chooseDomainSubdomainBott">Web sitenize hemen başlamak için en güzel yol</div>
										<input type="radio" name="domain" id="sub_domain" checked="checked" style="display:none;"/><?php echo $this->_tpl_vars['LANG']['main_http']; ?>
 <input type="text" id="domain_name" name="domainname"  value="" placeholder="örnek: guzelsitem12" onkeyup="checkDomainValidation();"/><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>

									</div>
																	<div class="clearfix">
										<input type="submit" class="saveButtonInput" name="setting_domain_submit" id="setting_domain_submit" value="<?php echo $this->_tpl_vars['LANG']['main_continue']; ?>
" />
									</div>											
								</form>
							</div>
						</div>
				</div>
                <div class="domainChangeTwo" style="display:none;">
						<div class="domainOuterHead">
							<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Www.png" alt="domain" title="domain" />
							<div>WEB SİTENİZİN ADRESİNİ SEÇİN</div>
						</div>
						<div class="clearfix">
							<div class="chooseDomainPop">
								<div class="chooseDomainInner chooseDomainInnerSec">
									<div class="para">To set up your domain with <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
, your domain's DNS settings need to be updated.</div>
									<div class="option"><b>Option A:</b> Email instructions to your domain registrar</div>
									<div class="inst">Send these instructions to your domain registrar (ex. GoDaddy, 1and1, Yahoo, etc.)</div>
									<div class="chooseDomainPopTxtarea">
										<p>Hello, I have purchased my domain <span id="youdomainurl"></span> from you.  I have built my website on <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
.  I need you to point my domain to the following IP: <?php echo $_SERVER['SERVER_ADDR']; ?>
</p>
										<p>This is done by changing my domain's A-Records. I am not requesting that you transfer my domain, redirect my domain, or change my name servers.  I want to remain with you as my domain registrar.</p>
									</div>
									<div class="option"><b>Option B:</b> Make the DNS changes yourself see instructions</div>
									<div class="para">Once the DNS changes are made, it may take up to 48 hours (although usually less) for the changes to propagate through the Internet</div>
									<div class="dc">
										<input type="button" class="subdomainInput" value="<?php echo $this->_tpl_vars['LANG']['main_continue']; ?>
" onclick="redirectnew();" />
									</div>
								</div>            
							</div>
						</div>
					</div>
                </div>
			</div>
			<div class="modalPopBg"></div>
	
					</div>
	</div>
</div>
<div id="modals">
    <div id="banner_slide_images_popup" class="sliderPopCont modal hide">
    	<div class="youtubepopclose close" data-dismiss="modal"></div>
    	<div class="sliderPopupHead no_textindent">ARKAPLAN <a onclick="SaveBackgroundChanges();" class="savetobg">Kaydet</a></div>
        <input type="hidden" id="uploadtype" />
    	<div class="row-fluid">
    		<div class="span12 offset0">
    			<div class="bgTitle">Arkaplan Resmi</div>
			<div class="row-fluid">
				<div class="span12 slidePopRhtScroll backgroundpadding offset0">
					<div class="bgChangOnOff bannerswitch">
						<div class="button pull-left">
							<a onclick="changeBackgroundEnable('<?php echo $_SESSION['domain_id']; ?>
',this);" data-val="OFF" data-back="img" class="backstatus <?php if ($this->_tpl_vars['banner_config'] == '0' || $this->_tpl_vars['default_switch'] == 'Y'): ?>active<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['main_page_off']; ?>
</a>
							<a onclick="changeBackgroundEnable('<?php echo $_SESSION['domain_id']; ?>
',this);" data-val="ON" data-back="img" class="backstatus <?php if ($this->_tpl_vars['banner_config'] == '1' && $this->_tpl_vars['default_switch'] == 'N'): ?>active<?php endif; ?>"><?php echo $this->_tpl_vars['LANG']['main_page_on']; ?>
</a>
						</div>
					</div>
					<div class="imagepreviewBG clearfix">
						<label class="bglabel selectbgimage">Resim Önizlemesi :</label><span id="background_img"  class="bgboximage"><img <?php if ($this->_tpl_vars['logoimages'] == ''): ?> src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/no-image.png"<?php else: ?>src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
"<?php endif; ?> id="backimg" style="height:50px;width:100px"  /></span>
					</div>
					<div class="clearfix"></div>
					<div id="background_imageLibrary" class="clearfix library_content">
						<ul>
							<li><a href="#my_computer">Bilgisayarım</a></li>
							<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
						</ul>
						<div id="my_computer" class="clearfix">
                            <div class="backgroundLibrary">
                            <div id='imageloadstatus' style='display:none'>
                                                  <div class="laodImgChange"> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Yükleniyor...."/> </div>
                                             </div>
                            </div>
							<form id="imagebackground" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
								<label for="file" class="input input-file" style="display:block" name="imageloadbutton">
									<div class="button">
										<input type="file" value="" name="photos[]" onchange="openFile(event);" id="backgroundimg1" />
										Yeni Resim Yükle
									</div>
									<input type='hidden' name="status" value="backgroundimage"/>
								</label>
							</form>
													</div>
							<div id="image_library_content" class="clearfix">
								<input type="button" class="upload_btn" value="Seç ve Ekle" id="lipimguplod" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','','background');" />
							<div class="backgroundLibrary">
                            <div id="backgroundimg">	
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'imageLibrary.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							</div>
                            </div>    
						</div>
					</div>
				</div>
			</div>
    		</div>
		<div class="span12 offset0">
    			<div class="bgTitle">Arkaplan Rengi</div>
				<div class="bgChangOnOff bannerswitch slidePopRhtScroll backgroundpadding">
					<div class="button pull-left">
						<a class="backstatus <?php if ($this->_tpl_vars['backgroundcolor'] == 'Y' || $this->_tpl_vars['default_switch'] == 'Y'): ?>active<?php endif; ?>" data-back='color'  data-val="OFF" onclick="changeBackgroundStatus(this);"><?php echo $this->_tpl_vars['LANG']['main_page_off']; ?>
</a>
						<a class="backstatus  <?php if ($this->_tpl_vars['backgroundcolor'] == 'N' && $this->_tpl_vars['default_switch'] == 'N'): ?>active<?php endif; ?>" data-back='color' data-val="ON" onclick="changeBackgroundStatus(this);"><?php echo $this->_tpl_vars['LANG']['main_page_on']; ?>
</a>
                        					</div>
					<label class="bglabel selectbgcolor">Renk Seç :</label><span style="background-color:<?php echo $this->_tpl_vars['backcolor']; ?>
" class="bgboxcolor"></span>
					<div id="selectbgcolorWrap">
						<div id='selectbgcolor'><select name='colour'> <option value='ffffff'>#ffffff</option> <option value='ffccc9'>#ffccc9</option> <option value='ffce93'>#ffce93</option> <option value='fffc9e'>#fffc9e</option> <option value='ffffc7'>#ffffc7</option> <option value='9aff99'>#9aff99</option> <option value='96fffb'>#96fffb</option> <option value='cdffff'>#cdffff</option> <option value='cbcefb'>#cbcefb</option> <option value='cfcfcf'>#cfcfcf</option> <option value='fd6864'>#fd6864</option> <option value='fe996b'>#fe996b</option> <option value='fffe65'>#fffe65</option> <option value='fcff2f'>#fcff2f</option> <option value='67fd9a'>#67fd9a</option> <option value='38fff8'>#38fff8</option> <option value='68fdff'>#68fdff</option> <option value='9698ed'>#9698ed</option> <option value='c0c0c0'>#c0c0c0</option> <option value='fe0000'>#fe0000</option> <option value='f8a102'>#f8a102</option> <option value='ffcc67'>#ffcc67</option> <option value='f8ff00'>#f8ff00</option> <option value='34ff34'>#34ff34</option> <option value='68cbd0'>#68cbd0</option> <option value='34cdf9'>#34cdf9</option> <option value='6665cd'>#6665cd</option> <option value='9b9b9b'>#9b9b9b</option> <option value='cb0000'>#cb0000</option> <option value='f56b00'>#f56b00</option> <option value='ffcb2f'>#ffcb2f</option> <option value='ffc702'>#ffc702</option> <option value='32cb00'>#32cb00</option> <option value='00d2cb'>#00d2cb</option> <option value='3166ff'>#3166ff</option> <option value='6434fc'>#6434fc</option> <option value='656565'>#656565</option> <option value='9a0000'>#9a0000</option> <option value='ce6301'>#ce6301</option> <option value='cd9934'>#cd9934</option> <option value='999903'>#999903</option> <option value='009901'>#009901</option> <option value='329a9d'>#329a9d</option> <option value='3531ff'>#3531ff</option> <option value='6200c9'>#6200c9</option> <option value='343434'>#343434</option> <option value='680100'>#680100</option> <option value='963400'>#963400</option> <option value='986536' selected='selected'>#986536</option> <option value='646809'>#646809</option> <option value='036400'>#036400</option> <option value='34696d'>#34696d</option> <option value='00009b'>#00009b</option> <option value='303498'>#303498</option> <option value='000000'>#000000</option> <option value='330001'>#330001</option> <option value='643403'>#643403</option> <option value='663234'>#663234</option> <option value='343300'>#343300</option> <option value='013300'>#013300</option> <option value='003532'>#003532</option> <option value='010066'>#010066</option> <option value='340096'>#340096</option> </select></div>
					</div>
				</div>
    	</div>
		<div class="span12 offset0">
    		<div class="bgTitle">Varsayılan Tema</div>
			<div class="bgChangOnOff bannerswitch slidePopRhtScroll backgroundpadding">
				<div class="button">
					<a class="backstatus defaultstatus1 <?php if ($this->_tpl_vars['default_switch'] == 'N'): ?>active<?php endif; ?>" data-back='default' data-val="OFF" onclick="changeBackgroundStatus_default('N',this);"><?php echo $this->_tpl_vars['LANG']['main_page_off']; ?>
</a>
					<a class="backstatus defaultstatus1 <?php if ($this->_tpl_vars['default_switch'] == 'Y'): ?>active<?php endif; ?>" data-back='default' data-val="ON" onclick="changeBackgroundStatus_default('Y',this);"><?php echo $this->_tpl_vars['LANG']['main_page_on']; ?>
</a>
				</div>
			</div>
    	</div>
    	</div>
    </div>
</div>
	<div id="storepage" class="main_storepage" style="display:none">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'storePageReplace.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
<?php echo '
<script type="text/javascript">
	$(document).ready(function(){
		$(".mainLeftPanel").removeClass("overhidden");
		$(".mainLeftArrow").hide();
		var basictab = $(window).width();
		//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
		//$(".mainLeftPanelUlContent").css("width",basictab);
		$(".mainRightArrow").css("left",basictab);
		var toolwidth = 1340 - basictab;
		$(".mainLeftArrow").click(function(){
			var rightval = parseInt($(".mainLeftPanelUlContent").css("right"));
			var rightvalInt = rightval;
			if(toolwidth<rightvalInt){
				$(".mainLeftPanelUlContent").css({"left":"auto","right":"auto"});
			}
			else{
				$(".mainLeftPanelUlContent").css({"left":"-=134px","right":"auto"});
			}
		});
		$(".mainRightArrow").click(function(){
			var leftval = parseInt($(".mainLeftPanelUlContent").css("left"));
			var leftvalInt = -leftval;
			if(leftvalInt>=0){
				$(".mainLeftArrow").show();
			}	
			if(toolwidth<leftvalInt){
				$(".mainLeftPanelUlContent").css({"left":"auto","right":"auto"});
			}
			else{
				$(".mainLeftPanelUlContent").css({"left":"-=134px","right":"auto"});
			}
		});	
		
		$("#change-back-button").click(function(){
			//$(".maindesignleftDiv").slideUp();
			//$(".mainbackgroundleftChange").slideDown();
			//$("#themelist").hide();
			//$("#build").show();
		});	
		$("#change-fonts-button").click(function(){
			$(".maindesignleftDiv").slideUp();
			$(".maindesignleftChange").slideDown();
			$("#themelist").hide();
			$("#build").show();
		});	
		var fonttotchange;
		$(".selectlist li").click(function(){
			$(".selectlist").slideUp();
			$(".fontlistdiv").slideDown();
			pageid = $(\'#page_id\').val();
			domainid = $(\'#domain_id\').val();
			fonttotchange = $(this).attr("id");
			if(fonttotchange==\'site_title\'){
				$(".lineht").hide();	
			}
			else{
				$(".lineht").show();	
			}
			//$(".mainLeftPageScroll.nano").nanoScroller();
			var fontfamily = $("."+fonttotchange).css("font-family");
			//$(".fontlistdiv ul").append(\'<li class="active">\'+fontfamily+\'</li>\');
			$(\'.fontfamily li\').removeClass("activefont");
			var fontnew = $(\'.fontfamily li:contains(\'+fontfamily+\')\');
			$(fontnew).addClass("activefont");
			$("#fontchange").val(fonttotchange);
			getFontSizeForListing(pageid,domainid,fonttotchange);
		});
		$(".fontfamily li").click(function(){
			$(\'.fontfamily li\').removeClass("activefont");
			fonttotchange = $("#fontchange").val();
			var font = $(this).text();
			pageid = $(\'#page_id\').val();
			domainid = $(\'#domain_id\').val();
			$("."+fonttotchange).css("font-family",font);
			fontchange = fonttotchange+\'_font_style\';	
			updateFontStylingForEachListing(pageid,domainid,fontchange,font);
		});	
		$(".selectlist .fontback").click(function(){
			$(".maindesignleftChange").slideUp();
			$(".mainbackgroundleftChange").slideUp();
			$(".maindesignleftDiv").slideDown();
		});	
		$(".fontlistdiv .fontback").click(function(){
			$(this).parent().parent().slideUp();
			$(".selectlist").slideDown();
		});	
		
		//Font Size Changes
		$(".increasefont").click(function(){
			var fontSize = $(".inputfont");
			fontSize.val( +fontSize.val() + 1 );
			fonttotchange = $("#fontchange").val();
			var minussize = $(".inputfont").val()+"px";
			var minussize1 = $(".inputfont").val();
			if(minussize1<= 100){
				$("."+fonttotchange).css("font-size",minussize);
				pageid = $(\'#page_id\').val();
				domainid = $(\'#domain_id\').val();
				fontchange = fonttotchange+\'_font_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,minussize);
			}
			else{
				var minussize = $(".inputfont").val("100")+"px";
			}
		});
		$(".decreasefont").click(function(){
			var fontSize = $(".inputfont");
			fontSize.val( +fontSize.val() - 1 );
			fonttotchange = $("#fontchange").val();
			var plussize = $(".inputfont").val()+"px";
			var plussize1 = $(".inputfont").val();
			if(plussize1<=100){
				$("."+fonttotchange).css("font-size",plussize);
				pageid = $(\'#page_id\').val();
				domainid = $(\'#domain_id\').val();
				fontchange = fonttotchange+\'_font_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,plussize);
			}
			else{
				var plussize = $(".inputfont").val("100")+"px";
			}
		});
		$(".inputfont").keyup(function(){
			var fontpressSize = $( ".inputfont" ).val()+"px";
			var fontpressSize1 = $( ".inputfont" ).val();
			if(fontpressSize1<=100){
				fonttotchange = $("#fontchange").val();
				$("."+fonttotchange).css("font-size",fontpressSize);
				pageid = $(\'#page_id\').val();
				domainid = $(\'#domain_id\').val();
				fontchange = fonttotchange+\'_font_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,fontpressSize);
			}
			else{
				var fontpressSize = $( ".inputfont" ).val("100")+"px";
			}
		});
		
		//Font Line height Changes
		$(".increaselineht").click(function(){
			var fontSize = $(".inputlineht");
			fontSize.val( +fontSize.val() + 1 );
			fonttotchange = $("#fontchange").val();
			var minussize = $(".inputlineht").val()+"px";
			var minussize1 = $(".inputlineht").val();
			if(minussize1<=100){
				$("."+fonttotchange).css("line-height",minussize);
				$("."+fonttotchange+" *").css("line-height",minussize);
				pageid = $(\'#page_id\').val();
				domainid = $(\'#domain_id\').val();
				fontchange = fonttotchange+\'_line_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,minussize);
			}
			else{
				var minussize = $( ".inputlineht" ).val("100")+"px";
			}
		});
		$(".decreaselineht").click(function(){
			var fontSize = $(".inputlineht");
			fontSize.val( +fontSize.val() - 1 );
			fonttotchange = $("#fontchange").val();
			var plussize = $(".inputlineht").val()+"px";
			var plussize1 = $(".inputlineht").val();
			if(plussize1<=100){
				$("."+fonttotchange).css("line-height",plussize);
				$("."+fonttotchange+" *").css("line-height",plussize);
				fontchange = fonttotchange+\'_line_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,plussize);
			}
			else{
				var plussize = $( ".inputlineht" ).val("100")+"px";
			}
		});
		$(".inputlineht").keyup(function(){
			var fontpressSize = $( ".inputlineht" ).val()+"px";
			fonttotchange = $("#fontchange").val();
			var fontpressSize1 = $( ".inputlineht" ).val();
			if(fontpressSize1<=100){
				$("."+fonttotchange).css("line-height",fontpressSize);
				$("."+fonttotchange+" *").css("line-height",fontpressSize);
				pageid = $(\'#page_id\').val();
				domainid = $(\'#domain_id\').val();
				fontchange = fonttotchange+\'_line_size\';	
				updateFontStylingForEachListing(pageid,domainid,fontchange,fontpressSize);
			}
			else{
				var fontpressSize = $( ".inputlineht" ).val("100")+"px";
			}
		});
	});
	$(document).ready(function(){
		$(".deleteBg").click(function(){
			$( "#deletePopup").fadeIn( 300 );	
			var closetop = $(this).offset();
			$("#deletePopup").css("top",closetop.top);
		});
		$(document).click(function(event){
			 if($(event.target).closest(".contentedit").length == 0) { $(".formattoolBg").fadeOut(200); } 
		});
	});
	$(window).resize(function(){
		$(".mainLeftPanel").removeClass("overhidden");
		$(".mainLeftArrow").hide();
		var basictab = $(window).width();
		//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
		//$(".mainLeftPanelUlContent").css("width",basictab);
	});
	
</script>
<script type="text/javascript">

    $(window).load(function(){
        $("#change-back-button").click(function(){
            $("#banner_slide_images_popup").show();
			$(\'#selectbgcolor select\').colourPickerNew({
				ico: jssitebaseUrl+\'/images/jquery.colourPicker.gif\',
				title:	false
			});
            $(".loadmask").show();
    	});
        $(".youtubepopclose").click(function(){
            $("#banner_slide_images_popup").hide();
            $(".loadmask").hide();
    	});
     });
 	$(document).ready(function(){
		$("#background_imageLibrary").tabs();
		$("#backgroundimg ul.imageLibraryUl li").click(function(){
		    var urls;
		    $(".imageLibraryUl li").removeClass("active");
			$(this).toggleClass("active");
            urls        = $(this).children("img").attr("src");
            $("#backimg").attr("src",urls);
            $("#uploadtype").val("lipimg");
			//$(".imageLibraryUl li.active img").attr();	
		});
		$("#change-fonts-button").click(function(){
			$(".maindesignleftDiv").slideUp();
			$(".maindesignleftChange").slideDown();
			$("#themelist").hide();
			$("#build").show();
		});	 
	});	
</script>
<script type="text/javascript">
$(document).ready(function(){
	$(\'#photobannerimg\').die(\'click\').live(\'change\', function(){
	   
            var bar = $(\'.bar\');
			var percent = $(\'.percent\');
			var status = $(\'#status\');
	      	$(".progress").show();
	        $("#bannerimageform").ajaxForm({
			 target: \'#preview\', 
		     beforeSubmit:function(){ 
		        status.empty();
				var percentVal = \'0%\';
				bar.width(percentVal)
				percent.html(percentVal);  
		     	$("#imageloadstatus").show();
			 	$("#imageloadbutton").hide();
			 }, 
             uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + \'%\';
				bar.width(percentVal)
				percent.html(percentVal);
			}, 
			complete:function(xhr){ 
			 
             var restxt=xhr.responseText;
			 if(restxt.trim()==\'Unknown extension!\')
             {
                alert("Unknown extension!");
                $("#preview").hide();
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();               
             }
             else if(restxt.trim()==\'You have exceeded the size limit! so moving unsuccessful!\')
             {
                alert("You have exceeded the size limit! so moving unsuccessful!");
                $("#preview").hide();
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();                
             }
             else
             {
                $("#imageloadstatus").hide();
                $(".progress").hide();
    			$("#imageloadbutton").hide();
				$("#maska").hide();
				imageReloadPagelist();
             }  
			}, 
			error:function(){ 
			    $("#imageloadstatus").hide();
				$("#imageloadbutton").show();
			} }).submit();
	});
    
		
	$(\'#backgroundimg\').die(\'click\').live(\'change\', function(){ 
	        $("#imagebackground").ajaxForm({target: \'#preview\', 
		     beforeSubmit:function(){ 
		    }, 
			success:function(){ 
			 window.location = jssitebaseUrl+\'/main.php\';
			}, 
			error:function(){ 
			} }).submit();
	});
});
$(\'.showTopTogg\').click(function(){ 
	$(".main_storepage").animate({left:\'0\'});
	$(".main_storepage").show();
});




</script>
'; ?>