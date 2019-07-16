$(document).ready(function(){
    $("#losEmail").hide();
    $("#losSubject").hide();
    $("#losMessage").hide();
    
})
$("#submit").click(function(){
    var greske=[];
    var email=$("#email").val();
    var subject=$("#subject").val();
    var message=$("#message").val();
    var reEmail=/^[a-z0-9\.]{1,25}@[a-z0-9]{1,25}(\.[a-z0-9]{1,25})+$/;
    if(!reEmail.test(email)){
        greske.push("Email nije u redu");
        $("#losEmail").show();
    }else{
        $("#losEmail").hide();
    }
    var reSubject=/^[A-Za-z\s0-9]{3,50}$/;
    if(!reSubject.test(subject)){
        greske.push("Subject nije u redu");
        $("#losSubject").show();
    }
    else{
        $("#losSubject").hide();
    }

    var reMessage=/^[A-Za-z\s0-9]{3,250}$/;
    if(!reMessage.test(message)){
        greske.push("Message nije u redu");
        $("#losMessage").show();
    }else{
        $("#losMessage").hide();
    }
    if(greske.length==0){
        $.ajax({
            url:"php/kontakt.php",
            method:"POST",
            type:"json",
            data:{
                email:email,
                subject:subject,
                message:message,
                submit:"setovano"
            },
            success:function(data){
                $("#email").val(" ");
                $("#subject").val(" ");
                $("#message").val(" ");
                $("#ispis").html(data);
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    
    }
    
})