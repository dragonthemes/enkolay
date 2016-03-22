<div class="headBgTop">
	{$LANG.main_comments}
	<div class="pull-right curPoint" data-dismiss="modal" aria-hidden="true">X</div>
</div>
<div class="popaddTitle clearfix">
	<div class="blogPopCommMailOptLeft">
    	<h3>{$LANG.main_comments_show}</h3>
		<a id="approve" onclick="selectRecentComments('{$seperatedetails.0.domain_id}','approve');" class="active">{$LANG.main_comments_recent}</a>
		<a id="pending" onclick="selectPendingComments('{$seperatedetails.0.domain_id}','pending');" >{$LANG.main_comments_pending}</a>
		<a id="deleted" onclick="selectDeleteFromComments('{$seperatedetails.0.domain_id}','deleted');" >{$LANG.main_comments_deleted}</a>
		<a id="markspam" onclick="selectSpamFromComments('{$seperatedetails.0.domain_id}','markspam');" >{$LANG.main_comments_spam}</a>
	</div>
	<div class="blogPopCommMailOptRight">
		<div id="successmsg"></div>
		<div class="commentbtnnew" id="approvebutton"  style="display:none"><a onclick="approveCommentStatus('{$seperatedetails.0.domain_id}');">{$LANG.main_comment_approve}</a></div>
		<div class="commentbtnnew" id="deletebutton" style="display:none"><a onclick="deleteBlogCommentPopup('{$seperatedetails.0.domain_id}');">{$LANG.user_delete}</a></div>
		<div class="commentbtnnew" id="spambutton" style="display:none"><a onclick="spamBlogCommentPopup('{$seperatedetails.0.domain_id}');">{$LANG.main_comments_spam}</a></div>
		<div class="clearfix"></div>
		<div id="deletedcomments">
		<table class="table tableContent blogcommentTable"  cellspacing="0" cellpadding="0">
			<thead>	
				<tr>
					<th><input type="checkbox" id="selectall" onclick="selectAllForDelete();" /></th>	
					<th>{$LANG.user_datecomment}</th>
					<th>{$LANG.user_comment}</th>
					<th>{$LANG.user_commenton}</th>
					<th>{$LANG.user_by}</th>
					<th>{$LANG.user_status}</th>
				</tr>
			</thead>
			<tbody>
				 {if !empty($commentdetails)}
					{section name="commens" loop="$commentdetails"}
						<tr>
							<td><input type="checkbox" class="classcomment" name="commentselect" id="commentselect" onclick="selectSingleForDelete();" value="{$commentdetails[commens].comment_id}"/></td>
							<td>{$commentdetails[commens].addeddate}</td>
							<td>{$commentdetails[commens].comments}</td>
							<td>{$commentdetails[commens].commented_on}</td>
							<td>{$commentdetails[commens].commented_by}</td>
							<td>{$commentdetails[commens].status}</td>
						</tr>
					{/section}
				{else}
					<tr><td colspan="6" class="noRec">{$LANG.user_blog_norecord}</td></tr>
				{/if}	
			</tbody>	
		</table>
		</div>
	</div>
</div>