{*<div class="rightContHeading Heading">{if $smarty.get.method eq 'paypal'}{$LANG.admin_edit_paypal_payment}{else}{$LANG.admin_edit_authorize_payment}{/if}*}
<div class="rightContHeading Heading">{if $smarty.get.method eq 'nestPayment'}{$LANG.admin_edit_nestPayment}{/if} 
<a class="backButt pull-right" href="paymentManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	 
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
    
    <!-- Nest Payment Processing -->    
    {if $smarty.get.method eq 'nestPayment'}
 	<form name="addNewPrice" method="post" enctype="multipart/form-data"  onsubmit="return nestPaymentValidation();" class="sky-form form-horizontal skyformbgNon">	
 	 	<div class="clearfix priceHeading"></div>
	 	<div class="control-group">	
			<label class="control-label label" for="">Payment Mode</label>
			<div class="controls" >
				<label class="span1 offset0">
					<input class="radioButtAlign nestPay_mode" type="radio" name="nestPay_mode" id="nestPay_test_mode" value="T" {if $select.0.nestPay_mode|stripslashes eq 'T'}checked{/if} onclick="paymentTestLive('testDetailsDiv');"/>
					 {$LANG.admin_edit_nestPay_mode_test}
				</label>
				<label class="span1 offset0">
					<input class="radioButtAlign nestPay_mode" type="radio" name="nestPay_mode" id="nestPay_live_mode" value="L" {if $select.0.nestPay_mode|stripslashes eq 'L'}checked{/if} onclick="paymentTestLive('liveDetailsDiv');"/>
					 {$LANG.admin_edit_nestPay_mode_live}
				</label>
				{*<script type="text/javascript">document.addNewPrice.nestPay_mode.focus();</script>*}
			</div>            
		</div>
        <!--  Test Nest Payment -->        
        <div id="testDetailsDiv" {if $select.0.nestPay_mode eq 'T'}style="display:block"{else}style="display:none"{/if}>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_clientId_test} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_test_clientId" id="nestPay_test_clientId" value="{if $smarty.get.method neq ''}{$select.0.nestPay_test_clientId|stripslashes}{else}{$smarty.post.nestPay_test_clientId_test}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_test_clientId.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_storeKey_test} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_test_storeId" id="nestPay_test_storeId" value="{if $smarty.get.method neq ''}{$select.0.nestPay_test_storeId|stripslashes}{else}{$smarty.post.nestPay_test_storeId}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_test_storeId.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_userName_test} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_test_userName" id="nestPay_test_userName" value="{if $smarty.get.method neq ''}{$select.0.nestPay_test_userName|stripslashes}{else}{$smarty.post.nestPay_test_userName}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_test_userName.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_pwd_test} </label>
    			<div class="controls">
    				<input class="textbox" type="password" name="nestPay_test_pwd" id="nestPay_test_pwd" value="{if $smarty.get.method neq ''}{$select.0.nestPay_test_pwd|stripslashes}{else}{$smarty.post.nestPay_test_pwd}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_test_pwd.focus();</script>*}
    			</div>
    		</div>
        </div>
        <!--  Live Nest Payment -->        
        <div id="liveDetailsDiv" {if $select.0.nestPay_mode eq 'L'}style="display:block"{else}style="display:none"{/if}>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_clientId_live} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_live_clientId" id="nestPay_live_clientId" value="{if $smarty.get.method neq ''}{$select.0.nestPay_live_clientId|stripslashes}{else}{$smarty.post.nestPay_live_clientId}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_live_clientId.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_storeKey_live} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_live_storeId" id="nestPay_live_storeId" value="{if $smarty.get.method neq ''}{$select.0.nestPay_live_storeId|stripslashes}{else}{$smarty.post.nestPay_live_storeId}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_live_storeId.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_userName_live} </label>
    			<div class="controls">
    				<input class="textbox" type="text" name="nestPay_live_userName" id="nestPay_live_userName" value="{if $smarty.get.method neq ''}{$select.0.nestPay_live_userName|stripslashes}{else}{$smarty.post.nestPay_live_userName}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_live_userName.focus();</script>*}
    			</div>
    		</div>
            <div class="control-group">	
    			<label class="control-label label" for="">{$LANG.admin_edit_nestPay_pwd_live} </label>
    			<div class="controls">
    				<input class="textbox" type="password" name="nestPay_live_pwd" id="nestPay_live_pwd" value="{if $smarty.get.method neq ''}{$select.0.nestPay_live_pwd|stripslashes}{else}{$smarty.post.nestPay_live_pwd}{/if}" />
    				{*<script type="text/javascript">document.addNewPrice.nestPay_live_pwd.focus();</script>*}
    			</div>
    		</div>
        </div>
                                                
	 	<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="pay_payment_edit" value="{$LANG.admin_update}">
				<a class="btn btn-danger" href="paymentManage.php">Cancel</a>
			</div>
		</div>
	</form>
	{/if}
                
	{if $smarty.get.method eq 'paypal'}
 	<form name="addNewPrice" method="post" enctype="multipart/form-data"  class="sky-form form-horizontal skyformbgNon">	
 	 	<div class="clearfix priceHeading">{$LANG.admin_edit_paypal_manage}</div>
	 	<div class="control-group">	
			<label class="control-label label" for="">Paypal test mode </label>
			<div class="controls">
				<input class="textbox" type="text" name="pay_test_mode" id="pay_test_mode" value="{if $smarty.get.method neq ''}{$select.0.pay_test_mode|stripslashes}{else}{$smarty.post.pay_test_mode}{/if}" />
				<script type="text/javascript">document.addNewPrice.pay_test_mode.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Paypal test url </label>
			<div class="controls">
				<input class="textbox" type="text" name="pay_test_url" id="pay_test_url" value="{if $smarty.get.method neq ''}{$select.0.pay_test_url|stripslashes}{else}{$smarty.post.pay_test_url}{/if}" />
				<script type="text/javascript">document.addNewPrice.pay_test_url.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Paypal url </label>
			<div class="controls">
				<input class="textbox" type="text" name="pay_url" id="pay_url" value="{if $smarty.get.method neq ''}{$select.0.pay_url|stripslashes}{else}{$smarty.post.pay_url}{/if}" />
				<script type="text/javascript">document.addNewPrice.pay_url.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Paypal merchant email  </label>
			<div class="controls">
				<input class="textbox" type="text" name="pay_merchant_email" id="pay_merchant_email" value="{if $smarty.get.method neq ''}{$select.0.pay_merchant_email|stripslashes}{else}{$smarty.post.pay_merchant_email}{/if}" />
				<script type="text/javascript">document.addNewPrice.pay_merchant_email.focus();</script>
			</div>
		</div>
	 	<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="pay_payment_edit" value="{$LANG.admin_update}">
				<a class="btn btn-danger" href="paymentManage.php">Cancel</a>
			</div>
		</div>
	</form>
	{/if}
	
	<!----for authorize edit start----->
{*	{if $smarty.get.method eq 'authorize'}
 	<form name="addNewPrice" method="post" enctype="multipart/form-data"  class="sky-form form-horizontal skyformbgNon">	
 	 	<div class="clearfix priceHeading">{$LANG.admin_edit_authorize_manage}</div>
	 	<div class="control-group">	
			<label class="control-label label" for="">Authorize test mode </label>
			<div class="controls">
				<input class="textbox" type="text" name="auth_test_mode" id="auth_test_mode" value="{if $smarty.get.method neq ''}{$select.0.auth_test_mode|stripslashes}{else}{$smarty.post.auth_test_mode}{/if}" />
				<script type="text/javascript">document.addNewPrice.auth_test_mode.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Live Payment App Id</label>
			<div class="controls">
				<input class="textbox" type="text" name="live_pay_app_id" id="live_pay_app_id" value="{if $smarty.get.method neq ''}{$select.0.live_pay_app_id|stripslashes}{else}{$smarty.post.live_pay_app_id}{/if}" />
				<script type="text/javascript">document.addNewPrice.live_pay_app_id.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Live Payment Transaction Key</label>
			<div class="controls">
				<input class="textbox" type="text" name="live_pay_trans_key" id="live_pay_trans_key" value="{if $smarty.get.method neq ''}{$select.0.live_pay_trans_key|stripslashes}{else}{$smarty.post.live_pay_trans_key}{/if}" />
				<script type="text/javascript">document.addNewPrice.live_pay_trans_key.focus();</script>
			</div>
		</div>
		
		<div class="control-group">	
			<label class="control-label label" for="">Test Payment Application Id</label>
			<div class="controls">
				<input class="textbox" type="text" name="test_pay_app_id" id="test_pay_app_id" value="{if $smarty.get.method neq ''}{$select.0.test_pay_app_id|stripslashes}{else}{$smarty.post.test_pay_app_id}{/if}" />
				<script type="text/javascript">document.addNewPrice.test_pay_app_id.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">Test payment transaction key</label>
			<div class="controls">
				<input class="textbox" type="text" name="test_pay_trans_key" id="test_pay_trans_key" value="{if $smarty.get.method neq ''}{$select.0.test_pay_trans_key|stripslashes}{else}{$smarty.post.test_pay_trans_key}{/if}" />
				<script type="text/javascript">document.addNewPrice.test_pay_trans_key.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">authorize live url</label>
			<div class="controls">
				<input class="textbox" type="text" name="auth_live_url" id="auth_live_url" value="{if $smarty.get.method neq ''}{$select.0.auth_live_url|stripslashes}{else}{$smarty.post.auth_live_url}{/if}" />
				<script type="text/javascript">document.addNewPrice.auth_live_url.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">authourize payment text url</label>
			<div class="controls">
				<input class="textbox" type="text" name="auth_pay_text_url" id="auth_pay_text_url" value="{if $smarty.get.method neq ''}{$select.0.auth_pay_text_url|stripslashes}{else}{$smarty.post.auth_pay_text_url}{/if}" />
				<script type="text/javascript">document.addNewPrice.auth_pay_text_url.focus();</script>
			</div>
		</div>
	 	<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="auth_payment_edit" value="{$LANG.admin_update}">
				<a class="btn btn-danger" href="paymentManage.php">Cancel</a>
			</div>
		</div>
	</form>
	{/if}*}
	<!---authorize page edit end----->
</div>