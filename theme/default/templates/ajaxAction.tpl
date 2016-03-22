{if $action eq "store_admin_vieworderhistory"}	
<!-- Order History Details in myaccount page -->
<div class="menuPopInner">
		<div class="orderPopDiv flt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead">{$LANG.ajaxAction_orderDetails}</h1></li>
			<li>
				<span class="name">{$LANG.ajaxAction_orderDetails}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.order_no}</span>
			</li>			
			<li>
				<span class="name">{$LANG.ajaxAction_orderStatus}</span>
				<span class="col">:</span>
				<span class="value">{if $order_history.0.order_status eq 'Ordered'}{$LANG.ajaxAction_orderStatus_ordered}{elseif $order_history.0.order_status eq 'Shipped'}{$LANG.ajaxAction_orderStatus_Shipped}{elseif $order_history.0.order_status eq 'Refund'}{$LANG.ajaxAction_orderStatus_refund}{elseif $order_history.0.order_status eq 'cancel'}{$LANG.ajaxAction_orderStatus_cancel}{/if}</span>
			</li>
			<li>
				<span class="name">{$LANG.ajaxAction_orderDate}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.addeddate|date_format:"%B, %d %I:%M:%S %p"|utf8_encode}}</span>
			</li>
			
		</ul>
		</div>
		<div class="orderPopDiv frt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead">{$LANG.ajaxAction_deliveryDetails}</h1></li>
			{if $order_history.0.name neq ''}
			<li>
				<span class="name">{$LANG.ajaxAction_name}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.name}</span>
			</li>
			{/if}
			{if $order_history.0.phone_no neq ''}
			<li>
				<span class="name">{$LANG.ajaxAction_phoneNumber}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.phone_no}</span>
			</li>
			{/if}
			{if $order_history.0.address neq ''}
			<li>
				<span class="name">{$LANG.ajaxAction_address}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.address}</span>
			</li>
			{/if}
			
			{if $order_history.0.zip neq ''}
			<li>
				<span class="name">{$LANG.ajaxAction_zipcode}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.zip}</span>
			</li>
			{/if}
		</ul>
		</div>
	<div class="clr"></div>
		<div class="orderPopDiv flt">
			<ul class="orderPopInUl">
			<li><h1 class="menuPopInHead">{$LANG.ajaxAction_paymentDetails}</h1></li>
			<li>
				<span class="name">{$LANG.ajaxAction_paymentMethod}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.payment_typ}</span>
			</li>
			<li>
				<span class="name">{$LANG.ajaxAction_transactionId}</span>
				<span class="col">:</span>
				<span class="value">{$order_history.0.txn_id}</span>
			</li>
		</ul>
		</div>

</div>

<div class="ordertable clr">
	<div id="doublescroll">
		<table cellspacing='0' cellpadding='0' width='100%' align='center' border='0'>
		<tr class="ordertable1row orderborder">
			<td width="25%">{$LANG.ajaxAction_product}</td>			
			<td align="center" width="10%">{$LANG.ajaxAction_quantity}</td>
			<td align="right" width="15%">{$LANG.ajaxAction_price}</td>
			<td align="right" width="15%">{$LANG.ajaxAction_totalPrice}</td>
		</tr>
		{section name="order" loop=$order_history}
			<tr class="ordertable2row orderborder">
				<td valign="top">
					{$order_history[order].product_name|stripslashes}<br/>		
					
				</td>				
				<td align="center" valign="top" class="padleft">{$order_history[order].quantity}</td>                
				<td align="right" valign="top">{$symbol} {$order_history[order].price}</td>
				<td align="right" valign="top">{$symbol} {$order_history[order].product_price}</td>
			</tr>
		{/section}
		<tr class="totalrow">
			<td colspan="4" class="textright">{$LANG.ajaxAction_subtotal}</td>
			<td align="right">{$symbol} {$order_history[0].sub_total}</td>
		</tr>
		<tr class="totalrow">
			<td colspan="4" class="textright">{$LANG.ajaxAction_tax}(%)</td>
			<td align="right">{$symbol} {$order_history[0].tax_val}</td>
		</tr>
        <tr class="totalrow">
			<td colspan="4" class="textright">{$LANG.ajaxAction_shiping}</td>
			<td align="right">{$symbol} {$order_history[0].ship_val}</td>
		</tr>
		<tr class="totalrow">
			<td colspan="4" class="textright">{$LANG.ajaxAction_total}</td>
			<td align="right" >{$symbol} {$order_history[0].grand_total}</td>
		</tr>
	</table>
	</div>
