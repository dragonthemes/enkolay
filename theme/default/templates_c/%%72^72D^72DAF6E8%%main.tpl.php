<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:35
         compiled from main.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?php echo $this->_tpl_vars['SITE_FAVICON']; ?>
" type="image/x-icon" /> 
		<meta http-equiv="X-UA-Compatible" content="IE=9">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
		<title><?php echo $this->_tpl_vars['LANG']['site_name']; ?>
</title>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'main_css.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php echo '
        <script>
        
        
        </script>
        '; ?>

	</head>
	<body class="cbp-spmenu-push indexBg <?php if ($this->_tpl_vars['req_file_name'] == 'userHome.php' || $this->_tpl_vars['req_file_name'] == 'resetPass.php' || $this->_tpl_vars['req_file_name'] == 'Support.php' || $this->_tpl_vars['req_file_name'] == 'Mytransaction.php' || $this->_tpl_vars['req_file_name'] == 'MyHome.php' || $this->_tpl_vars['req_file_name'] == 'subscription.php' || $this->_tpl_vars['req_file_name'] == 'buyCredits.php' || $this->_tpl_vars['req_file_name'] == 'MyInvites.php' || $this->_tpl_vars['req_file_name'] == 'Myaccount.php' || $this->_tpl_vars['req_file_name'] == 'staticPage.php' || $this->_tpl_vars['req_file_name'] == 'pointDomain.php' || $this->_tpl_vars['req_file_name'] == 'aboutUs.php' || $this->_tpl_vars['req_file_name'] == 'terms.php' || $this->_tpl_vars['req_file_name'] == 'contactUs.php' || $this->_tpl_vars['req_file_name'] == 'privacy.php'): ?>bgGrey bgWrapper<?php endif; ?> <?php if ($this->_tpl_vars['req_file_name'] == 'main.php'): ?> body-hidden<?php endif; ?>" <?php if ($this->_tpl_vars['req_file_name'] == 'subscription.php' && $_GET['inv'] != ''): ?> onload=" $('#invoicePopup').show();$('#maska').show();" <?php endif; ?>>
			<!-- Header starts -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'main_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!-- Header ends -->
			<!-- Container starts -->
			<?php echo $this->_tpl_vars['MAIN_CONTENT']; ?>

			<!-- Footer starts -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'main_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!-- Footer ends -->
			<!-- Container ends -->
			<div class="ui-loader">
				<div class="deleteLoadInn">
					<div class="loadImg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loading_circle.gif" alt="" title=""/></div>
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
        <?php if ($this->_tpl_vars['req_file_name'] == 'main.php'): ?>
            <iframe class="urlpopup" style="display:none;" src="urlpopup.php" >
           
            </iframe>
        <?php endif; ?>
		<div id="maska" style="display:none;"></div>
		<div id="loaderMask" style="display:none;"></div>
		<div id="contactmask" style="display:none;"></div>
		<div class="loadmask" style="display:none;"></div>
        <div class="urlloadmask" style="display:none;"></div>
	    <script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/allscripts.js"></script>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'main_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
	</body>
</html>