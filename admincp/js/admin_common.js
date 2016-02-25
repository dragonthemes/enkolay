//------------------------------------------------------------------------------
						//Jquery Tab
//------------------------------------------------------------------------------
	


//--------------------------------------- Change Password -----------------------------------------------
//ChangePassword
function changepassword()
{
	$("#errormsg").removeClass('successmsg');
	var old_password = $.trim($("#old_password").val());
	var new_password = $.trim($("#new_password").val());
	var con_password = $.trim($("#confirmed_password").val());
		
	if(old_password == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Old Password");
		$("#old_password").focus();
		return false;
	}
	else if(new_password == ''){
		$("#errormsg").addClass('errormsg').html("Please enter New Password");
		$("#new_password").focus();
		return false;
	}
	else if(con_password == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Confirm Password");
		$("#confirmed_password").focus();
		return false;		
	}
	else if(old_password == new_password){
		$("#errormsg").addClass('errormsg').html("Old Password and New Password should not be Same");
		$("#old_password").focus();
		return false;
	}
	else if(new_password != con_password){
		$("#errormsg").addClass('errormsg').html("New Password and Confirm Password should be Same");
		$("#new_password").focus();
		return false;
	}
	else{		
		$.post('adminAjaxFile.php',{"old_password":old_password,"new_password":new_password,"action":"checkChangePassword"},function(response){
			if(response == "Invalid_Old_Pwd")
			{
				$("#errormsg").addClass('errormsg').html("Invalid Old Password");
				return false;
			}
			else
			{
				$("#errormsg").removeClass('errormsg');
				$("#errormsg").addClass('successmsg').html("Password has been Updated Successfully");
				$("#old_password").val('');
				$("#new_password").val('');
				$("#confirmed_password").val('');
			} 
		});
		return false;
	}
}

//--------------------------------------- Site Settings -----------------------------------------------
//site seeting
function siteSeetingValidation()
{
	$("#errormsg").removeClass('successmsg');
	var admin_name      = $.trim($("#admin_name").val());
	var invites_url     = $.trim($("#invites_url").val());
    var facebook_api    = $.trim($("#facebook_api").val());
	var page_subs_count = $.trim($("#page_subs_count").val());
	var admin_email     = $.trim($("#admin_email").val());
	var admin_phone     = $.trim($("#admin_phone").val());
	var site_name       = $.trim($("#sitename").val());
	var image_name      = $.trim($("#sitelogo").val());
	var page_user_side  = $.trim($("#user_page").val());
	var page_admin_side = $.trim($("#admin_page").val());
    var host_name       = $.trim($("#host_name").val());
    var port_address    = $.trim($("#port_address").val());
    var smtp_email      = $.trim($("#smtp_email").val());
    var smtp_password   = $.trim($("#smtp_password").val());
    var reg_live        = $.trim($("#reg_live").val());
    var reg_test        = $.trim($("#reg_test").val());
    
    var letters     	= /^[0-9]+$/;
    
	
	if(admin_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Admin Name");
		$("#admin_name").focus();
		return false;
	}

	if(admin_email == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Admin Email Id");
		$("#admin_email").focus();
		return false;
	}
	if(admin_phone == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Admin Phone no");
		$("#admin_phone").focus();
		return false;
	}
	
	
	var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
	var valid = emailRegex.test(admin_email);
	if(!valid){
		$("#errormsg").addClass('errormsg').html("Please Enter the Valid Email Id");
		$("#admin_email").focus();
		return false;
	}		
	if(site_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Site Name");
		$("#sitename").focus();
		return false;
	}
	if(invites_url == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Invites url");
		$("#invites_url").focus();
		return false;
	}
    if(facebook_api == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Facebook api Id");
		$("#facebook_api").focus();
		return false;
	}
	if(page_subs_count == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Subscription Page Count");
		$("#page_subs_count").focus();
		return false;
	}
	if(image_name != ''){	
		var ext = $('#sitelogo').val().split('.').pop().toLowerCase();
		
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
			 {$("#errormsg").addClass('errormsg').html("Please Select the Valid Image Type");
				$("#sitelogo").focus();
				return false;
			 }				
	}
	if(page_user_side == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter the Page in User Side");
		$("#user_page").focus();
		return false;
	}
    if(host_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter host name");
		$("#host_name").focus();
		return false;
	}
    if(port_address == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter port address");
		$("#port_address").focus();
		return false;
	}
    if(!(port_address.match(letters))){
			$("#errormsg").addClass('errormsg').html("port address must be Numeric");
			$("#port_address").focus();
			return false;
			}
   if(smtp_email == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter SMTP Email Address");
		$("#smtp_email").focus();
		return false;
	}
    var valid_smtp = emailRegex.test(smtp_email);
	if(!valid_smtp){
		$("#errormsg").addClass('errormsg').html("Please Enter the Valid  SMTP Email Id");
		$("#smtp_email").focus();
		return false;
	}
    if(smtp_password == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter SMTP Password");
		$("#smtp_password").focus();
		return false;
	}
    if(reg_live == 'Live')
    {
        var reg_url_live        = $.trim($("#reg_url_live").val());
        var reg_gui_live        = $.trim($("#reg_gui_live").val());
        if(reg_url_live == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Register URL");
    		$("#reg_url_live").focus();
    		return false;
        }
        if(reg_gui_live == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Register GUI");
    		$("#reg_gui_live").focus();
    		return false;
        }
        
    }
    if(reg_test == 'Test')
    {
        var reg_url_test        = $.trim($("#reg_url_test").val());
        var reg_gui_test        = $.trim($("#reg_gui_test").val());
        if(reg_url_test == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Register URL");
    		$("#reg_url_test").focus();
    		return false;
        }
        if(reg_gui_test == ''){
            $("#errormsg").addClass('errormsg').html("Please Enter Register GUI");
    		$("#reg_gui_test").focus();
    		return false;
        }
        
    }	
	
	
}
//--------------------------------------- Icon Settings -----------------------------------------------
//icon Setting validation
	function iconSettingValidation()
	{
		$("#errormsg").removeClass('successmsg');
        var error=0;
        $(".textbox").each(function(){
            
            if($(this).val()=="" || $(this).val()=='0')
            {
                $(this).attr("placeholder");
                $("#errormsg").html("Please enter "+$(this).attr("placeholder"));
                error=1;
                $(this).focus();
                return false;
            }
            else
            {
                error=0;
            }
          
        });
		if(error==1)
        {
            return false;
        }
        else
        {
            return true;
        }
		
	}


