var selStart,selEnd;
//For Point And New Domain
function divShowForDomainProcess(div1,div2)
	{
		$('#'+div2).hide();
		$('#'+div1).show();
	}

//Show selected photos
var openFile = function(event) {
    
    var input = event.target;
    var reader = new FileReader();
    $("#uploadtype").val("upimg");
    reader.onload = function(event){
      var dataURL = event.target.result;	
      var photo = document.getElementById('backimg');
      photo.src = dataURL;      

    };
    reader.readAsDataURL(input.files[0]);
    
  };  
//krishnaveni function starts
		//for check page tilte in advance settins page 
function checkpageTitle()
	{
		var name = $('#page_title').val();
	    if(name.match(/\ /))
			{
				var nospaceval = name.replace(/ /g,'-');
				$("#page_title").val(nospaceval);
				$("#page_title").focus();
				return false;
			}
		if(name.match(/\_/))
			{
				var nospaceval = name.replace(/_/g,'-');
				$("#page_title").val(nospaceval);
				$("#page_title").focus();
				return false;
			}
	}
//to show div at that time of mouse over in title
	function titleShow()	
		{
			$("#showlogo").show();
		}
	//this for hide div when mouse out
	function titleHide()	
		{
			$("#showlogo").hide();
		}
	//update in table when change
	function titleUpdateForShow(header_title,domain_id)
		{
			
			$.post(jssitebaseUrl+'/ajaxFile.php',{"header_logo_config":header_title,"domain_id":domain_id,"action":"updatetitleforshow"},function(response){				
				if(response == "success")
					{
						redirectnew();						
					}
			});	
		}
	// to show image browse button while click logo
	function imageShow()
		{
			$("#browsebutton").show();
		}
        
	function updateHeading(domain_id)
		{
         $(document).click(function(){
          var heading=$("#headingContent").html();
			   	$.post(jssitebaseUrl+'/ajaxFile.php',{"heading_content":($.trim($("#headingContent").html().replace("<br>",""))),"domain_id":domain_id,"action":"updateheading"},function(response){				
				
                 return false;
			});	
            });
		}
    //this functin did by veni for change description in main banner page 
     function updateDescriptionTitle(domain_id)
		{
          var allGood = true;
          $(document).click(function(){
		       if(allGood)
                  {
        			   var heading=$.trim($("#headingdescription").html());
        			  
        				$.post(jssitebaseUrl+'/ajaxFile.php',{"headingdescription":($.trim($("#headingdescription").html().replace("<br>",""))),"domain_id":domain_id,"action":"updateheadingdescription"},function(response){				
        				if(response == "success")
        					{
        						allGood = false;
                                					
        					}
            			 return false;
            			});	  
                  }          
           });	 
           return false;  
          
		}
	function showEditForm()
		{
			$("#showeditpost").show();
		}
	//this below functions for categories
	//this is for show category list
	function showCategoryList(domain_id)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'categoryList'}, function(output){
				$('#storecategorysetting').html(output);
			});	
		}
	//this is for add category
	function showAddCategories(domain_id)
		{
			$('#repSearch').hide();
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'addCategoryList'}, function(output){
				
				$('#listcat').hide();
				$('#addcat').show();
				$('#addcat').html(output);
			});
		}
	//this is for save category in category page
	function saveCat()
		{
			var domain_id    = $('#domain_id').val();
			var store_cat_id = $('#store_cat_id').val();
			var product_id   = $('#product_id').val();
			var cat_name     = $('#cat_name').val();
			var prod_cat     = $('.prod_cat').length;
		
			var prodval = '';   
			for(i=0;i<prod_cat;i++){
			if ($('#prod_cat'+i).is(':checked')) {
					var product=$("#prod_cat"+i).val();
					var prodval= prodval+product+',';
				}
			}
		    if(store_cat_id != '')
                {
                    $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'cat_name':cat_name,'store_cat_id':store_cat_id,'prod_cat':prodval,'action':'saveCatList'}, function(output){
        				$('#storecategorysetting').html(output);
        			});	
                }			
		}
	function editCat()
		{
			var domain_id = $('#domain_id').val();
			var store_cat_id = $('#store_cat_id').val();
			var product_id = $('#product_id').val();
			var cat_name = $('#cat_name').val();
			var prod_cat = $('.prod_cat').length;
		
			var prodval = '';   
			for(i=0;i<prod_cat;i++){
			if ($('#prod_cat'+i).is(':checked')) {
					var product=$("#prod_cat"+i).val();
					var prodval= prodval+product+',';
				}
			}
			if(store_cat_id != '')
                {
        			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'cat_name':cat_name,'store_cat_id':store_cat_id,'prod_cat':prodval,'action':'editCatList'}, function(output){
        				$('#storecategorysetting').html(output);
        			});	
                }    
		}
	function  showProducts(domain_id,store_cat_id)
		{
			if(domain_id != '')
                {
                    $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'store_cat_id':store_cat_id,'action':'listProductInCategoryPage'}, function(output){
        				$('#productListing').html(output);
        			});	
                }		
		}
	//this is for delete category in listing page
	function deleteCategory(store_cat_id)
		{
		  if(store_cat_id != ''){
			$.post(jssitebaseUrl+'/ajaxFile.php',{'cat_id':store_cat_id,'action':'deleteCategory'}, function(output){
				$('#storecategorysetting').html(output);
			});		
          }   
		}
	//this for edit category in listing page
	function editCategory(store_cat_id)
		{
		  if(store_cat_id != ''){            
			$.post(jssitebaseUrl+'/ajaxFile.php',{'store_cat_id':store_cat_id,'action':'editCategory'}, function(output){
				$('#storecategorysetting').html(output);
			});	
          }  	
		}
	function showAllCorrsProducts(store_cat_id,domain_id)
		{
		  if(store_cat_id != '' && domain_id != '')
              {
                $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'store_cat_id':store_cat_id,'action':'showProducts'}, function(output){
    				$('#replaceStore').html(output);
    			});
              }			
		}
		
   function showProductViewPage(product_id,domain_id)
	   	{
	   	   if(product_id != '' && domain_id != '')
               {
                $.post(jssitebaseUrl+'/ajaxFile.php',{'product_id':product_id,'domain_id':domain_id,'action':'productsViewPage'}, function(output){
    				$('#replaceStore').html(output);
    			});
               }	   	 	
		}			
	//this function for show footer pop up to change footer content			
   function showFooter()
		{
			$("#footer").show();
		}
	// to change footer content
	function orderFooter()
		{
			var store_order_footer=$("#store_order_footer").val();
			  $.post(jssitebaseUrl+'/ajaxFile.php',{'store_order_footer':store_order_footer,'action':'saveStoreOrderFooter'}, function(output){
			  			$('#order_content').html(output);
						});
		}
	//following for header content change
	function showHeader()
		{
			$("#header").show();
		}
	// to change footer content
	function orderHeader()
		{
			var store_order_header=$("#store_order_header").val();
			  $.post(jssitebaseUrl+'/ajaxFile.php',{'store_order_header':store_order_header,'action':'saveStoreOrderHeader'}, function(output){		 
			  				$('#order_content').html(output);
						});
		}	
	function showShippedHeader()
		{
			$("#shipheader").show();
		}
	function shippedHeader()
		{
			var shipped_header=$("#shipped_header").val();
		 	  $.post(jssitebaseUrl+'/ajaxFile.php',{'shipped_header':shipped_header,'action':'saveShippedHeader'}, function(output){		 
			  				$('#shipped_content').html(output);
						});
		}
	function showShippedFooter()
		{
			$("#shipfooter").show();
		}
	function shippedFooter()
		{
			var shipped_footer=$("#shipped_footer").val();
			  $.post(jssitebaseUrl+'/ajaxFile.php',{'shipped_footer':shipped_footer,'action':'saveShippedFooter'}, function(output){		 
			  				$('#shipped_content').html(output);
						});
		}	
			
	function showRefundHeader()
		{
			$("#refundheader").show();
		}
	function refundHeader()
		{
			var refund_header=$("#refund_header").val();
		   $.post(jssitebaseUrl+'/ajaxFile.php',{'refund_header':refund_header,'action':'saveRefundHeader'}, function(output){		 
			  				$('#refund_content').html(output);
						});
		}
	function showRefundFooter()
		{
			$("#refundfooter").show();
		}
	function refundFooter()
		{
			var refund_footer=$("#refund_footer").val();
			  $.post(jssitebaseUrl+'/ajaxFile.php',{'refund_footer':refund_footer,'action':'saveRefundFooter'}, function(output){		 
			  				$('#refund_content').html(output);
						});
		}
	function showCanceledHeader()
		{
			$("#cancldheader").show();
		}
	function canceledHeader()
		{
			var canceled_header=$("#canceled_header").val();
		   $.post(jssitebaseUrl+'/ajaxFile.php',{'canceled_header':canceled_header,'action':'saveCanceledHeader'}, function(output){		 
			  				$('#canceled_content').html(output);
						});
		}
	function showCanceledFooter()
		{
			$("#cancldfooter").show();
		}
	function canceledFooter()
		{
			var canceled_footer=$("#canceled_footer").val();
			  $.post(jssitebaseUrl+'/ajaxFile.php',{'canceled_footer':canceled_footer,'action':'saveCanceledFooter'}, function(output){		 
			  				$('#canceled_content').html(output);
						});
		}
	function productUnpublish(prod_id)
		{
		  if(prod_id != '')
              {
                $.post(jssitebaseUrl+'/ajaxFile.php',{'product_id':prod_id,'action':'changeIntoUnpublish'}, function(output){		 
    			  				$('#productssetting').html(output);
    						});
              }			
		}
	function productPublish(prod_id)
		{
		  if(prod_id != '')
              {
			     $.post(jssitebaseUrl+'/ajaxFile.php',{'product_id':prod_id,'action':'changeIntoPublish'}, function(output){		 
			  				$('#productssetting').html(output);
						});
              }          
		}
    function productduplicate(prod_id)
		{
		  if(prod_id != '')
              {
    			$.post(jssitebaseUrl+'/ajaxFile.php',{'product_id':prod_id,'action':'changeDuplicate'}, function(output){		 
    			  				$('#productssetting').html(output);
    						});
              }          
		}	
	function showCartProduct()
		{
			$("#cartDet").show();
		}
	function insertCartDetails(domain_id)
		{
		    var quantity = $("#quantity").val();
            if(quantity <= 0) $("#quantity").val(1);
			var cnt	=$(".cartitm").length+(1*1);
			$("#cartcnt").html("Cart("+cnt+")");
			
            if(domain_id != '')
                {
                    $.post(jssitebaseUrl+'/ajaxFile.php',$('#buyProduct').serialize()+'&domain_id='+domain_id+'&action=insertIntoCartTable',function(output){
    	  				$('#cartDet').html(output);
    				});
                }	
		}
    //**************************************************************************************************************    
    //delete the cart
	function deleteThisCart(domain_id,cart_id)
		{
			if(domain_id != '' && cart_id != '')
                {
                    $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'cart_id':cart_id,'action':'cartDeleted'}, function(output){		 
        						 
        			  				$('#cartDet').html(output);
        						});
        			var cnt	=$(".cartitm").length-(1*1);
        			$("#cartcnt").html("Cart("+cnt+")");
                }								
		}
    //*********************************************************************************************************************    
 	function showUpdateDiv(event)
		{			
			var quan = event.target.value;  	
	 
			if(parseInt(quan) > 0)
			{
				$("#update").show();
			}
			else{
				$("#update").hide();
			}					
		}
    //**********************************************************************************************************************    
	function deleteProFromCheckoutPage(domain_id,cart_id)
		{
		  if(domain_id != '' && cart_id != '')
              {
                $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'cart_id':cart_id,'action':'cartDeletedFromCheckoutPage'}, function(output){
    		  		$('#checkoutPage_cart').html(output);
    			});
              }
		}
    //********************************************************************************************************************** 
    //update the quantity    
	function updateQuantity(domain_id,cart_id)
		{
		  if(domain_id != '' && cart_id != '')
              {
    			var quan=$("#quan").val();
    			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'cart_id':cart_id,'quan':quan,'action':'updateQuantity'}, function(output){	 
	  				$('#checkoutPage_cart').html(output);
				});
              }      
		}
    //**********************************************************************************************************************     
	function validateCheckout()
		{
			if($("[name=shipval]:checked").attr("checked")!="checked")
				{
			 	 	$("#errormsg").addClass('errormsg').html("Please Choose shipping Details");
					$(".shipval").focus();
					return false;
	 			}
	 		else
		 		{
		 		   if(jssiteuserfriendly == 'Y')
                        window.location.href = jssitebaseUrl+'/shippage';
                   else
                        window.location.href = jssitebaseUrl+'/showShippingAddr.php'; 
				}
	 		 
		}
	//**********************************************************************************************************************
	//function for show ship price and show total price
	function showShipValue(shipid,domain_id)
		{			
            if(shipid != '' && domain_id != ''){
                $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'shipid':shipid,'action':'updateShipingid'}, function(output){		 		 
		  				$('#checkoutPage_cart').html(output);
					});
            }
		}
    //**********************************************************************************************************************    
	//this function used for insert into order details table
	function toInsertOrderDetails()
		{
			var name = $('#name').val();
			var price = $('#tot_amt').val();
			var address = $('#address').val();
			var state = $('#state').val();
			var city = $('#city').val();
			var country = $('#country').val();
			var zipcode = $('#zipcode').val();
			var email = $('#email').val();
			var phoneno = $('#phoneno').val();
			var product_id = $('#product_id').val();
			var domain_id = $('#domain_id').val();
			if(name == '')
				{
					alert("Please enter Your name");
					$('#name').focus();
					return false;
				}
			if(address == '')
				{
					alert("Please enter address");
					$('#address').focus();
					return false;
				}
			if(state == '')
				{
					alert("Please enter state");
					$('#state').focus();
					return false;
				}
			if(city == '')
				{
					alert("Please enter city");
					$('#city').focus();
					return false;
				}
			if(country == '')
				{
					alert("Please enter country");
					$('#country').focus();
					return false;
				}
			if(zipcode == '')
				{
					alert("Please enter zipcode");
					$('#zipcode').focus();
					return false;
				}
			if(email == '')
				{
					alert("Please enter email");
					$('#email').focus();
					return false;
				}
			else
				{
					var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;	
					if(!email.match(email_check)){
						alert("Please enter Valid Email");
						$("#email").focus();
						return false;
					}
				}
			if(phoneno == '')
				{
					alert("Please enter phoneno");
					$('#phoneno').focus();
					return false;
				}
			$.post(jssitebaseUrl+'/ajaxFile.php',$('#paypal').serialize()+'&action=setSessionPay',function(output){ 
				  $('#paypal').submit();
			});
		}
	  //**********************************************************************************************************************
	  //function to show order details while click view details in order listing page
	  function showOrderView(order_id)
	  	{
	  	    if(order_id)
                {
                    $.post(jssitebaseUrl+'/ajaxFile.php',{'order_id':order_id,'action':'showOrderDetails'}, function(output){		 		 
    		  				//$('#checkoutPage_cart').html(output);
    					});
                }			
		}
      //**********************************************************************************************************************  
	  //this function used to get paypal email in store checkout page
	  function validatePayEmail()
	  	{
			var paypal_email=$("#paypal_email").val()
		  	if(paypal_email == '')
		  		{
					$("#er").addClass('errormsgPaypal').html("Please enter paypal email details");
					$("#paypal_email").focus();
					return false;
				}
			else
				{
						var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;	
						if(!paypal_email.match(email_check)){
							$("#er").addClass('errormsgPaypal').html("Please enter valid paypal email");
							$("#paypal_email").focus();
							return false;
						}
				}
			$.post(jssitebaseUrl+'/ajaxFile.php',{'paypal_email':paypal_email,'action':'paypalEmail'}, function(output){		 		 
		  				$('#checkoutsetting').html(output);
					});
		}
//Resgister
$("form#registerform").submit(function(){
	var username		=	$("#usrname").val();
 	var email			=	$("#email").val();
	var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;		
	var password		=	$("#password").val();		
	if(username == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Full Name");
		$("#fullname").focus();
		return false;
	}
	if(email == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Email");
		$("#email").focus();
		return false;
	}
	if(!email.match(email_check)){
		$("#errormsg").addClass('errormsg').html("Please enter Valid Email");
		$("#email").focus();
		return false;
	}
	if(password == ''){
		$("#errormsg").addClass('errormsg').html("Please enter Password");
		$("#password").focus();
		return false;
	}
	else if(password.match(/\ /))
		{
			$("#errormsg").addClass('errormsg').html("Your Password contains space.");
			$("#password").focus();
			return false;
		}
	$.post(jssitebaseUrl+'/registerAjaxFile.php',{'username':username,'email':email,'password':password,'action':'register'},function(response){
	 	if(response == 'UserExist'){				
			$("#errormsg").addClass('errormsg').html("OOPS!UserName already Exist.");
			return false;
		}else if(response == 'Exist'){				
			$("#errormsg").addClass('errormsg').html("OOPS!Email already Exist.");
			return false;
		}else{
			window.location.href = jssitebaseUrl+'/thanks.php';				
		}
	});
	return false;
});
		
	//Login
	$("form#loginform").submit(function(){
	
		var user_email 				= $("#user_email").val();
		var usere_check     		=  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;	
		var user_password 			= $("#user_password").val();
		var remember_checked_val	= $("#remember_me").attr("checked");

		if(remember_checked_val){
		 	var remember_me = 'Yes';
		}else{
		 	var remember_me = 'No';
		}

		if(user_email == ''){
			$("#error_msglogin").addClass('errormsg').html("Please enter Correct Email");
			$("#user_email").focus();
			return false;
		}
		if(user_password == ''){
			$("#error_msglogin").addClass('errormsg').html("Please Enter Your Password");
			$("#user_password").focus();
			return false;
		}else{
		
			$.post(jssitebaseUrl+'/registerAjaxFile.php',{"user_email":user_email,"user_password":user_password,"remember_me":remember_me,"action":"checkUserLogin"},function(response){ 
				
				if(response == "Invalid_Login"){
					$("#error_msglogin").addClass('errormsg').html("Invalid Login");
					return false;
				}else if(response == 'Pending'){
					$("#error_msglogin").addClass('errormsg').html("Pending Registration...Please Check Your Email to Confirm Registration!!!");
					return false;
				}else if(response == 'reset'){
					window.location.href = jssitebaseUrl+'/resetPass.php';
					return false;
				}else{
					window.location.href = response;
				}
			});
		}
		return false;
	});
	
	//Change Password
	//............................................................................................................................................
	//this is for chang e password page in user side
	$("form#changePassForm").submit(function(){
	 
		var oldpass				=	$("#current_pass").val();
		var newpass				=	$("#new_pass").val();
		var confirm_newpass		=	$("#confirm_newpass").val();
		
	 
		if(oldpass == ''){
			$("#errormsg").removeClass('successmsg');
			$("#errormsg").addClass('errormsg').html("Please enter Current Password");
			$("#current_pass").focus();
			return false;
		}
		else if(newpass == ''){
			$("#errormsg").removeClass('successmsg');
			$("#errormsg").addClass('errormsg').html("Please enter New Password");
			$("#new_pass").focus();
			return false;
		}
		else if(newpass.match(/\ /)){
			$("#errormsg").removeClass('successmsg');
			$("#errormsg").addClass('errormsg').html("Your New Password Contains Space");
			$("#new_pass").focus();
			return false;
		}
		else if(confirm_newpass == ''){
			$("#errormsg").removeClass('successmsg');
			$("#errormsg").addClass('errormsg').html("Please enter Confirm New Password");
			$("#confirm_newpass").focus();
			return false;
		}
		else if(confirm_newpass != '' && confirm_newpass != newpass ){
			$("#errormsg").removeClass('successmsg');
			$("#errormsg").addClass('errormsg').html("New Password  and Confirm Password should be the same");
			$("#confirm_newpass").focus();
			return false;
		}
		else{
			$.post(jssitebaseUrl+'/registerAjaxFile.php',{"currentpass":oldpass,"newpass":newpass,'confirm_newpass':confirm_newpass,"action":"changePassword"},function(response){
				if(response == "Invalid_Old_Pwd"){
					$("#errormsg").removeClass('successmsg');
					$("#errormsg").addClass('errormsg').html("Invalid Current Password");
					return false;
				}else{
					$("#errormsg").removeClass('errormsg');
					$("#errormsg").addClass('successmsg').html("Password has been updated successfully").show();
					//setTimeout("redirectUrl('Myaccount.php')", 2000);
                    setTimeout("redirectPage('Myaccount.php','myaccount')", 2000);
					$("#current_pass").val('');
					$("#new_pass").val('');
					$("#confirm_newpass").val('');
					return false;
				}
			 
			});
		}
		return false;			
	});
	
	//Change Email
	//............................................................................................................................................
	//this is for change email page in user side
	$("form#emailcolumn").submit(function(){
	 
		var email				=	$("#email").val();
		var email_check         =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
	 	if(email == ''){
			$("#error_msg").addClass('errormsg').html("Please enter Email Address");
			$("#email").focus();
			return false;
		}
		if(!email.match(email_check)){
			$("#error_msg").addClass('errormsg').html("Please enter Valid Email");
			$("#email").focus();
			return false;
		}
		else{
			$.post(jssitebaseUrl+'/registerAjaxFile.php',{"email":email,"action":"changeEmail"},function(response){
				if(response == "This Email already Exist try with another"){
					$("#error_msg").addClass('errormsg').html("This Email already Exist try with another");
					$("#email").val('');
					return false;
				}else{
					$("#error_msg").removeClass('errormsg');
					$("#error_msg").addClass('successmsg').html("Your Email update Successfully");
					$("#email").val('');
					
                    setTimeout("redirectPage('Myaccount.php','myaccount')", 2000);
					
					return false;
				}
				$("#email").val('');
			});
		}
		return false;			
	});
	//Change Fullname
	//............................................................................................................................................
	//this is for change fullname page in user side
		$("form#fullnameForm").submit(function(){
	 
		var fullname			=	$("#fullname").val();
	 	if(fullname == ''){
			$("#error").addClass('errormsg').html("Please enter Full name");
			$("#fullname").focus();
			return false;
		}
	  	else{
	  		 $.post(jssitebaseUrl+'/registerAjaxFile.php',{"fullname":fullname,"action":"changeFullname"},function(response){
	  		   	if(response == "This Fullname already Exist try with another"){
					$("#error").addClass('errormsg').html("This Fullname already Exist try with another");
					$("#fullname").val('');
					return false;
				}else{
					$("#error").removeClass('errormsg');
					$("#error").addClass('successmsg').html("Your Fullname update Successfully");
					$("#fullname").val('');
					
                    setTimeout("redirectPage('Myaccount.php','myaccount')", 2000);
				 	return false;
				}
        	});
		}
		return false;			
	});
