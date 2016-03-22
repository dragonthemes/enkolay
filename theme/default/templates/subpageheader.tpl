<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
{if $domain_details}
	<!--list header code  start-->
	<meta name="keywords" content="{$domain_details.0.metakeywords}" />
	<meta name="description" content="{$domain_details.0.site_description}" />
	{$domain_details.0.header_code}
{/if}
{if $domain_details}
	<title>{$domain_details.0.site_title|strip_tags}{if $smarty.get.pageurl}-{$smarty.get.pageurl|replace:'-':' '|capitalize}{/if}</title>
{/if}
<!--list header code end-->
<link href="{$SITE_CSS_URL}/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/spectrum.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/font-awesome.css" type="text/css" rel="stylesheet" />
<link type="text/css" href="{$SITE_CSS_URL}/farbtastic.css" rel="stylesheet"/>
<link type="text/css" href="{$SITE_CSS_URL}/freshereditor.css" rel="stylesheet"/>
<link type="text/css" href="{$SITE_CSS_URL}/jquery.fancybox.css" rel="stylesheet"/>
<link type="text/css" href="{$SITE_CSS_URL}/dropdown.css" rel="stylesheet">
{if $domain_details.0.theme_id}
	{$objCommon->getThemeName($domain_details.0.domain_id)}
	{if $themename}
		<link href="{$SITE_BASEURL}/theme/{$themename.0.theme_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
	{/if}
{/if}

{if $store_details.0.store_id}
	{$objCommon->getStoreName($store_details.0.domain_id)}
		{if $storename}
		<link href="{$SITE_BASEURL}/theme/{$storename.0.store_name|lower}/css/theme.css" type="text/css" rel="stylesheet" />
		{/if}
{/if}

<link href="{$SITE_CSS_URL}/reset.css" type="text/css" rel="stylesheet" />
<link href="{$SITE_CSS_URL}/general.css" type="text/css" rel="stylesheet" />	
<link href="{$SITE_CSS_URL}/design.css" type="text/css" rel="stylesheet" />
{$getglobalvarjavascript}
<!--js files calling starts-->
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.min.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/bootstrap.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.ui.all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.fancybox.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.fancybox-thumbs.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.zoom.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/selectbox.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/jquery.cycle.all.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/responsiveslide.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/common.js"></script>
<script type="text/javascript" src="{$SITE_JS_URL}/publishpage.js"></script>
{*<script type="text/javascript" src="{$SITE_JS_URL}/storepage.js"></script>*}
		
	