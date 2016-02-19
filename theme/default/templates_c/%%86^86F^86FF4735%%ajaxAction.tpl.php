<?php /* Smarty version 2.6.3, created on 2015-12-09 11:50:39
         compiled from ajaxAction.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'ajaxAction.tpl', 20, false),array('modifier', 'stripslashes', 'ajaxAction.tpl', 90, false),)), $this); ?>
<?php if ($this->_tpl_vars['action'] == 'store_admin_vieworderhistory'): ?>	
<!-- Order History Details in myaccount page -->
<div class="menuPopInner">
		<div class="orderPopDiv flt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead"><?php echo $this->_tpl_vars['LANG']['ajaxAction_orderDetails']; ?>
</h1></li>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_orderDetails']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['order_no']; ?>
</span>
			</li>			
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_orderStatus']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php if ($this->_tpl_vars['order_history']['0']['order_status'] == 'Ordered'):  echo $this->_tpl_vars['LANG']['ajaxAction_orderStatus_ordered'];  elseif ($this->_tpl_vars['order_history']['0']['order_status'] == 'Shipped'):  echo $this->_tpl_vars['LANG']['ajaxAction_orderStatus_Shipped'];  elseif ($this->_tpl_vars['order_history']['0']['order_status'] == 'Refund'):  echo $this->_tpl_vars['LANG']['ajaxAction_orderStatus_refund'];  elseif ($this->_tpl_vars['order_history']['0']['order_status'] == 'cancel'):  echo $this->_tpl_vars['LANG']['ajaxAction_orderStatus_cancel'];  endif; ?></span>
			</li>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_orderDate']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['order_history']['0']['addeddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%B, %d %I:%M:%S %p") : smarty_modifier_date_format($_tmp, "%B, %d %I:%M:%S %p")); ?>
</span>
			</li>
			
		</ul>
		</div>
		<div class="orderPopDiv frt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead"><?php echo $this->_tpl_vars['LANG']['ajaxAction_deliveryDetails']; ?>
</h1></li>
			<?php if ($this->_tpl_vars['order_history']['0']['name'] != ''): ?>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_name']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['name']; ?>
</span>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['order_history']['0']['phone_no'] != ''): ?>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_phoneNumber']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['phone_no']; ?>
</span>
			</li>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['order_history']['0']['address'] != ''): ?>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_address']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['address']; ?>
</span>
			</li>
			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['order_history']['0']['zip'] != ''): ?>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_zipcode']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['zip']; ?>
</span>
			</li>
			<?php endif; ?>
		</ul>
		</div>
	<div class="clr"></div>
		<div class="orderPopDiv flt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead"><?php echo $this->_tpl_vars['LANG']['ajaxAction_paymentDetails']; ?>
</h1></li>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_paymentMethod']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['payment_typ']; ?>
</span>
			</li>
			<li>
				<span class="name"><?php echo $this->_tpl_vars['LANG']['ajaxAction_transactionId']; ?>
</span>
				<span class="col">:</span>
				<span class="value"><?php echo $this->_tpl_vars['order_history']['0']['txn_id']; ?>
</span>
			</li>
		</ul>
		</div>

</div>

<div class="ordertable clr">
	<div id="doublescroll">
		<table cellspacing='0' cellpadding='0' width='100%' align='center' border='0'>
		<tr class="ordertable1row orderborder">
			<td width="25%"><?php echo $this->_tpl_vars['LANG']['ajaxAction_product']; ?>
</td>			
			<td align="center" width="10%"><?php echo $this->_tpl_vars['LANG']['ajaxAction_quantity']; ?>
</td>
			<td align="right" width="15%"><?php echo $this->_tpl_vars['LANG']['ajaxAction_price']; ?>
</td>
			<td align="right" width="15%"><?php echo $this->_tpl_vars['LANG']['ajaxAction_totalPrice']; ?>
</td>
		</tr>
		<?php unset($this->_sections['order']);
$this->_sections['order']['name'] = 'order';
$this->_sections['order']['loop'] = is_array($_loop=$this->_tpl_vars['order_history']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['order']['show'] = true;
$this->_sections['order']['max'] = $this->_sections['order']['loop'];
$this->_sections['order']['step'] = 1;
$this->_sections['order']['start'] = $this->_sections['order']['step'] > 0 ? 0 : $this->_sections['order']['loop']-1;
if ($this->_sections['order']['show']) {
    $this->_sections['order']['total'] = $this->_sections['order']['loop'];
    if ($this->_sections['order']['total'] == 0)
        $this->_sections['order']['show'] = false;
} else
    $this->_sections['order']['total'] = 0;
if ($this->_sections['order']['show']):

            for ($this->_sections['order']['index'] = $this->_sections['order']['start'], $this->_sections['order']['iteration'] = 1;
                 $this->_sections['order']['iteration'] <= $this->_sections['order']['total'];
                 $this->_sections['order']['index'] += $this->_sections['order']['step'], $this->_sections['order']['iteration']++):
$this->_sections['order']['rownum'] = $this->_sections['order']['iteration'];
$this->_sections['order']['index_prev'] = $this->_sections['order']['index'] - $this->_sections['order']['step'];
$this->_sections['order']['index_next'] = $this->_sections['order']['index'] + $this->_sections['order']['step'];
$this->_sections['order']['first']      = ($this->_sections['order']['iteration'] == 1);
$this->_sections['order']['last']       = ($this->_sections['order']['iteration'] == $this->_sections['order']['total']);
?>
			<tr class="ordertable2row orderborder">
				<td valign="top">
					<?php echo ((is_array($_tmp=$this->_tpl_vars['order_history'][$this->_sections['order']['index']]['product_name'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
<br/>		
					
				</td>				
				<td align="center" valign="top" class="padleft"><?php echo $this->_tpl_vars['order_history'][$this->_sections['order']['index']]['quantity']; ?>
</td>                
				<td align="right" valign="top"><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][$this->_sections['order']['index']]['price']; ?>
</td>
				<td align="right" valign="top"><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][$this->_sections['order']['index']]['product_price']; ?>
</td>
			</tr>
		<?php endfor; endif; ?>
		<tr class="totalrow">
			<td colspan="4" class="textright"><?php echo $this->_tpl_vars['LANG']['ajaxAction_subtotal']; ?>
</td>
			<td align="right"><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][0]['sub_total']; ?>
</td>
		</tr>
		<tr class="totalrow">
			<td colspan="4" class="textright"><?php echo $this->_tpl_vars['LANG']['ajaxAction_tax']; ?>
(%)</td>
			<td align="right"><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][0]['tax_val']; ?>
</td>
		</tr>
        <tr class="totalrow">
			<td colspan="4" class="textright"><?php echo $this->_tpl_vars['LANG']['ajaxAction_shiping']; ?>
</td>
			<td align="right"><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][0]['ship_val']; ?>
</td>
		</tr>
		<tr class="totalrow">
			<td colspan="4" class="textright"><?php echo $this->_tpl_vars['LANG']['ajaxAction_total']; ?>
</td>
			<td align="right" ><?php echo $this->_tpl_vars['symbol']; ?>
 <?php echo $this->_tpl_vars['order_history'][0]['grand_total']; ?>
</td>
		</tr>
	</table>
	</div>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['action'] == 'updateColumncount'): ?>

									 <?php unset($this->_sections['rowcount']);
$this->_sections['rowcount']['name'] = 'rowcount';
$this->_sections['rowcount']['start'] = (int)1;
$this->_sections['rowcount']['loop'] = is_array($_loop=$this->_tpl_vars['pagefirstlist']['0']['column_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rowcount']['show'] = true;
$this->_sections['rowcount']['max'] = $this->_sections['rowcount']['loop'];
$this->_sections['rowcount']['step'] = 1;
if ($this->_sections['rowcount']['start'] < 0)
    $this->_sections['rowcount']['start'] = max($this->_sections['rowcount']['step'] > 0 ? 0 : -1, $this->_sections['rowcount']['loop'] + $this->_sections['rowcount']['start']);
else
    $this->_sections['rowcount']['start'] = min($this->_sections['rowcount']['start'], $this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] : $this->_sections['rowcount']['loop']-1);
if ($this->_sections['rowcount']['show']) {
    $this->_sections['rowcount']['total'] = min(ceil(($this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] - $this->_sections['rowcount']['start'] : $this->_sections['rowcount']['start']+1)/abs($this->_sections['rowcount']['step'])), $this->_sections['rowcount']['max']);
    if ($this->_sections['rowcount']['total'] == 0)
        $this->_sections['rowcount']['show'] = false;
} else
    $this->_sections['rowcount']['total'] = 0;
if ($this->_sections['rowcount']['show']):

            for ($this->_sections['rowcount']['index'] = $this->_sections['rowcount']['start'], $this->_sections['rowcount']['iteration'] = 1;
                 $this->_sections['rowcount']['iteration'] <= $this->_sections['rowcount']['total'];
                 $this->_sections['rowcount']['index'] += $this->_sections['rowcount']['step'], $this->_sections['rowcount']['iteration']++):
$this->_sections['rowcount']['rownum'] = $this->_sections['rowcount']['iteration'];
$this->_sections['rowcount']['index_prev'] = $this->_sections['rowcount']['index'] - $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['index_next'] = $this->_sections['rowcount']['index'] + $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['first']      = ($this->_sections['rowcount']['iteration'] == 1);
$this->_sections['rowcount']['last']       = ($this->_sections['rowcount']['iteration'] == $this->_sections['rowcount']['total']);
?>
									<div class="addwidth column_inner_div <?php if ($this->_tpl_vars['pagefirstlist']['0']['column_count'] == '3'): ?>span6<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist']['0']['column_count'] == '4'): ?>span4<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist']['0']['column_count'] == '5'): ?>span3<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist']['0']['column_count'] == '6'): ?>five_column<?php endif; ?>" id="col_<?php echo $this->_sections['rowcount']['index']; ?>
">
										<input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="<?php echo $this->_tpl_vars['pagefirstlist']['0']['pagelist']; ?>
">
											<!---COlumn Sortable---->
											<ul id="sortable_<?php echo $this->_sections['rowcount']['index']; ?>
" class="clearfix no-mar sortcolumn">
													<?php echo $this->_tpl_vars['objCommon']->getColumnPageList($this->_sections['rowcount']['index'],$this->_tpl_vars['pagefirstlist']['0']['pagelist']); ?>

													<?php if ($this->_tpl_vars['columnpagefirstlist']): ?>
													<?php unset($this->_sections['colpagelist']);
$this->_sections['colpagelist']['name'] = 'colpagelist';
$this->_sections['colpagelist']['loop'] = is_array($_loop=($this->_tpl_vars['columnpagefirstlist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['colpagelist']['show'] = true;
$this->_sections['colpagelist']['max'] = $this->_sections['colpagelist']['loop'];
$this->_sections['colpagelist']['step'] = 1;
$this->_sections['colpagelist']['start'] = $this->_sections['colpagelist']['step'] > 0 ? 0 : $this->_sections['colpagelist']['loop']-1;
if ($this->_sections['colpagelist']['show']) {
    $this->_sections['colpagelist']['total'] = $this->_sections['colpagelist']['loop'];
    if ($this->_sections['colpagelist']['total'] == 0)
        $this->_sections['colpagelist']['show'] = false;
} else
    $this->_sections['colpagelist']['total'] = 0;
if ($this->_sections['colpagelist']['show']):

            for ($this->_sections['colpagelist']['index'] = $this->_sections['colpagelist']['start'], $this->_sections['colpagelist']['iteration'] = 1;
                 $this->_sections['colpagelist']['iteration'] <= $this->_sections['colpagelist']['total'];
                 $this->_sections['colpagelist']['index'] += $this->_sections['colpagelist']['step'], $this->_sections['colpagelist']['iteration']++):
$this->_sections['colpagelist']['rownum'] = $this->_sections['colpagelist']['iteration'];
$this->_sections['colpagelist']['index_prev'] = $this->_sections['colpagelist']['index'] - $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['index_next'] = $this->_sections['colpagelist']['index'] + $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['first']      = ($this->_sections['colpagelist']['iteration'] == 1);
$this->_sections['colpagelist']['last']       = ($this->_sections['colpagelist']['iteration'] == $this->_sections['colpagelist']['total']);
?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['title_select']): ?>
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">								
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','title_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onblur="updateTitle('buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateTitle('buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_title" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Başlığı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'];  endif; ?></div>
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['description_select']): ?>
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div  class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','description_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>								
																<div id="buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_paragraph" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>" onblur="updateDesc('buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateDesc('buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" contenteditable="true"  data-ph="Paragrafı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'];  endif; ?></div>					
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['divider']): ?>
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','divider');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildDivide" class="">
																	<hr />
																</div>
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_multiple_select']): ?>
															<?php echo $this->_tpl_vars['objCommon']->getImageText($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist'],'singletext'); ?>

                                                            
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildImgTxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildImgTxtOuter">
																	<div class="row-fluid">
																		<div class="span3 buildImgTxt <?php if (! $this->_tpl_vars['images']): ?>minimagewidth<?php endif; ?>">
																			<?php if (! $this->_tpl_vars['images']): ?>	
																																								<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																				<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																					<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																						</div>
																						<input type='hidden' name="status" value="singletext"/>
																						<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																					</label>
																				</form>
																			<?php else: ?>
																				<div class="uploadImgBg">
																					
																					<img class="imagechangeNew" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
">
																					
																																										<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																					<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																						<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																							<div class="button">
																								<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																							</div>
																							<input type='hidden' name="status" value="singletext"/>
																							<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																						</label>
																					</form>
																				</div>
																			<?php endif; ?>
																		</div>
																		<div class="span9">
																			<div id="imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onblur="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead borNone <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_imagetitle" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'];  endif; ?></div> 
																		</div>
																	</div>
																</div>
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_select']): ?>
														<?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid">
																 <?php if (! $this->_tpl_vars['images']): ?>
																																		<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																	<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																	<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																			</div>
																			<input type='hidden' name="status" value="single"/>
																			<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																		</label>
																	</form>
																<?php else: ?>
																	<div class="uploadImgBg" style="text-align:<?php echo $this->_tpl_vars['alignment']; ?>
">
																		<a><img class="imagechange" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
"></a>
																																				<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'><div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																		<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0; clear:both;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
																			<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
																				<div class="button">
																					<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																				</div>
																				<input type='hidden' name="status" value="single"/>
																				<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																			</label>
																		</form>
																	</div>
																<?php endif; ?>
																</div>
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['contact_form']): ?>
															<?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','contact_form');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="" class="contactform">
																	<!--<div  onclick="showContactMail();">
																		Form Entries
																	</div>-->
																	
																	<a data-toggle="modal" href="#ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="formEntryButton pull-right">Form Entries</a>
																	<div class="themeheadsec contentedit <?php if ($this->_tpl_vars['contactlist']['0']['title_head'] == ''): ?>clickheretext contenttext <?php endif; ?>contactTxt contactHead" style="<?php if ($this->_tpl_vars['contactlist']['0']['buildContact_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_fontcolor']): ?>color:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontcolor'];  endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_style']): ?>font-family:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_line_size']): ?>line-height:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_size']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_size']; ?>
px;<?php endif; ?>" id="buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
" onblur="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" onkeydown="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" data-ph="Edit Heading Here"><?php if ($this->_tpl_vars['contactlist']['0']['title_head']):  echo $this->_tpl_vars['contactlist']['0']['title_head'];  endif; ?></div>
																	<div class="row-fluid marTop10"> 	
																		<div class="span12 relatepop">
																			<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php echo $this->_tpl_vars['contactlist']['0']['text1']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
																			<div class="clearfix"></div>
																			<input type="text" value="" placeholder="Ad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?>
																		</div>
																	</div>
																	<div class="row-fluid marTop10"> 
																		<div class="span12 relatepop">
																			<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
																			<div class="clearfix"></div>
																			<input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?>
																		</div>
																	</div>
																	<div class="row-fluid marTop10 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php echo $this->_tpl_vars['contactlist']['0']['text3']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
																		<div class="clearfix"></div>
																		<input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?>
																	</div>
																	<div class="row-fluid marTop10 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
																		<div class="clearfix"></div>
																		<textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"></textarea><?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?>
																	</div>
																	<div class="row-fluid marTop10">
																		<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" class="buildPagePostButton"> </div>
																	</div>
																</div>
																
																																<div id="modals">
																	<div id="ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="modal hide">
																		<div class="formEntryPopForm clearfix">
																			<div id="errtext"></div>
																			<?php echo $this->_tpl_vars['objCommon']->getEmai($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																			<form name="conatctmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="no-mar">
																				<div id="errtext"></div>
																				<input type="text" name="contactmail" id="contactmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['mailid']; ?>
" >
																				<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																			</form>
																			<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
																		</div>
																	</div>
																</div>
																<div id="contactForm"></div>	
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['social_plugins']): ?>
														<?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div class="moveicon"></div>
																<div id="buildSocial_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildSocialIcon">
																	<input type="button" class="fbicon" value="" />
																	<input type="button" class="twittericon" value="" />
																	<input type="button" class="linkedicon" value="" />
																	<input type="button" class="mailicon" value="" />
																</div>
																
																<div id="pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="socialPop" style="display:none;">
																	<div class="leftside">
																		<i class="fa fa-users fontSize42"></i>
																		<label><?php echo $this->_tpl_vars['LANG']['social_link_name']; ?>
</label>
																	</div>
																	<div class="rightside">
																		<form class="no-mar" id="socialplugin_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" name="socialplugin" method="post">
																			<input type="hidden" name="domain_id" id="domain_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id']; ?>
">
																			<input type="hidden" name="page_id" id="page_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['page_id']; ?>
">
																			<input type="hidden" name="page_list_id" id="page_list_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																			<div class="socialInn clearfix">
																				<span><i class="fa fa-facebook"></i></span>
																				<input type="text" name="fb" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['fb']; ?>
" id="fb_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://facebook.com/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa fa-tumblr"></i></span>
																				<input type="text" name="tw" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['twitter']; ?>
" id="tw_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://twitter.com/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa-linkedin"></i></span>
																				<input type="text" name="ln" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['linkedin']; ?>
" id="ln_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://linkedin.com/in/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa fa-envelope-o"></i></span>
																				<input type="text" name="mail" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['mail']; ?>
" id="mail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="ornek@ornek.com">
																			</div>
																			<div class="mapButton clearfix">
																				<input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																				<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();">
																			</div>
																	   </form>
																	 </div>
																</div>
															</li>
														<?php endif; ?>
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['youtube_video']): ?>
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','youtube_video');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails_buildpage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																<div class="youtubeDiv clearfix" id="youtubeDiv_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" style="display:block;<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
																	<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url'] != ''):  echo $this->_tpl_vars['youtubelist']['0']['youtube_url'];  else:  echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/youtubeLogo.png<?php endif; ?>" width="100%" height="200"></iframe>	
																</div>
																<div class="youtubelabelsPopup" id="youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;">
																	<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
																	
																	<form name="youtubefrm_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
																		<div id="error_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"></div>
																		<div class="contactlabelsPopupLeft">
																			<label>Youtube Video Adresi</label>
																			<input type="text" class="videoUrl" name="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
"/>
																		</div>
																		<div class="contactlabelsPopupRight">
																			<div class="contactlabelsPopupRightInner">
																				<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																				<select class="spacingOption" name="spacing" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																				</select>
																				<label>Genişlik</label>
																				<select class="widthOption" name="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="Küçük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>selected="selected"<?php endif; ?>>Küçük</option>
																					<option value="Orta" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>selected="selected"<?php endif; ?>>Orta</option>
																					<option value="Büyük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>selected="selected"<?php endif; ?>>Büyük</option>
																				</select>
																			</div>
																			<div>
																				<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																			</div>
																		</div>
																	</form>
																</div>
															</li>
														<?php endif; ?>
														<!--Gallery Process Start-->
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery']): ?>
															 <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','gallery');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="galImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid center columngallery">
																 <?php echo $this->_tpl_vars['objCommon']->getGalleryImage($_SESSION['domain_id'],$_SESSION['page_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																 <?php if ($this->_tpl_vars['images']): ?>
																	 <?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galimg']['show'] = true;
$this->_sections['galimg']['max'] = $this->_sections['galimg']['loop'];
$this->_sections['galimg']['step'] = 1;
$this->_sections['galimg']['start'] = $this->_sections['galimg']['step'] > 0 ? 0 : $this->_sections['galimg']['loop']-1;
if ($this->_sections['galimg']['show']) {
    $this->_sections['galimg']['total'] = $this->_sections['galimg']['loop'];
    if ($this->_sections['galimg']['total'] == 0)
        $this->_sections['galimg']['show'] = false;
} else
    $this->_sections['galimg']['total'] = 0;
if ($this->_sections['galimg']['show']):

            for ($this->_sections['galimg']['index'] = $this->_sections['galimg']['start'], $this->_sections['galimg']['iteration'] = 1;
                 $this->_sections['galimg']['iteration'] <= $this->_sections['galimg']['total'];
                 $this->_sections['galimg']['index'] += $this->_sections['galimg']['step'], $this->_sections['galimg']['iteration']++):
$this->_sections['galimg']['rownum'] = $this->_sections['galimg']['iteration'];
$this->_sections['galimg']['index_prev'] = $this->_sections['galimg']['index'] - $this->_sections['galimg']['step'];
$this->_sections['galimg']['index_next'] = $this->_sections['galimg']['index'] + $this->_sections['galimg']['step'];
$this->_sections['galimg']['first']      = ($this->_sections['galimg']['iteration'] == 1);
$this->_sections['galimg']['last']       = ($this->_sections['galimg']['iteration'] == $this->_sections['galimg']['total']);
?>
																		<div class="imageGallery" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else: ?>width:49%;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
																			<img width="100%" height="200" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
">
																			<div class="galleryimageInn">
																				<a onclick="deleteGalImg('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																				<a class="galleryimage galleryimagecomm" id="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"><i class="fa fa-plus-square-o"></i></a>
																			</div>
																		</div>
																	 <?php endfor; endif; ?>
																	 
																 <?php else: ?>
																																		<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																	<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div></div>
																	<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																			</div>
																			<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																		</label>
																	</form>
																  <?php endif; ?>
																  </div>
																  <!--Gallery Image Popup-->
																	<div id="galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;" class="galleryimagepop">
																		<form name="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
																			<div class="leftside">
																				<i class="fa fa-picture-o"></i>
																				<div class="clr"></div>
																				<a onclick="showGalleryPopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" style="cursor:pointer;"><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</a>
																			</div>
																			<div class="rightside">
																				<label><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</label>
																				<select class="columnOption" name="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="2" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>selected<?php endif; ?>>2</option>
																					<option value="3" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>selected<?php endif; ?>>3</option>
																					<option value="4" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>selected<?php endif; ?>>4</option>
																					<option value="5" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>selected<?php endif; ?>>5</option>
																					<option value="6" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>selected<?php endif; ?>>6</option>
																				</select>
																				<label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
																				<select class="imagespacingOption" name="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
																				</select>
																				<label><?php echo $this->_tpl_vars['LANG']['border_name']; ?>
</label>
																				<select class="borderOption" name="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
																					<option value="<?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
</option>
																				</select>
																				<!--<label>Cropping</label>
																				<select class="widthOption" name="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
																					<option value="None">None</option>
																					<option value="Square">Square</option>
																					<option value="Rectangle">Rectangle</option>
																				</select>-->
																				<div class="clearfix">
																					<input type="button" class="btn btn-success pull-left" value="save" onclick="addgalleryProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																					<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																				</div>
																			</div>
																		</form>
																	</div>
																	
																		<div id="galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imagepopupdiv">
																			<div id="image-chooser-nav">
																				<div id="image-chooser-nav-label">
																					<div><?php echo $this->_tpl_vars['LANG']['select_image_from']; ?>
</div>
																				</div>
																				<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																					<div class="colWhite">
																						<span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>

																					</div>
																				</div>
																				<div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();$('.loadmask').hide();">X</div>
																			</div>
																			<div id="browsebutton" class="popBrowseInner">
																																								<div id='imageloadstatus' style="display:none;">
																					<div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
																				</div>
																				<form id="galimagephotogal<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																					<div class="uploadTxtPop"><?php echo $this->_tpl_vars['LANG']['click_here_to_upload']; ?>
</div>
																					<label for="file" class="input input-file no-mar" style="display:block"  name="imageloadbutton" id="imageloadbutton">
																						<div class="button">
																							<input type="file" class="hei180" value="" onchange="galimagupdate('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
')" name="photos[]" id="galimgphoto">
																						</div>
																						<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																					</label>
																				</form>
																				
																			</div>
																		</div>
																	<div id="masktable" style="display:none;"></div>
																	<!--Gallery Image Popup Ends-->
															</li>
														<?php endif; ?>
														<!--Gallery Process End-->
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map']): ?>
															 <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showMapPopUp('mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="activemove theme2bginn posRel">
																 <div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																<div class="moveicon"></div>
																 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
																	<div id="mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="mappop" style="display:none;">
																		<div class="leftside">
																			<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/map_marker.png" alt="map image"/>
																			<label><?php echo $this->_tpl_vars['LANG']['map_name']; ?>
</label>
																		</div>
																		<div class="rightside">
																			<form name="mapframepopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar" method="post">
																				<label><?php echo $this->_tpl_vars['LANG']['address_name']; ?>
</label>
																				<input class="mapinputTxt" type="text" name="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
">
																				<label><?php echo $this->_tpl_vars['LANG']['zoom_name']; ?>
</label>
																																								<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
" onkeypress="keypress();">
																				<label>Enlem</label>
																				<input class="mapinputTxt" type="text" name="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
">
																				<label>Boylam</label>
																				<input class="mapinputTxt" type="text" name="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
">
																				<div class="mapButton clearfix">
																					<input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right mapcancel" />
																				</div>
																		   </form>
																		 </div>
																	</div>
																 </li>
														<?php endif; ?>
														<!--slider process start-->
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['slider']): ?>
																<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
																	<div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','slider');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																	<div id="sliImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid hoverSlide">
																	 <?php echo $this->_tpl_vars['objCommon']->getSliderImageNew($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																		 <div id="slider_images" class="buildColumnPageSlider" style="<?php if ($this->_tpl_vars['slider_images']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
																			 <div class="nivoSlider nivoSliderImg">
																				 <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['slider_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sliimg']['show'] = true;
$this->_sections['sliimg']['max'] = $this->_sections['sliimg']['loop'];
$this->_sections['sliimg']['step'] = 1;
$this->_sections['sliimg']['start'] = $this->_sections['sliimg']['step'] > 0 ? 0 : $this->_sections['sliimg']['loop']-1;
if ($this->_sections['sliimg']['show']) {
    $this->_sections['sliimg']['total'] = $this->_sections['sliimg']['loop'];
    if ($this->_sections['sliimg']['total'] == 0)
        $this->_sections['sliimg']['show'] = false;
} else
    $this->_sections['sliimg']['total'] = 0;
if ($this->_sections['sliimg']['show']):

            for ($this->_sections['sliimg']['index'] = $this->_sections['sliimg']['start'], $this->_sections['sliimg']['iteration'] = 1;
                 $this->_sections['sliimg']['iteration'] <= $this->_sections['sliimg']['total'];
                 $this->_sections['sliimg']['index'] += $this->_sections['sliimg']['step'], $this->_sections['sliimg']['iteration']++):
$this->_sections['sliimg']['rownum'] = $this->_sections['sliimg']['iteration'];
$this->_sections['sliimg']['index_prev'] = $this->_sections['sliimg']['index'] - $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['index_next'] = $this->_sections['sliimg']['index'] + $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['first']      = ($this->_sections['sliimg']['iteration'] == 1);
$this->_sections['sliimg']['last']       = ($this->_sections['sliimg']['iteration'] == $this->_sections['sliimg']['total']);
?>
																					<div class="imageSlider">
																						<img width="100%" height="300" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/> 			 
																					</div>
																				 <?php endfor; endif; ?>
																			 </div>
																			 <div class="clr"></div>
																		 </div>
																		 <div id="sliderform">													   
																		   <?php if ($this->_tpl_vars['slider_images']): ?>
																				<a class="ColsliderNoImg2" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">Düzenle</a>
																			<?php endif; ?>
																			<?php if (! $this->_tpl_vars['slider_images']): ?>
																				<a class="ColsliderNoImg1" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></a>
																			<?php endif; ?>														
																		  </div>
																	</div>
																</li>  
															<?php endif; ?>
														<!--slider process end-->								
														<!--Google Adsense Start-->
														<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_adsense']): ?>
															<li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
																	<div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','google_adsense');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																	<input type='radio' name="google_ads" id="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="scriptImgInput" value="script" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																	<label class="scriptImg" for="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																		<div class="scriptInner">
																			<div class="scriptImage"><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</div>
																		</div>
																	</label>
																	<input type='radio' name="google_ads" id="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imgaeImgInput" value="image" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																	<label class="imgaeImg" for="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																		<div class="imageInner">
																			<div class="imageHead"><?php echo $this->_tpl_vars['LANG']['image_name']; ?>
</div>
																			<div class="imageImage"></div>
																		</div>
																	</label>
																	
																	<div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop">
																		<div class="leftside">
																			<i class="fa fa-file-text-o fontSize42"></i>
																			<label><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</label>
																		</div>
																		<div class="rightside">
																			<form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																				<label><?php echo $this->_tpl_vars['LANG']['adress_name']; ?>
</label>
																				<input type="hidden" name="script" id="script" value="script">
																				 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"   placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
																				 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																				
																				<div class="mapButton clearfix">
																					 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#script_'+<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
).hide();"/>
						
																				</div>
																		   </form>
																		 </div>
																	</div>
																	
																	<!--<div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>  style="display:block;"<?php else: ?>style="display:none;" <?php endif; ?>>
																		<form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																		<input type="hidden" name="script" id="script" value="script">
																		 <textarea name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_ansen" placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
																		 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																		 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
																		</form>  
																	</div>-->
																	
																	<?php echo $this->_tpl_vars['objCommon']->getImageGoogle($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

																	<div id="images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>  style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>>
																 <?php if (! $this->_tpl_vars['images_google']): ?>
																	
																																		<div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
																	<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>
																	<form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
																			</div>
																			<input type='hidden' name="image" id="image" value="image"/>
																			<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																		</label>
																	</form>
																<?php else: ?>
																  
																	<div class="googAddOption">
																		<img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"> 
																		<!--<img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"> -->
																		<div class="googAddDelete">
																			<a class="galleryimage" onclick="deletegoogleImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
');">
																				<i class="fa fa-trash-o"></i>
																			</a>
																		</div>
																		<a class="googAddUrl" onclick="showAddUrl('urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"> <?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</a>
																	</div>
																	
																	<div id="urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop" style="display:none;">
																		<div class="leftside">
																			<i class="fa fa-external-link fontSize42"></i>
																			<label><?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</label>
																		</div>
																		<div class="rightside">
																			<form name="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
																				<label><?php echo $this->_tpl_vars['LANG']['url_name']; ?>
</label>
																				<input type="text" name="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_url_text" value="<?php echo $this->_tpl_vars['images_google']['0']['google_url']; ?>
">
																				<input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
																				<input type='hidden' name="google_image_id" id="google_image_id" value="<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
"/>
																				
																				<div class="mapButton clearfix">
																					 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
');">
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
).hide();" />
						
																				</div>
																		   </form>
																		 </div>
																	</div>											 
																<?php endif; ?>
																</div>
															</li>
														<?php endif; ?>
														<!--Google Adsense End-->
													<?php endfor; endif; ?>
												<?php else: ?>
													<div class="columnDragTxt">MODÜLLERİ BURAYA SÜRÜKLEYİP BIRAKIN</div>
												<?php endif; ?>
											</ul>
											<!-- column sortable -->	
										</div>
									 <?php endfor; endif;  endif;  if ($this->_tpl_vars['action'] == 'getOptionFrom'):  if ($this->_tpl_vars['formtype'] == 'select'): ?>
<input type="text"  id="addopt"  class="fieldName addopt" />
<input class="btn btn-info margin_bottom_10" type="button" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> value="Seçeneği Ekle" onclick="addOption('addopt','default_value')" />    
<select  class="select_box default_value" name="default_value[]"   multiple="multiple"></select>
<span onclick="removeSelOptiuon();" class="btn btn-danger margin_bottom_10">Kaldır</span>     
<?php elseif ($this->_tpl_vars['formtype'] == 'radio'): ?>    
<input type="text"  id="addopt" class="fieldName span7 addopt"/>
<input type="button" class="btn btn-info margin_bottom_10 pull-right" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> value="Seçeneği Ekle" onclick="addRadioButton('addopt','radiolist')" />
<br />
<div id="radiolist" class="formcustom">
</div>    
<a onclick="removeOptiuon();" class="btn btn-danger">Kaldır</a>  
<input type="hidden" class="fieldName default_value" name="default_value"  value=""/>
<?php elseif ($this->_tpl_vars['formtype'] == 'checkbox'): ?>    
<input type="text"  id="addopt" class="fieldName span7 addopt" />
<input type="button" class="btn btn-info margin_bottom_10 pull-right" <?php if ($this->_tpl_vars['contactfields'][$this->_sections['fields']['index']]['required'] == 'Y'): ?>required=""<?php endif; ?> value="Seçeneği Ekle" onclick="addCheckBox('addopt','checklist')" />
<br />            
<div id="checklist" class="formcustom"> 
</div>
<a onclick="removeOptiuon();" class="btn btn-danger">Kaldır</a>  
<input type="hidden" class="fieldName default_value" name="default_value"  value=""/>    
<?php elseif ($this->_tpl_vars['formtype'] == 'text' || $this->_tpl_vars['formtype'] == 'textarea'): ?>
<div class="span12 offset0">
<label>Varsayılan Değeri Girin</label>
<input type="text" class="fieldName default_value" name="default_value"  value=""/>
</div>         
<?php endif;  echo '
<script>
//Add new select option
function addOption(txtid,selid)
{
    var textval = $("."+txtid).val();    
    if(textval!=""){
        $(\'.\'+selid).append("<option class=\'select_box\'>"+$(\'.\'+txtid).val()+"</option>");
        $("."+txtid).val("");      
     }   
    
}
//Add new radio button
function addRadioButton(txtid,divid)
{
    var txtval  = $("."+txtid).val();  
    var optlist="";  
    if(txtval=="")
    {
        alert(\'Please enter option value to add option\');
    }
    else
    {
        $("#"+divid).append("<label class=\'radio-inline\'><input class=\'checkradios\' value=\'"+txtval+"\' type=\'radio\' /> "+txtval+"</label>");
        $("."+txtid).val("");
        valueSeperate();
    }
    
        
}

//Add new check box
function addCheckBox(txtid,divid)
{
    var txtval  = $("."+txtid).val();
    var optlist="";
    if(txtval=="")
    {
        alert(\'Please enter option value to add option\');
    }
    else
    {
        $("#"+divid).append("<label class=\'radio-inline\'><input class=\'checkradios\' value=\'"+txtval+"\' type=\'checkbox\' /> "+txtval+"</label>");
        $("."+txtid).val("");
        valueSeperate();
    }
}

//Remove selected radio or check boxes
function removeOptiuon()
{
    
    var length=$(".checkradios:checked").length;
    if(length==0)
    {
        alert("Please select any option to remove");
    }
    else
    {
        $(".checkradios:checked").parent().remove();
        valueSeperate();
    }
}
//Remove selected option in select box
function removeSelOptiuon()
{
    
    var length=$(".select_box option:selected").length;
    if(length==0)
    {
        alert("Please select any option to remove");
    }
    else
    {
        $(".select_box option:selected").remove();
        valueSeperate();
    }
}

//Seperate created option values in hidden feilds
function valueSeperate()
{
    var optlist="";
    $(".checkradios").each(function(){
        //alert($(this).val());
        optlist+=","+$(this).val();
                
    });
    $(".default_value").val(optlist.substr(1));
}
</script>
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['action'] == 'viewRefreshCaptchacode'): ?>	
	<span id="captchacode_<?php echo $this->_tpl_vars['pageid']; ?>
"><?php echo $this->_tpl_vars['rndnumber']; ?>
</span>
    <!--Disable Captcha Text Selection script-->
   <!--  <?php echo '
        <script type="text/javascript">
        var somediv=document.getElementById("captchacode");
        disableSelection(somediv);
        </script>
    '; ?>
 -->
<?php endif; ?>