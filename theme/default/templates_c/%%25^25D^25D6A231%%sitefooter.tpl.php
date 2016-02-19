<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from sitefooter.tpl */ ?>
<div class="marTop10 clearfix">
	<div id="sitefooter" style="display:block">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_footer']; ?>
</div>
        <div id="succ_footer"></div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['footer_code']; ?>
-->
			<div id="sitefootercode">
				<form name="site_footer" id="site_footer" method="post" class="no-mar" action="">
					<div class="subdomainformLeft">
						<textarea name="footercode" id="footercode" class="PageMainRightTxtArea" placeholder="Varsa alt kısım kodunu buraya girin"><?php echo $this->_tpl_vars['settingpage']['0']['footer_code']; ?>
</textarea>
					</div>
					<div class="subdomainformRight">
						<input type="button" class="btn btn-primary" name="save" id="save" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
" onclick="SaveFooter();">
						<!--<input  type="button" class="btn btn-danger" name="cancel" id="cancel" value="<?php echo $this->_tpl_vars['LANG']['main_cancel']; ?>
" onclick="showADiv('sitefooter','sitefootercode');">-->
					</div>
					<div class="clr"></div>
					<div class="seoformComment"><?php echo $this->_tpl_vars['LANG']['main_google']; ?>
</div>
					<div class="spaceHei"></div>
				</form>
			</div>
		</div>
	</div>
</div>