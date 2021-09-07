$(document).ready(function(){
  $("button").click(function(){
    var id = $(this).attr('id').slice(0,-1);
    if (id == "confirm"){
    if(confirm('Are you sure you want to add?'))
    {
    	var x = $(this).attr('id');
    	var lastChar = x[x.length -1];
    	var quantity = "#num" + lastChar;
    	var quantity_val = Math.floor($(quantity).val());
    	var product_id_name = "#p" + lastChar;
    	var product_id_value = $(product_id_name).val();
    	if($.isNumeric(quantity_val) && quantity_val > 0 && quantity_val <101){
    			$(quantity).removeClass("alert-danger");

    			$.post("php/updatequantityapi.php",
    			{
    			val: quantity_val,
    			pid: product_id_value
  				}, function(data){
  					data = $.parseJSON( data );
    				var quantityname = "#quan" + lastChar;
    				$(quantityname).html("Quantity: " +data[0]['quantity']);
    				// data[0]['quantity'];
    			});


    	}
    	else{
    		$(quantity).addClass("alert-danger");
    	}

    }
}
  });
});