//******************************************************************************************************	
//Forgot Password	
function forgetPasswordIndex()
    { 	
    	var forgetemail = $("#forgetemail").val();
    	
    	if(forgetemail == ''){
    		$("#error_pass").addClass('errormsg').html("Please Enter Your Email").show();
    		$("#forgetemail").focus();
    		return false;
    	}else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(forgetemail))){
    	   	$("#error_pass").addClass('errormsg').html("Invalid Email Id").show();
    		$("#forgetemail").focus();
    		return false;
        }else{
    		$("#error_pass").hide();
    	} 
    	if(forgetemail != ''){		
    		$.post(jssitebaseUrl+'/ajaxFile.php',{'forgetemail':forgetemail,'action':'forgetPassword'}, function(output){
    		 	if(output == 'sendpass_success'){
    		 		$("#error_pass").addClass('successmsg').html("Password has been sent to your email address").show();
    				$("#forgetemail").val('');
    				return false;			
    			}else if(output	==	'activation_failed'){
    				$("#error_pass").addClass('errormsg').html('This registration not activated yet now. Please check your email.').show();	
    				return false;			
    			} else if(output == 'no_email'){ 
    				$("#error_pass").addClass('errormsg').html('This email address not registered').show();
    				return false;
    			}
    		});
    	}
    	return false;
    }	

 	//LogOut:
	function logout(){			
		window.location.href = jssitebaseUrl+'/ajaxFile.php?action=logOut';		
	}
		
	
	
//kathir funtion starts
function ShowPassChangeColumn(divid1,divid2,divid3)
	{
		$('#'+divid1).show();
		$('#'+divid2).hide();
		$('#'+divid3).hide();
	}
//domain selection starts
function SelectTheme(themeid,themename)
	{
		var actclass = 'ul#color_'+themeid+' li.active';
		var themeColor = $(actclass).attr("id");
		themeColor = themeColor.split('_');
		$.post(jssitebaseUrl+'/onboarding.php',{"theme_id":themeid,"theme_name":themename,"themecolor":themeColor[0],"action":"selecttheme"},function(response){ 			
		if($.trim(response) == "sucess")
			{
				$("#sucess_disp").addClass('successmsg').html("Yeni Tema Başarıyla Seçildi");
				setTimeout("redirectnew()", 2000);						
			}
		else if(response == "updatesucess")
			{
				$("#sucess_disp").addClass('successmsg').html("Tema Başarıyla Güncellendi ");
				return false;
			}
		else
			{
				$("#error_disp").removeClass('errormsg');
				$("#error_disp").addClass('successmsg').html("Tema Seçerken Hata Oluştu");
			} 
		});	
	}
		//**********************************************************************************************************
		//blog selection starts
		function SelectBlog(blog_id,blogname)
			{
				var actclass = 'ul#blogcolor_'+blog_id+' li.active';
				var blogColor = $(actclass).attr("id");
				blogColor = blogColor.split('_');
				$.post(jssitebaseUrl+'/onboarding.php',{"blog_id":blog_id,"blog_name":blogname,"blogcolor":blogColor[0],"action":"selectblog"},function(response){
				if($.trim(response) == "sucess")
					{
						$("#sucess_dis").addClass('successmsg').html("New Theme For Blog Sucessfully Selected");
						setTimeout("redirectnew()", 2000);						
					}
				else if(response == "updatesucess")
					{
						$("#sucess_dis").addClass('successmsg').html("Theme For Blog Update Sucessfully ");
						return false;
					}
				else
					{
						$("#error_disp").removeClass('errormsg');
						$("#error_disp").addClass('successmsg').html("Error in theme selection");
					} 
				});	
			}	
		//**********************************************************************************************************
		//Store selection starts
		function SelectStore(store_id,storename)
			{
				var actclass = 'ul#storecolor_'+store_id+' li.active';
				var storeColor = $(actclass).attr("id");
				storeColor = storeColor.split('_');
				$.post(jssitebaseUrl+'/onboarding.php',{"store_id":store_id,"store_name":storename,"storeColor":storeColor[0],"action":"selectstore"},function(response){
				if(response == "sucess")
					{
						$("#sucess_storedis").addClass('successmsg').html("New Theme For Store Sucessfully Selected");
						setTimeout("redirectnew()", 2000);						
					}
				else if(response == "updatesucess")
					{
						$("#sucess_storedis").addClass('successmsg').html("Theme For Store Update Sucessfully ");
						return false;
					}
				else
					{
						$("#error_disp").removeClass('errormsg');
						$("#error_disp").addClass('successmsg').html("Error in theme selection");
					} 
				});	
			}	
		/*********************************************************************************************************/
        function redirectPage(file,seourl)
            {
                if(jssiteuserfriendly == 'Y')
                    window.location = jssitebaseUrl+'/'+seourl;
                else
                    window.location = jssitebaseUrl+'/'+file;    
            }
        /***************************************************************************************************/
		function redirectnew()
			{
				redirectPage('main.php','main')
			}
		
		function redirectUrl(url)
			{			 
				window.location = jssitebaseUrl+'/'+url;                
			}		
		//deleteaccount
		function deletepopup(divid)
			{
				$('#'+divid).show();
			}		
		//Toogle for setting page
		function commonToogle(divid)
			{
				$('.mainLeftPanel').hide()
				//$('#'+divid).toggle('show');
				$('#'+divid).show();
				$('#pages').hide();
				$('#build').hide();
				$('#themelist').hide();
			}	
		//toogle for option
		function commonTop(divid)
			{
				$('#'+divid).toggle('show');
			}
		$(document).click(function(event){ 
			if($(event.target).closest("#topoptions,.main_rightNav_opt").length == 0) {
				$("#topoptions").hide();
			} 
		});
		
function DeleteAccount()
	{
		var deleteopnion 				= $("#deleteopnion").val();			
		$.post(jssitebaseUrl+'/Myaccount.php',{"deleteopnion":deleteopnion,"action":"deleteaccount"},function(response){
		if(response == "deletesucess")
			{
				$("#sucess_disp").addClass('successmsg').html("Your Account Is Sucessfully Deleted");
				setTimeout("redirectmsg()", 2000);
			}				
		});	
	}
function redirectmsg()
	{
		window.location = jssitebaseUrl+'/logout.php';
	}
    //suresh new process.
function AddSubDomain()
	{			   	
	   if(document.getElementById("sub_domain").checked == true)
       {
            var name       = $('#domain_name').val();
            var doamin_url = 'http://'+$('#domain_name').val()+'.'+site_main_domain; 
            var type       = 'SD';
            if(name == '')
				{
					$("#error_msg").addClass('errormsg').html("Bir alt alan adı girmelisiniz.");
					$("#domain_name").focus();
					return false;
				}				 
			if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
				{
				    $("#error_msg").addClass('errormsg').html("Alt alan adınız geçersiz karakterler barındırıyor.");
				    $("#domain_name").val("");
					$("#domain_name").focus();
					return false;
				}
			else if(name.match(/\ /))
				{
					$("#error_msg").addClass('errormsg').html("Alt alan adınızda boşluk bırakamazsınız.");
					var nospaceval = name.replace(/ /g,'');
					$("#domain_name").val(nospaceval);
					$("#domain_name").focus();
					return false;
				}
       }
   else if(document.getElementById("point_domain").checked == true)
       {       
            var domaint_txt = $('#point_domain_name').val();
            var name        = 'http://'+$('#point_domain_name').val();
            var doamin_url  = 'http://'+$('#point_domain_name').val(); 
            var regUrl      =  new RegExp(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/);
            var type        = 'PD';
            var pointregUrl =  new RegExp(/^(?!http:\/\/www\.)[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]+$/);

            if(domaint_txt == '')
				{
					$("#error_msg").addClass('errormsg').html("Please enter Point domain name");
					$("#point_domain_name").focus();
					return false;
				}				 
			if(domaint_txt != '')
                {		
            		if(regUrl.test(name) == false){
            			$("#error_msg").addClass('errormsg').html("Geçerli bir hedef alan adı seçin");
						$("#point_domain_name").focus();
						return false;                    			
            		}
            	}                   
            
            if(doamin_url!="")
            {
                if(regUrl.test(doamin_url) == false){
            			$("#error_msg").addClass('errormsg').html("Geçerli bir hedef alan adı seçin");
						$("#point_domain_name").focus();
						return false;                    			
            	}
            }    
       }                    
 
 if( document.getElementById("sub_domain").checked == true || document.getElementById("point_domain").checked == true)
     {                
	  	var theme_id = $('#id_theme').val();
		var blog_id = $('#id_blog').val();
		var store_id = $('#id_store').val()
		if(theme_id)
			{
				$.post(jssitebaseUrl+'/main.php',{'subdomain_url':doamin_url,'type':type,'theme_id':theme_id,'action':'domainAdd'}, function(output){
				  
				if(output == 'error')
					{
						$("#error_msg").addClass('errormsg').html("Bu adres kullanımdadır.");
					}
				else if(output == "insertsucess")
					{	
					    if($.trim(type) == 'PD'){
					      
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						} 
						
                        $("#youdomainurl").html(doamin_url);								
						$("#error_msg").hide();                                    
						$("#sucess_disp").addClass('successmsg').html("Site başarıyla yaratıldı");
														
					}
				else if(output == "updatesucess")
					{			
					    if(type == 'PD'){
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						}                             	
						
                        $("#youdomainurl").html(doamin_url);									
						$("#error_msg").hide();		
						$("#sucess_disp").addClass('successmsg').html("Alan adı güncellemesi başarılı.");
					
					}	
				});
			}
		else if(blog_id)
			{
				
				$.post(jssitebaseUrl+'/main.php',{'subdomain_url':doamin_url,'blog_id':blog_id,'action':'domainAdd'}, function(output){
				if(output == 'error')
					{
						$("#error_msg").addClass('errormsg').html("Bu adres kullanımdadır.");
					}
				else if(output == "insertsucess")
					{		
						if(type == 'PD'){
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						}                               
					
                        $("#youdomainurl").html(doamin_url);								
						$("#error_msg").hide();                                    
						$("#sucess_disp").addClass('successmsg').html("Alanadı başarıyla yaratıldı.");
					}
				else if(output == "updatesucess")
					{					
						if(type == 'PD'){
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						}      								
						
                        $("#youdomainurl").html(doamin_url);									
						$("#error_msg").hide();		
						$("#sucess_disp").addClass('successmsg').html("Alanadı güncellemesi başarılı.");
						
					}	
				});
			}
	/*	else if(store_id)
			{    					
				$.post(jssitebaseUrl+'/main.php',{'subdomain_url':doamin_url,'store_id':store_id,'action':'domainAdd'}, function(output){
				if(output == 'error')
					{
						$("#error_msg").addClass('errormsg').html("Domain already Exists");
					}
				else if(output == "insertsucess")
					{		
						if(type == 'PD'){
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						}                                    
					
                        $("#youdomainurl").html(doamin_url);								
						$("#error_msg").hide();                                    
						$("#sucess_disp").addClass('successmsg').html("Domain is Created Sucessfully");
					}
				else if(output == "updatesucess")
					{					
						if(type == 'PD'){
                            $(".domainChangeTwo").show();
                            $(".domainChangeOne").hide();
                        }else{
							 $(".domainChangeOne").show();
							 setTimeout("redirectnew()", 2000);
						}                               
							
						
                        $("#youdomainurl").html(doamin_url);									
						$("#error_msg").hide();		
						$("#sucess_disp").addClass('successmsg').html("Domain Update Sucessfully");
					
					}	
				});
			}  */
        else
            {
                redirectPage('userHome.php','userhome');
            } 
     }    		
} 

        //check the domain availabilty    
		function checkDomainValidation()
			{
				var name = $('#domain_name').val();
				if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
					{
					    $("#domain_name").val("");
						$("#domain_name").focus();
						return false;
					}
				else if(name.match(/\ /))
					{
						var nospaceval = name.replace(/ /g,'');
						$("#domain_name").val(nospaceval);
						$("#domain_name").focus();
						return false;
					}
			}
			
		function checkDomainValidationInPopup()
			{
				var name = $('#domain').val();
				if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
					{
					    $("#domain").val("");
						$("#domain").focus();
						return false;
					}
				else if(name.match(/\ /))
					{
						var nospaceval = name.replace(/ /g,'');
						$("#domain").val(nospaceval);
						$("#domain").focus();
						return false;
					}
			}		
		//setting page redirects
		function SettingFunction(domain_id,theme_id)
			{
			 if(domain_id != '' && theme_id != '')
                 {
                    $.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'theme_id':theme_id,'action':'settingload'}, function(output){
    						if(output == 'sucess')
    							{    								
                                    redirectnew();
    							}
    					});
                 }
				
			}
		//setting function for blog
		function SettingFunctionForBlog(domain_id,blog_id)
			{
			 if(domain_id != '' && blog_id != '')
                 {
    				$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'blog_id':blog_id,'action':'settingblog'}, function(output){
    						if(output == 'sucess')
    							{    								
                                    redirectnew();
    							}
    					});
                 }   
			}
        //setting function for store    
		function SettingFunctionForStore(domain_id,store_id)
			{
			 if( domain_id != '' && store_id != '' )
                 {
                    $.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'store_id':store_id,'action':'settingstore'}, function(output){
    						if(output == 'sucess')
    							{
                                    redirectnew();
    							}
    					});
                 }				
			}
		//function for add a titlepopup
		function ShowTitlePopup(domain_id,title_id,title,date)
			{
			 if(domain_id != '' && title_id != '')
                 {
                    $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'title_id':title_id,'title':title,'date':date,'action':'showtitleedit'}, function(output){					
    					var arr = output.split("|@|");
    					if(arr[0] == "showtitlepopup")
    						{
    							$('.themewrapper2BgAlign').show();
    							$('.themewrapper2BgAlign').html(arr[1]);
    							 reloadPagelist();
    						}
    				});
                 }				
			}
		//function for add a titlepopup
		function ShowDraftTitle(domain_id,title_id,title)
			{
			 if(domain_id != '' && title_id != '')
                 {
    				$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'title_id':title_id,'title':title,'action':'showtitleedit'}, function(output){
    					
    							var arr = output.split("|@|");
    							if(arr[0] == "showtitlepopup")
    								{
    									$("#maska").hide();
    									$('.themewrapper2BgAlign').show();
    									$('.themewrapper2BgAlign').html(arr[1]);
                                         reloadPagelist();
    								}
    					});
                 }   
			}
		//function for update the title in the popup
		function ShowEditTitlePopup()
			{
			 	$.post(jssitebaseUrl+'/main.php',$('#postCat').serialize()+'&action=updateEditTitle',function(output){							
							if(output == "sucess")
								{
                                    redirectnew();
								}
					});
			}
		//function for update the title in the popup
		function updateTitleWithDrafts()
			{
				$.post(jssitebaseUrl+'/main.php',$('#postCat').serialize()+'&action=updateTitleAsDraft',function(output){							
						if(output == "sucess")
							{								
                               // redirectnew();
							}
					});
			}	
		//function for add a title in the popup
		function AddTitlePopup(domain_id)
			{
			 if(domain_id != '')
                 {
                    $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'addTitlepopup'}, function(output){
						var arr = output.split("|@|");
						if(arr[0] == "sucess")
							{							 
								ShowDraftTitle(domain_id,arr[1],arr[2]);
                                //$('.themewrapper2BgAlign').show();
								//$('.themewrapper2BgAlign').html(arr[1]);
								ajaxsortingandclickfun();
							}
    				});
                 }			
			}
		//function for add  a title	
		function AddTitle()
			{
				 
			 	$.post(jssitebaseUrl+'/main.php',$('#postCat').serialize()+'&action=addTitle',function(output){
					if(output == "sucess")
						{
                            redirectnew();
						}
				});		
			}
		//function for add  a title and saved as drafts	
		function AddTitleWithDrafts()
			{
				$.post(jssitebaseUrl+'/main.php',$('#postCat').serialize()+'&action=addTitleWithDrafts',function(output){
					if(output == "sucess")
						{
                            redirectnew();
						}
				});		
			}
		//this function is used to delete the title 
		function DeleteTitle(domain_id,title_id)
			{
			 if(domain_id != '' && title_id != '')
                 {
                    $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'title_id':title_id,'action':'deleteTitle'}, function(output){
    				    
    					if(output == "sucess")
    						{
                                redirectnew();
    						}
    				});	
                 }				
			}				
		// this function is used to close the title popup
		function CloseTitle()
			{
                redirectnew();
			}						
		//main page div starts
		function ShowCorrectDiv(divid1,divid2,divid3,divid4,divid5)
			{
				$('#'+divid1).show();
				$('#'+divid2).hide();
				$('#'+divid3).hide();
				$('#'+divid4).hide();
				$('#'+divid5).hide();
			}
		function ShowCorrectDivForStore(divid1,divid2,divid3,divid4,divid5,divid6)
			{
				$('#'+divid1).show();
				$('#'+divid2).hide();
				$('#'+divid3).hide();
				$('#'+divid4).hide();
				$('#'+divid5).hide();
				$('#'+divid6).hide();
			}
		function blogPopupClose()
			{
				$('.BlogNewPostPopup').hide();
				$('.blogMask').hide();
			}
		function showActiveClass(id)
			{
				$('ul.menuUl li a').removeClass('active');
				$('#'+id).addClass("active");
			}
		function showADiv(divid1,divid2)
			{
				$('#'+divid1).show();
				$('#'+divid2).hide();
			}
			$('.BlogNewPost').click(function(){
				$('.BlogNewPostPopup').show();
			
			 });			 
		//***********************************************************************************************
		//save function
		function SaveTitle()
			{
				var sitetitle = $('#sitetitlename').val();
				$.post(jssitebaseUrl+'/main.php',{'sitetitle':sitetitle,'action':'savetitle'}, function(output){
					if(output)
						{								
							$('#titleBlock').html(output);
							$('#success').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully changed your site title</div>");
							setTimeout("hideSuccess('success','successmsg')", 2000);
						}
				});
			}	
		function hideSuccess(id1,id2)
			{
				$('#'+id1).html("");
				$('#'+id1).removeClass(id2);				
			}			
		//delete subdomain in mysites with the theme_id
		function DeleteSubdomain(domain_id,theme_id)
			{
			  if(domain_id != '' && theme_id != '')
                 {
    				var str = 'Are you sure want to Delete?';					
    				if(confirm(str))
    					{
    						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'theme_id':theme_id,'action':'DeleteDomain'}, function(output){
    								if(output == "sucess")
    									{
                                            redirectPage('userHome.php','userhome');
    									}
    							});
    					}
                 }		
			}
		//delete subdomain in mysites with the blog_id
		function DeleteSubdomainWithBlog(domain_id,blog_id)
			{
			 if(domain_id != '' && blog_id != '')
                 {
                    var str = 'Are you sure want to Delete?';					
    				if(confirm(str))
    					{
    						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'blog_id':blog_id,'action':'DeleteDomainWithBlog'}, function(output){
								if(output == "sucess")
									{
                                        redirectPage('userHome.php','userhome');
									}
    						 });
    					}	
                 }					
			}
		
		//delete subdomain in mysites with the store_id
		function DeleteSubdomainWithStore(domain_id,store_id)
			{
			  if(domain_id != '' && store_id != '')
                 {
    				var str = 'Are you sure want to Delete?';					
    				if(confirm(str))
    					{
    						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'store_id':store_id,'action':'DeleteDomainWithStore'}, function(output){
								if(output == "sucess")
									{
                                        redirectPage('userHome.php','userhome');
									}
							});
    					}
                 }   		
			}					
		function openOptions(domain_id)
			{
				$('#options_'+domain_id).toggle('show');
			}
		
		//function for full screen
		 function FullSreeen()
		 	{
				var docElement, request;
			    docElement = document.documentElement;
			    request = docElement.requestFullScreen || docElement.webkitRequestFullScreen || docElement.mozRequestFullScreen || docElement.msRequestFullScreen;			
			    if(typeof request!="undefined" && request){
			        request.call(docElement);
			    }
			}
		
		//kathir this function is used to update the default function in the file
		function updateBlogSetting()
			{
				var details = $('#blogsettingform').serialize();
				$.post(jssitebaseUrl+'/main.php',$('#blogsettingform').serialize(), function(output){
						if(output == "sucess")
							{
                                redirectnew();
							}
							});
			}
		//this function is used to show the comment block 
		function ShowCommentBlock(domain_id,theme_id,blog_id)
			{
				$('#sitelisting_id').hide();
				$('#MyAccPageInner').hide();
                if(domain_id != '')
                    {
                        if(theme_id!=0)
        					{
        						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'theme_id':theme_id,'action':'showcommenttheme'}, function(output){
        							var arr = output.split("|@|");
        							if(arr[0] == "show")
        								{
        									$('#blogcomment').show();
        									$('#blogcomment').html(arr[1]);
        								}	
        									});
        					}
        				else
        					{
        						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'blog_id':blog_id,'action':'showcommentblog'}, function(output){
        							var arr = output.split("|@|");
        							if(arr[0] == "show")
        								{
        									$('#blogcomment').show();
        									$('#blogcomment').html(arr[1]);
        								}	
        									});
        					}
                    }				
			}
		//this function is used to show the form entries block 
		function ShowFormBlock(domain_id,theme_id,blog_id)
			{
			 if(domain_id != '')
                 {
                    $('#MyAccPageInner').hide();
    				$('#sitelisting_id').hide();
    				if(theme_id)
    					{
    						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'theme_id':theme_id,'action':'showblockformtheme'}, function(output){
    						var arr = output.split("|@|");
    							if(arr[0] == "show")
    								{
    									$('#formentries').show();
    									$('#formentries').html(arr[1]);
    								}
    									});
    					
                        }
    				else
    					{
    						$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'blog_id':blog_id,'action':'showblockformblog'}, function(output){
    							if(arr[0] == "show")
    								{
    									$('#MyAccPageInner').show();
    									$('#formentries').html(arr[1]);
    								}
    									});
    					}		
                 }
								
			}
	//this function is used in the comments popup 	
	function getAllTheComments(domain_id)
		{			
            if(domain_id != '')
                {
                    $('#postblog').show();
        			$('#settingblog').hide();
        			$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'commentblogpopup'}, function(output){
        				var arr = output.split("|@|");
        				if(arr[0] == "show")
        					{
        						$('#commentblogid').show();
        						$('#commentblogid').html(arr[1]);
        					}	
        			});	
                }			
		}
	
	// this function is used to delete the all the selected field
	function selectAllForDelete()
		{
			var selectallvar = $('#selectall').is(':checked');
			if(selectallvar == true){
				$(".classcomment").attr("checked", "checked");
			}else{
				$(".classcomment").removeAttr("checked");
			}
			
			var checkedvar = $('.classcomment').is(':checked');
			if(checkedvar == true){
			$('#deletebutton').show();
			$('#spambutton').show();
			$('#approvebutton').show();
			}else{
			$('#deletebutton').hide();
			$('#approvebutton').hide();	
			$('#spambutton').hide();
				}
		}
	// this function is used to delete the particular one only	
	function selectSingleForDelete()
		{
			if($(".classcomment").length == $(".classcomment:checked").length) {
					$("#selectall").attr("checked", "checked");
					$('#deletebutton').show();
					$('#spambutton').show();
					$('#approvebutton').show();	
				}
			else 
				{
	        		$("#selectall").removeAttr("checked");	        
			        if($(".classcomment:checked").length > 0){
						$('#deletebutton').show();
						$('#approvebutton').show();
						$('#spambutton').show();	
					}else{
						$('#deletebutton').hide();
						$('#approvebutton').hide();	
						$('#spambutton').hide();
					}
	    	    }	
		}	
	// this function is used to update the delete blog comment 
	function deleteBlogComment(domain_id)
		{
		  if(domain_id != '')
              {
                var str = 'Are you sure want to Delete?';
    			if(confirm(str))
    				{
    						var checkedvalues = $('input:checkbox:checked.classcomment').map(function () {
    				  			return this.value;
    					}).get();					
    					$.post(jssitebaseUrl+'/userHome.php',{'domain_id':domain_id,'checkedvalues[]':checkedvalues,'action':'blogcommentdelete'}, function(output){
    						var arr = output.split("|@|");
    						if(arr[0] == 'delete'){
    							$('#blogcomment').show();
    							$('#blogcomment').html(arr[1]);
    							$("#errormsg").addClass('successmsg').html("Comment Deleted Successfully");
    						}
    					});
    					
    				}
              }				
		}	
			
	  // this function is used to update the delete blog comment in popupcomment
	  function deleteBlogCommentPopup(domain_id)
		{
		  if(domain_id != '')
              {
                var str = 'Are you sure want to Delete?';
    			if(confirm(str))
    				{
    					var checkedvalues = $('input:checkbox:checked.classcomment').map(function () {
    				  			return this.value;
    					}).get();					
    					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'checkedvalues[]':checkedvalues,'action':'blogcommentdeletepopup'}, function(output){
    						var arr = output.split("|@|");
    						if(arr[0] == 'delete'){
    							$('#commentblogid').show();
    							$('#commentblogid').html(arr[1]);
    							$("#errormsg").addClass('successmsg').html("Comment Deleted Successfully");
    						}
    					});
    					
    				}	
              }			
		}
	function spamBlogCommentPopup(domain_id)
		{
		  if(domain_id != '')
              {
                var str = 'Are you sure want to Spam this record?';
    			if(confirm(str))
    				{
    						var checkedvalues = $('input:checkbox:checked.classcomment').map(function () {
    				  			return this.value;
    					}).get();					
    					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'checkedvalues[]':checkedvalues,'action':'blogcommentspampopup'}, function(output){
    						var arr = output.split("|@|");
    						if(arr[0] == 'spam'){
    							$('#commentblogid').show();
    							$('#commentblogid').html(arr[1]);
    							$("#errormsg").addClass('successmsg').html("Comment spam Successfully");
    						}
    					});
    					
    				}
              }				
		}
	//this function used to update status in comment details table
	function approveCommentStatus(domain_id)
		{
		  if(domain_id)
              {
                var str = 'Are you sure want to Approve this comment?';
    			if(confirm(str))
    				{
    						var checkedvalues = $('input:checkbox:checked.classcomment').map(function () {
    				  			return this.value;
    					}).get();					
    					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'checkedvalues[]':checkedvalues,'action':'blogcommentupdateapprove'}, function(output){
    						var arr = output.split("|@|");
    						if(arr[0] == 'approve'){
    							$('#commentblogid').show();
    							$('#commentblogid').html(arr[1]);
    							$("#errormsg").addClass('successmsg').html("Comment Approved Successfully");
    							redirectnew();
    						}
    					});
    					
    				}
              }			
		}

	//main popup calling 																
	$(document).ready( function(){
		var popuse = $('#popupuse').val();		
		if(popuse==1)
			{
				$('.modalPopBg').show();
				$('#myModal').show();
			}
	});
	//popup close
	function popupclose()
		{	
			$('.modalPopBg').hide();
		    $('#myModal').hide();
		}
	//change author content
	function changeAuthorContent(domain_id)
		{
		  if(domain_id)
              {
                $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'changeauthor'}, function(output){
    				var arr = output.split("|@|");
    					if(arr[0] == 'blogarea')
    						{
    							$('#author_id').show();
    							$('#author_id').html(arr[1]);
    						}
    					else
    						{
    							return false;
    						}
    			});	
              }			
		}
	//outside click of author in the blog 
	function changeOutAuthorContent(domain_id)
		{
		  if(domain_id)
              {
                $(document).one('click',function(event){
    				if($(event.target).closest("#toolbar,.authorTxtBg").length == 0) {
    					var author = $('#authorcontent').html();
    					$.post(jssitebaseUrl+'/main.php',{'author':author,'domain_id':domain_id,'action':'changeoutauthor'}, function(output){
    						var arr = output.split("|@|");
    							if(arr[0] == 'outblog')
    								{
    									$('#author_id').show();
    									$('#author_id').html(arr[1]);
    								}
    							else
    								{
    									return false;
    								}
    					});	
    				}
    			});
              }			
		}
	//change archives content
	function changeArchivesContent(domain_id)
		{
		  if(domain_id)
              {
                $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'changearchives'}, function(output){
    				var arr = output.split("|@|");
    					if(arr[0] == 'blogarea')
    						{
    							$('#archives_id').show();
    							$('#archives_id').html(arr[1]);
    						}
    					else
    						{
    							return false;
    						}
    			});	
              }			
		}
	//change archives when click outside file
	function changeOutArchivesContent(domain_id)
		{
		  if(domain_id)
              {
                $(document).one('click',function(event){
    				if($(event.target).closest("#toolbar,.achiverTxtBg").length == 0) {
    						var archives = $('#archivescontent').html();
    						$.post(jssitebaseUrl+'/main.php',{'archives':archives,'domain_id':domain_id,'action':'changeoutarchives'}, function(output){
    							var arr = output.split("|@|");
    								if(arr[0] == 'outblog')
    									{
    										var basictab = $(window).width();
    										//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
    										//$(".mainLeftPanelUlContent").css("width",basictab);
    										$('#archives_id').show();
    										$('#archives_id').html(arr[1]);
    									}
    								else
    									{
    										return false;
    									}
    						});	
    				}
    			});
              }			
		}
		//change archives content
	function changeCategoriesContent(domain_id)
		{
			if(domain_id)
                {
                    $.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'changecategories'}, function(output){
        				var arr = output.split("|@|");
        					if(arr[0] == 'blogarea')
        						{
        							
        							$('#cat_id').show();
        							$('#cat_id').html(arr[1]);
        						}
        					else
        						{
        							return false;
        						}
        			});	
                }			
		}
	//change archives when click outside file
	function changeOutCategoriesContent(domain_id)
		{
		  if(domain_id)
             {
    			var categories = $('#categoriescontent').val();
    			$.post(jssitebaseUrl+'/main.php',{'categories':categories,'domain_id':domain_id,'action':'changeoutcategories'}, function(output){
    				var arr = output.split("|@|");
    					if(arr[0] == 'outblog')
    						{
    							$('#cat_id').show();
    							$('#cat_id').html(arr[1]);
    						}
    					else
    						{
    							return false;
    						}
    			});	
            }
		}	
	// this function is used to send the message in the blog message from 
	function newMessageSubmitForBlog()
		{	
			var username		=	$("#firstname").val();
			var email			=	$("#email").val();
			var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;		
			var comment		=	$("#comment").val();		
			if(username == ''){
				alert("Please enter First Name");
				$("#firstname").focus();
				return false;
			}
			if(email == ''){
				alert("Please enter Email");
				$("#email").focus();
				return false;
			}
			if(!email.match(email_check)){
				alert("Please enter Valid Email");
				$("#email").focus();
				return false;
			}
			if(comment == ''){
				alert("Please enter comments to blog owner");
				$("#comment").focus();
				return false;
			}
		
			$.post(jssitebaseUrl+'/source.php',$('#messageform').serialize(), function(output){
				var arr = output.split("|@|");
				if(arr[0] == "send")
					{
						$('#message_formid').show();
						$('#message_formid').html(arr[1]);
					}	
									});	
		}
	
	//insert comment function is used to insert a comment for the particulat file 
	function Insertcomment()
		{
			var username		=	$("#name").val();
			var email			=	$("#email").val();
			var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;					
			var comment		    =	$("#comment_reply").val();
			var post_id		    =	$("#post_id").val();		
			var title		    =	$("#title").val();
			
			if(username == ''){
				alert("Please enter  Name");
				$("#name").focus();
				return false;
			}
			else if (username == 'Enter Your Name'){
				alert("Please enter  Name");
				$("#name").focus();
				return false;
			}
			if(email == ''){
				alert("Please enter Email");
				$("#email").focus();
				return false;
			}
			else if(email == 'Enter Your E-Mail'){
				alert("Please enter Email");
				$("#email").focus();
				return false;
			}
			if(!email.match(email_check)){
				alert("Please enter Valid Email");
				$("#email").focus();
				return false;
			}
			
			if(comment == ''){
				alert("Please enter comments");
				$("#comment_reply").focus();
				return false;
			}
			else if(comment == 'Enter Your Comments'){
				alert("Please enter comments");
				$("#comment_reply").focus();
				return false;
			}
            
			$.post(jssitebaseUrl+'/ajaxFile.php',$('#leaveform').serialize(),function(output){
			 	    var arr = output.split("|@|");
			         	if(arr[0] == "sucess")
							{	
						     	$('#commentfirst').show();
								$('#success_leave').html(arr[1]);
                                setTimeout("hideSuccess('success_leave','successmsg')", 2000);
                                 if(jssiteuserfriendly=="N")
                                    {
                                        window.location = jssitebaseUrl+'/postComment.php?post_id='+post_id+'&post_title='+title; 
                                    }
                                    else
                                    {
                                        window.location = jssitebaseUrl+'/postcomment/'+post_id+'/'+title; 
                                    }                                
							}						
							
					 
				});	
		}

	//submit form for the contact as page 
	function SubmitContact(id)
		{
			
            var username		=	$("#firstname_"+id).val();
			var lastname		=	$("#lastname_"+id).val();
			var email			=	$("#email_"+id).val();
			var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;					
			var comment		    =	$("#comment_contact_"+id).val();	
			var firstreq        =   $("#firstreq_"+id).val();
			var lastreq  		=   $("#lastreq_"+id).val();
			var emailreq		=   $("#emailreq_"+id).val();
			var commreq			=   $("#commreq_"+id).val();
			var captcha         =   $("#capt"+id).val();
			var captcha_code    =   $("#captchacode_"+id).html();
            var tagtype;
            $(".errormsgSimple").html('');
			$(":required").each(function(){
			 $(".spanerror").remove();
             if($(this).attr("type")!=undefined)
             {
                tagtype = $(this).attr("type");
                if( tagtype == 'text' && $(this).val()=='' )
                {
                    $(this).after("<span class='spanerror' style='color:#FF0000'><br>Please enter "+$(this).attr("name")+"</span>");
                    $(this).focus();
                    return false;
                }
                if( tagtype == 'radio' || tagtype == 'checkbox')
                {  
                    var name=$(this).attr("name"); 
                    if($("[name='"+name+"']:checked").length==0)
                    {
                        $(this).after("<span class='spanerror' style='color:#FF0000'><br>Please select "+name.replace("[]",'')+"</span>");
                        $(this).focus();
                        return false;
                    }
                    
                }
                if(tagtype  == 'file' && $(this).val()=='' )
                {
                    
                    $(this).after("<span class='spanerror' style='color:#FF0000'><br>Please select file</span>");
                    $(this).focus();
                    return false;
                }
             }
             else
             {
                tagtype = $(this).prop('tagName');   
                             
                if(tagtype=='TEXTAREA' && $(this).val()=="")
                {
                    var name=$(this).attr("name"); 
                    $(this).after("<span class='spanerror' style='color:#FF0000'><br>Please enter "+name+"</span>");
                    $(this).focus();
                    return false;
                }
                if(tagtype=='SELECT' && $(this).val()=="")
                {
                    var name=$(this).attr("name"); 
                    $(this).after("<span class='spanerror' style='color:#FF0000'><br>Please select "+name+"</span>");
                    $(this).focus();
                    return false;
                }
             }
			});
            
            /*if(firstreq != '0')
				{
					if(username == ''){
						
                        $("#error_msg1").addClass('errormsgSimple').html("Please enter  Name");
						$("#firstname_"+id).focus();
						return false;
					}
				}
			if(lastreq != '0')
				{
					if(lastname == ''){
					    $("#error_msg1").hide();
					    $("#error_msg2").addClass('errormsgSimple').html("Please enter Last Name");					
						$("#lastname_"+id).focus();
						return false;
					}
				}
			if(emailreq != '0')
				{
					if(email == ''){
					   $("#error_msg2").hide();
                       $("#error_msg3").addClass('errormsgSimple').html("Please enter Email");						
						$("#email_"+id).focus();
						return false;
					}
					if(!email.match(email_check)){
                        $("#error_msg3").addClass('errormsgSimple').html("Please enter Valid Email");						
						$("#email_"+id).focus();
						return false;
					}	
				}
			if(commreq != '0')
				{
					if(comment == ''){
                        $("#error_msg3").hide();
                        $("#error_msg4").addClass('errormsgSimple').html("Please enter comments");					
						$("#comment_contact_"+id).focus();
						return false;
					}
				
			if(captcha=='')
            {
                $("#capterror"+id).addClass('errormsgSimple').html("Please enter captcha code");
                return false;
            }}    */     
            if(captcha!='')
            {               
                if(captcha_code == captcha)
                {
                	
                    $("#contactform"+id+" [name=captcha]").removeAttr("name");

                    $("#contactform"+id).ajaxForm({ 
				      
					  complete: function(xhr) {   
				        var arr = (xhr.responseText);
                        alert(arr);
                        location.href=location.href;
                        
			         } 
					 }).submit(); 
                }else
                {
                	// $("#captcha"+id).attr("src",jssitebaseUrl+'/captcha.php?formcode='+id);
                	 refrashCaptchacode(id);
                     $("#capterror"+id).addClass('errormsgSimple').html("Please enter valid captcha code");
                }

                /*$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'CaptchaValid','formcode':id,'captcha':captcha},function(data){            
                   if(data=='valid')
                   {
                    
                    $("#contactform"+id+" [name=captcha]").removeAttr("name");
                    $("#contactform"+id).ajaxForm({ 
				      
					  complete: function(xhr) {                
				        var arr = (xhr.responseText).split("|@|");
                        alert(arr);
                        location.href=location.href;
                        
			         } 
					 }).submit(); 
                    
                   }
                   else
                   {
                        $("#captcha"+id).attr("src",jssitebaseUrl+'/captcha.php?formcode='+id);
                        $("#capterror"+id).addClass('errormsgSimple').html("Please enter valid captcha code");
                        
                   }
                });*/
            }
			return false;	
						
		}							
		function changecaptcha(formid)
        {     
            $("#captcha"+formid).attr("src",'captcha.php?formcode='+formid);   
    
        }
