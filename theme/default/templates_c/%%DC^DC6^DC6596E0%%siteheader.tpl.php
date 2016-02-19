<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from siteheader.tpl */ ?>
<div class="marTop10 clearfix">
	<div id="siteheader" style="display:block">
		<div class="subdomainLeft"><?php echo $this->_tpl_vars['LANG']['main_header']; ?>
</div>
        <div id="succ_header"></div>
		<div class="subdomainRight clearfix">
			<!--<?php echo $this->_tpl_vars['settingpage']['0']['header_code']; ?>
-->
			<div id="siteheadercode">
				<form name="site_header" id="site_header" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<textarea name="headercode" id="headercode" class="PageMainRightTxtArea" placeholder="Varsa üst kısım kodunu buraya girin"><?php echo $this->_tpl_vars['settingpage']['0']['header_code']; ?>
</textarea>
					</div>
					<div class="subdomainformRight">
						<input type="button" class="btn btn-primary" name="save" id="save" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
" onclick="SaveHeader();">
						<!--<input  type="button" class="btn btn-danger" name="cancel" id="cancel" value="<?php echo $this->_tpl_vars['LANG']['main_cancel']; ?>
" onclick="showADiv('siteheader','siteheadercode');">-->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>