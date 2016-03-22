<div class="row-fluid">
	<div class="marTop20">
		<div class="container">
			<div class="staticPageInner marTop20">			
				<div class="paymentHead">{$LANG.buy_credit_select}</div>
				<div class="paypalListInner marTop20">
					<span class="buyCreditInnerBgContLeft">
						<input type="radio" name="payment_button" class="radioButt" id="credit_button"  checked="checked" onclick="return showCreditUrl();"/>
						<span class="textedit">{$LANG.buy_credit_selectcredit}</span>
						<img src="{$SITE_BASEURL}/images/creditcard.jpg" alt="creditcard" title="" />
					</span>
					<span class="buyCreditInnerBgContLeft">
						<div class="frt">
							<input type="radio" name="payment_button" class="radioButt" id="adaptive_button" onclick="return paypalUrl();" />
							<span class="textedit">{$LANG.buy_credit_selectadaptive}</span>
							<img src="{$SITE_BASEURL}/images/paypal.png" alt="paypal" title="" />
						</div>
					</span>
				</div>
				<div id="paypal_buy" style="display:none;">
					<div class="clr"></div>
					<div class="paypalListInnerHead">{$LANG.total_amount} ${$smarty.get.price|base64_decode}</div>
					<form method="post" name="paypal_form1" id="paypal_form1" class="no-mar" action="{$objCommon->getPaypalUrl()}">
						<input type="hidden" name="business" value="{$PAYPAL_MERCHANT_EMAIL}"/>
						<input type="hidden" name="cmd" value="_xclick"/>
						<input type="hidden" name="rm" value="2"/>
						<input type="hidden" name="amount" value="{$smarty.get.price|base64_decode}" id="tot_amt"/>
						<input type="hidden" name="return" value="{$SITE_BASEURL}/buyCredits.php?price={$smarty.get.price}&action=paypal"/>
						<input type="hidden" name="cancel_return" value="{$SITE_BASEURL}/subscription.php"/>
						<input type="hidden" name="currency_code" value="USD"/>
						<input type="button" class="buyCreditListButt" name="" value="Continue" onclick="redirectPaypal();">
					</form>
				</div>
				<div class="clr"></div>
				<div id="authorize_buy" class="paypalListInnerBor marTop20">
					<div class="paypalListInnerHead">{$LANG.total_amount} ${$smarty.get.price|base64_decode}</div>
					<div id="err_msg"></div>
					<div class="paypalListInnerHead">{$LANG.credit_card_detail}</div>
					<form method="post" name="paypal_form" class="paypalListInnerForm" id="paypal_form">
						<input type="hidden" name="amount" value="{$smarty.get.price}">
						<div class="paypalListName">{$LANG.card_holder_name}</div>
						<input type="text" id="card_name" name="card_name" value="">
						<div class="paypalListNameDet">(Cardholder Name)</div>
						<div class="paypalListName">{$LANG.card_no}</div>
						<input type="text" id="card_no" name="card_no" value="">
						<div class="paypalListNameDet">(16 digit number 370000000000002)</div>
						<div class="paypalListName">{$LANG.cvv_no}</div>
						<input type="password" class="widt13per" id="cvv_no" name="cvv_no" value="">
						<div class="paypalListNameDet">(3 digit number on back of card)</div>
						<div class="paypalListName">{$LANG.expiry_date}</div>
						<select name="expires_month" class="hei34 paypalSelect" id="expires_month">
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">Jun</option>
							<option value="7">July</option>
							<option value="8">Aug</option>
							<option value="9">Sep</option>
							<option value="10">oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
						</select>
						<select name="expires_year" class="hei34 paypalSelect" id="expires_year">
							{section name='yearlist' loop=$year_list}
								<option value="{$year_list[yearlist]}">{$year_list[yearlist]}</option>
							{/section}
						</select>
						<div class="clr"></div>
						<input type="button" class="buyCreditListButt" name="authorize_paypal_credits" value="submit" onclick="checkCreditCardvalidation();">
					</form>
				</div>
           </div>
		</div>
	</div>
</div>