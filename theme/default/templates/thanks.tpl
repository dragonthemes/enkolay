<div class="row-fluid">
	<div class="marTop75">
		<div class="container">
			<div class="usrHomeInner">
				<span style="color:red;margin-left:230px;">{$successmsg}</span>
				<div class="thanksMsg">
					<div class="thanksMsgTxt">{$LANG.thanks_for_thanks_tpl}</div>
				</div>
			</div>
		</div>
	</div>
</div>

{literal}
<script type="text/javascript">
$(document).ready(function(){
	  timeout = '5000'; 
	  window.onload = setInterval(refresh_box, timeout); 
	  function refresh_box() {
	  		window.location.href = jssitebaseUrl+'/onboarding.php';
		}
	});
		
</script>
{/literal}