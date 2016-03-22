<div class="row-fluid">
	<div class="pull-right">
		<a class="btn btn-warning" onclick="hideTwodivForm('sitelisting_id','MyAccPageInner','blogcomment');">{$LANG.user_sitelist}</a>
		<a class="btn btn-success" href="{$SUBDOMAIN}">{if $seperatedetails.0.site_title}{$seperatedetails.0.site_title}{elseif $seperatedetails.0.site_title eq '' and $seperatedetails.0.blog_id}{$LANG.blog_title_name}{else}{$LANG.site_title_name}{/if}</a>
		<a class="btn btn-info" onclick="SettingFunctionForBlog('{$seperatedetails.0.domain_id}','{$seperatedetails.0.blog_id}');">{$LANG.user_editlist}</a>
	</div>
</div>
<div id="successmsg"></div>
<div id="deletebutton" style="display:none"><a class="btn btn-danger" onclick="deleteBlogComment('{$seperatedetails.0.domain_id}');">{$LANG.user_delete}</a></div>
<div class="tableListContainer">
	<table width="100%" border="0" class="tableListContent">
		<thead>
			<th class="dl"><input type="checkbox" id="selectall" onclick="selectAllForDelete();"></th>	
			<th>{$LANG.user_datecomment}</th>
			<th>{$LANG.user_comment}</th>
			<th>{$LANG.user_commenton}</th>
			<th>{$LANG.user_by}</th>
			<th>{$LANG.user_status}</th>
		</thead>
		<tbody>
		{if !empty($commentdetails)}
			{section name="commens" loop="$commentdetails"}
				<tr>
					<td><input type="checkbox" class="classcomment" name="commentselect" id="commentselect" onclick="selectSingleForDelete()" value="{$commentdetails[commens].comment_id}"/></td>
					<td>{$commentdetails[commens].addeddate}</td>
					<td>{$commentdetails[commens].comments}</td>
					<td>{$commentdetails[commens].commented_on}</td>
					<td>{$commentdetails[commens].commented_by}</td>
					<td>{$commentdetails[commens].status}</td>
				</tr>
			{/section}
		{else}
			<tr><td colspan="6" class="noRec dc">{$LANG.user_blog_norecord}</td></tr>
		{/if}	
	</tbody>	
</table>
</div>