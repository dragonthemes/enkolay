<div onmouseout="changeOutAuthorContent('{$blogsidelist.0.domain_id}');">
	<div contenteditable="true" class="authorBlogReplaceTextarea" id="authorcontent">{if $blogsidelist.0.author}{$blogsidelist.0.author}{else}{$LANG.user_blog_author_instru}{/if}</div>
</div>
{literal}
<script type="text/javascript">
$(".contentedit").click(function(){
	$("#toolbar").show();
	$(".btn-toolbar").remove();
	var tooltop = $(this).offset();
	$("#toolbar").css("top",tooltop.top-180);
	$("#toolbar").css("right","20%");	
	$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','createlink']});
	$(this).freshereditor("edit", true);														   
});	
</script>
{/literal}