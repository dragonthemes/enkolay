<?php /* Smarty version 2.6.3, created on 2015-12-09 11:49:56
         compiled from userHome.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'userHome.tpl', 22, false),array('modifier', 'utf8_encode', 'userHome.tpl', 22, false),)), $this); ?>
<div class="row-fluid userHomeOuter">
	<div class="marTop20">
		<div class="container" id="container">
			<div class="HeadingUser"><?php echo $this->_tpl_vars['LANG']['user_mysite']; ?>
 <a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>onboarding<?php else: ?>onboarding.php<?php endif; ?>" class="rightbutton" name="add" id="add"><i class="fa fa-plus-square-o"></i> <?php echo $this->_tpl_vars['LANG']['user_addsite']; ?>
</a></div>
			<div class="clr"></div>
			<div id="MyAccPageInner" class="ListContainOuter">	
				<?php unset($this->_sections['sitedetails']);
$this->_sections['sitedetails']['name'] = 'sitedetails';
$this->_sections['sitedetails']['loop'] = is_array($_loop=$this->_tpl_vars['usersiteDetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sitedetails']['show'] = true;
$this->_sections['sitedetails']['max'] = $this->_sections['sitedetails']['loop'];
$this->_sections['sitedetails']['step'] = 1;
$this->_sections['sitedetails']['start'] = $this->_sections['sitedetails']['step'] > 0 ? 0 : $this->_sections['sitedetails']['loop']-1;
if ($this->_sections['sitedetails']['show']) {
    $this->_sections['sitedetails']['total'] = $this->_sections['sitedetails']['loop'];
    if ($this->_sections['sitedetails']['total'] == 0)
        $this->_sections['sitedetails']['show'] = false;
} else
    $this->_sections['sitedetails']['total'] = 0;
if ($this->_sections['sitedetails']['show']):

            for ($this->_sections['sitedetails']['index'] = $this->_sections['sitedetails']['start'], $this->_sections['sitedetails']['iteration'] = 1;
                 $this->_sections['sitedetails']['iteration'] <= $this->_sections['sitedetails']['total'];
                 $this->_sections['sitedetails']['index'] += $this->_sections['sitedetails']['step'], $this->_sections['sitedetails']['iteration']++):
$this->_sections['sitedetails']['rownum'] = $this->_sections['sitedetails']['iteration'];
$this->_sections['sitedetails']['index_prev'] = $this->_sections['sitedetails']['index'] - $this->_sections['sitedetails']['step'];
$this->_sections['sitedetails']['index_next'] = $this->_sections['sitedetails']['index'] + $this->_sections['sitedetails']['step'];
$this->_sections['sitedetails']['first']      = ($this->_sections['sitedetails']['iteration'] == 1);
$this->_sections['sitedetails']['last']       = ($this->_sections['sitedetails']['iteration'] == $this->_sections['sitedetails']['total']);
?>
				<div class="ListContainOuterHover">
					<table cellspacing="0" cellpadding="0" class="tableListContainer">
						<thead>
							<tr>
								<th class="ListContainHead" width="100">Şablon</th>
								<th class="ListContainHead" width="400">Site Başlığı</th>
								<th class="ListContainHead" width="400">Site Adresi</th>
							</tr>								
						</thead>
						<tbody>	
							<tr>
								<td rowspan="2"><img src="<?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']):  echo $this->_tpl_vars['SITE_IMAGE_BANNER_URL'];  elseif ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']):  echo $this->_tpl_vars['SITE_IMAGE_BLOG_URL'];  else:  echo $this->_tpl_vars['SITE_IMAGE_STORE_URL'];  endif; ?>/<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_image']; ?>
"  width="100%" height="120"/></td>
								<td class="borNone"><h4 class="ListContainTitle"><?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['site_title']):  echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['site_title'];  else:  echo $this->_tpl_vars['LANG']['user_home_my_title'];  endif; ?></h4></td>
                                
								<td class="borNone"><div><?php echo $this->_tpl_vars['LANG']['validtodate']; ?>
 : <?php if (time() <= $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['validtodate']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['validtodate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp));  else:  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['expire_grace_period'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp));  endif; ?></div><a class="ListContainUrl" href="<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['subdomainurl']; ?>
" target="_blank"><?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['subdomainurl']; ?>
</a>
                                <?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['original_remain_days'] > 0 || $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['grace_remain_days'] > 0): ?>
                                    <div>Kalan Gün : <?php if (time() <= $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['validtodate']):  echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['original_remain_days'];  else:  echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['grace_remain_days'];  endif; ?></div>
                                <?php endif; ?>
                                </td>                                  
							</tr>
							<tr>
								<td class="ListContainActionsec" colspan="2">
									<?php echo $this->_tpl_vars['objCommon']->getSubsCripDetailsFordomain($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']); ?>

                                    
									<a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>subscription/<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
/invoice<?php else: ?>subscription.php?domain_id=<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
&inv=invoice<?php endif; ?>"><?php if (( $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['payment_status'] == 'Yes' && $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['original_remain_days'] < 30 ) || $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['payment_status'] == 'No'): ?><i class="fa fa-globe"></i><span class="text"> <?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['payment_status'] == 'Yes' && $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['original_remain_days'] < 30): ?> <?php echo $this->_tpl_vars['LANG']['user_upgracde_btn'];  else:  echo $this->_tpl_vars['LANG']['user_buy_btn'];  endif; ?></span><?php endif; ?></a>
                                    
                                    <?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['payment_status'] == 'Yes'): ?>
									   <a href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>myhome/<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id'];  else: ?>MyHome.php?domain_id=<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id'];  endif; ?>"><i class="fa fa-globe"></i> <span><?php echo $this->_tpl_vars['LANG']['add_point_domains']; ?>
</span></a>
                                    <?php endif; ?>
									<?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']): ?>
										<a onclick="SettingFunction('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']; ?>
');">
											<i class="fa fa-edit"></i>
											<span class="text"><?php echo $this->_tpl_vars['LANG']['user_site_edit']; ?>
</span>
										</a>
									<?php elseif ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']): ?>
										<a onclick="SettingFunctionForBlog('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']; ?>
');">
											<i class="fa fa-edit"></i>
											<span class="text"><?php echo $this->_tpl_vars['LANG']['user_blog_edit']; ?>
</span>
										</a>
									<?php else: ?>
										<a onclick="SettingFunctionForStore('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['store_id']; ?>
');">
											<i class="fa fa-edit"></i>
											<span class="text"><?php echo $this->_tpl_vars['LANG']['user_store_edit']; ?>
</span>
										</a>
									<?php endif; ?>
									<!--<a class="s-btn light" onclick="openOptions('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['user_more']; ?>
 <i class="fa fa-caret-down"></i></a>	-->
									<?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']): ?>
									<a onclick="ShowCommentBlock('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']; ?>
');"><i class="fa fa-comments"></i> <span><?php echo $this->_tpl_vars['LANG']['user_blogcomments']; ?>
</span></a>
									<?php endif; ?>
									<?php if (! $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['store_id']): ?>
										<a onclick="ShowFormBlock('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']; ?>
');"><i class="fa fa-share"></i> <span><?php echo $this->_tpl_vars['LANG']['user_form']; ?>
</span></a>
									<?php endif; ?>
									
									<?php if ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']): ?>
										<a onclick="DeleteSubdomain('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['theme_id']; ?>
');"><i class="fa fa-trash-o"></i> <span><?php echo $this->_tpl_vars['LANG']['user_deletesite']; ?>
</span></a>
									<?php elseif ($this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['store_id']): ?>
										<a onclick="DeleteSubdomainWithStore('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['store_id']; ?>
');"><i class="fa fa-trash-o"></i> <span><?php echo $this->_tpl_vars['LANG']['user_deletesite']; ?>
</span></a>
									<?php else: ?>
										<a onclick="DeleteSubdomainWithBlog('<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['domain_id']; ?>
','<?php echo $this->_tpl_vars['usersiteDetails'][$this->_sections['sitedetails']['index']]['blog_id']; ?>
');"><i class="fa fa-trash-o"></i> <span><?php echo $this->_tpl_vars['LANG']['user_deletesite']; ?>
</span></a>
									<?php endif; ?>									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php endfor; else: ?>
					 <div class="noRec dc">No Records Found</div>
				<?php endif; ?>	
			</div>
            <div id="formentries" style="display:none">
								
			</div>
		</div>
	</div>
</div>