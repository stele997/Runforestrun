$(document).ready(function(){
    $("#badName").html("");
    $("#badLastName").html("");
    $("#badAddress").html("");
    $("#badPhone").html("");
    $("#badUsername").html("");
    $("#badEmail").html("");
    $("#badPassword").html("");
    $("#badConfirmePassword").html("");
    $("#loseLogovanje").html("");
})
document.getElementById("submit").addEventListener("click", function(){
    var greske=[];
    var name=document.getElementById("name").value;
    var reName=/^[A-Z][a-z]{2,12}(\s[A-Z][a-z]{2,12})?$/;
    if(reName.test(name)){
        document.getElementById("badName").innerHTML="";
    }
    else{
        document.getElementById("badName").innerHTML="Name is not valid!";
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
    var username=document.getElementById("username").value;
    var reUsername=/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/
    if(reUsername.test(username)){
        document.getElementById("badUsername").innerHTML="";
    }
    else{
        document.getElementById("badUsername").innerHTML="Username is not valid or it's already taken!";
        greske.push("Username is not valid or it's already taken!");
    }
    var email=document.getElementById("email").value;
    var reEmail=/^[a-z0-9\.]{1,25}@[a-z0-9]{1,25}(\.[a-z0-9]{1,25})+$/;
    if(reEmail.test(email)){
        document.getElementById("badEmail").innerHTML="";
    }
    else{
        document.getElementById("badEmail").innerHTML="Email is not valid!";
        greske.push("Email is not valid!");
    }
    var password=document.getElementById("password").value;
    var rePassword=/^[\S]{6,25}$/;
    if(rePassword.test(password)){
        document.getElementById("badPassword").innerHTML="";
    }
    else{
        document.getElementById("badPassword").innerHTML="Password is not valid!";
        greske.push("Password is not valid!");
    }
    var confirmePassword=document.getElementById("confirmePassword").value;
    if(password==confirmePassword){
        document.getElementById("badConfirmePassword").innerHTML="";
    }
    else{
        document.getElementById("badConfirmePassword").innerHTML="Passwords don't match!";
        greske.push("Passwords don't match!");
    }
    var dugme=document.getElementById("")
    if(greske.length==0){
        
        $.ajax({
            url:"php/registrationChecker.php",
            method:"POST",
            type:"json",
            data:{
                name:name,
                lastName:lastName,
                address:address,
                phone:phone,
                username:username,
                email:email,
                password:password,
                confirmePassword:confirmePassword
            },
            success:function(data){
                $("#name").val("");
                $("#lastName").val("");
                $("#address").val("");
                $("#phone").val("");
                $("#email").val("");
                $("#username").val("");
                $("#password").val("");
                $("#confirmePassword").val("");
                $(".ispisiRezultat").html(data);
            },
            error:function(xhr,status,errorMsg){
                var odgovor=JSON.parse(xhr.responseText);
                console.log(odgovor);
                $("#ispisiRezultat").removeClass("ispisiRezultat");
                $("#ispisiRezultat").addClass("crveno");
                $("#ispisiRezultat").html(odgovor.message);
            }
        })
    }
});

document.getElementById("ulogujSe").addEventListener("click", function(){
    var greske=[];
    var username=document.getElementById("logInUsername").value;
    var reUsername=/^[A-Za-z]{1}[A-Za-z0-9]{2,14}$/
    if(reUsername.test(username)){
        document.getElementById("loseLogovanje").innerHTML="";
    }
    else{
        document.getElementById("loseLogovanje").innerHTML="Username or password are not correct!";
        greske.push("Username or password are not correct!");
    }

    var password=document.getElementById("logInPassword").value;
    var rePassword=/^[\S]{6,25}$/;
    if(rePassword.test(password)){
        document.getElementById("loseLogovanje").innerHTML="";
    }
    else{
        document.getElementById("loseLogovanje").innerHTML="Username or password are not correct!";
        greske.push("Username or password are not correct!");
    }
    if(greske.length==0){
        $.ajax({
            url:"php/login.php",
            method:"POST",
            type:"json",
            data:{
                username:username,
                password:password
            },
            success:function(data){
                
                window.location.href = data;
            },
            error:function(xhr,status,errorMsg){
                console.log(xhr);
            }
        })
    }
})