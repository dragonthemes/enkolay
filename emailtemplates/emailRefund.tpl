 
 <html>
 <div style="border: 1px solid #888888; padding: 2px; margin:20px;">
  Order confirmation
 {ORDER_ID}
	<div style="color: #000000; font: 18px/50px 'Trebuchet MS'; text-align: center;">Thank you for your order!</div>
	<div style="padding: 18px;">
		<div style="color: #000000; font:bold 16px/40px 'Trebuchet MS';">{HEADER}</div>
		<div style="border: 1px solid #CCCCCC; padding: 2px;">
			<div style="background-color: #2486DC;background-image:-moz-linear-gradient(top,#278BE1,#2181D8);	background-image:-webkit-gradient(linear,0 0,0 100%,from(#278BE1),to(#2181D8));	background-image:-webkit-linear-gradient(top,#278BE1,#e5e5e5);	background-image:-o-linear-gradient(top,#278BE1,#2181D8);	background-image:linear-gradient(to bottom,#278BE1,#2181D8)!important;background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#278BE1', endColorstr='#2181D8', GradientType=0)!important; color: #ffffff;  font-family: 'Trebuchet MS';  font-size:16px; font-weight:bold; padding: 10px; text-transform: uppercase;">Refund Information</div>
			<ul style="margin: 0; padding: 15px;">	
				<li style="display: block; line-height: 24px;font: 13px/24px 'Trebuchet MS';">Your refund will appear on your account in 3 - 5 Days.</li>
				<li style="display: block; line-height: 24px;font: 13px/24px 'Trebuchet MS';">Refund will be applied to: </li>
				<li style="display: block; line-height: 24px;font: 13px/24px 'Trebuchet MS';">Visa 1234 - Visa</li>
			</ul>
		</div>
		<div style="border: 1px solid #CCCCCC; padding: 2px;margin-top:20px;">
			<div style="background-color: #2486DC;background-image:-moz-linear-gradient(top,#278BE1,#2181D8);	background-image:-webkit-gradient(linear,0 0,0 100%,from(#278BE1),to(#2181D8));	background-image:-webkit-linear-gradient(top,#278BE1,#e5e5e5);	background-image:-o-linear-gradient(top,#278BE1,#2181D8);	background-image:linear-gradient(to bottom,#278BE1,#2181D8)!important;background-repeat:repeat-x;filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#278BE1', endColorstr='#2181D8', GradientType=0)!important; color: #ffffff;  font-family: 'Trebuchet MS';  font-size:16px; font-weight:bold; padding: 10px; text-transform: uppercase;">Order Receipt</div>
			<ul style="border-bottom: 1px solid #DDDDDD; font-size: 12px; margin: 0; padding: 0 15px 10px;">
				<li style="font: 14px/34px 'Trebuchet MS'; list-style:none;"><b style="width:150px; display: inline-block;">Quantity</b> : {QUANTITY}  </li>
			</ul>
			<ul style="border-bottom: 1px solid #DDDDDD; font-size: 12px; margin: 0; padding: 0 15px 10px;">
				<li style="font: 14px/34px 'Trebuchet MS'; list-style:none;"><b style="width:150px; display: inline-block;">Price</b> : {SALE_PRICE}</li>
			</ul>
			<ul style="border-bottom: 1px solid #DDDDDD; font-size: 12px; margin: 0; padding: 0 15px 10px;">
				<li style="font: 14px/34px 'Trebuchet MS'; list-style:none;"><b style="width:150px; display: inline-block;">Shipping Price</b> : {SHIPPING_PRICE}</li>
			</ul>
			<ul style="border-bottom: 1px solid #DDDDDD; font-size: 12px; margin: 0; padding: 0 15px 10px;">
				<li style="font: 14px/34px 'Trebuchet MS'; list-style:none;"><b style="width:150px; display: inline-block;">Tax Price</b> : {TAX}</li>
			</ul>
			<ul style="font-size: 12px; margin: 0; padding: 0 15px 10px;">
				<li style="font: 14px/34px 'Trebuchet MS'; list-style:none;"><b style="width:150px; display: inline-block;">Total  Price</b> : {TOTAL}</li>
			</ul>
		</div>
		 
		<div style="color: #000000; font:bold 16px/40px 'Trebuchet MS';">{FOOTER}</div>
	</div>
</div>
</html>