function validateCaptcha(formid)
{
    
}
	//kathir function ends
	//Add Domain Process
	function addDomain(domain_name,domain_id)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domainname':domain_name,'domain_id':domain_id,'action':'domainAdd'}, function(output){
				
				if(output == 'success'){
					window.location = jssitebaseUrl+'/myhome/'+domain_id+'/success';
					
				}else{
					$("#errormsg").addClass('errormsg').html('Domain Not Added').show();
				}
			});
		}
		
		//ShowPages 
	function showPages(pageid,parent_page_id){
		//document.getElementById('storepage').style.display = "none";
		document.getElementById('settingpage').style.display = "none";
		document.getElementById('build').style.display = "none";
		
		$('.mainLeftPanel').hide();
		$('#themelist').hide();
        $(".ajaxloadImg").show();
        setTimeout(function() {
        $(".ajaxloadImg").hide();
        document.getElementById('pages').style.display = "";
        },1000);
		var xmlhttp;
			
			if(window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					ajaxsortingandclickfun();
					document.getElementById("pages").innerHTML = xmlhttp.responseText;
					$('#dropdownpage_'+parent_page_id).show();
                    reloadPagelist()
				}	
			}
			
			xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=showPage&pageid="+pageid+'&parent_page_id='+parent_page_id,true);
			xmlhttp.send();
			return false;
	}
	//Save Page
	function savePage(domain_id){
		var page_id         = $('#pageid').val();
		var page_parent_id  = $('#page_parent_id').val();
		var page_name       = $('#page_name').val();
        var link_site       = $('#link_site').val();
		var page_layout     = $('input[name="page_layout"]:checked').val();
        var link_status     = $('input[name="link_status"]:checked').val();
        var banner_status   = $('input[name="banner_status"]:checked').val();
       	var page_title      = $('#page_title').val();
		var page_desc       = $('#page_desc').val();
		var meta_key        = $('#meta_key').val();
		var footer_code     = $('#footer_code').val();
		var header_code     = $('#header_code').val();
		if ($('#hide_navigation').is(":checked"))
			{
			  var hide_navigation = 1;
			}
		else
			{
				var hide_navigation = 0;
			}
		$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':page_id,'domain_id':domain_id,'page_name':page_name,'page_layout':page_layout,'hide_navigation':hide_navigation,'page_title':page_title,'page_desc':page_desc,'meta_key':meta_key,'footer_code':footer_code,'header_code':header_code,'link_site':link_site,'link_status':link_status,'banner_status':banner_status,'action':'editPage'}, function(output){
				
					$("#pages").html(output);
                    $('#sucs_page').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>Sayfa ayarları kaydedildi!</div>");
					setTimeout("hideSuccess('sucs_page','successmsg')", 2000);
					$('#dropdownpage_'+page_parent_id).show();
                    reloadPagelist();
					
			});
	}
	//Copy Page
	function copyPage(){
		var page_id       = $('#pageid').val();
		var page_name     = $('#page_name').val();
		var page_layout   = $('input[name="page_layout"]:checked').val();
		var link_status   = $('input[name="link_status"]:checked').val();
		var page_title    = $('#page_title').val();
		var page_desc     = $('#page_desc').val();
		var meta_key      = $('#meta_key').val();
		var footer_code   = $('#footer_code').val();
		var header_code   = $('#header_code').val();
		if ($('#hide_navigation').is(":checked"))
			{
			  var hide_navigation = 1;
			}
		else
			{
				var hide_navigation = 0;
			}
		$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':page_id,'page_name':page_name,'page_layout':page_layout,'hide_navigation':hide_navigation,'page_title':page_title,'page_desc':page_desc,'meta_key':meta_key,'footer_code':footer_code,'header_code':header_code,'action':'copyPage'}, function(output){  
			$("#pages").html(output);
			});
	}
		//Delete Page
	function deletePage(domain_id){
		var page_id = $('#pageid').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':page_id,'domain_id':domain_id,'action':'deletePage'}, function(output){  
			$("#pages").html(output);
            $('#sucs_page').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully deleted your page details</div>");
					setTimeout("hideSuccess('sucs_page','successmsg')", 2000);
			});
	}
	
	//Add Page
	function addPageForDomain(){
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'addPage'}, function(output){
				var arr = output.split("|@|");
				if(arr[0] == 'success')
					redirectUrl(arr[1]);  
				else
                    {
                        $(".ajaxloadImg").show();
                        setTimeout(function() {
                        $(".ajaxloadImg").hide();
                        $("#pages").html(output);
                        },1000);
                    }
                
					
			});
	}
    //for show pop up at that time of click  add pages
    function showaddpagelist()
        {
            $("#listAddPage").show();
        }
    //at that time of clik external link in add pages
    function showExternalLink()
        {
            $.post(jssitebaseUrl+'/ajaxFile.php',{'action':'addLink'}, function(output){
				var arr = output.split("|@|");
				if(arr[0] == 'success')
					redirectUrl(arr[1]);
				else
			        {
                        $(".ajaxloadImg").show();
                        setTimeout(function() {
                        $(".ajaxloadImg").hide();
                        $("#pages").html(output);
                        },1000);
                    }
			});
        }	
	//savesubdomain
	function SaveSubDomain()
		{
			var subdomain_url = $('#subdomain_url').val();
			$.post(jssitebaseUrl+'/main.php',{'subdomain_url':subdomain_url,'action':'updateSubDomain'}, function(output){
				var arr = output.split("|@|");
					if(arr[0]=='error')
						{								
							$('#subdomainBlock').html(arr[1]);
							$("#errormsg").addClass('errormsg').html('Domain Already Exists').show();
						}
					else 
						{								
							$('#subdomainBlock').html(arr[0]);
							$("#errormsg").addClass('successmsg').html("Domain updated Successfully");
						}	
				});
		}
	
	//save description
		function SaveDescription()
			{
		 		var site_description = $('#sitedescriptionname').val();
				$.post(jssitebaseUrl+'/main.php',{'site_description':site_description,'action':'savedescription'}, function(output){
						if(output)
							{
						 		$('#DescriptionBlock').html(output);
                                $('#succ_desc').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully saved your site description</div>");
							    setTimeout("hideSuccess('succ_desc','successmsg')", 2000);
							}
					});
			}
		//save keyword
		function SaveKeyword()
			{
				var site_keyword = $('#site_metakeyword').val();
				$.post(jssitebaseUrl+'/main.php',{'site_keyword':site_keyword,'action':'savekeyword'}, function(output){					
						if(output)
							{
								$('#keywordBlock').html(output);
                                $('#succ_key').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully saved your site Keywords</div>");
							    setTimeout("hideSuccess('succ_key','successmsg')", 2000);
							}
					});
			}
		//save Footer
		function SaveFooter()
			{
				var site_footer = $('#footercode').val();
				$.post(jssitebaseUrl+'/main.php',{'site_footer':site_footer,'action':'saveFooter'}, function(output){
						if(output)
							{
								$('#FooterBlock').html(output);
                                $('#succ_footer').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully saved your footer code details</div>");
							    setTimeout("hideSuccess('succ_footer','successmsg')", 2000);
							}
					});
			}	
		//save Header
		function SaveHeader()
			{
				var site_header = $('#headercode').val();
				$.post(jssitebaseUrl+'/main.php',{'site_header':site_header,'action':'saveHeader'}, function(output){					
						if(output)
							{
								$('#HeaderBlock').html(output);
                                $('#succ_header').html("<div  style='color:#008000; margin-left:100px; padding-bottom:10px;' id='spn'>You are successfully saved your header code details</div>");
							    setTimeout("hideSuccess('succ_header','successmsg')", 2000);
							}
					});
			}	
			//Show Build Page
			function showBuildPages(domainid){
			 
                $("#toolssection").show(); 
				//document.getElementById('storepage').style.display = "none";
				document.getElementById('settingpage').style.display = "none";
				document.getElementById('pages').style.display = "none";
				document.getElementById('build').style.display = "";
				$('.mainLeftPanel').show();
				$('#designleft').hide();
				$('#draggable_content').show();
				$('#themelist').hide();
				$.get(jssitebaseUrl+'/js/jquery.nanoscroller.min.js');
				
				var xmlhttp;
					
					if(window.XMLHttpRequest)
					{
						xmlhttp = new XMLHttpRequest();
					}
					else
					{
						xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function()
					{
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
						{
							ajaxsortingandclickfun();
							document.getElementById("build").innerHTML = xmlhttp.responseText;
							reloadPagelist();
						}	
					}
					
					xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=buildpage&domainid="+domainid,true);
					xmlhttp.send();
					return false;
			}
			function showPageListinBuild(pageid,domainid,pagename){
				
				var xmlhttp;
                //$( "#banner_imageLibrary,#banner_slider_imageLibrary" ).tabs();
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						ajaxsortingandclickfun();
						document.getElementById("build").innerHTML = xmlhttp.responseText;
						reloadPagelist();
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=showPageList&pageid="+pageid+"&domainid="+domainid,true);
				xmlhttp.send();
				
				
				if(pagename == 'store' || pagename == 'STORE' || pagename == 'Store'){
					 $(".storeBannerShow").hide();
					}
					else{
						 $(".storeBannerShow").show();	
					}
				return false;
			}							
					
			//Update Social Plugin
			function updateSocial(id){
					var domain_id = $('#domain_id_'+id).val();
					var page_id = $('#page_id_'+id).val();
					var page_list_id = $('#page_list_id_'+id).val();
					var fb = $('#fb_'+id).val();
					fb = fb.replace("http://","");
					fb = "http://"+fb;
					var tw = $('#tw_'+id).val();
					tw = tw.replace("http://","");
					tw = "http://"+tw;
					var ln = $('#ln_'+id).val();
					ln = ln.replace("http://","");
					ln = "http://"+ln;
					var mail = $('#mail_'+id).val();
                    var socialalign=$("#socialalign"+id).val();
					if(tw == 'http://')
						{
							tw='';
						}
					if(fb == 'http://')
						{
							fb='';
						}
					if(ln == 'http://')
						{
							ln='';
						}
					if(fb != '' || tw != '' || ln != '' || mail != '')
						{
							$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'fb':fb,'tw':tw,'ln':ln,'mail':mail,'socialalign':socialalign,'action':'updateSocialPlugin'}, function(output){
								$('#pluginShow_'+page_list_id).hide();
                                
								//redirectnew();
							});
						}
					else
						{
							$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'fb':fb,'tw':tw,'ln':ln,'mail':mail,'socialalign':socialalign,'action':'updateSocialPlugin'}, function(output){
							$('#pluginShow_'+page_list_id).hide();
                            
								redirectnew();
							});
						}
				}
				
			//Update Title
			function updateTitle(id)
				{					   
				   // $(document).trigger("click");
                    //$(document).unbind("click");
				    $(document).one('click',function(){
				      	var textval  = $('#'+id).html();
    					var title = textval; 
    					var domain_id = $('#domain_id').val();
    					var page_id = $('#page_id').val();
    					var page_list_id = id.split('_');
    					
    					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id[1],'title':title,'action':'updateTitle'}, function(output){
								
                                
    							});
                    
				    });
                }    
			//show design
			function showDesign()
				{
				    $("#toolssection").hide();
					$('#designleft').show();
					$('#draggable_content').hide();
					$('#themelist').hide();
					$('#fontlist').hide();
					
				}
			//show design
			function showContactMail()
				{
					$('#showMailContact').show();
				}
			//change Mail
			function changeMail(pagelistid)
				{
					
					var contactmail = $('#contactmail_'+pagelistid).val(); 
					var domain_id = $('#domain_id').val();
					var page_id = $('#page_id').val();
					var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
					var valid = emailRegex.test(contactmail);
					if(contactmail == ''){
						$("#errtext").removeClass("successmsg");
						$("#errtext").html("Please Enter The Mail Address");
						$("#contactmail").focus();
						return false;
					}
					if(!valid){
						$("#errtext").removeClass("successmsg");
						$("#errtext").html("Please Enter The Valid Mail");
						$("#contactmail").focus();
						return false;
					}
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':pagelistid,'contactmail':contactmail,'action':'updateMail'}, function(output){
						$("#errtext").removeClass("errormsg");
						$("#errtext").addClass("successmsg").html("Email updated successfully");
						$(".successmsg").css({"margin-bottom":"10px"});
						
					});
					return false;
					$(".modal-backdrop").click(function(){
						
					});
					$(".close").click(function(){
						
					});
				}
			//Update page listing
			function updatePageListing(domainid,pageid,name,idval){
				var xmlhttp;
                var inc=0;
                var array_elementids=new Array();
                var tmp;
                $("#loaderMask").show();
	            $(".ui-loader").show();
                $(document).trigger("click");
                setTimeout(function(){
                    $("#droppable_content li").each(function(){
                   if($(this).html()!="")
                   {
                        
                        if($(this).attr("id")!=undefined)
                        {
                            tmp=$(this).attr("id");
                        }
                        else
                        {
                            tmp='000';
                        }    
                        array_elementids[inc]=tmp;
                        inc++;
                   }
                });
                    
                
                	if(window.XMLHttpRequest)
                	{
                		xmlhttp = new XMLHttpRequest();
                	}
                	else
                	{
                		xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
                	}
                	xmlhttp.onreadystatechange = function()
                	{
                		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                		{                    
                            document.getElementById("build").innerHTML = xmlhttp.responseText;
							reloadPagelist();
                		}
                	}
                	xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updatePageList&pageid="+pageid+"&domainid="+domainid+"&name="+name+"&elementids="+array_elementids,true);
                	xmlhttp.send();
                },700);
            	return false;
			//	}
			}
			//Update page listing for column
			function updatePageListingForColumn(domainid,pageid,name,idval,colid,colpageid){
				var xmlhttp;
				$("#loaderMask").show();
	            $(".ui-loader").show();		
                $(document).trigger("click");		
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{						
						document.getElementById("build").innerHTML = xmlhttp.responseText;						
						reloadPagelist();
					}	
				}

				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updatePageListForColumn&pageid="+pageid+"&domainid="+domainid+"&name="+name+"&column_id="+colid+"&columnpagelist="+colpageid,true);
				xmlhttp.send();
				return false;
			}
			//Update page listing For Blog
			function updatePageListingForBlog(domainid,pageid,name,idval,titleforblog){
				var xmlhttp;
                var inc=0;
                var array_elementids=new Array();
                var tmp;
                var datepic = $(".postCommPopInnDate").text();
                setTimeout(function(){
                   $("#droppable_content li").each(function(){
                   
                   if($(this).html()!="")
                   {
                        
                        if($(this).attr("id")!=undefined)
                        {
                            tmp=$(this).attr("id");
                        }
                        else
                        {
                            tmp='000';
                        }    
                        array_elementids[inc]=tmp;
                        inc++;
                   }
                });
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						$('.themewrapper2BgAlign').html(xmlhttp.responseText);
						reloadPagelist();
                        $(".postCommPopInnDate").text(datepic);
						
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updatePageListForBlog&pageid="+pageid+"&domainid="+domainid+"&name="+name+"&title_id="+idval+"&titleforblog="+titleforblog+"&elementids="+array_elementids,true);
				xmlhttp.send();
               },700); 
				return false;
            }    
			//Update page listing For Blog
			function updatePageListingForBlogColumn(domainid,pageid,name,idval,titleforblog,colid,colpageid){
				var xmlhttp;
                var datepic = $(".postCommPopInnDate").text();
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{
						$('.themewrapper2BgAlign').html(xmlhttp.responseText);						
						reloadPagelist();
                        $(".postCommPopInnDate").text(datepic);
						
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updatePageListForBlogColumn&pageid="+pageid+"&domainid="+domainid+"&name="+name+"&title_id="+idval+"&titleforblog="+titleforblog+"&column_id="+colid+"&colpageid="+colpageid,true);
				xmlhttp.send();
				return false;
			}
			//Update Font Styling
			function updateFontStyling(domainid,pageid,page_list_id,name,upval){
				var xmlhttp;
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{					
						redirectnew();						
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updateFontStyle&page_list_id="+page_list_id+"&pageid="+pageid+"&domainid="+domainid+"&name="+name+"&updval="+upval,true);
				xmlhttp.send();
				return false;
			}
			//update font styling for contact form heading
			function updateFontForContact(contactid,page_id,name,upval){
				var xmlhttp;
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{						
						redirectnew();						
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updateFontForContact&contact_id="+contactid+"&pageid="+page_id+"&name="+name+"&updval="+upval,true);
				xmlhttp.send();
				return false;
			}
			
			//Update Font Styling
			function updateRemoveStyle(domainid,pageid,page_list_id,name){
				var xmlhttp;
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function()
				{
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
					{					
						redirectnew();						
					}	
				}
				xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=updateRemoveStyle&page_list_id="+page_list_id+"&pageid="+pageid+"&domainid="+domainid+"&name="+name,true);
				xmlhttp.send();
				return false;
			}
		
		//update Theme selection
		function updateTheme(themeid,themename,domainid)
			{
			 if(themeid != '' && domainid != '')
                 {                   
                    var actclass = 'ul#color_'+themeid+' li.active';
    				var themeColor = $(actclass).attr("id");
    				themeColor = themeColor.split('_');
    				$.post(jssitebaseUrl+'/ajaxFile.php',{"theme_id":themeid,"theme_name":themename,"domain_id":domainid,"themecolor":themeColor[0],"action":"updatetheme"},function(response){			
    				    
    					if(response == "success")
    						{
    							redirectnew();						
    						}
    				});	
                 }				
			}
			
		//update Blog Theme selection
		function updateBlog(blogid,blogname,domainid)
			{
			 if(blogid != '' && domainid != '')
                 {
    				var actclass = 'ul#blogcolor_'+blogid+' li.active';
    				var blogColor = $(actclass).attr("id");
    				blogColor = blogColor.split('_');
    				$.post(jssitebaseUrl+'/ajaxFile.php',{"blog_id":blogid,"blog_name":blogname,"domain_id":domainid,"blogcolor":blogColor[0],"action":"updateblog"},function(response){				
    					if(response == "success")
    						{
    							redirectnew();						
    						}
    				});	
                  }  
			}	
		
		//Update Desc
			function updateDesc(id)
				{
				    $(document).click(function(){				        
				    
				 	var textval  = $('#'+id).html();
					var title = textval; 
					var domain_id = $('#domain_id').val();
					var page_id = $('#page_id').val();
					var page_list_id = id.split('_');
					
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id[1],'title':title,'action':'updateDesc'}, function(output){
						
							});
               });             
                           
				}
			//update click here to edit ttile in contact form
			function updateContactFormTitle(id)
				{
					var textval  = $('#'+id).html();
				 	var title = textval; 
					var id = id.split('_');
				 
					$.post(jssitebaseUrl+'/ajaxFile.php',{'id':id[1],'title':title,'action':'updateTitleForContactForm'}, function(output){
						
							});
				}
			//Update Desc
			function updateImgTitle(id)
				{
				   
				    $(document).click(function(){
				    
					var textval  = $('#'+id).html();
					var title = textval;
					var domain_id = $('#domain_id').val();
					var page_id = $('#page_id').val();
					var page_list_id = id.split('_');
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id[1],'title':title,'action':'updateImageTitle'}, function(output){
							
                            });
                      });      
				}
			//Delete Details
			function deleteList(domain_id,page_id,page_list_id,name)
				{
				    if(domain_id != '' && page_id != '' && page_list_id != '')
                        {
                            $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'name':name,'action':'deleteDetails'}, function(output){
    					     redirectnew();
    						});
                        }				        
				}
			//for home page class active
			function homePageActiveClass(id)
				{
					$('.navListtop').removeClass('active');
					$('#'+id).addClass('active');
				}
			//Show Contact Form Popup
			function showPopup(page_id,page_list_id,domain_id,list)
				{
				    if(page_id != '' && page_list_id != '' && domain_id != '')
                        {
                            $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'list':list,'action':'contactFormDetails'}, function(output){
        						$('#contactForm').html(output);
        					}); 
                        }					
				}
