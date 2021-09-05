$(document).ready(function(){
  $("#purchasebtn").click(function(){
    if(confirm('Are you sure you want to buy all these items?'))
    {
    	location.href = 'php/buy.php';
    }
  });
});