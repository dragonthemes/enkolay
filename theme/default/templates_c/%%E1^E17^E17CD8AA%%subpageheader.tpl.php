<?php /* Smarty version 2.6.3, created on 2015-12-09 11:51:01
         compiled from subpageheader.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'subpageheader.tpl', 10, false),array('modifier', 'replace', 'subpageheader.tpl', 10, false),array('modifier', 'capitalize', 'subpageheader.tpl', 10, false),array('modifier', 'lower', 'subpageheader.tpl', 24, false),)), $this); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<?php if ($this->_tpl_vars['domain_details']): ?>
	<!--list header code  start-->
	<meta name="keywords" content="<?php echo $this->_tpl_vars['domain_details']['0']['metakeywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['domain_details']['0']['site_description']; ?>
" />
	<?php echo $this->_tpl_vars['domain_details']['0']['header_code']; ?>

<?php endif;  if ($this->_tpl_vars['domain_details']): ?>
	<title><?php echo ((is_array($_tmp=$this->_tpl_vars['domain_details']['0']['site_title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  if ($_GET['pageurl']): ?>-<?php echo ((is_array($_tmp=((is_array($_tmp=$_GET['pageurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, '-', ' ') : smarty_modifier_replace($_tmp, '-', ' ')))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp));  endif; ?></title>
<?php endif; ?>
<!--list header code end-->
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/spectrum.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/font-awesome.css" type="text/css" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/farbtastic.css" rel="stylesheet"/>
<link type="text/css" href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/freshereditor.css" rel="stylesheet"/>
<link type="text/css" href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/jquery.fancybox.css" rel="stylesheet"/>
<link type="text/css" href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/dropdown.css" rel="stylesheet">
<?php if ($this->_tpl_vars['domain_details']['0']['theme_id']): ?>
	<?php echo $this->_tpl_vars['objCommon']->getThemeName($this->_tpl_vars['domain_details']['0']['domain_id']); ?>

	<?php if ($this->_tpl_vars['themename']): ?>
		<link href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/theme/<?php echo ((is_array($_tmp=$this->_tpl_vars['themename']['0']['theme_name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
/css/theme.css" type="text/css" rel="stylesheet" />
	<?php endif;  endif; ?>

<?php if ($this->_tpl_vars['store_details']['0']['store_id']): ?>
	<?php echo $this->_tpl_vars['objCommon']->getStoreName($this->_tpl_vars['store_details']['0']['domain_id']); ?>

		<?php if ($this->_tpl_vars['storename']): ?>
		<link href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/theme/<?php echo ((is_array($_tmp=$this->_tpl_vars['storename']['0']['store_name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
/css/theme.css" type="text/css" rel="stylesheet" />
		<?php endif;  endif; ?>

<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/reset.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/general.css" type="text/css" rel="stylesheet" />	
<link href="<?php echo $this->_tpl_vars['SITE_CSS_URL']; ?>
/design.css" type="text/css" rel="stylesheet" />
<?php echo $this->_tpl_vars['getglobalvarjavascript']; ?>

<!--js files calling starts-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.ui.all.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.zoom.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/selectbox.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/jquery.cycle.all.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/responsiveslide.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/common.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['SITE_JS_URL']; ?>
/publishpage.js"></script>
		
	