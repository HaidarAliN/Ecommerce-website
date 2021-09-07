$(document).ready(function(){
  $("button").click(function(){
        var id = $(this).attr('id').slice(0,-1);
        var uid =  $("#uid").val();
        var x = $(this).attr('id');
        var lastChar = x[x.length -1];
        var item_id = "#item" + lastChar;
        var item_id_val = $(item_id).val();
        var like_dom = "#likenum" + lastChar;
        if (id == "btnlike"){
        // var like_dom_val = $(like_dom).html().substring(7);
        // console.log(like_dom_val);
    			$.post("php/likeapi.php",
    			{
    			item_idd: item_id_val,
    			user_id: uid
  				}, function(data){
  					data = $.parseJSON( data );
                    $(like_dom).html(data[0]['count']);
                });
        }
        else{

                $.post("php/unlikeapi.php",
                {
                item_idd: item_id_val,
                user_id: uid
                }, function(data){
                    data = $.parseJSON( data );
                    $(like_dom).html(data[0]['count']);
                });

            }
});
});