/*************************** Common Method**********************************************/
//Select & Deselect All
function selectDeselectAll(){
	 
		var selectallvar = $('#selectall').is(':checked');
		if(selectallvar == true){
			$(".case").attr("checked", "checked");
		}else{
			$(".case").removeAttr("checked");
		}
			
		var checkedvar = $('.case').is(':checked');
		 
		if(checkedvar == true){
			$('.but_activate').show();
			$('.but_deactivate').show();
			$('.but_delete').show();
			$('.send_mail').show();
		}else{
			$('.but_activate').hide();
			$('.but_deactivate').hide();
			$('.but_delete').hide();
			$('.send_mail').hide();
		}
}

//Individual Select
function individualSelect(){
		if($(".case").length == $(".case:checked").length) {
			
	        $("#selectall").attr("checked", "checked");
	        
	        $('.but_activate').show();
			$('.but_deactivate').show();
			$('.but_delete').show();
			$('.send_mail').show();
	    } else {
	        $("#selectall").removeAttr("checked");
	        
	        if($(".case:checked").length > 0){
				$('.but_activate').show();
				$('.but_deactivate').show();
				$('.but_delete').show();
				$('.send_mail').show();
			}else{
				$('.but_activate').hide();
				$('.but_deactivate').hide();
				$('.but_delete').hide();
				$('.send_mail').hide();
			}
	    }
}
function cancel(){
    
    //var	index ='{$SITE_BASEURL}/admincp/index.php';
    document.getElementById("#cancelbut").innerHTML = xmlhttp.responseText;
    //window.location.href = "index.php" ;
}
//Show Per Page Menu
function showPerPage(limit,filename){
	
	if(limit != '')
	{
		window.location.href = filename+'?limit='+limit;
		return false;
	}
}
function showPerPagefield(limit,filename,sortby,field){
	
	if(field != '')
	{
		window.location.href = filename+'?limit='+limit+'&'+field;
		return false;
	}
}
//Show per page Sub Menu
function showPerPageSubMenu(limit,filename,mainmenu_id){
	
	if(limit != '')
	{
		window.location.href = filename+'?limit='+limit+'&mainmenuid='+mainmenu_id;
		return false;
	}
}

//Show Per Page Others
function ShowPerDisplayOthers(limit,filename,O){
	if(limit != '' && O != '')
	{
		window.location.href = filename+'?limit='+limit+'&display_type='+O;
		return false;
	}
	
}
//Activate, Deactivate and Delete
function adminActivateDeactivate(changestatusval,fieldname,whereField,tablename,word,filetype){
 //alert(changestatusval)
    var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == '1' || changestatusval == '2'){
			var str = 'Are you sure want to Activate?';
		}else if(changestatusval == '0' ){
			var str = 'Are you sure want to Deactivate?';
		}else if(changestatusval == 'delete'){
			var str = 'Are you sure want to Delete?';
		}else if(changestatusval == 'Paid'){
			var str = 'Are you sure want to Paid?';
		}else if(changestatusval == 'UnPaid'){
			var str = 'Are you sure want to UnPaid?';
		}else if(changestatusval == 'publish'){
			var str = 'Are you sure want to Publish?';
		}else if(changestatusval == 'unpublish'){
			var str = 'Are you sure want to Unpublish?';
		}
    	if(confirm(str)){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
			    //alert(checkedvalues);
			    if(changestatusval == 'delete'){
			    	$.post("adminAjaxFile.php", { 'whereField':whereField, 'tablename':tablename, 'filetype':filetype, 'checkedvaluesarr[]': checkedvalues, 'action':'deleteProcess' },function(response){
			    		//alert(response);
				       	if(response == 'success'){
				       		var filename = $(location).attr('href');
							$('body').load(filename, function() {});
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' deleted successfully');
						}else{
							alert("error");return false;
						} 
	                });
	            }else if(changestatusval == '1' || changestatusval == '0' || changestatusval == '2' || changestatusval == 'Paid' || changestatusval == 'UnPaid' || changestatusval == 'publish' || changestatusval == 'unpublish'){
	            	 
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues, 'action':'changeStatus' },function(response){
						//alert(response)
				    	if(response == 'success'){
				    		//alert(response)
				    		var filename = $(location).attr('href');
				    		//alert(filename)
							//$('body').load(filename, function(){
								
								if(changestatusval == '1' || changestatusval == '2' )
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
								else if(changestatusval == '0' )
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
								else if(changestatusval == 'Paid')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' Paid successfully');
								else if(changestatusval == 'UnPaid')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' UnPaid successfully');
								else if(changestatusval == 'publish')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' Publish successfully');
								else if(changestatusval == 'unpublish')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' UnPublish successfully');
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							//});
						}else{
							alert("error");return false;
						} 
                	});
				}
		}
	}else{
		alert("Please select anyone record then proceed.");
	}
}

