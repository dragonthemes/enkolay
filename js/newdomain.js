/*********************************************************************
* This script has been released with the aim that it will be useful.
* This script must not be sold by any client or user of Vasplus Programming Blog.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: vasplusblog@gmail.com
* All Copy Rights Reserved by Vasplus Programming Blog
***********************************************************************/

// Display domain that the user wishes to buy when clicked on the Buy Now button
function vpb_buy_now(selected_domain_to_buy)
{
	//You can make use of the domain name here as wish
	alert(selected_domain_to_buy);
	return false;
}

// Auto submit search for this domain when the user preses the enter key on his or her computer
$(document).ready(function()
{
	//Search domain on pressing of the enter key on computer keyboard
	$('#edit_new_domain_name').live("keydown",function(vpb_event) 
	{
		if(vpb_event.keyCode == 13 && vpb_event.shiftKey == 0)
		{
			vpb_check_this_domain();
		}
	});
});

//Search domain function
function vpb_check_this_domain()
{	
     	var name=$('#edit_new_domain_name').val();
     	if ($('#edit_new_domain_name').val() == "" || $('#edit_new_domain_name').val() == "Enter a desired domain name here")
			{
				$("#vpb_search_status").html('<div class="info">Please enter a domain name of your choice to search.</div><br clear="all">');
				$('#edit_new_domain_name').focus();
				return false;
			}
		if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
			{
			    $("#vpb_search_status").html('<div class="info">Your domain names contains illegal characters.</div><br clear="all">');
				$('#edit_new_domain_name').val('');
				$('#edit_new_domain_name').focus();
				return false;
			}
		else if(name.match(/\ /))
			{
				$("#vpb_search_status").html('<div class="info">Your domain names contains space.</div><br clear="all">');
				var nospaceval = name.replace(/ /g,'');
				$("#edit_new_domain_name").val(nospaceval);
				$("#edit_new_domain_name").focus();
				return false;
			}
	 
		else
				{
					var dataString = 'domain=' + escape($('#edit_new_domain_name').val());
					var domain_id = '&domain_id='+$('#domain_id').val();
					$.ajax({  
						type: "POST",  
						url: jssitebaseUrl+"/process.php",  
						data: dataString+domain_id,
						cache: false,
						beforeSend: function() 
						{
							$("#vpb_search_status").html('<br clear="all"><font style="margin-left: 24%;font-family:opensansbold; padding-right:10px; font-size:12px;">Please wait</font> <img src="http://www.webbxyz.com/images/loadings.gif" align="absmiddle" alt="Loading..."><br clear="all"><br clear="all"><br clear="all">');
						},  
						success: function(response)
						{
							$('#vpb_search_status').html(unescape(response));	
						}
					   
					}); 
				}
	
}