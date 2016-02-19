{if $req_file_name neq 'index.php'}
	{if $req_file_name neq 'onboarding.php'}
		<div class="{if $req_file_name eq 'index.php'}footerBottBg{/if}">
				<div class="{if $req_file_name eq 'userHome.php' || $req_file_name eq 'resetPass.php' || $req_file_name eq 'Support.php' || $req_file_name eq 'Mytransaction.php' || $req_file_name eq 'MyHome.php' || $req_file_name eq 'subscription.php' ||   $req_file_name eq 'buyCredits.php' || $req_file_name eq 'MyInvites.php' || $req_file_name eq 'Myaccount.php' || $req_file_name eq 'staticPage.php' || $req_file_name eq 'pointDomain.php' || $req_file_name eq 'aboutUs.php' || $req_file_name eq 'terms.php' || $req_file_name eq 'contactUs.php' || $req_file_name eq 'privacy.php'}footerBottBgThird{/if}">
					{if $req_file_name eq 'index.php'}
						<div class="row-fluid footerBgIndexOuter">
							<div class="footerCont span3">
								<h4 class="no-mar">{$LANG.webbxyz_name}</h4>
								<ul class="clearfix">
									<li>
										<a href="#index_home">{$LANG.footer_home}</a>
									</li>
									<li>
										<a href="#index_feature">{$LANG.footer_features}</a>
									</li>
									<li>
										<a href="#index_feature">{$LANG.footer_themes}</a>
									</li>
									<li>
										<a href="javascript:void(0);">{$LANG.footer_our_blog}</a>
									</li>
									<li>
										<a href="#index_price">{$LANG.footer_press_room}</a>
									</li>
								</ul>
							</div>
							<div class="footerCont span3">
								<h4 class="no-mar">{$LANG.footer_more}</h4>
								<ul class="clearfix">
									<li>
										<a href="javascript:void(0);">{$LANG.footer_support_center}</a>
									</li>
									<li>
										<a href="javascript:void(0);">{$LANG.footer_jobs}</a>
									</li>
									<li>
										<a href="javascript:void(0);">{$LANG.footer_designers}</a>
									</li>
									<li>
										<a href="javascript:void(0);">{$LANG.footer_education}</a>
									</li>
									<li>
										<a href="javascript:void(0);">{$LANG.footer_affiliates}</a>
									</li>
								</ul>
							</div>
							<div class="footerCont span3">
								<h4 class="no-mar">{$LANG.footer_follow_us}</h4>
								<ul class="clearfix">
									<li>
										<a href="{$objCommon->getFollowers('1')}" target="_blank">{$LANG.footer_facebook}</a>
									</li>
									<li>
										<a href="{$objCommon->getFollowers('2')}" target="_blank">{$LANG.footer_twitter}</a>
									</li>
									<li>
										<a href="{$objCommon->getFollowers('3')}" target="_blank">{$LANG.footer_google}</a>
									</li>
								</ul>
							</div>
							<div class="footerCont span3">
								<h4 class="no-mar">Site Info</h4>
								 <ul class="clearfix">
									{section name="static" loop="$staticpages"}
									<li>
										 <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}/content/{$staticpages[static].content_seo}{else}staticPage.php?con_seourl={$staticpages[static].content_seo}{/if}">{$staticpages[static].content_name}</a>
									</li>
									{/section}
								</ul>
							</div>
						</div>
						<div class="row-fluid">
							<div class="pull-right">
								<div class="copyright">
									<p>&copy; {$LANG.footer_all_rights_reserved}  <a href="http://www.hizlisayfalar.com" target="_blank">Hızlı Sayfalar İnternet ve Bilişim Hizmetleri</a></p>
								</div>
								<div class="social">
									<ul class="social-media clearfix">
										<li><a href="{$objCommon->getFollowers('1')}" class="social-media-facebook" target="_blank"></a></li>
										<li><a href="{$objCommon->getFollowers('2')}" class="social-media-google" target="_blank"></a></li>
										<li><a href="{$objCommon->getFollowers('3')}" class="social-media-twitter" target="_blank"></a></li>							
									</ul>
								</div>
							</div>
						</div>
					{/if}
					{if $req_file_name neq 'index.php' AND $req_file_name neq 'main.php'}
						{*<ul class="footerStaticPage">
							{section name="static" loop="$staticpages"}
									<li>
										 <a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'y'}/content/{$staticpages[static].content_seo}{else}staticPage.php?con_seourl={$staticpages[static].content_seo}{/if}">{$staticpages[static].content_name}</a>
									</li>
							{/section}
						</ul>  *}
                        <ul class="footerStaticPage">							
							<li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}aboutUs{else}aboutUs.php{/if}">Hakkımızda</a></li>
                            <li><a href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}contactUs{else}contactUs.php{/if}">Bize Ulaşın</a></li>						
						</ul> 
						<div class="clr"></div>
						<div class="footerStaticBottPage">
							&copy; {$LANG.footer_link}
						</div>
					{/if}
				</div>
			</div>
	{/if}
{/if}

