<?php /* Smarty version 2.6.3, created on 2015-12-09 12:01:56
         compiled from publishdroppablePage.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'publishdroppablePage.tpl', 509, false),array('modifier', 'date_format', 'publishdroppablePage.tpl', 517, false),array('modifier', 'utf8_encode', 'publishdroppablePage.tpl', 517, false),)), $this); ?>
<!--CONTENT STARTS-->	
<!--site and blog content start-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.form.js"></script>
<div class="clearfix"></div>
<div class="blogPageInnerBg blogPageThemeBg themeseperateMar">
	<div class="themewrapper2BgAlign droparea">
		<div class="blogPageBgInnerTop"><div class="fireworkImg"></div></div>
		<div class="blogPageBgInner blogPageBgInnerMiddle clearfix">
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
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_show'] == '1'): ?>
			<div class="tablesampleouter">
				<table class="sample2" width="100%" border="0" cellpadding="0" cellspacing="0">
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
						<td id="col_<?php echo $this->_sections['rowcount']['index']; ?>
" <?php if ($this->_sections['rowcount']['index'] > $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count']): ?>style="display:none;"<?php endif; ?> <?php if ($this->_sections['rowcount']['index'] == '1'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col1']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col1']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '2'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col2']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col2']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '3'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col3']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col3']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '4'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col4']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col4']; ?>
px;"<?php endif;  endif;  if ($this->_sections['rowcount']['index'] == '5'):  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col5']): ?>style="width:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['td_col5']; ?>
px;"<?php endif;  endif; ?>>
						
                        	<div class="tablewidthmax">
							<?php echo $this->_tpl_vars['objCommon']->getColumnPageListForSource($this->_sections['rowcount']['index'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

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
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['title_select'] == '1'): ?>
							<!--title starts-->
							<div class="themehead main_title" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>">
							<?php if (! empty ( $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'] )): ?>
							<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title']; ?>

							<?php endif; ?>
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--title end-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['description_select'] == '1'): ?>	
							<!--description starts-->
							<div class="main_paragraph" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>">					
							<?php if (! empty ( $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'] )): ?>	
							<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description']; ?>

							<?php endif; ?>
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--description end-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_select'] == '1'): ?>
							<!--image starts-->
							
							<?php echo $this->_tpl_vars['objCommon']->getImageInSubdomain($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<?php if ($this->_tpl_vars['images']): ?>
							<div class="imagemaxwidth">
							<img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" alt="home image" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  else:  endif; ?>">
							</div>
							<div class="space"></div>
							<?php endif; ?>							
							
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--image end-->							
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['divider']): ?>
							<!--Divider Starts-->
							<div id="buildDivide">
							<hr />
							</div>
							<?php endif; ?>
							<!--Divider Ends-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_multiple_select']): ?>
							<!--image multiple text-->
							<div class="row-fluid sourceNewTheneUploadImg">
							<div class="span12">
							<div class="uploadImgBg">
							<?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist'],'singletext'); ?>

							<?php if ($this->_tpl_vars['images']): ?>
							<img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" >
							<?php endif; ?>
							</div>
							</div>
							<div class="span12">
							<div class="main_imagetitle" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'];  endif; ?></div>
							</div>			
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?> 
							<!--image multiple text end-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['contact_form'] == '1'): ?>
							<!--contact form starts-->
							<?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                            <?php echo $this->_tpl_vars['objCommon']->getContactFormFields_saubdomain($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<div id="contact_form" class="">						
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'contactform.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--contact form end-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['social_plugins'] == '1'): ?>	
							<!--fan page starts-->					
							<?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<?php if (! empty ( $this->_tpl_vars['socialpagelist'] )): ?>
							<?php unset($this->_sections['social']);
$this->_sections['social']['name'] = 'social';
$this->_sections['social']['loop'] = is_array($_loop=($this->_tpl_vars['socialpagelist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['social']['show'] = true;
$this->_sections['social']['max'] = $this->_sections['social']['loop'];
$this->_sections['social']['step'] = 1;
$this->_sections['social']['start'] = $this->_sections['social']['step'] > 0 ? 0 : $this->_sections['social']['loop']-1;
if ($this->_sections['social']['show']) {
    $this->_sections['social']['total'] = $this->_sections['social']['loop'];
    if ($this->_sections['social']['total'] == 0)
        $this->_sections['social']['show'] = false;
} else
    $this->_sections['social']['total'] = 0;
if ($this->_sections['social']['show']):

            for ($this->_sections['social']['index'] = $this->_sections['social']['start'], $this->_sections['social']['iteration'] = 1;
                 $this->_sections['social']['iteration'] <= $this->_sections['social']['total'];
                 $this->_sections['social']['index'] += $this->_sections['social']['step'], $this->_sections['social']['iteration']++):
$this->_sections['social']['rownum'] = $this->_sections['social']['iteration'];
$this->_sections['social']['index_prev'] = $this->_sections['social']['index'] - $this->_sections['social']['step'];
$this->_sections['social']['index_next'] = $this->_sections['social']['index'] + $this->_sections['social']['step'];
$this->_sections['social']['first']      = ($this->_sections['social']['iteration'] == 1);
$this->_sections['social']['last']       = ($this->_sections['social']['iteration'] == $this->_sections['social']['total']);
?>
							<div class="buildSocialIcon">
							<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['fb'] )): ?>
							<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['fb']; ?>
"><input type="button" class="fbicon"/></a>
							<?php endif; ?>
							<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['twitter'] )): ?>
							<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['twitter']; ?>
"><input type="button" class="twittericon" /></a>
							<?php endif; ?>
							<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['linkedin'] )): ?>
							<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['linkedin']; ?>
"><input type="button" class="linkedicon" /></a>
							<?php endif; ?>
							<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['mail'] )): ?>
							<a href="mailto:<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['mail']; ?>
"><input type="button" class="mailicon" /></a>
							<?php endif; ?>
							</div>
							<?php endfor; endif; ?>
							<?php endif; ?>	
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--fan page ends-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['youtube_video'] == '1'): ?>		
							<!--Youtube starts-->				
							<?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url']): ?>
							<div class="youtubeDiv clearfix">
							<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url'] != ''):  echo $this->_tpl_vars['youtubelist']['0']['youtube_url'];  else:  echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/youtubeLogo.png<?php endif; ?>" width="100%" height="553" style="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>"></iframe>
							</div>
							<?php endif; ?>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--Youtube ends-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery']): ?>
							<!--Gallery Starts-->
							<?php echo $this->_tpl_vars['objCommon']->getGalleryImageForSubDomain($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<?php if ($this->_tpl_vars['images']): ?>
							<div class="dc gallery_wrapper">
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
							<a class="fancybox-thumbs imageGallery" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else: ?>width: 49%;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>" data-fancybox-group="thumb" href="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
">
							  <div class="aspectratioline"></div>
                              <div class="image_container">
                                  <img height="" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
">
                              </div>
							</a>
							<?php endfor; endif; ?>
							</div>
							<?php endif; ?>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--Gallery Ends-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map'] == '1'): ?>	
							<!--Map starts-->					
							<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
							<div class="space"></div>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--Map ends-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['slider']): ?>
							<!--Slider Process Start-->
							<?php echo $this->_tpl_vars['objCommon']->getSliderImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['page_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<?php if ($this->_tpl_vars['images']): ?>
							<div id="slider" class="nivoSlider">
							<?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
/<?php echo $this->_tpl_vars['images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
">
							
							</div>
							<?php endfor; endif; ?>
							</div>
							<?php endif; ?>
							</div>
							<div class="space"></div>
							<div class="clearfix"></div>  
							<?php endif; ?>
							<!--Slider Process End-->
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_adsense']): ?>
							<!--Google Adsense Start-->
							
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>
							<?php echo '
							<script>          
							'; ?>

							<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>

							<?php echo '
							</script>  
							'; ?>

							<?php endif; ?>
							<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>
							<?php echo $this->_tpl_vars['objCommon']->getGoogleImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['page_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

							<div class="imagemaxwidth">
							<a href="<?php if ($this->_tpl_vars['google_images']['0']['google_url']): ?>http://<?php endif;  echo $this->_tpl_vars['google_images']['0']['google_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['google_images']['0']['google_image_name']; ?>
" alt="google image" width="100%" height="180" ></a>
							</div>
							<div class="space"></div>
							<?php endif; ?>
							<div class="clearfix"></div>
							<?php endif; ?>
							<!--Google Adsense End-->
                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['file']): ?>
                            <?php echo $this->_tpl_vars['objCommon']->getFile_name($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                            <?php if (! empty ( $this->_tpl_vars['files'] )): ?>
                            <div id="fileTool" class="width100 block fileTool">
            					<div class="filename"><?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
</div>                               
            					<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/files/<?php echo $this->_tpl_vars['files']['0']['file_id']; ?>
/<?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
">Download File</a>
            				</div>
                            <?php endif; ?>
                                                               
                            <?php endif; ?> 
		                 <?php endfor; endif; ?>
						</td>
						<?php endfor; endif; ?>
					</tr>
				</table>
			</div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['title_select'] == '1'): ?>
			<!--title starts-->
			<div class="themehead main_title" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>">
			<?php if (! empty ( $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title'] )): ?>
			<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title']; ?>

			<?php endif; ?>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--title end-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['description_select'] == '1'): ?>	
			<!--description starts-->
			<div class="main_paragraph" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>">					
			<?php if (! empty ( $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description'] )): ?>	
			<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description']; ?>

			<?php endif; ?>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--description end-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_select'] == '1'): ?>
			<!--image starts-->
            <?php echo $this->_tpl_vars['objCommon']->getImageInSubdomain($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

            
			<div class="imagemaxwidth" style="text-align:<?php echo $this->_tpl_vars['imgalignment']; ?>
">
			
			<?php if ($this->_tpl_vars['images']): ?>
			<img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" alt="home image" width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  else:  endif; ?>"/>
			<?php endif; ?>
			<div class="space"></div>
			</div>
		
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--image end-->
			
			
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['divider']): ?>
			<!--Divider Starts-->
			<div id="buildDivide">
			<hr />
			</div>
			<?php endif; ?>
			<!--Divider Ends----->
			
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_multiple_select']): ?>
			<!--image multiple text-->
			<div class="row-fluid sourceNewTheneUploadImg">
			<div class="pull-left marginRight15">
			<div class="uploadImgBg">
			<?php echo $this->_tpl_vars['objCommon']->getImageTextInSubdomain($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist'],'singletext'); ?>

			<?php if ($this->_tpl_vars['images']): ?>
			<img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  endif; ?>">
			<?php endif; ?>
			</div>
			</div>
			<div class="span9">
			<div class="main_imagetitle" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>"><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text'];  endif; ?></div>
			</div>			
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?> 
			<!--image multiple text end-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['contact_form'] == '1'): ?>
			<!--contact form starts-->
			<?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<div id="contact_form" class="">						
            <?php echo $this->_tpl_vars['objCommon']->getContactFormFields_saubdomain($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>
		
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'contactform.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--contact form end-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugins'] == '1'): ?>	
			<!--fan page starts-->					
			<?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<?php if (! empty ( $this->_tpl_vars['socialpagelist'] )): ?>
			<?php unset($this->_sections['social']);
$this->_sections['social']['name'] = 'social';
$this->_sections['social']['loop'] = is_array($_loop=($this->_tpl_vars['socialpagelist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['social']['show'] = true;
$this->_sections['social']['max'] = $this->_sections['social']['loop'];
$this->_sections['social']['step'] = 1;
$this->_sections['social']['start'] = $this->_sections['social']['step'] > 0 ? 0 : $this->_sections['social']['loop']-1;
if ($this->_sections['social']['show']) {
    $this->_sections['social']['total'] = $this->_sections['social']['loop'];
    if ($this->_sections['social']['total'] == 0)
        $this->_sections['social']['show'] = false;
} else
    $this->_sections['social']['total'] = 0;
if ($this->_sections['social']['show']):

            for ($this->_sections['social']['index'] = $this->_sections['social']['start'], $this->_sections['social']['iteration'] = 1;
                 $this->_sections['social']['iteration'] <= $this->_sections['social']['total'];
                 $this->_sections['social']['index'] += $this->_sections['social']['step'], $this->_sections['social']['iteration']++):
$this->_sections['social']['rownum'] = $this->_sections['social']['iteration'];
$this->_sections['social']['index_prev'] = $this->_sections['social']['index'] - $this->_sections['social']['step'];
$this->_sections['social']['index_next'] = $this->_sections['social']['index'] + $this->_sections['social']['step'];
$this->_sections['social']['first']      = ($this->_sections['social']['iteration'] == 1);
$this->_sections['social']['last']       = ($this->_sections['social']['iteration'] == $this->_sections['social']['total']);
?>
			<div class="buildSocialIcon" style="text-align:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugin_alignment']; ?>
">
			<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['fb'] )): ?>
			<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['fb']; ?>
"><input type="button" class="fbicon"/></a>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['twitter'] )): ?>
			<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['twitter']; ?>
"><input type="button" class="twittericon" /></a>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['linkedin'] )): ?>
			<a href="<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['linkedin']; ?>
"><input type="button" class="linkedicon" /></a>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['mail'] )): ?>
			<a href="mailto:<?php echo $this->_tpl_vars['socialpagelist'][$this->_sections['social']['index']]['mail']; ?>
"><input type="button" class="mailicon" /></a>
			<?php endif; ?>
			</div>
			<?php endfor; endif; ?>
			<?php endif; ?>	
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--fan page ends-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['youtube_video'] == '1'): ?>		
			<!--Youtube starts-->				
			<?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url']): ?>
			<div class="youtubeDiv clearfix" style="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%; height:250px; margin-left:auto; margin-right:auto;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
" width="100%" height="200"></iframe>
			</div>
			<?php else: ?>
			<div class="youtubeDiv clearfix" style="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%; height:250px; margin-left:auto; margin-right:auto;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/youtubeLogo.png" width="100%" height="200"></iframe>
			</div>
			<?php endif; ?>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--Youtube ends-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery']): ?>
			<!--Gallery Starts-->
			<?php echo $this->_tpl_vars['objCommon']->getGalleryImageForSubDomain($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<?php if ($this->_tpl_vars['images']): ?>
			<div class="dc gallery_wrapper">
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
			<!--<div class="imageGallery gallerySorceClick" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else:  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
			<img width="100%" height="200" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
">
			</div>-->
			<a class="fancybox-thumbs imageGallery" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>width: 49.95%; min-height:299px;max-height:299px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>width: 33.28%;min-height:199px;max-height:199px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>width: 24.95%;min-height:150px;max-height:150px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>width: 19.95%;min-height:120px;max-height:120px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>width: 16.62%;min-height:100px;max-height:100px;<?php else: ?>width:49.95%;min-height:299px;max-height:299px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif; ?>" data-fancybox-group="thumb" href="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
">
			 <div class="aspectratioline"></div>
             	<div class="image_container">
           			<img width="" height="" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
                 </div>
			</a>
			<?php endfor; endif; ?>
			</div>
			<?php endif; ?>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--Gallery Ends-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map'] == '1'): ?>	
			<!--Map starts-->					
			<div class="mapshowDiv clearfix">
			<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--Map ends-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['slider']): ?>
			<!--Slider Process Start-->
			<?php echo $this->_tpl_vars['objCommon']->getSliderImage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<?php if ($this->_tpl_vars['images']): ?>
			<div class="relative">
			<ul class="responsive_slideshow">
				<?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<li class="imageSlider">
					<img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/>
				</li>
				<?php endfor; endif; ?>
			</ul>
			</div>
			<?php endif; ?>
			<div class="space"></div>
			<div class="clearfix"></div>  
			<?php endif; ?>
			<!--Slider Process End-->
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_adsense']): ?>
			<!--Google Adsense Start-->
			<div class="imagemaxwidth">
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'script'): ?>
			<?php echo '
			<script>          
			'; ?>

			<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_script_text']; ?>

			<?php echo '
			</script>  
			'; ?>

			<?php endif; ?>
			<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'image'): ?>
			<?php echo $this->_tpl_vars['objCommon']->getGoogleImage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

			<a href="<?php if ($this->_tpl_vars['google_images']['0']['google_url']): ?>http://<?php endif;  echo $this->_tpl_vars['google_images']['0']['google_url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['google_images']['0']['google_image_name']; ?>
" alt="google image" width="100%" height="180" ></a>
			
			<?php endif; ?>
			</div>
			<div class="space"></div>
			<div class="clearfix"></div>
			<?php endif; ?>
			<!--Google Adsense End-->
            
            <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['file']): ?>
            <?php echo $this->_tpl_vars['objCommon']->getFile_name($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

            <?php if (! empty ( $this->_tpl_vars['files'] )): ?>
            <div id="fileTool" class="width100 block fileTool">
				<div class="filename"><?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
</div>                   
				<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/files/<?php echo $this->_tpl_vars['files']['0']['file_id']; ?>
/<?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
">Download File</a>
			</div>
            <?php endif; ?>           
            <?php endif; ?>  

            <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_image_show']): ?>
              <?php $this->assign('columnimages', $this->_tpl_vars['objCommon']->getColumnTextImages($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id'])); ?>
             <div id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="columnlist">                                                                 
                  
			 <div class="tablesampleouter">
				 <div class="sample2  columsBor row-fluid no-space">
                    <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)0;
$this->_sections['foo']['loop'] = is_array($_loop=3) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
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
                         <?php $this->assign('num', $this->_sections['foo']['rownum']); ?>

                         <?php if (count($_from = (array)$this->_tpl_vars['columnimages'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['imge']):
?>

                              <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText'): ?>
                                   <?php $this->assign('srcIndex', $this->_tpl_vars['k']); ?>
                                   <?php $this->assign('images', 1); ?>
                              <?php endif; ?>

                              <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText_title'): ?>
                                   <?php $this->assign('srcIndex_title', $this->_tpl_vars['k']); ?>
                                   <?php $this->assign('images_title', 1); ?>
                              <?php endif; ?>

                               <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText_desc'): ?>
                                   <?php $this->assign('srcIndex_desc', $this->_tpl_vars['k']); ?>
                                   <?php $this->assign('images_desc', 1); ?>
                              <?php endif; ?>
                         <?php endforeach; unset($_from); endif; ?>

                         <div class="addwidth span4">     
						<div class="coltext_image" for="coltext_image<?php echo $this->_sections['foo']['rownum']; ?>
">
							
                                <?php if (isset ( $this->_tpl_vars['images'] ) && $this->_tpl_vars['images'] == 1): ?>
                                    <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex']]['image_name']; ?>
" alt="Column Text Image" />
                                    <?php $this->assign('images', 0); ?>
                               <?php else: ?>
                                    <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/sample1.jpg" alt="Column Text Image" />
                               <?php endif; ?>

						</div>

						<div class="coltext_title contentedit" id="coltext_title_<?php echo $this->_sections['foo']['rownum']; ?>
" >     
							<?php if (isset ( $this->_tpl_vars['images_title'] ) && $this->_tpl_vars['images_title'] == 1): ?>
                                        <?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex_title']]['column_text_title']; ?>

                                        <?php $this->assign('images_title', 0); ?>
                                   <?php else: ?>
                                        Sample Title
                                   <?php endif; ?>
						</div>
						<div class="coltext_desc contentedit" id="coltext_desc_<?php echo $this->_sections['foo']['rownum']; ?>
" >     
							<?php if (isset ( $this->_tpl_vars['images_desc'] ) && $this->_tpl_vars['images_desc'] == 1): ?>
                                        <?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex_desc']]['column_text_desc']; ?>

                                        <?php $this->assign('images_desc', 0); ?>
                                   <?php else: ?>
                                        This is the test description
                                   <?php endif; ?>
						</div>
					</div>
                         
                    <?php endfor; endif; ?> 

					
				</div>
			</div> 
             </div>
              <div class="space"></div>
			<div class="clearfix"></div>
             <?php endif; ?>                                             
			<?php endfor; endif; ?>
			<div class="blogPageThemeBgBottimage"></div>
		<!--site  and blog content end-->
		<!--CONTENT END-->
		
		</div>
	</div>
</div>
<!--CONTENT ENDS-->
<script>$('.main_title a').attr('target','_blank');</script>

<?php if ($this->_tpl_vars['passrequired'] == 1): ?>
  <div id="domain_password_check_div">
	<div class="modal popuppassword">
		<div class="modal-header">
			<h3>Password</h3>
		</div>
		
			<div class="modal-body">
				<span id="domain_password_error"></span>
				<input type="password" name="domain_password" id="domain_password" value=""/>
			</div> 
			<div class="modal-footer">
				<input type="button" name="submit" class="btn btn-primary" value="Gönder" onclick="domainPasswordvalidate(<?php echo $this->_tpl_vars['domain_details']['0']['domain_id']; ?>
)"/>
			</div> 
		</div>
	</div>
	<div class="popuppasswordmask"></div>
<?php endif; ?>

<?php if (count($this->_tpl_vars['pck_details']) > 0): ?>
  <div id="domain_password_check_div">
	<div class="modal popuppassword">
		<div class="modal-header">
			<h3>Domain Payment Notification </h3>
		</div>		
			<div class="modal-body">
				<span id="domain_password_error"></span>
				Make Payment <?php echo $this->_tpl_vars['pck_details']['0']['price']; ?>
 TL and active your Account before <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pck_details']['0']['validtodate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
.
			</div> 			
		</div>
	</div>
	<div class="popuppasswordmask"></div>
<?php endif; ?>    