//Save Details
function saveDetails(page_list_id,domain_id,page_id,labelval)
	{
	    if(page_id != '' && page_list_id != '' && domain_id != '')
            {
				var fieldname = $('#fieldname').val();
				if($("#required").prop("checked"))
					var required = 1;
				else
					var required = 0;
				var instruction = $('#instruction').val();
				var spacing = $('#spacing').val();
				var width = $('#width').val();
				
				$.post(jssitebaseUrl+'/ajaxFile.php',{'page_list_id':page_list_id,'domain_id':domain_id,'page_id':page_id,'labelval':labelval,'fieldname':fieldname,'required':required,'instruction':instruction,'spacing':spacing,'width':width,'action':'updatecontactFormDetails'}, function(output){
						
                    if(output=="BLOG")
                    {            
                        ShowTitlePopup($("#domain_id").val(),$("#title_id").val(),$("#titleforblog").val());
                    }
                    else
                    {
                        $('#contactForm').hide();
    					$('#maska').hide();
    					$("#contactmask").hide();
    					$('#build').html(output);
                        imageReloadPagelist();
                    }                                    
                
				});
           }      
	}
			//krishnaveni function starts
			//this function used to cancel button in my account page
			function myaccountCancel(cancelid)
				{
					$('#'+cancelid).hide();
				}
			//this function used to show individual form details in form details page
			function clickToShowForm(contact_id)
				{
				    if(contact_id)
                        {
                            $.post(jssitebaseUrl+'/ajaxFile.php',{'id':contact_id,'action':'getcontactFormDetails'}, function(response){					
    									$('#showDetForm').html(response);
    						});
                        }
				}
				//this function used to show individual form details in form details page
			function commonForOption(domain_id,draft_id)
				{
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'draft_id':draft_id,'action':'getdraftDetails'}, function(response){
					 	$('#drafts_id').show();
						$('#drafts_id').html(response);
					});
				}
			//this function used to delete form details which is shown in list
			function clickToDelete(id,domain_id)
				{
				  if(id != '' && domain_id != '')
                      {
                        $.post(jssitebaseUrl+'/ajaxFile.php',{'id':id,'domain_id':domain_id, 'action':'deletecontactFormDetails'}, function(response){    
								$('#formentries').show();
								$('#formentries').html(response);
    					});
                      }						
				}
			//Publish the Web Page
			function publishPage(domain_id)
				{
				    $(document).trigger("click");
				     if(domain_id)
                    {
                        $(".loadingurl_gif").show();
                        $('#domainname').html("");                        
                        $('#publish').show();
                       	$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id, 'action':'publishPage'}, function(response){
                       	    
    						output = response.split('|@|');
    						if(output[0] == "success")
    							{ 
    							    //$('#domainname').html("<a href="+output[1]+" target='_blank'>"+output[1]+"</a>").hide();    							   
                                    $(".loadingurl_gif").hide();
                                    $(".publishUrl").show(); 
                                    $('#domainname').html("<a href="+output[1]+" target='_blank'>"+output[1]+"</a><br>  Şifre : "+ output[2]);
                                    
    							}
                            else if(output[0] == "Not Ready")  
                                {                                    
                                    $('#domainname').html("<a href="+output[1]+" target='_blank'>"+output[1]+" <span class='arrowRight'>"+output[0]+"</span>");
                                } 
                                $(document).unbind("click");     
    					});
                    }				    
				}
			
			function updateColoumCount(tdcount,pagelistid){
				$.post(jssitebaseUrl+'/ajaxFile.php',{'tdcount':tdcount,'page_list_id':pagelistid, 'action':'updateColumncount'}, function(response){
						//ajaxsortingandclickfun();
						$('#column'+pagelistid).html(response);
						reloadPagelist();
				});
			}
			
			//sorting and click ajax function
			function ajaxsortingandclickfun()
				{
					$(document).ready(function(){
					   
						/*$( ".uploadImgBg img.imagechange" ).hover(function(){
							$(this).resizable({
							handles: 'se',
							aspectRatio: true,
							resize: function(event, ui) {
								var outer = $("#rightColumn").width();
								if(ui.position.left<0) { ui.position.left = 0; }
								if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
							},
							stop: function(event, ui) {
							 
								var width = ui.size.width;
								var height = ui.size.height;
                               
								var idimg = $(this).parent("a").parent(".uploadImgBg").parent().attr("title"); 
                                var id = idimg.split('_');
								updateImageForPage(id[1],width,height);
							}	
						});	
						});*/
						$('#photoimg').die('click').live('change', function()			{ 
						        $("#imageform").ajaxForm({target: '#preview', 
							     beforeSubmit:function(){ 
							     	$("#imageloadstatus").show();
								 	$("#imageloadbutton").hide();
								 }, 
								success:function(){ 
								 $("#imageloadstatus").hide();
								 $("#imageloadbutton").hide();
								 window.location = jssitebaseUrl+'/main.php';
								}, 
								error:function(){ 
								    $("#imageloadstatus").hide();
									$("#imageloadbutton").show();
								} }).submit();
						});
						//var dropheight = $("#dropBox").height()+150;
						//$(".sortouterHeight").css("min-height",dropheight);							
						$(".spacingOption").change(function(){
							var spacingOption = $( ".spacingOption option:selected" ).text();
							if(spacingOption == 'None'){
								$("#buildContact input").css("margin","0px");
							}
							if(spacingOption == 'Small'){
								$("#buildContact input").css("margin","5px 0px");
							}
							if(spacingOption == 'Medium'){
								$("#buildContact input").css("margin","10px 0px");
							}
							if(spacingOption == 'Large'){
								$("#buildContact input").css("margin","15px 0px");
							}
						});
						$(".widthOption").change(function(){
							var widthOption = $( ".widthOption option:selected" ).text();
							if(widthOption == 'Small'){
								$("#buildContact input").css("width","50%");
							}
							if(widthOption == 'Medium'){
								$("#buildContact input").css("width","70%");
							}
							if(widthOption == 'Large'){
								$("#buildContact input").css("width","100%");
							}
						});
						$("#change-fonts-button").click(function(){
							$("#fontlist").slideDown();
						});
						$("#fontlist li").click(function(){
							var fontname = $(this).html();
							$("body").css("cssText", "font-family:"+fontname+" !important");
						});
						
						$(".fontOption").change(function(){
							var fontOption = $( ".fontOption option:selected" ).text();
							$(".container div").css("font-family",fontOption);
						});
						/*$.getScript("js/spectrum.js", function(){
							commonnew();
						});*/
						/*$.getScript("js/jquery.nivo.slider.js", function(){
							slidercommonnew();
						});*/
						$(".mainLeftPanel").removeClass("overhidden");
						$(".mainLeftArrow").hide();
						var basictab = $(window).width();
						//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
						//$(".mainLeftPanelUlContent").css("width",basictab);
						$(".mainRightArrow").css("left",basictab);						
						/*$( ".uploadImgBg img.imagechange" ).hover(function(){
							$(this).resizable({
								handles: 'se',
								aspectRatio: true,
								resize: function(event, ui) {
									var outer = $("#dropBox").width()-16;
									if(ui.position.left<0) { ui.position.left = 0; }
									if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
								},
								stop: function(event, ui) {
								 	var width = ui.size.width;
									var height = ui.size.height;
									var idimg = $(this).parent("a").parent(".uploadImgBg").parent().attr("id"); 
									var id = idimg.split('_');
									updateImageForPage(id[1],width,height);
								}	
							});	
						});*/
						//$( ".uploadImgBg img.imagechangeNew").resizable();
						$( ".uploadImgBg img.imagechangeNew" ).hover(function(){			
							$(this).resizable({
								handles: 'se',
								aspectRatio: true,
								resize: function(event, ui) {
									var outer = $("#dropBox").width()-16;
									if(ui.position.left<0) { ui.position.left = 0; }
									if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
								},
								stop: function(event, ui) {
									var width = ui.size.width;
									var height = ui.size.height;
									var idimg = $(this).parent(".uploadImgBg").parent(".buildImgTxt").parent(".row-fluid").parent().attr("id"); 
									var id = idimg.split('_');
									updateImageForPage(id[1],width,height);
								}	
							});	
						});
						$( ".hideupload img" ).hover(function(){			
							$(this).resizable({
								stop: function(event, ui) {
									var width = ui.size.width;
									var height = ui.size.height;
									var idimg = $(this).parent(".uploadImgBg").parent().attr("id"); 
									var id = idimg.split('_');
									updateImageForPage(id[1],width,height);
								}	
							});	
						});
						
					});
					$(".mainLeftPanel").removeClass("overhidden");
					$(".mainLeftArrow").hide();
					var basictab = $(window).width();
					//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
					//$(".mainLeftPanelUlContent").css("width",basictab);
					$(".mainRightArrow").css("left",basictab);
					$( ".uploadImgBg img.imagechange" ).hover(function(){			
						$(this).resizable({
							handles: 'se',
							aspectRatio: true,
							resize: function(event, ui) {
								var outer = $("#rightColumn").width();
								if(ui.position.left<0) { ui.position.left = 0; }
								if(ui.size.width>outer) { ui.size.width = outer;$(this).css("width",outer); }
							},
							stop: function(event, ui) {
								var width = ui.size.width;
								var height = ui.size.height;
								var idimg = $(this).parent("a").parent(".uploadImgBg").parent().attr("id"); 
								var id = idimg.split('_');
								updateImageForPage(id[1],width,height);
							}	
						});	
					});
					$( ".hideupload img" ).hover(function(){			
						$(this).resizable({
							stop: function(event, ui) {
								var width = ui.size.width;
								var height = ui.size.height;
								var idimg = $(this).parent(".uploadImgBg").parent().attr("id"); 
								var id = idimg.split('_');
								updateImageForPage(id[1],width,height);
							}	
						});	
					});
						
				}
			function slidercommonnew()
				{
					$(document).ready(function(){
						 $('.nivoSlider').nivoSlider();
					});
					$(document).ready(function(){
						 $('#slider2').nivoSlider();
					});
				}
			function commonnew()
				{	
				$("#actionMenu").mouseenter(function() {
					$(this).show();
				}).mouseleave(function() {
					$(this).hide();
				});				
							
							
				$('.nivoSlider').nivoSlider();
				$(document).ready(function() {
				var scrollvalTool = 131;
				var scrollTopTool = $(window).scrollTop();
				if ( (scrollvalTool) < scrollTopTool ) {
					$("#toolbar").addClass("toolzindex");
				}
				else{
					$("#toolbar").removeClass("toolzindex");
				}
				
					var scrollToptable = 131;
					var topDistance1table = $(window).scrollTop();
					if ( topDistance1table > scrollToptable ) {
						
					}
					else{
					
					}
				
			});
			$(window).on('scroll', function() {
					var scrollTop = $(this).scrollTop() + 131;
					$('#toolbar').each(function() {
						var topDistance = $(this).offset().top;
						if ( (topDistance) < scrollTop ) {
						
						}
						else{
							
						}
					});
					$('.sample2').each(function() {
						var topDistance1 = $(this).offset().top;
						if ( (topDistance1) < scrollTop ) {
							
						}
						else{
							
						}
					});
					});
					var blockSort = true;
					$(".leftuldiv").sortable();
					$(".leftuldiv").bind('sortreceive', function () {
						blockSort = false;
					}).bind('sortstop', function (e) {
						if (blockSort) {
							e.preventDefault();
						}
						blockSort = true;
					});
					$(".tableslider").click(function(){
						$("#maska").remove();
						$("#maskatable").show();
					});
					$(".closetableslider").click(function(){
						$("#maskatable").hide();
					});
					
					var tdcount = $(".sample2 tr td").length;
					if(tdcount == 2){
						var columnwidth = $(".sample2").width() - 60;
						var newwidth = columnwidth/tdcount;
						$(".sortcolumn").css("max-width",newwidth);
						$(".sortcolumn").css("width",newwidth);	
					}	
					if(tdcount == 3){
						var columnwidth = $(".sample2").width() - 90;
						var newwidth = columnwidth/tdcount;
						$(".sortcolumn").css("max-width",newwidth);
						$(".sortcolumn").css("width",newwidth);
					}	
					if(tdcount == 4){
						var columnwidth = $(".sample2").width() - 120;
						var newwidth = columnwidth/tdcount;	
						$(".sortcolumn").css("max-width",newwidth);
						$(".sortcolumn").css("width",newwidth);
					}	
					if(tdcount == 5){
						var columnwidth = $(".sample2").width() - 150;
						var newwidth = columnwidth/tdcount;
						$(".sortcolumn").css("max-width",newwidth);
						$(".sortcolumn").css("width",newwidth);
					}
					       	$('.NoSlidePopOuterImg,.NoSlidePopOuterImgSec').click(function(){
            				$('.SlideUploadInner').addClass('in');
            				$('.SlideUploadInner').removeClass('hide');
            			});
            			
            			$('.NoSlideColumPopOuterImg,.NoSlideColumPopOuterImgSec').click(function(){
            				$('.SlideColumnUploadInner').addClass('in');
            				$('.SlideColumnUploadInner').removeClass('hide');
            				$('.sample2').css({'z-index':'inherit'});
            			}); 				
					var basictab = $(window).width();
					//$("#basic_section_content .leftuldiv li").css("width",basictab/10);
					//$(".mainLeftPanelUlContent").css("width",basictab);
							$(".contactform").click(function() {
								$("#toolbar").removeClass("toolzindex");
								//$(this).css({"position":"absolute","z-index":10720,"background":"#ffffff","padding":10+"px","width":100+"%","-moz-box-sizing": "border-box","box-sizing": "border-box","-webkit-box-sizing": "border-box"});
								//$("#contactmask").show();
								//$("#contactmask").css({"z-index":1010});
								//$("#jquery-colour-picker,#toolbar").css({"z-index":21001});
								$(".contactSaveButt").show();
							});	
							$("#dropBox2 .contactform").click(function() {
								//$("#contactmask").hide();
							});
							$("#contactmask").click(function() {
								//$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
								//$("#contactmask").hide();
								$(".contactSaveButt").hide();
							});	
							$(".contactSaveButt").click(function() {
								//$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
								//$("#contactmask").hide();
							});	
				
							$(".showPalette,.text-showPalette").spectrum({
								showPalette: true,
								palette: [["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)","rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)","rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)","rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)","rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)","rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]]
							});
							
							/*$( ".buildSocialIcon input" ).click(function() {
								$( ".socialPop").slideUp( 300 ).delay( 0 ).fadeIn( 300 );
							});*/
							
							$( ".deleteBg" ).click(function() {
								$( "#deletePopup").fadeIn( 300 );
							});
							// Font Size Decrease Changes
							$(".minusfontSize,.text-minusfontSize").click(function(){
								var fontSize = $(".fontSize");
								fontSize.val( +fontSize.val() - 1 );
								var minussize = $(".fontSize").val()+"px";
								$("body").css("font-size",minussize);
							});
							// Font Size Increase Changes
							$(".plusfontSize,.text-plusfontSize").click(function(){
								var fontSize = $(".fontSize");
								fontSize.val( +fontSize.val() + 1 );
								var plussize = $(".fontSize").val()+"px";
								$("body").css("font-size",plussize);
							});
							// Font Weight Changes
							$(".fontWeight").change(function(){
								var fontWeight = $( ".fontWeight option:selected" ).text();
								$(".container *").css("font-weight",fontWeight);
							});
							$(".fontSize").keyup(function(){
								var fontpressSize = $( ".fontSize" ).val()+"px";
								$("body").css("font-size",fontpressSize);
							});
			
							$(".clickheretext").click(function(){
								$(this).removeClass("contenttext");
							});
							
							$(".clickheretext").mouseleave(function(){
								if($(this).text() == ''){
									$(this).addClass("contenttext");
								}
								if($(this).text() != ''){
									$(this).removeClass("contenttext");
								}
							});
							
							$('.BlogNewPost').click(function(){
								$('.BlogNewPostPopup').show();
							
							});
							
							$( ".pagTabClick" ).click(function() {
								$(".pagTabShowHide").slideToggle();
							});
							
							$(".contentedit").mousedown(function(){
								$("#toolbar").show();
								$(".btn-toolbar").remove();
								var id = $(this).attr("id");
								var toolid = id.split('_');
								var tooltop = $(this).offset();
								var tooltoppara = $(this).offset();
								
								if(id == 'updateTitle'){
									$("#toolbar").css("top",(tooltop.top - 50));	
								}
								else{
									$("#toolbar").css("top",(tooltop.top - 80));	
								}
								$("#toolbar").css("left","28%");
								
								if(toolid[0] == 'buildTitle')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','strikethrough','removeFormat']});
								else if(toolid[0] == 'buildPara')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','strikethrough','removeFormat']});
								else if(toolid[0] == 'buildImgTxt')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','removeFormat']});
								else if(toolid[0] == 'buildContact')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','createlink','removeFormat']});
								else if(toolid[0] == 'headingContent')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','removeFormat']});
								else if(toolid[0] == 'headingdescription')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','removeFormat']});
								else if(toolid[0] == 'updateTitle')
									$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertorderedlist','insertunorderedlist','justifyleft','justifycenter','justifyright','justifyfull','createlink','removeFormat']});	
								else
								 	$(this).freshereditor({toolbar_selector: "#toolbar", excludes: ['insertheading4','insertorderedlist','insertunorderedlist','removeFormat']});
								$(this).freshereditor("edit", true);
								var onSampleResized = function(e){
									var columns = $(e.currentTarget).find("td");
									var msg = '';
									columns.each(function(){ msg += $(this).width() + "px; "; });
									var tdone = $(".sample2 tr td:first").width();
									var tdtwo = $(".sample2 tr td:nth-child(2)").width();
									var tdthree = $(".sample2 tr td:nth-child(3)").width();
									var tdfour = $(".sample2 tr td:nth-child(4)").width();
									var tdfive = $(".sample2 tr td:nth-child(5)").width();
									var colpagelist = $(e.currentTarget).find(".columnpagelistid").val();	
									updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist);	
								};	
								var tdone = $(".sample2 tr td:first").width();
								var tdtwo = $(".sample2 tr td:nth-child(2)").width();
								var tdthree = $(".sample2 tr td:nth-child(3)").width();
								var tdfour = $(".sample2 tr td:nth-child(4)").width();
								var tdfive = $(".sample2 tr td:nth-child(5)").width();
								var colpagelist = $(".sample2 tr td").find(".columnpagelistid").val();	
								
								function colResize(){
									$(".sample2").colResizable({
										liveDrag:true, 
										draggingClass:"dragging", 
										onResize:onSampleResized
									});	
								}
							
								function selecttochange(tdcountvar,pagelistid){
									var countval = $(tdcountvar).val();
									var tdcount = $(".sample2 tr td").length;
									
									$(".relative .CRC:first-child").remove();
									$(".sample2 tr td").removeAttr("style");
									if(countval == 2){
										$(".sample2 tr td").css("max-width","50%");	
										if(tdcount >2){
											$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").hide();	
											
										}
										if(tdcount == 2){
											
										}
									}	
									if(countval == 3){
										$(".sample2 tr td").css("max-width","33.33%");
										if(tdcount >3){
											$(tdcountvar).next(".sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").hide();	
											
										}
										if(tdcount == 3){
											
										}
										if(tdcount == 2){
											
											$(tdcountvar).next(".sample2 tr td:nth-child(3)").show();
											
										}
									}	
									if(countval == 4){
										$(".sample2 tr td").css("max-width","25%");
										if(tdcount >4){
											$(tdcountvar).next(".sample2 tr td:nth-child(5)").hide();	
										
										}	
										if(tdcount == 4){
											
										}
										if(tdcount == 3){
											
											$(tdcountvar).next(".sample2 tr td:nth-child(4)").show();
											
										}
										if(tdcount == 2){											
											$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4)").show();
											
										}
									}	
									if(countval == 5){
										$(".sample2 tr td").css("max-width","20%");
										if(tdcount == 5){
											
										}
										if(tdcount == 4){
											
											$(tdcountvar).next(".sample2 tr td:nth-child(5)").show();
											
										}
										if(tdcount == 3){
												
											$(tdcountvar).next(".sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").show()
										
										}
										if(tdcount == 2){
												
											$(tdcountvar).next(".sample2 tr td:nth-child(3),.sample2 tr td:nth-child(4),.sample2 tr td:nth-child(5)").show()
											
										}
									}
								
									$(".sample2 tr td").attr("contenteditable","true");
									updateColoumCount(countval,pagelistid);
								}
							});	
							
					$(document).ready(function(){
							$( "#droppable_content" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#droppable_content').sortable('serialize') } );
				    			},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
							});
							$( "#sortable_1" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#sortable_1').sortable('serialize') } );
								},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
							});
							$( "#sortable_2" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#sortable_2').sortable('serialize') } );
								},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount'
							});
							$( "#sortable_3" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#sortable_3').sortable('serialize') } );
								},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
							});
							$( "#sortable_4" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#sortable_4').sortable('serialize') } );
								},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
							});
							$( "#sortable_5" ).sortable({
								update: function(event, ui) {
									$.post("ajaxFile.php", { pages: $('#sortable_5').sortable('serialize') } );
								},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.mainPageThmeTitle,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt,.columncount',
								handle: ".controlMidBg"
							});
							$( ".contentedit" ).attr("contentEditable",true);
					});
					
					$(document).ready(function(){
							$( "#sortablePage" ).sortable({
								update: function(event, ui) {
									$.post("ajaxPageSort.php", { pages: $('#sortablePage').sortable('serialize') } );
				    			},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt',
								handle: ".controlMidBg"
							});
							$( "#sortablesubPage" ).sortable({
								update: function(event, ui) {
									$.post("ajaxPageSort.php", { pages: $('#sortablesubPage').sortable('serialize') } );
				    			},
								cancel: '.contentedit,.contactlabelsPopup,.youtubelabelsPopup,.widtTenPer,.authorBlogReplaceTextarea,.formEntryPopForm,.control-group,.text,.socialPop,.contactform,.galleryimagepop,.galleryimage,.mapinputTxt,.google_ansen,.google_url_text,.addGooginputTxt',
								handle: ".controlMidBg"
							});
                            
                            $(".NoImgPopOuterImg,.InImgPopOuterImg").click(function() {
                				$(".NoImgPopOuter .modal").addClass("in");
                				$(".NoImgPopOuter .modal").removeClass("hide");
                			});	
                			$(".UploadForm #SubmitButton").click(function() {
                				$(".NoImgPopOuter .modal form").removeClass("in");
                				$(".NoImgPopOuter .modal").addClass("hide");
                				$(".uploadProgress").show().css({"top":100, "left":300, "z-index":20001});
                				$("#progressbox").show();
                			});	
					});
				$(document).ready(function(){
						$(".deleteBg").click(function(){	
							var closetop = $(this).offset();
							$("#deletePopup").css("top",closetop.top);
						});
						$(document).click(function(event){
							 if($(event.target).closest(".contentedit,#toolbar").length == 0) { $("#toolbar").fadeOut(200); } 
							 if($(event.target).closest("#deletePopup,.deleteOuter").length == 0) { $("#deletePopup").fadeOut(200); } 
						});
					});
					$(".navTabMore ul").css({"display":"none"});
					$(".navTabMore").mouseover(function(){
						$(".navTabMore ul").slideDown("slow");
					});
					$(".navTabMore").mouseleave(function(){
						$(".navTabMore ul").slideUp("slow");
					});
					$(".imageGallery").mouseenter(function() {
						//$(this).children(".galleryimageInn").fadeIn(500);
					})
					.mouseleave(function() {
						//$(this).children(".galleryimageInn").fadeOut(500);
					});
					$(".gallerycancel").click(function() {
						$(".galleryimagepop").slideUp();
						$(".galleryimageInn").hide();
					});
					$(".contactform").click(function() {
					//$(this).css({"position":"absolute","z-index":10720,"background":"#ffffff","padding":10+"px","width":100+"%","-moz-box-sizing": "border-box","box-sizing": "border-box","-webkit-box-sizing": "border-box"});
					//$("#maska").show();
					//$("#contactmask").show();
					//$("#contactmask").css({"z-index":1010});
					$(".contactSaveButt").show();
				});	
				$("#contactmask").click(function() {
					//$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
					//$("#contactmask").hide();
					$(".contactSaveButt").hide();
				});	
				$("#dropBox2 .contactform").click(function() {
					//$("#contactmask").hide();
				});
				$(".contactSaveButt").click(function() {
					//$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
					//$("#contactmask").hide();
				});	
				}
					$(document).ready(function(){
					
						var blockSort = true;
						$(".leftuldiv").sortable();
						$(".leftuldiv").bind('sortreceive', function () {
							blockSort = false;
						}).bind('sortstop', function (e) {
							if (blockSort) {
								e.preventDefault();
							}
							blockSort = true;
						});						
					});
			// Font Color Changes
			function colorchange(color){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				idval = $('#clickid').val();
				idlist = idval.split('_');
				var name = idlist[0]+'_fontcolor';
				var colorchangeVal = $(color).css("background-color");	
				$('#'+idval).css("color",colorchangeVal);
				upval = colorchangeVal;
				page_list_id = idlist[1];
				/*if(activedivnew[0] == 'buildContact')
					{
						updateFontForContact(activedivnew[1],page_id,name,upval);
					}
				else
					{
						updateFontStyling(domain_id,page_id,page_list_id,name,upval);
					}*/
			}
			function rightcolor(){
				var domain_id = $('#domain_id').val();
				var page_id = $('#page_id').val();
				idval = $('#clickid').val();
				idlist = idval.split('_');
				var name = idlist[0]+'_fontcolor';
				var rightcolor = $(".sp-color").css("background-color");	
				$('#'+idval).css("color",rightcolor);
				upval = rightcolor;
				page_list_id = idlist[1];
				if(activedivnew[0] == 'buildContact')
					{
						updateFontForContact(activedivnew[1],page_id,name,upval);
					}
				else
					{
						updateFontStyling(domain_id,page_id,page_list_id,name,upval);
					}
			}
			// Link Function
			function linkmame(){
				var linkmame = $(".linkname").val();
				$(".linkText").html("<a href="+linkmame+">"+linkmame+"</a>");	
			}
			function popclose(){
				$(".contactlabelsPopup").hide();
				$("#contactmask").hide();
				$(".contactform").css({"position":"static","z-index":0,"background":"none","padding":0+"px","width":"auto"});
			}
			//font style for each listing
			function updateFontStylingForEachListing(pageid,domainid,fontchange,font)
				{
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domainid,'page_id':pageid,'fontochange':fontchange,'font':font,'action':'updateFontForEach'}, function(output){
							});
				}
			//select deleted comments from comment listing table
			function selectDeleteFromComments(domain_id,status)
				{
					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'onlydeletedcomments'}, function(output){
						var arr = output.split("|@|");
						if(arr[0] == 'deletedcomments'){
							$('#commentblogid').show();
							$('#commentblogid').html(arr[1]);
							$(".blogPopCommMailOptLeft a").removeClass("active");
							$("#"+status).addClass("active");
							
						}
					});
				}
			//select recent comments from comments table
			function selectRecentComments(domain_id,status)
				{
					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'onlyrecentcomments'}, function(output){
						var arr = output.split("|@|");
						if(arr[0] == 'recentcomments'){
							$('#commentblogid').show();
							$('#commentblogid').html(arr[1]);
							$(".blogPopCommMailOptLeft a").removeClass("active");
							$("#"+status).addClass("active");
						
						}
					});
				}
			//select not approve comments from comments
			function selectPendingComments(domain_id,status)
				{
						$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'onlyrnotapprovecomments'}, function(output){
						var arr = output.split("|@|");
						if(arr[0] == 'notapprovecomments'){
							$('#commentblogid').show();
							$('#commentblogid').html(arr[1]);
							$(".blogPopCommMailOptLeft a").removeClass("active");
						    $("#"+status).addClass("active");
                            
						}
					});
				}
			// select spam comments from comments table
			function selectSpamFromComments(domain_id,status)
				{
					$.post(jssitebaseUrl+'/main.php',{'domain_id':domain_id,'action':'onlyspamcomments'}, function(output){
						var arr = output.split("|@|");
						if(arr[0] == 'spamcomments'){
							$('#commentblogid').show();
							$('#commentblogid').html(arr[1]);
							$(".blogPopCommMailOptLeft a").removeClass("active");
							$("#"+status).addClass("active");
							//$("#errormsg").addClass('successmsg').html("Comment Deleted Successfully");
						}
					});
				}
			//function tow hide two div and show one
			function hideTwodiv(divid1,divid2,divid3)
				{
					$('#'+divid1).show();
					$('#'+divid2).hide();
					$('#'+divid3).hide();
				}
				//function tow hide two div and show one for form
			function hideTwodivForm(divid1,divid2,divid3)
				{
					$('#'+divid1).show();
					$('#'+divid2).show();
					$('#'+divid3).hide();
				}
			
			//changeTheme Image
			function changeThemeImage(img,id,actid)
				{
					$('#themeimgrep_'+id).html("<img src="+img+">");
					var actclass = 'ul#color_'+id+' li';
					$(actclass).removeClass("active");
					$('#'+actid).addClass("active");	
				}
			//changeTheme Image
			function changeBlogImage(img,id,actid)
				{
					$('#blogimgrep_'+id).html("<img src="+img+" alt="+img+" />");
					var actclass = 'ul#blogcolor_'+id+' li';
					$(actclass).removeClass("active");
					$('#'+actid).addClass("active");
				}
			//changeStore Image
			function changeStoreImage(img,id,actid)
				{
					$('#storeimgrep_'+id).html("<img src="+img+" alt="+img+" />");
					var actclass = 'ul#storecolor_'+id+' li';
					$(actclass).removeClass("active");
					$('#'+actid).addClass("active");
				}
			//Update Logo Process
			function updateLogoForDomain(domainid,width,height)
				{
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domainid,'width':width,'height':height,'action':'updateLogoImg'}, function(output){
					});
				}
			//Update Logo Postion Process
			function updateLogoPosForDomain(domainid,left,top)
				{
					$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domainid,'left':left,'top':top,'action':'updateLogoImgPos'}, function(output){
					});
				}
			//Function videoPopup
			function showVideoPopup(id)
				{
					$('#'+id).show();
				}
			//popuclose for utube url
			function popcloseforutubeurl(id)
				{
					$('#'+id).hide();
				}
			//add youtubeurl
			function addYoutubeUrl(id)
				{
					var domain_id = $('#domain_id').val();
					var page_id = $('#page_id').val();
					var url = $('#videourl_'+id).val();

				    var c = url.replace(/(?:http:\/\/)?(?:https:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=|embed\/)?(.+)/g,'$1'); 
				    var d = "http://www.youtube.com/embed/"+c;
				    url = d;

					var spacing = $('#spacing_'+id).val();
					var width = $('#width_'+id).val();
					if(url == "")
					  {
					  	 $('#error_'+id).html("Enter the Youtube Url");
					  	 return false;
					  }
					else
						{
							$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'url':url,'spacing':spacing,'width':width,'page_list_id':id,'action':'updateUtubeVideo'}, function(output){
								redirectnew();
					});
						}
				}
			//Hide delPopup
			function hidedelid()
				{
					$('#deledomid').val("");
					$('#delepageid').val("");
					$('#delepagelist').val("");
					$('#delepagetext').val("");
					$('#deletePopup').hide();
					return false;
				}
			//function showpop
			function showDelPopup(domainid,pageid,pagelistid,name)
				{
				    //alert(name)
					$('#deledomid').val(domainid);
					$('#delepageid').val(pageid);
					$('#delepagelist').val(pagelistid);
					$('#delepagetext').val(name);
					$('#deletePopup').show();
				}
				
			function deleteListing()
				{
					var domain_id = $('#deledomid').val();
					var page_id = $('#delepageid').val();
					var page_list_id = $('#delepagelist').val();
					var name = $('#delepagetext').val();
                    //$("#loaderMask").show();
	               // $(".ui-loader").show();   
				   $("#deletePopup").hide();                 
                    if(domain_id != '' && page_id != '' && page_list_id != '')
                        {
							$('#page_'+page_list_id).remove();
                            $.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'name':name,'action':'deleteDetails'}, function(output){
								 //$("#loaderMask").hide();
	              				 //$(".ui-loader").hide();
								
    						});
                        }				 		
				}
			function showdiv(div)
				{
					if(div == 'uemail')	
						{
							$("#uemail").show();
							$("#uname").hide();
						}
					else
						{
							$("#uname").show();
							$("#uemail").hide();
						}
				}
				
		//for forget paassword pop up
 function forgetPassword() {
    var e = $("#forgetemail").val();
    if (e == "") {
        $("#error_pass").addClass("errormsg").html("Please Enter Your Email").show();
        $("#forgetemail").focus();
        return false
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e)) {
        $("#error_pass").addClass("errormsg").html("Invalid Email Id!!").show();
        $("#forgetemail").focus();
        return false
    } else {
        $("#error_pass").hide()
    } if (e != "") {
        $.post(jssitebaseUrl + "/ajaxFile.php", {
            forgetemail: e,
            action: "forgetPassword"
        }, function (e) {
            if (e == "sendpass_success") {
                $("#error_pass").addClass("successmsg").html("Password has been sent to your email address").show();
                setTimeout(function () {
                    $("#forgetPassword").hide();
                    $("#maska").fadeOut();
                    $("#forgetemail").val("")
                }, 2e3)
            } else if (e == "activation_failed") {
                $("#error_pass").addClass("errormsg").html("This registration not activated yet now. Please check your email!!!").show()
            } else if (e == "no_email") {
                $("#error_pass").addClass("errormsg").html("This email address not registered").show()
            }
        })
    }
    return false
}
//suresh new process.
function showSettSubDom(domain_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'getDomainUrlFromDomDet'}, function(output){
    	  
    	 	 if(output)
    			{	
    			    var res = output.split("^^^")
    			    $("#showSubdomainChangeInSettings").show();
    				$("#err_msg").hide();
    				$("#suc_msg").hide();
					$("#maska").show();
                    
                    if(res[1] == 'PD'){
                         $("#edit_point_domain_name").val(res[0]);
                         $("#edit_point_domain").attr('checked', true);
                    }
                    else if(res[1] == 'SD'){
                         $("#domain").val(res[0]);
                         $("#edit_sub_domain").attr('checked', true);
                    }     
    			}
             
    	});
	 	 
	} 