<div id="modals">
	<div id="uploadImgPopup" class="all_popup" style="display:none;">
		<div id="image-chooser-nav">
			<div id="image-chooser-nav-label">
				<div>{$LANG.select_image_from}</div>
			</div>
			<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
				<div class="colWhite">
					<span></span> {$LANG.my_computer_name}
				</div>
			</div>
			<div class="close PopCloseButt btn btn-danger" onclick="$('#uploadImgPopup').hide();$('.loadmask').hide();">X</div>
		</div>
		<div id="browsebutton" class="popBrowseInner">
			<div id='preview'></div>
			<div id='imageloadstatuslogo' style="display:none;">
				<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
			</div>
			<form id="imageformlogo" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
				<div class="uploadTxtPop">Click here to upload Image</div>
				<label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
					<div class="button">
						<input type="file" value="" name="photos[]" id="photoimglogo">
					</div>
					<input type='hidden' name="status" value="domainlogo"/>
				</label>
			</form>
			
		</div>
	</div>
</div>
<div id="modals">
	<div id="publishPopup" class="all_popup publishPopBgOuter" style="display:none;">
		<div class="publishClose" type="button" onclick="$('#publishPopup').hide();$('.loadmask').hide();"></div>	
		<div id="publish" style="display:none;">
			<div class="publishTxt">Websitesi Yayınlandı!</div>
			<div class="webPublishTxt">
				Aşağıdaki bağlantıya tıklayarak ve hemen altındaki<br />şifreyi girerek sitenizin önizlemesini görüntüleyebilirsiniz!
			</div>
			<div class="publishUrlImg"></div>
			<div class="publishUrlBg">
				<div id="domainname" class="publishUrl"></div>
				<div class="loadingurl_gif"></div>
			</div>
		</div>
	</div>
</div>

<div id="modals">
	<div id="hyperlinkpopup" class="all_popup publishPopBgOuter" style="display:none;">
		<div class="publishClose" type="button" onclick="$('#hyperlinkpopup').hide();$('.loadmask').hide();"></div>	
		<div style="font-size: 30px;">
			Link to:
		</div>
        <div>
        <input type="radio" name="links" onclick="showHyperPopup('wlinker-url-input')"  value="url"/>
        <span>Website URL</span><input type="text"  class="linktext" id="wlinker-url-input" />
        </div>
        <div>
         <input type="radio" name="links" onclick="showHyperPopup('wlinker-email-input')" value="email"/>
        <span>Email Address</span><input style="display:none" type="text" class="linktext" id="wlinker-email-input" />
        </div>
        <div style="text-align:right">
        <input type="button" value="Save" onclick="callLinkText();" />
        </div>
	</div>
</div>

