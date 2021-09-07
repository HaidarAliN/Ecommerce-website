var submitElement = document.getElementById("form-submit");
var formElement = document.getElementById("signupForm");
var emailElement = document.getElementById("email");
var fnameElement = document.getElementById("first_name1");
var lnameElement = document.getElementById("last_name1");
var addressElement = document.getElementById("address");
var passwordElement = document.getElementById("password");
var confirmPasswordElement = document.getElementById("confirmpassword");

var firstnameerror = document.getElementById("firstnameerror");
var lastnameerror = document.getElementById("lastnameerror");
var emailerror = document.getElementById("emailnameerror");
var cpasserror = document.getElementById("cpasserror");
var addresserror = document.getElementById("addresserror");


var emailValid;
var fnameValid;
var lnameValid;
var confirmPass;
var addressValid;
var emailexist;

submitElement.addEventListener("click", function () {
	validateEmail()
	validatefname()
	validatelname()
	confirmPassword()
	validateaddress()

	if(!emailValid){
    emailerror.innerHTML = "Please enter a valid email";
    var element = document.getElementById("validemail");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    $.fn.myFunction();
    var element = document.getElementById("validemail");
    element.classList.remove("alert-danger");
    emailerror.innerHTMemail="";
  }

  if(!fnameValid){
    firstnameerror.innerHTML = "Please enter a valid name, more than three characters";
    var element = document.getElementById("fn");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("fn");
    element.classList.remove("alert-danger");
    firstnameerror.innerHTML = "";
  }

  if(!lnameValid){
    lastnameerror.innerHTML = "Please enter a valid name, more than three characters";
     var element = document.getElementById("ln");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("ln");
    element.classList.remove("alert-danger");
    lastnameerror.innerHTML = "";
  }

  if(!addressValid){
    addresserror.innerHTML = "Please enter a valid address";
    var element = document.getElementById("add");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("add");
    element.classList.remove("alert-danger");
    addresserror.innerHTML = "";
  }

  if(!confirmPass){
    cpasserror.innerHTML = "Please enter the same password";
    var element = document.getElementById("cpass");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("cpass");
    element.classList.remove("alert-danger");
    cpasserror.innerHTML = "";
  }

  if(emailValid &&lnameValid && addressValid && confirmPass &&  fnameValid && emailexist){
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

function validatefname(){
  fnameValid = false;
  if(fnameElement.value.length>2){
    fnameValid = true;
  }
}

function validatelname(){
  lnameValid = false;
  if(lnameElement.value.length>2){
    lnameValid = true;
  }
}

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.value == confirmPasswordElement.value && passwordElement.value.length > 5) {
    confirmPass = true;
  }
}

function validateaddress(){
  addressValid = false;
  if(addressElement.value.length>5){
    addressValid = true;
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
                      emailexist = false;
                      $('#head').html("This email does not exist");
                   }else{
                    emailexist = true;
                      $('#head').html("Enter your information");

                   }
                });
}
});