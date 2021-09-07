var submitElement = document.getElementById("form-submit");
var submitElement = document.getElementById("form-submit");
var formElement = document.getElementById("signupForm");
var emailElement = document.getElementById("email");
var passwordElement = document.getElementById("pass");
var emailerrorElement = document.getElementById("emailerror");
var passerrorElement = document.getElementById("passerror");


var emailValid;
var confirmPass;
var emailexist;


submitElement.addEventListener("click", function () {
	validateEmail();
	confirmPassword();


		if(!emailValid){
    emailerrorElement.innerHTML="Please enter a valid email";
    var element = document.getElementById("validemail");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
     $.fn.myFunction();
    var element = document.getElementById("validemail");
    element.classList.remove("alert-danger");
    emailerrorElement.innerHTML="";
  }

  if(!confirmPass){
    passerrorElement.innerHTML="Please enter a valid password";
    var element = document.getElementById("password");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("password");
    element.classList.remove("alert-danger");
    passerrorElement.innerHTML="";
  }

	  if(emailValid && confirmPass &&  emailexist){
	formElement.submit();
}
});

function validateEmail() {
  var emailValue = emailElement.value;
  emailValid = false;
  if (
    emailValue.length > 5 &&
    emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
    emailValue.lastIndexOf("@") != -1
  ) {
    emailValid = true;
  }
}

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.value.length > 5) {
    confirmPass = true;
  }
}

$(document).ready(function(){
    $.fn.myFunction = function(){
  var x = "'"+emailElement.value +"'";
  $.post("php/checkemailapi.php",
          {
          email: x
          }, function(data){
            data = $.parseJSON( data );
                   if(data[0]['response'] == 1){
                      emailexist = true;
                      $('#head').html("Enter your information");
                   }else{
                    emailexist = false;
                      $('#head').html("This email does not exist");

                   }
                });
}
});