//this is for send mail to users
function sendMailToUsers(changestatusval,fieldname,whereField,tablename,word,filetype){

    var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == '1'){
			var str = 'Are you sure want to Send?';
		} 
    	if(confirm(str)){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
			    //alert(checkedvalues);
	    if(changestatusval == '1'){
	            	
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues, 'action':'changeMailStatus' },function(response){
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
							$('body').load(filename, function(){
								  if(changestatusval == '1')
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' Send Mail successfully');
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}
		}
	}else{
		alert("Please select anyone record then proceed.");
	}
}

//Change Status
function changeStatus(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype){
	//alert(changestatusval);
	if(maincateid != '' && changestatusval != '')
	{
		if(changestatusval == 'delete' ){			
			if(confirm('Are you sure want to delete?')){
				$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, "filetype":filetype, 'action':'deleteProcess'  },function(response){
				//alert(response);	
					if(response == "success"){		
							
						$("#deletecate"+maincateid).hide();
						var filename = $(location).attr('href');
						$('body').load(filename, function() {
							$("#errormsg").addClass('successmsglist').html('Selected '+word+' deleted successfully');
						});	
						return false;
					}else{
						alert("error");return false;
					}
				});return false;
			}
		}
		else if(changestatusval == '0' || changestatusval == '1' || changestatusval == '2' ){
			$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid': maincateid, 'action':'changeStatus'},function(response){
				
				if(response == 'success'){
					var filename = $(location).attr('href');
					$('body').load(filename, function(){
						if(word == 'Users'){
							if(changestatusval == '1'){
								$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed to pending successfully');
							}
							else if(changestatusval == '0'){
								$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
							}
							else if(changestatusval == '2'){
								$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
							}
							else
								$("#errormsg").addClass('errormsglist').html('Error');
						}else{
							if(changestatusval == '1'){
								$("#errormsg").addClass('successmsglist').html('Selected '+word+' activated successfully');
							}
							else if(changestatusval == '0'){
								$("#errormsg").addClass('successmsglist').html('Selected '+word+' deactivated successfully');
							}else
								$("#errormsg").addClass('errormsglist').html('Error');
						}
					});					
				}else{
					alert("error");return false;
				}
			});
			return false;
		}else if(changestatusval == 'Yes' || changestatusval == 'No'){
	            	//Popular & Normal
	            	/*if(word == 'listing'){
						var action = 'changeFeatured';
					}else{
						var action = 'changeFollowersHeader';
					}*/					
					
	            	$.post("adminAjaxFile.php", {'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid':maincateid, 'action':'changeLangStat'},function(response){						
						
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
						//	$('body').load(filename, function() {
								if(fieldname == 'lang_site'){
									if(changestatusval == 'Yes'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed to site language successfully');
									}else if(changestatusval == 'No'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed to normal language successfully');
									}
								}
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							//});
						}else{
							alert("error");return false;
						} 
                	});
				}else if(changestatusval == 'publish' || changestatusval == 'unpublish'){
	            	//Popular & Normal
	            	/*if(word == 'listing'){
						var action = 'changeFeatured';
					}else{
						var action = 'changeFollowersHeader';
					}*/					
					
	            	$.post("adminAjaxFile.php", {'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid':maincateid, 'action':'changeStatus'},function(response){						
						
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
							//$('body').load(filename, function() {
								if(fieldname == 'status'){
									if(changestatusval == 'publish'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' Published successfully');
									}else if(changestatusval == 'unpublish'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' UnPublished successfully');
									}
								}
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							//});
						}else{
							alert("error");return false;
						} 
                	});
				}else if(changestatusval == 'pointed' || changestatusval == 'unpointed'){
	            	//Popular & Normal
	            	/*if(word == 'listing'){
						var action = 'changeFeatured';
					}else{
						var action = 'changeFollowersHeader';
					}*/					
					
	            	$.post("adminAjaxFile.php", {'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid':maincateid, 'action':'changeStatus'},function(response){						
						
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
							//$('body').load(filename, function() {
								if(fieldname == 'status'){
									if(changestatusval == 'pointed'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' pointed successfully');
									}else if(changestatusval == 'unpointed'){
										$("#errormsg").addClass('successmsglist').html('Selected '+word+' Unpointed successfully');
									}
								}
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							//});
						}else{
							alert("error");return false;
						} 
                	});
				}
		else{
			alert("Error occured");
		}
	}	
}
//--------------------------------------change profile---------------------------------------------------------------------------------------
function changeprofile()
{
	$("#errormsg").removeClass('successmsg');
	var username = $.trim($("#username").val());
	var email = $.trim($("#email").val());
	 
	if(username == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Username");
		$("#username").focus();
		return false;
	}
	else if(email == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Email address");
		$("#email").focus();
		return false;
	}
	var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
	var valid = emailRegex.test(email);
	if(!valid){
		$("#errormsg").addClass('errormsg').html("Please Enter the Valid Email Id");
		$("#email").focus();
		return false;
	}
 
	 
	else{		
		$.post('adminAjaxFile.php',{"username":username,"email":email,"action":"editprofile"},function(response){
		//alert(response)
			if(response == "Username_already_exists")
			{
				$("#errormsg").addClass('errormsg').html("Username already exists");
				return false;
			}
			else if(response == "Email_already_exists")
			{
				$("#errormsg").addClass('errormsg').html("Email already exists");
				return false;
			}
			else
			{
				$("#errormsg").removeClass('errormsg');
				$("#errormsg").addClass('successmsg').html("Profile Updated Successfully");
			//	$("#username").val('');
				//$("#email").val('');
				 
			} 
		});
		return false;
	}
}

