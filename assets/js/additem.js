var submitElement = document.getElementById("form-submit");
var formElement = document.getElementById("additemForm");
var pnElement = document.getElementById("product_name");
var cElement = document.getElementById("category");
var qElement = document.getElementById("quatity");
var pElement = document.getElementById("price");
var dElement = document.getElementById("description");

var pnerror = document.getElementById("pnerror");
var cerror = document.getElementById("cerror");
var qerror = document.getElementById("qerror");
var perror = document.getElementById("perror");
var derror = document.getElementById("derror");

var imageVal;
var pnValid;
var cValid;
var qValid;
var pValid;
var dValid;
  
submitElement.addEventListener("click", function () {
  validateImage();
  validpn();
  validc();
  validq();
  validp();
  validd();



    if(!pnValid){
    pnerror.innerHTML = "Please enter a valid name, more than two characters";
    var element = document.getElementById("pn");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("pn");
    element.classList.remove("alert-danger");
    pnerror.innerHTML = "";
  }

      if(!cValid){
    cerror.innerHTML = "Please enter a valid category, more than two characters";
    var element = document.getElementById("c");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("c");
    element.classList.remove("alert-danger");
    cerror.innerHTML = "";
  }

     if(!pValid){
    perror.innerHTML = "Please enter a valid number, it must be an integer";
    var element = document.getElementById("p");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("p");
    element.classList.remove("alert-danger");
    perror.innerHTML = "";
  }

     if(!qValid){
    qerror.innerHTML = "Please enter a valid number, it must be an integer";
    var element = document.getElementById("q");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("q");
    element.classList.remove("alert-danger");
    qerror.innerHTML = "";
  }

       if(!dValid){
    derror.innerHTML = "Please enter a valid description, more than two characters";
    var element = document.getElementById("d");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("d");
    element.classList.remove("alert-danger");
    derror.innerHTML = "";
  }

  if (imageVal && pnValid && dValid && qValid && cValid && pValid){
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

function validpn(){
  pnValid = false;
  if(pnElement.value.length>2){
    pnValid = true;
  }
}
function validc(){
  cValid = false;
  if(cElement.value.length>2){
    cValid = true;
  }
}
// Number.isInteger(123)

function validq(){
  qValid = false;
  if(Number.isInteger(parseInt(qElement.value))){
    qValid = true;
  }
}
function validp(){
  pValid = false;
  if(Number.isInteger(parseInt(pElement.value))){
    pValid = true;
  }
}
function validd(){
  dValid = false;
  if(dElement.value.length>2){
    dValid = true;
  }
}