{$objCommon->getBlogDetails($smarty.session.domain_id)}
{if !empty($blogsidelist.0.archives)}						
	<a onclick="changeArchivesContent('{$blogsidelist.0.domain_id}');">{$blogsidelist.0.archives}</a>
{else}
	<a onclick="changeArchivesContent('{$blogsidelist.0.domain_id}');">{$LANG.user_instruction}</a>
{/if}
