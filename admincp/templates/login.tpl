<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Admin Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="css/admin_login.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="css/bootstrap-responsive.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	{literal}
		<script type="text/javascript">
		function loginValidate(){
			
			var admin_username = $("#admin_username").val();
			var admin_password = $("#admin_password").val();
			
			if(admin_username == ''){
				$("#error_msg").html("Please enter the UserName");
				$("#admin_username").focus();
				return false;
			}else if(admin_password == ''){
				$("#error_msg").html("Please enter the Password");
				$("#admin_password").focus();
				return false;
			}else{
				$.post('adminAjaxFile.php',{"admin_username":admin_username,"admin_password":admin_password,"action":"checkAdminLogin"},function(response){
					
					if(response == "Invalid_Login")
					{
						$("#error_msg").html("Invalid Login");
						return false;
					}
					else if(response == " Your Credentials is expired.Please Upgrade the account to Login."){
						$("#error_msg").html(" Your Credentials is expired.Please Upgrade the account to Login.");
						return false;
					}else{
						window.location.href = "index.php";
					}
				});
				return false;
			}
		}
		</script>
	{/literal}
</head>
<body class="loginBg">
	<div class="wrapperOut clearfix">
		<div class="contbg">
			<div class="loginHead">
				{$LANG.admin_user_login}
			</div>
			<form name="loginfrm" method="post" onsubmit="return loginValidate();">
				<div class="loginFormInner clearfix">
					<div id="error_msg" class="errorMsg"></div>
					<div class="inptdv">
						<div class="txtbxOuter">
							<input class="txtbxuser txtbxreset" type="text" name="admin_username" id="admin_username" value="" placeholder="User Name" />
							<script>document.loginfrm.admin_username.focus();</script>
						</div>
					</div>
					<div class="inptdv">
						<div class="txtbxOuter">
							<input class="txtbxpass txtbxreset" type="password" name="admin_password" id="admin_password" value="" placeholder="Password" />
						</div>
					</div>
					<div class="clearfix">
						<input type="submit" name="submit" value="LOGIN" class="login" />
					</div>
				</div>
			</form>
		</div>
		<div class="loginshadow"></div>
	</div>
</body>
</html>