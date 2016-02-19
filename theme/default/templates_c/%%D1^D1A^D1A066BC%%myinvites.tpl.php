<?php /* Smarty version 2.6.3, created on 2015-12-09 12:11:43
         compiled from myinvites.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'myinvites.tpl', 78, false),array('modifier', 'utf8_encode', 'myinvites.tpl', 78, false),)), $this); ?>
<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="row-fluid">
				<div class="span4"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/invite-friends.jpg" /></div>
				<div class="span8">
					<div class="InviteFriendTopHead"><?php echo $this->_tpl_vars['LANG']['invites_share']; ?>
</div>
				</div>
			</div>
			<div class="staticPageInner InviteFriend marTop20">
				<div class="row-fluid">
					<div class="span6">
						<div class="InviteFriendHead"><?php echo $this->_tpl_vars['LANG']['invites_share_link']; ?>
</div>
						<div class="row-fluid">
							<input type="text" class="InviteFriendTxtbx span5" name="link" id="link" value="<?php echo $this->_tpl_vars['invites_url']; ?>
"/>
							<div class="clr"></div>
							<div class="marTop20">
								 <a href="http://www.facebook.com/sharer.php?s=100&p[title]=inviteslink&p[url]=<?php echo $this->_tpl_vars['invites_url']; ?>
&p[images][0]=<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/mobile_support.jpg" class="socialLink colorblack">
									<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/fb.png" /> <span><?php echo $this->_tpl_vars['LANG']['invites_share_fb']; ?>
</span>
								</a>		
								<a href="http://twitter.com/home?status=<?php echo $this->_tpl_vars['invites_url']; ?>
" class="socialLink colorblack" target="_blank"/>
									<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/tw.png" /> <span><?php echo $this->_tpl_vars['LANG']['invites_share_tw']; ?>
</span>
								</a>
							</div>
						</div>
					</div>
					<div class="span6">	
						<div class="InviteFriendHead"><?php echo $this->_tpl_vars['LANG']['invites_share_email']; ?>
</div>
						<?php if ($this->_tpl_vars['errormessage']): ?>
						<div id="errormsg" class="errormsg"><?php echo $this->_tpl_vars['errormessage']; ?>
</div>
						<?php else: ?>
						<div id="errormsg" class=""><?php echo $this->_tpl_vars['errormessage']; ?>
</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['successmsg']): ?>
						<div id="successmsg" class="successmsg"><?php echo $this->_tpl_vars['successmsg']; ?>
</div>
						<?php else: ?>
						<div id="successmsg" class=""><?php echo $this->_tpl_vars['successmsg']; ?>
</div>
						<?php endif; ?>
						<form name="Invite" id="Invite" method="post" action="" class="no-mar">
							<input type="hidden" name="fromemail" id="fromemail" value="<?php echo $this->_tpl_vars['userdetails']['0']['email']; ?>
">	
							<div class="row-fluid">
								<div class="span3 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invities_from']; ?>
 :</div>
								<div class="span9">
									<input type="text" name="from" id="from" value="<?php echo $this->_tpl_vars['userdetails']['0']['username']; ?>
">
								</div>
							</div>
							<div class="row-fluid">
								<div class="span3 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invities_to']; ?>
 :</div>
								<div class="span9">
									<textarea name="to" id="to"></textarea>
								</div>
							</div>
							<div class="row-fluid">
								<input type="submit" name="invitefriends" class="btn btn-warning pull-right" id="invitefriends" value="<?php echo $this->_tpl_vars['LANG']['invities_send']; ?>
" onclick="return invitesVal();">
							</div>
						</form>
					</div>
				</div>
				<div class="row-fluid">
										<div class="InviteFriendHead"><?php echo $this->_tpl_vars['LANG']['invities_referal']; ?>
</div>
										<table cellspacing="0" cellpadding="0" class="table tableContent">
						<thead>
							<tr>
								<th rowspan="2"><?php echo $this->_tpl_vars['LANG']['invite_email']; ?>
</th>
								<th rowspan="2"><?php echo $this->_tpl_vars['LANG']['invite_update']; ?>
</th>
								<th rowspan="2"><?php echo $this->_tpl_vars['LANG']['invite_status']; ?>
</th>
							</tr>								
						</thead>
						<tbody>	
							<?php unset($this->_sections['refer']);
$this->_sections['refer']['name'] = 'refer';
$this->_sections['refer']['loop'] = is_array($_loop=$this->_tpl_vars['refererdetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['refer']['show'] = true;
$this->_sections['refer']['max'] = $this->_sections['refer']['loop'];
$this->_sections['refer']['step'] = 1;
$this->_sections['refer']['start'] = $this->_sections['refer']['step'] > 0 ? 0 : $this->_sections['refer']['loop']-1;
if ($this->_sections['refer']['show']) {
    $this->_sections['refer']['total'] = $this->_sections['refer']['loop'];
    if ($this->_sections['refer']['total'] == 0)
        $this->_sections['refer']['show'] = false;
} else
    $this->_sections['refer']['total'] = 0;
if ($this->_sections['refer']['show']):

            for ($this->_sections['refer']['index'] = $this->_sections['refer']['start'], $this->_sections['refer']['iteration'] = 1;
                 $this->_sections['refer']['iteration'] <= $this->_sections['refer']['total'];
                 $this->_sections['refer']['index'] += $this->_sections['refer']['step'], $this->_sections['refer']['iteration']++):
$this->_sections['refer']['rownum'] = $this->_sections['refer']['iteration'];
$this->_sections['refer']['index_prev'] = $this->_sections['refer']['index'] - $this->_sections['refer']['step'];
$this->_sections['refer']['index_next'] = $this->_sections['refer']['index'] + $this->_sections['refer']['step'];
$this->_sections['refer']['first']      = ($this->_sections['refer']['iteration'] == 1);
$this->_sections['refer']['last']       = ($this->_sections['refer']['iteration'] == $this->_sections['refer']['total']);
?>
								<tr class="grayc">
									<td>
										<?php echo $this->_tpl_vars['refererdetails'][$this->_sections['refer']['index']]['referemail']; ?>

									</td>
									<td>
										<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['refererdetails'][$this->_sections['refer']['index']]['addeddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

									</td>
									<td>
										<?php echo $this->_tpl_vars['refererdetails'][$this->_sections['refer']['index']]['status']; ?>

									</td>
								</tr>	
							<?php endfor; endif; ?>
						</tbody>
					</table>
														</div>	
			</div>
		</div>
	</div>
</div>