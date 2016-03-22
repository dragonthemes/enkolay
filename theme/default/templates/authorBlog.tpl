{$objCommon->getBlogDetails($smarty.session.domain_id)}
{if !empty($blogsidelist.0.author)}	
  	<a onclick="changeAuthorContent('{$blogsidelist.0.domain_id}');">{$blogsidelist.0.author} </a>
{else}
  	<a onclick="changeAuthorContent('{$blogsidelist.0.domain_id}');">{$LANG.user_blog_author_instru}</a>
{/if}
