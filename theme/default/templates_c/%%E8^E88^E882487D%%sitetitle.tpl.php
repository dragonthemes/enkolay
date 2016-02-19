<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from sitetitle.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'sitetitle.tpl', 10, false),)), $this); ?>
<div class="marTop10 clearfix">
	<div id="sitetitle" style="display:block" class="clearfix">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_site_title']; ?>
</div>
		<div id="success"></div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['site_title']; ?>
-->
			<div id="siteinput">
				<form name="site_title" id="site_title" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" class="PageMainRightTxtBx" name="sitetitlename" id="sitetitlename" placeholder="Enter your site title here" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['settingpage']['0']['site_title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
					</div>
					<div class="subdomainformRight">
						<input type="button" name="save" class="btn btn-primary" id="save" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
" onclick="SaveTitle();"/>
						<!--<input  type="button" name="cancel" class="btn btn-danger" id="cancel" value="<?php echo $this->_tpl_vars['LANG']['main_cancel']; ?>
" onclick="showADiv('sitetitle','siteinput');">-->
					</div>
				</form>
			</div>
		</div>		
	</div>
<!--	<div class="marTop10 clearfix">
		<input class="marTop0" type="checkbox" name="titletop" id="titletop" value="1"><?php echo $this->_tpl_vars['LANG']['main_site_title_show']; ?>

	</div>
--></div>