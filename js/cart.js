$(document).ready(function(){
    $("#badName").html("");
    $("#badLastName").html("");
    $("#badAddress").html("");
    $("#badPhone").html("");
    $("#badCity").html("");
    $("#ispisRez").hide();

    $(".cart_quantity_up").click(function(e){
        e.preventDefault();
        var dataId=$(this).data("povecaj");
        var dataCena=$(this).data("cena");
        
        $.ajax({
            url:"php/cart.php",
            method:"POST",
            type:"json",
            data:{
                quantityUpId:dataId
            },
            success:function(data){
                console.log(data);
                var kolicina=data.kolicina;
                var id=data.id;
                $("#"+dataId+"").val(kolicina);
                var ukupno=kolicina*dataCena;
                $("."+id+"").html(ukupno+" $");
                $("#korpaUkupno").html("$"+data.ukupno);
                $.ukupno=data.ukupno+10;
                $("#Ukupno").html("$"+$.ukupno);
            },
            error:function(xhr,status,errMsg){

            }
        })
    })

    $(".cart_quantity_down").click(function(e){
        e.preventDefault();
        var dataId=$(this).data("smanji");
        var dataCena=$(this).data("cena");
        
        $.ajax({
            url:"php/cart.php",
            method:"POST",
            type:"json",
            data:{
                quantityDownId:dataId
            },
            success:function(data){
                console.log(data);
                var kolicina=data.kolicina;
                var id=data.id;
                $("#"+dataId+"").val(kolicina);
                var ukupno=kolicina*dataCena;
                $("."+id+"").html(ukupno+" $");
                $("#korpaUkupno").html("$"+data.ukupno);
                $.ukupno=data.ukupno+10;
                $("#Ukupno").html("$"+$.ukupno);
                
            },
            error:function(xhr,status,errMsg){
              
            }
        })
    })

    $(".cart_quantity_delete").click(function(e){
        e.preventDefault();
        var dataId=$(this).data("id");
        
        $.ajax({
            url:"php/cart.php",
            method:"POST",
            type:"json",
            data:{
                dataId:dataId
            },
            success:function(data){

                $("#idTr"+dataId+"").html(data.ispis);
                $("#korpaUkupno").html("$"+data.ukupno);
                $.ukupno=data.ukupno+10;
                $("#Ukupno").html("$"+$.ukupno);
            },
            error:function(xhr,status,errMsg){
              //console.log(errMsg);
            }

        })
    })
    $("#naruci").click(function(){
        var greske=[];
        var dugme=document.getElementById("naruci");
        var name=document.getElementById("name").value;
        var reName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
        if(reName.test(name)){
            document.getElementById("badName").innerHTML="";
        }
        else{
            document.getElementById("badName").innerHTML="First name is not valid!";
            greske.push("Name is not valid");
        }
        var lastName=document.getElementById("lastName").value;
        var reLastName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
        if(reLastName.test(lastName)){
            document.getElementById("badLastName").innerHTML="";
        }
        else{
            document.getElementById("badLastName").innerHTML="Last name is not valid!";
            greske.push("Last name is not valid");
        }
        
        var address=document.getElementById("address").value;
        var reAddress=/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*\s[0-9]{1,4}(\/[0-9]{1,4})?$/;
        if(reAddress.test(address)){
            document.getElementById("badAddress").innerHTML="";
        }
        else{
            document.getElementById("badAddress").innerHTML="Address is not valid!";
            greske.push("Address is not valid");
        }
        var phone=document.getElementById("phone").value;
        var rePhone=/^06[0-9]{1}[0-9]{6}([0-9]{1})?$/;
        if(rePhone.test(phone)){
            document.getElementById("badPhone").innerHTML="";
        }
        else{
            document.getElementById("badPhone").innerHTML="Phone number is not valid!";
            greske.push("Phone nubmer is not valid");
        }

        if(greske.length==0){
            $.ajax({
                url:"php/order.php",
                method:"POST",
                type:"json",
                data:{
                    name:name,
                    lastName:lastName,
                    address:address,
                    phone:phone,
                    dugme:true
                },
                success:function(data){
                    $("#name").val("");
                    $("#lastName").val("");
                    $("#address").val("");
                    $("#phone").val("");
                    $("#tabela").html(data);
                    $("#korpaUkupno").html("0$");
                    $("#tax").html("10$");
                    $("#free").html("Free");
                    $("#Ukupno").html("10$");
                    $("#ispisRez").show();
                    
                },
                error:function(){

                }
            })
        }
    })
})