//suresh did for new process.
 function AddSubDomainInSettings()
	{
	   
		var domain_id = $('#domain_id').val();  
	    if(document.getElementById("edit_sub_domain").checked == true)
           {
                var name       = $('#domain').val();
                var doamin_url = 'http://'+$('#domain').val()+'.'+site_main_domain; 
                var type       = 'SD';
                if(name == '')
					{
						$("#err_msg").addClass('errormsg').html("Please enter domain name").show();
						$("#domain").focus();
						return false;
					}				 
				if(/^[a-zA-Z0-9- ]*$/.test(name) == false) 
					{
					    $("#err_msg").addClass('errormsg').html("Your domain names contains illegal characters.").show();
					    $("#domain").val("");
						$("#domain").focus();
						return false;
					}
				else if(name.match(/\ /))
					{
						$("#err_msg").addClass('errormsg').html("Your domain names contains space.").show();
						var nospaceval = name.replace(/ /g,'');
						$("#domain").val(nospaceval);
						$("#domain").focus();
						return false;
					}
           }
       else if(document.getElementById("edit_point_domain").checked == true)
           {                
                var domaint_txt = $('#edit_point_domain_name').val();
                var name        = 'http://'+$('#edit_point_domain_name').val();
                var doamin_url  = 'http://'+$('#edit_point_domain_name').val(); 
                var regUrl =  new RegExp(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/);
                var type       = 'PD';
                
                if(domaint_txt == '')
					{
						$("#err_msg").addClass('errormsg').html("Please enter Point domain name").show();
						$("#edit_point_domain_name").focus();
						return false;
					}				 
				if(domaint_txt != '')
                    {		
                		if(regUrl.test(name) == false){                    		  
                			$("#err_msg").addClass('errormsg').html("Please enter Valid Point domain name").show();
    						$("#edit_point_domain_name").focus();
    						return false;                    			
                		}
                	}
           } 
        if(document.getElementById("edit_sub_domain").checked == true || document.getElementById("edit_point_domain").checked == true)  
            {
                $.post(jssitebaseUrl+'/main.php',{'subdomain_url':doamin_url,'type':type,'domain_id':domain_id,'action':'domain_settings'}, function(output){
                  
				  if(output == "error")
						{	
							$("#err_msg").show();
						  	$("#err_msg").addClass('errormsg').html("Domain Already Exist").show();							
						}
				  if(output == "updated")
						{						 
						 if(type == 'PD')
                             { 
                                $(".domainChangeOne").hide();
                                $(".loadmask").show();
                                 $(".pointdomainpopup").show();
                                $("#youdomainurl_set").html(doamin_url);
                               
                             }     
                          else if(type == 'SD')   
                            {
                                $('#edit_point_domain_name').val('');
                                setTimeout("redirectnew()", 2000);
                            }
							
						 	$("#err_msg").hide();
							$("#suc_msg").show();		
							$("#suc_msg").addClass('successmsg').html("Domain Update Sucessfully").show();
							
						}	
				});
            } 
				  
	} 

