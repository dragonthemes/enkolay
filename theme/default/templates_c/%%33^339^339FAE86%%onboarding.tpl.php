<?php /* Smarty version 2.6.3, created on 2015-12-09 11:51:56
         compiled from onboarding.tpl */ ?>
<div class="row-fluid">
	<div class="marTop20">
		<div class="container">	
						<div id="selection" class="siteBlockOuter" style="display:none">
				<div class="ChooseThemeTxt"><?php echo $this->_tpl_vars['LANG']['main_page_started']; ?>
</div>
				<div class="choose_cat">
					<?php echo $this->_tpl_vars['LANG']['main_page_select_theme']; ?>

				</div>
				<div class="row-fluid">
					<a class="span4 offset2 dc siteblogInner onboardsite" tabindex="1">
						<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/site.png">
						<div class="button"><?php echo $this->_tpl_vars['LANG']['main_site']; ?>
</div>
					</a>
					<a class="span4 offset0 dc siteblogInner onboardblog" tabindex="2">
						<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/blog.png">
						<div class="button"><?php echo $this->_tpl_vars['LANG']['main_blog']; ?>
</div>
					</a>
									<div class="span3"></div> 
				</div>	
				<div class="ChooseThemeTxtBott marTop20">
					<?php echo $this->_tpl_vars['LANG']['main_page_access']; ?>
 
					<div class="clr"></div>
					<?php echo $this->_tpl_vars['LANG']['main_page_no_matter']; ?>

				</div>	
			</div>
						<div class="themeselectionOuter">
				<div id="themeselection" class="" >
					<div class="ChooseThemeTxtSec clearfix">
						<?php echo $this->_tpl_vars['LANG']['main_page_select_templates']; ?>

						<!-- <div class="themebackTop pull-right"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/scrollTop.png"></div> -->
					</div>
					<!--<div class="themebackTop">Back</div>
					<div class="ChooseThemeTxt">Choose a Theme </div>-->
					<div id="sucess_disp"></div>
					<div class="row-fluid">
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
							<div class="<?php if ($this->_sections['themedetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif; ?>">
								<div class="themeBg">
									<div id="themeimgrep_<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
">
										<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_theme/<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_image']; ?>
">
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectTheme('<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_id']; ?>
','<?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_name']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_choose']; ?>
</a>
										</div>
									</div>
								</div>
								<!--<div class="themeMenuDescript"><?php echo $this->_tpl_vars['themeval'][$this->_sections['themedetails']['index']]['theme_description']; ?>
</div>-->
							</div>
						<?php endfor; endif; ?>	
					</div>
				</div> 	
			</div>
			<div class="blogselectionOuter">
				<div id="blogthemeselection" class="" style="display:none">
					<div class="ChooseThemeTxtSec clearfix">
						<?php echo $this->_tpl_vars['LANG']['main_page_select_templates']; ?>

						<div class="blockbackTop pull-right"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/scrollTop.png"></div>
					</div>
						
					<div id="sucess_dis"></div>
					<div class="row-fluid">
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
							<div class="<?php if ($this->_sections['blogdetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif; ?>">
								<div class="themeBg">
								   <div id="blogimgrep_<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
">
										<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/uploads/photo_blog/<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_image']; ?>
">									  
									</div>
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectBlog('<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_id']; ?>
','<?php echo $this->_tpl_vars['blogval'][$this->_sections['blogdetails']['index']]['blog_name']; ?>
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
			</div>
	 		<div class="storeselectionOuter">
				<div id="storethemeselection" class="" style="display:none">
					<div class="ChooseThemeTxtSec clearfix">
						Select a template for your site from the given list.
						<div class="storebackTop pull-right"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/scrollTop.png"></div>
					</div>
						
					<div id="sucess_storedis"></div>
					<div class="row-fluid">
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
							<div class="<?php if ($this->_sections['storedetails']['index']%2 == 0): ?>span6 themeMenuWidt offset0<?php else: ?>span6 themeMenuWidt<?php endif; ?>">
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
											<a class="btn btn-success pull-right marRht10" onclick="SelectStore('<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_id']; ?>
','<?php echo $this->_tpl_vars['storeval'][$this->_sections['storedetails']['index']]['store_name']; ?>
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
			</div> 
			
		</div>
		 
	</div>
</div>