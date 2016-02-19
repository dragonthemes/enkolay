<?php /* Smarty version 2.6.3, created on 2015-12-09 15:03:16
         compiled from resetPass.tpl */ ?>
<div class="container">
	<div class="forgotHead"><?php if ($_GET['forgot'] == ''): ?>
			<?php echo $this->_tpl_vars['LANG']['password_reset']; ?>

		<?php else: ?>
			 <?php echo $this->_tpl_vars['LANG']['password_forgot']; ?>

		<?php endif; ?>
    </div>
	<div class="resetContainer">
		<form name="resetform" id="resetform" class="no-mar" method="post" onsubmit="return resetVal();">
			<input type="hidden" name="user_id" id="user_id" value="<?php if ($_SESSION['reset_user_id']):  echo $_SESSION['reset_user_id'];  else:  echo $_SESSION['user_id'];  endif; ?>">
			<input type="hidden" name="forgot" id="forgot" value="<?php echo $_GET['forgot']; ?>
">
			<div class="dc">
				<div class="resetpasswordImg"></div>
			</div>
			<div class="clr"></div>
			<?php if ($_GET['forgot'] == ''): ?>
			<div class="cont"><?php echo $this->_tpl_vars['LANG']['password_to_reclaim']; ?>
</div>
			<?php else: ?>
			<div class="cont"><?php echo $this->_tpl_vars['LANG']['password_email_belw']; ?>
</div>
			<?php endif; ?>	
			<div class="resetInner form">
				<label><?php echo $this->_tpl_vars['LANG']['password_email']; ?>
</label>
				<div id="errormsg"></div>
				<input type="text" name="reset_email" id="reset_email" value="">
				<div class="clr"></div>
				<input type="submit" class="submitButton" name="reset" id="reset" value="Sıfırla">
				<input  type="button" name="cancel" class="cancelButton" id="cancel" value="Vazgeç" onclick="return changePage();">
			</div>
		</form>
	</div>
</div>