<?php /* Smarty version 2.6.3, created on 2015-12-09 12:11:52
         compiled from myaccount.tpl */ ?>
<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="HeadingUser"><?php echo $this->_tpl_vars['LANG']['myaccount_setting']; ?>
</div>
			<div class="clr"></div>
			<div class="MyAccPageOuter">
				<div class="MyAccPageInner">
					<div id="sucess_disp"><span ><?php echo $this->_tpl_vars['successmsg']; ?>
</span></div>	 
					<div class="row-fluid">
						<div class="span8">
							<div class="myAccTab">
                            
							<div class="myAccTabHead active no-mar" onclick="ShowPassChangeColumn('passcoulmn','emailcoulmn','namecoulmn')"><?php echo $this->_tpl_vars['LANG']['myaccount_change_pass']; ?>
<span class="downArrow"></span></div>
							<div id="passcoulmn" class="myAccTabCont">
								<form name="changePassForm" class="no-mar" id="changePassForm" method="post" action="">
									<div id="errormsg"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="accontLeftLabel span4"><?php echo $this->_tpl_vars['LANG']['myaccount_currentpass']; ?>
</div>
												<input type="password" name="current_pass"class="myaccTctBx" id="current_pass" value="" >
											</div>
											<div class="row-fluid marTop20">
												<div class="accontLeftLabel span4"><?php echo $this->_tpl_vars['LANG']['myaccount_newpass']; ?>
</div>
												<input type="password" name="new_pass"class="myaccTctBx" id="new_pass" value="" >
											</div>
											<div class="row-fluid marTop20">
												<div class="accontLeftLabel span4"><?php echo $this->_tpl_vars['LANG']['myaccount_confirmpass']; ?>
</div>
												<input type="password" name="confirm_newpass" class="myaccTctBx" id="confirm_newpass" value="" class="span4 myaccTctBx">
											</div>
											<div class="row-fluid marTop20">
												<div class="span4">&nbsp;</div>
												<input type="submit" class="submitButton" name="passsubmit" id="passsubmit" value="Gönder">
												<!--<input type="button" class="cancelButton" name="passcancel" id="passcancel"  onclick="myaccountCancel('passcoulmn');" value="Vazgeç">-->
											</div>
										</div>
									</div>
								</form>	
							</div>
                            
							<div class="myAccTabHead" onclick="ShowPassChangeColumn('emailcoulmn','passcoulmn','namecoulmn')"><?php echo $this->_tpl_vars['LANG']['myaccout_change_email']; ?>
<span class="downArrow"></span></div>
							<div id="emailcoulmn" class="myAccTabCont" style="display:none">
								<form name="emailcolumn" class="no-mar" id="emailcolumn" method="post" action="">
									<div id="error_msg"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="span4 accontLeftLabel"><?php echo $this->_tpl_vars['LANG']['myaccount_email']; ?>
</div>
												<input type="text" name="email" class="myaccTctBx" id="email" value="">
											</div>
											<div class="row-fluid marTop20">
												<div class="span4">&nbsp;</div>
												<input type="submit" class="submitButton" name="emailsubmit" id="emailsubmit" value="Gönder">
												<!--<input type="button" class="cancelButton" name="passcancel" id="passcancel"  onclick="myaccountCancel('emailcoulmn');" value="Vazgeç">-->
											</div>
										</div>
									</div>
								</form>	
							</div>
							<div class="myAccTabHead" onclick="ShowPassChangeColumn('namecoulmn','passcoulmn','emailcoulmn')"><?php echo $this->_tpl_vars['LANG']['myaccout_change_name']; ?>
<span class="downArrow"></span></div>
							<div id="namecoulmn" class="myAccTabCont" style="display:none">
								<form name="fullnameForm" class="no-mar" id="fullnameForm" method="post" action="">
									<div id="error"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="accontLeftLabel span4"><?php echo $this->_tpl_vars['LANG']['myaccount_fullname']; ?>
</div>
												<input type="text" name="fullname" class="myaccTctBx" id="fullname" value="">
											</div>
											<div class="row-fluid marTop20">
												<div class="span4">&nbsp;</div>
												<input type="submit"  class="submitButton" name="fullsubmit" id="fullsubmit" value="Gönder">
												<!--<input type="button" class="cancelButton" name="passcancel" id="passcancel"  onclick="myaccountCancel('namecoulmn');" value="Vazgeç">-->
											</div>
										</div>
									</div>
								</form>		
							</div>
						</div>
						</div>
						<div class="span4">
							<div class="AccInfo">
								<div class="AccInfoHead"><?php echo $this->_tpl_vars['LANG']['myaccount_account_info']; ?>
