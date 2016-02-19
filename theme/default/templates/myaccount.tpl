<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="HeadingUser">{$LANG.myaccount_setting}</div>
			<div class="clr"></div>
			<div class="MyAccPageOuter">
				<div class="MyAccPageInner">
					<div id="sucess_disp"><span >{$successmsg}</span></div>	 
					<div class="row-fluid">
						<div class="span8">
							<div class="myAccTab">
                            
							<div class="myAccTabHead active no-mar" onclick="ShowPassChangeColumn('passcoulmn','emailcoulmn','namecoulmn')">{$LANG.myaccount_change_pass}<span class="downArrow"></span></div>
							<div id="passcoulmn" class="myAccTabCont">
								<form name="changePassForm" class="no-mar" id="changePassForm" method="post" action="">
									<div id="errormsg"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="accontLeftLabel span4">{$LANG.myaccount_currentpass}</div>
												<input type="password" name="current_pass"class="myaccTctBx" id="current_pass" value="" >
											</div>
											<div class="row-fluid marTop20">
												<div class="accontLeftLabel span4">{$LANG.myaccount_newpass}</div>
												<input type="password" name="new_pass"class="myaccTctBx" id="new_pass" value="" >
											</div>
											<div class="row-fluid marTop20">
												<div class="accontLeftLabel span4">{$LANG.myaccount_confirmpass}</div>
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
                            
							<div class="myAccTabHead" onclick="ShowPassChangeColumn('emailcoulmn','passcoulmn','namecoulmn')">{$LANG.myaccout_change_email}<span class="downArrow"></span></div>
							<div id="emailcoulmn" class="myAccTabCont" style="display:none">
								<form name="emailcolumn" class="no-mar" id="emailcolumn" method="post" action="">
									<div id="error_msg"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="span4 accontLeftLabel">{$LANG.myaccount_email}</div>
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
							<div class="myAccTabHead" onclick="ShowPassChangeColumn('namecoulmn','passcoulmn','emailcoulmn')">{$LANG.myaccout_change_name}<span class="downArrow"></span></div>
							<div id="namecoulmn" class="myAccTabCont" style="display:none">
								<form name="fullnameForm" class="no-mar" id="fullnameForm" method="post" action="">
									<div id="error"></div>
									<div class="row-fluid">
										<div class="">
											<div class="row-fluid">
												<div class="accontLeftLabel span4">{$LANG.myaccount_fullname}</div>
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
								<div class="AccInfoHead">{$LANG.myaccount_account_info}</div>
								<div class="AccInfoCont">
                                                       
									<div class="AccInfoRhtInner clearfix">
										<div class="AccInfoRhtInnerLft">{$LANG.myaccount_pass}</div>
										<div class="AccInfoRhtInnerMiddle">......</div>
										<a class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('passcoulmn','emailcoulmn','namecoulmn')" class="">{$LANG.myaccount_change}</a>	
									</div>
                                                                        
									<div class="AccInfoRhtInner clearfix">
										<div class="AccInfoRhtInnerLft">{$LANG.myaccount_email}</div>
										<div class="AccInfoRhtInnerMiddle">{$userdetails.0.email}</div>
										<a  class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('emailcoulmn','passcoulmn','namecoulmn')" class="">{$LANG.myaccount_change}</a>	
									</div>
                                  
									<div class="AccInfoRhtInner borNone clearfix">
										<div class="AccInfoRhtInnerLft">{$LANG.myaccount_fullname}</div>
										<div class="AccInfoRhtInnerMiddle">{$userdetails.0.username}</div>
										<a class="AccInfoRhtInnerButton" onclick="ShowPassChangeColumn('namecoulmn','passcoulmn','emailcoulmn')" class="">{$LANG.myaccount_change}</a>	
									</div>
								</div>
							</div>
						</div>
					</div>	
					<div class="row-fluid marTop20">
					{*	<div class="MyAccBuyCredit span6">	
							<div class="MyAccBuyCreditLael">{$LANG.myaccount_buy_credits}</div>
							<div class="MyAccBuyCreditInfo">{$LANG.myaccount_buy_instruct} {$rem_days}  <a class="curPoint" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}subscription{else}subscription.php{/if}">{$LANG.myaccount_buy_credits} </a></div>
						</div>  *}
						<div class="span6">
							<div class="MyAccBuyCredit">	
								<div class="MyAccBuyCreditLael">{$LANG.myaccount_delete}</div>
								<div class="MyAccBuyCreditInfo"><a class="curPoint underline" onclick="deletepopup('DeleteDiv');$('#deleteAccPopup,#masktable').show();">{$LANG.myaccount_click}</a>    {$LANG.myaccount_delete_instruct}</div>
							</div>
						</div>
					</div>
					{*==popup==*}
						<div id="deleteAccPopup" class="" style=" display:none;">
							<div class="deleteHead">
								{$LANG.myaccount_delete_account}
								<div class="close PopDeleteButt" onclick="$('#deleteAccPopup,#masktable').hide();"></div>
							</div>
							<div id="DeleteDiv">
								<div class="">{$LANG.myaccount_delete_sure}</div>
								<div class="row-fluid marTop10">
									<div class="span8">
										<form name="deleteform" id="deleteform" class="no-mar">
											<textarea name="deleteopnion" id="deleteopnion" class="txtareapoptxt" placeholder="Before you go, please let us know why you're leaving and how we can improve {$SITE_MAIN_DOMAIN}. Thank you!"></textarea>
											<input type="checkbox" checked="checked" name="notifyme" id="notifyme" value="1">{$LANG.myaccount_notify}
											<div class="pull-right marTop10">
												<input type="button" class="submitButton fonSize14" name="keepaccount" id="keepaccount" onclick="$('#deleteAccPopup,#masktable').hide();" value="{$LANG.myaccount_keep}">
												<input type="button" class="cancelButton fonSize14" name="deleteaccount" id="deleteaccount" value="{$LANG.myaccount_delete}" onclick="DeleteAccount();"/>
											</div>
										</form>
									</div>
									<div class="span4">
										<img class="popDelImg" src="{$SITE_BASEURL}/images/Delete_Icon.png" />
									</div>		
								</div>
							</div>
						</div>
					
					{*==popup==*}
					{*===deleteaccount functionality ends==*}
				</div>
			</div>
		</div>
	</div>
</div>
<div id="masktable" style=" display:none;"></div>
{literal}
	<script type="text/javascript">
		$(".myAccTab .myAccTabHead").click(function(){
			$(".myAccTab .myAccTabHead").removeClass("active");
			$(this).addClass("active");			
		});
	</script>
{/literal}