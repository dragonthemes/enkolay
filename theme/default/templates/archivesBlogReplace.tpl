<div onmouseout="changeOutArchivesContent('{$blogsidelist.0.domain_id}');">
	<div class="authCont " contenteditable="true" id="archivescontent">
		{if $blogsidelist.0.archives}
			{$blogsidelist.0.archives}
		{else}
			{$LANG.user_instruction}
		{/if}
	</div>
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