</div>
								<div class="AccInfoCont">
                                                       
									<div class="AccInfoRhtInner clearfix">
										<div class="AccInfoRhtInnerLft"><?php echo $this->_tpl_vars['LANG']['myaccount_pass']; ?>
</div>
										<div class="AccInfoRhtInnerMiddle">......</div>
										<a class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('passcoulmn','emailcoulmn','namecoulmn')" class=""><?php echo $this->_tpl_vars['LANG']['myaccount_change']; ?>
</a>	
									</div>
                                                                        
									<div class="AccInfoRhtInner clearfix">
										<div class="AccInfoRhtInnerLft"><?php echo $this->_tpl_vars['LANG']['myaccount_email']; ?>
</div>
										<div class="AccInfoRhtInnerMiddle"><?php echo $this->_tpl_vars['userdetails']['0']['email']; ?>
</div>
										<a  class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('emailcoulmn','passcoulmn','namecoulmn')" class=""><?php echo $this->_tpl_vars['LANG']['myaccount_change']; ?>
</a>	
									</div>
                                  
									<div class="AccInfoRhtInner borNone clearfix">
										<div class="AccInfoRhtInnerLft"><?php echo $this->_tpl_vars['LANG']['myaccount_fullname']; ?>
</div>
										<div class="AccInfoRhtInnerMiddle"><?php echo $this->_tpl_vars['userdetails']['0']['username']; ?>
</div>
										<a class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('namecoulmn','passcoulmn','emailcoulmn')" class=""><?php echo $this->_tpl_vars['LANG']['myaccount_change']; ?>
</a>	
									</div>
								</div>
							</div>
						</div>
					</div>	
					<div class="row-fluid marTop20">
											<div class="span6">
							<div class="MyAccBuyCredit">	
								<div class="MyAccBuyCreditLael"><?php echo $this->_tpl_vars['LANG']['myaccount_delete']; ?>
</div>
								<div class="MyAccBuyCreditInfo"><a class="curPoint underline" onclick="deletepopup('DeleteDiv');$('#deleteAccPopup,#masktable').show();"><?php echo $this->_tpl_vars['LANG']['myaccount_click']; ?>
</a>    <?php echo $this->_tpl_vars['LANG']['myaccount_delete_instruct']; ?>
</div>
							</div>
						</div>
					</div>
											<div id="deleteAccPopup" class="" style=" display:none;">
							<div class="deleteHead">
								<?php echo $this->_tpl_vars['LANG']['myaccount_delete_account']; ?>

								<div class="close PopDeleteButt" onclick="$('#deleteAccPopup,#masktable').hide();"></div>
							</div>
							<div id="DeleteDiv">
								<div class=""><?php echo $this->_tpl_vars['LANG']['myaccount_delete_sure']; ?>
</div>
								<div class="row-fluid marTop10">
									<div class="span8">
										<form name="deleteform" id="deleteform" class="no-mar">
											<textarea name="deleteopnion" id="deleteopnion" class="txtareapoptxt" placeholder="Before you go, please let us know why you're leaving and how we can improve <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
. Thank you!"></textarea>
											<input type="checkbox" checked="checked" name="notifyme" id="notifyme" value="1"><?php echo $this->_tpl_vars['LANG']['myaccount_notify']; ?>

											<div class="pull-right marTop10">
												<input type="button" class="submitButton fonSize14" name="keepaccount" id="keepaccount" onclick="$('#deleteAccPopup,#masktable').hide();" value="<?php echo $this->_tpl_vars['LANG']['myaccount_keep']; ?>
">
												<input type="button" class="cancelButton fonSize14" name="deleteaccount" id="deleteaccount" value="<?php echo $this->_tpl_vars['LANG']['myaccount_delete']; ?>
" onclick="DeleteAccount();"/>
											</div>
										</form>
									</div>
									<div class="span4">
										<img class="popDelImg" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Delete_Icon.png" />
									</div>		
								</div>
							</div>
						</div>
					
														</div>
			</div>
		</div>
	</div>
</div>
<div id="masktable" style=" display:none;"></div>
<?php echo '
	<script type="text/javascript">
		$(".myAccTab .myAccTabHead").click(function(){
			$(".myAccTab .myAccTabHead").removeClass("active");
			$(this).addClass("active");			
		});
	</script>
'; ?>