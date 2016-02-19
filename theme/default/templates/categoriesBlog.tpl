{$objCommon->getBlogDetails($smarty.session.domain_id)}
{if !empty($blogsidelist.0.categories)}						
	<a onclick="changeCategoriesContent('{$blogsidelist.0.domain_id}');"><div class="authHead">{$blogsidelist.0.categories}</div></a>
{else}
	<a onclick="changeCategoriesContent('{$blogsidelist.0.domain_id}');"><div class="authHead">{$LANG.category_user}</div></a>
{/if}
