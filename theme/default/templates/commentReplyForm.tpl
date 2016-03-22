<form name="leaveform_{$getcomments[comments].comment_id}" id="leaveform_{$getcomments[comments].comment_id}" class="form-horizontal sky-form" method="post" style="display:none;">
  <input type="hidden" name="action" id="action" value="insertreply">
  <input type="hidden" name="domain_id" id="domain_id" value="{$domain_id}">
  <input type="hidden" name="comment_id" id="comment_id" value="{$getcomments[comments].comment_id}">
  <input type="hidden" name="post_id" id="post_id_{$getcomments[comments].comment_id}" value="{$smarty.get.post_id}">
  <input type="hidden" name="comment_default" id="comment_default_{$getcomments[comments].comment_id}" value="{$blogsetting_list.0.comment_default}">
  <input type="hidden" name="title" id="title_{$getcomments[comments].comment_id}" value="{$smarty.get.post_title}">
  	<div class="commentInnerBor marLft40">
		<!--<div class="postRplyCommtHead">{$LANG.common_leavereply}</div>-->
        <div id="success_leave_one"></div>
		<div class="blogLeftComment">
			<label>Enter Your Name <span class="indicate">*</span></label>
			<input type="text" onfocus="if(this.value=='Enter Your Name')this.value='';" onblur="if(this.value=='')this.value='Enter Your Name';"  name="name" id="name_{$getcomments[comments].comment_id}" value="Enter Your Name"/>
		</div>
		<div class="blogLeftComment">
			<label>Enter Your E-Mail <span class="indicate">*</span></label>
			<input type="text" name="email" id="email_{$getcomments[comments].comment_id}" value="Enter Your E-Mail" onfocus="if(this.value=='Enter Your E-Mail')this.value='';" onblur="if(this.value=='')this.value='Enter Your E-Mail';"/>
		</div>
		<div class="blogLeftComment">
			<label>Enter Your Website</label>
			<input type="text" name="website" id="website_{$getcomments[comments].comment_id}" value="Enter Your Website" onfocus="if(this.value=='Enter Your Website')this.value='';" onblur="if(this.value=='')this.value='Enter Your Website';"/>
		</div>
		<div class="blogLeftComment">
			<label>Enter Your Comments <span class="indicate">*</span></label>
			<textarea name="comment_reply" id="comment_reply_{$getcomments[comments].comment_id}" onfocus="if(this.value=='Enter Your Comments')this.value='';" onblur="if(this.value=='')this.value='Enter Your Comments';">Enter Your Comments</textarea>
		</div>
		<div class="blogReplyBottm clearfix">
			<div class="blogReplyBottmLeft">
				<input class="check" type="checkbox" id="notifyme_{$getcomments[comments].comment_id}" name="notifyme" value="1"> {$LANG.common_notify}
			</div>
			<div class="blogReplyBottmRight">
				<input type="button" class="post" name="leavereply" id="leavereply_{$getcomments[comments].comment_id}" value="{$LANG.common_submit}" onclick="InsertcommentReply('{$getcomments[comments].comment_id}');">
			</div>
		</div>
	</div>
</form>