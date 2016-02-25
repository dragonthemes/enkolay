<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{$SITE_MAIN_DOMAIN}  Admin Control Pannel</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		{include file='admin_main_css_js.tpl'}
	</head>
	<body>
		{include file='admin_main_header.tpl'}
		<div class="hidden-print hidden-xs">
			<div class="sidebar sidebar-inverse">
				<div class="sidebarMenuWrapper mainLeftPanelScroll nano">
					{include file='admin_main_menu.tpl'}
				</div>
			</div>
			<div class="content">
				{$MAIN_CONTENT}
			</div>
			<div id="footer">
				<div class="footer">Copyright ©2014 {$SITE_NAME}</div>
			</div>
		</div>
	</body>
</html>