function invitesVal()
	{
	 	var to = $('#to').val();
		if (to == '')
			{
				$("#errormsg").addClass('errormsg').html("Please enter atleast one email id ");
				$("#to").focus();
				return false;
			}
	}
function showReplydiv(id)
	{
	 	$("#leaveform_"+id).show();
	}
			//insert comment function is used to insert a comment for the particulat file 
function InsertcommentReply(id)
{
 	var name		    =	$("#name_"+id).val();
 	var email			=	$("#email_"+id).val();
	var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;					
	var comment		    =	$("#comment_reply_"+id).val();
	var post_id		    =	$("#post_id_"+id).val();		
	var title		    =	$("#title_"+id).val();
	
	if(name == ''){
		alert("Please enter  Name");
		$("#name_"+id).focus();
		return false;
	}
	if(email == ''){
		alert("Please enter Email");
		$("#email_"+id).focus();
		return false;
	}
	if(!email.match(email_check)){
		alert("Please enter Valid Email");
		$("#email_"+id).focus();
		return false;
	}
	
	if(comment == ''){
		alert("Please enter comments");
		$("#comment_reply_"+id).focus();
		return false;
	}
 	
	$.post(jssitebaseUrl+'/ajaxFile.php',$('#leaveform_'+id).serialize(),function(output){
			var arr = output.split("|@|");
	         	if(arr[0] == "sucess")
				{
				        $('#commentForm').show();
						$('#success_leave_one').html(arr[1]);
                        setTimeout("hideSuccess('success_leave_one','successmsg')", 2000);                        
					    window.location = jssitebaseUrl+'/postcomment/'+post_id+'/'+title; 					
				}
		});	
}
function showAddColumn()
{
	$("#textCol").show();
}
function SaveCate()
{
	var category_name=$("#cate").val();
	if(category_name == '')
		{
			$("#errorshow").show();
		    $("#errorshow").addClass('errormsg').html("Please enter category name");
		    setTimeout("hideSuccess('errorshow','errormsg')", 2000);
			$("#cate").focus();
			return false;
		}
	$.post(jssitebaseUrl+'/ajaxFile.php',{'cat':category_name,'action':'catInpostPage'}, function(output){
	 	 if(output)
				{
				 	$(".postnewaddpop").hide();
			 		$("#showListCat").html(output);
				 	$("#cate").val('');
				}	
			});
		 
}

function selectPostBasdCat(cat_id)
{
 	$.post(jssitebaseUrl+'/ajaxFile.php',{'cat':cat_id,'action':'postListed'}, function(output){
		 
		 if(output)
				{
					$("#showPost").html(output);
				}	
			});
}
//getfontstyle

function getFontSizeForListing(pageid,domainid,fonttotchange)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':pageid,'domain_id':domainid,'fonttotchange':fonttotchange,'action':'getFontSize'}, function(output){
		 if(output)
				{
					var fntsize = output.split('|@|');
					$('.inputfont').val(fntsize[0]);
					$('.inputlineht').val(fntsize[1]);
					$.get(jssitebaseUrl+'/js/jquery.nanoscroller.min.js');					
				}	
			});				
	}
    
function updateTitleIndex(domain_id)
	{
	   var allGood = true;			  
      $(document).click(function(){
         if(allGood)
            {
                var site_title_val=$("#updateTitle").text();
                if(site_title_val == '')
                     site_title=$("#updateTitle").val();
                 else
                     site_title=$.trim($("#updateTitle").html().replace("<br>","")); 
                $.post(jssitebaseUrl+'/ajaxFile.php',{"site_title":site_title,"domain_id":domain_id,"action":"updatetitleIndex"},function(response){				
			   if(response == "success")
					{
								allGood = false;			
					}
                    return false;
			    });   
            }                  	              
		  });
          return false;                            			  			  
	}
            
$(document).ready(function(){
	$("img,a").mousedown(function(){
		return false;
	});
});

$(document).ready(function(){	
	var winHei = $(window).height();
	var docHei = $(document).height();
	 if(winHei > docHei) {
	
	}
	else if(winHei < docHei) {
		
	}
});	

//---------------------------------------- for point domain page add domain---------------------------------
function validateNewDomain()
    	{
    		var point_domain =$.trim($('#point_domain').val());
    		var domain_id = $('#domain_id').val();
			var myWord = '.com';
			var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/); 
			var valid=re.test(point_domain);
			 
			
			if(point_domain == ''){
			$("#errormsg1").addClass('errormsg1').html("Please Enter Domain Name");
			$("#point_domain").focus();
			return false;
			 }
			 
			if(!valid){
			$("#errormsg1").addClass('errormsg1').html("Please Enter the Valid Domain name");
			$("#email").focus();
			return false;
		 
			}
		 	else if(domain_id != '')
				{		
            		$.post(jssitebaseUrl+'/ajaxFile.php',{"point_domain":point_domain,"domain_id":domain_id,"action":"addPointDomain"},function(response){
            			 
            			 
            				$("#errormsg1").removeClass('errormsg1');
            				$("#errormsg1").addClass('successmsg').html("Domain name added Successfully");
            				
                            document.getElementById("point_domain").disabled = true;
                            $("#point_domain_sumbtn").hide();
            				
            		});
            		return false;
		      }
	}
function resetVal()
	{
	 	var emailRest =$.trim($('#reset_email').val());
		var user_id =$.trim($('#user_id').val());
		var forget =$.trim($('#forgot').val());
	 	var email_check     =  /^([a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;					
	 
		if(emailRest == ''){
			$("#errormsg").addClass('errormsg').html("Please Enter the email address");
			$("#reset_email").focus();
			setTimeout("hideSuccess('errormsg','errormsg')", 5000);
		 	$("#reset_email").val('');
		  	return false;
		}
	 	if(!emailRest.match(email_check)){
			$("#errormsg").addClass('errormsg').html("Please Enter Valid Email Address");
			$("#reset_email").focus();
			setTimeout("hideSuccess('errormsg','errormsg')", 5000);
		 	$("#reset_email").val('');
			return false;
		}
	 	else
			{
			if(forget)
				action='forgtPass';
			else
				action='resetAccount';		
			$.post(jssitebaseUrl+'/ajaxFile.php',{"email":emailRest,"user_id":user_id,"action":action},function(response){
			if(response == 'sendpass_success')
				{
					$("#errormsg").removeClass('errormsg');
					$("#errormsg").addClass('successmsg').html("Instructions for reseting your password have been sent. Please check your email.");
					setTimeout("hideSuccess('errormsg','successmsg')", 5000);
					$("#reset_email").val('');
				}
			else if(response == 'activation_failed')
				{
					$("#errormsg").removeClass('successmsg');
					$("#errormsg").addClass('errormsg').html("Sorry.,You are not activated your account till now.Please first activate.");
					setTimeout("hideSuccess('errormsg','errormsg')", 2000);
					$("#reset_email").val('');
				}
			else if(response == 'no_email')
				{
					$("#errormsg").removeClass('successmsg');
					$("#errormsg").addClass('errormsg').html("Sorry.,You are not registered with our site");
					setTimeout("hideSuccess('errormsg','errormsg')", 2000);
					$("#reset_email").val('');
				}
			
	});
	return false;
	}
	}
function resetConfirm()
	{
		var new_pass =$.trim($('#new_pass').val());
		var confirm_pass =$.trim($('#confirm_pass').val());
		var user_id =$.trim($('#user_id').val());
		if(new_pass == ''){
			$("#errorm").addClass('errormsg').html("Please Enter New Password");
			$("#new_pass").focus();
			setTimeout("hideSuccess('errorm','errormsg')", 2000);
		 	$("#new_pass").val('');
		  	return false;
		}
		if(confirm_pass == ''){
			$("#errorm").addClass('errormsg').html("Please Enter Confirm Password");
			$("#confirm_pass").focus();
			setTimeout("hideSuccess('errorm','errormsg')", 2000);
		 	$("#confirm_pass").val('');
			return false;
		}
		if(new_pass != confirm_pass){
			$("#errorm").addClass('errormsg').html("Please Enter Your New Password And Your Confirm Password As Same");
			$("#new_pass").focus();
			setTimeout("hideSuccess('errorm','errormsg')", 2000);
		 	$("#new_pass").val('');
		 	$("#confirm_pass").val('');
			return false;
		}
		else
			{
			 $.post(jssitebaseUrl+'/ajaxFile.php',{"new_pass":new_pass,"user_id":user_id,"action":"changePassw"},function(response){
			if(response == 'updated')
				{
					$("#errorm").removeClass('errormsg');
					$("#errorm").addClass('successmsg').html("Your password has been successfully changed.");
					setTimeout("hideSuccess('errorm','successmsg')", 2000);
					$("#new_pass").val('');
					$("#confirm_pass").val('');
                    redirectnew();
                    
				}
 		 	});
			return false;
	}
	}
	
	function updateImageForPage(id,width,height)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'page_list_id':id,'width':width,'height':height,'action':'updateImgForPage'}, function(output){
			});
		}		
	//Gallery Image Delete Process.
	function deleteGalImg(domain_id,page_id,page_list_id,gal_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'gallery_id':gal_id,'image_name':img_name,'action':'delImgforGallery'}, function(output){
				
                //$("#galleryPoP").html(output);
                $("#imageGallery"+gal_id).remove();                
                if($("#galImg_"+page_list_id).html().trim()=="")
                {
                    $("#galImg_"+page_list_id).html("<form  class='form-horizontal sky-form' method='post' enctype='multipart/form-data' action='ajaxGalleryImageUpload.php' style='clear:both'><label id='imageloadbutton_'"+page_list_id+" class='input input-file' style='display:block; height:135px;' for='file'><div class='button'><input type='button' name='photos[]' id='photoimg_'"+page_list_id+"' class='inputfile' onclick='showgalleryFuncForColumn("+page_list_id+");' /></div><input type='hidden' name='page_list_id' value='"+page_list_id+"'/></label></form>");
                }
				//imagelibrarytabs();     
			});
		}
	
	//Slider Image Delete Process.
	function deleteSliImg(domain_id,page_id,page_list_id,sli_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'slider_id':sli_id,'image_name':img_name,'action':'delImgforSlider'}, function(output){
				
                $("#sliderPoP").html(output);
				//imagelibrarytabs();
               
			});
		}
      
    //Gallery Image Delete Process.
	function deleteGalImgColumn(domain_id,page_id,page_list_id,sli_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'gallery_id':sli_id,'image_name':img_name,'action':'delImgforColumnGallery'}, function(output){
				
                $("#galleryPoPColumn").html(output);
				//imagelibrarytabs();
                $("#imageGallery"+sli_id).remove();                
                if($("#galImg_"+page_list_id).html().trim()=="")
                {
                    $("#galImg_"+page_list_id).html("<form  class='form-horizontal sky-form' method='post' enctype='multipart/form-data' action='ajaxGalleryImageUpload.php' style='clear:both'><label id='imageloadbutton_'"+page_list_id+" class='input input-file' style='display:block; height:135px;' for='file'><div class='button'><input type='button' name='photos[]' id='photoimg_'"+page_list_id+"' class='inputfile' onclick='showgalleryFuncForColumn("+page_list_id+");' /></div><input type='hidden' name='page_list_id' value='"+page_list_id+"'/></label></form>");
                }
                
			});
		}        
     //Slider Image Delete Process for column.
	function deleteSliImgColumn(domain_id,page_id,page_list_id,sli_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'slider_id':sli_id,'image_name':img_name,'action':'delImgforSliderColumn'}, function(output){
		        $("#sliderPopColumn").html(output);
				//imagelibrarytabs();
			});
		}
  //function for delete slider image in banner 
    function deleteSliderBannerImage(domain_id,page_id,img_id,status)
		{
		    $("#sliderimg"+img_id).remove();
            $(".sliderimg"+img_id).remove();
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'img_id':img_id,'status':status,'action':'deleteImageForSliderBanner'}, function(output){
			 	$("#sliderBanner").html(output);
			});
		}
	
	//Gallery Popup
	function showGaleryPopup(id)
		{
			$('#'+id).show();
		}
		
	//Change Background Off Process
	function changeBackgroundEnable(domain_id,obj)
		{
		  $(".backstatus").removeClass("active");
            $(".backstatus[data-val=OFF]").addClass("active");            
            var type=$(obj).attr("data-back");
            $("[data-back="+type+"]").removeClass("active");            
            $(obj).addClass("active");
            if($(".backstatus.active[data-val=OFF]").length==3)
            {
                $("[data-back='default'][data-val=ON]").addClass("active");
                $("[data-back='default'][data-val=OFF]").removeClass("active");
            
			/*$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'changeable':chang,'action':'changeBackgroundEnable'}, function(output){
				redirectnew();
			});*/
            }
		}
	//show Map Popup
	function showMapPopUp(id)
		{
			$('#'+id).show();
		}
	
	//update Map Process
	function addMapProcess(id)
		{
		    var domain_id = $("#domain_id").val();
            var title_id = $("#title_id").val();
            var title = $("#titleforblog").val();
			var zoom = $('#zoom_'+id).val();
			var addr = $('#addr_'+id).val();
			
			$(".error").remove();
            //if(lat=="")
            //{
               /* $('#lat_'+id).after("<span class='error' style='color:#FF0000;' ><br>Please Enter Latitude</span>");
            }
            else if(lon=="")
            {
                $('#lon_'+id).after("<span class='error' style='color:#FF0000;' ><br>Please Enter longtitude</span>");
            }
            else
            {*/
                
                $.post(jssitebaseUrl+'/ajaxFile.php',{'zoom':zoom,'addr':addr,'page_list_id':id,'action':'updateMapProcess'}, function(output){
				    
                        $("#mapframe_"+id).hide();
                        var json       = JSON.parse(output);
                        $("#lat_"+id).val(json[0]);
                        $("#log_"+id).val(json[1]);
                        $("#ifrm"+id).attr("src","gmapPage.php?zoom="+zoom+"&lat="+json[0]+"&lon="+json[1]+"&addr="+addr+"&page_list_id="+id); 
                        window.location.reload();
                
                });
           //}
            
		}
	//Gallery Process
	function addgalleryProcess(id)
		{
			var column = $('#column_'+id).val();
			var spacing = $('#spacing_'+id).val();
			var border = $('#border_'+id).val();
			$.post(jssitebaseUrl+'/ajaxFile.php',{'column':column,'spacing':spacing,'border':border,'page_list_id':id,'action':'updateGalleryProcess'},    function(output){
				redirectnew();
			});
		}
	//used for redirect pages
   function changePage()
			{
				window.location = jssitebaseUrl;
			}
	// this function used to show script div in build page list page for google adsense
	function showDivForScript(id1,id2)
		{
		 
			$('#'+id1).show();
			$('#'+id2).hide();
		}
	function googleScriptSave(id)
		{
		 	var google_script_text_value = $('#google_script_text_'+id).val();
  	        var script_enum = $('#script').val();
           	$.post(jssitebaseUrl+'/ajaxFile.php',{'script_value':google_script_text_value,'script_enum':script_enum,'page_list_id':id,'action':'updateTableScriptGoogle'},function(output){
				redirectnew();
			});
		}
   function deletegoogleImage(domain_id,page_id,page_list_id,google_image_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'google_image_id':google_image_id,'google_image_name':img_name,'action':'delImgforGoogle'}, function(output){
				redirectnew();
			});
		}
	function showAddUrl(id)
		{
			$('#'+id).show();
		}
	function googleImageUrlSave(id,google_image_id)
		{
	    	var image_text = $('#image_text_'+id).val();
		 	var script_enum = $('#script').val();
			$.post(jssitebaseUrl+'/ajaxFile.php',{'image_text':image_text,'page_list_id':id,'google_image_id':google_image_id,'action':'updateurlforgoogle'},function(output){
				redirectnew();
			});
		}
	//for Payment Process
	function showCreditUrl()
	  {
	  	$('#authorize_buy').show();
	    $('#paypal_buy').hide();
	  }
	function paypalUrl()
	   {
	    $('#authorize_buy').hide();
	    $('#paypal_buy').show();
	    
	   } 
	function redirectPaypal()
		{
			var price = $('#tot_amt').val();
			if(price == '')
			 {
			 	$('#err_msg_paypal').addClass('errormsg').html('Please Choose any Plan');
			 	return false;
			 }
             
            //var url = jssitebaseUrl+'/buy_credits/'+price+'/paypal';
			
			//$('#price_paypal').html(price);
			//$('#price_auth').html(price);
			//$('#tot_amt').val(price);
			//$('#amt_auth').val(price);
			//$('#payreturn').val(url);
            $('#paypalprocess').val("PalpalPayment");
			$('#paypal_form1').submit();
		}
	function checkCreditCardvalidation()
		{
			var price      = $('#amt_auth').val();
			var card_name  = $('#card_name').val();
			var card_no    = $('#card_no').val();
			var cvv_no     = $('#cvv_no').val();
			var expires_month = $('#expires_month').val();
			var expires_year  = $('#expires_year').val();
			if(price == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please Choose any Plan');
			 	return false;
			 }
			if(card_name == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please enter the card holder name ');
			 	$('#card_name').focus();
			 	return false;
			 }
			if(card_no == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please enter the card number');
			 	$('#card_no').focus();
			 	return false;
			 }
			if(cvv_no == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please enter the cvv number');
			 	$('#cvv_no').focus();
			 	return false;
			 }
			if(expires_month == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please Select an Expires Month');
			 	$('#expires_month').focus();
			 	return false;
			 }
			if(expires_year == '')
			 {
			 	$('#err_msg').addClass('errormsg').html('Please Select an Expires Year');
			 	$('#expires_year').focus();
			 	return false;
			 }
			$('#paypal_form').submit();
		}
	//this function used to update footer content in domain details table
	function updateFooterContent()
		{
		  $(document).click(function(){
		      var footer_val=$.trim($("#footer_main").html());
            		   
        				$.post(jssitebaseUrl+'/ajaxFile.php',{"footer":($.trim($("#footer_main").html().replace("<br>",""))),"action":"updateFooterContent"},function(response){
	               		
			});
            });
		}
	//Sub Page Process...
//Add Page
	function addSubPageForDomain(){
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'listPage'}, function(output){
				$("#pages").html(output);
			});
	}
	function showAddSubPage(pageid)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':pageid,'action':'showsubPage'}, function(output){
				$("#subPage").html(output);
			});
		}
	function addSubPageListing(pageid,domainid)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'page_id':pageid,'domainid':domainid,'action':'addSubPage'}, function(output){
				var res = output.split('|@|');
				if(res[0] == 'success')
					redirectUrl(res[1]);
				else
					{
						$("#pages").html(output);
						$('#dropdownpage_'+pageid).show();
					}
					
			});
		}
		//ShowSubPages 
	function showSubPages(parentpageid,pageid){
		
		document.getElementById('settingpage').style.display = "none";
		document.getElementById('build').style.display = "none";
		document.getElementById('pages').style.display = "";
		$('.mainLeftPanel').hide();
		$('#themelist').hide();
		
		var xmlhttp;
			
			if(window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					ajaxsortingandclickfun();
					document.getElementById("pages").innerHTML = xmlhttp.responseText;
				}	
			}
			
			xmlhttp.open("GET",jssitebaseUrl+"/ajaxFile.php?action=showSubPagelist&parent_page_id="+parentpageid+"&page_id="+pageid,true);
			xmlhttp.send();
			return false;
	}
	//Assign Price
	function assignPrice(priceval)
		{
			/*var url = jssitebaseUrl+'/buy_credits/'+priceval+'/paypal';
			
			$('#price_paypal').html(priceval);
			$('#price_auth').html(priceval);
			$('#tot_amt').val(priceval);
			$('#amt_auth').val(priceval);
			$('#payreturn').val(url);*/
            document.palnsform.submit();
		}
$(function() {
	$('.contentedit').on('keypress', function(e) {
		if (e.keyCode == 9) {
			e.preventDefault();
		}
	});
	$('.contentedit').keyup("v",function(e) {
	 	if(e.ctrlKey && e.keyCode == 86)
		{			
			$(this).find("*").removeAttr("style");
			$(this).find("img").remove();			
		}
	});	
});
function closesizefont(){
	$("#jquery-colour-picker").hide();
}													   
//Redirect for subscription Page
function redirectSubscription(domain_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'redirectSubscribe'}, function(output){
			redirectUrl(output);
		});
	}
function showSettingPage(domain_id)
	{
		//document.getElementById('storepage').style.display = "none";
		document.getElementById('settingpage').style.display = "";
		document.getElementById('pages').style.display = "none";
		document.getElementById('build').style.display = "none";
		$(".mainRightPanel").css("margin-top",$(".toppanel").height());
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'showSettingTab'}, function(output){
			if(output)
				{
					$("#settingpage").html(output);
				}
		});
	}
function showStorePage(domain_id)
	{
		//document.getElementById('storepage').style.display = "";
		document.getElementById('settingpage').style.display = "none";
		document.getElementById('pages').style.display = "none";
		document.getElementById('build').style.display = "none";
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'showStoreTab'}, function(output){
			if(output)
				{
					$("#storepage").html(output);
				}
		});
	}
function postRequest(strURL)
 {
	var xmlHttp;
	if(window.XMLHttpRequest)
	{ 
	var xmlHttp = new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
	 var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlHttp.open('POST', strURL, true);
	xmlHttp.setRequestHeader('Content-Type', '');
	xmlHttp.onreadystatechange = function()
	{
	if (xmlHttp.readyState ==4)
	{
	ajaxloginupdate(xmlHttp.responseText);
	}
	}
	xmlHttp.send(strURL);
}    
function ajaxloginupdate(str)
	{
		if(str == "Success")
		{
			alert("Your Request Has Been Send");
			window.location = 'index.php';
		}
	}
function getintouchajax()
{
	var contactname = document.getElementById("contactname").value;
	var contactemailid = document.getElementById("contactemailid").value;
	var contactphone = document.getElementById("contactphone").value;
	var contactsuburb = document.getElementById("contactsuburb").value;
    var contactstate = document.getElementById("contactstate").value;
	var contactmessage = document.getElementById("contactmessage").value;
	
    if($("#spn").html()!=null)
    {
        $("#spn").remove();
    }
	if(contactname == '')
		{
			document.getElementById("contactname").focus();
            $("#contactname").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the  name</div>");
			return false;
		}
	if(contactemailid == '')
		{		
			document.getElementById("contactemailid").focus();
            $("#contactemailid").after("<div  style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the Email Id</div>");
			return false;
		}
   	else if(contactemailid.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)==null)
	{
		 document.getElementById("contactemailid").value=document.getElementById("contactemailid").value;
         document.getElementById("contactemailid").focus();
         $("#contactemailid").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>Please Enter correct mail</div>");
         return false;
	}    
    if(contactphone == '')
		{
			document.getElementById("contactphone").focus();
             $("#contactphone").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the phonenumber</div>");
			return false;
		}    
	if(contactsuburb == '')
		{
		    document.getElementById("contactsuburb").focus();
            $("#contactsuburb").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the city</div>");
			return false;
		}
    if(contactstate == '')
		{
			document.getElementById("contactstate").focus();
            $("#contactstate").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the state</div>");
			return false;
		}    
	if(contactmessage == '')
		{			
			document.getElementById("contactmessage").focus();
            $("#contactmessage").after("<div style='color:#FF0000; margin-left:100px; padding-bottom:10px;' id='spn'>pleae enter the Message</div>");
			return false;
		}
	else
		{
			var url ="getintouch.php?contactname=" + contactname + "&contactemailid=" +contactemailid+ "&contactphone=" +contactphone+ "&contactsuburb=" +contactsuburb+ "&contactstate=" +contactstate+"&contactmessage=" +contactmessage;
			postRequest(url);
		}   
}
$(document).ready(function(){$(".loginInfoInner .loginInfoTab").click(function(){$(".loginInfoInner .loginInfoTab").removeClass("active");$(".loginInfoInUl").hide();$(this).addClass("active");var activeTab=$(this).attr("id");$('#'+activeTab+'_content').show();});var loginform=$(window).width()-$(".container").width();var loginformWidth=loginform/2;$(".loginFormInner").css("width",loginformWidth-34.5);var logintop=$(".header").outerHeight()+$(".menubarWrap").outerHeight();
    $(".getintouch1").click(function(){
        $("#openform").toggle();
        $(".getintouch1").toggleClass("getinup");
        });
        });        
        
