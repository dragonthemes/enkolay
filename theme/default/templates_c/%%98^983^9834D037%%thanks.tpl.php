<?php /* Smarty version 2.6.3, created on 2016-01-08 13:34:36
         compiled from thanks.tpl */ ?>
<div class="row-fluid">
	<div class="marTop75">
		<div class="container">
			<div class="usrHomeInner">
				<span style="color:red;margin-left:230px;"><?php echo $this->_tpl_vars['successmsg']; ?>
</span>
				<div class="thanksMsg">
					<div class="thanksMsgTxt"><?php echo $this->_tpl_vars['LANG']['thanks_for_thanks_tpl']; ?>
</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '
<script type="text/javascript">
$(document).ready(function(){
	  timeout = \'5000\'; 
	  window.onload = setInterval(refresh_box, timeout); 
	  function refresh_box() {
	  		window.location.href = jssitebaseUrl+\'/onboarding.php\';
		}
	});
		
</script>
'; ?>