<div id="modals">
	<div id="domainbuygetuserinfo" class="all_popup imagepopupdiv" style="display:none;">
        <div class="deleteHead">
             Basic Information
            <div class="publishClose PopDeleteButt" onclick="$('#domainbuygetuserinfo').hide();$('.loadmask').hide();"></div>	
        </div>
		 <div class="row-fluid">
            <input type="hidden" id="buydomainvalue" value=""/>
            <div id="buydomaininfoerror" class="errormsg" style="display:none;"></div>
            <div class="row-fluid">
                <div class="accontLeftLabel span4">Terms</div>
                <span  class="marTop10 pull-left" id="buytermsvalue">: &nbsp;1 yr</span>
            </div>
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">First Name </div>
                <input class="myaccTctBx" type="text" id="domain_buy_fname"/>
                <span class="domain_buy_fname"></span>
            </div>
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">Last Name </div>
                <input class="myaccTctBx" type="text" id="domain_buy_lname"/>
                <span class="domain_buy_lname"></span>
            </div>
            {* <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">Contact Number </div>
                <input  type="text" id="domain_buy_contactno"/>
                <span class="domain_buy_contactno"></span>
            </div> *}
            
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">Street Address </div>
                <textarea class="myaccTctBx"  id="domain_buy_address"></textarea>
                <span class="domain_buy_address"></span>
            </div>
            
            
          {*  <div>
                State: <input type="text" id="domain_buy_state"/>
                <span class="domain_buy_state"></span>
            </div>*}
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">City </div>
                <input class="myaccTctBx" type="text" id="domain_buy_city"/>
                <span class="domain_buy_city"></span>
            </div>
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">Postcode </div>
                <input class="myaccTctBx" type="text" id="domain_buy_postcode"/>
                <span class="domain_buy_postcode"></span>
            </div>
            <div class="row-fluid marTop10">
                <div class="accontLeftLabel span4">Country </div>
                <input class="myaccTctBx" type="text"  id="domain_buy_country" value="Turkey" readonly/>
            </div>
            
            <div class="pull-right marTop10">
                <input class="submitButton fonSize14" type="button" value="Buy" onclick="buyDomain();" />
            </div>
		</div>            
	</div>
</div>
<!------Publish the site--->
<!--<div id="modals">
	<div id="publishPopup" class="modal publishPopBgOuter fade hide">
		<div class="pull-right curPoin" type="button" data-dismiss="modal" aria-hidden="true">X</div>	
		<div id="publish" style="display:none;">
			<div class="publishTxt">{$LANG.footer_website_published}</div>
			<div class="publishUrlImg"><i class="fa fa-angle-double-down"></i></div>
			<div id="domainname" class="publishUrl">
			</div>
		</div>
	</div>
</div>-->
<!----Publish the site---->
<div id ="showSubdomainChangeInSettings" style="display:none;">
	{include file="domainChange.tpl"}
</div>
{literal}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4481606-79', site_main_domain);
  ga('send', 'pageview');

</script>
{/literal}
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.js"></script>
{if $req_file_name eq 'main.php'}
	<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="{$SITE_JS_URL}/jquery.easydropdown.js"></script>	
{/if}
<script type="text/javascript" src="{$SITE_JS_URL}/shortcut.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/farbtastic.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/freshereditor.js"></script>
<!--<script type="text/javascript" src="{$SITE_JS_URL}/colorpicker.js"></script>-->
<script type="text/javascript" src="{$SITE_JS_URL}/bgcolorpicker.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.ui.all.js"></script>

<!--<script type="text/javascript" src="{$SITE_JS_URL}/jquery.mCustomScrollbar.min.js"></script>-->
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.bxslider.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.form.js"></script>
{if $req_file_name eq 'main.php'}
{/if}
{if $req_file_name eq 'main.php'}
	<!--<script type="text/javascript" src="{$SITE_JS_URL}/selectbox.js"></script>-->
{/if}
{if $req_file_name eq 'index.php' || $req_file_name eq 'terms.php' || $req_file_name eq 'aboutUs.php' || $req_file_name eq 'contactUs.php'}
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/facebook.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.cycle.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/slideshow.js"></script>
{/if}
<script type="text/javascript" src="{$SITE_JS_URL}/spectrum.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/responsiveslide.js"></script>