$(document).ready(function(){

    $(".add-to-cart").click(function(){

        var stingId=$(this).data("id");
        var intId=parseInt(stingId);
        $.ajax({
            url:"php/cart.php",
            method:"POST",
            type:"json",
            data:{
                intId:intId  
            },
            success:function(data){
                console.log(data);
                $("."+data+"").html("Added to cart");
                $("."+data+"").attr("disabled",true);

            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }

        })
    })
})