//show product List
function showProductList(domain_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'productList'}, function(output){
			$('#productssetting').html(output);
			 
		});	
	}
function showAddProducts(domain_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'addProductList'}, function(output){
			$('#listprod').hide();
			$('#repSearch').hide();
			$('#addProduct').show();
			$('#addProduct').html(output);
		});
	}

function saveProduct()
	{
		var domain_id = $('#domain_id').val();
		var product_id = $('#product_id').val();
		var prod_name = $('#product_name').val();
		var desc = $('#desc').val();
		var price = $('#price').val();
		var offer_price = $('#offer_price').val();
		var sale_price = $('#sale_price').val();
		var sku = $('#sku').val();
		var weight = $('#weight').val();
		if(price == '')
			{
				 $('#errmsg_pro').addClass('errormsg').html("Please Enter Price value");
				 $("#price").focus();
				 return false;
			}
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'product_id':product_id,'prod_name':prod_name,'desc':desc,'price':price,'offer_price':offer_price,'sale_price':sale_price,'sku':sku,'weight':weight,'action':'saveProdList'}, function(output){
			$('#productssetting').html(output);
		});	
	}
function deleteProduct(prod_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'prod_id':prod_id,'action':'deleteProduct'}, function(output){
			$('#productssetting').html(output);
		});		
	}
function editProduct(prod_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'prod_id':prod_id,'action':'editProduct'}, function(output){
			$('#productssetting').html(output);
		});		
	}
function searchProduct()
	{
		var searchkey = $('#search_product').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'searchkey':searchkey,'action':'searchProduct'}, function(output){
			$('#repSearch').html(output);
		});
	}
function searchCategory()
	{
		var search_cat = $('#search_category').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'search_cat':search_cat,'action':'searchCategory'}, function(output){
			$('#repSearch').html(output);
		});
	}
function salepriceCalculation()
	{
		var priceval = $('#price').val();
		var offerper = $('#offer_price').val();
		if(offerper == '0')
			{
				var salePrice = +priceval + +offerper;
				$('#sale_price').val(salePrice);
			}
		else
			{
				off = offerper/100;
				off  = priceval * off;
				var saleprice = (priceval - off);
				$('#sale_price').val(saleprice);
			}
	}
function deleteprodimg(imgid)
	{
		var prod_id = $('#product_id').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'img_id':imgid,'prod_id':prod_id,'action':'delProdImg'}, function(output){
			$('#productssetting').html(output);
		});
	}
function showOptionList()
	{
		$('#optionlist').show();
	}
function hideOption()
	{		
		$('#maska').hide();
		$(".editOptPopBg").hide();
	}
function saveOption()
	{
		var totoption = $('.optionlist').length;
        alert(totoption);
		var prod_id = $('#product_id').val();
		for(i=0;i<totoption;i++)
			{
				var option_title  = $('#option_title_'+i).val();
				var option_choice = $('#option_choice_'+i).val();
				var input_type = $('#input_type_'+i).val();               
                
				$.post(jssitebaseUrl+'/ajaxFile.php',{'prod_id':prod_id,'option_title':option_title,'option_choice':option_choice,'input_type':input_type,'action':'addOption'}, function(output){
						$('#optionList').html(output);
			});
			}
			$("#maska").hide();
		
	}
function updatePriceOption(choice_id,priceid)
	{
		var price = $('#'+priceid).val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'choice_id':choice_id,'price':price,'action':'updatePriceOption'}, function(output){
		});
	}
function removeChoice(prod_option_id,choice_id)
	{
		var prod_id = $('#product_id').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'choice_id':choice_id,'prod_id':prod_id,'prod_option_id':prod_option_id,'action':'deletePriceOption'}, function(output){
			$('#optionList').html(output);
		});
	}
function editOptionList()
	{	   
		var product_id = $('#product_id').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'product_id':product_id,'action':'editPriceOption'}, function(output){
			$('#optionList_editoption').html(output);
		});
	}
function editForOption()
	{
		var totoption = $('.optionlist').length;
		var prod_id = $('#product_id').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'prod_id':prod_id,'action':'deleteOption'}, function(output){
		      for(i=0;i<totoption;i++)
    			{
    				var option_title  = $('#option_title_'+i).val();
    				var option_choice = $('#option_choice_'+i).val();
    				var input_type = $('#input_type_'+i).val();
    				$.post(jssitebaseUrl+'/ajaxFile.php',{'prod_id':prod_id,'option_title':option_title,'option_choice':option_choice,'input_type':input_type,'action':'addOption'}, function(output){
    						$('#optionList').html(output);
    			});
    			}
			});		
			$("#maska").hide();
	}
function showSettingPages()
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'showSetting'}, function(output){
				$('#storepage').html(output);
			});
	}
function showCheckOutPages()
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'showSetting'}, function(output){
				$('#storepage').html(output);
				ShowCorrectDivForStore('checkoutsetting','generalstoresetting','taxessetting','shippingsetting','emailsetting','advancedstoresetting');
				showActiveClass('checkout');
			});
	}
function goBackToStore()
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'goBack'}, function(output){
				$('#storepage').html(output);
			});
	}
function saveStoreInfo()
	{
		var domain_id    = $('#domain_id').val();
		var currency     = $('#curr_name').val();
		
		var company_name = $('#company_name').val();
		var street       = $('#street').val();
		var postal       = $('#postal').val();
		var country      = $('#country').val();
		var state        = $('#state').val();
		var storeemail   = $('#storeemail').val();
		var ph_no        = $('#ph_no').val();
		var shipping_policy = $('#shipping_policy').val();
		var return_policy   = $('#return_policy').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'currency':currency,'company_name':company_name,'street':street,'postal':postal,'country':country,'state':state,'storeemail':storeemail,'ph_no':ph_no,'shipping_policy':shipping_policy,'return_policy':return_policy,'action':'addStoreInformation'}, function(output){
			$('#generalstoresetting').html(output);
		 	});
		
	}
function saveStoreTax()
	{
		var domain_id = $('#domain_id').val();
		var tax_rate = $('#tax_rate').val();
		
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'tax_rate':tax_rate,'action':'addtaxInformation'}, function(output){
			$('#taxessetting').html(output);
			});
	}
function enablepaypal()
	{
		var domain_id = $('#domain_id').val();
	 
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'action':'paypalInformation'}, function(output){
			$('#checkoutsetting').html(output);
			});
	}
function addShippingInfo()
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'action':'addShipInformation'}, function(output){
			$('#shiplist').hide();
			$('#addShiping').html(output);
			});
	}
function saveShipInfo()
	{
		var domain_id = $('#domain_id').val();
		var ship_name = $('#ship_name').val();
		var ship_days = $('#ship_days').val();
		var ship_price = $('#ship_price').val();
		if(ship_name == "")
			{
				$('#errmsg').html("Please Enter Shipping Name");
				return false; 
				
			}
		if(ship_days == "")
			{
				$('#errmsg').html("Please Enter Shipping Days");
				return false;
			}
		if(isNaN(ship_days))
			{
				$('#errmsg').html("Please Enter Shipping Days in numeric");
				return false;
			}
		if(ship_price == "")
			{
				$('#errmsg').html("Please Enter Shipping Price");
				return false;
			}
		if(isNaN(ship_price))
			{
				$('#errmsg').html("Please Enter Shipping Price in numeric");
				return false;
			}
			
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'ship_name':ship_name,'ship_days':ship_days,'ship_price':ship_price,'action':'insertShipInformation'}, function(output){
				$('#shippingsetting').html(output);
			});
	}
function deleteShip(shipid)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'shipid':shipid,'action':'deleteShipInformation'}, function(output){
				$('#shippingsetting').html(output);
			});
	}
function editShip(shipid)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'shipid':shipid,'action':'editShipInformation'}, function(output){
				$('#shippingsetting').html(output);
			});
	}
function editShipInfo()
	{
		var domain_id = $('#domain_id').val();
		var ship_id = $('#ship_id').val();
		var ship_name = $('#ship_name').val();
		var ship_days = $('#ship_days').val();
		var ship_price = $('#ship_price').val();
		if(ship_name == "")
			{
				$('#errmsg').html("Please Enter Shipping Name");
				return false;
			}
		if(ship_days == "")
			{
				$('#errmsg').html("Please Enter Shipping Days");
				return false;
			}
		if(isNaN(ship_days))
			{
				$('#errmsg').html("Please Enter Shipping Days in numeric");
				return false;
			}
		if(ship_price == "")
			{
				$('#errmsg').html("Please Enter Shipping Price");
				return false;
			}
		if(isNaN(ship_price))
			{
				$('#errmsg').html("Please Enter Shipping Price in numeric");
				return false;
			}
			
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'ship_id':ship_id,'ship_name':ship_name,'ship_days':ship_days,'ship_price':ship_price,'action':'updateShipInfo'}, function(output){
				$('#shippingsetting').html(output);
			});
	}
function saveAdvancedOption()
	{
		var option = $('#googleanalytics').val();
		$.post(jssitebaseUrl+'/ajaxFile.php',{'option':option,'action':'updateanalyticsInfo'}, function(output){
			});
	}
function updatewidthvalue(tdone,tdtwo,tdthree,tdfour,tdfive,colpagelist)
	{
		if(tdone == 'null')
			{
				tdone = '';
			}
		if(tdtwo == 'null')
			{
				tdtwo = '';
			}
		if(tdthree == 'null')
			{
				tdthree = '';
			}
		if(tdfour == 'null')
			{
				tdfour = '';
			}
		if(tdfive == 'null')
			{
				tdfive = '';
			}
		$.post(jssitebaseUrl+'/ajaxFile.php',{'td_col1':tdone,'td_col2':tdtwo,'td_col3':tdthree,'td_col4':tdfour,'td_col5':tdfive,'colpageid':colpagelist,'action':'updatewidthvalofcolumn'}, function(output){
			});
	}
function getOptionChoicePrice(val,domain_id)
	{
		var price = val.value;
		var shiplen = $('.shipval').length;
		for(var i=0;i<shiplen;i++)
			{
				if($('#shipval_'+i).attr('checked'))
					{
						var ship_val = $('#shipval_'+i).val();
					}
			}
		price = +price + +ship_val;
		$.post(jssitebaseUrl+'/ajaxFile.php',{'sale_price':price,'domain_id':domain_id,'action':'updateBuyPrice'}, function(output){
				$('#buyPrice').html(output);
			});
	}
function shippingValue(val,domain_id)
	{
		var ship_price = val.value;
		var price_select_val = '';
		var price_radio_val = '';
		var selectlen = $('.selectoption').length;
		for(var i=0;i<selectlen;i++)
			{
				if($('#options_'+i).attr('checked'))
					{
						var price_select_val = $('#options_'+i).val();
					}
				price_select_val = +price_select_val + +price_select_val;
			}
		
		alert(price_select_val);
		var productradiolen = $('.productradio').length;
		for(var i=0;i<productradiolen;i++)
			{
				if($('#product_choices_'+i).attr('checked'))
					{
						var price_radio_val = $('#product_choices_'+i).val();
					}
				price_radio_val = +price_radio_val + +price_radio_val;
			}
		alert(price_radio_val);
		if(price_select_val == '0' && price_radio_val == '0')
			{
				var buy_price = $('#sale_price').html();
			}
		else
			{
				var buy_price = +price_radio_val + +price_select_val;
			}
		var shiipprice = +ship_price + +buy_price;
		alert(shiipprice);
		$.post(jssitebaseUrl+'/ajaxFile.php',{'sale_price':shiipprice,'domain_id':domain_id,'action':'updateBuyPrice'}, function(output){
				$('#buyPrice').html(output);
			});
		
	}
/*********************************************************************************************************************/
//view order history
function viewOrderHistory(orderid)
    {
        $('#store_admin_orderdetails_popup').modal('show');
        $.post(jssitebaseUrl+'/ajaxAction.php',{'orderid':orderid,'action':'store_admin_vieworderhistory'}, function(output){
                
				$('#store_orderhistory').html(output);
                $('#maska').show();
			});
    }    
/*******************************************************************************************************************/    
function buyProductView()
	{
		var shiplen = $('.shipval').length;
		var ship_val = '0'; 
		var price_radio_val = '0';
		var price_select_val = '0';
		var domain_id = $('#domain_id').val();
		var product_id = $('#product_id').val();
		
		for(var i=0;i<shiplen;i++)
			{
				if($('#shipval_'+i).attr('checked'))
					{
						var ship_val = $('#shipval_'+i).val();
					}
			}
		if(ship_val == "0")
			{
				alert("please choose shipping");
				return false;
			}
			
		var selectlen = $('.selectoption').length;
		for(var i=0;i<selectlen;i++)
			{
				if($('#options_'+i).val())
					{
						var price_selectval = $('#options_'+i).val();
						price_select_val = +price_select_val + +price_selectval;
					}
				
			}
		var productradiolen = $('.productradio').length;
		for(var i=0;i<productradiolen;i++)
			{
				if($('#product_choices_'+i).attr('checked'))
					{
						var price_radioval = $('#product_choices_'+i).val();
						price_radio_val = +price_radio_val + +price_radioval;
					}
			}
		
		
		if(price_select_val == '0' && price_radio_val == '0')
			{
				var buy_price = $('#sale_price').html();
				var shiipprice = +buy_price + +ship_val;
			}
		else
			{
				var shiipprice = +price_radio_val + +price_select_val + +ship_val;
			}
		$.post(jssitebaseUrl+'/ajaxFile.php',{'sale_price':shiipprice,'domain_id':domain_id,'product_id':product_id,'ship_value':ship_val,'action':'updateBuyPrice'}, function(output){
				window.location = jssitebaseUrl+'/paymentoption/'+output;
			});
	}


$(document).ready( function(){
	$('#masktable').hover(function(){
	
	});
});
function showexternalLinkContentPop(link_site)
    {
        $("#externalLinkBuildPop").show();
        $("#content").html(link_site);
    }
function mouseout(link_site){
	$("#externalLinkBuildPop").hide();
}
function validateLink()
    {        
        var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
        var urlToValidate = $("#link_site").val();
        var pagnename=$("#page_name").val();
        $(".errormsg").removeClass("errormsg");
        if(pagnename == '')
            {
                $("#domainv").addClass('errormsg').html("Please enter Page name");               
    			$("#page_name").focus();
    			return false;
            }
        else if(urlToValidate=='')
            {
                $("#domainv").addClass('errormsg').html("Please enter URL");                
    			$("#page_name").focus();
    			return false;
            }    
        else if(!myRegExp.test(urlToValidate))
            {
                $("#domainv").addClass('errormsg').html("Please enter valid url");
                $("#link_site").val('');
    			$("#link_site").focus();
    			return false;
            }            
        else
            {
                savePage(id);
            }
         
    }
function validatePage(id) 
{
    
    var pagename    = $("#page_name").val();
   
    if(pagename=="")
        {            
            $("#domainv").addClass('errormsg').html("Please enter Page name");               
			$("#page_name").focus();
			return false;
        }
        else
        {
             savePage(id);
        }
}    
//this image updating process for upload slider images
function sliderImageUpdatingProcess(id)
	{	     
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
      	$(".progress").show();
		$('#imageform_'+id).ajaxForm({
		
			beforeSend: function() {
				status.empty();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
                $(".upload_btn_save").show();
				$("#imageloadstatus_"+id).show();
				$("#imageloadbutton_"+id).hide();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
                
				console.log(percentVal, position, total);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).hide();              
		 		$(".SlideUploadForm label").show();
                $(".progress").hide();
			},
			complete: function(xhr) {
				
                if(xhr.responseText.match("Unknown extension")=="Unknown extension")
                 {
                    
                    $("#imageloadstatus_"+id).hide();  
                    $(".progress").hide();
        			$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("Please Upload Only Image Files");
                 }
                else if(xhr.responseText.match("You have exceeded the size limit! so moving unsuccessful!")=="You have exceeded the size limit! so moving unsuccessful!") {
                    
                    $("#imageloadstatus_"+id).hide();  
                    $(".progress").hide();
        			$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("You have exceeded the size limit! so moving unsuccessful!");
                 }
                else
                 {
                    $(".SlideUploadImge").append(xhr.responseText);
                 }
			}
		}).submit();	
	}
//this image updating process for upload slider images
function galleryImageUpdatingProcess(id)
	{	     
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		
		$('#imageform_'+id).ajaxForm({
			
			beforeSend: function() {
				status.empty();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).show();
				$("#imageloadbutton_"+id).hide();
                $(".upload_btn_save").show();
                $(".progress").show();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				console.log("upload");
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).hide();              
		 		$(".SlideUploadForm label").show();
                $(".progress").hide();
                $(".upload_btn_save").show();
			},
			complete: function(xhr) {
				
                if(xhr.responseText.match("Unknown extension!")=="Unknown extension!")
                {
                    //$('#slidesortableImg li:last-child').remove();
                    //$('#galcolumn_preview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			//$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("Please Upload Image Files");
                }
                else if(xhr.responseText.match("You have exceeded the size limit! so moving unsuccessful!")=="You have exceeded the size limit! so moving unsuccessful!"){
                    //$('#slidesortableImg li:last-child').remove();
                    //$('#galcolumn_preview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			//$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("You have exceeded the size limit! so moving unsuccessful!");
                }
                else
                {
                    $(".SlideUploadImge").append(xhr.responseText);
                    UpdateImageLibrary();
                }
			}
		}).submit();		
	}
 //image uploading process for column
 function columnGalleryImageUpdatingProcess(id)
	{
        
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		$('#imageform_'+id).ajaxForm({
			 
			beforeSend: function() {
				status.empty();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
				$(".upload_btn_save").show();
				$("#imageloadstatus_"+id).show();
		 		$("#imageloadbutton_"+id).hide();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
				
				console.log(percentVal, position, total);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).hide();
                $("#imageloadbutton_"+id).show();              
                $(".SlideUploadForm label").show();        
			},
			complete: function(xhr) {
				if(xhr.responseText.match("Unknown extension!")=="Unknown extension!")
                {
                    //$('#slidesortableImg li:last-child').remove();
                    //$('#galcolumn_preview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			//$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("Please Upload Image Files");
                }
                else if(xhr.responseText.match("You have exceeded the size limit! so moving unsuccessful!")=="You have exceeded the size limit! so moving unsuccessful!"){
                    //$('#slidesortableImg li:last-child').remove();
                    //$('#galcolumn_preview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			//$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("You have exceeded the size limit! so moving unsuccessful!");
                }
                else
                {
                    $("#galcolumn_preview").append(xhr.responseText);
                    UpdateImageLibrary();
                }
			}
		}).submit();	
	}
//image uploading process for column
function columnImageUpdatingProcess(id)
	{        
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		$('#imageform_'+id).ajaxForm({
			
			beforeSend: function() {
				status.empty();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).show();
				$(".upload_btn_save").show();
		 		$("#imageloadbutton_"+id).hide();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
				
				console.log(percentVal, position, total);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).hide();              
                $(".SlideUploadForm label").show();        
			},
			complete: function(xhr) {
			 if(xhr.responseText.match("Unknown extension")=="Unknown extension")
             {
                alert("Please Upload Only Image Files");
             }
             else
             {
                $(".SlideUploadImge").append(xhr.responseText);                                        
         
             }   
			}
		}).submit();	
	}
//image uploading process for banner slider
function bannerImageUpdatingProcess()
    {
            var uploadtype      = $("#uploadtype").val();
            if(uploadtype=="fileupload")
            {
                var bar = $('.bar');
    			var percent = $('.percent');
    			var status = $('#status');
    	      	$(".progress").show();  
    	        $("#sliderimageform").ajaxForm({ 
    		     beforeSubmit:function(){ 
    		        status.empty();
    				var percentVal = '0%';
    				bar.width(percentVal)
    		     	$("#imageloadstatus").show();
    			 	$("#imageloadbutton").hide();
    			 }, 
                 uploadProgress: function(event, position, total, percentComplete) {
        				var percentVal = percentComplete + '%';
        				bar.width(percentVal)
        				percent.html(percentVal);
        		},
    			complete:function(xhr){ 
    			 var restxt=xhr.responseText;
    			 if(restxt.trim()=='Unknown extension')
                 {  
                    $('#slidesortableImg li:last-child').remove();
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			$("#imageloadbutton").hide();
    				$("#maska").hide();
                    alert("Unknown extension");
                 }
                 else if(restxt.trim()=='You have exceeded the size limit')
                 {                 
                    $('#slidesortableImg li:last-child').remove();                    
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			$("#imageloadbutton").hide();
    				$("#maska").hide();
                    alert("You have exceeded the size limit");
                 }
                 else
                 {
                    location.href   =	 location.href;
                 }    			          
    			
    			},             
    			error:function(){ 
    			    $("#imageloadstatus").hide();
    				$("#imageloadbutton").show();
    			} }).submit();
            }
            else if(uploadtype  == "libraryupload")
            {
                uploadlibimg_banner();
            }
            else
            {
                alert("Please select Image/Browse to upload");
            }
    }
function addImagesinslide()
{
    var imagarray=Array();
    var imagarray1=Array();
    var inx=0,i;
    $("#uploadtype").val("libraryupload");
    if($(".imageLibraryUl li.active img.libimg").length>0){
        $(".imageLibraryUl li.active img.libimg").each(function(){
            
            imagarray[inx]=$(this).attr('src');
            imagarray1[inx]=$(this).parent().attr('data-imgid');
            inx++;        
        });
        for(inx=0;inx<imagarray.length;inx++)
        {            
            $("#slidesortableImg").append("<li data-imgid='"+imagarray1[inx]+"' class=\"SlideUplWidtPopup\" > <img width=\"100%\" class='curslidimg' height=\"150\" src=\"\"> </li>");
            $('.curslidimg:last').attr("src",imagarray[inx]);
        }
        $("#bannercurslid").click();
        
    }
    else
    {
        alert("Select Image to Add");
    }
    
}

