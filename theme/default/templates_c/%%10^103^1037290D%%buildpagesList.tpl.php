<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from /home/enkolayw/public_html/theme/default/templates/theme1/buildpagesList.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'main_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'backgroundimage'); ?>

<?php echo $this->_tpl_vars['objCommon']->getBannerEnable($this->_tpl_vars['site_title']['0']['domain_id']); ?>

<?php echo $this->_tpl_vars['objCommon']->BackgroundForShowTop($this->_tpl_vars['site_title']['0']['domain_id']); ?>

<div class="<?php echo $_SESSION['themename']; ?>
 navigation clearfix <?php echo $_SESSION['themecolorname']; ?>
 <?php if ($_SESSION['themename'] == 'theme9'): ?>theme9<?php endif; ?>">
	<div class="clear2teheme"></div>
	<div class="themewrapper5 theme2Banner" id="theme_background" style="<?php if ($this->_tpl_vars['banner_config']):  if ($this->_tpl_vars['logoimages'] && $this->_tpl_vars['default_switch'] == 'N'): ?>background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;<?php endif;  else:  if ($this->_tpl_vars['background_color']['0']['background_color'] != '' && $this->_tpl_vars['background_color']['0']['background_color_off'] == 'N' && $this->_tpl_vars['default_switch'] == 'N'): ?>background-color:<?php echo $this->_tpl_vars['background_color']['0']['background_color'];  endif;  endif; ?>">
		<div class="theme5wrap">
			<div class="themewrapper4Cont wrapperCont5 clearfix" id="titheaddesUpdate">
				<div class="themeLeftSep mainRightPanelInnerTop">
					<div class="themewrapper1">
						<div class="logoTopHoverOuter box-sizing">
							<div class="theme4Wrapper">
								<!-- Logo Section starts -->
								<div class="blogthemeLogo logoTopHover" onmouseover="titleShow()"  onmouseout="titleHide()">
									<div class="themewrapperLeft hei60">
										<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

										<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
										<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
										<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
										<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else:  endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else:  endif; ?>"></div>
										<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '0'): ?>
										<?php endif; ?>
										<div id="showlogo">
											<ul class="hovershowLogo <?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>logopopnew<?php endif; ?>">
												<li class="<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '0'): ?>active<?php endif; ?>" onclick="titleUpdateForShow('0','<?php echo $this->_tpl_vars['site_title']['0']['domain_id']; ?>
')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span> <?php echo $this->_tpl_vars['LANG']['off_name']; ?>
</a></li>
												<li class="<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>active<?php endif; ?>" onclick="titleUpdateForShow('1','<?php echo $this->_tpl_vars['site_title']['0']['domain_id']; ?>
')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span> <?php echo $this->_tpl_vars['LANG']['text_name']; ?>
</a></li>
												<?php if ($this->_tpl_vars['logoimages']): ?>
												<li class="<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>active<?php endif; ?>" onclick="titleUpdateForShow('2','<?php echo $this->_tpl_vars['site_title']['0']['domain_id']; ?>
')"><a href="javascript:void(0);"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>	
												<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
												<li onclick="return imageShow()"><a onclick="$('#uploadImgPopup').show();$('.loadmask').show();"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
												<?php endif; ?>
												<?php else: ?>
												<li onclick="return imageShow()"><a onclick="$('#uploadImgPopup').show();$('.loadmask').show();"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
												<?php endif; ?>	
											</ul>
										</div>
									</div>
								</div>
								<!-- Logo Section ends -->
							</div>
							<div class="themewrapperRight">
								<div class="theme4Wrapper">
									<div class="buildNavTabBg blogthemeNavTab">
										<!-- Menu Section starts -->
										<ul class="buildSection nav_menu blogthemeNavTab_menu" style="<?php if ($this->_tpl_vars['site_title']['0']['nav_menu_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['nav_menu_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['nav_menu_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['nav_menu_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['nav_menu_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['nav_menu_line_size']; ?>
