<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from sitemetakeyword.tpl */ ?>
<div class="marTop10 clearfix">
	<div id="sitemetakeyword" style="display:block">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_meta']; ?>
</div>
        <div id="succ_key"></div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['metakeywords']; ?>
-->
			<div id="sitekeyword">
				<form name="site_word" id="site_word" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" name="site_metakeyword" class="PageMainRightTxtBx" id="site_metakeyword" placeholder="Anahtar kelimelerinizi buraya girin" value="<?php echo $this->_tpl_vars['settingpage']['0']['metakeywords']; ?>
">
					</div>
					<div class="subdomainformRight">
						<input type="button" class="btn btn-primary" name="save" id="save" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
" onclick="SaveKeyword();">
						<!--<input  type="button" class="btn btn-danger" name="cancel" id="cancel" value="<?php echo $this->_tpl_vars['LANG']['main_cancel']; ?>
" onclick="showADiv('sitemetakeyword','sitekeyword');">-->
					</div>
					<div class="clr"></div>
					<div class="seoformComment"><?php echo $this->_tpl_vars['LANG']['main_seperate_key']; ?>
</div>
				</form>
			</div>
		</div>		
	</div>
</div>