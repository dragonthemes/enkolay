<?php /* Smarty version 2.6.3, created on 2015-12-23 12:44:54
         compiled from /home/enkolayw/public_html/theme/default/templates/buildpagesList.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/home/enkolayw/public_html/theme/default/templates/buildpagesList.tpl', 1760, false),array('modifier', 'date_format', '/home/enkolayw/public_html/theme/default/templates/buildpagesList.tpl', 1901, false),array('modifier', 'utf8_encode', '/home/enkolayw/public_html/theme/default/templates/buildpagesList.tpl', 1901, false),)), $this); ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.ui.all.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/common.js"></script>
<?php echo '
<script type="text/javascript">
	var onSampleResized = function(e){
		var columns = $(e.currentTarget).find("td");
		var msg = \'\';
		columns.each(function(){ msg += $(this).width() + "px; "; });	
		var tdone = $(".sample2 tr td:first").width();
		var tdtwo = $(".sample2 tr td:nth-child(2)").width();
		var tdthree = $(".sample2 tr td:nth-child(3)").width();
		var tdfour = $(".sample2 tr td:nth-child(4)").width();
		var tdfive = $(".sample2 tr td:nth-child(5)").width();
		var colpagelist = $(e.currentTarget).find(".columnpagelistid").val();	
		updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);
	};	
	var dropvalinput = $(".dropvalue").val("");
	function colResize(){
		$(".sample2").colResizable({
			liveDrag:true, 
			draggingClass:"dragging", 
			onResize:onSampleResized
		});	
	}
    function imageUpdatingProcess(id){
    
		$(".imagepopupdiv").hide();
		$("#imageform_"+id).ajaxForm({target: \'#preview\', 
		 beforeSubmit:function(){ 
			$("#imageloadstatus_"+id).show();
			$("#imageloadbutton_"+id).hide();
		 }, 
		success:function(){ 
		 $("#imageloadstatus_"+id).hide();
		 $("#imageloadbutton_"+id).hide();
		 reloadPagelist();
		}, 
		error:function(){ 
			$("#imageloadstatus_"+id).hide();
			$("#imageloadbutton_"+id).show();
		} }).submit();
	}  
	//colResize();
	var tdone = $(".sample2 tr td:first").width();
	var tdtwo = $(".sample2 tr td:nth-child(2)").width();
	var tdthree = $(".sample2 tr td:nth-child(3)").width();
	var tdfour = $(".sample2 tr td:nth-child(4)").width();
	var tdfive = $(".sample2 tr td:nth-child(5)").width();
	var colpagelist = $(".sample2 tr td").find(".columnpagelistid").val();	
	//updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);
    function galimagupdate(id){
        
			        $("#galimagephotogal"+id).ajaxForm({target: \'#preview\', 
				     beforeSubmit:function(){ 
				     	$("#imageloadstatus").show();
					 	$("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").hide();
					 reloadPagelist();
					}, 
					error:function(){ 
					    $("#imageloadstatus").hide();
						$("#imageloadbutton").show();
					} }).submit();
			}
    
                    
                                                     
</script>
'; ?>

<link href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/theme/<?php echo $_SESSION['themename']; ?>
/css/theme.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/design.css" type="text/css" rel="stylesheet" />
	<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'backgroundimage'); ?>

	<?php echo $this->_tpl_vars['objCommon']->getBannerEnable($this->_tpl_vars['site_title']['0']['domain_id']); ?>

	<!--<div class="sampleDrag" style="margin:20px; background:red; border:1px solid #eee; height:100px; float:left; width:200px;"><p>Drag</p></div>
	<div class="sampleDrop" style="margin:20px; background:blue; border:1px solid #eee; height:100px; float:left; width:200px;"><p>Drop</p></div>-->
	<div class="clearfix <?php echo $_SESSION['themecolorname']; ?>
 <?php if ($_SESSION['themename'] == 'theme9'): ?>theme9<?php endif; ?>">
		<div class="clear2teheme"></div>
		<div class="themewrapper5 theme2Banner" <?php if ($this->_tpl_vars['banner_config']):  if ($this->_tpl_vars['logoimages']): ?>style="background-image:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;"<?php endif;  endif; ?>>
			<div class="theme5wrap">
				<div class="themewrapper4Cont wrapperCont5 clearfix" id="titheaddesUpdate">
					<div class="themeLeftSep mainRightPanelInnerTop">
						<?php if ($_SESSION['themename'] == 'theme4' || $_SESSION['themename'] == 'theme15' || $_SESSION['themename'] == 'store2'): ?>
							<div class="themewrapperRight">
								<div class="theme4Wrapper">
									<div class="buildNavTabBg blogthemeNavTab">
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
											<span class="posRel">
												<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
												<span id="externalLinkBuildPop" style="display:none;">
													External Link: <span id="content"></span>
												</span>
											</span>
											<?php else: ?>
											<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
								 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
								</div>
								</div>
							</div>
							<div class="logoTopHoverOuter">
							<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
								<div class="theme4Wrapper">
									<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
										<div class="themewrapperLeft hei60">
										<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

										<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
										<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
										
										<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
											<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
												<?php endif; ?>
												<?php else: ?>
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
												<?php endif; ?>	
											</ul>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						<?php elseif ($_SESSION['themename'] == 'theme9'): ?>
						<div class="logoTopHoverOuter">
							<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
								<div class="theme4Wrapper">
									<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
										<div class="themewrapperLeft hei60">
										<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

										<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
										<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
										
										<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
											<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
												<?php endif; ?>
												<?php else: ?>
													<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
												<?php endif; ?>	
											</ul>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="thememenu9">
						<div class="themewrapperRight">
						<div class="buildNavTabBg blogthemeNavTab">
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
							<span class="posRel">
								<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
								<span id="externalLinkBuildPop" style="display:none;">
									External Link: <span id="content"></span>
								</span>
							</span>
								<?php else: ?>
								<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
					 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
						</div>
						</div>
						</div>
						<?php elseif ($_SESSION['themename'] == 'store3'): ?>
							<div class="logoTopHoverOuter">
								<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
									<div class="themewrapperBgLft">
										<div class="theme4Wrapper">
											<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
												<div class="themewrapperLeft hei60">
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

												<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
												<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true"  data-ph="Edit Text Here"  onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
												<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
													<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
															<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
														<?php endif; ?>
														<?php else: ?>
															<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
														<?php endif; ?>	
													</ul>
												</div>
											</div>
											</div>
										</div>
									</div>
									<div class="themewrapperRight">
										<div class="theme4Wrapper">
											<div class="buildNavTabBg blogthemeNavTab">
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
														<span class="posRel">
																<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
																<span id="externalLinkBuildPop" style="display:none;">
																	External Link: <span id="content"></span>
																</span>
														 </span>
															<?php else: ?>
															<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
												 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
										</div>
										</div>
									</div>
								</div>
							</div>
						<?php elseif ($_SESSION['themename'] == 'theme6'): ?>
							<div class="logoTopHoverOuter">
								<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
									<div class="theme4Wrapper">
										<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
											<div class="themewrapperLeft hei60">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

											<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
											<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
											
											<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
												<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
													<?php endif; ?>
													<?php else: ?>
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
													<?php endif; ?>	
												</ul>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="themewrapperRight">
								<div class="theme4Wrapper">
									<div class="buildNavTabBg blogthemeNavTab">
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
												<span class="posRel">
													<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
													<span id="externalLinkBuildPop" style="display:none;">
														External Link: <span id="content"></span>
													</span>
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
									</div>
								</div>
							</div>
						<!-- Header (Logo and Navigation) Section for Newly Created Theme starts -->	
						<!-- Change the newlyCreateTheme text to New Theme Name without space in the next line (elseif $smarty.session.themename eq 'newlyCreateTheme')-->
						<?php elseif ($_SESSION['themename'] == 'newlyCreateTheme'): ?>
							<div class="logoTopHoverOuter">
								<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
									<div class="theme4Wrapper">
										<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
											<div class="themewrapperLeft hei60">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

											<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
											<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
											
											<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
												<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
													<?php endif; ?>
													<?php else: ?>
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
													<?php endif; ?>	
												</ul>
											</div>
										</div>
										</div>
									</div>
									<div class="themewrapperRight">
										<div class="theme4Wrapper">
											<div class="buildNavTabBg blogthemeNavTab">
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
											<span class="posRel">
												<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
												<span id="externalLinkBuildPop" style="display:none;">
													External Link: <span id="content"></span>
												</span>
											</span>
												<?php else: ?>
												<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
									 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
										</div>
										</div>
									</div>														
								</div>
							</div>
							<div class="headerNavShadow"></div>		
						<!-- Header (Logo and Navigation) Section for Newly Created Theme ends -->	
						<?php else: ?>
							<div class="logoTopHoverOuter">
								<div class="themewrapper1 themewrapper3 blogwrapper1 logoTopHover blogwrapper2">
									<div class="theme4Wrapper">
										<div class="blogthemeLogo" onmouseover="titleShow()"  onmouseout="titleHide()">
											<div class="themewrapperLeft hei60">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'domainlogo'); ?>

											<?php if ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '1'): ?>
											<div class="flt"><h2 class="mainPageThmeTitle site_title contentedit" id="updateTitle" contenteditable="true" onchange="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" onblur="return updateTitleIndex('<?php echo $_SESSION['domain_id']; ?>
');" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['site_title']):  echo $this->_tpl_vars['site_title']['0']['site_title'];  else:  endif; ?></h2></div>
											
											<?php elseif ($this->_tpl_vars['site_title']['0']['header_logo_config'] == '2'): ?>
												<div class="logodiv" style="<?php if ($this->_tpl_vars['site_title']['0']['logo_left']): ?>left:<?php echo $this->_tpl_vars['site_title']['0']['logo_left']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['logo_top']): ?>top:<?php echo $this->_tpl_vars['site_title']['0']['logo_top']; ?>
px;<?php endif; ?>"><img class="logoresize" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" width="<?php if ($this->_tpl_vars['site_title']['0']['logo_width']):  echo $this->_tpl_vars['site_title']['0']['logo_width'];  else: ?>200<?php endif; ?>" height="<?php if ($this->_tpl_vars['site_title']['0']['logo_height']):  echo $this->_tpl_vars['site_title']['0']['logo_height'];  else: ?>50<?php endif; ?>"></div>
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
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['edit_logo_name']; ?>
</a></li>
													<?php endif; ?>
													<?php else: ?>
														<li onclick="return imageShow()"><a data-toggle="modal" href="#uploadImgPopup"><span class="hovershowLogoArrowTop"></span>  <?php echo $this->_tpl_vars['LANG']['logo_name']; ?>
</a></li>
													<?php endif; ?>	
												</ul>
											</div>
										</div>
										</div>
									</div>
									<?php if ($_SESSION['themename'] != 'store2'): ?>
										<?php if ($_SESSION['themename'] != 'theme4'): ?>
											<?php if ($_SESSION['themename'] != 'theme6'): ?>
												<?php if ($_SESSION['themename'] != 'theme7'): ?>
													<?php if ($_SESSION['themename'] != 'theme15'): ?>
														<?php if ($_SESSION['themename'] == 'theme1' || $_SESSION['themename'] == 'theme10' || $_SESSION['themename'] == 'theme2' || $_SESSION['themename'] == 'theme3' || $_SESSION['themename'] == 'theme5' || $_SESSION['themename'] == 'blog1' || $_SESSION['themename'] == 'theme11' || $_SESSION['themename'] == 'theme12' || $_SESSION['themename'] == 'theme13' || $_SESSION['themename'] == 'theme14'): ?>
														<div class="themewrapperRight">
															<div class="theme4Wrapper">
																<div class="buildNavTabBg blogthemeNavTab">
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
																<span class="posRel">
																	<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
																	<span id="externalLinkBuildPop" style="display:none;">
																		External Link: <span id="content"></span>
																	</span>
																</span>
																	<?php else: ?>
																	<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
														 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
															</div>
															</div>
														</div>
														<?php else: ?>
															<?php if ($_SESSION['themename'] != 'theme9'): ?>
															<div class="themewrapperRight">
															<div class="buildNavTabBg blogthemeNavTab">
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
																<span class="posRel">
																	<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
																	<span id="externalLinkBuildPop" style="display:none;">
																		External Link: <span id="content"></span>
																	</span>
																</span>
																	<?php else: ?>
																	<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
														 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
															</div>
															</div>
															<?php endif; ?>
														<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($_SESSION['themename'] == 'theme7'): ?>
										<div class="themewrapperRight">
											<div class="theme4Wrapper">
												<div class="buildNavTabBg blogthemeNavTab">
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
																	<span class="posRel">
																	<a class="externalLinkBuildPopInn <?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>" onmouseover="showexternalLinkContentPop('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');" onmouseout="mouseout('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['link_site']; ?>
');"><?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['pagename']; ?>
</a>
																	<span id="externalLinkBuildPop" style="display:none;">
																		External Link: <span id="content"></span>
																	</span>
																	</span>
																	<?php else: ?>
																	<a class="<?php if ($_SESSION['page_id'] == $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']): ?>active<?php endif; ?>"
														 onclick="showPageListinBuild('<?php echo $this->_tpl_vars['buildpagelist1'][$this->_sections['pages']['index']]['page_id']; ?>
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
											</div>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="headerNavShadow"></div>	
						<?php endif; ?>
					
					
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
					<input type="hidden" name="clickid" id="clickid" value=""/>
					<?php if ($_SESSION['themeOnuse']): ?>
						<div class="clearfix"></div>
						<div class="themeRightSepOuter">
							<div class="themeRightSep">
								<div class="mainRhtBanner clearfix">
								<?php if ($_SESSION['themename'] == 'theme1' || $_SESSION['themename'] == 'theme10'): ?>
								
									<div class="mainRhtBannerInner">
										<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<input type="hidden" value="" class="headlimitInput" />
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent" contenteditable="true" data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<!--<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>-->
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											 <?php endif; ?>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
                                      		<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?> 
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											 <?php endif; ?>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
                                       													<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel hoverSlide">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div> 
											</div>
										<?php endif; ?>
									</div>
								<?php elseif ($_SESSION['themename'] == 'theme2'): ?>
								
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInnerBanner clr">
											<div class="paddlefRht">
												<div class="top-divider"></div>
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

												<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

												<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
												<div id="banner">
													<div id="bannerleft">
														<div class="wsite-header" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;"<?php endif; ?>>
															<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
																<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
															<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
																<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
														</div>
														<div class="banner-shadow"></div>
														<div class="banner-corners"></div>
														<div class="effect"> </div>
														<div class="banner-top"></div>
														<div class="banner-right"></div>
														<div class="banner-btm"></div>
														<div class="banner-left"></div>
													</div>
													 
													<div id="bannerright">
														<div class="bannerrightCont">
															<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?> clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
															</h2>
															<div id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
														</div>
													</div>
												</div>
												 <?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

										<div class="paddlefRht">
											<div class="top-divider"></div>
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											 <?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											 <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div id="banner">
												<div id="bannerleft">
													<div class="wsite-header" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;"<?php endif; ?>>
														<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
															<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
														</a>
														<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
															<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
														</a>
													</div>
													<div class="banner-shadow"></div>
													<div class="banner-corners"></div>
													<div class="effect"> </div>
													<div class="banner-top"></div>
													<div class="banner-right"></div>
													<div class="banner-btm"></div>
													<div class="banner-left"></div>
												</div>
												<div id="bannerright">
													<div class="bannerrightCont">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?> clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											 <?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
																				<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

										<?php endif; ?>
										<div class="slideBannerRel">
											<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
												<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
											</a>
											<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
												<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
											</a>
											<div id="slider2" class="nivoSlider widt860">
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
													<div class="SlideUplWidt">
														<img width="100%" height="150" 
	
	src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
													</div>
												<?php endfor; endif; ?>
											</div>
										</div>
									<?php endif; ?>
								<?php elseif ($_SESSION['themename'] == 'theme3'): ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInner clr">
											<div class="paddlefRht">
												<div class="top-divider"></div>
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

												 <?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

												<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
												<div id="banner">
												
													<div id="bannerleft">
														<div class="wsite-header" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;"<?php endif; ?>>
															<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
																<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
															<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
																<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
														</div>
														<div class="banner-shadow"></div>
														<div class="banner-corners"></div>
														<div class="effect"> </div>
														<div class="banner-top"></div>
														<div class="banner-right"></div>
														<div class="banner-btm"></div>
														<div class="banner-left"></div>
													</div>
											   
													<div id="bannerright">
														<div class="bannerrightCont">
															<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?> clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
															</h2>
															<div id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
														</div>
													</div>
												</div>
												 <?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<div class="mainRhtBannerInner clr">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="paddlefRht">
												<div class="top-divider"></div>
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

												 <?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

												<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
												<div id="banner">
													<div id="bannerleft">
														<div class="wsite-header" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
); background-size:100% 100%;"<?php endif; ?>>
															<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
																<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
															<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
																<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
															</a>
														</div>
														<div class="banner-shadow"></div>
														<div class="banner-corners"></div>
														<div class="effect"> </div>
														<div class="banner-top"></div>
														<div class="banner-right"></div>
														<div class="banner-btm"></div>
														<div class="banner-left"></div>
													</div>
													<div id="bannerright">
														<div class="bannerrightCont">
															<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?> clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
															</h2>
															<div id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  class="contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
														</div>
													</div>
												</div>
												 <?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									
																<?php elseif ($_SESSION['themename'] == 'theme4'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											 <?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											 <?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											 <?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									
								<?php elseif ($_SESSION['themename'] == 'theme5' || $_SESSION['themename'] == 'theme11' || $_SESSION['themename'] == 'theme12' || $_SESSION['themename'] == 'theme13' || $_SESSION['themename'] == 'theme14'): ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?> 
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											 <?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									
								<?php elseif ($_SESSION['themename'] == 'theme6'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<?php elseif ($_SESSION['themename'] == 'theme7'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true" data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
								
								<?php elseif ($_SESSION['themename'] == 'theme8'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											
											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
													<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
												</div>
											</div>
											
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												</div>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
											</div>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php elseif ($_SESSION['themename'] == 'theme9'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
													<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
												</div>
											</div>
											
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												</div>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
											</div>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<!-- Banner Section for Newly Created Theme starts -->	
								<!-- Change the newlyCreateTheme text to New Theme Name without space in the next line (elseif $smarty.session.themename eq 'newlyCreateTheme')-->
								<?php elseif ($_SESSION['themename'] == 'newlyCreateTheme'): ?>
									
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
													<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
												</div>
											</div>
											
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
									<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

									<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
										<div class="mainRhtBannerInner">
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="MainLftBannerBg">
												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												</div>
												<a class="editbannerTxt theme4editimg" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
											</div>
											<div class="themewrapper3">
												<div class="mainRhtBannerInnerRight">
													<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
														<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
													</h2>
													<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
												</div>
											</div>
										</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
										<div class="mainRhtBannerInner clr">
											<?php echo $this->_tpl_vars['objCommon']->getImageForBannerSlider($this->_tpl_vars['site_title']['0']['domain_id'],'sliderimage'); ?>

											<div class="slideBannerRel">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider theme4Widt">
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
														<div class="imageSlider">
															<img width="100%" height="300" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['sliderimages'][$this->_sections['bannersliimg']['index']]['image_name']; ?>
">
															<div class="slideimageInn">
																<a onclick="deleteSliderBannerImage('<?php echo $this->_tpl_vars['sliderimages'][$this->_sections['bannersliimg']['index']]['banner_slider_id']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																
															</div>
														</div>
													 <?php endfor; endif; ?>
												</div>
											</div>
										</div>
									<?php endif; ?>	
								<!-- Banner Section for Newly Created Theme ends -->	
								<?php else: ?>
									<div class="mainRhtBannerInner">
										<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

											<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<input type="hidden" value="" class="headlimitInput" />
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent" contenteditable="true" data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<!--<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" style="<?php if ($this->_tpl_vars['site_title']['0']['site_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['site_title_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['site_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['site_title_line_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>-->
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
										<?php echo $this->_tpl_vars['objCommon']->getBannerStatus($_SESSION['page_id']); ?>

										<?php if ($this->_tpl_vars['banner_status'] == 'need'): ?>
											<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

											<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
												<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												
												<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div class="themewrapper3">
													<div class="mainRhtBannerInnerRight">
														<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
															<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
														</h2>
														<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
																						<?php if ($_SESSION['domain_id']): ?>
											<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

											<?php endif; ?>
											<div class="slideBannerRel hoverSlide">
												<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
													<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
													<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
												</a>
												<div id="slider2" class="nivoSlider widt860">
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
														<div class="SlideUplWidt">
															<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
														</div>
													<?php endfor; endif; ?>
												</div>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
				</div>
				<?php if ($_SESSION['storeonuse']): ?>
					<div class="clearfix"></div>
					<div class="themeRightSepOuter">
					
						<div class="themeRightSep storeBannerShow" <?php if ($_SESSION['pagename'] == 'Store'): ?>style="display:none;"<?php endif; ?>>
								<div class="mainRhtBanner clearfix">
									<div class="mainRhtBannerInner">
											<?php if ($this->_tpl_vars['site_title']['0']['header_banner'] == 0 && $this->_tpl_vars['site_title']['0']['header_slider'] == 0): ?>
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
													<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													
													<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<div class="themewrapper3">
														<div class="mainRhtBannerInnerRight">
															<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
																<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
															</h2>
															<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['site_title']['0']['header_banner']): ?>
												<?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

												<div class="mainRhtBannerInnerBanner" <?php if ($this->_tpl_vars['logoimages']): ?>style="background:url(<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
);"<?php endif; ?>>
													<a class="editbannerTxt" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													
													<a class="editbannerTxt" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<div class="themewrapper3">
														<div class="mainRhtBannerInnerRight">
															<h2 class="mainRhtBannerInnerHead main_headline" style="<?php if ($this->_tpl_vars['site_title']['0']['main_headline_font_style']): ?>font-family:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_font_size']): ?>font-size:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_font_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['site_title']['0']['main_headline_line_size']): ?>line-height:<?php echo $this->_tpl_vars['site_title']['0']['main_headline_line_size']; ?>
px;<?php endif; ?>">
																<div id="headingContent"  contenteditable="true"  data-ph="Edit Headline Here"  class="minhead headlimit contentedit <?php if ($this->_tpl_vars['site_title']['0']['heading_content'] == ''): ?>clickheretext contenttext<?php endif; ?>" onblur="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateHeading('<?php echo $_SESSION['domain_id']; ?>
')" ><?php if ($this->_tpl_vars['site_title']['0']['heading_content']):  echo $this->_tpl_vars['site_title']['0']['heading_content'];  endif; ?></div>
															</h2>
															<div class="mainRhtBannerInnerDesc contentedit<?php if ($this->_tpl_vars['site_title']['0']['heading_description'] == ''): ?> clickheretext contenttext<?php endif; ?>" id="headingdescription" contenteditable="true"  data-ph="Açıklamayı Güncelle"  onblur="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')" onchange="updateDescriptionTitle('<?php echo $_SESSION['domain_id']; ?>
')"><?php if ($this->_tpl_vars['site_title']['0']['heading_description']):  echo $this->_tpl_vars['site_title']['0']['heading_description'];  endif; ?></div>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['site_title']['0']['header_slider']): ?>
																								<?php if ($_SESSION['domain_id']): ?>
												<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

												<?php endif; ?>
												<div class="slideBannerRel hoverSlide">
													<a class="slideeditbannerTxt" data-toggle="modal" href="#editBannerImg">
														<?php echo $this->_tpl_vars['LANG']['edit_image_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<a class="slideeditSlide" data-toggle="modal" href="#sliderBannerImg">
														<?php echo $this->_tpl_vars['LANG']['slider_name']; ?>
 <i class="fa fa-caret-down"></i>
													</a>
													<div id="slider2" class="nivoSlider widt860">
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
															<div class="SlideUplWidt">
																<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> 	 
															</div>
														<?php endfor; endif; ?>
													</div>
													<a data-toggle="modal" class="hoverSlideShow" href="#slimgpopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
														<?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>

													 </a>
												</div>
											<?php endif; ?>
										</div>
								</div>
							</div>
					</div>
					<?php if ($_SESSION['themename'] != 'store3'): ?>
						<?php if ($_SESSION['themename'] != 'store2'): ?>
							<div class="themeRightSep">
								<div class="mainRhtBannerInner replaceStoreBg paddRound20 clearfix" id="replaceStore">
											<?php if ($_SESSION['page_id']): ?>
												<?php if ($this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])): ?>
													<div class="StoreHoverEdit">
														<div class="StoreHoverEditLeft"></div>
														<div class="StoreHoverEditContent">
															<a class="storeButton storeMainAdd" onclick="commonToogle('storepage');showStorePage('<?php echo $_SESSION['domain_id']; ?>
');">Add Product</a>
														</div>
														<div class="StoreHoverEditRight"></div>
													</div>
												<?php endif; ?>
											<?php endif; ?>
																									<?php if ($_SESSION['page_id']): ?>
														<?php if ($this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])): ?>
														<!----for list categories and its images start------>
														<div class="storeMainPageHead"><span>Category</span></div>
															<div class="storeMainPage">
																<?php echo $this->_tpl_vars['objCommon']->getCategories($_SESSION['domain_id']); ?>

																<?php unset($this->_sections['cat']);
$this->_sections['cat']['name'] = 'cat';
$this->_sections['cat']['loop'] = is_array($_loop=($this->_tpl_vars['categories'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat']['show'] = true;
$this->_sections['cat']['max'] = $this->_sections['cat']['loop'];
$this->_sections['cat']['step'] = 1;
$this->_sections['cat']['start'] = $this->_sections['cat']['step'] > 0 ? 0 : $this->_sections['cat']['loop']-1;
if ($this->_sections['cat']['show']) {
    $this->_sections['cat']['total'] = $this->_sections['cat']['loop'];
    if ($this->_sections['cat']['total'] == 0)
        $this->_sections['cat']['show'] = false;
} else
    $this->_sections['cat']['total'] = 0;
if ($this->_sections['cat']['show']):

            for ($this->_sections['cat']['index'] = $this->_sections['cat']['start'], $this->_sections['cat']['iteration'] = 1;
                 $this->_sections['cat']['iteration'] <= $this->_sections['cat']['total'];
                 $this->_sections['cat']['index'] += $this->_sections['cat']['step'], $this->_sections['cat']['iteration']++):
$this->_sections['cat']['rownum'] = $this->_sections['cat']['iteration'];
$this->_sections['cat']['index_prev'] = $this->_sections['cat']['index'] - $this->_sections['cat']['step'];
$this->_sections['cat']['index_next'] = $this->_sections['cat']['index'] + $this->_sections['cat']['step'];
$this->_sections['cat']['first']      = ($this->_sections['cat']['iteration'] == 1);
$this->_sections['cat']['last']       = ($this->_sections['cat']['iteration'] == $this->_sections['cat']['total']);
?>
																	<?php echo $this->_tpl_vars['objCommon']->getCategoriesImages($this->_tpl_vars['categories'][$this->_sections['cat']['index']]['store_cat_id'],$this->_tpl_vars['categories'][$this->_sections['cat']['index']]['domain_id']); ?>

																	<a class="storeMainPageInner span4 <?php if ($this->_sections['cat']['index'] == '3'): ?> offset0 <?php endif; ?>" onclick="return showAllCorrsProducts('<?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['store_cat_id']; ?>
','<?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['domain_id']; ?>
');">
																	
																		<?php if ($this->_tpl_vars['categoriesImages']): ?>
																			<img src="<?php echo $this->_tpl_vars['SITE_CAT_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['categoriesImages']; ?>
" alt="category images" width="100%" height="235">
																		<?php else: ?>
																			<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/blank-category.png" alt="Categories images" width="100%" height="235">
																		<?php endif; ?>
																		<?php if ($this->_tpl_vars['categories'][$this->_sections['cat']['index']]['cat_name']): ?><div class="storeMainPageInnerDetails"><?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['cat_name']; ?>
</div><?php endif; ?>
																	</a>
																<?php endfor; endif; ?>
															</div>
															<div class="clr"></div>
														<!----for list categories and its images end------>
														<div class="storeMainPageHead marTop20"><span>Product</span></div>
														<!----for list categories and its images start------>
														<div class="storeMainPageProduct">
															 
															<?php echo $this->_tpl_vars['objCommon']->getProducts($_SESSION['domain_id']); ?>
                                                    
															<?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=($this->_tpl_vars['productsListInCatPage'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prod']['show'] = true;
$this->_sections['prod']['max'] = $this->_sections['prod']['loop'];
$this->_sections['prod']['step'] = 1;
$this->_sections['prod']['start'] = $this->_sections['prod']['step'] > 0 ? 0 : $this->_sections['prod']['loop']-1;
if ($this->_sections['prod']['show']) {
    $this->_sections['prod']['total'] = $this->_sections['prod']['loop'];
    if ($this->_sections['prod']['total'] == 0)
        $this->_sections['prod']['show'] = false;
} else
    $this->_sections['prod']['total'] = 0;
if ($this->_sections['prod']['show']):

            for ($this->_sections['prod']['index'] = $this->_sections['prod']['start'], $this->_sections['prod']['iteration'] = 1;
                 $this->_sections['prod']['iteration'] <= $this->_sections['prod']['total'];
                 $this->_sections['prod']['index'] += $this->_sections['prod']['step'], $this->_sections['prod']['iteration']++):
$this->_sections['prod']['rownum'] = $this->_sections['prod']['iteration'];
$this->_sections['prod']['index_prev'] = $this->_sections['prod']['index'] - $this->_sections['prod']['step'];
$this->_sections['prod']['index_next'] = $this->_sections['prod']['index'] + $this->_sections['prod']['step'];
$this->_sections['prod']['first']      = ($this->_sections['prod']['iteration'] == 1);
$this->_sections['prod']['last']       = ($this->_sections['prod']['iteration'] == $this->_sections['prod']['total']);
?>
																<a class="storeMainPageProductInner span3 <?php if ($this->_sections['prod']['index'] == '4'): ?> offset0 <?php endif; ?>" onclick="showProductViewPage('<?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_id']; ?>
','<?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['domain_id']; ?>
');">
																	<?php echo $this->_tpl_vars['objCommon']->getProductsImages($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_id'],$this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['domain_id']); ?>

																	<?php if (! empty ( $this->_tpl_vars['pro_images'] )): ?>
																		<img src="<?php echo $this->_tpl_vars['SITE_PRODUCT_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['pro_images']; ?>
" alt="Product images" width="200" height="200">
																	<?php else: ?>
																		<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/blank-product.png" alt="Product images" width="200" height="200">
																	<?php endif; ?>
																	<div class="procutName"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_name']): ?> <?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_name'];  endif; ?></div>
																	<?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price'] == ''): ?>	 
																	<span><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price']):  echo $this->_tpl_vars['symbol'];  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price'];  endif; ?></span>
																	<?php else: ?>
																	<span class="proctPrice"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price']):  echo $this->_tpl_vars['symbol'];  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price'];  endif; ?></span>
																	<span class="proctSalePrice"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price']):  echo $this->_tpl_vars['symbol'];  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price'];  endif; ?></span>
																	<?php endif; ?>
																</a>
															<?php endfor; else: ?>
																<div class="RecNone">YOUR STORE IS EMPTY</div>
																<div class="RecNone" onclick="commonToogle('storepage'); showStorePage('<?php echo $_SESSION['domain_id']; ?>
'); showProductList('<?php echo $_SESSION['domain_id']; ?>
'); showActiveClass('products'); ">Add Product</div>
			
															<?php endif; ?>
														</div>
														<!----for list categories and its images end------>
														<?php endif; ?>	
													<?php endif; ?>
														
																									</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>						
				<div class="blogPageInner">
					<div class="blogPageInnerBg blogPageThemeBg">
						<div class="blogwrapper1 blogwrapper2 theme4Wrapper blog2wrapper">
							<?php if ($_SESSION['themename'] == 'store2' || $_SESSION['themename'] == 'store3'): ?>
								<?php if ($_SESSION['storeonuse']): ?>
									<div class="themeRightSep">
										<div class="mainRhtBannerInner replaceStoreBg paddRound20 clearfix" id="replaceStore">
										<?php if ($_SESSION['page_id']): ?>
											<?php if ($this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])): ?>
												<div class="StoreHoverEdit">
													<div class="StoreHoverEditLeft"></div>
													<div class="StoreHoverEditContent">
														<!--<a class="storeButton">Edit Storefront</a>-->
														<a class="storeButton storeMainAdd" onclick="commonToogle('storepage');showStorePage('<?php echo $_SESSION['domain_id']; ?>
');">Add Product</a>
													</div>
													<div class="StoreHoverEditRight"></div>
												</div>
											<?php endif; ?>
										<?php endif; ?>
																							<?php if ($_SESSION['page_id']): ?>
													<?php if ($this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])): ?>
													<!----for list categories and its images start------>
													<div class="storeMainPageHead"><span>Category</span></div>
														<div class="storeMainPage">
															<?php echo $this->_tpl_vars['objCommon']->getCategories($_SESSION['domain_id']); ?>

															<?php unset($this->_sections['cat']);
$this->_sections['cat']['name'] = 'cat';
$this->_sections['cat']['loop'] = is_array($_loop=($this->_tpl_vars['categories'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat']['show'] = true;
$this->_sections['cat']['max'] = $this->_sections['cat']['loop'];
$this->_sections['cat']['step'] = 1;
$this->_sections['cat']['start'] = $this->_sections['cat']['step'] > 0 ? 0 : $this->_sections['cat']['loop']-1;
if ($this->_sections['cat']['show']) {
    $this->_sections['cat']['total'] = $this->_sections['cat']['loop'];
    if ($this->_sections['cat']['total'] == 0)
        $this->_sections['cat']['show'] = false;
} else
    $this->_sections['cat']['total'] = 0;
if ($this->_sections['cat']['show']):

            for ($this->_sections['cat']['index'] = $this->_sections['cat']['start'], $this->_sections['cat']['iteration'] = 1;
                 $this->_sections['cat']['iteration'] <= $this->_sections['cat']['total'];
                 $this->_sections['cat']['index'] += $this->_sections['cat']['step'], $this->_sections['cat']['iteration']++):
$this->_sections['cat']['rownum'] = $this->_sections['cat']['iteration'];
$this->_sections['cat']['index_prev'] = $this->_sections['cat']['index'] - $this->_sections['cat']['step'];
$this->_sections['cat']['index_next'] = $this->_sections['cat']['index'] + $this->_sections['cat']['step'];
$this->_sections['cat']['first']      = ($this->_sections['cat']['iteration'] == 1);
$this->_sections['cat']['last']       = ($this->_sections['cat']['iteration'] == $this->_sections['cat']['total']);
?>
																<?php echo $this->_tpl_vars['objCommon']->getCategoriesImages($this->_tpl_vars['categories'][$this->_sections['cat']['index']]['store_cat_id'],$this->_tpl_vars['categories'][$this->_sections['cat']['index']]['domain_id']); ?>

																<a class="storeMainPageInner span4 <?php if ($this->_sections['cat']['index'] == '3'): ?> offset0 <?php endif; ?>" onclick="return showAllCorrsProducts('<?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['store_cat_id']; ?>
','<?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['domain_id']; ?>
');">
																
																	<?php if ($this->_tpl_vars['categoriesImages']): ?>
																		<img src="<?php echo $this->_tpl_vars['SITE_CAT_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['categoriesImages']; ?>
" alt="category images" width="100%" height="235">
																	<?php else: ?>
																		<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/blank-category.png" alt="Categories images" width="100%" height="235">
																	<?php endif; ?>
																	<?php if ($this->_tpl_vars['categories'][$this->_sections['cat']['index']]['cat_name']): ?><div class="storeMainPageInnerDetails"><?php echo $this->_tpl_vars['categories'][$this->_sections['cat']['index']]['cat_name']; ?>
</div><?php endif; ?>
																</a>
															<?php endfor; else: ?>
																<div class="RecNone">No records found</div>
															<?php endif; ?>
														</div>
														<div class="clr"></div>
													<!----for list categories and its images end------>
													<div class="storeMainPageHead marTop20"><span>Product</span></div>
													<!----for list categories and its images start------>
													<div class="storeMainPageProduct">
														<?php echo $this->_tpl_vars['objCommon']->getProducts($_SESSION['domain_id']); ?>

														<?php unset($this->_sections['prod']);
$this->_sections['prod']['name'] = 'prod';
$this->_sections['prod']['loop'] = is_array($_loop=($this->_tpl_vars['productsListInCatPage'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['prod']['show'] = true;
$this->_sections['prod']['max'] = $this->_sections['prod']['loop'];
$this->_sections['prod']['step'] = 1;
$this->_sections['prod']['start'] = $this->_sections['prod']['step'] > 0 ? 0 : $this->_sections['prod']['loop']-1;
if ($this->_sections['prod']['show']) {
    $this->_sections['prod']['total'] = $this->_sections['prod']['loop'];
    if ($this->_sections['prod']['total'] == 0)
        $this->_sections['prod']['show'] = false;
} else
    $this->_sections['prod']['total'] = 0;
if ($this->_sections['prod']['show']):

            for ($this->_sections['prod']['index'] = $this->_sections['prod']['start'], $this->_sections['prod']['iteration'] = 1;
                 $this->_sections['prod']['iteration'] <= $this->_sections['prod']['total'];
                 $this->_sections['prod']['index'] += $this->_sections['prod']['step'], $this->_sections['prod']['iteration']++):
$this->_sections['prod']['rownum'] = $this->_sections['prod']['iteration'];
$this->_sections['prod']['index_prev'] = $this->_sections['prod']['index'] - $this->_sections['prod']['step'];
$this->_sections['prod']['index_next'] = $this->_sections['prod']['index'] + $this->_sections['prod']['step'];
$this->_sections['prod']['first']      = ($this->_sections['prod']['iteration'] == 1);
$this->_sections['prod']['last']       = ($this->_sections['prod']['iteration'] == $this->_sections['prod']['total']);
?>
															<div class="storeMainPageProductInner span3 <?php if ($this->_sections['prod']['index'] == '4'): ?> offset0 <?php endif; ?>" onclick="showProductViewPage('<?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_id']; ?>
','<?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['domain_id']; ?>
');">
																<?php echo $this->_tpl_vars['objCommon']->getProductsImages($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_id'],$this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['domain_id']); ?>

																<?php if (! empty ( $this->_tpl_vars['pro_images'] )): ?>
																	<img src="<?php echo $this->_tpl_vars['SITE_PRODUCT_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['pro_images']; ?>
" alt="Product images" width="200" height="200">
																<?php else: ?>
																	<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/blank-product.png" alt="Product images" width="200" height="200">
																<?php endif; ?>
																<div class="procutName"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_name']): ?> <?php echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['product_name']; ?>
 <?php endif; ?></div>
																<?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price'] == ''): ?>	 
																	<span><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price']):  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price'];  endif; ?></span>
																	<?php else: ?>
																	<span class="proctPrice"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price']):  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['price'];  endif; ?></span>
																	<span class="proctSalePrice"><?php if ($this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price']):  echo $this->_tpl_vars['productsListInCatPage'][$this->_sections['prod']['index']]['sale_price'];  endif; ?></span>
																<?php endif; ?>
															</div>
														<?php endfor; else: ?>
															<div class="RecNone">No records found</div>
														<?php endif; ?>
													</div>
													<!----for list categories and its images end------>
													<?php endif; ?>	
												<?php endif; ?>
													
																							</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>	
							<div id="toolbar" style="display:none;"></div>
							<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
							<div id="pagelist" class="blogPageBgInner themewrapper1 blogPageBgInnerMiddle blogPageBgInnerMiddleSec clearfix">
								<div class="themewrapper2BgAlign" >
									<div id="rightColumn" class="clearfix"> 
																				<?php if ($_SESSION['page_id']): ?>
											<?php if ($this->_tpl_vars['objCommon']->getBlogComment($_SESSION['page_id'])): ?>
												<?php if ($_SESSION['blogonuse']): ?>
													<ul class="nolist">
														<li>
															<div class="blogInner">
																<div class="blogLeft">
																	<div class="blogPageBgInnerTab blogPageBgInnerTab4">
																		<a class="active BlogNewPost" onclick="return AddTitlePopup('<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_blog_newpost']; ?>
</a>
																		<?php echo $this->_tpl_vars['objCommon']->getDraftsDetails($_SESSION['domain_id']); ?>

																		<?php if (! empty ( $this->_tpl_vars['drafts_list'] )): ?>
																			<a class="BlogNewPost" onclick="commonForOption('<?php echo $_SESSION['domain_id']; ?>
','drafts_id')"><?php echo $this->_tpl_vars['LANG']['user_drafts']; ?>
(<?php echo count($this->_tpl_vars['drafts_list']); ?>
)</a>
																		<?php endif; ?>		
																		<a data-toggle="modal" href="#myModalBlogComment" onclick="getAllTheComments('<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_blog_comments']; ?>
</a>
																		<a data-toggle="modal" href="#myModalBlogSetting" onclick="ShowPassChangeColumn('settingblog','postblog','commentblogid');"><?php echo $this->_tpl_vars['LANG']['main_blog_setting']; ?>
</a>
																	</div>
																																		<div class="BlogNewPostPopup">
																		<div id='drafts_id'></div>
																	</div>
																		
																	<div id="postblog" style="display:block">
																		<div id="showPost">
																			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "listPost.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
																		</div>	
																				
																		<div class="BlogNewPostPopup">			
																			<div id="popaddtitle" style="display:none">								
																			</div>
																		</div>
																		<div class="blogMask"></div>
																																																						
																				
																		<div id="myModalBlogEditPost" class="BlogNewPostPopup"></div>
																																																					</div>
																	<div id="showeditpost" style="display:none;">
																		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "addtitle.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
																	</div>
																	<div id="modals">
																		<div id="myModalBlogComment" class="modal addCatPopWidt hide modelPopContLogin fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">			
																			<div id="commentblogid" style="display:none">
																				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blockpopupcomment.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>				
																			</div>
																		</div>
																	</div>
																	<div id="modals">
																		<div id="myModalBlogSetting" class="modal hide addCatPopWidt fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">			
																			<div id="settingblog" style="display:none">
																				<div class="headBgTop">
																					<?php echo $this->_tpl_vars['LANG']['main_blog_setting']; ?>

																					<div class="pull-right curPoint" data-dismiss="modal" aria-hidden="true">X</div>
																				</div>
																				<div class="popaddTitle clearfix">
																					<form name="blogsettingform" class="form-horizontal no-mar sky-form" id="blogsettingform" method="post" action="">
																					<input type="hidden" name="domain_id" id="domain_id" value="<?php echo $_SESSION['domain_id']; ?>
">					
																					<input type="hidden" name="action" id="action" value="updateBlogSetting">
																						<ul class="offset0">
																							<li class="control-group">	
																								<div class="control-label">
																									<label><?php echo $this->_tpl_vars['LANG']['main_common_default']; ?>
</label>
																								</div>
																								<div class="controls">
																									<label class="select">
																										<select name="commentdefault">
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_close']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_close']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['main_blog_close']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_open']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_open']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_open']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_require']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_require']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['main_blog_require']; ?>
</option>
																										</select>
																										<i></i>
																									</label>
																								</div>
																							</li>
																							<li class="control-group">	
																								<div class="control-label">
																									<label><?php echo $this->_tpl_vars['LANG']['main_blog_post']; ?>
</label>
																								</div>
																								<div class="controls">
																									<label class="select">
																										<select name="postperpage">
																											 <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=51) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
																												<option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['post_perpage'] == $this->_sections['foo']['index']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option>
																											 <?php endfor; endif; ?>
																										</select>
																										<i></i>
																									</label>
																								</div>
																							</li>
																							<li class="control-group">	
																								<div class="control-label">
																									<label><?php echo $this->_tpl_vars['LANG']['main_blog_notify']; ?>
</label>
																								</div>
																								<div class="controls">
																									<label class="select">
																										<select name="notifyme">
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_yes']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['notifyme'] == $this->_tpl_vars['LANG']['main_blog_yes']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_yes']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_no']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['notifyme'] == $this->_tpl_vars['LANG']['main_blog_no']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_no']; ?>
</option>
																										</select>
																										<i></i>
																									</label>
																									<div class="dc"><span class="txtBoxBlogPop_at">at</span></div>
																									<input class="txtBoxBlogPopComment" type="text" name="notifyme_email" id="notifyme_email" value="<?php echo $this->_tpl_vars['blogsetting_list']['0']['notifyme_email']; ?>
" placeholder="<?php echo $this->_tpl_vars['LANG']['main_notiyemail']; ?>
">
																								</div>
																							</li>
																							<li class="control-group">	
																								<div class="control-label">
																									<label><?php echo $this->_tpl_vars['LANG']['main_blog_autocomment']; ?>
</label>
																								</div>
																								<div class="controls">
																									<label class="select">
																										<select name="automaticallyclose">
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_never']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_never']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_never']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_afterthird']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_afterthird']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_afterthird']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_aftersix']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_aftersix']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_aftersix']; ?>
</option>
																											<option value="<?php echo $this->_tpl_vars['LANG']['main_blog_afternine']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_afternine']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_afternine']; ?>
</option>
																										</select>
																										<i></i>
																									</label>
																								</div>
																							</li>
																							<li class="control-group">	
																								<div class="control-label">
																									<label><?php echo $this->_tpl_vars['LANG']['main_blog_share_but']; ?>
</label>
																								</div>
																								<div class="controls">
																									<input class="no-mar" type="checkbox" name="sharebutton" id="sharebutton" value="1" <?php if ($this->_tpl_vars['blogsetting_list']['0']['sharebutton'] == '1'): ?>checked<?php endif; ?>> <?php echo $this->_tpl_vars['LANG']['main_blog_share']; ?>

																								</div>
																							</li>
																						</ul>
																						<input type="button" name="updatesetting" class="btn btn-info pull-right" id="updatesetting" onclick="updateBlogSetting();" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
">
																					</form>	
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="blogRight">	
																	<div class="blogRhtInner">
																																																						<div id="author_id" class="authorTxtBg">
																			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "authorBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
																		</div>
																																			<div id="archives_id" class="achiverTxtBg clearfix">
																			
																			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "archivesBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
																			
																		</div>
																		<div class="authCont"><?php echo ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</div>
																		<div id="cat_id" class="CatBg">
																			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "categoriesBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
																		</div>
																			<div class="userList">
																				<?php echo $this->_tpl_vars['objCommon']->selectCat(); ?>

																					<a onclick="return selectPostBasdCat('<?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_id']; ?>
');"><div class="authCont"><?php echo $this->_tpl_vars['LANG']['all_categories']; ?>
</div> </a>
																				 <?php unset($this->_sections['category']);
$this->_sections['category']['name'] = 'category';
$this->_sections['category']['loop'] = is_array($_loop=($this->_tpl_vars['cate'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['category']['show'] = true;
$this->_sections['category']['max'] = $this->_sections['category']['loop'];
$this->_sections['category']['step'] = 1;
$this->_sections['category']['start'] = $this->_sections['category']['step'] > 0 ? 0 : $this->_sections['category']['loop']-1;
if ($this->_sections['category']['show']) {
    $this->_sections['category']['total'] = $this->_sections['category']['loop'];
    if ($this->_sections['category']['total'] == 0)
        $this->_sections['category']['show'] = false;
} else
    $this->_sections['category']['total'] = 0;
if ($this->_sections['category']['show']):

            for ($this->_sections['category']['index'] = $this->_sections['category']['start'], $this->_sections['category']['iteration'] = 1;
                 $this->_sections['category']['iteration'] <= $this->_sections['category']['total'];
                 $this->_sections['category']['index'] += $this->_sections['category']['step'], $this->_sections['category']['iteration']++):
$this->_sections['category']['rownum'] = $this->_sections['category']['iteration'];
$this->_sections['category']['index_prev'] = $this->_sections['category']['index'] - $this->_sections['category']['step'];
$this->_sections['category']['index_next'] = $this->_sections['category']['index'] + $this->_sections['category']['step'];
$this->_sections['category']['first']      = ($this->_sections['category']['iteration'] == 1);
$this->_sections['category']['last']       = ($this->_sections['category']['iteration'] == $this->_sections['category']['total']);
?>
																					<a onclick="return selectPostBasdCat('<?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_id']; ?>
');"> <div class="authCont"><?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_name']; ?>
</div> </a>
																				 <?php endfor; endif; ?>
																			</div>
																																					
																	</div>
																</div>
															</div>
														</li>
													</ul>
												<?php endif; ?>
											<?php endif; ?>	
										<?php endif; ?>
																				<?php if ($_SESSION['domain_id']): ?>
										<?php if (! $this->_tpl_vars['objCommon']->getBlogComment($_SESSION['page_id'])): ?>
											<input type="hidden" class="dropvalue" value="" />
											<div id="dropBox" class="dropBox clearfix pull-left">
												<ul id="sortable" class="clearfix sortouterHeight">
													  
													<?php unset($this->_sections['pagelist']);
$this->_sections['pagelist']['name'] = 'pagelist';
$this->_sections['pagelist']['loop'] = is_array($_loop=($this->_tpl_vars['pagefirstlist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pagelist']['show'] = true;
$this->_sections['pagelist']['max'] = $this->_sections['pagelist']['loop'];
$this->_sections['pagelist']['step'] = 1;
$this->_sections['pagelist']['start'] = $this->_sections['pagelist']['step'] > 0 ? 0 : $this->_sections['pagelist']['loop']-1;
if ($this->_sections['pagelist']['show']) {
    $this->_sections['pagelist']['total'] = $this->_sections['pagelist']['loop'];
    if ($this->_sections['pagelist']['total'] == 0)
        $this->_sections['pagelist']['show'] = false;
} else
    $this->_sections['pagelist']['total'] = 0;
if ($this->_sections['pagelist']['show']):

            for ($this->_sections['pagelist']['index'] = $this->_sections['pagelist']['start'], $this->_sections['pagelist']['iteration'] = 1;
                 $this->_sections['pagelist']['iteration'] <= $this->_sections['pagelist']['total'];
                 $this->_sections['pagelist']['index'] += $this->_sections['pagelist']['step'], $this->_sections['pagelist']['iteration']++):
$this->_sections['pagelist']['rownum'] = $this->_sections['pagelist']['iteration'];
$this->_sections['pagelist']['index_prev'] = $this->_sections['pagelist']['index'] - $this->_sections['pagelist']['step'];
$this->_sections['pagelist']['index_next'] = $this->_sections['pagelist']['index'] + $this->_sections['pagelist']['step'];
$this->_sections['pagelist']['first']      = ($this->_sections['pagelist']['iteration'] == 1);
$this->_sections['pagelist']['last']       = ($this->_sections['pagelist']['iteration'] == $this->_sections['pagelist']['total']);
?>
														<!--<div id="dropBox2" class="dropBox2 clearfix" style="position:relative;">-->
															<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_show']): ?>
																<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="">
																<ul id="dropBox2" class="dropBox2 clearfix" style="position:relative;">
																<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
																	<div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','column_show');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																	<div class="columnPop">
																		<div class="columnPopLeft"></div>
																		<div class="columnPopContent">
																			<select class="columncount" onchange="selecttochange(this,'<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																				<option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '3'): ?>selected="selected"<?php endif; ?>>2</option>
																				<option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '4'): ?>selected="selected"<?php endif; ?>>3</option>
																				<option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '5'): ?>selected="selected"<?php endif; ?>>4</option>
																				<option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '6'): ?>selected="selected"<?php endif; ?>>5</option>
																			</select>
																		</div>
																		<div class="columnPopRight"></div>
																	</div>
																	<!--<table onmouseover="columnId(this);" onmouseleave="columnIdOut(this);" class="sample2 columsBor" width="100%" border="0" cellpadding="0" cellspacing="0">-->			
																	<div class="tablesampleouter">
																		<table class="sample2 columsBor" border="0" cellpadding="0" cellspacing="0">
																			<tr>
																				 <?php unset($this->_sections['rowcount']);
$this->_sections['rowcount']['name'] = 'rowcount';
$this->_sections['rowcount']['start'] = (int)1;
$this->_sections['rowcount']['loop'] = is_array($_loop=$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rowcount']['show'] = true;
$this->_sections['rowcount']['max'] = $this->_sections['rowcount']['loop'];
$this->_sections['rowcount']['step'] = 1;
if ($this->_sections['rowcount']['start'] < 0)
    $this->_sections['rowcount']['start'] = max($this->_sections['rowcount']['step'] > 0 ? 0 : -1, $this->_sections['rowcount']['loop'] + $this->_sections['rowcount']['start']);
else
    $this->_sections['rowcount']['start'] = min($this->_sections['rowcount']['start'], $this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] : $this->_sections['rowcount']['loop']-1);
if ($this->_sections['rowcount']['show']) {
    $this->_sections['rowcount']['total'] = min(ceil(($this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] - $this->_sections['rowcount']['start'] : $this->_sections['rowcount']['start']+1)/abs($this->_sections['rowcount']['step'])), $this->_sections['rowcount']['max']);
    if ($this->_sections['rowcount']['total'] == 0)
        $this->_sections['rowcount']['show'] = false;
} else
    $this->_sections['rowcount']['total'] = 0;
if ($this->_sections['rowcount']['show']):

            for ($this->_sections['rowcount']['index'] = $this->_sections['rowcount']['start'], $this->_sections['rowcount']['iteration'] = 1;
                 $this->_sections['rowcount']['iteration'] <= $this->_sections['rowcount']['total'];
                 $this->_sections['rowcount']['index'] += $this->_sections['rowcount']['step'], $this->_sections['rowcount']['iteration']++):
$this->_sections['rowcount']['rownum'] = $this->_sections['rowcount']['iteration'];
$this->_sections['rowcount']['index_prev'] = $this->_sections['rowcount']['index'] - $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['index_next'] = $this->_sections['rowcount']['index'] + $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['first']      = ($this->_sections['rowcount']['iteration'] == 1);
$this->_sections['rowcount']['last']       = ($this->_sections['rowcount']['iteration'] == $this->_sections['rowcount']['total']);
?>
																					<td class="addwidth" id="col_<?php echo $this->_sections['rowcount']['index']; ?>
" <?php if ($this->_sections['rowcount']['index'] == ''): ?> $pagefirstlist[pagelist].column_count}style="display:none;"<?php endif; ?> <?php if ($this->_sections['rowcount']['index'] == '1'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col1']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col1']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '2'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col2']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col2']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '3'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col3']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col3']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '4'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col4']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col4']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '5'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col5']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col5']; ?>
px;"<?php endif;  endif; ?>>
																					<input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																						<!---COlumn Sortable---->
																						<ul id="sortable_<?php echo $this->_sections['rowcount']['index']; ?>
" class="clearfix no-mar sortcolumn">
																								<?php echo $this->_tpl_vars['objCommon']->getColumnPageList($this->_sections['rowcount']['index'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

																								<?php if ($this->_tpl_vars['columnpagefirstlist']): ?>
																								<?php unset($this->_sections['colpagelist']);
$this->_sections['colpagelist']['name'] = 'colpagelist';
$this->_sections['colpagelist']['loop'] = is_array($_loop=($this->_tpl_vars['columnpagefirstlist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['colpagelist']['show'] = true;
$this->_sections['colpagelist']['max'] = $this->_sections['colpagelist']['loop'];
$this->_sections['colpagelist']['step'] = 1;
$this->_sections['colpagelist']['start'] = $this->_sections['colpagelist']['step'] > 0 ? 0 : $this->_sections['colpagelist']['loop']-1;
if ($this->_sections['colpagelist']['show']) {
    $this->_sections['colpagelist']['total'] = $this->_sections['colpagelist']['loop'];
    if ($this->_sections['colpagelist']['total'] == 0)
        $this->_sections['colpagelist']['show'] = false;
} else
    $this->_sections['colpagelist']['total'] = 0;
if ($this->_sections['colpagelist']['show']):

            for ($this->_sections['colpagelist']['index'] = $this->_sections['colpagelist']['start'], $this->_sections['colpagelist']['iteration'] = 1;
                 $this->_sections['colpagelist']['iteration'] <= $this->_sections['colpagelist']['total'];
                 $this->_sections['colpagelist']['index'] += $this->_sections['colpagelist']['step'], $this->_sections['colpagelist']['iteration']++):
$this->_sections['colpagelist']['rownum'] = $this->_sections['colpagelist']['iteration'];
$this->_sections['colpagelist']['index_prev'] = $this->_sections['colpagelist']['index'] - $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['index_next'] = $this->_sections['colpagelist']['index'] + $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['first']      = ($this->_sections['colpagelist']['iteration'] == 1);
$this->_sections['colpagelist']['last']       = ($this->_sections['colpagelist']['iteration'] == $this->_sections['colpagelist']['total']);
?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['title_select']): ?>
																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">								
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','title_select');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onmouseout="updateTitle('buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_title" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Başlığı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'];  endif; ?></div>
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['description_select']): ?>
																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','description_select');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>								
																											<div id="buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_paragraph" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>" onmouseout="updateDesc('buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" contenteditable="true"  data-ph="Paragrafı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'];  endif; ?></div>					
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['divider']): ?>
																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','divider');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="buildDivide" class="">
																												<hr />
																											</div>
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_multiple_select']): ?>
																										<?php echo $this->_tpl_vars['objCommon']->getImageText($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist'],'singletext'); ?>

																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="buildImgTxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildImgTxtOuter">
																												<div class="row-fluid">
																													<div class="span3 buildImgTxt <?php if (! $this->_tpl_vars['images']): ?>minimagewidth<?php endif; ?>">
																														<?php if (! $this->_tpl_vars['images']): ?>	
																																																														<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																															<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																																<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																																	<div class="button">
																																		<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																																	</div>
																																	<input type='hidden' name="status" value="singletext"/>
																																	<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																																</label>
																															</form>
																														<?php else: ?>
																															<div class="uploadImgBg">
																																<img class="imagechangeNew" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
">
																																
																																<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																																<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																																	<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																																		<div class="button">
																																			<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																																		</div>
																																		<input type='hidden' name="status" value="singletext"/>
																																		<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																																	</label>
																																</form>
																															</div>
																														<?php endif; ?>
																													</div>
																													<div class="span9">
																														<div id="imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onmouseout="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead borNone <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_imagetitle" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'];  endif; ?></div> 
																													</div>
																												</div>
																											</div>
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_select']): ?>
																									<?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_select');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="buildImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid">
																											 <?php if (! $this->_tpl_vars['images']): ?>
																																																								<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																												<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																												<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																													<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																														<div class="button">
																															<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																														</div>
																														<input type='hidden' name="status" value="single"/>
																														<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																													</label>
																												</form>
																											<?php else: ?>
																												<div class="uploadImgBg">
																													<img class="imagechange" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
">
																																																										<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																													<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0; clear:both;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
																														<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																															<div class="button">
																																<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																															</div>
																															<input type='hidden' name="status" value="single"/>
																															<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																														</label>
																													</form>
																												</div>
																											<?php endif; ?>
																											</div>
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['contact_form']): ?>
																										<?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','contact_form');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="" class="contactform">
																												<!--<div  onclick="showContactMail();">
																													Form Entries
																												</div>-->
																												
																												<a data-toggle="modal" href="#ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="formEntryButton pull-right">Form Entries</a>
																												<div class="themeheadsec contentedit <?php if ($this->_tpl_vars['contactlist']['0']['title_head'] == ''): ?>clickheretext contenttext <?php endif; ?>contactTxt contactHead" style="<?php if ($this->_tpl_vars['contactlist']['0']['buildContact_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_fontcolor']): ?>color:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontcolor'];  endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_style']): ?>font-family:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_line_size']): ?>line-height:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_size']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_size']; ?>
px;<?php endif; ?>" id="buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
" onmouseout="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" data-ph="Edit Heading Here"><?php if ($this->_tpl_vars['contactlist']['0']['title_head']):  echo $this->_tpl_vars['contactlist']['0']['title_head'];  endif; ?></div>
																												<div class="row-fluid marTop10"> 	
																													<div class="span12 relatepop">
																														<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php echo $this->_tpl_vars['contactlist']['0']['text1']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
																														<div class="clearfix"></div>
																														<input type="text" value="" placeholder="First name" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?>
																													</div>
																												</div>
																												<div class="row-fluid marTop10"> 
																													<div class="span12 relatepop">
																														<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
																														<div class="clearfix"></div>
																														<input type="text" value="" placeholder="Last name" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?>
																													</div>
																												</div>
																												<div class="row-fluid marTop10 relatepop">
																													<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php echo $this->_tpl_vars['contactlist']['0']['text3']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
																													<div class="clearfix"></div>
																													<input type="text" value="" placeholder="E-mail" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?>
																												</div>
																												<div class="row-fluid marTop10 relatepop">
																													<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
																													<div class="clearfix"></div>
																													<textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"></textarea><?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?>
																												</div>
																												<div class="row-fluid marTop10">
																													<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" class="buildPagePostButton"> </div>
																												</div>
																											</div>
																											
																																																						<div id="modals">
																												<div id="ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="modal hide">
																													<div class="formEntryPopForm clearfix">
																														<div id="errtext"></div>
																														<?php echo $this->_tpl_vars['objCommon']->getEmai($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																														<form name="conatctmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="no-mar">
																															<div id="errtext"></div>
																															<input type="text" name="contactmail" id="contactmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['mailid']; ?>
" >
																															<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																														</form>
																														<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">Kapat</button>
																													</div>
																												</div>
																											</div>
																											<div id="contactForm"></div>	
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['social_plugins']): ?>
																									<?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div class="moveicon"></div>
																											<div id="buildSocial_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildSocialIcon">
																												<input type="button" class="fbicon" value="" />
																												<input type="button" class="twittericon" value="" />
																												<input type="button" class="linkedicon" value="" />
																												<input type="button" class="mailicon" value="" />
																											</div>
																											
																											<div id="pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="socialPop" style="display:none;">
																												<div class="leftside">
																													<i class="fa fa-users fontSize42"></i>
																													<label><?php echo $this->_tpl_vars['LANG']['social_link_name']; ?>
</label>
																												</div>
																												<div class="rightside">
																													<form class="no-mar" id="socialplugin_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" name="socialplugin" method="post">
																														<input type="hidden" name="domain_id" id="domain_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id']; ?>
">
																														<input type="hidden" name="page_id" id="page_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['page_id']; ?>
">
																														<input type="hidden" name="page_list_id" id="page_list_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																														<div class="socialInn clearfix">
																															<span><i class="fa fa-facebook"></i></span>
																															<input type="text" name="fb" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['fb']; ?>
" id="fb_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://facebook.com/ornek">
																														</div>
																														<div class="socialInn clearfix">
																															<span><i class="fa fa fa-tumblr"></i></span>
																															<input type="text" name="tw" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['twitter']; ?>
" id="tw_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://twitter.com/ornek">
																														</div>
																														<div class="socialInn clearfix">
																															<span><i class="fa fa-linkedin"></i></span>
																															<input type="text" name="ln" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['linkedin']; ?>
" id="ln_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://linkedin.com/in/ornek">
																														</div>
																														<div class="socialInn clearfix">
																															<span><i class="fa fa fa-envelope-o"></i></span>
																															<input type="text" name="mail" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['mail']; ?>
" id="mail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="ornek@ornek.com">
																														</div>
																														<div class="mapButton clearfix">
																															<input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																															<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();">
																														</div>
																												   </form>
																												 </div>
																											</div>
																										</li>
																									<?php endif; ?>
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['youtube_video']): ?>
																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','youtube_video');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails_buildpage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																											<div class="youtubeDiv clearfix" id="youtubeDiv_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" style="display:block;<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
																												<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
" width="100%" height="200"></iframe>	
																											</div>
																											<div class="youtubelabelsPopup" id="youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;">
																												<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
																												
																												<form name="youtubefrm_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
																													<div id="error_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"></div>
																													<div class="contactlabelsPopupLeft">
																														<label>Youtube Video Adresi</label>
																														<input type="text" class="videoUrl" name="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
"/>
																													</div>
																													<div class="contactlabelsPopupRight">
																														<div class="contactlabelsPopupRightInner">
																															<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																															<select class="spacingOption" name="spacing" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																															</select>
																															<label>Genişlik</label>
																															<select class="widthOption" name="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="Küçük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>selected="selected"<?php endif; ?>>Küçük</option>
																																<option value="Orta" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>selected="selected"<?php endif; ?>>Orta</option>
																																<option value="Büyük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>selected="selected"<?php endif; ?>>Büyük</option>
																															</select>
																														</div>
																														<div>
																															<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																														</div>
																													</div>
																												</form>
																											</div>
																										</li>
																									<?php endif; ?>
																									<!--Gallery Process Start-->
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery']): ?>
																										 <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																											<div class="form_element_control">
																												<div class="controlMidOuter">
																													<div class="controlMidBg"></div>
																												</div>
																												<div class="deleteOuter">
																													<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','gallery');"><i class="fa fa-trash-o"></i></div>
																												</div>
																											</div>
																											<div id="galImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid center columngallery">
																											 <?php echo $this->_tpl_vars['objCommon']->getGalleryImage($_SESSION['domain_id'],$_SESSION['page_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																											 <?php if ($this->_tpl_vars['images']): ?>
																												 <?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galimg']['show'] = true;
$this->_sections['galimg']['max'] = $this->_sections['galimg']['loop'];
$this->_sections['galimg']['step'] = 1;
$this->_sections['galimg']['start'] = $this->_sections['galimg']['step'] > 0 ? 0 : $this->_sections['galimg']['loop']-1;
if ($this->_sections['galimg']['show']) {
    $this->_sections['galimg']['total'] = $this->_sections['galimg']['loop'];
    if ($this->_sections['galimg']['total'] == 0)
        $this->_sections['galimg']['show'] = false;
} else
    $this->_sections['galimg']['total'] = 0;
if ($this->_sections['galimg']['show']):

            for ($this->_sections['galimg']['index'] = $this->_sections['galimg']['start'], $this->_sections['galimg']['iteration'] = 1;
                 $this->_sections['galimg']['iteration'] <= $this->_sections['galimg']['total'];
                 $this->_sections['galimg']['index'] += $this->_sections['galimg']['step'], $this->_sections['galimg']['iteration']++):
$this->_sections['galimg']['rownum'] = $this->_sections['galimg']['iteration'];
$this->_sections['galimg']['index_prev'] = $this->_sections['galimg']['index'] - $this->_sections['galimg']['step'];
$this->_sections['galimg']['index_next'] = $this->_sections['galimg']['index'] + $this->_sections['galimg']['step'];
$this->_sections['galimg']['first']      = ($this->_sections['galimg']['iteration'] == 1);
$this->_sections['galimg']['last']       = ($this->_sections['galimg']['iteration'] == $this->_sections['galimg']['total']);
?>
																													<div class="imageGallery" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else: ?>width:49%;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
																														<img width="100%" height="200" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
">
																														<div class="galleryimageInn">
																															<a onclick="deleteGalImg('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																															<a class="galleryimage galleryimagecomm" id="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"><i class="fa fa-plus-square-o"></i></a>
																														</div>
																													</div>
																												 <?php endfor; endif; ?>
																												 
																											 <?php else: ?>
																																																								<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																												<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																												<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																													<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																														<div class="button">
																															<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																														</div>
																														<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																													</label>
																												</form>
																											  <?php endif; ?>
																											  </div>
																											  <!--Gallery Image Popup-->
																												<div id="galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;" class="galleryimagepop">
																													<form name="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
																														<div class="leftside">
																															<i class="fa fa-picture-o"></i>
																															<div class="clr"></div>
																															<a onclick="showGalleryPopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" style="cursor:pointer;"><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</a>
																														</div>
																														<div class="rightside">
																															<label><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</label>
																															<select class="columnOption" name="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="2" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>selected<?php endif; ?>>2</option>
																																<option value="3" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>selected<?php endif; ?>>3</option>
																																<option value="4" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>selected<?php endif; ?>>4</option>
																																<option value="5" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>selected<?php endif; ?>>5</option>
																																<option value="6" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>selected<?php endif; ?>>6</option>
																															</select>
																															<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																															<select class="imagespacingOption" name="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																															</select>
																															<label><?php echo $this->_tpl_vars['LANG']['border_name']; ?>
</label>
																															<select class="borderOption" name="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																																<option value="<?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
</option>
																															</select>
																															<!--<label>Cropping</label>
																															<select class="widthOption" name="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																																<option value="None">None</option>
																																<option value="Square">Square</option>
																																<option value="Rectangle">Rectangle</option>
																															</select>-->
																															<div class="clearfix">
																																<input type="button" class="btn btn-success pull-left" value="save" onclick="addgalleryProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																																<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																															</div>
																														</div>
																													</form>
																												</div>
																												
																													<div id="galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imagepopupdiv" aria-hidden="false">
																														<div id="image-chooser-nav">
																															<div id="image-chooser-nav-label">
																																<div><?php echo $this->_tpl_vars['LANG']['select_image_from']; ?>
</div>
																															</div>
																															<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																																<div class="colWhite">
																																	<span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>

																																</div>
																															</div>
																															<div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();$('#masktable').hide();">X</div>
																														</div>
																														<div id="browsebutton" class="popBrowseInner">
																																																														<div id='imageloadstatus' style="display:none;">
																																<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
																															</div>
																															<form id="galimagephotogal<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																																<div class="uploadTxtPop"><?php echo $this->_tpl_vars['LANG']['click_here_to_upload']; ?>
</div>
																																<label for="file" class="input input-file no-mar" style="display:block"  name="imageloadbutton" id="imageloadbutton">
																																	<div class="button">
																																		<input type="file" class="hei180" value="" onchange="galimagupdate('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
')" name="photos[]" id="galimgphoto">
																																	</div>
																																	<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																																</label>
																															</form>
																															
																														</div>
																													</div>
																												<div id="masktable" style="display:none;"></div>
																												<!--Gallery Image Popup Ends-->
																										</li>
																									<?php endif; ?>
																									<!--Gallery Process End-->
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map']): ?>
																										 <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showMapPopUp('mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="activemove theme2bginn posRel">
																											 <div class="form_element_control">
																													<div class="controlMidOuter">
																														<div class="controlMidBg"></div>
																													</div>
																													<div class="deleteOuter">
																														<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																													</div>
																												</div>
																											<div class="moveicon"></div>
																											 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
																												<div id="mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="mappop" style="display:none;">
																													<div class="leftside">
																														<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/map_marker.png" alt="map image"/>
																														<label><?php echo $this->_tpl_vars['LANG']['map_name']; ?>
</label>
																													</div>
																													<div class="rightside">
																														<form name="mapframepopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar" method="post">
																															<label><?php echo $this->_tpl_vars['LANG']['address_name']; ?>
</label>
																															<input class="mapinputTxt" type="text" name="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
">
																															<label><?php echo $this->_tpl_vars['LANG']['zoom_name']; ?>
</label>
																																																														<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
" onkeypress="keypress();">
																															<label>latitude</label>
																															<input class="mapinputTxt" type="text" name="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
">
																															<label>longtitude</label>
																															<input class="mapinputTxt" type="text" name="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
">
																															<div class="mapButton clearfix">
																																<input type="button" value="save" class="btn btn-success"  onclick="addMapProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																																<input type="button" value="cancel" class="btn btn-danger pull-right mapcancel" />
																															</div>
																													   </form>
																													 </div>
																												</div>
																											 </li>
																									<?php endif; ?>
																									<!--slider process start-->
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['slider']): ?>
																											<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
																												<div class="form_element_control">
																													<div class="controlMidOuter">
																														<div class="controlMidBg"></div>
																													</div>
																													<div class="deleteOuter">
																														<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','slider');"><i class="fa fa-trash-o"></i></div>
																													</div>
																												</div>
																												<div id="sliImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid hoverSlide">
																												 <?php echo $this->_tpl_vars['objCommon']->getSliderImageNew($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																													 <div id="slider_images" class="buildColumnPageSlider" style="<?php if ($this->_tpl_vars['slider_images']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
																														 <div class="nivoSlider nivoSliderImg">
																															 <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['slider_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																																<div class="imageSlider">
																																	<img width="100%" height="300" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/> 			 
																																</div>
																															 <?php endfor; endif; ?>
																														 </div>
																														 <div class="clr"></div>
																													 </div>
																													 <div id="sliderform">													   
																													   <?php if ($this->_tpl_vars['slider_images']): ?>
																															<a class="ColsliderNoImg2" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">Düzenle</a>
																														<?php endif; ?>
																														<?php if (! $this->_tpl_vars['slider_images']): ?>
																															<a class="ColsliderNoImg1" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></a>
																														<?php endif; ?>														
																													  </div>
																												</div>
																											</li>  
																										<?php endif; ?>
																									<!--slider process end-->								
																									<!--Google Adsense Start-->
																									<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_adsense']): ?>
																										<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																												<div class="form_element_control">
																													<div class="controlMidOuter">
																														<div class="controlMidBg"></div>
																													</div>
																													<div class="deleteOuter">
																														<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','google_adsense');"><i class="fa fa-trash-o"></i></div>
																													</div>
																												</div>
																												<input type='radio' name="google_ads" id="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="scriptImgInput" value="script" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																												<label class="scriptImg" for="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																													<div class="scriptInner">
																														<div class="scriptImage"><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</div>
																													</div>
																												</label>
																												<input type='radio' name="google_ads" id="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imgaeImgInput" value="image" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																												<label class="imgaeImg" for="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																													<div class="imageInner">
																														<div class="imageHead"><?php echo $this->_tpl_vars['LANG']['image_name']; ?>
</div>
																														<div class="imageImage"></div>
																													</div>
																												</label>
																												
																												<div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop">
																													<div class="leftside">
																														<i class="fa fa-file-text-o fontSize42"></i>
																														<label><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</label>
																													</div>
																													<div class="rightside">
																														<form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																															<label><?php echo $this->_tpl_vars['LANG']['adress_name']; ?>
</label>
																															<input type="hidden" name="script" id="script" value="script">
																															 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"   placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
																															 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																															
																															<div class="mapButton clearfix">
																																 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																																<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" />
																	
																															</div>
																													   </form>
																													 </div>
																												</div>
																												
																												<!--<div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>  style="display:block;"<?php else: ?>style="display:none;" <?php endif; ?>>
																													<form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																													<input type="hidden" name="script" id="script" value="script">
																													 <textarea name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_ansen" placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
																													 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																													 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																													</form>  
																												</div>-->
																												
																												<?php echo $this->_tpl_vars['objCommon']->getImageGoogle($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																												<div id="images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>  style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>>
																											 <?php if (! $this->_tpl_vars['images_google']): ?>
																												
																																																								<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																												<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>
																												<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
																													<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																														<div class="button">
																															<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																														</div>
																														<input type='hidden' name="image" id="image" value="image"/>
																														<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																													</label>
																												</form>
																											<?php else: ?>
																											  
																												<div class="googAddOption">
																													<img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"> 
																													<!--<img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"> -->
																													<div class="googAddDelete">
																														<a class="galleryimage" onclick="deletegoogleImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
');">
																															<i class="fa fa-trash-o"></i>
																														</a>
																													</div>
																													<a class="googAddUrl" onclick="showAddUrl('urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"> <?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</a>
																												</div>
																												
																												<div id="urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop" style="display:none;">
																													<div class="leftside">
																														<i class="fa fa-external-link fontSize42"></i>
																														<label><?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</label>
																													</div>
																													<div class="rightside">
																														<form name="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																															<label><?php echo $this->_tpl_vars['LANG']['url_name']; ?>
</label>
																															<input type="text" name="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_url_text" value="<?php echo $this->_tpl_vars['images_google']['0']['google_url']; ?>
">
																															<input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																															<input type='hidden' name="google_image_id" id="google_image_id" value="<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
"/>
																															
																															<div class="mapButton clearfix">
																																 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
');">
																																<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" />
																	
																															</div>
																													   </form>
																													 </div>
																												</div>											 
																											<?php endif; ?>
																											</div>
																										</li>
																									<?php endif; ?>
																									<!--Google Adsense End-->
																								<?php endfor; endif; ?>
																							<?php else: ?>
																								<div class="columnDragTxt">MODÜLLERİ BURAYA SÜRÜKLEYİP BIRAKIN</div>
																							<?php endif; ?>
																						</ul>
																						<!---column sortable--->	
																					</td>
																				 <?php endfor; endif; ?>
																			</tr>
																		</table>
																	</div>
																</li>
																</ul>
																</li>		
															<?php endif; ?>
														<!--</div>-->
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['title_select']): ?>
														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">								
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','title_select');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="buildTitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onmouseout="updateTitle('buildTitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="themehead <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_title" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Başlığı Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title'];  endif; ?></div>
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['description_select']): ?>
														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','description_select');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>								
															<div id="buildPara_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_paragraph" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>" onmouseout="updateDesc('buildPara_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" contenteditable="true"  data-ph="Paragrafı Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description'];  endif; ?></div>					
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['divider']): ?>
														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','divider');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="buildDivide" class="">
																<hr />
															</div>
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_multiple_select']): ?>
														<?php echo $this->_tpl_vars['objCommon']->getImageText($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist'],'singletext'); ?>

														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="buildImgTxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="buildImgTxtOuter">
																<div class="row-fluid ">
																	<div class="span3 buildImgTxt <?php if (! $this->_tpl_vars['images']): ?>minimagewidth<?php endif; ?>">
																		<?php if (! $this->_tpl_vars['images']): ?>	
																																				<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
																			<div class="laodImgChange">
																				<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/>
																			   </div>
																		 </div>
																		<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																			<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																				<div class="button">
																					<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																				</div>
																				<input type='hidden' name="status" value="singletext"/>
																				<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																			</label>
																		</form>
																		<!--<div class="hideupload">
																			<div id="mulitplefileuploader_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">Upload</div>
																			<img width="93%" height="180" class="uploadedImg" id="image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" src="" />																			<div id="progressbar">0 %</div>
																		</div>-->
																		<?php else: ?>
																			<div class="uploadImgBg">
																				<img class="imagechangeNew"  width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
">
																																								<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																				<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																					<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																						</div>
																						<input type='hidden' name="status" value="singletext"/>
																						<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																					</label>
																				</form>
																			</div>
																		<?php endif; ?>
																	</div>
																	<div class="span9">
																		<div id="imgtitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onmouseout="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="themehead borNone <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_imagetitle" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text'];  endif; ?></div> 
																	</div>
																</div>
															</div>
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_select']): ?>
														<?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','image_select');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="buildImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid buildimage" title="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="">
																<?php if (! $this->_tpl_vars['images']): ?>
																																<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
																	<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
																</div>
																<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																	<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																		<div class="button">
																				<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																		</div>
																		<input type='hidden' name="status" value="single"/>
																		<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																	</label>
																</form>
																<input type="hidden" name="imagesuploadNumbers" id="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																<!--<div class="hideupload">
																	<div id="mulitplefileuploader_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">Upload</div>
																	<img width="93%" height="180" class="uploadedImg" id="image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" src="" />
																	<div id="progressbar">0 %</div>
																	
																</div>-->
																<?php else: ?>
																	<div class="uploadImgBg">
																		<img class="imagechange" width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
"/>
																																				<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																		<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																			<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																				<div class="button">
																					<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																				</div>
																				<input type='hidden' name="status" value="single"/>
																				<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																			</label>
																		</form>
																	</div>
																<?php endif; ?>
															</div>
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['contact_form']): ?>
													   <?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','contact_form');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="" class="contactform">
																<!--<div  onclick="showContactMail();">
																	Form Entries
																</div>-->
																
																<a data-toggle="modal" href="#ModalFormEntry_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="formEntryButton pull-right">Form Girişleri</a>
																<div class="themeheadsec contentedit <?php if ($this->_tpl_vars['contactlist']['0']['title_head'] == ''): ?>clickheretext contenttext <?php endif; ?>contactTxt contactHead" style="<?php if ($this->_tpl_vars['contactlist']['0']['buildContact_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_fontcolor']): ?>color:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontcolor'];  endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_style']): ?>font-family:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_line_size']): ?>line-height:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_size']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_size']; ?>
px;<?php endif; ?>" id="buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
" onmouseout="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" data-ph="Edit Heading Here"><?php if ($this->_tpl_vars['contactlist']['0']['title_head']):  echo $this->_tpl_vars['contactlist']['0']['title_head'];  endif; ?></div>
																<div class="row-fluid"> 	
																	<div class="span4 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php echo $this->_tpl_vars['contactlist']['0']['text1']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
																		<input type="text" value="" placeholder="Ad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?>
																	</div>
																	<div class="span4 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
																		<input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?>
																	</div>
																</div>
																<div class="row-fluid marTop10 relatepop">
																	<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php echo $this->_tpl_vars['contactlist']['0']['text3']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
																	<input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?>
																</div>
																<div class="row-fluid marTop10 relatepop">
																	<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
																	<textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"></textarea><?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?>
																</div>
																<div class="row-fluid marTop10">
																	<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" class="buildPagePostButton"> </div>
																</div>
															</div>
															
																														<div id="modals">
																<div id="ModalFormEntry_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="modal hide">
																	<div class="formEntryPopForm clearfix">
																		<div id="errtext"></div>
																		<?php echo $this->_tpl_vars['objCommon']->getEmai($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

																		<form name="conatctmail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" class="no-mar">
																			<div id="errtext"></div>
																			<input type="text" name="contactmail" id="contactmail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['mailid']; ?>
" >
																			<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																		</form>
																		<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">Kapat</button>
																	</div>
																</div>
															</div>
															<div id="contactForm"></div>	
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugins']): ?>
														<?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div class="moveicon"></div>
															<div id="buildSocial_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="buildSocialIcon">
																<input type="button" class="fbicon" value="" />
																<input type="button" class="twittericon" value="" />
																<input type="button" class="linkedicon" value="" />
																<input type="button" class="mailicon" value="" />
															</div>
															
															<div id="pluginShow_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="socialPop" style="display:none;">
																<div class="leftside">
																	<i class="fa fa-users fontSize42"></i>
																	<label><?php echo $this->_tpl_vars['LANG']['social_link_name']; ?>
</label>
																</div>
																<div class="rightside">
																	<form class="no-mar" id="socialplugin_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" name="socialplugin" method="post">
																		<input type="hidden" name="domain_id" id="domain_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id']; ?>
">
																		<input type="hidden" name="page_id" id="page_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id']; ?>
">
																		<input type="hidden" name="page_list_id" id="page_list_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																		<div class="socialInn clearfix">
																			<span><i class="fa fa-facebook"></i></span>
																			<input type="text" name="fb" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['fb']; ?>
" id="fb_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://facebook.com/ornek">
																		</div>
																		<div class="socialInn clearfix">
																			<span><i class="fa fa fa-tumblr"></i></span>
																			<input type="text" name="tw" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['twitter']; ?>
" id="tw_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://twitter.com/ornek">
																		</div>
																		<div class="socialInn clearfix">
																			<span><i class="fa fa-linkedin"></i></span>
																			<input type="text" name="ln" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['linkedin']; ?>
" id="ln_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://linkedin.com/in/ornek">
																		</div>
																		<div class="socialInn clearfix">
																			<span><i class="fa fa fa-envelope-o"></i></span>
																			<input type="text" name="mail" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['mail']; ?>
" id="mail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="ornek@ornek.com">
																		</div>
																		<div class="mapButton clearfix">
																			<input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																			<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').hide();">
																		</div>
																   </form>
																 </div>
															</div>
														</li>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['youtube_video']): ?>
														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','youtube_video');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails_buildpage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

															<div class="youtubeDiv clearfix" id="youtubeDiv_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" style="display:block;<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
																<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
" width="100%" height="200"></iframe>	
															</div>
															<div class="youtubelabelsPopup" id="youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="display:none;">
																<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></div>
																
																<form name="youtubefrm_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post">
																	<div id="error_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"></div>
																	<div class="contactlabelsPopupLeft">
																		<label>Youtube Video Adresi</label>
																		<input type="text" class="videoUrl" name="videourl_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="videourl_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
"/>
																	</div>
																	<div class="contactlabelsPopupRight">
																		<div class="contactlabelsPopupRightInner">
																			<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																			<select class="spacingOption" name="spacing" id="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																			</select>
																			<label>Genişlik</label>
																			<select class="widthOption" name="width_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="width_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="Küçük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>selected="selected"<?php endif; ?>>Küçük</option>
																				<option value="Orta" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>selected="selected"<?php endif; ?>>Orta</option>
																				<option value="Büyük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>selected="selected"<?php endif; ?>>Büyük</option>
																			</select>
																		</div>
																		<div>
																			<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
																		</div>
																	</div>
																</form>
															</div>
														</li>
													<?php endif; ?>
													<!--Gallery Process Start-->
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery']): ?>
														 <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','gallery');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="galImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid center">
															 <?php echo $this->_tpl_vars['objCommon']->getGalleryImage($_SESSION['domain_id'],$_SESSION['page_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

															 <?php if ($this->_tpl_vars['images']): ?>
																 <?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galimg']['show'] = true;
$this->_sections['galimg']['max'] = $this->_sections['galimg']['loop'];
$this->_sections['galimg']['step'] = 1;
$this->_sections['galimg']['start'] = $this->_sections['galimg']['step'] > 0 ? 0 : $this->_sections['galimg']['loop']-1;
if ($this->_sections['galimg']['show']) {
    $this->_sections['galimg']['total'] = $this->_sections['galimg']['loop'];
    if ($this->_sections['galimg']['total'] == 0)
        $this->_sections['galimg']['show'] = false;
} else
    $this->_sections['galimg']['total'] = 0;
if ($this->_sections['galimg']['show']):

            for ($this->_sections['galimg']['index'] = $this->_sections['galimg']['start'], $this->_sections['galimg']['iteration'] = 1;
                 $this->_sections['galimg']['iteration'] <= $this->_sections['galimg']['total'];
                 $this->_sections['galimg']['index'] += $this->_sections['galimg']['step'], $this->_sections['galimg']['iteration']++):
$this->_sections['galimg']['rownum'] = $this->_sections['galimg']['iteration'];
$this->_sections['galimg']['index_prev'] = $this->_sections['galimg']['index'] - $this->_sections['galimg']['step'];
$this->_sections['galimg']['index_next'] = $this->_sections['galimg']['index'] + $this->_sections['galimg']['step'];
$this->_sections['galimg']['first']      = ($this->_sections['galimg']['iteration'] == 1);
$this->_sections['galimg']['last']       = ($this->_sections['galimg']['iteration'] == $this->_sections['galimg']['total']);
?>
																	<div class="imageGallery" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else: ?>width:49%;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
																		<img width="100%" height="200" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
">
																		<div class="galleryimageInn">
																			<a onclick="deleteGalImg('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																			<a class="galleryimage galleryimagecomm" id="galleryPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"><i class="fa fa-plus-square-o"></i></a>
																		</div>
																	</div>
																 <?php endfor; endif; ?>
																 
															 <?php else: ?>
																																<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
																<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																	<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																		<div class="button">
																			<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																		</div>
																		<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																	</label>
																</form>
															  <?php endif; ?>
															  </div>
															<!--Gallery Image Popup-->
																<div id="galPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="display:none;" class="galleryimagepop">
																	<form name="galleryPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post">
																		<div class="leftside">
																			<i class="fa fa-picture-o"></i>
																			<div class="clr"></div>
																			<a data-toggle="modal" href="#galimgpopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"><?php echo $this->_tpl_vars['LANG']['image_add_change']; ?>
</a>
																		</div>
																		<div class="rightside">
																			<label><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</label>
																			<select class="columnOption" name="column_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="column_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="2" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>selected<?php endif; ?>>2</option>
																				<option value="3" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>selected<?php endif; ?>>3</option>
																				<option value="4" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>selected<?php endif; ?>>4</option>
																				<option value="5" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>selected<?php endif; ?>>5</option>
																				<option value="6" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>selected<?php endif; ?>>6</option>
																			</select>
																			<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																			<select class="imagespacingOption" name="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																			</select>
																			<label><?php echo $this->_tpl_vars['LANG']['border_name']; ?>
</label>
																			<select class="borderOption" name="border_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="border_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																				<option value="<?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
</option>
																			</select>
																			<!--<label>Cropping</label>
																			<select class="widthOption" name="croping_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="croping_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
																				<option value="None">None</option>
																				<option value="Square">Square</option>
																				<option value="Rectangle">Rectangle</option>
																			</select>-->
																			<div class="clearfix">
																				<input type="button" class="btn btn-success pull-left" value="save" onclick="addgalleryProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
																				<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																			</div>
																		</div>
																	</form>
																</div>
																<div id="modals">
																	<div id="galimgpopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="modal fade hide" aria-hidden="false">
																		<div id="image-chooser-nav">
																			<div id="image-chooser-nav-label">
																				<div><?php echo $this->_tpl_vars['LANG']['select_image_from']; ?>
</div>
																			</div>
																			<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																				<div class="colWhite">
																					<span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>

																				</div>
																			</div>
																			<div class="close PopCloseButt btn btn-danger" data-dismiss="modal">X</div>
																		</div>
																		<div id="browsebutton" class="popBrowseInner">
																																						<div id='imageloadstatus' style="display:none;">
																				<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
																			</div>
																			<form id="galimagephotogal<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																				<div class="uploadTxtPop"><?php echo $this->_tpl_vars['LANG']['click_here_to_upload']; ?>
</div>
																				<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
																					<div class="button">
																						<input type="file" class="hei180" value="" onchange="galimagupdate('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
')" name="photos[]" id="galimgphoto">
																					</div>
																					<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																				</label>
																			</form>
																			
																		</div>
																	</div>
																</div>
															 <!--Gallery Image Popup Ends-->
														</li>
													 <?php endif; ?>
													<!--Gallery Process End-->
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map']): ?>
														 <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showMapPopUp('mapframe_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="activemove theme2bginn">
															 <div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
															<div class="moveicon"></div>
															 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
																<div id="mapframe_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="mappop" style="display:none;">
																	<div class="leftside">
																		<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/map_marker.png" alt="map image"/>
																		<label><?php echo $this->_tpl_vars['LANG']['map_name']; ?>
</label>
																	</div>
																	<div class="rightside">
																		<form name="mapframepopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar" method="post">
																			<label><?php echo $this->_tpl_vars['LANG']['address_name']; ?>
</label>
																			<input class="mapinputTxt" type="text" name="addr_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="addr_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_addr']; ?>
">
																			<label><?php echo $this->_tpl_vars['LANG']['zoom_name']; ?>
</label>
																																						<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="zoom_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"  value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_zoom']; ?>
" onKeyPress="keypress(event);">
																			<label>Enlem</label>
																			<input class="mapinputTxt" type="text" name="lat_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="lat_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lat']; ?>
">
																			<label>Boylam</label>
																			<input class="mapinputTxt" type="text" name="lon_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="lon_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lon']; ?>
">
																			<div class="mapButton clearfix">
																				<input type="button" value="Kaydet" class="btn btn-success"  onclick="addMapProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
																				<input type="button" value="Vazgeç" class="btn btn-danger pull-right mapcancel" />
																			</div>
																	   </form>
																	 </div>
																</div>
															 </li>
													<?php endif; ?>
												   <!--slider process start-->
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['slider']): ?>
														 <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
															<div class="form_element_control">
																<div class="controlMidOuter">
																	<div class="controlMidBg"></div>
																</div>
																<div class="deleteOuter">
																	<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','slider');"><i class="fa fa-trash-o"></i></div>
																</div>
															</div>
															<div id="sliImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid hoverSlide">
																<?php echo $this->_tpl_vars['objCommon']->getSliderImageNew($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

																<div id="slider_images" class="buildPageSlider" style="<?php if ($this->_tpl_vars['slider_images']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
																	 <div class="nivoSlider nivoSliderImg">
																		 <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['slider_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																			<div class="imageSlider">
																				<img width="100%" height="300" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/> 			 
																			</div>
																		 <?php endfor; endif; ?>
																	 </div>
																	 <div class="clr"></div>
																 </div>
																<div id="sliderform">
																	<?php if ($this->_tpl_vars['slider_images']): ?>
																		<a class="sliderNoImg2" onclick="return showsliderFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">Düzenle</a>
																	<?php endif; ?>
																	<?php if (! $this->_tpl_vars['slider_images']): ?>
																		<a class="sliderNoImg1" onclick="return showsliderFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></a>
																	<?php endif; ?>
																</div>
															</div>
														</li>  
													<?php endif; ?>
													<!--slider process end-->
													<!--Google Adsense Start-->
													<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_adsense']): ?>
														<li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','google_adsense');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<input type='radio' name="google_ads" id="google_ads_script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="scriptImgInput" value="script" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'script'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																<label class="scriptImg" for="google_ads_script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																	<div class="scriptInner">
																		<div class="scriptImage"><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</div>
																	</div>
																</label>
																<input type='radio' name="google_ads" id="google_ads_image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="imgaeImgInput" value="image" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'image'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																<label class="imgaeImg" for="google_ads_image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																	<div class="imageInner">
																		<div class="imageHead"><?php echo $this->_tpl_vars['LANG']['image_name']; ?>
</div>
																		<div class="imageImage"></div>
																	</div>
																</label>
																
																<div id="script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="addGoogPop">
																	<div class="leftside">
																		<i class="fa fa-file-text-o fontSize42"></i>
																		<label><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</label>
																	</div>
																	<div class="rightside">
																		<form name="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
																			<label><?php echo $this->_tpl_vars['LANG']['adress_name']; ?>
</label>
																			<input type="hidden" name="script" id="script" value="script">
																			 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"   placeholder="Enter your script" ><?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_script_text']; ?>
</textarea>
																			 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																			
																			<div class="mapButton clearfix">
																				 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																				<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" />
					
																			</div>
																	   </form>
																	 </div>
																</div>
																
																<!--<div id="script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'script'): ?>  style="display:block;"<?php else: ?>style="display:none;" <?php endif; ?>>
																	<form name="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"  id="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
																	<input type="hidden" name="script" id="script" value="script">
																	 <textarea name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="google_ansen" placeholder="Enter your script" ><?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_script_text']; ?>
</textarea>
																	 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																	 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
																	</form>  
																</div>-->
																<?php echo $this->_tpl_vars['objCommon']->getImageGoogle($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

																<div id="images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'image'): ?>  style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>>
															 <?php if (! $this->_tpl_vars['images_google']): ?>
																																<div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
																<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>
																<form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
																	<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																		<div class="button">
																			<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
																		</div>
																		<input type='hidden' name="image" id="image" value="image"/>
																		<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																	</label>
																</form>
															<?php else: ?>
																<div class="googAddOption">
																	<img width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"/>  
																	<img width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>">
																	<div class="googAddDelete">
																		<a class="galleryimage" onclick="deletegoogleImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
');">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</div>
																	<a class="googAddUrl" onclick="showAddUrl('urladd_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"> <?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</a>
																</div>
																
																<div id="urladd_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="addGoogPop" style="display:none;">
																	<div class="leftside">
																		<i class="fa fa-external-link fontSize42"></i>
																		<label><?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</label>
																	</div>
																	<div class="rightside">
																		<form name="imagetxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="imagetxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
																			<label><?php echo $this->_tpl_vars['LANG']['url_name']; ?>
</label>
																			<input type="text" name="image_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="image_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="google_url_text" value="<?php echo $this->_tpl_vars['images_google']['0']['google_url']; ?>
">
																			<input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
																			<input type='hidden' name="google_image_id" id="google_image_id" value="<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
"/>
																			
																			<div class="mapButton clearfix">
																				 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
');">
																				<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" />
					
																			</div>
																	   </form>
																	 </div>
																</div>											 
															<?php endif; ?>
															</div>
														</li>
													<?php endif; ?>
													<!--Google Adsense End-->
													<?php endfor; else: ?>
														<div id="dropBox2" class="dropBox2 clearfix"></div>
													<?php endif; ?>
													
											</ul>
											</div>
											<div class="rightDiv" style="display:none;"></div>
										<?php endif; ?>
										<?php else: ?>
											<div id="dropBox" class="dropBox clearfix"></div>
											<div id="dropBox2" class="dropBox2 clearfix"></div>
										<?php endif; ?>
									</div>	
								</div>
							</div>
						</div>
						<div class="blogPageBgInnerBottom"></div>
					</div>
				</div>
			</div>
	<?php if ($_SESSION['themename'] == 'theme2' || $_SESSION['themename'] == 'theme5' || $_SESSION['themename'] == 'theme11' || $_SESSION['themename'] == 'theme12' || $_SESSION['themename'] == 'theme13' || $_SESSION['themename'] == 'theme14'): ?>
			<div class="clearfix clr"></div>
			<div class="themewrapper5 themepadnone">
				<div class="footrAlign">
					<div class="footerWrapTop8"></div>
					<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
                    <?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

						
							<?php echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['LANG']['webbxyz_name']; ?>
</a><a class="footerbutton" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>subscription<?php else: ?>subscription.php<?php endif; ?>" target="_blank"><?php echo $this->_tpl_vars['LANG']['edit_name']; ?>
</a>

							<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeyup="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</a><?php endif; ?></div>
							 
						
					</div>
				</div>
			</div>
	<?php elseif ($_SESSION['themename'] == 'theme1' || $_SESSION['themename'] == 'theme3' || $_SESSION['themename'] == 'theme4' || $_SESSION['themename'] == 'theme15' || $_SESSION['themename'] == 'theme6' || $_SESSION['themename'] == 'theme7' || $_SESSION['themename'] == 'theme8' || $_SESSION['themename'] == 'theme9' || $_SESSION['themename'] == 'theme14'): ?>
			<div class="clearfix clr"></div>
			<div class="footrAlign">
				<div class="footerWrapTop8"></div>
				<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
                <?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

					
						<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeyup="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</a><?php endif; ?></div>
						 
					
				</div>
			</div>
	<?php elseif ($_SESSION['themename'] == 'blog1' || $_SESSION['themename'] == 'blog2' || $_SESSION['themename'] == 'blog3'): ?>
		<div class="clearfix clr"></div>
		<div class="footrAlign">
			<div class="footerWrapTop8"></div>
			<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
            <?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

				
					<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeyup="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</a><?php endif; ?></div>
					 
				
			</div>
		</div>
	<!-- Footer Section for Newly Created Theme starts -->	
	<!-- Change the newlyCreateTheme text to New Theme Name without space in the next line (elseif $smarty.session.themename eq 'newlyCreateTheme')-->
	<?php elseif ($_SESSION['themename'] == 'newlyCreateTheme'): ?>
		<div class="clearfix clr"></div>
		<div class="footrAlign">
			<div class="footerWrapTop8"></div>
			<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
            <?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

				
					<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeyup="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</a><?php endif; ?></div>					 
				
			</div>
		</div>
	<!-- Footer Section for Newly Created Theme ends -->		
	<?php else: ?>
		<div class="clearfix clr"></div>
		<div class="footrAlign">
			<div class="footerWrapTop8"></div>
			<div class="themewrapper1 themewrapper2 footerBgSource themewrapper3 themewrapper4 themewrapper5 themewrapper6">
            <?php echo $this->_tpl_vars['objCommon']->getCurrentDomainDetails(); ?>

				<div class="contentedit" contenteditable="true" onblur="return updateFooterContent();" onkeyup="return updateFooterContent();" id="footer_main"><?php if ($this->_tpl_vars['settingpage']['0']['footer_content']):  echo $this->_tpl_vars['settingpage']['0']['footer_content'];  else:  echo $this->_tpl_vars['LANG']['create_free_website']; ?>
 <a href="http://<?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
"><?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
</a><?php endif; ?></div>					 
				
			</div>
		</div>		
	<?php endif; ?>
</div>	
		<div class="formattoolBg">
			<span class="text-bold"><i class="fa fa-bold"></i></span>
			<span class="text-italic"><i class="fa fa-italic"></i></span>
			<span class="text-underline"><i class="fa fa-underline"></i></span>
			<span class="text-strikethrough"><i class="fa fa-strikethrough"></i></span>
			<span class="text-plusfontSize"><i class="fa fa-plus"></i></span>
			<span class="text-minusfontSize"><i class="fa fa-minus"></i></span>
			<span class="text-showPalette"><i class="fa fa-font"></i></span>
						<span class="text-align">
				<i class="fa fa-align-left"></i>
				<span class="text-alignType">
					<span class="textalignLeft"><i class="fa fa-align-left"></i></span>
					<span class="textalignRight"><i class="fa fa-align-right"></i></span>
					<span class="textalignCenter"><i class="fa fa-align-center"></i></span>
					<span class="textalignJustify"><i class="fa fa-align-justify"></i></span>
				</span>
			</span>
							
		</div>		
		<div id="modals">
			<div id="editBannerImg" class="modal browseImgPopup fade hide">
				<div class="close PopCloseButt btn btn-danger" type="button" data-dismiss="modal" aria-hidden="true">X</div>
				<div class="changePopBrowseImg"><?php echo $this->_tpl_vars['LANG']['click_here_or_edit_change_image']; ?>
</div>
				<label for="file" class="input input-file" name="popupbrowsebanner" id="popupbrowsebanner">
										<!--<div id='imageloadstatus' style='display:none'><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>-->
					
					<div id='imageloadstatus' style="display:none;">
						<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
					</div>
											
					<form id="bannerimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
						<div class="dc">
							<label for="file" class="input input-file" style="display:block" name="imageloadbutton" id="imageloadbutton">
								<div class="button">
									<input type="file" value="" name="photos[]" id="photobannerimg">
									<?php echo $this->_tpl_vars['LANG']['browse_name']; ?>

								</div>
								<input type='hidden' name="status" value="bannerimage"/>
							</label>
						</div>
					</form>
				</label>
			</div>
		</div>
							<!--<div id='imageloadstatus' style='display:none'><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>-->
					
				        <!--new banner slider process start-->
        <div id="modals">
			<div id="sliderBannerImg" class="modal browseImgPopup fade hide">
				<div class="close PopCloseButt btn btn-danger" type="button" data-dismiss="modal" aria-hidden="true">X</div>
				<div class="changePopBrowseImg"><?php echo $this->_tpl_vars['LANG']['click_here_or_edit_change_image']; ?>
</div>
				<div class="row-fluid" id="sliderBanner">
					<div class="span3">
						<label for="file" class="input input-file" name="popupbrowseslider" id="popupbrowseslider">
					 	 	<div id='imageloadstatus' style="display:none;">
								<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
							</div>
													
							<form id="sliderimageform" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxBannerSliderImageUpload.php' style="clear:both">
								<div class="dc">
									<label for="file" class="input input-file" style="display:block" name="imageloadbutton" id="imageloadbutton">
										<div class="maxWidtPopSlide"><?php echo $this->_tpl_vars['LANG']['max_width_and_height']; ?>
</div>
										<div class="button">
											<input type="file" value="" name="photos[]" id="photosliderimg" style="height:190px;">
											<?php echo $this->_tpl_vars['LANG']['browse_name']; ?>

										</div>
										<input type='hidden' name="status" value="sliderimage"/>
									</label>
								</div>
							</form>
							<div class="dc">
								<a class="btn btn-warning" onclick="reloadPagelist();$('#maska').hide();" >Save changes</a>    
							</div>
						</label>
					</div>
					<div class="span9">
                    <?php if ($_SESSION['domain_id']): ?>
					<?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>

                    <?php endif; ?>
						<?php if (! $this->_tpl_vars['banner_images']): ?>
							<div id="banner_preview"></div>
						<?php endif; ?>
						 <?php if ($this->_tpl_vars['banner_images']): ?>
						 	 <div id="sortableImg" class="SlideUploadImge">
								 <div id="banner_preview"></div>
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
									<div class="SlideUplWidt">
										<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/>
										 
										<a onclick="deleteSliderBannerImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['img_id']; ?>
','sliderimage');" class="galleryimage"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Close.png" alt="" title="" /></a>
									</div>
								<?php endfor; endif; ?>
							</div> 
						 <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
        <!--new banner slider process end-->
		<!-----Delete Form Popup--->
		<div id="deletePopup" style="display:none;">
			<form name="delpopup" id="delpopup">
				<input type="hidden" name="delpageid" id="delepageid" value="">
				<input type="hidden" name="delpagelist" id="delepagelist" value="">
				<input type="hidden" name="delpagetext" id="delepagetext" value="">
				<input type="hidden" name="deldomainid" id="deledomid" value="">
				<div class="deletePopupTxt">
					<?php echo $this->_tpl_vars['LANG']['are_you_sure_text']; ?>

				</div>
				<input type="button" class="deletePopupButton" name="submit" value="Delete" onclick="deleteListing();">
				<!--<input type="button" class="btn btn-danger pull-right" name="cancel" value="No" onclick="hidedelid();">-->
			</form>
			<div class="topArrow"></div>
		</div>		<!--Delete Form Popup---->
	</div>
<?php echo '
<script type="text/javascript">
$(document).ready(function(){				
    $(\'#popupbrowsebannerImg\').on(\'change\', function(evt){
        var file = evt.target.files[0];
        if(file.type.match(\'image.*\')){
            var reader = new FileReader();
            reader.onload = (function(file){
                return function(e){
                    $(\'#changebannerimage\').css({
                        \'background-image\': \'url(\' + e.target.result +\')\'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
        $("#editBannerImg").hide();
        $(".modal-backdrop").hide();
    });
    $(\'#backgroundimage\').on(\'change\', function(evt){
        var file = evt.target.files[0];
        if(file.type.match(\'image.*\')){
            var reader = new FileReader();
            reader.onload = (function(file){
                return function(e){
                    $(\'body\').css({
                        \'background\': \'url(\' + e.target.result +\') repeat\'
                    });
                }
            })(file);
        }
        reader.readAsDataURL(file);
    })
});
</script>
'; ?>

<div id="sliderPoP" class="modal sliderPopCont" style="display:none;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sliderPopUp.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="sliderPopColumn" class="modal sliderPopCont" style="display:none;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sliderPopUpColumn.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="galleryPoP" style="display:none;" class="sliderPopCont modal">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galleryPopup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="galleryPoPColumn" style="display:none;" class="sliderPopCont modal">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "galleryPopupColumn.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>