		<!--<div class="leftContHeading Heading">Menu</div>-->
		<div class="leftContBody">
			<div class="leftContBodyMenuDiv"><span class="pad5 {$objAdmin->setHeadderActivClass('home')} leftNavList"><a href="index.php" class=""><img class="leftNavListImg" src="images/home.png" /> Home</a></span></div>
		   	<div class="leftContBodyMenuDiv">
				<span class="pad5 {$objAdmin->setHeadderActivClass('setting')} leftNavList"><a href="javascript:void(0);" class=""><img class="leftNavListImg" src="images/settings.png" /> Setting</a></span>
				<ul class="leftNavcolBgInner">
					<li class="{$objAdmin->setHeadderMenuActiv('admin_change_pwd.php')}"><a href="admin_change_pwd.php">Change Password</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('site_setting.php')}"><a href="site_setting.php">Site Setting</a></li>
					<li class="{$objAdmin->setHeadderMenuActiv('languageManageAdmin.php')}{$objAdmin->setHeadderMenuActiv('languageAddEdit.php')}"><a href="languageManage.php">Language</a></li>
				</ul>
			</div>
			
			<!--Management-->
	 </div>
		