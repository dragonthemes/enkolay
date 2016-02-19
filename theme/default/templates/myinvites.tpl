<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="row-fluid">
				<div class="span4"><img src="{$SITE_BASEURL}/images/invite-friends.jpg" /></div>
				<div class="span8">
					<div class="InviteFriendTopHead">{$LANG.invites_share}</div>
				</div>
			</div>
			<div class="staticPageInner InviteFriend marTop20">
				<div class="row-fluid">
					<div class="span6">
						<div class="InviteFriendHead">{$LANG.invites_share_link}</div>
						<div class="row-fluid">
							<input type="text" class="InviteFriendTxtbx span5" name="link" id="link" value="{$invites_url}"/>
							<div class="clr"></div>
							<div class="marTop20">
								 <a href="http://www.facebook.com/sharer.php?s=100&p[title]=inviteslink&p[url]={$invites_url}&p[images][0]={$SITE_BASEURL}/images/mobile_support.jpg" class="socialLink colorblack">
									<img src="{$SITE_BASEURL}/images/fb.png" /> <span>{$LANG.invites_share_fb}</span>
								</a>		
								<a href="http://twitter.com/home?status={$invites_url}" class="socialLink colorblack" target="_blank"/>
									<img src="{$SITE_BASEURL}/images/tw.png" /> <span>{$LANG.invites_share_tw}</span>
								</a>
							</div>
						</div>
					</div>
					<div class="span6">	
						<div class="InviteFriendHead">{$LANG.invites_share_email}</div>
						{if $errormessage}
						<div id="errormsg" class="errormsg">{$errormessage}</div>
						{else}
						<div id="errormsg" class="">{$errormessage}</div>
						{/if}
						{if $successmsg}
						<div id="successmsg" class="successmsg">{$successmsg}</div>
						{else}
						<div id="successmsg" class="">{$successmsg}</div>
						{/if}
						<form name="Invite" id="Invite" method="post" action="" class="no-mar">
							<input type="hidden" name="fromemail" id="fromemail" value="{$userdetails.0.email}">	
							<div class="row-fluid">
								<div class="span3 txtAlignRht">{$LANG.invities_from} :</div>
								<div class="span9">
									<input type="text" name="from" id="from" value="{$userdetails.0.username}">
								</div>
							</div>
							<div class="row-fluid">
								<div class="span3 txtAlignRht">{$LANG.invities_to} :</div>
								<div class="span9">
									<textarea name="to" id="to"></textarea>
								</div>
							</div>
							<div class="row-fluid">
								<input type="submit" name="invitefriends" class="btn btn-warning pull-right" id="invitefriends" value="{$LANG.invities_send}" onclick="return invitesVal();">
							</div>
						</form>
					</div>
				</div>
				<div class="row-fluid">
					{*===My referals starts===*}
					<div class="InviteFriendHead">{$LANG.invities_referal}</div>
					{*===list the referal details starts==*}
					<table cellspacing="0" cellpadding="0" class="table tableContent">
						<thead>
							<tr>
								<th rowspan="2">{$LANG.invite_email}</th>
								<th rowspan="2">{$LANG.invite_update}</th>
								<th rowspan="2">{$LANG.invite_status}</th>
							</tr>								
						</thead>
						<tbody>	
							{section name=refer loop=$refererdetails}
								<tr class="grayc">
									<td>
										{$refererdetails[refer].referemail}
									</td>
									<td>
										{$refererdetails[refer].addeddate|date_format:'%b %d, %Y'|utf8_encode}
									</td>
									<td>
										{$refererdetails[refer].status}
									</td>
								</tr>	
							{/section}
						</tbody>
					</table>
					{*===list the referal details Ends==*}
					{*===My referals ends===*}
				</div>	
			</div>
		</div>
	</div>
</div>