px;<?php endif; ?>">
											<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getPages($this->_tpl_vars['site_title']['0']['domain_id']); ?>

											<?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=($this->_tpl_vars['buildpagelist1'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
											<li class="navTabSub">
																						<?php if ($this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['seo_title'] == 'link'): ?>
											
                                                <a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
','<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
','<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
                                                <span class="externalLinkBuildPop" id="externalLinkBuildPop_<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
" style="display:none;">
                                                    <span class="content"></span>
                                                </span>
											
											<?php else: ?>
											<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
','<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['domain_id']; ?>
')"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
											<?php endif; ?>
											<ul>
												<?php echo $this->_tpl_vars['objCommon']->getSubPages($this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id'],$this->_tpl_vars['site_title']['0']['domain_id']); ?>

												<?php unset($this->_sections['submenu']);
$this->_sections['submenu']['name'] = 'submenu';
$this->_sections['submenu']['loop'] = is_array($_loop=$this->_tpl_vars['subbuildpagelist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['submenu']['show'] = true;
$this->_sections['submenu']['max'] = $this->_sections['submenu']['loop'];
$this->_sections['submenu']['step'] = 1;
$this->_sections['submenu']['start'] = $this->_sections['submenu']['step'] > 0 ? 0 : $this->_sections['submenu']['loop']-1;
if ($this->_sections['submenu']['show']) {
    $this->_sections['submenu']['total'] = $this->_sections['submenu']['loop'];
    if ($this->_sections['submenu']['total'] == 0)
        $this->_sections['submenu']['show'] = false;
} else
    $this->_sections['submenu']['total'] = 0;
if ($this->_sections['submenu']['show']):

            for ($this->_sections['submenu']['index'] = $this->_sections['submenu']['start'], $this->_sections['submenu']['iteration'] = 1;
                 $this->_sections['submenu']['iteration'] <= $this->_sections['submenu']['total'];
                 $this->_sections['submenu']['index'] += $this->_sections['submenu']['step'], $this->_sections['submenu']['iteration']++):
$this->_sections['submenu']['rownum'] = $this->_sections['submenu']['iteration'];
$this->_sections['submenu']['index_prev'] = $this->_sections['submenu']['index'] - $this->_sections['submenu']['step'];
$this->_sections['submenu']['index_next'] = $this->_sections['submenu']['index'] + $this->_sections['submenu']['step'];
$this->_sections['submenu']['first']      = ($this->_sections['submenu']['iteration'] == 1);
$this->_sections['submenu']['last']       = ($this->_sections['submenu']['iteration'] == $this->_sections['submenu']['total']);
?>
												<li>
												<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['page_id']): ?>active<?php endif; ?>"
												onclick="showPageListinBuild('<?php echo $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['page_id']; ?>
','<?php echo $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['domain_id']; ?>
')"><?php echo $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['pagename']; ?>
</a>
												</li>
												<?php endfor; endif; ?>
											</ul>
											</li>
											<?php endfor; endif; ?>
											<?php endif; ?>
										</ul>
										<!-- Menu Section ends -->
                                        
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="headerNavShadow"></div>	
					<input type="hidden" name="page_id" id="page_id" value="<?php echo $_SESSION['page_id']; ?>
">
					<input type="hidden" name="domain_id" id="domain_id" value="<?php echo $_SESSION['domain_id']; ?>
">
					<?php if ($_SESSION['domain_id']): ?>
					<input type="hidden" name="blog_comment" id="blog_comment" value="<?php echo $this->_tpl_vars['objCommon']->getBlogComment($_SESSION['page_id']); ?>
"/>
					<input type="hidden" name="store_comment" id="store_comment" value="<?php echo $this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id']); ?>
"/>
					<?php endif; ?>
					<input type="hidden" name="clickid" id="clickid" value="">
					<?php if ($_SESSION['themeOnuse']): ?>
					<div class="clearfix"></div>
					<div class="themeRightSepOuter">
						<div class="themeRightSep">
							<!-- Banner Section starts -->
							<div class="mainRhtBanner clearfix">
								<div class="mainRhtBannerInner">
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
									<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
									<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background-image:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
										<a class="editbannerTxt" onclick="$('#editBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 </a>
										<a class="editbannerTxt"  onclick="$('#sliderBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 </a>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<input type="hidden" value="" class="headlimitInput" />
												<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
													<div id="headingContent" contenteditable="true" data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')"   onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"   ><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
									<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?> 
									<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background-image:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
										<a class="editbannerTxt" onclick="$('#editBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
</a>
										<a class="editbannerTxt"  onclick="$('#sliderBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 </a>
										<div class="themewrapper3">
											<div class="mainRhtBannerInnerRight">
												<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
													<div id="headingContent"  contenteditable="true"  data-ph="Başlığı Güncelle"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')"   onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
												</h2>
												<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"  ><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
																		<?php if ($_SESSION['domain_id']): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

									<?php endif; ?>
                                    <?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

                                    <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="slideBannerRel hoverSlide carousel slide carousel-fade" id="myCarousel">
											<a class="slideeditbannerTxt" onclick="$('#editBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 </a>
											<a class="slideeditSlide"  onclick="$('#sliderBannerImg').show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 </a>
											<div class="carousel-inner">
												<?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['banner_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sliimg']['show'] = true;
$this->_sections['sliimg']['max'] = $this->_sections['sliimg']['loop'];
$this->_sections['sliimg']['step'] = 1;
$this->_sections['sliimg']['start'] = $this->_sections['sliimg']['step'] > 0 ? 0 : $this->_sections['sliimg']['loop']-1;
if ($this->_sections['sliimg']['show']) {
    $this->_sections['sliimg']['total'] = $this->_sections['sliimg']['loop'];
    if ($this->_sections['sliimg']['total'] == 0)
        $this->_sections['sliimg']['show'] = false;
} else
    $this->_sections['sliimg']['total'] = 0;
if ($this->_sections['sliimg']['show']):

            for ($this->_sections['sliimg']['index'] = $this->_sections['sliimg']['start'], $this->_sections['sliimg']['iteration'] = 1;
                 $this->_sections['sliimg']['iteration'] <= $this->_sections['sliimg']['total'];
                 $this->_sections['sliimg']['index'] += $this->_sections['sliimg']['step'], $this->_sections['sliimg']['iteration']++):
$this->_sections['sliimg']['rownum'] = $this->_sections['sliimg']['iteration'];
$this->_sections['sliimg']['index_prev'] = $this->_sections['sliimg']['index'] - $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['index_next'] = $this->_sections['sliimg']['index'] + $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['first']      = ($this->_sections['sliimg']['iteration'] == 1);
$this->_sections['sliimg']['last']       = ($this->_sections['sliimg']['iteration'] == $this->_sections['sliimg']['total']);
?>
												<div class="item <?php if ($this->_sections['sliimg']['rownum'] == 1): ?>active<?php endif; ?>">
													<div class="fill bannersrchArea banner-image-bg" style="background-image:url('<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
')"></div>
												</div>
												<?php endfor; endif; ?>
											</div>
											<!-- Controls -->
											<a class="left carousel-control" href="#myCarousel" data-slide="prev">
												<span class="fa fa-2x fa-arrow-left"></span>
											</a>
											<a class="right carousel-control" href="#myCarousel" data-slide="next">
												<span class="fa fa-2x fa-arrow-right"></span>
											</a>
										</div>
                                    <?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
                            
							<!-- Banner Section ends -->
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="blogPageInner">
				<div class="blogPageInnerBg blogPageThemeBg">
					<div class="blogwrapper1 blogwrapper2 theme4Wrapper blog2wrapper relative mainwrapper">
						<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'droppablePage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>	
					<div class="clearfix clr"></div>
					<!-- Footer Section starts -->
					<div class="footrAlign">
						<div class="container">
							<?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

							<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeydown="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['LANG']['webbxyz_name']; ?>
</a><?php endif; ?></div>
						</div>
					</div>
					<!-- Footer Section ends -->
					<div class="dragMask"></div>
				</div>			
			</div>		
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "allpopup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
</div>

 