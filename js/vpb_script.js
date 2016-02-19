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
	$('#suggested_names').live("keydown",function(vpb_event) 
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
		var name=$('#suggested_names').val();
		if ($('#suggested_names').val() == "" || $('#suggested_names').val() == "Enter a desired domain name here")
			{
				$("#vpb_search_status").html('<div class="info marTop10">Please enter a domain name of your choice to search.</div>');
				$('#suggested_names').focus();
				return false;
			}
		if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
			{
			    $("#vpb_search_status").html('<div class="info marTop10">Your domain names contains illegal characters.</div>');
				$('#suggested_names').val('');
				$('#suggested_names').focus();
				return false;
			}
		else if(name.match(/\ /))
			{
				$("#vpb_search_status").html('<div class="info marTop10">Your domain names contains space.</div>');
				var nospaceval = name.replace(/ /g,'');
				$("#suggested_names").val(nospaceval);
				$("#suggested_names").focus();
				return false;
			}
	/*else if ($('#suggested_names').val() != "" || $('#suggested_names').val() != "Enter a desired domain name here")
		{
			var name=$("#suggested_names").val();
		    if(name.match(/[_\W0-9]/))
              {
              	$("#vpb_search_status").html('<br clear="all"><br clear="all"><div class="info">Please enter a domain name without any special chars(For Example:Valsus,blog etc.).</div><br clear="all"><br clear="all">');
$('#suggested_names').focus();
				return false;
              }
            else
				{
					var dataString = 'domain=' + escape($('#suggested_names').val());
					
					$.ajax({  
						type: "POST",  
						url: "process.php",  
						data: dataString,
						cache: false,
						beforeSend: function() 
						{
							$("#vpb_search_status").html('<br clear="all"><br clear="all"><font style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">Please wait</font> <img src="images/loadings.gif" align="absmiddle" alt="Loading..."><br clear="all"><br clear="all">');
						},  
						success: function(response)
						{
							$('#vpb_search_status').html(unescape(response));	
						}
					   
					}); 
				}
		}*/
		else
				{
					var dataString = 'domain=' + escape($('#suggested_names').val());
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