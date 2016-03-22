//Author ::kathirvel

/*function callFacebookConnect()
  {
  	//appid::624881480908654
  	//secret key ::e20e174af02afdb790b35556017c0a3e
  	FB.init({
					appId   : '614070828665584',			
					status  : true, 
					cookie  : true, 
					xfbml   : true
				});
		
		FB.login(function(response) 
			 {
	        	if(response.authResponse) 
				{
	          		FB.api('/me', function(response) 
					{	
						if(response.email!="")
	          			{       			
            				
							$.post(jssitebaseUrl+'/ajaxFile.php',{'logemail':response.email,'customername':response.name,'customeraddress':response.user_hometown,'aboutme':'Admin','action':'userLoginFb'},function(data){								
								//Without Pending Status:
								if(data=="loginSuccess"){									
									window.location.href=jssitebaseUrl+"/userHome.php";
								}else{
									alert("Invalid Email Id");
									FB.logout();
								}
							});
						}
	          		});
	        	}
	       	 },{scope: 'email'},{scope:'user_location'});		
  }	  */
  
  
  function callFacebookConnect() {
  	FB.init({
        //appId: "614070828665584",
        appId:document.getElementById("facebook_api_value").value,
        status: true,
        cookie: true,
        xfbml: true
    });
    FB.login(function (e) {
    	if (e.authResponse) {
            FB.api("/me", function (e) {
            	if (e.email != "") {
                    $.post(jssitebaseUrl+'/ajaxFile.php',{'logemail':e.email,'customername':e.name,'customeraddress':e.user_hometown,'aboutme':'Admin','action':'userLoginFb'},function(data){								
								//Without Pending Status:
								if(data=="loginSuccess"){									
									window.location.href=jssitebaseUrl+"/userHome.php";
								}else if(data=="signupSuccess"){									
									window.location.href=jssitebaseUrl+"/onboarding.php";
								}else{
									alert("Invalid Email Id");
									FB.logout();
								}
							});
                }
            })
        }
    }, {
        scope: "email"
    }, {
        scope: "user_location"
    })
}
$(document).ready(function () {
    FB.init({
        appId:document.getElementById("facebook_api_value").value,
        status: true,
        cookie: true,
        xfbml: true
    })
})