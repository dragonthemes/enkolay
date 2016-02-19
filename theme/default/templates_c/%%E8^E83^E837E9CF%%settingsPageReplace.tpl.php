<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from settingsPageReplace.tpl */ ?>
<div class="main_arrowTop"></div>
<div class="row-fluid">
	<div id="selectionmenu" class="mainLeftSideToggle">
		<ul class="menuUl" id="sortablePage2">
			<li>
				<a id="general" class="active clearfix" onclick="ShowCorrectDiv('generalsetting','seosetting','mobilesetting','editorssetting','archivesetting');showActiveClass('general');"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/storegeneral.png" alt="storegeneral" title="storegeneral" /> <span class="leftmenuname"><?php echo $this->_tpl_vars['LANG']['main_general']; ?>
</span></a>	
			</li>
			<li>				
				<a id="seo" class="clearfix" onclick="ShowCorrectDiv('seosetting','generalsetting','mobilesetting','editorssetting','archivesetting');showActiveClass('seo');"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/storeseo.png" alt="storeseo" title="storeseo" /> <span class="leftmenuname"><?php echo $this->_tpl_vars['LANG']['main_seo']; ?>
</span></a>
			</li>
				</ul>
	</div>
		
			<div id="headerlogo_id">
			<?php if ($this->_tpl_vars['settingpage']['0']['header_logo_config'] == '1'): ?>
				<?php if (! empty ( $this->_tpl_vars['settingpage']['0']['header_title'] )): ?>
					<span><?php echo $this->_tpl_vars['settingpage']['0']['header_title']; ?>
</span>
				<?php else: ?>
					<span><a onclick=""><?php echo $this->_tpl_vars['LANG']['user_head_site']; ?>
</a></span>	
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div id="header_mouseover_id">
			<a></a>
			<a></a>
			<a></a>
		</div>
		
	
		<div class="span6 mainRightSideToggle" id="generalsetting">
		<nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top" id="cbp-spmenu-s3">
											
									<div id="subdomainBlock">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'subdomain.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>	
								
								<div id="titleBlock">	
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sitetitle.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>	
								
								 								
								 								
																
																
													 
					
									</nav>
	</div>
	
		<div id="seosetting" class="span6 mainRightSideToggle" style="display:none">
		 			 <div id="DescriptionBlock">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sitedescription.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			 </div>	
			 <div id="keywordBlock">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sitemetakeyword.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			 </div>
			 <div id="HeaderBlock">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'siteheader.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
			 </div>
			 <div id="FooterBlock">  
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sitefooter.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			 </div> 
					 	</div>	
		
		<div id="mobilesetting" class="span6 mainRightSideToggle" style="display:none">
		<div class="cbp_spmenuHead"><?php echo $this->_tpl_vars['LANG']['main_mobile']; ?>
</div>
		<div class="marTop10 clearfix">
			<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_enable']; ?>
</div>
			<div class="subdomainRight">
				<input type="checkbox" name="Mobileview" id="Mobileview" value="1"><?php echo $this->_tpl_vars['LANG']['main_disply_mobile']; ?>

			</div>
		</div>
	</div>
		
			<div id="editorssetting" class="span6 mainRightSideToggle" style="display:none">
			<div class="cbp_spmenuHead"><?php echo $this->_tpl_vars['LANG']['main_edit_other']; ?>
</div>
			<a href="" class="btn btn-primary marTop20"><?php echo $this->_tpl_vars['LANG']['main_add_edit']; ?>
</a>
			<ul class="row-fluid marTop20">
				<li class="span4">1.<?php echo $this->_tpl_vars['LANG']['main_email']; ?>
</li>
				<li class="span4">2.<?php echo $this->_tpl_vars['LANG']['main_role']; ?>
</li>
				<li class="span4">3.<?php echo $this->_tpl_vars['LANG']['main_lastlogin']; ?>
</li>
			</ul>
		</div>
		
			<div id="archivesetting" class="span6 mainRightSideToggle" style="display:none">
			<div class="cbp_spmenuHead"><?php echo $this->_tpl_vars['LANG']['main_unpublish']; ?>
</div>
			<div class="marTop10 clearfix">
				<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_last_publish']; ?>
</div>
				<div class="subdomainRight clearfix">
					<a onclick="" class="btn btn-primary pull-right"><?php echo $this->_tpl_vars['LANG']['main_unpublish_site']; ?>
</a>
				</div>
			</div>
			<div class="cbp_spmenuHead"><?php echo $this->_tpl_vars['LANG']['main_archive']; ?>
</div>
			<div class="marTop10 clearfix">
				<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['create_zip']; ?>
</div>
				<div class="subdomainRight clearfix">
					<a onclick="" class="btn btn-primary pull-right"><?php echo $this->_tpl_vars['LANG']['main_create_archive']; ?>
</a>
				</div>
			</div>
		</div>
	</div>
<?php echo '
	<script type="text/javascript">
		$(document).ready(function(){
			$( "#sortablePage2" ).sortable({
				update: function(event, ui) {
					$.post("ajaxPageSort.php", { pages: $(\'#sortablePage\').sortable(\'serialize\') } );
				},
				cancel: \'.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt\'
			});
		});
	</script>
'; ?>