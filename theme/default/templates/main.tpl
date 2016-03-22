<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="{$SITE_FAVICON}" type="image/x-icon" /> 
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
		<title>{$LANG.site_name}</title>
		{include file='main_css.tpl'}
        {literal}
        <script>
        
        
        </script>
        {/literal}
	</head>
{*	<body class="cbp-spmenu-push indexBg {if $req_file_name neq 'index.php' ||$req_file_name eq 'main.php' }bgGrey{/if}" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">  *}
	<body class="cbp-spmenu-push indexBg {if $req_file_name eq 'userHome.php' || $req_file_name eq 'resetPass.php' || $req_file_name eq 'Support.php' || $req_file_name eq 'Mytransaction.php' || $req_file_name eq 'MyHome.php' || $req_file_name eq 'subscription.php' ||   $req_file_name eq 'buyCredits.php' || $req_file_name eq 'MyInvites.php' || $req_file_name eq 'Myaccount.php' || $req_file_name eq 'staticPage.php' || $req_file_name eq 'pointDomain.php' || $req_file_name eq 'aboutUs.php' || $req_file_name eq 'terms.php' || $req_file_name eq 'contactUs.php' || $req_file_name eq 'privacy.php'}bgGrey bgWrapper{/if} {if $req_file_name eq 'main.php' } body-hidden{/if}" {if $req_file_name eq 'subscription.php' and $smarty.get.inv neq '' } onload=" $('#invoicePopup').show();$('#maska').show();" {/if}>
			<!-- Header starts -->
			{include file='main_header.tpl'}
			<!-- Header ends -->
			<!-- Container starts -->
			{$MAIN_CONTENT}
			<!-- Footer starts -->
			{include file='main_footer.tpl'}
			<!-- Footer ends -->
			<!-- Container ends -->
			<div class="ui-loader">
				<div class="deleteLoadInn">
					<div class="loadImg"><img src="{$SITE_BASEURL}/images/loading_circle.gif" alt="" title=""/></div>
					<div class="loadTxt">YÜKLENİYOR</div>
				</div>
		   </div>
<!--		 <div class="deleteLoad">
				<div class="deleteLoad">
					<div class="loadImg"></div>
					<div class="loadTxt">YÜKLENİYOR</div>
				</div>
			</div>	
-->		
        <input type="hidden" value="" class="selectedvalue"/>
		<div id="toolbar" style="display:none;"></div>
        {if  $req_file_name eq 'main.php'}
            <iframe class="urlpopup" style="display:none;" src="urlpopup.php" >
           
            </iframe>
        {/if}
		<div id="maska" style="display:none;"></div>
		<div id="loaderMask" style="display:none;"></div>
		<div id="contactmask" style="display:none;"></div>
		<div class="loadmask" style="display:none;"></div>
        <div class="urlloadmask" style="display:none;"></div>
	    <script type="text/javascript" src="{$SITE_JS_URL}/allscripts.js"></script>
        {include file='main_js.tpl'}
		
	</body>
</html>