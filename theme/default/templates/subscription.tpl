<div class="marTop20">
	<div class="container">
		<div class="sucriptionPage">
			<h2>{$LANG.subscription_have_free_plan}</h2>
			<div class="row-fluid">
				<div class="span6">
				<div class="sucriptionPageLeft">
					{if $smarty.get.msg eq 'sucess'}
						<div class="successmsg" id="msgcnt">{$LANG.subscription_payment_done}</div>
					{elseif $smarty.get.msg eq 'failure'}
						<div class="errormsg" id="msgcnt">{$LANG.subscription_payment_failure}</div>
					{/if}
					
					<div class="paymentOptHead">{$LANG.plan_pricing}</div>
					<form method="post" name="palnsform" action="">
    					{section name="pricing" loop=$priceval}
    						{if $priceval[pricing].price neq 0}
    							<div class="subcriptionPlan">
    								
    								<label class="subcriptionPlanHead clearfix">
    								
    								{*	<input type="radio" class="subcriptionPlanInput" name="payprice" id="payprice" {if $priceval[pricing].price eq $smarty.request.payprice} checked="checked"{/if} value="{$priceval[pricing].price}" onclick="assignPrice('{$priceval[pricing].price}');"/> *}
    									<span class="subcriptionPlanName">{$priceval[pricing].price_name|ucfirst}</span>
    									<div class="subcriptionPlanPrice">{$priceval[pricing].price} TL /{$LANG.year}</div>
    								</label>
    								<div class="subcriptionPlanContent clearfix">
    									<div class="subLab">{$LANG.subscription_great_way} </div>
    									<!--<div class="subcripSlide">Does not include slideshow header images.</div>-->
    									 
    										<div class="price"><img src="{$SITE_BASEURL}/images/tickImg.png" alt="tickImg" title="" /> {$LANG.price}: {$priceval[pricing].price}TL /yıl</div>
    										<div class="name"><img src="{$SITE_BASEURL}/images/tickImg.png" alt="tickImg" title="" /> {$LANG.price_name}: {$priceval[pricing].price_name} </div>
    								</div>
    							</div>
    						{/if}
    					{/section}
                    </form>    
				</div>
			</div>
			<div class="span6">
				<div class="sucriptionPageRight">			
					<div class="paymentHead">{$LANG.buy_credit_select}</div>
					<div class="paypalListInner marTop20">
						<span class="buyCreditInnerBgContLeft">
							<lable class="buyCreditClick">	
								
								<input type="radio" name="payment_button" class="radioButt" id="credit_button"  checked="checked" onclick="return showCreditUrl();"/>
								<span class="textedit">{$LANG.buy_credit_selectcredit}</span>
								<img class="marTop10" src="{$SITE_BASEURL}/images/creditcard.jpg" alt="creditcard" title="" />
							</label>	
						</span>
						<span class="buyCreditInnerBgContLeft">
							<lable class="buyCreditClick">	
								
								<input type="radio" name="payment_button" class="radioButt" id="adaptive_button" onclick="return paypalUrl();" />
								<span class="textedit">{$LANG.buy_credit_selectadaptive}</span>
								<img class="marTop10" src="{$SITE_BASEURL}/images/paypal.png" alt="paypal" title="" />
							</label>	
						</span>
					</div>
					<div class="clr"></div>
					<div id="paypal_buy" class="paypalListInnerBor marTop20" style="display:none;">
						<div class="clr"></div>
						<div id="err_msg_paypal"></div>
						<div class="paypalListInnerForm paypalCreSec">                           
                            <!--form method="post" name="paypal_form1" id="paypal_form1" class="no-mar" action="{$objCommon->getPaypalUrl()}">
								<input type="hidden" name="business" value="{$PAYPAL_MERCHANT_EMAIL}"/>
								<input type="hidden" name="cmd" value="_xclick"/>
								<input type="hidden" name="rm" value="2"/>
								<input type="hidden" name="amount" value="{$nestpay_merchant.amount}" id="tot_amt"/>
								<input type="hidden" name="return" id="payreturn" value="{$SITE_BASEURL}/buy_credits/{$nestpay_merchant.amount}/paypal" />
								<input type="hidden" name="cancel_return" value="{$SITE_BASEURL}/subscription.php"/>
								<input type="hidden" name="currency_code" value="USD"/>
								<div class="paypalAmount no-mar"><span class="paypalAmountInn">{$LANG.total_amount} :</span> <span class="payAmount">$ <span id="price_paypal">0</span></span></div>
								<input type="button" class="buyCreditListButt no-mar" name="" value="Continue" onclick="redirectPaypal();">
								<div class="clr"></div>
								<div class="paypalNote clearfix">
									<span class="note"><b>{$LANG.subscription_note}</b> {$LANG.subscription_kindly_paypaluse}</span>
									<div class="cardInfo">
										<div class="leftside">{$LANG.subscription_user_card_no}</div><div class="rightside">: info@enkolayweb.com</div>
										<div class="leftside">{$LANG.subscription_password}</div><div class="rightside">: #success123</div>
									</div>
								 </span> 
								</div>
							</form -->                            
                            <form method="post" name="paypal_form1" id="paypal_form1" class="no-mar" action="">	
                               <input type="hidden" id="paypalprocess" name="paypalprocess" value=""/> 							
								<div class="paypalAmount no-mar"><span class="paypalAmountInn">{$LANG.total_amount} :</span> <span class="payAmount"><span id="price_paypal">{$nestpay_merchant.amount} TL</span></span></div>
								<input type="button" class="buyCreditListButt no-mar" name="" value="İlerle" onclick="redirectPaypal({$nestpay_merchant.amount});"/>
								<div class="clr"></div>								
							</form>
						</div>
					</div>
					<div class="clr"></div>
					<div id="authorize_buy" class="paypalListInnerBor marTop20">
						<div class="paypalListInnerHead">{$LANG.credit_card_detail}</div>
						<div id="err_msg"></div>
						<form method="post" name="paypal_form" class="paypalListInnerForm" id="paypal_form" action="{$nestpay_merchant.business_url}">
							<input type="hidden" name="amount" id="amt_auth" value="{$nestpay_merchant.amount}"/>
							<div class="row-fluid">
								<div class="paypalLabLeft span6">
									<div class="paypalListName">{$LANG.card_holder_name}</div>
									<input type="text" id="card_name" name="card_name" value=""/>
									<div class="paypalListNameDet">{$LANG.subscription_cardholder_name}</div>
								</div>
								<div class="paypalLabLeft span6">
									<div class="paypalListName">{$LANG.card_no}</div>
									<input type="text" id="card_no" name="pan" value=""/>
									<div class="paypalListNameDet">{$LANG.subscription_cardholder_no}</div>
								</div>
							</div>
							<div class="row-fluid marTop10">
								<div class="paypalLabLeft span6">
									<div class="paypalListName">{$LANG.cvv_no}</div>
									<input type="password" class="widt13per" maxlength="4" id="cvv_no" name="cv2" value=""/>
									<div class="paypalListNameDet">{$LANG.subscription_cardholder_three}</div>
								</div>
								<div class="paypalLabLeft span6">
									<div class="paypalListName">{$LANG.expiry_date}</div>
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
										{section name='yearlist' loop=$year_list}
											<option value="{$year_list[yearlist]}">{$year_list[yearlist]}</option>
										{/section}
									</select>
								</div>
							</div>
							<div class="clr"></div>
							<input type="button" class="buyCreditListButt" name="authorize_paypal_credits" value="gönder" onclick="checkCreditCardvalidation();">
							<div class="paypalAmount"><span class="paypalAmountInn">{$LANG.total_amount} :</span> <span class="payAmount"><span id="price_auth">{$nestpay_merchant.amount} TL</span></span></div>
							<div class="clr"></div>
    						<input type="hidden" name="clientid" value="{$nestpay_merchant.clientId}"/>
                            <input type="hidden" name="tranType" value="{$nestpay_merchant.transtype}" />
                            <input type="hidden" name="amount" value="{$nestpay_merchant.amount}"/>
                            <input type="hidden" name="oid" value="{$nestpay_merchant.oid}"/>
                            <input type="hidden" name="okUrl" value="{$nestpay_merchant.okUrl}"/>
                            <input type="hidden" name="failUrl" value="{$nestpay_merchant.failUrl}"/>
                            <input type="hidden" name="rnd" value="{$nestpay_merchant.rnd}" />
                            <input type="hidden" name="hash" value="{$nestpay_merchant.hash1}" />
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
{if $smarty.get.msg eq 'sucess'}
{literal}
<script type="text/javascript">
$(document).ready(function(){
	  timeout = '2000'; 
	  window.onload = setInterval(refresh_box, timeout); 
	  function refresh_box() {
	  		$('#msgcnt').hide();
            redirectPage('main.php','main');
		}
	});
