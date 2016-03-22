/*********************************************************************
* This script has been released with the aim that it will be useful.
***********************************************************************/

// Display domain that the user wishes to buy when clicked on the Buy Now button
/*function vpb_buy_now(selected_domain_to_buy)
{
	//You can make use of the domain name here as wish
	alert(selected_domain_to_buy);
	return false;
}*/

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
		/*if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
			{
			    $("#vpb_search_status").html('<div class="info marTop10">Your domain names contains illegal characters.</div>');
				$('#suggested_names').val('');
				$('#suggested_names').focus();
				return false;
			}
		else*/ if(name.match(/\ /))
			{
				$("#vpb_search_status").html('<div class="info marTop10">Your domain names contains space.</div>');
				var nospaceval = name.replace(/ /g,'');
				$("#suggested_names").val(nospaceval);
				$("#suggested_names").focus();
				return false;
			}
		else
			{
				var dataString = 'domain=' + escape($('#suggested_names').val());
				var domain_id = '&domain_id='+$('#domain_id').val();
				$.ajax({  
					type: "POST",  
					url: jssitebaseUrl+"/domain_check.php",  
					data: dataString+domain_id,
					cache: false,
					beforeSend: function() 
					{
						$("#vpb_search_status").html('<br clear="all"><font style="margin-left: 24%;font-family:opensansbold; padding-right:10px; font-size:12px;">Please wait</font> <img src="http://www.enkolayweb.com/images/loadings.gif" align="absmiddle" alt="Loading..."><br clear="all"><br clear="all"><br clear="all">');
					},  
					success: function(response)
					{
						$('#vpb_search_status').html(unescape(response));	
					}				   
				}); 
			}    	
    }
//    
function showbuyButton(domainname)  
    {
        if(domainname != '') $("#buydomainvalue").val(domainname);
        $("#domainbuygetuserinfo").show();
        $('.loadmask').show();
    }  
//function to buy the domain
function buyDomain()   
    {        
        var domainname       = $.trim($("#buydomainvalue").val());
        
        var domain_buy_fname = $.trim($("#domain_buy_fname").val());
        var domain_buy_lname = $.trim($("#domain_buy_lname").val());
        var domain_buy_contactno = $.trim($("#domain_buy_contactno").val());
        var domain_buy_address   = $.trim($("#domain_buy_address").val());
        var domain_buy_state     = $.trim($("#domain_buy_state").val());
        var domain_buy_city      = $.trim($("#domain_buy_city").val());
        var domain_buy_postcode  = $.trim($("#domain_buy_postcode").val());
        var domain_buy_country   = $.trim($("#domain_buy_country").val());
        
        if(domainname == '')    
            {
                $("#vpb_search_status").html('<div class="info marTop10">Please enter a domain name of your searched.</div>');
				$('#suggested_names').focus();
                $("#domainbuygetuserinfo").hide();
				$('.loadmask').hide();
				return false;
            }
        else if(domainname.match(/\ /))
			{			 
				$("#vpb_search_status").html('<div class="info marTop10">Your domain names contains space.</div>');
				//var nospaceval = name.replace(/ /g,'');
				//$("#suggested_names").val(nospaceval);
				$("#suggested_names").focus();
                $("#domainbuygetuserinfo").hide();
				$('.loadmask').hide();
				return false;
			}               
       else if(domain_buy_fname == '')
            {
                $("#buydomaininfoerror").html("Please Enter the First Name");
                $("#buydomaininfoerror").show();
                $("#domain_buy_fname").focus();   
                return false;             
            }    
        else if(domain_buy_lname == '')
            {
                $("#buydomaininfoerror").html("Please Enter the Last Name");
                $("#buydomaininfoerror").show();
                $("#domain_buy_lname").focus();
                return false;
            }    
       /* else if(domain_buy_contactno == '')
            {
                $("#buydomaininfoerror").html("Please Enter the Contact No");
                $("#buydomaininfoerror").show();
                $("#domain_buy_contactno").focus();
                return false;
            }     */
        else if(domain_buy_address == '')
            {
                $("#buydomaininfoerror").html("Please Enter the Address");
                $("#buydomaininfoerror").show();
                $("#domain_buy_address").focus();
                return false;
            }     
       /* else if(domain_buy_state == '')
            {
                $("#buydomaininfoerror").html("Please Enter the State");
                $("#buydomaininfoerror").show();
                $("#domain_buy_state").focus();
                return false;
            } */
        else if(domain_buy_city == '')
            {
                $("#buydomaininfoerror").html("Please Enter the City");
                $("#buydomaininfoerror").show();  
                $("#domain_buy_city").focus();
                return false;
            }  
        else if(domain_buy_postcode == '')
            {
                $("#buydomaininfoerror").html("Please Enter the Postalcode");
                $("#buydomaininfoerror").show();
                $("#domain_buy_postcode").focus();
                return false;
            }     
        else if(domain_buy_country == '')
            {
                $("#buydomaininfoerror").html("Please Enter the Country");
                $("#buydomaininfoerror").show();
                $("#domain_buy_country").focus();
                return false;
            }        
        else
			{
				var dataString = 'domain=' + domainname+'&Fname='+domain_buy_fname+'&lname='+domain_buy_lname+'&address='+domain_buy_address+'&city='+domain_buy_city+'&country='+domain_buy_country+'&postcode='+domain_buy_postcode;
				var domain_id = '&domain_id='+$('#domain_id').val();
				$.ajax({  
					type: "POST",  
					url: jssitebaseUrl+"/domain_buy.php",  
					data: dataString+domain_id,
					cache: false,
					beforeSend: function() 
					{					    
                        $("#domainbuygetuserinfo").hide();
                        $('.loadmask').hide();
						$("#vpb_search_status").html('<br clear="all"><font style="margin-left: 24%;font-family:opensansbold; padding-right:10px; font-size:12px;">Please wait</font> <img src="http://www.enkolayweb.com/images/loadings.gif" align="absmiddle" alt="Loading..."><br clear="all"><br clear="all"><br clear="all">');
					},  
					success: function(response)
					{
					   if($.trim(response) == 'suc')
                            {
                                location.reload();
                            }    
                       else
                        {
                            $('#vpb_search_status').html(unescape(response));	
                        }                         					
					}
				   
				}); 
			}     
    }