<div class="blognewPostBg">
	<div class="headBgTopSec">
		{$LANG.draft_list}
		<div class="pull-right blogNewPopClose">X</div>
	</div>
	<div class="clearfix">	
		<ul class="popDraftAddList">
			{if !empty($drafts_list)}
				{section name="drafttit" loop="$drafts_list"}
					<li><a onclick="ShowDraftTitle('{$drafts_list[drafttit].domain_id}','{$drafts_list[drafttit].post_id}','{$drafts_list[drafttit].title}');"> {$drafts_list[drafttit].title}</a></li>
				{/section}	
			{/if}
		</ul>
	</div>
</div>