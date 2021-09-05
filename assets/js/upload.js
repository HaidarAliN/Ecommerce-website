var submitElement = document.getElementById("form-submit");
var formElement = document.getElementById("signupForm");
var shopnameElement = document.getElementById("shop_name");
var shopcElement = document.getElementById("category");

var shopnameerror = document.getElementById("shopnameerror");
var shopcerror = document.getElementById("shopcerror");

var shopnameValid;
var shopcValid;
var imageVal;
  
submitElement.addEventListener("click", function () {
  validateImage();
  validashopname();
  validashopc();

  if(!shopnameValid){
    shopnameerror.innerHTML = "Please enter a valid name, more than two characters";
    var element = document.getElementById("sn");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("sn");
    element.classList.remove("alert-danger");
    shopnameerror.innerHTML = "";
  }

  if(!shopcValid){
    shopcerror.innerHTML = "Please enter a valid category, more than two characters";
    var element = document.getElementById("sc");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("sc");
    element.classList.remove("alert-danger");
    shopcerror.innerHTML = "";
  }

  if (imageVal && shopnameValid && shopcValid){
  formElement.submit();
  }
});

$(function() {
  $('input[type=file]').change(function(){
    var t = $(this).val();
    var labelText = 'File : ' + t.substr(12, t.length);
    $(this).prev('label').text(labelText);
  })
});

function validateImage() {
  imageVal = false;
    var img = $("#img_file").val();
    if (img == null) {
      alert("please upload an image");
      return}
    var exts = ['jpg','jpeg','png','gif', 'bmp'];
    // split file name at dot
    var get_ext = img.split('.');
    // reverse name to check extension
    get_ext = get_ext.reverse();
    if (img.length > 0 ) {
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          imageVal = true;
        } else {
             alert("Upload only jpg, jpeg, png, gif, bmp images");
            imageVal = false;
        }            
    } else {
        alert("please upload an image");
        imageVal = false;
    }
}

function validashopname(){
  shopnameValid = false;
  if(shopnameElement.value.length>2){
    shopnameValid = true;
  }
}

function validashopc(){
  shopcValid = false;
  if(shopcElement.value.length>2){
    shopcValid = true;
  }
}