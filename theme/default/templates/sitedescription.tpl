<div class="clearfix">
	<div id="sitedescription" style="display:block">
		<div class="subdomainLeft">{$LANG.main_site_desc}</div>
        <div id="succ_desc"></div>
		<div class="subdomainRight clearfix">
			<!--{$settingpage.0.site_description}-->
			<div id="sitedescrip">
				<form name="site_description" id="site_description" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" class="PageMainRightTxtBx" name="sitedescriptionname" id="sitedescriptionname" placeholder="Site tanımını buraya girin" value="{$settingpage.0.site_description}">
					</div>
					<div class="subdomainformRight">
						<input type="button" name="save" class="btn btn-primary" id="save" value="{$LANG.main_save}" onclick="SaveDescription();">
						<!--<input  type="button" name="cancel" class="btn btn-danger" id="cancel" value="{$LANG.main_cancel}" onclick="showADiv('sitedescription','sitedescrip');">-->
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>