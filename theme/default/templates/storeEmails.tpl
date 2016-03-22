
<div class="tableOuterBor marTop20 clearfix">
	<div class="emailType">Email type</div>
	<div class="storeEmailInner clearfix">
		<div class="storeEmail">
			<ul class="storeEmailUl">
				<li>
					<a class="active"  href="javascript:void(0)" id="order">Order Confirmation</a>
				</li>
				<li>
					<a  href="javascript:void(0)" id="shipped">Shipped Email</a>
				</li>
				<li>
					<a  href="javascript:void(0)" id="refund">Refuned Email</a>
				</li>
				<li class="no-mar">
					<a  href="javascript:void(0)" id="canceled">Canceled Email</a>
				</li>
			</ul>
		</div>
		<div class="tabCont" id="order_content">
			{include file="order_info.tpl"}
		</div>
		<div class="tabCont" id="shipped_content" style="display:none;">
			{include file="shipped_email.tpl"}
		</div>
		<div class="tabCont" id="refund_content" style="display:none;">
			{include file="refund_email.tpl"}
		</div>
		<div class="tabCont" id="canceled_content" style="display:none;">
			{include file="cancelled_email.tpl"}
		</div>
	</div>
</div>
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$(".storeEmailUl li a").click(function() {
				$(".storeEmailUl li a").removeClass("active");
				$(".tabCont").slideUp('slow');
				$(this).addClass("active"); 
				var activeTab = $(this).attr("id");
				$('#'+activeTab+'_content').slideDown('slow');
			});	
		});
	</script>
{/literal}

 