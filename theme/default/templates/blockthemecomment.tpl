<div class="row-fluid">
	<div class="pull-right">
		<a class="btn btn-warning" onclick="hideTwodiv('sitelisting_id','blogcomment','formentries');">{$LANG.user_sitelist}</a>
		<a class="btn btn-success" href="{if $USERFRIENDLY eq 'Y'}main{else}main.php{/if}">{if $seperatedetails.0.site_title}{$seperatedetails.0.site_title}{elseif $seperatedetails.0.site_title eq '' and $seperatedetails.0.blog_id}{$LANG.block_title_name} {else}{$LANG.site_title_name}{/if}</a>
		<a class="btn btn-info" onclick="SettingFunction('{$seperatedetails.0.domain_id}','{$seperatedetails.0.theme_id}');">{$LANG.user_editlist}</a>
	</div>
	<div class="clr"></div>
	<div class="noRec">{$LANG.user_blog_not}</div>
</div>