</script>
{/literal}
{/if}

{if isset($smarty.get.inv) and $smarty.get.inv eq 'invoice'}

<div id="invoicePopup" class="invoicepopupbx" >
	<a class="publishClose" href="{$SITE_BASEURL}/{if $USERFRIENDLY eq 'Y'}userhome{else}userHome.php{/if}"></a>
	<form name="invpopup" id="invpopup">
		<div class="publishTxt">{$LANG.invoice_heading}</div>
		<input type="hidden" name="domain_id_inv" id="domain_id_inv" value="{$smarty.request.domain_id}">
		<div class="invoicepopbody">
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_Name} *</div>
				<div class="span7">
					<input type="text" name="inv_fname" id="inv_fname" value="{if isset($invoiceDet.0.fname) and $invoiceDet.0.fname neq ''}{$invoiceDet.0.fname}{else}{$invoiceUsername}{/if}">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_Surname} * </div>
				<div class="span7">
					<input type="text" name="inv_surname" id="inv_surname" value="{if isset($invoiceDet.0.surname) and $invoiceDet.0.surname neq ''}{$invoiceDet.0.surname}{/if}">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_inv_for} * </div>
				<div class="span7">
					<input type="radio" name="invoice_for" id="invoice_for_comp" onclick="showhideInvoicefor('invoice_comp')" checked="checked" value="company">{$LANG.invoice_Company}
					<input type="radio" name="invoice_for" id="invoice_for_indiv" onclick="showhideInvoicefor('invoice_indiv')" value="individual" {if isset($invoiceDet.0.invoice_for) and $invoiceDet.0.invoice_for eq 'individual'}checked="checked"{/if}>{$LANG.invoice_Individual}
				</div>
			</div>
			<div id="invoice_comp"  {if (isset($invoiceDet.0.invoice_for) and $invoiceDet.0.invoice_for eq 'company') or $invoiceDet.0.invoice_for neq 'individual'}style="display:block;"{else}style="display:none;"{/if}>
				<div class="row-fluid">
					<div class="span5 txtAlignRht">{$LANG.invoice_Company} </div>
					<div class="span7">
						<input type="text" name="inv_compname" id="inv_compname" value="{if isset($invoiceDet.0.company_name) and $invoiceDet.0.company_name neq ''}{$invoiceDet.0.company_name}{/if}">
					</div>
				</div>
				<div id="ComDetails" >
					<div class="row-fluid">
						<div class="span5 txtAlignRht">{$LANG.invoice_Tax_Office} * </div>
						<div class="span7">
						 	<input type="text" name="inv_taxoff" id="inv_taxoff" value="{if isset($invoiceDet.0.tax_office) and $invoiceDet.0.tax_office neq ''}{$invoiceDet.0.tax_office}{/if}">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span5 txtAlignRht">{$LANG.invoice_Tax_Number} *</div>
						<div class="span7">
						 	<input type="text" name="inv_taxnum" id="inv_taxnum" value="{if isset($invoiceDet.0.tax_number) and $invoiceDet.0.tax_number neq ''}{$invoiceDet.0.tax_number}{/if}">
						</div>
					</div>
				</div>
			</div>
			
			<div id="invoice_indiv" {if isset($invoiceDet.0.invoice_for) and $invoiceDet.0.invoice_for eq 'individual'}style="display:block;"{else}style="display:none;"{/if}>
				<div class="row-fluid">
					<div class="span5 txtAlignRht">{$LANG.invoice_ID_Number} * </div>
					<div class="span7">
					 	<input type="text" name="inv_idnumber" id="inv_idnumber" value="{if isset($invoiceDet.0.id_number) and $invoiceDet.0.id_number neq ''}{$invoiceDet.0.id_number}{/if}">
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_Address} </div>
				<div class="span7">
					 <input type="text" name="inv_address" id="inv_address" value="{if isset($invoiceDet.0.address) and $invoiceDet.0.address neq ''}{$invoiceDet.0.address}{/if}">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_District} * </div>
				<div class="span7">
					  <input type="text" name="inv_district" id="inv_district" value="{if isset($invoiceDet.0.district) and $invoiceDet.0.district neq ''}{$invoiceDet.0.district}{/if}">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_City} * </div>
				<div class="span7">
					  <input type="text" name="inv_city" id="inv_city" value="{if isset($invoiceDet.0.city) and $invoiceDet.0.city neq ''}{$invoiceDet.0.city}{/if}">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 txtAlignRht">{$LANG.invoice_Country} * </div>
				<div class="span7">
					<select id="inv_country" name="inv_country">
						<option value="Turkey" {if $invoiceDet.0.country eq 'Turkey'}selected{/if}>Turkey</option>
						<option value="Afghanistan" {if $invoiceDet.0.country eq 'Afghanistan'}selected{/if}>Afghanistan</option>
						<option value="Albania" {if $invoiceDet.0.country eq 'Albania'}selected{/if}>Albania</option>
						<option value="Algeria" {if $invoiceDet.0.country eq 'Algeria'}selected{/if}>Algeria</option>
						<option value="American Samoa" {if $invoiceDet.0.country eq 'American Samoa'}selected{/if}>American Samoa</option>
						<option value="Andorra" {if $invoiceDet.0.country eq 'Andorra'}selected{/if}>Andorra</option>
						<option value="Angola" {if $invoiceDet.0.country eq 'Angola'}selected{/if}>Angola</option>
						<option value="Antigua and Barbuda" {if $invoiceDet.0.country eq 'Antigua and Barbuda'}selected{/if}>Antigua and Barbuda</option>
						<option value="Argentina" {if $invoiceDet.0.country eq 'Argentina'}selected{/if}>Argentina</option>
						<option value="Armenia" {if $invoiceDet.0.country eq 'Armenia'}selected{/if}>Armenia</option>
						<option value="Australia" {if $invoiceDet.0.country eq 'Australia'}selected{/if}>Australia</option>
						<option value="Austria" {if $invoiceDet.0.country eq 'Austria'}selected{/if}>Austria</option>
						<option value="Azerbaijan" {if $invoiceDet.0.country eq 'Azerbaijan'}selected{/if}>Azerbaijan</option>
						<option value="Bahamas" {if $invoiceDet.0.country eq 'Bahamas'}selected{/if}>Bahamas</option>
						<option value="Bahrain" {if $invoiceDet.0.country eq 'Bahrain'}selected{/if}>Bahrain</option>
						<option value="Bangladesh" {if $invoiceDet.0.country eq 'Bangladesh'}selected{/if}>Bangladesh</option>
						<option value="Barbados" {if $invoiceDet.0.country eq 'Barbados'}selected{/if}>Barbados</option>
						<option value="Belarus" {if $invoiceDet.0.country eq 'Belarus'}selected{/if}>Belarus</option>
						<option value="Belgium" {if $invoiceDet.0.country eq 'Belgium'}selected{/if}>Belgium</option>
						<option value="Belize" {if $invoiceDet.0.country eq 'Belize'}selected{/if}>Belize</option>
						<option value="Benin" {if $invoiceDet.0.country eq 'Benin'}selected{/if}>Benin</option>
						<option value="Bermuda" {if $invoiceDet.0.country eq 'Bermuda'}selected{/if}>Bermuda</option>
						<option value="Bhutan" {if $invoiceDet.0.country eq 'Bhutan'}selected{/if}>Bhutan</option>
						<option value="Bolivia" {if $invoiceDet.0.country eq 'Bolivia'}selected{/if}>Bolivia</option>
						<option value="Bosnia and Herzegovina" {if $invoiceDet.0.country eq 'Bosnia and Herzegovina'}selected{/if}>Bosnia and Herzegovina</option>
						<option value="Botswana" {if $invoiceDet.0.country eq 'Botswana'}selected{/if}>Botswana</option>
						<option value="Brazil" {if $invoiceDet.0.country eq 'Brazil'}selected{/if}>Brazil</option>
						<option value="Brunei" {if $invoiceDet.0.country eq 'Brunei'}selected{/if}>Brunei</option>
						<option value="Bulgaria" {if $invoiceDet.0.country eq 'Bulgaria'}selected{/if}>Bulgaria</option>
						<option value="Burkina Faso" {if $invoiceDet.0.country eq 'Burkina Faso'}selected{/if}>Burkina Faso</option>
						<option value="Burundi" {if $invoiceDet.0.country eq 'Burundi'}selected{/if}>Burundi</option>
						<option value="Cambodia" {if $invoiceDet.0.country eq 'Cambodia'}selected{/if}>Cambodia</option>
						<option value="Cameroon" {if $invoiceDet.0.country eq 'Cameroon'}selected{/if}>Cameroon</option>
						<option value="Canada" {if $invoiceDet.0.country eq 'Canada'}selected{/if}>Canada</option>
						<option value="Cape Verde" {if $invoiceDet.0.country eq 'Cape Verde'}selected{/if}>Cape Verde</option>
						<option value="Cayman Islands" {if $invoiceDet.0.country eq 'Cayman Islands'}selected{/if}>Cayman Islands</option>
						<option value="Central African Republic" {if $invoiceDet.0.country eq 'Central African Republic'}selected{/if}>Central African Republic</option>
						<option value="Chad" {if $invoiceDet.0.country eq 'Chad'}selected{/if}>Chad</option>
						<option value="Chile" {if $invoiceDet.0.country eq 'Chile'}selected{/if}>Chile</option>
						<option value="China" {if $invoiceDet.0.country eq 'China'}selected{/if}>China</option>
						<option value="Colombia" {if $invoiceDet.0.country eq 'Colombia'}selected{/if}>Colombia</option>
						<option value="Comoros" {if $invoiceDet.0.country eq 'Comoros'}selected{/if}>Comoros</option>
						<option value="Congo, Democratic Republic of the" {if $invoiceDet.0.country eq 'Congo, Democratic Republic of the'}selected{/if}>Congo, Democratic Republic of the</option>
						<option value="Congo, Republic of the" {if $invoiceDet.0.country eq 'Congo, Republic of the'}selected{/if}>Congo, Republic of the</option>
						<option value="Costa Rica" {if $invoiceDet.0.country eq 'Costa Rica'}selected{/if}>Costa Rica</option>
						<option value="Côte d'Ivoire" {if $invoiceDet.0.country eq 'Côte dIvoire'}selected{/if}>Côte d'Ivoire</option>
						<option value="Croatia" {if $invoiceDet.0.country eq 'Croatia'}selected{/if}>Croatia</option>
						<option value="Cuba" {if $invoiceDet.0.country eq 'Cuba'}selected{/if}>Cuba</option>
						<option value="Cyprus" {if $invoiceDet.0.country eq 'Cyprus'}selected{/if}>Cyprus</option>
						<option value="Czech Republic" {if $invoiceDet.0.country eq 'Czech Republic'}selected{/if}>Czech Republic</option>
						<option value="Denmark" {if $invoiceDet.0.country eq 'Denmark'}selected{/if}>Denmark</option>
						<option value="Djibouti" {if $invoiceDet.0.country eq 'Djibouti'}selected{/if}>Djibouti</option>
						<option value="Dominica" {if $invoiceDet.0.country eq 'Dominica'}selected{/if}>Dominica</option>
						<option value="Dominican Republic" {if $invoiceDet.0.country eq 'Dominican Republic'}selected{/if}>Dominican Republic</option>
						<option value="East Timor" {if $invoiceDet.0.country eq 'East Timor'}selected{/if}>East Timor</option>
						<option value="Ecuador" {if $invoiceDet.0.country eq 'Ecuador'}selected{/if}>Ecuador</option>
						<option value="Egypt" {if $invoiceDet.0.country eq 'Egypt'}selected{/if}>Egypt</option>
						<option value="El Salvador" {if $invoiceDet.0.country eq 'El Salvador'}selected{/if}>El Salvador</option>
						<option value="Equatorial Guinea" {if $invoiceDet.0.country eq 'Equatorial Guinea'}selected{/if}>Equatorial Guinea</option>
						<option value="Eritrea" {if $invoiceDet.0.country eq 'Eritrea'}selected{/if}>Eritrea</option>
						<option value="Estonia" {if $invoiceDet.0.country eq 'Estonia'}selected{/if}>Estonia</option>
						<option value="Ethiopia" {if $invoiceDet.0.country eq 'Ethiopia'}selected{/if}>Ethiopia</option>
						<option value="Faroe Islands" {if $invoiceDet.0.country eq 'Faroe Islands'}selected{/if}>Faroe Islands</option>
						<option value="Fiji" {if $invoiceDet.0.country eq 'Fiji'}selected{/if}>Fiji</option>
						<option value="Finland" {if $invoiceDet.0.country eq 'Finland'}selected{/if}>Finland</option>
						<option value="France" {if $invoiceDet.0.country eq 'France'}selected{/if}>France</option>
						<option value="French Polynesia" {if $invoiceDet.0.country eq 'French Polynesia'}selected{/if}>French Polynesia</option>
						<option value="Gabon" {if $invoiceDet.0.country eq 'Gabon'}selected{/if}>Gabon</option>
						<option value="Gambia" {if $invoiceDet.0.country eq 'Gambia'}selected{/if}>Gambia</option>
						<option value="Georgia" {if $invoiceDet.0.country eq 'Georgia'}selected{/if}>Georgia</option>
						<option value="Germany" {if $invoiceDet.0.country eq 'Germany'}selected{/if}>Germany</option>
						<option value="Ghana" {if $invoiceDet.0.country eq 'Ghana'}selected{/if}>Ghana</option>
						<option value="Greece" {if $invoiceDet.0.country eq 'Greece'}selected{/if}>Greece</option>
						<option value="Greenland" {if $invoiceDet.0.country eq 'Greenland'}selected{/if}>Greenland</option>
						<option value="Grenada" {if $invoiceDet.0.country eq 'Grenada'}selected{/if}>Grenada</option>
						<option value="Guam" {if $invoiceDet.0.country eq 'Guam'}selected{/if}>Guam</option>
						<option value="Guatemala" {if $invoiceDet.0.country eq 'Guatemala'}selected{/if}>Guatemala</option>
						<option value="Guinea" {if $invoiceDet.0.country eq 'Guinea'}selected{/if}>Guinea</option>
						<option value="Guinea-Bissau" {if $invoiceDet.0.country eq 'Guinea-Bissau'}selected{/if}>Guinea-Bissau</option>
						<option value="Guyana" {if $invoiceDet.0.country eq 'Guyana'}selected{/if}>Guyana</option>
						<option value="Haiti" {if $invoiceDet.0.country eq 'Haiti'}selected{/if}>Haiti</option>
						<option value="Honduras" {if $invoiceDet.0.country eq 'Honduras'}selected{/if}>Honduras</option>
						<option value="Hong Kong" {if $invoiceDet.0.country eq 'Hong Kong'}selected{/if}>Hong Kong</option>
						<option value="Hungary" {if $invoiceDet.0.country eq 'Hungary'}selected{/if}>Hungary</option>
						<option value="Iceland" {if $invoiceDet.0.country eq 'Iceland'}selected{/if}>Iceland</option>
						<option value="India" {if $invoiceDet.0.country eq 'India'}selected{/if}>India</option>
						<option value="Indonesia" {if $invoiceDet.0.country eq 'Indonesia'}selected{/if}>Indonesia</option>
						<option value="Iran" {if $invoiceDet.0.country eq 'Iran'}selected{/if}>Iran</option>
						<option value="Iraq" {if $invoiceDet.0.country eq 'Iraq'}selected{/if}>Iraq</option>
						<option value="Ireland" {if $invoiceDet.0.country eq 'Ireland'}selected{/if}>Ireland</option>
						<option value="Israel" {if $invoiceDet.0.country eq 'Israel'}selected{/if}>Israel</option>
						<option value="Italy" {if $invoiceDet.0.country eq 'Italy'}selected{/if}>Italy</option>
						<option value="Jamaica" {if $invoiceDet.0.country eq 'Jamaica'}selected{/if}>Jamaica</option>
						<option value="Japan" {if $invoiceDet.0.country eq 'Japan'}selected{/if}>Japan</option>
						<option value="Jordan" {if $invoiceDet.0.country eq 'Jordan'}selected{/if}>Jordan</option>
						<option value="Kazakhstan" {if $invoiceDet.0.country eq 'Kazakhstan'}selected{/if}>Kazakhstan</option>
						<option value="Kenya" {if $invoiceDet.0.country eq 'Kenya'}selected{/if}>Kenya</option>
						<option value="Kiribati" {if $invoiceDet.0.country eq 'Kiribati'}selected{/if}>Kiribati</option>
						<option value="North Korea" {if $invoiceDet.0.country eq 'North Korea'}selected{/if}>North Korea</option>
						<option value="South Korea" {if $invoiceDet.0.country eq 'South Korea'}selected{/if}>South Korea</option>
						<option value="Kosovo" {if $invoiceDet.0.country eq 'Kosovo'}selected{/if}>Kosovo</option>
						<option value="Kuwait" {if $invoiceDet.0.country eq 'Kuwait'}selected{/if}>Kuwait</option>
						<option value="Kyrgyzstan" {if $invoiceDet.0.country eq 'Kyrgyzstan'}selected{/if}>Kyrgyzstan</option>
						<option value="Laos" {if $invoiceDet.0.country eq 'Laos'}selected{/if}>Laos</option>
						<option value="Latvia" {if $invoiceDet.0.country eq 'Latvia'}selected{/if}>Latvia</option>
						<option value="Lebanon" {if $invoiceDet.0.country eq 'Lebanon'}selected{/if}>Lebanon</option>
						<option value="Lesotho" {if $invoiceDet.0.country eq 'Lesotho'}selected{/if}>Lesotho</option>
						<option value="Liberia" {if $invoiceDet.0.country eq 'Liberia'}selected{/if}>Liberia</option>
						<option value="Libya" {if $invoiceDet.0.country eq 'Libya'}selected{/if}>Libya</option>
						<option value="Liechtenstein" {if $invoiceDet.0.country eq 'Liechtenstein'}selected{/if}>Liechtenstein</option>
						<option value="Lithuania" {if $invoiceDet.0.country eq 'Lithuania'}selected{/if}>Lithuania</option>
						<option value="Luxembourg" {if $invoiceDet.0.country eq 'Luxembourg'}selected{/if}>Luxembourg</option>
						<option value="Macedonia" {if $invoiceDet.0.country eq 'Macedonia'}selected{/if}>Macedonia</option>
						<option value="Madagascar" {if $invoiceDet.0.country eq 'Madagascar'}selected{/if}>Madagascar</option>
						<option value="Malawi" {if $invoiceDet.0.country eq 'Malawi'}selected{/if}>Malawi</option>
						<option value="Malaysia" {if $invoiceDet.0.country eq 'Malaysia'}selected{/if}>Malaysia</option>
						<option value="Maldives" {if $invoiceDet.0.country eq 'Maldives'}selected{/if}>Maldives</option>
						<option value="Mali" {if $invoiceDet.0.country eq 'Mali'}selected{/if}>Mali</option>
						<option value="Malta" {if $invoiceDet.0.country eq 'Malta'}selected{/if}>Malta</option>
						<option value="Marshall Islands" {if $invoiceDet.0.country eq 'Marshall Islands'}selected{/if}>Marshall Islands</option>
						<option value="Mauritania" {if $invoiceDet.0.country eq 'Mauritania'}selected{/if}>Mauritania</option>
						<option value="Mauritius" {if $invoiceDet.0.country eq 'Mauritius'}selected{/if}>Mauritius</option>
						<option value="Mexico" {if $invoiceDet.0.country eq 'Mexico'}selected{/if}>Mexico</option>
						<option value="Micronesia" {if $invoiceDet.0.country eq 'Micronesia'}selected{/if}>Micronesia</option>
						<option value="Moldova" {if $invoiceDet.0.country eq 'Moldova'}selected{/if}>Moldova</option>
						<option value="Monaco" {if $invoiceDet.0.country eq 'Monaco'}selected{/if}>Monaco</option>
						<option value="Mongolia" {if $invoiceDet.0.country eq 'Mongolia'}selected{/if}>Mongolia</option>
						<option value="Montenegro" {if $invoiceDet.0.country eq 'Montenegro'}selected{/if}>Montenegro</option>
						<option value="Morocco" {if $invoiceDet.0.country eq 'Morocco'}selected{/if}>Morocco</option>
						<option value="Mozambique" {if $invoiceDet.0.country eq 'Mozambique'}selected{/if}>Mozambique</option>
						<option value="Myanmar" {if $invoiceDet.0.country eq 'Myanmar'}selected{/if}>Myanmar</option>
						<option value="Namibia" {if $invoiceDet.0.country eq 'Namibia'}selected{/if}>Namibia</option>
						<option value="Nauru" {if $invoiceDet.0.country eq 'Nauru'}selected{/if}>Nauru</option>
						<option value="Nepal" {if $invoiceDet.0.country eq 'Nepal'}selected{/if}>Nepal</option>
						<option value="Netherlands" {if $invoiceDet.0.country eq 'Netherlands'}selected{/if}>Netherlands</option>
						<option value="New Zealand" {if $invoiceDet.0.country eq 'New Zealand'}selected{/if}>New Zealand</option>
						<option value="Nicaragua" {if $invoiceDet.0.country eq 'Nicaragua'}selected{/if}>Nicaragua</option>
						<option value="Niger" {if $invoiceDet.0.country eq 'Niger'}selected{/if}>Niger</option>
						<option value="Nigeria" {if $invoiceDet.0.country eq 'Nigeria'}selected{/if}>Nigeria</option>
						<option value="Northern Mariana Islands" {if $invoiceDet.0.country eq 'Northern Mariana Islands'}selected{/if}>Northern Mariana Islands</option>
						<option value="Norway" {if $invoiceDet.0.country eq 'Norway'}selected{/if}>Norway</option>
						<option value="Oman" {if $invoiceDet.0.country eq 'Oman'}selected{/if}>Oman</option>
						<option value="Pakistan" {if $invoiceDet.0.country eq 'Pakistan'}selected{/if}>Pakistan</option>
						<option value="Palau" {if $invoiceDet.0.country eq 'Palau'}selected{/if}>Palau</option>
						<option value="Palestine, State of" {if $invoiceDet.0.country eq 'Palestine, State of'}selected{/if}>Palestine, State of</option>
						<option value="Panama" {if $invoiceDet.0.country eq 'Panama'}selected{/if}>Panama</option>
						<option value="Papua New Guinea" {if $invoiceDet.0.country eq 'Papua New Guinea'}selected{/if}>Papua New Guinea</option>
						<option value="Paraguay" {if $invoiceDet.0.country eq 'Paraguay'}selected{/if}>Paraguay</option>
						<option value="Peru" {if $invoiceDet.0.country eq 'Peru'}selected{/if}>Peru</option>
						<option value="Philippines" {if $invoiceDet.0.country eq 'Philippines'}selected{/if}>Philippines</option>
						<option value="Poland" {if $invoiceDet.0.country eq 'Poland'}selected{/if}>Poland</option>
						<option value="Portugal" {if $invoiceDet.0.country eq 'Portugal'}selected{/if}>Portugal</option>
						<option value="Puerto Rico" {if $invoiceDet.0.country eq 'Puerto Rico'}selected{/if}>Puerto Rico</option>
						<option value="Qatar" {if $invoiceDet.0.country eq 'Qatar'}selected{/if}>Qatar</option>
						<option value="Romania" {if $invoiceDet.0.country eq 'Romania'}selected{/if}>Romania</option>
						<option value="Russia" {if $invoiceDet.0.country eq 'Russia'}selected{/if}>Russia</option>
						<option value="Rwanda" {if $invoiceDet.0.country eq 'Rwanda'}selected{/if}>Rwanda</option>
						<option value="Saint Kitts and Nevis" {if $invoiceDet.0.country eq 'Saint Kitts and Nevis'}selected{/if}>Saint Kitts and Nevis</option>
						<option value="Saint Lucia" {if $invoiceDet.0.country eq 'Saint Lucia'}selected{/if}>Saint Lucia</option>
						<option value="Saint Vincent and the Grenadines" {if $invoiceDet.0.country eq 'Saint Vincent and the Grenadines'}selected{/if}>Saint Vincent and the Grenadines</option>
						<option value="Samoa" {if $invoiceDet.0.country eq 'Samoa'}selected{/if}>Samoa</option>
						<option value="San Marino" {if $invoiceDet.0.country eq 'San Marino'}selected{/if}>San Marino</option>
						<option value="Sao Tome and Principe" {if $invoiceDet.0.country eq 'Sao Tome and Principe'}selected{/if}>Sao Tome and Principe</option>
						<option value="Saudi Arabia" {if $invoiceDet.0.country eq 'Saudi Arabia'}selected{/if}>Saudi Arabia</option>
						<option value="Senegal" {if $invoiceDet.0.country eq 'Senegal'}selected{/if}>Senegal</option>
						<option value="Serbia" {if $invoiceDet.0.country eq 'Serbia'}selected{/if}>Serbia</option>
						<option value="Seychelles" {if $invoiceDet.0.country eq 'Seychelles'}selected{/if}>Seychelles</option>
						<option value="Sierra Leone" {if $invoiceDet.0.country eq 'Sierra Leone'}selected{/if}>Sierra Leone</option>
						<option value="Singapore" {if $invoiceDet.0.country eq 'Singapore'}selected{/if}>Singapore</option>
						<option value="Sint Maarten" {if $invoiceDet.0.country eq 'Sint Maarten'}selected{/if}>Sint Maarten</option>
						<option value="Slovakia" {if $invoiceDet.0.country eq 'Slovakia'}selected{/if}>Slovakia</option>
						<option value="Slovenia" {if $invoiceDet.0.country eq 'Slovenia'}selected{/if}>Slovenia</option>
						<option value="Solomon Islands" {if $invoiceDet.0.country eq 'Solomon Islands'}selected{/if}>Solomon Islands</option>
						<option value="Somalia" {if $invoiceDet.0.country eq 'Somalia'}selected{/if}>Somalia</option>
						<option value="South Africa" {if $invoiceDet.0.country eq 'South Africa'}selected{/if}>South Africa</option>
						<option value="Spain" {if $invoiceDet.0.country eq 'Spain'}selected{/if}>Spain</option>
						<option value="Sri Lanka" {if $invoiceDet.0.country eq 'Sri Lanka'}selected{/if}>Sri Lanka</option>
						<option value="Sudan" {if $invoiceDet.0.country eq 'Sudan'}selected{/if}>Sudan</option>
						<option value="Sudan, South" {if $invoiceDet.0.country eq 'Sudan, South'}selected{/if}>Sudan, South</option>
						<option value="Suriname" {if $invoiceDet.0.country eq 'Suriname'}selected{/if}>Suriname</option>
						<option value="Swaziland" {if $invoiceDet.0.country eq 'Swaziland'}selected{/if}>Swaziland</option>
						<option value="Sweden" {if $invoiceDet.0.country eq 'Sweden'}selected{/if}>Sweden</option>
						<option value="Switzerland" {if $invoiceDet.0.country eq 'Switzerland'}selected{/if}>Switzerland</option>
						<option value="Syria" {if $invoiceDet.0.country eq 'Syria'}selected{/if}>Syria</option>
						<option value="Taiwan" {if $invoiceDet.0.country eq 'Taiwan'}selected{/if}>Taiwan</option>
						<option value="Tajikistan" {if $invoiceDet.0.country eq 'Tajikistan'}selected{/if}>Tajikistan</option>
						<option value="Tanzania" {if $invoiceDet.0.country eq 'Tanzania'}selected{/if}>Tanzania</option>
						<option value="Thailand" {if $invoiceDet.0.country eq 'Thailand'}selected{/if}>Thailand</option>
						<option value="Togo" {if $invoiceDet.0.country eq 'Togo'}selected{/if}>Togo</option>
						<option value="Tonga" {if $invoiceDet.0.country eq 'Tonga'}selected{/if}>Tonga</option>
						<option value="Trinidad and Tobago" {if $invoiceDet.0.country eq 'Trinidad and Tobago'}selected{/if}>Trinidad and Tobago</option>
						<option value="Tunisia" {if $invoiceDet.0.country eq 'Tunisia'}selected{/if}>Tunisia</option>
						<option value="Turkmenistan" {if $invoiceDet.0.country eq 'Turkmenistan'}selected{/if}>Turkmenistan</option>
						<option value="Tuvalu" {if $invoiceDet.0.country eq 'Tuvalu'}selected{/if}>Tuvalu</option>
						<option value="Uganda" {if $invoiceDet.0.country eq 'Uganda'}selected{/if}>Uganda</option>
						<option value="Ukraine" {if $invoiceDet.0.country eq 'Ukraine'}selected{/if}>Ukraine</option>
						<option value="United Arab Emirates" {if $invoiceDet.0.country eq 'United Arab Emirates'}selected{/if}>United Arab Emirates</option>
						<option value="United Kingdom" {if $invoiceDet.0.country eq 'United Kingdom'}selected{/if}>United Kingdom</option>
						<option value="United States" {if $invoiceDet.0.country eq 'United States'}selected{/if}>United States</option>
						<option value="Uruguay" {if $invoiceDet.0.country eq 'Uruguay'}selected{/if}>Uruguay</option>
						<option value="Uzbekistan" {if $invoiceDet.0.country eq 'Uzbekistan'}selected{/if}>Uzbekistan</option>
						<option value="Vanuatu" {if $invoiceDet.0.country eq 'Vanuatu'}selected{/if}>Vanuatu</option>
						<option value="Vatican City" {if $invoiceDet.0.country eq 'Vatican City'}selected{/if}>Vatican City</option>
						<option value="Venezuela" {if $invoiceDet.0.country eq 'Venezuela'}selected{/if}>Venezuela</option>
						<option value="Vietnam" {if $invoiceDet.0.country eq 'Vietnam'}selected{/if}>Vietnam</option>
						<option value="Virgin Islands, British" {if $invoiceDet.0.country eq 'Virgin Islands, British'}selected{/if}>Virgin Islands, British</option>
						<option value="Virgin Islands, U.S." {if $invoiceDet.0.country eq 'Virgin Islands, U.S.'}selected{/if}>Virgin Islands, U.S.</option>
						<option value="Yemen" {if $invoiceDet.0.country eq 'Yemen'}selected{/if}>Yemen</option>
						<option value="Zambia" {if $invoiceDet.0.country eq 'Zambia'}selected{/if}>Zambia</option>
						<option value="Zimbabwe" {if $invoiceDet.0.country eq 'Zimbabwe'}selected{/if}>Zimbabwe</option>
					</select>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span5 offset5">
					<input type="button" class="btn btn-warning" name="submit" value="{$LANG.invoice_Save_Continue}" onclick="buyDomainInvoiceDetailsStore();">
				</div>
			</div>
		</div>
		</form>
		<div class="topArrow"></div>
	</div>
{/if}