<?php /* Smarty version 2.6.3, created on 2015-12-09 11:51:01
         compiled from /home/enkolayw/public_html/theme/default/templates/theme1/sourceNew.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '/home/enkolayw/public_html/theme/default/templates/theme1/sourceNew.tpl', 11, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'subpageheader.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<?php echo $this->_tpl_vars['objCommon']->getThemeName($this->_tpl_vars['domain_details']['0']['domain_id']); ?>

<?php echo $this->_tpl_vars['objCommon']->getImageForShowTopInSubdomain($this->_tpl_vars['domain_details']['0']['domain_id'],'backgroundimage'); ?>

<?php echo $this->_tpl_vars['objCommon']->getBannerEnableForSubdomain($this->_tpl_vars['domain_details']['0']['domain_id']); ?>

<?php echo $this->_tpl_vars['objCommon']->BacksgroundForShowTopInsubdomain($this->_tpl_vars['domain_details']['0']['domain_id']); ?>

<body style="<?php if ($this->_tpl_vars['sub_banner_config']):  if ($this->_tpl_vars['logo_sub_images'] && $this->_tpl_vars['default_switch'] == 'N'): ?>background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logo_sub_images']; ?>
); background-size:100% 100%;<?php endif;  else:  if ($this->_tpl_vars['background_color']['0']['background_color'] != '' && $this->_tpl_vars['background_color']['0']['background_color_off'] == 'N' && $this->_tpl_vars['default_switch'] == 'N'): ?>background-color:<?php echo $this->_tpl_vars['background_color']['0']['background_color'];  endif;  endif; ?>">
	<div class="navigation <?php echo $this->_tpl_vars['themecolorname']; ?>
 themepublish <?php echo ((is_array($_tmp=$this->_tpl_vars['themename']['0']['theme_name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
">
		<?php if ($this->_tpl_vars['domain_details']): ?>
			<!--<?php echo $this->_tpl_vars['objCommon']->getImageForShowTopInSubdomain($this->_tpl_vars['domain_details']['0']['domain_id'],'backgroundimage'); ?>

			<?php echo $this->_tpl_vars['objCommon']->getBannerEnableForSubdomain($this->_tpl_vars['domain_details']['0']['domain_id']); ?>
-->
            <div class="sourceNewThene">
                <div class="container">
                    <div class="navbar">
                        <!-- Logo Section starts -->
                        <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                        <?php if ($this->_tpl_vars['domain_details']): ?>
                       		<!--to show  site title start-->
                            <?php if ($this->_tpl_vars['domain_details']['0']['header_logo_config'] == '1'): ?>
								<div class="mainPageThmeTitle themewrapperLeft pull-left" style="<?php if ($this->_tpl_vars['domain_details']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
"><?php echo $this->_tpl_vars['domain_details']['0']['site_title']; ?>
</a></div>
                            <?php elseif ($this->_tpl_vars['domain_details']['0']['header_logo_config'] == '2'): ?>
								<?php echo $this->_tpl_vars['objCommon']->getImageForShowTopInSubdomain($this->_tpl_vars['domain_details']['0']['domain_id'],'domainlogo'); ?>

								<div class="themelogoposition" style="<?php if ($this->_tpl_vars['domain_details']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['domain_details']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['domain_details']['0']['logo_top']; ?>
px;<?php endif; ?>">
									<a href="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
"><img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logo_sub_images']; ?>
" alt="home image" width="<?php if ($this->_tpl_vars['domain_details']['0']['logo_width']):  echo $this->_tpl_vars['domain_details']['0']['logo_width'];  else:  endif; ?>" height="<?php if ($this->_tpl_vars['domain_details']['0']['logo_height']):  echo $this->_tpl_vars['domain_details']['0']['logo_height'];  else:  endif; ?>" ></a>
								</div>
							<?php elseif ($this->_tpl_vars['domain_details']['0']['header_logo_config'] == '0'): ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <!-- Logo Section starts -->
                        <!-- Menu Section starts -->
						
                        <?php if ($this->_tpl_vars['domain_details']): ?>										
                            <div class="buildNavTabBg nav-collapse collapse pull-right">
                                <ul class="buildSection nav" style="<?php if ($this->_tpl_vars['domain_details']['0']['nav_menu_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['nav_menu_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['nav_menu_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['nav_menu_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['nav_menu_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['nav_menu_line_size']; ?>
px;<?php endif; ?>">
                                    <?php echo $this->_tpl_vars['objCommon']->getPages_subdomain($this->_tpl_vars['domain_details']['0']['domain_id']); ?>

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
									 <?php echo $this->_tpl_vars['objCommon']->getSubPages($this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id'],$this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['domain_id']); ?>

                                    <li class="navTabSub">
                                        <?php if ($this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['seo_title'] == 'link'): ?>
                                       		<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
                                        href="<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
"<?php if ($this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_status'] == 'new'): ?> target="_blank"<?php endif; ?> ><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
											<?php if (! empty ( $this->_tpl_vars['subbuildpagelist'] )): ?><span class="menudown"><i class="caret"></i></span><?php endif; ?>
                                        <?php else: ?>
                                        	<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"  href="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
/<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['seo_title']; ?>
" ><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
											
                                            <?php if (! empty ( $this->_tpl_vars['subbuildpagelist'] )): ?><span class="menudown"><i class="caret"></i></span><?php endif; ?>
                                        <?php endif; ?>
                                        <ul>
                                           
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
												href="<?php echo $this->_tpl_vars['SITE_SOURCE_BASEURL']; ?>
/<?php echo $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['seo_title']; ?>
"><?php echo $this->_tpl_vars['subbuildpagelist'][$this->_sections['submenu']['index']]['pagename']; ?>
</a>
												</li>
                                            <?php endfor; endif; ?>
                                        </ul>
                                    </li>
                                    <?php endfor; endif; ?>
                                </ul>
                            </div>                        
                        <?php endif; ?>
                        <!-- Menu Section ends -->
                    </div>
                </div>
                    
                <div class="container">
                   	<!-- Banner Section starts -->
					<div class="mainRhtBanner clearfix">
                     <div class="mainRhtBannerInner">
                        <?php if ($this->_tpl_vars['domain_details']['0']['header_banner'] == 0 && $this->_tpl_vars['domain_details']['0']['header_slider'] == 0): ?>
                        <?php echo $this->_tpl_vars['objCommon']->getImageForShowTopInSubdomain($this->_tpl_vars['domain_details']['0']['domain_id'],'bannerimage'); ?>

                        <?php echo $this->_tpl_vars['objCommon']->getBannerStatus_subdomain($_SESSION['page_id']); ?>

                        <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
                        <div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logo_sub_images']): ?>style="background-image:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logo_sub_images']; ?>
);"<?php endif; ?>>
                            <?php if ($this->_tpl_vars['domain_details']['0']['heading_content'] != '' || $this->_tpl_vars['domain_details']['0']['heading_description'] != ''): ?>
                            <div class="mainRhtBannerInnerRight" style="display:block;">
                                <div class="mainRhtBannerInnerHead" style="<?php if ($this->_tpl_vars['domain_details']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['domain_details']['0']['heading_content']):  echo $this->_tpl_vars['domain_details']['0']['heading_content'];  endif; ?></div>
                                <div class="mainRhtBannerInnerDesc"><?php if ($this->_tpl_vars['domain_details']['0']['heading_description']):  echo $this->_tpl_vars['domain_details']['0']['heading_description'];  endif; ?></div>
                            </div>
                            <?php else: ?>
                            <div class="mainRhtBannerInnerRight" style="display:none;">
                                <div class="mainRhtBannerInnerHead" style="<?php if ($this->_tpl_vars['domain_details']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['domain_details']['0']['heading_content']):  echo $this->_tpl_vars['domain_details']['0']['heading_content'];  endif; ?></div>
                                <div class="mainRhtBannerInnerDesc"><?php if ($this->_tpl_vars['domain_details']['0']['heading_description']):  echo $this->_tpl_vars['domain_details']['0']['heading_description'];  endif; ?></div>
                            </div> 
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['domain_details']['0']['header_banner']): ?>
                        <?php echo $this->_tpl_vars['objCommon']->getBannerStatus_subdomain($_SESSION['page_id']); ?>

                        <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
                        <?php echo $this->_tpl_vars['objCommon']->getImageForShowTopInSubdomain($this->_tpl_vars['domain_details']['0']['domain_id'],'bannerimage'); ?>

                        <div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logo_sub_images']): ?>style="background-image:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logo_sub_images']; ?>
);"<?php endif; ?>>
                            <?php if ($this->_tpl_vars['domain_details']['0']['heading_content'] != '' || $this->_tpl_vars['domain_details']['0']['heading_description'] != ''): ?>
                            <div class="mainRhtBannerInnerRight" style="display:block;">
                                <div class="mainRhtBannerInnerHead" style="<?php if ($this->_tpl_vars['domain_details']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['domain_details']['0']['heading_content']):  echo $this->_tpl_vars['domain_details']['0']['heading_content'];  endif; ?></div>
                                <div class="mainRhtBannerInnerDesc"><?php if ($this->_tpl_vars['domain_details']['0']['heading_description']):  echo $this->_tpl_vars['domain_details']['0']['heading_description'];  endif; ?></div>
                            </div>
                            <?php else: ?>
                            <div class="mainRhtBannerInnerRight" style="display:none;">
                                <div class="mainRhtBannerInnerHead" style="<?php if ($this->_tpl_vars['domain_details']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['domain_details']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['domain_details']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['domain_details']['0']['heading_content']):  echo $this->_tpl_vars['domain_details']['0']['heading_content'];  endif; ?></div>
                                <div class="mainRhtBannerInnerDesc"><?php if ($this->_tpl_vars['domain_details']['0']['heading_description']):  echo $this->_tpl_vars['domain_details']['0']['heading_description'];  endif; ?></div>
                            </div> 
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['domain_details']['0']['header_slider']): ?>
                       <?php echo $this->_tpl_vars['objCommon']->getBannerStatus_subdomain($_SESSION['page_id']); ?>

                            <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
                        	<?php echo $this->_tpl_vars['objCommon']->getImageForBannerSlider($this->_tpl_vars['domain_details']['0']['domain_id'],'sliderimage'); ?>

							<div class="slideBannerRel carousel carousel-fade slide" id="myCarousel">
								<div class="carousel-inner">
									<?php unset($this->_sections['bannersliimg']);
$this->_sections['bannersliimg']['name'] = 'bannersliimg';
$this->_sections['bannersliimg']['loop'] = is_array($_loop=($this->_tpl_vars['sliderimages'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bannersliimg']['show'] = true;
$this->_sections['bannersliimg']['max'] = $this->_sections['bannersliimg']['loop'];
$this->_sections['bannersliimg']['step'] = 1;
$this->_sections['bannersliimg']['start'] = $this->_sections['bannersliimg']['step'] > 0 ? 0 : $this->_sections['bannersliimg']['loop']-1;
if ($this->_sections['bannersliimg']['show']) {
    $this->_sections['bannersliimg']['total'] = $this->_sections['bannersliimg']['loop'];
    if ($this->_sections['bannersliimg']['total'] == 0)
        $this->_sections['bannersliimg']['show'] = false;
} else
    $this->_sections['bannersliimg']['total'] = 0;
if ($this->_sections['bannersliimg']['show']):

            for ($this->_sections['bannersliimg']['index'] = $this->_sections['bannersliimg']['start'], $this->_sections['bannersliimg']['iteration'] = 1;
                 $this->_sections['bannersliimg']['iteration'] <= $this->_sections['bannersliimg']['total'];
                 $this->_sections['bannersliimg']['index'] += $this->_sections['bannersliimg']['step'], $this->_sections['bannersliimg']['iteration']++):
$this->_sections['bannersliimg']['rownum'] = $this->_sections['bannersliimg']['iteration'];
$this->_sections['bannersliimg']['index_prev'] = $this->_sections['bannersliimg']['index'] - $this->_sections['bannersliimg']['step'];
$this->_sections['bannersliimg']['index_next'] = $this->_sections['bannersliimg']['index'] + $this->_sections['bannersliimg']['step'];
$this->_sections['bannersliimg']['first']      = ($this->_sections['bannersliimg']['iteration'] == 1);
$this->_sections['bannersliimg']['last']       = ($this->_sections['bannersliimg']['iteration'] == $this->_sections['bannersliimg']['total']);
?>
									<div class="item <?php if ($this->_sections['bannersliimg']['rownum'] == 1): ?>active<?php endif; ?>">
										<div class="fill bannersrchArea banner-image-bg" style="background-image:url('<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['sliderimages'][$this->_sections['bannersliimg']['index']]['image_name']; ?>
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
                <span style="color:green"><b><?php echo $_SESSION['paymentSuccmsg']; ?>
</b></span>
                <?php echo $this->_tpl_vars['objCommon']->clearSession(); ?>

				<div class="themeRightSep container">
					<div class="mainRhtBannerInner replaceStoreBg store3Wrpper paddRound20 clearfix">
						<div class="mainRhtBanner clearfix">
							<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
							<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
							   <?php if ($this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])): ?>
									<?php if ($_SESSION['themename'] != 'store2'): ?> 
										<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'publishstoretheme.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
									<?php endif; ?>
								<?php else: ?>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'publishdroppablePage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>								
                            </div>                        
            <!-- No need to change Footer section starts -->
            <div class="footrAlign">
                <!-- Footer Section starts -->
                <div class="container">
					<?php if ($this->_tpl_vars['domain_details']): ?>
						<!--FOOTER CODE STARTS-->
						<!--show footer code details-->
						<?php echo $this->_tpl_vars['domain_details']['0']['footer_code']; ?>

						<!--show footer code details end-->
						<?php if ($this->_tpl_vars['domain_details']['0']['footer_content']): ?>
							<?php echo $this->_tpl_vars['domain_details']['0']['footer_content']; ?>

						<?php else: ?>
							<?php echo $this->_tpl_vars['LANG']['common_create_new']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['LANG']['webbxyz_name']; ?>
</a>
						<?php endif; ?>
					<?php endif; ?>
					<!--FOOTER CODE END-->
                </div>
                <!-- Footer Section ends -->	
            </div>
            <!-- No need to change Footer section ends -->			
			<div id="maska"></div>
		<?php endif; ?>
	</div>	
</body>
</html>