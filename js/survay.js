$(document).ready(function(){
    $.ajax({
        url:"php/survay.php",
        type:"json",
        method:"POST",
        data:{
            pokrenutaStrana:"setovano" 
        },
        success:function(data){
            $("#rezultati").html(data);
        },
        error:function(xhr,status,errMsg){
            console.log("ne radi")
        }
    })
})
$("#submit").click(function(){
    rbtns=document.getElementsByName("radioBtn");
    var izbor="";
    for(var i=0;i<rbtns.length;i++){
        if(rbtns[i].checked){
            izbor=rbtns[i].value;
        }
    }
    if(izbor==""){
        $("#ispis").html("<h2>You have to choose one brand</h2>");
    }else{
        $.ajax({
            url:"php/survay.php",
            type:"json",
            method:"POST",
            data:{
                izbor:izbor,
                submit:"setovano" 
            },
            success:function(data){
                $("#rezultati").html(data);
            },
            error:function(xhr,status,errMsg){
                console.log("ne radi")
            }
        })
    }
})