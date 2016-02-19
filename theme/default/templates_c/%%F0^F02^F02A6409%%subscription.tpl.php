<?php /* Smarty version 2.6.3, created on 2015-12-09 12:10:13
         compiled from subscription.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'subscription.tpl', 23, false),)), $this); ?>
<div class="marTop20">
	<div class="container">
		<div class="sucriptionPage">
			<h2><?php echo $this->_tpl_vars['LANG']['subscription_have_free_plan']; ?>
</h2>
			<div class="row-fluid">
				<div class="span6">
				<div class="sucriptionPageLeft">
					<?php if ($_GET['msg'] == 'sucess'): ?>
						<div class="successmsg" id="msgcnt"><?php echo $this->_tpl_vars['LANG']['subscription_payment_done']; ?>
</div>
					<?php elseif ($_GET['msg'] == 'failure'): ?>
						<div class="errormsg" id="msgcnt"><?php echo $this->_tpl_vars['LANG']['subscription_payment_failure']; ?>
</div>
					<?php endif; ?>
					
					<div class="paymentOptHead"><?php echo $this->_tpl_vars['LANG']['plan_pricing']; ?>
</div>
					<form method="post" name="palnsform" action="">
    					<?php unset($this->_sections['pricing']);
$this->_sections['pricing']['name'] = 'pricing';
$this->_sections['pricing']['loop'] = is_array($_loop=$this->_tpl_vars['priceval']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pricing']['show'] = true;
$this->_sections['pricing']['max'] = $this->_sections['pricing']['loop'];
$this->_sections['pricing']['step'] = 1;
$this->_sections['pricing']['start'] = $this->_sections['pricing']['step'] > 0 ? 0 : $this->_sections['pricing']['loop']-1;
if ($this->_sections['pricing']['show']) {
    $this->_sections['pricing']['total'] = $this->_sections['pricing']['loop'];
    if ($this->_sections['pricing']['total'] == 0)
        $this->_sections['pricing']['show'] = false;
} else
    $this->_sections['pricing']['total'] = 0;
if ($this->_sections['pricing']['show']):

            for ($this->_sections['pricing']['index'] = $this->_sections['pricing']['start'], $this->_sections['pricing']['iteration'] = 1;
                 $this->_sections['pricing']['iteration'] <= $this->_sections['pricing']['total'];
                 $this->_sections['pricing']['index'] += $this->_sections['pricing']['step'], $this->_sections['pricing']['iteration']++):
$this->_sections['pricing']['rownum'] = $this->_sections['pricing']['iteration'];
$this->_sections['pricing']['index_prev'] = $this->_sections['pricing']['index'] - $this->_sections['pricing']['step'];
$this->_sections['pricing']['index_next'] = $this->_sections['pricing']['index'] + $this->_sections['pricing']['step'];
$this->_sections['pricing']['first']      = ($this->_sections['pricing']['iteration'] == 1);
$this->_sections['pricing']['last']       = ($this->_sections['pricing']['iteration'] == $this->_sections['pricing']['total']);
?>
    						<?php if ($this->_tpl_vars['priceval'][$this->_sections['pricing']['index']]['price'] != 0): ?>
    							<div class="subcriptionPlan">
    								
    								<label class="subcriptionPlanHead clearfix">
    								
    								    									<span class="subcriptionPlanName"><?php echo ((is_array($_tmp=$this->_tpl_vars['priceval'][$this->_sections['pricing']['index']]['price_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</span>
    									<div class="subcriptionPlanPrice"><?php echo $this->_tpl_vars['priceval'][$this->_sections['pricing']['index']]['price']; ?>
 TL /<?php echo $this->_tpl_vars['LANG']['year']; ?>
</div>
    								</label>
    								<div class="subcriptionPlanContent clearfix">
    									<div class="subLab"><?php echo $this->_tpl_vars['LANG']['subscription_great_way']; ?>
 </div>
    									<!--<div class="subcripSlide">Does not include slideshow header images.</div>-->
    									 
    										<div class="price"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/tickImg.png" alt="tickImg" title="" /> <?php echo $this->_tpl_vars['LANG']['price']; ?>
: <?php echo $this->_tpl_vars['priceval'][$this->_sections['pricing']['index']]['price']; ?>
TL /yıl</div>
    										<div class="name"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/tickImg.png" alt="tickImg" title="" /> <?php echo $this->_tpl_vars['LANG']['price_name']; ?>
: <?php echo $this->_tpl_vars['priceval'][$this->_sections['pricing']['index']]['price_name']; ?>
 </div>
    								</div>
    							</div>
    						<?php endif; ?>
    					<?php endfor; endif; ?>
                    </form>    
				</div>
			</div>
			<div class="span6">
				<div class="sucriptionPageRight">			
					<div class="paymentHead"><?php echo $this->_tpl_vars['LANG']['buy_credit_select']; ?>
</div>
					<div class="paypalListInner marTop20">
						<span class="buyCreditInnerBgContLeft">
							<lable class="buyCreditClick">	
								
								<input type="radio" name="payment_button" class="radioButt" id="credit_button"  checked="checked" onclick="return showCreditUrl();"/>
								<span class="textedit"><?php echo $this->_tpl_vars['LANG']['buy_credit_selectcredit']; ?>
</span>
								<img class="marTop10" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/creditcard.jpg" alt="creditcard" title="" />
							</label>	
						</span>
						<span class="buyCreditInnerBgContLeft">
							<lable class="buyCreditClick">	
								
								<input type="radio" name="payment_button" class="radioButt" id="adaptive_button" onclick="return paypalUrl();" />
								<span class="textedit"><?php echo $this->_tpl_vars['LANG']['buy_credit_selectadaptive']; ?>
</span>
								<img class="marTop10" src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/paypal.png" alt="paypal" title="" />
							</label>	
						</span>
					</div>
					<div class="clr"></div>
					<div id="paypal_buy" class="paypalListInnerBor marTop20" style="display:none;">
						<div class="clr"></div>
						<div id="err_msg_paypal"></div>
						<div class="paypalListInnerForm paypalCreSec">                           
                            <!--form method="post" name="paypal_form1" id="paypal_form1" class="no-mar" action="<?php echo $this->_tpl_vars['objCommon']->getPaypalUrl(); ?>
">
								<input type="hidden" name="business" value="<?php echo $this->_tpl_vars['PAYPAL_MERCHANT_EMAIL']; ?>
"/>
								<input type="hidden" name="cmd" value="_xclick"/>
								<input type="hidden" name="rm" value="2"/>
								<input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
" id="tot_amt"/>
								<input type="hidden" name="return" id="payreturn" value="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/buy_credits/<?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
/paypal" />
								<input type="hidden" name="cancel_return" value="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/subscription.php"/>
								<input type="hidden" name="currency_code" value="USD"/>
								<div class="paypalAmount no-mar"><span class="paypalAmountInn"><?php echo $this->_tpl_vars['LANG']['total_amount']; ?>
 :</span> <span class="payAmount">$ <span id="price_paypal">0</span></span></div>
								<input type="button" class="buyCreditListButt no-mar" name="" value="Continue" onclick="redirectPaypal();">
								<div class="clr"></div>
								<div class="paypalNote clearfix">
									<span class="note"><b><?php echo $this->_tpl_vars['LANG']['subscription_note']; ?>
</b> <?php echo $this->_tpl_vars['LANG']['subscription_kindly_paypaluse']; ?>
</span>
									<div class="cardInfo">
										<div class="leftside"><?php echo $this->_tpl_vars['LANG']['subscription_user_card_no']; ?>
</div><div class="rightside">: info@enkolayweb.com</div>
										<div class="leftside"><?php echo $this->_tpl_vars['LANG']['subscription_password']; ?>
</div><div class="rightside">: #success123</div>
									</div>
								 </span> 
								</div>
							</form -->                            
                            <form method="post" name="paypal_form1" id="paypal_form1" class="no-mar" action="">	
                               <input type="hidden" id="paypalprocess" name="paypalprocess" value=""/> 							
								<div class="paypalAmount no-mar"><span class="paypalAmountInn"><?php echo $this->_tpl_vars['LANG']['total_amount']; ?>
 :</span> <span class="payAmount"><span id="price_paypal"><?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
 TL</span></span></div>
								<input type="button" class="buyCreditListButt no-mar" name="" value="İlerle" onclick="redirectPaypal(<?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
);"/>
								<div class="clr"></div>								
							</form>
						</div>
					</div>
					<div class="clr"></div>
					<div id="authorize_buy" class="paypalListInnerBor marTop20">
						<div class="paypalListInnerHead"><?php echo $this->_tpl_vars['LANG']['credit_card_detail']; ?>
</div>
						<div id="err_msg"></div>
						<form method="post" name="paypal_form" class="paypalListInnerForm" id="paypal_form" action="<?php echo $this->_tpl_vars['nestpay_merchant']['business_url']; ?>
">
							<input type="hidden" name="amount" id="amt_auth" value="<?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
"/>
							<div class="row-fluid">
								<div class="paypalLabLeft span6">
									<div class="paypalListName"><?php echo $this->_tpl_vars['LANG']['card_holder_name']; ?>
</div>
									<input type="text" id="card_name" name="card_name" value=""/>
									<div class="paypalListNameDet"><?php echo $this->_tpl_vars['LANG']['subscription_cardholder_name']; ?>
</div>
								</div>
								<div class="paypalLabLeft span6">
									<div class="paypalListName"><?php echo $this->_tpl_vars['LANG']['card_no']; ?>
</div>
									<input type="text" id="card_no" name="pan" value=""/>
									<div class="paypalListNameDet"><?php echo $this->_tpl_vars['LANG']['subscription_cardholder_no']; ?>
</div>
								</div>
							</div>
							<div class="row-fluid marTop10">
								<div class="paypalLabLeft span6">
									<div class="paypalListName"><?php echo $this->_tpl_vars['LANG']['cvv_no']; ?>
</div>
									<input type="password" class="widt13per" maxlength="4" id="cvv_no" name="cv2" value=""/>
									<div class="paypalListNameDet"><?php echo $this->_tpl_vars['LANG']['subscription_cardholder_three']; ?>
</div>
								</div>
								<div class="paypalLabLeft span6">
									<div class="paypalListName"><?php echo $this->_tpl_vars['LANG']['expiry_date']; ?>
</div>
									<select name="Ecom_Payment_Card_ExpDate_Month" class="hei34 paypalSelect marLftNon" id="expires_month">
                                        <option value="">Ay</option>
										<option value="1">Oca</option>
										<option value="2">Şub</option>
										<option value="3">Mar</option>
										<option value="4">Nis</option>
										<option value="5">May</option>
										<option value="6">Haz</option>
										<option value="7">Tem</option>
										<option value="8">Ağu</option>
										<option value="9">Eyl</option>
										<option value="10">Eki</option>
										<option value="11">Kas</option>
										<option value="12">Ara</option>
									</select>
									<select name="Ecom_Payment_Card_ExpDate_Year" class="hei34 paypalSelect" id="expires_year">
                                    <option value="">Yıl</option>
										<?php unset($this->_sections['yearlist']);
$this->_sections['yearlist']['name'] = 'yearlist';
$this->_sections['yearlist']['loop'] = is_array($_loop=$this->_tpl_vars['year_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['yearlist']['show'] = true;
$this->_sections['yearlist']['max'] = $this->_sections['yearlist']['loop'];
$this->_sections['yearlist']['step'] = 1;
$this->_sections['yearlist']['start'] = $this->_sections['yearlist']['step'] > 0 ? 0 : $this->_sections['yearlist']['loop']-1;
if ($this->_sections['yearlist']['show']) {
    $this->_sections['yearlist']['total'] = $this->_sections['yearlist']['loop'];
    if ($this->_sections['yearlist']['total'] == 0)
        $this->_sections['yearlist']['show'] = false;
} else
    $this->_sections['yearlist']['total'] = 0;
if ($this->_sections['yearlist']['show']):

            for ($this->_sections['yearlist']['index'] = $this->_sections['yearlist']['start'], $this->_sections['yearlist']['iteration'] = 1;
                 $this->_sections['yearlist']['iteration'] <= $this->_sections['yearlist']['total'];
                 $this->_sections['yearlist']['index'] += $this->_sections['yearlist']['step'], $this->_sections['yearlist']['iteration']++):
$this->_sections['yearlist']['rownum'] = $this->_sections['yearlist']['iteration'];
$this->_sections['yearlist']['index_prev'] = $this->_sections['yearlist']['index'] - $this->_sections['yearlist']['step'];
$this->_sections['yearlist']['index_next'] = $this->_sections['yearlist']['index'] + $this->_sections['yearlist']['step'];
$this->_sections['yearlist']['first']      = ($this->_sections['yearlist']['iteration'] == 1);
$this->_sections['yearlist']['last']       = ($this->_sections['yearlist']['iteration'] == $this->_sections['yearlist']['total']);
?>
											<option value="<?php echo $this->_tpl_vars['year_list'][$this->_sections['yearlist']['index']]; ?>
"><?php echo $this->_tpl_vars['year_list'][$this->_sections['yearlist']['index']]; ?>
</option>
										<?php endfor; endif; ?>
									</select>
								</div>
							</div>
							<div class="clr"></div>
							<input type="button" class="buyCreditListButt" name="authorize_paypal_credits" value="gönder" onclick="checkCreditCardvalidation();">
							<div class="paypalAmount"><span class="paypalAmountInn"><?php echo $this->_tpl_vars['LANG']['total_amount']; ?>
 :</span> <span class="payAmount"><span id="price_auth"><?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
 TL</span></span></div>
							<div class="clr"></div>
    						<input type="hidden" name="clientid" value="<?php echo $this->_tpl_vars['nestpay_merchant']['clientId']; ?>
"/>
                            <input type="hidden" name="tranType" value="<?php echo $this->_tpl_vars['nestpay_merchant']['transtype']; ?>
" />
                            <input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['nestpay_merchant']['amount']; ?>
"/>
                            <input type="hidden" name="oid" value="<?php echo $this->_tpl_vars['nestpay_merchant']['oid']; ?>
"/>
                            <input type="hidden" name="okUrl" value="<?php echo $this->_tpl_vars['nestpay_merchant']['okUrl']; ?>
"/>
                            <input type="hidden" name="failUrl" value="<?php echo $this->_tpl_vars['nestpay_merchant']['failUrl']; ?>
"/>
                            <input type="hidden" name="rnd" value="<?php echo $this->_tpl_vars['nestpay_merchant']['rnd']; ?>
" />
                            <input type="hidden" name="hash" value="<?php echo $this->_tpl_vars['nestpay_merchant']['hash1']; ?>
" />
                            <input type="hidden" name="storetype" value="3d" />
                            <input type="hidden" name="lang" value="en"/>
                            <input type="hidden" name="currency" value="949"/>
						</form>
					</div>
			   </div>
			</div>
		  </div>
		</div>
	</div>
</div>
<?php if ($_GET['msg'] == 'sucess'):  echo '
<script type="text/javascript">
$(document).ready(function(){
	  timeout = \'2000\'; 
	  window.onload = setInterval(refresh_box, timeout); 
	  function refresh_box() {
	  		$(\'#msgcnt\').hide();
            redirectPage(\'main.php\',\'main\');
		}
	});
</script>
'; ?>

<?php endif; ?>

<?php if (isset ( $_GET['inv'] ) && $_GET['inv'] == 'invoice'): ?>

<div id="invoicePopup" class="invoicepopupbx" >
	<a class="publishClose" href="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/<?php if ($this->_tpl_vars['USERFRIENDLY'] == 'Y'): ?>userhome<?php else: ?>userHome.php<?php endif; ?>"></a>
	<form name="invpopup" id="invpopup">
		<div class="publishTxt"><?php echo $this->_tpl_vars['LANG']['invoice_heading']; ?>
</div>
		<input type="hidden" name="domain_id_inv" id="domain_id_inv" value="<?php echo $_REQUEST['domain_id']; ?>
">
		<div class="invoicepopbody">
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Name']; ?>
 *</div>
				<div class="span7">
					<input type="text" name="inv_fname" id="inv_fname" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['fname'] ) && $this->_tpl_vars['invoiceDet']['0']['fname'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['fname'];  else:  echo $this->_tpl_vars['invoiceUsername'];  endif; ?>">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Surname']; ?>
 * </div>
				<div class="span7">
					<input type="text" name="inv_surname" id="inv_surname" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['surname'] ) && $this->_tpl_vars['invoiceDet']['0']['surname'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['surname'];  endif; ?>">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_inv_for']; ?>
 * </div>
				<div class="span7">
					<input type="radio" name="invoice_for" id="invoice_for_comp" onclick="showhideInvoicefor('invoice_comp')" checked="checked" value="company"><?php echo $this->_tpl_vars['LANG']['invoice_Company']; ?>

					<input type="radio" name="invoice_for" id="invoice_for_indiv" onclick="showhideInvoicefor('invoice_indiv')" value="individual" <?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['invoice_for'] ) && $this->_tpl_vars['invoiceDet']['0']['invoice_for'] == 'individual'): ?>checked="checked"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['invoice_Individual']; ?>

				</div>
			</div>
			<div id="invoice_comp"  <?php if (( isset ( $this->_tpl_vars['invoiceDet']['0']['invoice_for'] ) && $this->_tpl_vars['invoiceDet']['0']['invoice_for'] == 'company' ) || $this->_tpl_vars['invoiceDet']['0']['invoice_for'] != 'individual'): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
				<div class="row-fluid">
					<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Company']; ?>
 </div>
					<div class="span7">
						<input type="text" name="inv_compname" id="inv_compname" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['company_name'] ) && $this->_tpl_vars['invoiceDet']['0']['company_name'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['company_name'];  endif; ?>">
					</div>
				</div>
				<div id="ComDetails" >
					<div class="row-fluid">
						<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Tax_Office']; ?>
 * </div>
						<div class="span7">
						 	<input type="text" name="inv_taxoff" id="inv_taxoff" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['tax_office'] ) && $this->_tpl_vars['invoiceDet']['0']['tax_office'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['tax_office'];  endif; ?>">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Tax_Number']; ?>
 *</div>
						<div class="span7">
						 	<input type="text" name="inv_taxnum" id="inv_taxnum" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['tax_number'] ) && $this->_tpl_vars['invoiceDet']['0']['tax_number'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['tax_number'];  endif; ?>">
						</div>
					</div>
				</div>
			</div>
			
			<div id="invoice_indiv" <?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['invoice_for'] ) && $this->_tpl_vars['invoiceDet']['0']['invoice_for'] == 'individual'): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>
				<div class="row-fluid">
					<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_ID_Number']; ?>
 * </div>
					<div class="span7">
					 	<input type="text" name="inv_idnumber" id="inv_idnumber" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['id_number'] ) && $this->_tpl_vars['invoiceDet']['0']['id_number'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['id_number'];  endif; ?>">
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Address']; ?>
 </div>
				<div class="span7">
					 <input type="text" name="inv_address" id="inv_address" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['address'] ) && $this->_tpl_vars['invoiceDet']['0']['address'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['address'];  endif; ?>">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_District']; ?>
 * </div>
				<div class="span7">
					  <input type="text" name="inv_district" id="inv_district" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['district'] ) && $this->_tpl_vars['invoiceDet']['0']['district'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['district'];  endif; ?>">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_City']; ?>
 * </div>
				<div class="span7">
					  <input type="text" name="inv_city" id="inv_city" value="<?php if (isset ( $this->_tpl_vars['invoiceDet']['0']['city'] ) && $this->_tpl_vars['invoiceDet']['0']['city'] != ''):  echo $this->_tpl_vars['invoiceDet']['0']['city'];  endif; ?>">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht"><?php echo $this->_tpl_vars['LANG']['invoice_Country']; ?>
 * </div>
				<div class="span7">
					<select id="inv_country" name="inv_country">
						<option value="Turkey" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Turkey'): ?>selected<?php endif; ?>>Turkey</option>
						<option value="Afghanistan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Afghanistan'): ?>selected<?php endif; ?>>Afghanistan</option>
						<option value="Albania" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Albania'): ?>selected<?php endif; ?>>Albania</option>
						<option value="Algeria" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Algeria'): ?>selected<?php endif; ?>>Algeria</option>
						<option value="American Samoa" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'American Samoa'): ?>selected<?php endif; ?>>American Samoa</option>
						<option value="Andorra" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Andorra'): ?>selected<?php endif; ?>>Andorra</option>
						<option value="Angola" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Angola'): ?>selected<?php endif; ?>>Angola</option>
						<option value="Antigua and Barbuda" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Antigua and Barbuda'): ?>selected<?php endif; ?>>Antigua and Barbuda</option>
						<option value="Argentina" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Argentina'): ?>selected<?php endif; ?>>Argentina</option>
						<option value="Armenia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Armenia'): ?>selected<?php endif; ?>>Armenia</option>
						<option value="Australia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Australia'): ?>selected<?php endif; ?>>Australia</option>
						<option value="Austria" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Austria'): ?>selected<?php endif; ?>>Austria</option>
						<option value="Azerbaijan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Azerbaijan'): ?>selected<?php endif; ?>>Azerbaijan</option>
						<option value="Bahamas" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bahamas'): ?>selected<?php endif; ?>>Bahamas</option>
						<option value="Bahrain" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bahrain'): ?>selected<?php endif; ?>>Bahrain</option>
						<option value="Bangladesh" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bangladesh'): ?>selected<?php endif; ?>>Bangladesh</option>
						<option value="Barbados" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Barbados'): ?>selected<?php endif; ?>>Barbados</option>
						<option value="Belarus" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Belarus'): ?>selected<?php endif; ?>>Belarus</option>
						<option value="Belgium" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Belgium'): ?>selected<?php endif; ?>>Belgium</option>
						<option value="Belize" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Belize'): ?>selected<?php endif; ?>>Belize</option>
						<option value="Benin" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Benin'): ?>selected<?php endif; ?>>Benin</option>
						<option value="Bermuda" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bermuda'): ?>selected<?php endif; ?>>Bermuda</option>
						<option value="Bhutan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bhutan'): ?>selected<?php endif; ?>>Bhutan</option>
						<option value="Bolivia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bolivia'): ?>selected<?php endif; ?>>Bolivia</option>
						<option value="Bosnia and Herzegovina" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bosnia and Herzegovina'): ?>selected<?php endif; ?>>Bosnia and Herzegovina</option>
						<option value="Botswana" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Botswana'): ?>selected<?php endif; ?>>Botswana</option>
						<option value="Brazil" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Brazil'): ?>selected<?php endif; ?>>Brazil</option>
						<option value="Brunei" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Brunei'): ?>selected<?php endif; ?>>Brunei</option>
						<option value="Bulgaria" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Bulgaria'): ?>selected<?php endif; ?>>Bulgaria</option>
						<option value="Burkina Faso" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Burkina Faso'): ?>selected<?php endif; ?>>Burkina Faso</option>
						<option value="Burundi" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Burundi'): ?>selected<?php endif; ?>>Burundi</option>
						<option value="Cambodia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cambodia'): ?>selected<?php endif; ?>>Cambodia</option>
						<option value="Cameroon" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cameroon'): ?>selected<?php endif; ?>>Cameroon</option>
						<option value="Canada" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Canada'): ?>selected<?php endif; ?>>Canada</option>
						<option value="Cape Verde" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cape Verde'): ?>selected<?php endif; ?>>Cape Verde</option>
						<option value="Cayman Islands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cayman Islands'): ?>selected<?php endif; ?>>Cayman Islands</option>
						<option value="Central African Republic" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Central African Republic'): ?>selected<?php endif; ?>>Central African Republic</option>
						<option value="Chad" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Chad'): ?>selected<?php endif; ?>>Chad</option>
						<option value="Chile" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Chile'): ?>selected<?php endif; ?>>Chile</option>
						<option value="China" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'China'): ?>selected<?php endif; ?>>China</option>
						<option value="Colombia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Colombia'): ?>selected<?php endif; ?>>Colombia</option>
						<option value="Comoros" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Comoros'): ?>selected<?php endif; ?>>Comoros</option>
						<option value="Congo, Democratic Republic of the" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Congo, Democratic Republic of the'): ?>selected<?php endif; ?>>Congo, Democratic Republic of the</option>
						<option value="Congo, Republic of the" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Congo, Republic of the'): ?>selected<?php endif; ?>>Congo, Republic of the</option>
						<option value="Costa Rica" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Costa Rica'): ?>selected<?php endif; ?>>Costa Rica</option>
						<option value="Côte d'Ivoire" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Côte dIvoire'): ?>selected<?php endif; ?>>Côte d'Ivoire</option>
						<option value="Croatia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Croatia'): ?>selected<?php endif; ?>>Croatia</option>
						<option value="Cuba" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cuba'): ?>selected<?php endif; ?>>Cuba</option>
						<option value="Cyprus" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Cyprus'): ?>selected<?php endif; ?>>Cyprus</option>
						<option value="Czech Republic" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Czech Republic'): ?>selected<?php endif; ?>>Czech Republic</option>
						<option value="Denmark" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Denmark'): ?>selected<?php endif; ?>>Denmark</option>
						<option value="Djibouti" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Djibouti'): ?>selected<?php endif; ?>>Djibouti</option>
						<option value="Dominica" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Dominica'): ?>selected<?php endif; ?>>Dominica</option>
						<option value="Dominican Republic" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Dominican Republic'): ?>selected<?php endif; ?>>Dominican Republic</option>
						<option value="East Timor" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'East Timor'): ?>selected<?php endif; ?>>East Timor</option>
						<option value="Ecuador" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Ecuador'): ?>selected<?php endif; ?>>Ecuador</option>
						<option value="Egypt" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Egypt'): ?>selected<?php endif; ?>>Egypt</option>
						<option value="El Salvador" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'El Salvador'): ?>selected<?php endif; ?>>El Salvador</option>
						<option value="Equatorial Guinea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Equatorial Guinea'): ?>selected<?php endif; ?>>Equatorial Guinea</option>
						<option value="Eritrea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Eritrea'): ?>selected<?php endif; ?>>Eritrea</option>
						<option value="Estonia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Estonia'): ?>selected<?php endif; ?>>Estonia</option>
						<option value="Ethiopia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Ethiopia'): ?>selected<?php endif; ?>>Ethiopia</option>
						<option value="Faroe Islands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Faroe Islands'): ?>selected<?php endif; ?>>Faroe Islands</option>
						<option value="Fiji" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Fiji'): ?>selected<?php endif; ?>>Fiji</option>
						<option value="Finland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Finland'): ?>selected<?php endif; ?>>Finland</option>
						<option value="France" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'France'): ?>selected<?php endif; ?>>France</option>
						<option value="French Polynesia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'French Polynesia'): ?>selected<?php endif; ?>>French Polynesia</option>
						<option value="Gabon" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Gabon'): ?>selected<?php endif; ?>>Gabon</option>
						<option value="Gambia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Gambia'): ?>selected<?php endif; ?>>Gambia</option>
						<option value="Georgia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Georgia'): ?>selected<?php endif; ?>>Georgia</option>
						<option value="Germany" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Germany'): ?>selected<?php endif; ?>>Germany</option>
						<option value="Ghana" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Ghana'): ?>selected<?php endif; ?>>Ghana</option>
						<option value="Greece" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Greece'): ?>selected<?php endif; ?>>Greece</option>
						<option value="Greenland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Greenland'): ?>selected<?php endif; ?>>Greenland</option>
						<option value="Grenada" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Grenada'): ?>selected<?php endif; ?>>Grenada</option>
						<option value="Guam" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Guam'): ?>selected<?php endif; ?>>Guam</option>
						<option value="Guatemala" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Guatemala'): ?>selected<?php endif; ?>>Guatemala</option>
						<option value="Guinea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Guinea'): ?>selected<?php endif; ?>>Guinea</option>
						<option value="Guinea-Bissau" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Guinea-Bissau'): ?>selected<?php endif; ?>>Guinea-Bissau</option>
						<option value="Guyana" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Guyana'): ?>selected<?php endif; ?>>Guyana</option>
						<option value="Haiti" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Haiti'): ?>selected<?php endif; ?>>Haiti</option>
						<option value="Honduras" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Honduras'): ?>selected<?php endif; ?>>Honduras</option>
						<option value="Hong Kong" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Hong Kong'): ?>selected<?php endif; ?>>Hong Kong</option>
						<option value="Hungary" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Hungary'): ?>selected<?php endif; ?>>Hungary</option>
						<option value="Iceland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Iceland'): ?>selected<?php endif; ?>>Iceland</option>
						<option value="India" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'India'): ?>selected<?php endif; ?>>India</option>
						<option value="Indonesia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Indonesia'): ?>selected<?php endif; ?>>Indonesia</option>
						<option value="Iran" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Iran'): ?>selected<?php endif; ?>>Iran</option>
						<option value="Iraq" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Iraq'): ?>selected<?php endif; ?>>Iraq</option>
						<option value="Ireland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Ireland'): ?>selected<?php endif; ?>>Ireland</option>
						<option value="Israel" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Israel'): ?>selected<?php endif; ?>>Israel</option>
						<option value="Italy" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Italy'): ?>selected<?php endif; ?>>Italy</option>
						<option value="Jamaica" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Jamaica'): ?>selected<?php endif; ?>>Jamaica</option>
						<option value="Japan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Japan'): ?>selected<?php endif; ?>>Japan</option>
						<option value="Jordan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Jordan'): ?>selected<?php endif; ?>>Jordan</option>
						<option value="Kazakhstan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kazakhstan'): ?>selected<?php endif; ?>>Kazakhstan</option>
						<option value="Kenya" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kenya'): ?>selected<?php endif; ?>>Kenya</option>
						<option value="Kiribati" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kiribati'): ?>selected<?php endif; ?>>Kiribati</option>
						<option value="North Korea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'North Korea'): ?>selected<?php endif; ?>>North Korea</option>
						<option value="South Korea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'South Korea'): ?>selected<?php endif; ?>>South Korea</option>
						<option value="Kosovo" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kosovo'): ?>selected<?php endif; ?>>Kosovo</option>
						<option value="Kuwait" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kuwait'): ?>selected<?php endif; ?>>Kuwait</option>
						<option value="Kyrgyzstan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Kyrgyzstan'): ?>selected<?php endif; ?>>Kyrgyzstan</option>
						<option value="Laos" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Laos'): ?>selected<?php endif; ?>>Laos</option>
						<option value="Latvia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Latvia'): ?>selected<?php endif; ?>>Latvia</option>
						<option value="Lebanon" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Lebanon'): ?>selected<?php endif; ?>>Lebanon</option>
						<option value="Lesotho" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Lesotho'): ?>selected<?php endif; ?>>Lesotho</option>
						<option value="Liberia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Liberia'): ?>selected<?php endif; ?>>Liberia</option>
						<option value="Libya" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Libya'): ?>selected<?php endif; ?>>Libya</option>
						<option value="Liechtenstein" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Liechtenstein'): ?>selected<?php endif; ?>>Liechtenstein</option>
						<option value="Lithuania" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Lithuania'): ?>selected<?php endif; ?>>Lithuania</option>
						<option value="Luxembourg" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Luxembourg'): ?>selected<?php endif; ?>>Luxembourg</option>
						<option value="Macedonia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Macedonia'): ?>selected<?php endif; ?>>Macedonia</option>
						<option value="Madagascar" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Madagascar'): ?>selected<?php endif; ?>>Madagascar</option>
						<option value="Malawi" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Malawi'): ?>selected<?php endif; ?>>Malawi</option>
						<option value="Malaysia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Malaysia'): ?>selected<?php endif; ?>>Malaysia</option>
						<option value="Maldives" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Maldives'): ?>selected<?php endif; ?>>Maldives</option>
						<option value="Mali" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mali'): ?>selected<?php endif; ?>>Mali</option>
						<option value="Malta" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Malta'): ?>selected<?php endif; ?>>Malta</option>
						<option value="Marshall Islands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Marshall Islands'): ?>selected<?php endif; ?>>Marshall Islands</option>
						<option value="Mauritania" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mauritania'): ?>selected<?php endif; ?>>Mauritania</option>
						<option value="Mauritius" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mauritius'): ?>selected<?php endif; ?>>Mauritius</option>
						<option value="Mexico" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mexico'): ?>selected<?php endif; ?>>Mexico</option>
						<option value="Micronesia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Micronesia'): ?>selected<?php endif; ?>>Micronesia</option>
						<option value="Moldova" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Moldova'): ?>selected<?php endif; ?>>Moldova</option>
						<option value="Monaco" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Monaco'): ?>selected<?php endif; ?>>Monaco</option>
						<option value="Mongolia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mongolia'): ?>selected<?php endif; ?>>Mongolia</option>
						<option value="Montenegro" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Montenegro'): ?>selected<?php endif; ?>>Montenegro</option>
						<option value="Morocco" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Morocco'): ?>selected<?php endif; ?>>Morocco</option>
						<option value="Mozambique" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Mozambique'): ?>selected<?php endif; ?>>Mozambique</option>
						<option value="Myanmar" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Myanmar'): ?>selected<?php endif; ?>>Myanmar</option>
						<option value="Namibia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Namibia'): ?>selected<?php endif; ?>>Namibia</option>
						<option value="Nauru" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Nauru'): ?>selected<?php endif; ?>>Nauru</option>
						<option value="Nepal" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Nepal'): ?>selected<?php endif; ?>>Nepal</option>
						<option value="Netherlands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Netherlands'): ?>selected<?php endif; ?>>Netherlands</option>
						<option value="New Zealand" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'New Zealand'): ?>selected<?php endif; ?>>New Zealand</option>
						<option value="Nicaragua" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Nicaragua'): ?>selected<?php endif; ?>>Nicaragua</option>
						<option value="Niger" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Niger'): ?>selected<?php endif; ?>>Niger</option>
						<option value="Nigeria" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Nigeria'): ?>selected<?php endif; ?>>Nigeria</option>
						<option value="Northern Mariana Islands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Northern Mariana Islands'): ?>selected<?php endif; ?>>Northern Mariana Islands</option>
						<option value="Norway" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Norway'): ?>selected<?php endif; ?>>Norway</option>
						<option value="Oman" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Oman'): ?>selected<?php endif; ?>>Oman</option>
						<option value="Pakistan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Pakistan'): ?>selected<?php endif; ?>>Pakistan</option>
						<option value="Palau" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Palau'): ?>selected<?php endif; ?>>Palau</option>
						<option value="Palestine, State of" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Palestine, State of'): ?>selected<?php endif; ?>>Palestine, State of</option>
						<option value="Panama" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Panama'): ?>selected<?php endif; ?>>Panama</option>
						<option value="Papua New Guinea" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Papua New Guinea'): ?>selected<?php endif; ?>>Papua New Guinea</option>
						<option value="Paraguay" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Paraguay'): ?>selected<?php endif; ?>>Paraguay</option>
						<option value="Peru" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Peru'): ?>selected<?php endif; ?>>Peru</option>
						<option value="Philippines" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Philippines'): ?>selected<?php endif; ?>>Philippines</option>
						<option value="Poland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Poland'): ?>selected<?php endif; ?>>Poland</option>
						<option value="Portugal" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Portugal'): ?>selected<?php endif; ?>>Portugal</option>
						<option value="Puerto Rico" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Puerto Rico'): ?>selected<?php endif; ?>>Puerto Rico</option>
						<option value="Qatar" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Qatar'): ?>selected<?php endif; ?>>Qatar</option>
						<option value="Romania" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Romania'): ?>selected<?php endif; ?>>Romania</option>
						<option value="Russia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Russia'): ?>selected<?php endif; ?>>Russia</option>
						<option value="Rwanda" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Rwanda'): ?>selected<?php endif; ?>>Rwanda</option>
						<option value="Saint Kitts and Nevis" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Saint Kitts and Nevis'): ?>selected<?php endif; ?>>Saint Kitts and Nevis</option>
						<option value="Saint Lucia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Saint Lucia'): ?>selected<?php endif; ?>>Saint Lucia</option>
						<option value="Saint Vincent and the Grenadines" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Saint Vincent and the Grenadines'): ?>selected<?php endif; ?>>Saint Vincent and the Grenadines</option>
						<option value="Samoa" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Samoa'): ?>selected<?php endif; ?>>Samoa</option>
						<option value="San Marino" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'San Marino'): ?>selected<?php endif; ?>>San Marino</option>
						<option value="Sao Tome and Principe" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sao Tome and Principe'): ?>selected<?php endif; ?>>Sao Tome and Principe</option>
						<option value="Saudi Arabia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Saudi Arabia'): ?>selected<?php endif; ?>>Saudi Arabia</option>
						<option value="Senegal" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Senegal'): ?>selected<?php endif; ?>>Senegal</option>
						<option value="Serbia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Serbia'): ?>selected<?php endif; ?>>Serbia</option>
						<option value="Seychelles" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Seychelles'): ?>selected<?php endif; ?>>Seychelles</option>
						<option value="Sierra Leone" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sierra Leone'): ?>selected<?php endif; ?>>Sierra Leone</option>
						<option value="Singapore" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Singapore'): ?>selected<?php endif; ?>>Singapore</option>
						<option value="Sint Maarten" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sint Maarten'): ?>selected<?php endif; ?>>Sint Maarten</option>
						<option value="Slovakia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Slovakia'): ?>selected<?php endif; ?>>Slovakia</option>
						<option value="Slovenia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Slovenia'): ?>selected<?php endif; ?>>Slovenia</option>
						<option value="Solomon Islands" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Solomon Islands'): ?>selected<?php endif; ?>>Solomon Islands</option>
						<option value="Somalia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Somalia'): ?>selected<?php endif; ?>>Somalia</option>
						<option value="South Africa" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'South Africa'): ?>selected<?php endif; ?>>South Africa</option>
						<option value="Spain" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Spain'): ?>selected<?php endif; ?>>Spain</option>
						<option value="Sri Lanka" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sri Lanka'): ?>selected<?php endif; ?>>Sri Lanka</option>
						<option value="Sudan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sudan'): ?>selected<?php endif; ?>>Sudan</option>
						<option value="Sudan, South" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sudan, South'): ?>selected<?php endif; ?>>Sudan, South</option>
						<option value="Suriname" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Suriname'): ?>selected<?php endif; ?>>Suriname</option>
						<option value="Swaziland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Swaziland'): ?>selected<?php endif; ?>>Swaziland</option>
						<option value="Sweden" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Sweden'): ?>selected<?php endif; ?>>Sweden</option>
						<option value="Switzerland" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Switzerland'): ?>selected<?php endif; ?>>Switzerland</option>
						<option value="Syria" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Syria'): ?>selected<?php endif; ?>>Syria</option>
						<option value="Taiwan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Taiwan'): ?>selected<?php endif; ?>>Taiwan</option>
						<option value="Tajikistan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Tajikistan'): ?>selected<?php endif; ?>>Tajikistan</option>
						<option value="Tanzania" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Tanzania'): ?>selected<?php endif; ?>>Tanzania</option>
						<option value="Thailand" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Thailand'): ?>selected<?php endif; ?>>Thailand</option>
						<option value="Togo" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Togo'): ?>selected<?php endif; ?>>Togo</option>
						<option value="Tonga" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Tonga'): ?>selected<?php endif; ?>>Tonga</option>
						<option value="Trinidad and Tobago" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Trinidad and Tobago'): ?>selected<?php endif; ?>>Trinidad and Tobago</option>
						<option value="Tunisia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Tunisia'): ?>selected<?php endif; ?>>Tunisia</option>
						<option value="Turkmenistan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Turkmenistan'): ?>selected<?php endif; ?>>Turkmenistan</option>
						<option value="Tuvalu" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Tuvalu'): ?>selected<?php endif; ?>>Tuvalu</option>
						<option value="Uganda" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Uganda'): ?>selected<?php endif; ?>>Uganda</option>
						<option value="Ukraine" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Ukraine'): ?>selected<?php endif; ?>>Ukraine</option>
						<option value="United Arab Emirates" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'United Arab Emirates'): ?>selected<?php endif; ?>>United Arab Emirates</option>
						<option value="United Kingdom" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'United Kingdom'): ?>selected<?php endif; ?>>United Kingdom</option>
						<option value="United States" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'United States'): ?>selected<?php endif; ?>>United States</option>
						<option value="Uruguay" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Uruguay'): ?>selected<?php endif; ?>>Uruguay</option>
						<option value="Uzbekistan" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Uzbekistan'): ?>selected<?php endif; ?>>Uzbekistan</option>
						<option value="Vanuatu" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Vanuatu'): ?>selected<?php endif; ?>>Vanuatu</option>
						<option value="Vatican City" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Vatican City'): ?>selected<?php endif; ?>>Vatican City</option>
						<option value="Venezuela" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Venezuela'): ?>selected<?php endif; ?>>Venezuela</option>
						<option value="Vietnam" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Vietnam'): ?>selected<?php endif; ?>>Vietnam</option>
						<option value="Virgin Islands, British" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Virgin Islands, British'): ?>selected<?php endif; ?>>Virgin Islands, British</option>
						<option value="Virgin Islands, U.S." <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Virgin Islands, U.S.'): ?>selected<?php endif; ?>>Virgin Islands, U.S.</option>
						<option value="Yemen" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Yemen'): ?>selected<?php endif; ?>>Yemen</option>
						<option value="Zambia" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Zambia'): ?>selected<?php endif; ?>>Zambia</option>
						<option value="Zimbabwe" <?php if ($this->_tpl_vars['invoiceDet']['0']['country'] == 'Zimbabwe'): ?>selected<?php endif; ?>>Zimbabwe</option>
					</select>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 offset5">
					<input type="button" class="btn btn-warning" name="submit" value="<?php echo $this->_tpl_vars['LANG']['invoice_Save_Continue']; ?>
" onclick="buyDomainInvoiceDetailsStore();">
				</div>
			</div>
		</div>
		</form>
		<div class="topArrow"></div>
	</div>
<?php endif; ?>