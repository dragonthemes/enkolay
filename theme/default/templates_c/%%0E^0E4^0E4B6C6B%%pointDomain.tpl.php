<?php /* Smarty version 2.6.3, created on 2015-12-11 02:22:57
         compiled from pointDomain.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'pointDomain.tpl', 6, false),)), $this); ?>
<h2>Please enter the doamin name you have purchased from another register</h2>
<div class="pointDomain">
	<?php if (count($this->_tpl_vars['pointdomaindetails']) > 0): ?>                            
		<div class="marTop10 currentDomainOuter"> 
			<div class="currentDomainHead"><?php echo $this->_tpl_vars['LANG']['admin_current_point_dom']; ?>
</div>
			<div class="currentDomainList">
				<?php echo $this->_tpl_vars['pointdomaindetails']['0']['point_domain']; ?>

				<span class="currentDomainListClose" onclick="deletePointDomain(<?php echo $this->_tpl_vars['pointdomaindetails']['0']['point_id']; ?>
,<?php echo $this->_tpl_vars['pointdomaindetails']['0']['domain_id']; ?>
)">Delete</span>
			</div>
		</div>
	<?php else: ?>
					<div class="subdomainRight bgNongRight marTop20">
				<input type="hidden" name="domain_id" id="domain_id" value="<?php echo $_GET['domain_id']; ?>
">
				<input type="text"  id="edit_point_domain_name" name="edit_point_domain_name" class="textAreaBoxInputs" value="<?php if ($this->_tpl_vars['domainval']['0']['domain_type'] == 'PD'):  echo $this->_tpl_vars['domainval']['0']['subdomainurl'];  endif; ?>" placeholder="">
				<input type="button" class="vpb_button" value="Assign" onclick="AddSubDomainInSettings();" >                
			</div>
            <div id="err_msg"></div>
		<?php endif; ?>    
</div>

<div class="domainChangeTwo pointdomainpopup">
	<div class="domainOuterHead">
		<img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Www.png" alt="domain" title="domain" />
		<div>Choose Your Website Domain</div>
	</div>
	<div class="clearfix">
		<div class="chooseDomainPop">
			<div class="chooseDomainInner chooseDomainInnerSec">
				<div class="para">To set up your domain with <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
, your domain's DNS settings need to be updated.</div>
				<div class="option"><b>Option A:</b> Email instructions to your domain registrar</div>
				<div class="inst">Send these instructions to your domain registrar (ex. GoDaddy, 1and1, Yahoo, etc.)</div>
				<div class="chooseDomainPopTxtarea">
					<p>Hello, I have purchased my domain <span id="youdomainurl_set"></span>.  I have built my website on <?php echo $this->_tpl_vars['SITE_MAIN_DOMAIN']; ?>
.  I need you to point my domain to the following IP: <?php echo $_SERVER['SERVER_ADDR']; ?>
</p>								
					<p>This is done by changing my domain's A-Records. I am not requesting that you transfer my domain, redirect my domain, or change my name servers.  I want to remain with you as my domain registrar.</p>
				</div>
				<div class="option"><b>Option B:</b> Make the DNS changes yourself see instructions </div>
				<div class="para">Once the DNS changes are made, it may take up to 48 hours (although usually less) for the changes to propagate through the Internet</div>
				<div class="dc">
					<input type="button" class="subdomainInput" value="<?php echo $this->_tpl_vars['LANG']['domain_continue']; ?>
" onclick="redirectnew();"/>
				</div>
			</div>            
		</div>
	</div>
</div>