</div>
{/if}


{if $action eq 'updateColumncount'}

									 {section name="rowcount" start=1 loop=$pagefirstlist.0.column_count}
									<div class="addwidth column_inner_div {if $pagefirstlist.0.column_count eq '3'}span6{/if} {if $pagefirstlist.0.column_count eq '4'}span4{/if} {if $pagefirstlist.0.column_count eq '5'}span3{/if} {if $pagefirstlist.0.column_count eq '6'}five_column{/if}" id="col_{$smarty.section.rowcount.index}">
										<input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="{$pagefirstlist.0.pagelist}">
											<!---COlumn Sortable---->
											<ul id="sortable_{$smarty.section.rowcount.index}" class="clearfix no-mar sortcolumn">
													{$objCommon->getColumnPageList($smarty.section.rowcount.index,$pagefirstlist.0.pagelist)}
													{if $columnpagefirstlist}
													{section name="colpagelist" loop="$columnpagefirstlist"}
														{if $columnpagefirstlist[colpagelist].title_select}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">								
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','title_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildTitle_{$columnpagefirstlist[colpagelist].pagelist}" onblur="updateTitle('buildTitle_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateTitle('buildTitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead {if $columnpagefirstlist[colpagelist].text_title eq ''}clickheretext contenttext {/if}contentedit main_title" style="{if $columnpagefirstlist[colpagelist].buildTitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildTitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildTitle_fontcolor}color:{$columnpagefirstlist[colpagelist].buildTitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_title_font_style}font-family:{$columnpagefirstlist[colpagelist].main_title_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_title_line_size}line-height:{$columnpagefirstlist[colpagelist].main_title_line_size}px;{/if}" contenteditable="true"  data-ph="Başlığı Düzenle" >{if $columnpagefirstlist[colpagelist].text_title}{$columnpagefirstlist[colpagelist].text_title}{/if}</div>
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].description_select}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div  class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','description_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>								
																<div id="buildPara_{$columnpagefirstlist[colpagelist].pagelist}" class="{if $columnpagefirstlist[colpagelist].text_description eq ''}clickheretext contenttext {/if}contentedit main_paragraph" style="{if $columnpagefirstlist[colpagelist].buildPara_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildPara_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildPara_fontcolor}color:{$columnpagefirstlist[colpagelist].buildPara_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_font_style}font-family:{$columnpagefirstlist[colpagelist].main_paragraph_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_line_size}line-height:{$columnpagefirstlist[colpagelist].main_paragraph_line_size}px;{/if}" onblur="updateDesc('buildPara_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateDesc('buildPara_{$columnpagefirstlist[colpagelist].pagelist}');" contenteditable="true"  data-ph="Paragrafı Düzenle" >{if $columnpagefirstlist[colpagelist].text_description}{$columnpagefirstlist[colpagelist].text_description}{/if}</div>					
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].divider}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','divider');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildDivide" class="">
																	<hr />
																</div>
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].image_multiple_select}
															{$objCommon->getImageText($columnpagefirstlist[colpagelist].pagelist,'singletext')}
                                                            
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildImgTxt_{$columnpagefirstlist[colpagelist].pagelist}" class="buildImgTxtOuter">
																	<div class="row-fluid">
																		<div class="span3 buildImgTxt {if !$images}minimagewidth{/if}">
																			{if !$images}	
																				{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																				</div>*}
																				<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																				<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																					<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																						<div class="button">
																							<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																						</div>
																						<input type='hidden' name="status" value="singletext"/>
																						<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					</label>
																				</form>
																			{else}
																				<div class="uploadImgBg">
																					
																					<img class="imagechangeNew" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}">
																					
																					{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																					</div>*}
																					<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																					<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0;" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																						<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
																							<div class="button">
																								<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																							</div>
																							<input type='hidden' name="status" value="singletext"/>
																							<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																						</label>
																					</form>
																				</div>
																			{/if}
																		</div>
																		<div class="span9">
																			<div id="imgtitle_{$columnpagefirstlist[colpagelist].pagelist}" onblur="updateImgTitle('imgtitle_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateImgTitle('imgtitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead borNone {if $columnpagefirstlist[colpagelist].image_text eq ''}clickheretext contenttext {/if}contentedit main_imagetitle" style="{if $columnpagefirstlist[colpagelist].imgtitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].imgtitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].imgtitle_fontcolor}color:{$columnpagefirstlist[colpagelist].imgtitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_style}font-family:{$columnpagefirstlist[colpagelist].main_imagetitle_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_line_size}line-height:{$columnpagefirstlist[colpagelist].main_imagetitle_line_size}px;{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_size}font-size:{$columnpagefirstlist[colpagelist].main_imagetitle_font_size}px;{/if}" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" >{if $columnpagefirstlist[colpagelist].image_text}{$columnpagefirstlist[colpagelist].image_text}{/if}</div> 
																		</div>
																	</div>
																</div>
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].image_select}
														{$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist)}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_select');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="buildImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid">
																 {if !$images}
																	{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																	</div>*}
																	<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																	<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																	<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																			</div>
																			<input type='hidden' name="status" value="single"/>
																			<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																		</label>
																	</form>
																{else}
																	<div class="uploadImgBg" style="text-align:{$alignment}">
																		<a><img class="imagechange" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}"></a>
																		{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																		</div>*}
																		<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'><div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																		<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form uploadsecbg" style="margin:-37px 0 0; clear:both;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
																			<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
																				<div class="button">
																					<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																				</div>
																				<input type='hidden' name="status" value="single"/>
																				<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																			</label>
																		</form>
																	</div>
																{/if}
																</div>
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].contact_form}
															{$objCommon->getAllContactDetails($columnpagefirstlist[colpagelist].pagelist)}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','contact_form');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="" class="contactform">
																	<!--<div  onclick="showContactMail();">
																		Form Entries
																	</div>-->
																	
																	<a data-toggle="modal" href="#ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="formEntryButton pull-right">Form Entries</a>
																	<div class="themeheadsec contentedit {if $contactlist.0.title_head eq ''}clickheretext contenttext {/if}contactTxt contactHead" style="{if $contactlist.0.buildContact_fontsize}font-size:{$contactlist.0.buildContact_fontsize}px;{/if}{if $contactlist.0.buildContact_fontcolor}color:{$contactlist.0.buildContact_fontcolor}{/if}{if $contactlist.0.buildContact_font_style}font-family:{$contactlist.0.buildContact_font_style};{/if}{if $contactlist.0.buildContact_line_size}line-height:{$contactlist.0.buildContact_line_size}px;{/if}{if $contactlist.0.buildContact_font_size}font-size:{$contactlist.0.buildContact_font_size}px;{/if}" id="buildContact_{$contactlist.0.id}" onblur="updateContactFormTitle('buildContact_{$contactlist.0.id}');" onkeydown="updateContactFormTitle('buildContact_{$contactlist.0.id}');" data-ph="Edit Heading Here">{if $contactlist.0.title_head}{$contactlist.0.title_head}{/if}</div>
																	<div class="row-fluid marTop10"> 	
																		<div class="span12 relatepop">
																			<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{$contactlist.0.text1}</span>{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
																			<div class="clearfix"></div>
																			<input type="text" value="" placeholder="Ad" class="contacttxtbx" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if}
																		</div>
																	</div>
																	<div class="row-fluid marTop10"> 
																		<div class="span12 relatepop">
																			<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{$contactlist.0.text2}</span> {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
																			<div class="clearfix"></div>
																			<input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if}
																		</div>
																	</div>
																	<div class="row-fluid marTop10 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{$contactlist.0.text3}</span> {if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
																		<div class="clearfix"></div>
																		<input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if}
																	</div>
																	<div class="row-fluid marTop10 relatepop">
																		<div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');">{$contactlist.0.text4}</span>{if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
																		<div class="clearfix"></div>
																		<textarea class="contacttxtarea" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');"></textarea>{if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if}
																	</div>
																	<div class="row-fluid marTop10">
																		<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" class="buildPagePostButton"> </div>
																	</div>
																</div>
																
																{*<div id="showMailContact" style="display:none;">
																{$objCommon->getEmai($columnpagefirstlist.0.domain_id,$columnpagefirstlist.0.page_id)}
																	<form name="conatctmail" method="post">
																		<input type="text" name="contactmail" id="contactmail" value="{$mailid}" >
																		<input type="button" name="submit" value="Gönder" onclick="changeMail();">
																	</form>
																</div>*}
																<div id="modals">
																	<div id="ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="modal hide">
																		<div class="formEntryPopForm clearfix">
																			<div id="errtext"></div>
																			{$objCommon->getEmai($columnpagefirstlist[colpagelist].pagelist)}
																			<form name="conatctmail_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="no-mar">
																				<div id="errtext"></div>
																				<input type="text" name="contactmail" id="contactmail_{$columnpagefirstlist[colpagelist].pagelist}" value="{$mailid}" >
																				<input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('{$columnpagefirstlist[colpagelist].pagelist}');">
																			</form>
																			<button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
																		</div>
																	</div>
																</div>
																<div id="contactForm"></div>	
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].social_plugins}
														{$objCommon->getSocialDetails($columnpagefirstlist[colpagelist].pagelist)}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div class="moveicon"></div>
																<div id="buildSocial_{$columnpagefirstlist[colpagelist].pagelist}" class="buildSocialIcon">
																	<input type="button" class="fbicon" value="" />
																	<input type="button" class="twittericon" value="" />
																	<input type="button" class="linkedicon" value="" />
																	<input type="button" class="mailicon" value="" />
																</div>
																
																<div id="pluginShow_{$columnpagefirstlist[colpagelist].pagelist}" class="socialPop" style="display:none;">
																	<div class="leftside">
																		<i class="fa fa-users fontSize42"></i>
																		<label>{$LANG.social_link_name}</label>
																	</div>
																	<div class="rightside">
																		<form class="no-mar" id="socialplugin_{$columnpagefirstlist[colpagelist].pagelist}" name="socialplugin" method="post">
																			<input type="hidden" name="domain_id" id="domain_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].domain_id}">
																			<input type="hidden" name="page_id" id="page_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].page_id}">
																			<input type="hidden" name="page_list_id" id="page_list_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].pagelist}">
																			<div class="socialInn clearfix">
																				<span><i class="fa fa-facebook"></i></span>
																				<input type="text" name="fb" value="{$socialpagelist.0.fb}" id="fb_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://facebook.com/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa fa-tumblr"></i></span>
																				<input type="text" name="tw" value="{$socialpagelist.0.twitter}" id="tw_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://twitter.com/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa-linkedin"></i></span>
																				<input type="text" name="ln" value="{$socialpagelist.0.linkedin}" id="ln_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://linkedin.com/in/ornek">
																			</div>
																			<div class="socialInn clearfix">
																				<span><i class="fa fa fa-envelope-o"></i></span>
																				<input type="text" name="mail" value="{$socialpagelist.0.mail}" id="mail_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="ornek@ornek.com">
																			</div>
																			<div class="mapButton clearfix">
																				<input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('{$columnpagefirstlist[colpagelist].pagelist}');">
																				<input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_{$columnpagefirstlist[colpagelist].pagelist}').hide();">
																			</div>
																	   </form>
																	 </div>
																</div>
															</li>
														{/if}
														{if $columnpagefirstlist[colpagelist].youtube_video}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','youtube_video');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																{$objCommon->getYoutubeDetails_buildpage($columnpagefirstlist[colpagelist].pagelist)}
																<div class="youtubeDiv clearfix" id="youtubeDiv_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');" style="display:block;{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
																	<iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{if $youtubelist.0.youtube_url neq ''}{$youtubelist.0.youtube_url}{else}{$SITE_BASEURL}/images/youtubeLogo.png{/if}" width="100%" height="200"></iframe>	
																</div>
																<div class="youtubelabelsPopup" id="youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;">
																	<div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
																	
																	<form name="youtubefrm_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
																		<div id="error_{$columnpagefirstlist[colpagelist].pagelist}"></div>
																		<div class="contactlabelsPopupLeft">
																			<label>Youtube Video Adresi</label>
																			<input type="text" class="videoUrl" name="videourl_{$columnpagefirstlist[colpagelist].pagelist}" id="videourl_{$columnpagefirstlist[colpagelist].pagelist}" value="{$youtubelist.0.youtube_url}"/>
																		</div>
																		<div class="contactlabelsPopupRight">
																			<div class="contactlabelsPopupRightInner">
																				<label>{$LANG.spacing_name}</label>
																				<select class="spacingOption" name="spacing" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="{$LANG.for_none_name}" {if $youtubelist.0.youtube_spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
																					<option value="{$LANG.small_name}" {if $youtubelist.0.youtube_spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
																					<option value="{$LANG.medium_name}" {if $youtubelist.0.youtube_spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
																					<option value="{$LANG.large_name}" {if $youtubelist.0.youtube_spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
																				</select>
																				<label>Genişlik</label>
																				<select class="widthOption" name="width_{$columnpagefirstlist[colpagelist].pagelist}" id="width_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="Küçük" {if $youtubelist.0.youtube_width eq 'Small'}selected="selected"{/if}>Küçük</option>
																					<option value="Orta" {if $youtubelist.0.youtube_width eq 'Medium'}selected="selected"{/if}>Orta</option>
																					<option value="Büyük" {if $youtubelist.0.youtube_width eq 'Large'}selected="selected"{/if}>Büyük</option>
																				</select>
																			</div>
																			<div>
																				<input type="button" value="save" class="videosubmit"  onclick="addYoutubeUrl('{$columnpagefirstlist[colpagelist].pagelist}');" />
																			</div>
																		</div>
																	</form>
																</div>
															</li>
														{/if}
														<!--Gallery Process Start-->
														{if $columnpagefirstlist[colpagelist].gallery}
															 <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																<div class="form_element_control">
																	<div class="controlMidOuter">
																		<div class="controlMidBg"></div>
																	</div>
																	<div class="deleteOuter">
																		<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','gallery');"><i class="fa fa-trash-o"></i></div>
																	</div>
																</div>
																<div id="galImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid center columngallery">
																 {$objCommon->getGalleryImage($smarty.session.domain_id,$smarty.session.page_id,$columnpagefirstlist[colpagelist].pagelist)}
																 {if $images}
																	 {section name="galimg" loop="$images"}
																		<div class="imageGallery" style="{if $columnpagefirstlist[colpagelist].gallery_column eq '2'}width: 49%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '3'}width: 32%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '4'}width: 24%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '5'}width: 19%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '6'}width: 15.5%;{else}width:49%;{/if}{if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
																			<img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}">
																			<div class="galleryimageInn">
																				<a onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images[galimg].gallery_id}','{$images[galimg].gallery_name}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
																				<a class="galleryimage galleryimagecomm" id="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showGaleryPopup('galPopup_{$columnpagefirstlist[colpagelist].pagelist}');"><i class="fa fa-plus-square-o"></i></a>
																			</div>
																		</div>
																	 {/section}
																	 
																 {else}
																	{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																	</div>*}
																	<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																	<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div></div>
																	<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																			</div>
																			<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																		</label>
																	</form>
																  {/if}
																  </div>
																  <!--Gallery Image Popup-->
																	<div id="galPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;" class="galleryimagepop">
																		<form name="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
																			<div class="leftside">
																				<i class="fa fa-picture-o"></i>
																				<div class="clr"></div>
																				<a onclick="showGalleryPopup('{$columnpagefirstlist[colpagelist].pagelist}');" style="cursor:pointer;">{$LANG.add_image_name}</a>
																			</div>
																			<div class="rightside">
																				<label>{$LANG.add_image_name}</label>
																				<select class="columnOption" name="column_{$columnpagefirstlist[colpagelist].pagelist}" id="column_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="2" {if $columnpagefirstlist[colpagelist].gallery_column eq '2'}selected{/if}>2</option>
																					<option value="3" {if $columnpagefirstlist[colpagelist].gallery_column eq '3'}selected{/if}>3</option>
																					<option value="4" {if $columnpagefirstlist[colpagelist].gallery_column eq '4'}selected{/if}>4</option>
																					<option value="5" {if $columnpagefirstlist[colpagelist].gallery_column eq '5'}selected{/if}>5</option>
																					<option value="6" {if $columnpagefirstlist[colpagelist].gallery_column eq '6'}selected{/if}>6</option>
																				</select>
																				<label>{$LANG.spacing_name}</label>
																				<select class="imagespacingOption" name="spacing_{$columnpagefirstlist[colpagelist].pagelist}" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																					<option value="{$LANG.small_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}selected{/if}>{$LANG.small_name}</option>
																					<option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																					<option value="{$LANG.large_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}selected{/if}>{$LANG.large_name}</option>
																				</select>
																				<label>{$LANG.border_name}</label>
																				<select class="borderOption" name="border_{$columnpagefirstlist[colpagelist].pagelist}" id="border_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
																					<option value="{$LANG.thin_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}selected{/if}>{$LANG.thin_name}</option>
																					<option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
																					<option value="{$LANG.thick_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}selected{/if}>{$LANG.thick_name}</option>
																				</select>
																				<!--<label>Cropping</label>
																				<select class="widthOption" name="croping_{$columnpagefirstlist[colpagelist].pagelist}" id="croping_{$columnpagefirstlist[colpagelist].pagelist}">
																					<option value="None">None</option>
																					<option value="Square">Square</option>
																					<option value="Rectangle">Rectangle</option>
																				</select>-->
																				<div class="clearfix">
																					<input type="button" class="btn btn-success pull-left" value="save" onclick="addgalleryProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
																					<input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
																				</div>
																			</div>
																		</form>
																	</div>
																	
																		<div id="galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}" class="imagepopupdiv">
																			<div id="image-chooser-nav">
																				<div id="image-chooser-nav-label">
																					<div>{$LANG.select_image_from}</div>
																				</div>
																				<div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
																					<div class="colWhite">
																						<span></span> {$LANG.my_computer_name}
																					</div>
																				</div>
																				<div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}').hide();$('.loadmask').hide();">X</div>
																			</div>
																			<div id="browsebutton" class="popBrowseInner">
																				{*<div id='preview'></div>*}
																				<div id='imageloadstatus' style="display:none;">
																					<div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
																				</div>
																				<form id="galimagephotogal{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
																					<div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
																					<label for="file" class="input input-file no-mar" style="display:block"  name="imageloadbutton" id="imageloadbutton">
																						<div class="button">
																							<input type="file" class="hei180" value="" onchange="galimagupdate('{$columnpagefirstlist[colpagelist].pagelist}')" name="photos[]" id="galimgphoto">
																						</div>
																						<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																					</label>
																				</form>
																				
																			</div>
																		</div>
																	<div id="masktable" style="display:none;"></div>
																	<!--Gallery Image Popup Ends-->
															</li>
														{/if}
														<!--Gallery Process End-->
														{if $columnpagefirstlist[colpagelist].map}
															 <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showMapPopUp('mapframe_{$columnpagefirstlist[colpagelist].pagelist}');" class="activemove theme2bginn posRel">
																 <div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																<div class="moveicon"></div>
																 <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$columnpagefirstlist[colpagelist].map_zoom}&lat={$columnpagefirstlist[colpagelist].map_lat}&lon={$columnpagefirstlist[colpagelist].map_lon}&addr={$columnpagefirstlist[colpagelist].map_addr}&page_list_id={$columnpagefirstlist[colpagelist].pagelist}" width="100%" height="250"></iframe>
																	<div id="mapframe_{$columnpagefirstlist[colpagelist].pagelist}" class="mappop" style="display:none;">
																		<div class="leftside">
																			<img src="{$SITE_BASEURL}/images/map_marker.png" alt="map image"/>
																			<label>{$LANG.map_name}</label>
																		</div>
																		<div class="rightside">
																			<form name="mapframepopup_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar" method="post">
																				<label>{$LANG.address_name}</label>
																				<input class="mapinputTxt" type="text" name="addr_{$columnpagefirstlist[colpagelist].pagelist}" id="addr_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_addr}">
																				<label>{$LANG.zoom_name}</label>
																				{*<input class="mapinputTxt" type="text" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}">*}
																				<input class="mapinputTxt" type="number" min="1" max="17" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}" onkeypress="keypress();">
																				<label>Enlem</label>
																				<input class="mapinputTxt" type="text" name="lat_{$columnpagefirstlist[colpagelist].pagelist}" id="lat_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lat}">
																				<label>Boylam</label>
																				<input class="mapinputTxt" type="text" name="lon_{$columnpagefirstlist[colpagelist].pagelist}" id="lon_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lon}">
																				<div class="mapButton clearfix">
																					<input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right mapcancel" />
																				</div>
																		   </form>
																		 </div>
																	</div>
																 </li>
														{/if}
														<!--slider process start-->
														{if $columnpagefirstlist[colpagelist].slider}
																<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn">
																	<div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','slider');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																	<div id="sliImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid hoverSlide">
																	 {$objCommon->getSliderImageNew($columnpagefirstlist[colpagelist].pagelist)}
																		 <div id="slider_images" class="buildColumnPageSlider" style="{if $slider_images}display:block;{else}display:none;{/if}">
																			 <div class="nivoSlider nivoSliderImg">
																				 {section name="sliimg" loop="$slider_images"}
																					<div class="imageSlider">
																						<img width="100%" height="300" src="{$SITE_DOMAIN_IMAGES_URL}/{$slider_images[sliimg].slider_images}"/> 			 
																					</div>
																				 {/section}
																			 </div>
																			 <div class="clr"></div>
																		 </div>
																		 <div id="sliderform">													   
																		   {if $slider_images}
																				<a class="ColsliderNoImg2" onclick="return showsliderFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');">Düzenle</a>
																			{/if}
																			{if !$slider_images}
																				<a class="ColsliderNoImg1" onclick="return showsliderFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');"></a>
																			{/if}														
																		  </div>
																	</div>
																</li>  
															{/if}
														<!--slider process end-->								
														<!--Google Adsense Start-->
														{if $columnpagefirstlist[colpagelist].google_adsense}
															<li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
																	<div class="form_element_control">
																		<div class="controlMidOuter">
																			<div class="controlMidBg"></div>
																		</div>
																		<div class="deleteOuter">
																			<div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','google_adsense');"><i class="fa fa-trash-o"></i></div>
																		</div>
																	</div>
																	<input type='radio' name="google_ads" id="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" class="scriptImgInput" value="script" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}checked="checked" {/if} onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
																	<label class="scriptImg" for="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
																		<div class="scriptInner">
																			<div class="scriptImage">{$LANG.script_name}</div>
																		</div>
																	</label>
																	<input type='radio' name="google_ads" id="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" class="imgaeImgInput" value="image" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}checked="checked" {/if} onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
																	<label class="imgaeImg" for="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
																		<div class="imageInner">
																			<div class="imageHead">{$LANG.image_name}</div>
																			<div class="imageImage"></div>
																		</div>
																	</label>
																	
																	<div id="script_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop">
																		<div class="leftside">
																			<i class="fa fa-file-text-o fontSize42"></i>
																			<label>{$LANG.script_name}</label>
																		</div>
																		<div class="rightside">
																			<form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																				<label>{$LANG.adress_name}</label>
																				<input type="hidden" name="script" id="script" value="script">
																				 <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}"   placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
																				 <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																				
																				<div class="mapButton clearfix">
																					 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#script_'+{$columnpagefirstlist[colpagelist].pagelist}).hide();"/>
						
																				</div>
																		   </form>
																		 </div>
																	</div>
																	
																	<!--<div id="script_{$columnpagefirstlist[colpagelist].pagelist}" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}  style="display:block;"{else}style="display:none;" {/if}>
																		<form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																		<input type="hidden" name="script" id="script" value="script">
																		 <textarea name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_ansen" placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
																		 <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																		 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
																		</form>  
																	</div>-->
																	
																	{$objCommon->getImageGoogle($columnpagefirstlist[colpagelist].pagelist)}
																	<div id="images_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}  style="display:block;" {else}style="display:none;" {/if}>
																 {if !$images_google}
																	
																	{*<div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'>
																	</div>*}
																	<div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
																	<img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>
																	<form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
																		<label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
																			<div class="button">
																				<input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
																			</div>
																			<input type='hidden' name="image" id="image" value="image"/>
																			<input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																		</label>
																	</form>
																{else}
																  
																	<div class="googAddOption">
																		<img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{else}180{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> 
																		<!--<img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> -->
																		<div class="googAddDelete">
																			<a class="galleryimage" onclick="deletegoogleImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images_google.0.google_image_id }','{$images_google.0.google_image_name}');">
																				<i class="fa fa-trash-o"></i>
																			</a>
																		</div>
																		<a class="googAddUrl" onclick="showAddUrl('urladd_{$columnpagefirstlist[colpagelist].pagelist}');"> {$LANG.add_url_name}</a>
																	</div>
																	
																	<div id="urladd_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop" style="display:none;">
																		<div class="leftside">
																			<i class="fa fa-external-link fontSize42"></i>
																			<label>{$LANG.add_url_name}</label>
																		</div>
																		<div class="rightside">
																			<form name="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
																				<label>{$LANG.url_name}</label>
																				<input type="text" name="image_text_{$columnpagefirstlist[colpagelist].pagelist}" id="image_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_url_text" value="{$images_google.0.google_url}">
																				<input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
																				<input type='hidden' name="google_image_id" id="google_image_id" value="{$images_google.0.google_image_id}"/>
																				
																				<div class="mapButton clearfix">
																					 <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('{$columnpagefirstlist[colpagelist].pagelist}','{$images_google.0.google_image_id}');">
																					<input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+{$columnpagefirstlist[colpagelist].pagelist}).hide();" />
						
																				</div>
																		   </form>
																		 </div>
																	</div>											 
																{/if}
																</div>
															</li>
														{/if}
														<!--Google Adsense End-->
													{/section}
												{else}
													<div class="columnDragTxt">MODÜLLERİ BURAYA SÜRÜKLEYİP BIRAKIN</div>
												{/if}
											</ul>
											<!-- column sortable -->	
										</div>
									 {/section}
{/if}
{if $action eq 'getOptionFrom'}
{if $formtype eq 'select'}
<input type="text"  id="addopt"  class="fieldName addopt" />
<input class="btn btn-info margin_bottom_10" type="button" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addOption('addopt','default_value')" />    
<select  class="select_box default_value" name="default_value[]"   multiple="multiple"></select>
<span onclick="removeSelOptiuon();" class="btn btn-danger margin_bottom_10">Kaldır</span>     
{elseif $formtype eq 'radio'}    
<input type="text"  id="addopt" class="fieldName span7 addopt"/>
<input type="button" class="btn btn-info margin_bottom_10 pull-right" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addRadioButton('addopt','radiolist')" />
<br />
<div id="radiolist" class="formcustom">
</div>    
<a onclick="removeOptiuon();" class="btn btn-danger">Kaldır</a>  
<input type="hidden" class="fieldName default_value" name="default_value"  value=""/>
{elseif $formtype eq 'checkbox'}    
<input type="text"  id="addopt" class="fieldName span7 addopt" />
<input type="button" class="btn btn-info margin_bottom_10 pull-right" {if $contactfields[fields].required eq 'Y'}required=""{/if} value="Seçeneği Ekle" onclick="addCheckBox('addopt','checklist')" />
<br />            
<div id="checklist" class="formcustom"> 
</div>
<a onclick="removeOptiuon();" class="btn btn-danger">Kaldır</a>  
<input type="hidden" class="fieldName default_value" name="default_value"  value=""/>    
{elseif $formtype eq 'text' || $formtype eq 'textarea'}
<div class="span12 offset0">
<label>Varsayılan Değeri Girin</label>
<input type="text" class="fieldName default_value" name="default_value"  value=""/>
</div>         
{/if}
{literal}
<script>
//Add new select option
function addOption(txtid,selid)
{
    var textval = $("."+txtid).val();    
    if(textval!=""){
        $('.'+selid).append("<option class='select_box'>"+$('.'+txtid).val()+"</option>");
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
        alert('Please enter option value to add option');
    }
    else
    {
        $("#"+divid).append("<label class='radio-inline'><input class='checkradios' value='"+txtval+"' type='radio' /> "+txtval+"</label>");
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
        alert('Please enter option value to add option');
    }
    else
    {
        $("#"+divid).append("<label class='radio-inline'><input class='checkradios' value='"+txtval+"' type='checkbox' /> "+txtval+"</label>");
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
{/literal}
{/if}

{if $action eq "viewRefreshCaptchacode"}	
	<span id="captchacode_{$pageid}">{$rndnumber}</span>
    <!--Disable Captcha Text Selection script-->
   <!--  {literal}
        <script type="text/javascript">
        var somediv=document.getElementById("captchacode");
        disableSelection(somediv);
        </script>
    {/literal} -->
{/if}