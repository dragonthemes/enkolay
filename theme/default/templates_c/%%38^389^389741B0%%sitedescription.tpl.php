<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from sitedescription.tpl */ ?>
<div class="clearfix">
	<div id="sitedescription" style="display:block">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_site_desc']; ?>
</div>
        <div id="succ_desc"></div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['site_description']; ?>
-->
			<div id="sitedescrip">
				<form name="site_description" id="site_description" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" class="PageMainRightTxtBx" name="sitedescriptionname" id="sitedescriptionname" placeholder="Site tanımını buraya girin" value="<?php echo $this->_tpl_vars['settingpage']['0']['site_description']; ?>
">
					</div>
					<div class="subdomainformRight">
						<input type="button" name="save" class="btn btn-primary" id="save" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
" onclick="SaveDescription();">
						<!--<input  type="button" name="cancel" class="btn btn-danger" id="cancel" value="<?php echo $this->_tpl_vars['LANG']['main_cancel']; ?>
" onclick="showADiv('sitedescription','sitedescrip');">-->
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>