function uploadlibimg_banner()
{
        var imagarray=Array();
        var inx=0;
        $(".curslidimg").each(function(){
            
            imagarray[inx]=$(this).parent().attr('data-imgid');
            inx++;        
        });
        var domain_id=$("#domain_id").val();
        var page_id  = $("#page_id").val();
        $.post('ajaxFile.php',{'action':'UploadImage_Library','type':'bannerslider','domain_id':domain_id,'page_id':page_id,'pagelist':'','imgids':imagarray,'isGoogle':'No'},function(data){
        
        
        location.href=location.href;
        });
}       
/***********************************************************************************************/
//function to delete point domain
function deletePointDomain(pointdomain_id,domain_id)
    {        
        if(pointdomain_id != '' && domain_id != '')
            {               
                if(confirm('Are you sure want to delete?')){
    				$.post(jssitebaseUrl+'/ajaxFile.php', { 'pd_id':pointdomain_id, 'd_id':domain_id,'action':'deletepointdoamin' },function(response){
    				    //alert(response);
    					if(response == "success"){  						
    						window.location.reload();
    						return false;
    					}else{
    						alert("error");return false;
    					}
    				});return false;
    			}
            }
    }    
/*********************************************************************************************/  
//function to delete the main domain
function deleteNewDomain(newdomainid, domain_id)  
    {
        if(newdomainid != '' && domain_id != '')
            {               
                if(confirm('Are you sure want to delete?')){
    				$.post(jssitebaseUrl+'/ajaxFile.php', { 'nd_id':newdomainid, 'd_id':domain_id,'action':'deletenewdoamin'},function(response){ 			    
    					if(response == "success"){  						
    						window.location.reload();
    						return false;
    					}else{
    						alert("error");return false;
    					}
    				});return false;
    			}
            }
    }
/*****************************************************************************************************/     
//slider pop up functions
function showsliderFunc(page_list_id)
    {

        $("#sliderPoP").show();
		$(".loadmask").show();

        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'sliderFunction'},function(response){ 	
             if(response)
                $("#sliderPoP").html(response);
				//$("#sortableImg" ).sortable();
				//imagelibrarytabs(); 
        	});
    }
/*******************************************************************************************************************/
//slider pop up functions for column
//Gallery pop up functions
function showgalleryFunc(page_list_id)
    {

        $("#galleryPoP").show();
		$(".loadmask").show();

        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'galleryFunction'},function(response){ 	
             if(response)
                $("#galleryPoP").html(response);
				//imagelibrarytabs(); 
				//$("#sortableImg" ).sortable();
        	});
    }
//Gallery pop up functions for column
function showgalleryFuncForColumn(page_list_id)
    {        
        $("#galleryPoPColumn").show();
		$(".loadmask").show();

        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'galleryFunctionColumn'},function(response){ 	
             if(response)
                $("#galleryPoPColumn").html(response);
				//imagelibrarytabs(); 
				//$("#sortableImg" ).sortable();
        	});
    }    
function showsliderFuncForColumn(page_list_id)
    {
        $("#sliderPopColumn").show();
		$(".loadmask").show();
        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'sliderFunctionColumn'},function(response){ 	
             if(response)
                $("#sliderPopColumn").html(response);
				//imagelibrarytabs(); 
        	});
    }

/********************************************************************************************************************/
//for new domain add process
function addNewDomain(domain_name,domain_id)
	{
		$.post(jssitebaseUrl+'/ajaxFile.php',{'domainname':domain_name,'domain_id':domain_id,'action':'newdomainAdd'}, function(output){
			if(output)
                {
                     $("#err_msg").addClass('errormsg').html('Domain Not Added').show();
                }
		});
	}
/********************************************************************************************************************/
//gallery image upload popup
function showGalleryPopup(id)   {
    $('.imagepopupdiv').hide();
    $('#galimgpopup_'+id).show();
    $('#masktable').show();
    $('.imagepopupdiv').css('top','150px');
}

//Update pagelist after image uploads
function reloadPagelist()
{	
    $.getScript(jssitebaseUrl+"/js/allscripts.js");
    commonnew();  
	//imagelibrarytabs();
	$('.loadmask').hide();
	$("#loaderMask").hide();
    $(".columnloadmask").hide();
    $(".loadmask").hide();    
	$(".ui-loader").hide();
    $(".all_popup").hide();
}
//Update alignment of image
function updatealign_image(pagelist)
{
        var alignment=$("#imgalign"+pagelist).val();
    	$.post(jssitebaseUrl+"/ajaxFile.php",{"action":"updateImgAlign",'alignment':alignment,'pagelist':pagelist},function(data){
    	   $('.imagealignPopup').hide(); 
           $(".uploadImgBg"+pagelist).css("text-align",alignment);          
        });   
}
function imageReloadPagelist()
{	
	$.post(jssitebaseUrl+"/ajaxFile.php",{"action":"reloadPageList"},function(data){
		$("#build").html(data);       
        $.getScript(jssitebaseUrl+"/js/allscripts.js");   
        $('.scribt').each(function(){        
            eval($(this).html());        
        });
		commonnew();
		ajaxsortingandclickfun();
        
		$('.loadmask').hide();
		$("#loaderMask").hide();
        $(".columnloadmask").hide();
        $(".loadmask").hide();    
		$(".ui-loader").hide();
        $('.bgmaskTop,.bgmaskTopLine').hide();$('.arrow').removeClass('arrowhide');
   });
}
function texteditor()
{
	$(document).click(function(event){
		 if($(event.target).closest(".contentedit,#toolbar").length == 0) { $("#toolbar").fadeOut(200); } 
	});
}
function showHyperPopup(id)
{
    $("#hyperlinkpopup").show();
    $(".linktext").hide();
    $("#"+id).show();
}
function hideurlpopup(){
    $('.urlpopup,.loadmask').hide();
    $(".urlloadmask").hide();
}
function callLinkText(url,target)
{
   /*var urllink = '';
	var target = '';         
    $(".urlselect").click(function(){            
        urllink = $(".url").val();
		target = '_'+$(".target").val();   
        $('.urlpopup,.loadmask').hide();  */   
        $('.urlpopup,.urlloadmask').hide();
        var selectedText = document.getSelection().toString(); 
        if(selectedText=='')
        {
            selectedText    = url;
        }        
		document.execCommand('insertHTML', false, '<a href="' + url + '" target="'+target+'">' + selectedText + '</a>');
	//});
    /*return false;
    document.getElementById("buildTitle_185").selectionStart=2;
   
    document.getElementById("buildTitle_185").selectionEnd=4;
     
    var linktype    = $("[name=links]:checked").val();
    
    if(linktype=='url')
    {
         $.fn.freshereditor('createlink');
    }   
    if(linktype=='email')
    {
         $.fn.freshereditor('insertmailto');
    }*/
}          
$(document).ready(function(){
    $('.urlloadmask').click(function(e){
        $('.urlpopup,.urlloadmask').hide();
    });
});
//---------------------------------------------------------------------------
function domainPasswordvalidate(domainid){
	var domain_password = $.trim($("#domain_password").val());
	if( domain_password == '' ){                
		$("#domain_password_error").html("Please Enter the Password");
		$("#domain_password").focus();
		return false;
	}
	if(domain_password != '' && domainid !=''){
		$.post(jssitebaseUrl+"/ajaxFile.php",{"action":"subdomainPasswordChecking",'domain_password':domain_password,'domainid':domainid},function(data)
			{
				if(data == 'suc')
                {
				   $("#domain_password_check_div").hide();
				   $(".popuppasswordmask").hide(); 
                 }  
				else
                {
                    $("#domain_password_error").html("Try again");    
                }
				   
				return false;                          
			 }); 
		}    
    }
//---------------------------------------------------------------------------    
//File upload for blog
function blogfileUpload(id)
{
    var domain_id = $("#domain_id").val();
    var title_id = $("#title_id").val();
    var title = $("#titleforblog").val();
     
    $("#fileform"+id).ajaxForm({target: '#preview', 
    beforeSubmit:function(){ 
    $("#imageloadstatus_"+id).show();
    $("#imageloadbutton").hide();
    }, 
    success:function(){ 
    $("#imageloadstatus_"+id).hide();
    $("#imageloadbutton").hide();
    $("#maska").hide(); 
    $(".bgmaskTop").hide();                                     
    ShowTitlePopup(domain_id,title_id,title);
    
    }, 
    error:function(){ 
    $("#imageloadstatus_"+id).hide();
    $("#imageloadbutton").show();
    } }).submit();   
}

//Single image Popup
function showSinglePopup(page_list_id)
	{
		$("#singlePoP").show();
		$(".loadmask").show();
                   
        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'singleImageShow'},function(response){ 	
         if(response)
            $("#singlePoP").html(response);
            //imagelibrarytabs();    			
    	});
	}
    
//image Text Popup
function showImageTxtPopup(page_list_id)
	{
		$("#imageTxtPop").show();
		$(".loadmask").show();

        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'action':'ImagetxtShow'},function(response){ 	
         if(response)
            $("#imageTxtPop").html(response);
			imagelibrarytabs();
    	});
	}        
    
//Show dosc upload popup    
function showDocUploadPop()
{
    $('#uploadFilePopup1389').show();
    $('.loadmask').show();
}    
//Reload pagelist for blog
function blogImageReloadPagelist()
{	
	$.post(jssitebaseUrl+"/ajaxFile.php",{"action":"reloadPageList"},function(data){
		$(".blogdrop").html(data);       
        $.getScript(jssitebaseUrl+"/js/allscripts.js");   
        $('.scribt').each(function(){        
            eval($(this).html());        
        });
		commonnew();
		ajaxsortingandclickfun();
		$('.loadmask').hide();
		$("#loaderMask").hide();
        	$(".columnloadmask").hide();
        	$(".loadmask").hide();    
		$(".ui-loader").hide();
   });
}
//Show contact form  popup 
function ShowContactForm_fieldspopup(page_list_id)
{
    $.post(jssitebaseUrl+"/ajaxFile.php","page_list_id="+page_list_id+"&action=showcontactfieldpopup",function(data){        
        
         $('#add_new_custom_field').html(data).show();
		 $("#contactmask").show();
		 $("#contactmask").css({"z-index":1010});
    });
}

//Add new contact form fields
function AddContactFormField()
{
    
    if($("#label_name").val()=="")
    {
        alert("Please enter Label name");
        $("#label_name").focus();
    }
    
    else if($("#field_type").val()=="")
    {
        alert("Please Select Type");
        $("#field_type").focus();
    }
    else
    {
        $('.default_value option').attr('selected','selected');   
        $.post(jssitebaseUrl+"/ajaxFile.php",$("#contactformfieldfrm").serialize(),function(data){    
			if(data=="BLOG")
			{            
				ShowTitlePopup($("#domain_id").val(),$("#title_id").val(),$("#titleforblog").val());
				$("#add_new_custom_field").hide();
			}
			else
			{
				imageReloadPagelist();
			} 
			$("#contactmask").hide();
        });
    }
    
}

//Show contact form fields list
function showContactFormFieldsList(field_id,page_list_id)
{
    $.post(jssitebaseUrl+"/ajaxFile.php",{'action':'contactFormFieldDetails','page_list_id':page_list_id,'field_id':field_id},function(data){    
         $('#contactForm').html(data);
    });
}

//Save contact form details
function SaveContactFields()
{   
    $('#default_value option').attr('selected','selected');   
    
    $.post(jssitebaseUrl+"/ajaxFile.php",$("#contactlist").serialize(),function(data){
        
        if(data=="BLOG")
        {            
            ShowTitlePopup($("#domain_id").val(),$("#title_id").val(),$("#titleforblog").val());
        }
        else
        {
            imageReloadPagelist();
        }        
         
    });
    
}

//
function deleteCustomeFields(field_id,divid)
{
    $.post(jssitebaseUrl+"/ajaxFile.php",{'action':"deleteCustomeField",'field_id':field_id},function(data){    
         $("#"+divid).remove();
         
    });
}

function imagelibrarytabs(){
	$( "#gallery_imageLibrary,#column_gallery_imageLibrary,#image_text_Library,#single_imageLibrary,#column_slide_imageLibrary,#imageLibrary" ).tabs();
	$(".library_content li").click(function(){
		//$(".imageLibraryUl li").removeClass("active");
		$(this).toggleClass("active");	
	});
	
	$("#image_text_Library,#single_imageLibrary").tabs();        
	$("#image_text_Library .imageLibraryUl li,#single_imageLibrary .imageLibraryUl li").click(function(){
		$("#image_text_Library .imageLibraryUl li,#single_imageLibrary .imageLibraryUl li").removeClass("active");
		$(this).addClass("active");
	});
    $( "#banner_slider_imageLibrary" ).tabs();        
	$("#banner_slider_imageLibrary .imageLibraryUl li").click(function(){
		$(this).toggleClass("active");
	});
    $( "#banner_imageLibrary" ).tabs();        
	$("#banner_imageLibrary .imageLibraryUl li").click(function(){
	    $(".imageLibraryUl li").removeClass("active");
		$(this).toggleClass("active");	
	});
}
 
//Upload slider image from image library
function uploadLibraryImages(domain_id,page_id,page_list_id,type)
{
    var imagarray=Array();
    var inx=0,i;
    var column_id  = $("#column_id").val();

    if(column_id != '' && column_id != undefined)
    	 column_id = column_id;
    else
    	 column_id = '0';

    if($(".imageLibraryUl li.active").length>0){
        $("#loaderMask").show();
	    $(".ui-loader").show();
        $(".imageLibraryUl li.active").each(function(){
            
            imagarray[inx]=$(this).attr('data-imgid');
            inx++;        
        });
		var screenImage = $(".imageLibraryUl li.active img");
		var theImage = new Image();
		theImage.src = screenImage.attr("src");
		/*var width = theImage.width;
		var height = theImage.height;*/
		var newheightsmall  = theImage.height;
		var newwidthsmall   = theImage.width;
		var height  =  (newheightsmall/newwidthsmall)*270;
		var width = (newwidthsmall/newheightsmall)*height;
		updateImageForPage(page_list_id,width,'');
        $.post('ajaxFile.php',{'action':'UploadImage_Library','type':type,'domain_id':domain_id,'page_id':page_id,'pagelist':page_list_id,'imgids':imagarray,'column_id':column_id},function(data){
			$("#loaderMask").show();
			$(".ui-loader").show();
			if(type=='background')
			{
				$("#backimg").attr("src",imagarray[0]);
				location.href=location.href;
			}        
			if(data.match("BLOG")=="BLOG")
			{            
				ShowTitlePopup($("#domain_id").val(),$("#title_id").val(),$("#titleforblog").val());
				$("#imageTxtPop").hide();
				$("#singlePoP").hide();
				$("#galleryPoP").hide();
				$("#sliderPoP").hide();
			}
			else
			{				
				imageReloadPagelist();
			} 
        });
   }
   else
   {
        alert("Please select images");
   } 
}
function BlogPublish(domain_id,title_id)
{   
    $(".loadmask").show();    
    $("#publishPopup").show();
    $(".loadingurl_gif").show();
    $('#domainname').html("");                        
    $('#publish').show();
    $(".publishTxt").html('Blog Published');
    $.post(jssitebaseUrl+"/ajaxFile.php",$('#postCat').serialize()+"&action=BlogPublish",function(data){
        //location.href='main.php';
         $(".loadingurl_gif").hide();
         var url=data.split("|@|");
         $('#domainname').html("<a href='"+url[1]+"/blogview/"+title_id+"' target='_blank'>"+url[1]+"/blogview/"+title_id+"</a>");
		 reloadPagelist();
        });
} 

//Delete image from image library
function deleteLibraryImage(imgid,obj)
{          
    var conf        = confirm("Are you sure want to delete? \nWarning! If you Delete this image may be not displayed where ever you have used");   
    if(conf)
    {
        $.post(jssitebaseUrl+"/ajaxFile.php",{'action':'deleteLibraryImage','imgid':imgid},function(data){    
         $(obj).parent().remove();        
        });
    }
    
}
//this image updating process for upload slider images
function singleImageUpdatingProcess(id)
    {
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
        
		$('#imageform_'+id).ajaxForm({
			target: '#singlepreview', 
			beforeSend: function() {
				status.empty();
                $(".progress").show();
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).show();
				$("#imageloadbutton_"+id).hide();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				console.log("upload");
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			success: function() {				    
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
				$("#imageloadstatus_"+id).hide();              
		 		$(".SlideUploadForm label").show();
                $(".progress").show();
			},
			complete: function(xhr) {
    			if(xhr.responseText.match("Unknown extension!")=="Unknown extension!")
                {
                    //$('#slidesortableImg li:last-child').remove();
                    $('#singlepreview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("Please Upload Image Files");
                }
                else if(xhr.responseText.match("You have exceeded the size limit! so moving unsuccessful!")=="You have exceeded the size limit! so moving unsuccessful!"){
                    //$('#slidesortableImg li:last-child').remove();
                    $('#singlepreview').html('');
                    $("#imageloadstatus").hide();
                    $(".progress").hide();
        			$("#imageloadbutton_"+id).hide();
    				$("#maska").hide();
                    alert("You have exceeded the size limit! so moving unsuccessful!");
                }
                else
                {
                    imageReloadPagelist();
                }
			}
		}).submit();	
	}
//change options div
function changeoptionsdiv(obj)
{
    var type=obj.value;
    if(type=="text" || type=="textarea")
    {
        $("#placeholder_div").show();
        $("#default_vauediv").show();        
    }
    else
    {
        $("#placeholder_div").hide(); 
        $("#default_vauediv").hide(); 
        
    }
    if(type=="text" || type=="textarea" || type=='select')
    {
        $("#widthdivs").show();
    }
    else
    {
         $("#widthdivs").hide();     
    }

    $.post(jssitebaseUrl+"/ajaxFile.php",{'action':'getOptionFrom','type':type},function(data){    
         $("#optionsdiv").html(data);        
    });
    
} 
function blogImageUpdatingProcess(id){
    var domain_id = $("#domain_id").val();
    var title_id = $("#title_id").val();
    var title = $("#titleforblog").val();
    $("#imageloadstatus_"+id).show();
   
    $(".imagepopupdiv").hide();
    $("#imageform_"+id).ajaxForm({target: '#preview', 
    
        beforeSubmit:function(){ 
        $("#imageloadstatus_"+id).show();
        }, 

        success:function(){ 
        $("#imageloadstatus_"+id).hide();
        $("#imageloadbutton_"+id).hide();
        $("#singlePoP").hide();
        $("#imageTxtPop").hide();
        ShowTitlePopup(domain_id,title_id,title);
        }, 
        error:function(){ 
        $("#imageloadstatus_"+id).hide();
        $("#imageloadbutton_"+id).show();
        } 
    }).submit();
}  

//Save background changes        
function SaveBackgroundChanges()
{
    var type=$(".backstatus.active[data-val=ON]").attr("data-back");
    
    var backgroundcolor     = $('.bgboxcolor').css("background-color");
    var uploadtype=$("#uploadtype").val();
    if(uploadtype=="upimg")
    {
        $("#imagebackground").ajaxForm({target: '#preview', 
		     beforeSubmit:function(){ 
		      $("#imageloadstatus").show();
		    }, 
			success:function(){ 
			     // window.location = jssitebaseUrl+'/main.php';
                $("#imageloadstatus").hide();
			}, 
            complete: function(xhr)
            {						
                if(xhr.responseText.match("Unknown extension")=="Unknown extension")
                 {
                    alert("Please Upload Only Image Files")
                 }
                 else
                 {
                    $("#background_img").html(xhr.responseText);
                    $("#background_img img").css("height","50px");
                    $("#background_img img").css("width","100px");
                 }
			},
			error:function(){ 
			} }).submit();
    }
    
    $.post("ajaxFile.php",{"action":"changeBackgroundColoroff","type":type,'backgroundcolor':backgroundcolor},function(data){        
        if(uploadtype=="lipimg")
        {
            $("#lipimguplod").trigger("click");            
        }
        else
        {
            location.href=location.href;
        }        
    });
}  
//Gallery Image Delete Process.
	function deleteGalImg(domain_id,page_id,page_list_id,gal_id,img_name)
		{
			$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'gallery_id':gal_id,'image_name':img_name,'action':'delImgforGallery'}, function(output){
				
                $("#galleryPoP").html(output);
                $("#imageGallery"+gal_id).remove();                
                if($("#galImg_"+page_list_id).html().trim()=="")
                {
                    $("#galImg_"+page_list_id).html("<form  class='form-horizontal sky-form' method='post' enctype='multipart/form-data' action='ajaxGalleryImageUpload.php' style='clear:both'><label id='imageloadbutton_'"+page_list_id+" class='input input-file' style='display:block; height:135px;' for='file'><div class='button'><input type='button' name='photos[]' id='photoimg_'"+page_list_id+"' class='inputfile' onclick='showgalleryFuncForColumn("+page_list_id+");' /></div><input type='hidden' name='page_list_id' value='"+page_list_id+"'/></label></form>");
                }
			});
		}
function galleryreload()
{
	$("#galleryPoP").hide();
	$("#sliderPoP").hide();
	$("#galleryPoPColumn").hide();
	$("#sliderPopColumn").hide();
	if($("#blog_comment").val()==1)
	{
		ShowTitlePopup($("#domain_id").val(),$("#title_id").val(),$("#titleforblog").val());	
	}
	else
	{
		imageReloadPagelist();
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
	 var domain_id	    =	$("#domain_id_inv").val();
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
    	$.post(jssitebaseUrl+"/ajaxFile.php",{"action":"buydomainInvoiceStore","inv_fname":inv_fname,'inv_surname':inv_surname,'inv_for':inv_for,'inv_compname':inv_compname,'inv_taxoff':inv_taxoff,'inv_taxnum':inv_taxnum,'inv_idnumber':inv_idnumber,'inv_district':inv_district,'inv_city':inv_city,'inv_country':inv_country,'inv_address':inv_address,'domain_id':domain_id},function(data)
    	{   
    	
	        if(data == "success")
	        {
	            if(jssiteuserfriendly == 'Y')
                    window.location.href = jssitebaseUrl+'/subscription/'+domain_id;
               else
                    window.location.href = jssitebaseUrl+'/subscription.php?domain_id='+domain_id;         
	        }
	        else
	        {
	            alert("Sorry!...Internal server error.Try again");
	        }        
	    });
    }  

}

function refrashCaptchacode(id){   
	$(".refreshCode").load(jssitebaseUrl+"/ajaxAction.php?action=viewRefreshCaptchacode&id="+id);
    
}

//Column text with  image Popup
function showColumnImagePopup(page_list_id,column_id)
	{
		$("#columnImagePoP").show();
		$(".loadmask").show();
                   
        $.post(jssitebaseUrl+'/ajaxFile.php', { 'page_list_id':page_list_id,'column_id':column_id,'action':'columnImageShow'},function(response){ 	
         if(response)
            $("#columnImagePoP").html(response);  			
    	});
	}
//Update Title
function updateTilte_columnImage(page_list_id,column_id)
{			        
    
 	var textval   = $('#coltext_title_'+column_id).html();
	var title     = textval; 
	var domain_id = $('#domain_id').val();
	var page_id   = $('#page_id').val();
	var column_id = column_id;

	$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'title':title,'column_id':column_id,'action':'updateTilte_columnImage'}, function(output){
		
		});                 
}

//Update Desc
function updateDesc_columnImage(page_list_id,column_id)
{			        
    
 	var textval   = $('#coltext_desc_'+column_id).html();
	var description     = textval; 
	var domain_id = $('#domain_id').val();
	var page_id   = $('#page_id').val();
	var column_id = column_id;

	$.post(jssitebaseUrl+'/ajaxFile.php',{'domain_id':domain_id,'page_id':page_id,'page_list_id':page_list_id,'description':description,'column_id':column_id,'action':'updateDesc_columnImage'}, function(output){
		
		});                 
}