//------------------------------------------change profile end---------------------------------------------------------------------------------------------
//Change Language Status
//Change Status
function changeLangStatus(changestatusval,fieldname,whereField,tablename,word,maincateid,filetype){
	
	if(maincateid != '' && changestatusval != '')
			 {
		       	$.post("adminAjaxFile.php", {'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'maincateid':maincateid, 'action':'changeLangStat'},function(response){						
						
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
							$('body').load(filename, function() {
								if(fieldname == 'lang_code'){
									$("#errormsg").addClass('successmsglist').html('Selected '+word+' changed successfully');
								}
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}
		else{
			alert("Error occured");
		}
}

	//----------------------------------------------------------------------------------------------------
//-------------------------------Language Management--------------------------------------------------
//Add New Language Name
	function addNewLanguage(){
			
		var languagename    = $.trim($("#languagename").val());
		var languagecode   	= $.trim($("#languagecode").val());
		var letters     	= /^[A-Za-z]+$/;
		var nameRegex 		= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		if(languagename == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the Language Name");
			$("#languagename").focus();
			return false;
		}				
		/*else if(!languagename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("Language Name must be alphabates");
			$("#languagename").focus();
			return false;
		}*/
				
		if(languagecode == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the Language Code");
			$("#languagecode").focus();
			return false;
		}
		if(!(languagecode.match(letters))){
			$("#errormsg").addClass('errormsg').html("Language Code must be Alphabates");
			$("#languagecode").focus();
			return false;
			}
		/*if(!(statename.match(letters))){
			$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
			$("#statename").focus();
			return false;
		}*/	
		if(languagename != '' && languagecode != ''){		
			$.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"action":"checkAddLanguageName"},function(response){			
				//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Language Name and Language Code Already Exist");
					$("#languagename").focus();
					return false;
				}else if(response == "insert"){
					window.location.href = "languageManageAdmin.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
			}
	}
	//Edit Language
	function editLanguage(){
		
		var languagename    = $.trim($("#languagename").val());
		var languagecode   	= $.trim($("#languagecode").val());
		var lang_id			= $.trim($("#langid").val());
		var filedata		= $.trim($("#langfile").val());
		var letters     	= /^[A-Za-z]+$/;
		var nameRegex 		= /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
		
		if(languagename == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the Language Name");
			$("#languagename").focus();
			return false;
		}				
		/*else if(!languagename.match(nameRegex)) {
			$("#errormsg").addClass('errormsg').html("Language Name must be alphabates");
			$("#languagename").focus();
			return false;
		}*/
				
		if(languagecode == ''){
			$("#errormsg").addClass('errormsg').html("Please enter the Language Code");
			$("#languagecode").focus();
			return false;
		}
		if(!(languagecode.match(letters))){
			$("#errormsg").addClass('errormsg').html("Language Code must be Alphabates");
			$("#languagecode").focus();
			return false;
			}
		/*if(!(statename.match(letters))){
			$("#errormsg").addClass('errormsg').html("State Name must be Alphabates");
			$("#statename").focus();
			return false;
		}*/	
		if(languagename != '' && languagecode != ''){		
			$.post('adminAjaxFile.php',{"languagename":languagename,"languagecode":languagecode,"filedata":filedata,"lang_id":lang_id,"action":"checkEditLanguageName"},function(response){			
				//alert(response);
				if(response == "exist"){
					$("#errormsg").addClass('errormsg').html("Language Name and Language Code Already Exist");
					$("#languagename").focus();
					return false;
				}else if(response == "update"){
					window.location.href = "languageManageAdmin.php";
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			});
			return false;
		}
	}
	
	function loadselectLangFile(lfile,langid,langcode){
		window.location.href = "languageAddEdit.php?langid="+langid+"&langcode="+langcode+"&lfile="+lfile;
	}
	
	function updateselectLangFile(){
		
		var langid    			= $.trim($("#langid").val());
		var lfile   			= $.trim($("#lfile").val());
		var lang_file_name    	= $.trim($("#lang_file_name").val());
		var langfilecontent   	= $.trim($("#langfilecontent").val());
		
		$.post('adminAjaxFile.php',{"langid":langid,"lfile":lfile,"langfilecontent":langfilecontent,"lang_file_name":lang_file_name,"action":"LanguageFilesListEdit"},function(response){
				//alert(response);
				if(response == "success"){
					$("#errormsg").addClass('successmsg').html(lfile+" updated successfully");
					return false;
				}else{
					$("#errormsg").addClass('errormsg').html("Error occured");
					return false;
				}
			return false;
		});
		return false;
	}
	
//--------------------------------------- Filter -----------------------------------------------
//Display filter option
function filterOptShowHide(){
	$("#searchkey").toggle();	 
	$("#export").hide();
	$("#import").hide(); 
}
//Filter validation
function filterValidation(){
	var keyword = $.trim($("#keyword").val());
	
	if(keyword == ''){
		//$("#errormsg").addClass('errormsg').html("Please Enter the Keyword");
		alert("Please Enter the Keyword");
		$("#keyword").focus();
		return false;
	}
}

//Clear Filter Text Box
function clearFilterTxtBox(){
	$("#keyword").val('');
	return false;
}

//validatePrice:
function validatePrice(){			
	var price_name		    =	$("#price_name").val();
	var price_description	=	$("#price_description").val();
	var price	=	$("#price").val();
    //var days    =   $("#days").val();
	
	if(price_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Price Name");
		$("#price_name").focus();
		return false;
	}
	if(price_description == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Price Description");
		$("#price_description").focus();
		return false;
	}
	if(price == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Price Value");
		$("#price").focus();
		return false;
	}
	else
		{
			if(isNaN(price))
				{
					$("#errormsg").addClass('errormsg').html("Please Enter Price Value in Numeric");
					$("#price").focus();
					return false;
				}
		}
	/*	if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}*/
         /*   if(days == ''){
        		$("#errormsg").addClass('errormsg').html("Please Enter Number of days");
        		$("#days").focus();
        		return false;
        	}*/
	return true;
}	

function Imageshow()	
		{
			$("#currrency_image").show();
			$("#currency_symbol").hide(); 
			
		}
	//this for hide div when mouse out
function symbolshow()	
		{
			$("#currency_symbol").show(); 
			$("#currrency_image").hide();
		}
function validateCurrency(){			
	var currency_name		=	$("#currency_name").val();
	var currency_code	    =	$("#currency_code").val();
	var symbol	    =	$("#symbol").val();
	var image	    =	$("#image").val();
	if(currency_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Currency Name");
		$("#currency_name").focus();
		return false;
	}
	if(currency_type == ''){
		$("#errormsg").addClass('errormsg').html("Please Select Currency Type");
		$("#currency_type").focus();
		return false;
	}

	/*if(image == ''){
		$("#errormsg").addClass('errormsg').html("Please Choose Currency Image");
		$("#image").focus();
		return false;
	}*/
	
	if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}
	return true;
}




//validateTheme
function validateTheme(action){			
	var theme_name		    =	$("#theme_name").val();
    var lower     	        = /^[a-z0-9-]+$/;
	var theme_description	=	$("#theme_description").val();
	var theme_image	        =	$("#theme_image").val();
	
	if(theme_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Theme Name");
		$("#price_name").focus();
		return false;
	}
    if(!(theme_name.match(lower))){
			$("#errormsg").addClass('errormsg').html("Theme name must be in lower case");
			$("#theme_name").focus();
			return false;
			}
	if(theme_description == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Theme Description");
		$("#price_description").focus();
		return false;
	}
	if(action == 'Add'){
		if(!theme_image){
			$("#errormsg").addClass('errormsg').html("Please choose  Theme image");
			$("#theme_image").focus();
			return false;
		}
	}
	if(theme_image && !/(\.(gif|jpg|jpeg|bmp|png))$/i.test(theme_image)){
       $("#errormsg").addClass('errormsg').html("Please enter Valid Image Type");
       $("#theme_image").focus();
       return false;
    }	
		if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}	
	return true;
}	
//for check theme name while space 
function checkthemeName()
    {
        var name = $('#theme_name').val();
        if(name.match(/\ /))
    		{
    			var nospaceval = name.replace(/ /g,'');
    			$("#theme_name").val(nospaceval);
    			$("#theme_name").focus();
    			return false;
    		}
    /*	if(name.match(/\_/))
    		{
    			var nospaceval = name.replace(/_/g,'');
    			$("#theme_name").val(nospaceval);
    			$("#theme_name").focus();
    			return false;
    		} */
    }
//for check blog name while space 
function checkblogName()
    {
        var name = $('#blog_name').val();
        if(name.match(/\ /))
    		{
    			var nospaceval = name.replace(/ /g,'');
    			$("#blog_name").val(nospaceval);
    			$("#blog_name").focus();
    			return false;
    		}
   
    }

//validate blog
function validateBlog(action){			
	var blog_name		    =	$("#blog_name").val();
	var blog_description	=	$("#blog_description").val();
    var lower     	        = /^[a-z0-9-]+$/;
	var blog_image	        =	$("#blog_image").val();
	
	if(blog_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Blog Name");
		$("#blog_name").focus();
		return false;
	}
    if(!(blog_name.match(lower))){
			$("#errormsg").addClass('errormsg').html("Blog name must be in lower case");
			$("#blog_name").focus();
			return false;
			}
	if(blog_description == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Blog Description");
		$("#blog_description").focus();
		return false;
	}
	if(action == ''){
		if(!blog_image){
			$("#errormsg").addClass('errormsg').html("Please Choose  Blog image");
			$("#blog_image").focus();
			return false;
		}
	}
	if(blog_image && !/(\.(gif|jpg|jpeg|bmp|png))$/i.test(blog_image)){
       $("#errormsg").addClass('errormsg').html("Please enter Valid Image Type");
       $("#blog_image").focus();
       return false;
    }	
		if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}	
	return true;
}

//validate usermanage
function validateProperty(){
		
		var username	=   $.trim($("#username").val());
		var email	=   $.trim($("#email").val());
		var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
		
		if(username == ""){
			$("#errormsg").addClass('errormsg').html("Please enter User Name");
			$("#username").focus();
			return false;
		}
		if(email == ""){
			$("#errormsg").addClass('errormsg').html("Please Enter Email");
			$("#email").focus();
			return false;
		}
		if(!email.match(email_check)){
			$("#errormsg").addClass('errormsg').html("Please enter Valid Email");
			$("#email").focus();
			return false;
		}
	}
	
//this is for validate font page

function validateFont()
	{
		//alert("hi")
		var fontname	    =   $.trim($("#font_name").val());
		var status_active	=   $.trim($("#status_active").val());
		var status_inactive	=   $.trim($("#status_inactive").val());
		//var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
		
		if(fontname == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Font Name");
			$("#fontname").focus();
			return false;
		}
		if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}
	 
	}
 //this is for validate static page add 
 
 function addNewStatic()
 	{
 	 	var content_name        = $.trim($("#content_name").val());
		
		if(content_name == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Content Name");
			$("#content_name").focus();
			$(".restaurantTab a").removeClass("active");
			$(".restaurantTabContent").hide();
			$("#contactinfo").addClass("active");
			$("#contactinfo_content").show();
			return false;
		}
	}
// this page for edit static page management

 function editStatic()
 	{
		var content_name        = $.trim($("#content_name").val());
		var conid				= $.trim($("#conid").val());
		if(content_name == ''){
			$("#errormsg").addClass('errormsg').html("Please enter Content Name");
			$("#content_name").focus();
			$(".restaurantTab a").removeClass("active");
			$(".restaurantTabContent").hide();
			$("#contactinfo").addClass("active");
			$("#contactinfo_content").show();
			return false;
		}
		 
	}	
	
// this function for edit contact form in admin side
function validateContact()
	{
		var mail_to	    =   $.trim($("#mail_to").val());
        var text1	    =   $.trim($("#text1").val());
        var text2	    =   $.trim($("#text2").val());
        var text3	    =   $.trim($("#text3").val());
        var text4	    =   $.trim($("#text4").val());
        var text5	    =   $.trim($("#text5").val());
	    var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
		
		if(mail_to == ""){
			$("#errormsg").addClass('errormsg').html("Please enter mail id");
			$("#mail_to").focus();
			return false;
		}
         if(!(mail_to.match(email_check))){
			$("#errormsg").addClass('errormsg').html("Please enter valid Email address");
			$("#mail_to").focus();
			return false;
			}
		
        	if(text1 == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Label");
			$("#text1").focus();
			return false;
		}
        	if(text2 == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Labe2");
			$("#text2").focus();
			return false;
		}
        	if(text3 == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Labe3");
			$("#text3").focus();
			return false;
		}
        	if(text4 == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Labe4");
			$("#text4").focus();
			return false;
		}	if(text5 == ""){
			$("#errormsg").addClass('errormsg').html("Please enter Labe5");
			$("#text5").focus();
			return false;
		}
	   
	}
//this function for validate fans page management
function addFans()
	{
		var fans_name	    =   $.trim($("#fans_name").val());
		var fans_url	    =   $.trim($("#fans_url").val());
	    //var webRegExp = new RegExp("^(ftp|https?):\/\/(www\.)?[a-z0-9\-\.]{3,}\.[a-z]{2}$");
        var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
	    	
		if(fans_name == ""){
			$("#errormsg").addClass('errormsg').html("Please enter fans name");
			$("#fans_name").focus();
			return false;
		}
	 	if(fans_url == ""){
			$("#errormsg").addClass('errormsg').html("Please enter fans url");
			$("#fans_url").focus();
			return false;
		}
	/*	if(fans_url != ""){
		if(webRegExp.test(fans_url) == false){
			$("#errormsg").addClass('errormsg').html("Please enter Valid URL Address");
			$("#fans_url").focus();
		    return false;
		}
	} */
        if(myRegExp.test(fans_url) == false){
			$("#errormsg").addClass('errormsg').html("Please enter Valid URL Address");
			$("#fans_url").focus();
		    return false;
		}
	}
//this functon used to validate background management
function validateBackground(action)
	{
		var background_name		        =	$("#background_name").val();
	 	var background_image	        =	$("#background_image").val();
	
	if(background_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter background Name");
		$("#background_name").focus();
		return false;
	}
	if(action == 'Add'){
		if(!background_image){
			$("#errormsg").addClass('errormsg').html("Please Choose  Background image");
			$("#background_image").focus();
			return false;
		}
	}
	if(background_image && !/(\.(gif|jpg|jpeg|bmp|png))$/i.test(background_image)){
       $("#errormsg").addClass('errormsg').html("Please enter Valid Image Type");
       $("#background_image").focus();
       return false;
    }	
	return true;
	}
//this function for validate banner page(photo pages)
function validateBanner(action)
	{
		var banner_name		=	$("#banner_name").val();
		var banner_title	=	$("#banner_title").val();
		var banner_image	=	$("#banner_image").val();
		
		if(banner_name == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter Banner Name");
			$("#banner_name").focus();
			return false;
		}
		if(banner_title == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter Banner Description");
			$("#banner_title").focus();
			return false;
		}
		if(action == 'Add'){
			if(!banner_image){
				$("#errormsg").addClass('errormsg').html("Please Choose  Banner image");
				$("#banner_image").focus();
				return false;
			}
		}
		if(banner_image && !/(\.(gif|jpg|jpeg|bmp|png))$/i.test(banner_image)){
	       $("#errormsg").addClass('errormsg').html("Please enter Valid Image Type");
	       $("#banner_image").focus();
	       return false;
	    }		
		return true;
	}
	
function sortByAscDesc(sortby,limit,keyword){

if(sortby != ''){
	//get url
	var filename = $(location).attr('href');
	//get Parameter
	var qrystr, qrystrlen, qryparam;
	qrystr = filename.split("=");
	qrystrlen = qrystr.length;
	qryparam = (qrystrlen == '1') ? '?' : '&';
	//$("#errormsg").html('<img src="images/loadingAnimation.gif" border="0" alt="Loading" />');
	$('body').load(filename+qryparam+'sortby='+sortby+'&limit='+limit+'&keyword='+keyword, function() {});
}
}

//this function for send mail to publish users
function sendMailToUsersPublish(changestatusval,fieldname,whereField,tablename,word,filetype){

    var checkedvar = $('.case').is(':checked');
    if(checkedvar == true){
    	
    	if(changestatusval == 'publish'){
			var str = 'Are you sure want to publish?';
		}else if(changestatusval == 'unpublish'){
			var str = 'Are you sure want to Unpublish?';
		}else if(changestatusval == 'pointed'){
			var str = 'Are you sure want to Pointed?';
		}else if(changestatusval == 'unpointed'){
			var str = 'Are you sure want to Unpointed?';
		} 
    	if(confirm(str)){
		    	var checkedvalues = $('input:checkbox:checked.case').map(function () {
				  return this.value;
				}).get();
			    //alert(checkedvalues);
	    if(changestatusval == 'publish' || changestatusval == 'unpublish' || changestatusval == 'pointed' || changestatusval == 'unpointed' ){
	            	
					$.post("adminAjaxFile.php", { 'changestatusval':changestatusval, 'fieldname':fieldname, 'whereField':whereField, 'tablename':tablename, 'checkedvaluesarr[]': checkedvalues,'action':'MailToPublishUnPublish' },function(response){
				    	if(response == 'success'){
				    		var filename = $(location).attr('href');
							$('body').load(filename, function(){
								  if(changestatusval == 'publish' || changestatusval == 'unpublish' || changestatusval == 'pointed' || changestatusval == 'unpointed')
									$("#errormsg").addClass('successmsglist').html('Mail Sent Successfully To The Particular User');
								else
									$("#errormsg").addClass('errormsglist').html('Error');
							});
						}else{
							alert("error");return false;
						} 
                	});
				}
		}
	}else{
		alert("Please select anyone record then proceed.");
	}
}
//validate store add 
function validateStore(action){			
	var store_name		=	$("#store_name").val();
	var store_description	=	$("#store_description").val();
	var store_image	=	$("#store_image").val();
	
	if(store_name == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Store Name");
		$("#store_name").focus();
		return false;
	}
	if(store_description == ''){
		$("#errormsg").addClass('errormsg').html("Please Enter Store Description");
		$("#store_description").focus();
		return false;
	}
	if(action == 'Add'){
		if(!store_image){
			$("#errormsg").addClass('errormsg').html("Please choose Store image");
			$("#store_image").focus();
			return false;
		}
	}
	if(store_image && !/(\.(gif|jpg|jpeg|bmp|png))$/i.test(store_image)){
       $("#errormsg").addClass('errormsg').html("Please enter Valid Image Type");
       $("#store_image").focus();
       return false;
    }	
		if(!$("#status_active").prop("checked") && !$("#status_inactive").prop("checked"))
			{
				$("#errormsg").addClass('errormsg').html("Please Select Status Value");
				$("#status_active").focus();
				return false;
			}	
	return true;
}
function showHintpop()
    {
        $("#access").show();
    }	

//Nest Payment Show Hide in Payment Settings
function paymentTestLive(id)
    {
         (id == 'testDetailsDiv') ? ($("#testDetailsDiv").show(),$("#liveDetailsDiv").hide()) : ($("#testDetailsDiv").hide(),$("#liveDetailsDiv").show());
    }
//Nest Payment Empty Validation
function nestPaymentValidation()
    {
        var nestPay_test_clientId	=	$("#nestPay_test_clientId").val();
        var nestPay_test_storeId	=	$("#nestPay_test_storeId").val();
        var nestPay_test_userName	=	$("#nestPay_test_userName").val();
        var nestPay_test_pwd    	=	$("#nestPay_test_pwd").val();
        var nestPay_live_clientId	=	$("#nestPay_live_clientId").val();
        var nestPay_live_storeId	=	$("#nestPay_live_storeId").val();
        var nestPay_live_userName	=	$("#nestPay_live_userName").val();
        var nestPay_live_pwd    	=	$("#nestPay_live_pwd").val();
        
         var chkId = '';
            $('.nestPay_mode:checked').each(function() {
              chkId = $(this).val();
            });
         
         if(chkId == 'T'){
            if(nestPay_test_clientId == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Test Client Id.");
            		$("#nestPay_test_clientId").focus();
            		return false;
            	}
            else if(nestPay_test_storeId == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Test Store Key.");
            		$("#nestPay_test_storeId").focus();
            		return false;
            	}   
            else if(nestPay_test_userName == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Test User Name.");
            		$("#nestPay_test_userName").focus();
            		return false;
            	}
            else if(nestPay_test_pwd == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Test Password.");
            		$("#nestPay_test_pwd").focus();
            		return false;
            	}                                     
         }
         if(chkId == 'L'){
            if(nestPay_live_clientId == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Live Client Id.");
            		$("#nestPay_live_clientId").focus();
            		return false;
            	}
            else if(nestPay_live_storeId == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Live Store Key.");
            		$("#nestPay_live_storeId").focus();
            		return false;
            	}   
            else if(nestPay_live_userName == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Live User Name.");
            		$("#nestPay_live_userName").focus();
            		return false;
            	}
            else if(nestPay_live_pwd == '')
                {
            		$("#errormsg").addClass('errormsg').html("Please Enter Live Password.");
            		$("#nestPay_live_pwd").focus();
            		return false;
            	}                                      
         }
        
    }
//***********************************************************************************************
function showUrlField(div_id){
 if(div_id != '')
 {
    if(div_id == 'live'){
        $("#domain_live").show();
        $("#domain_test").hide();
        
    }else if(div_id == 'test'){
        $("#domain_live").hide();
        $("#domain_test").show();
    }
 }   
}

function invoiceInfo(user_id)
{
	if(user_id != '')
	{
		$.post('adminAjaxAction.php',{"user_id":user_id,"action":"invoiceInfo_view"},function(response){
			$("#invoicePopup").html(response);
		});return false;
	}

}

function showhideInvoicefor(invoicefor)
{
	if(invoicefor == 'invoice_comp')
	{
		$("#invoice_comp").show();
		$("#invoice_indiv").hide();

	}else{
		$("#invoice_comp").hide();
		$("#invoice_indiv").show();
	}
}
function buyDomainInvoiceDetailsStore()
{
	 var inv_fname		=	$("#inv_fname").val();
	 var inv_surname    =	$("#inv_surname").val();
	 var inv_compname	=	$("#inv_compname").val();
	 var inv_taxoff		=	$("#inv_taxoff").val();
	 var inv_taxnum		=	$("#inv_taxnum").val();
	 var inv_idnumber	=	$("#inv_idnumber").val();
	 var inv_address	=	$("#inv_address").val();
	 var inv_district	=	$("#inv_district").val();
	 var inv_city		=	$("#inv_city").val();
	 var inv_country	=	$("#inv_country").val();
	 var user_id	    =	$("#user_id").val();
	 var inv_for        =   $('input[name=invoice_for]:checked', '#invpopup').val()
	 $(".spanerror").remove();

    if(inv_fname == ''){
    	$("#inv_fname").after("<span class='spanerror' style='color:#FF0000'>Please Enter Name </span>");
        $("#inv_fname").focus();
        return false;
    }
    if(inv_surname == ''){
    	$("#inv_surname").after("<span class='spanerror' style='color:#FF0000'>Please Enter Surname </span>");
        $("#inv_surname").focus();
        return false;
    }
    if(inv_for == 'company')
    {
    	if(inv_compname == '')
    	{
	    	$("#inv_compname").after("<span class='spanerror' style='color:#FF0000'>Please Enter Company Name </span>");
	        $("#inv_compname").focus();
	        return false;
	    }
	    if(inv_taxoff == ''){
	    	$("#inv_taxoff").after("<span class='spanerror' style='color:#FF0000'>Please Enter Tax Office </span>");
	        $("#inv_taxoff").focus();
	        return false;
	    }
	    if(inv_taxnum == ''){
	    	$("#inv_taxnum").after("<span class='spanerror' style='color:#FF0000'>Please Enter Tax Number </span>");
	        $("#inv_taxnum").focus();
	        return false;
	    }
    }else if(inv_for == 'individual')
    {
    	if(inv_idnumber == ''){
	    	$("#inv_idnumber").after("<span class='spanerror' style='color:#FF0000'>Please Enter ID Number </span>");
	        $("#inv_idnumber").focus();
	        return false;
	    }

    }
    if(inv_district == ''){
    	$("#inv_district").after("<span class='spanerror' style='color:#FF0000'>Please Enter District </span>");
        $("#inv_district").focus();
        return false;
    }
    if(inv_city == ''){
    	$("#inv_city").after("<span class='spanerror' style='color:#FF0000'>Please Enter City </span>");
        $("#inv_city").focus();
        return false;
    }
    if(inv_country == ''){
    	$("#inv_country").after("<span class='spanerror' style='color:#FF0000'>Please Enter Country </span>");
        $("#inv_country").focus();
        return false;
    }else{
    	$.post("adminAjaxFile.php",{"action":"buydomainInvoiceStore","inv_fname":inv_fname,'inv_surname':inv_surname,'inv_for':inv_for,'inv_compname':inv_compname,'inv_taxoff':inv_taxoff,'inv_taxnum':inv_taxnum,'inv_idnumber':inv_idnumber,'inv_district':inv_district,'inv_city':inv_city,'inv_country':inv_country,'inv_address':inv_address,'user_id':user_id},function(data)
    	{       	
	        if(data == "success")
	        {
	          
                    window.location.reload();
	        }
	        else
	        {
	            alert("Sorry!...Internal server error.Try again");
	        }        
	    });
    }  

}