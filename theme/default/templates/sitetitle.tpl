<div class="marTop10 clearfix">
	<div id="sitetitle" style="display:block" class="clearfix">
		<div class="subdomainLeft">{$LANG.main_site_title}</div>
		<div id="success"></div>
		<div class="subdomainRight clearfix">
			<!--{$settingpage.0.site_title}-->
			<div id="siteinput">
				<form name="site_title" id="site_title" class="no-mar" method="post" action="">
					<div class="subdomainformLeft">
						<input type="text" class="PageMainRightTxtBx" name="sitetitlename" id="sitetitlename" placeholder="Enter your site title here" value="{$settingpage.0.site_title|strip_tags}">
					</div>
					<div class="subdomainformRight">
						<input type="button" name="save" class="btn btn-primary" id="save" value="{$LANG.main_save}" onclick="SaveTitle();"/>
						<!--<input  type="button" name="cancel" class="btn btn-danger" id="cancel" value="{$LANG.main_cancel}" onclick="showADiv('sitetitle','siteinput');">-->
					</div>
				</form>
			</div>
		</div>		
	</div>
<!--	<div class="marTop10 clearfix">
		<input class="marTop0" type="checkbox" name="titletop" id="titletop" value="1">{$LANG.main_site_title_show}
	</div>
--></div>