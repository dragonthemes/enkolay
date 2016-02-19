<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:34
         compiled from main_js.tpl */ ?>
<?php echo $this->_tpl_vars['getglobalvarjavascript']; ?>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/common.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/commonnew.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/buildpage.js"></script>
<?php if ($this->_tpl_vars['req_file_name'] == 'main.php'): ?>
<link href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/theme/<?php echo $_SESSION['themename']; ?>
/css/theme.css" type="text/css" rel="stylesheet" />
<?php endif; ?>
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/design.css" type="text/css" rel="stylesheet" />