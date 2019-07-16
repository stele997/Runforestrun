$(document).ready(function(){
})
function DeleteNav(){
    $(".meni-delete").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-meni.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                meniDelete:"setovano"
            },
            success:function(data){
                $("#dataTables-example").html(data);
                DeleteNav();
                UpdateNav();
                
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteNav();
InsertNav();
UpdateNav();
function InsertNav(){
    $("#insert-nav").click(function(){
        var naziv=document.getElementById("naziv").value;
        var putanja=document.getElementById("putanja").value;
        var roditelj=document.getElementById("roditelj").value;
        var pozicija=document.getElementById("pozicija").value;
        var nivo=document.getElementById("nivo").value;
        $.ajax({
            url:"../php/admin-insert-meni.php",
            method:"post",
            type:"json",
            data:{
                naziv:naziv,
                putanja:putanja,
                roditelj:roditelj,
                pozicija:pozicija,
                nivo:nivo,
                meniInsert:"setovano"
            },
            success:function(data){
                $("#naziv").val(" ");
                $("#putanja").val(" ");
                $("#roditelj").val("0");
                $("#pozicija").val(" ");
                $("#nivo").val(" ");
                $("#meni-insert-result").html("You added a new row into a database");
                $("#dataTables-example").html(data);
                DeleteNav();
                UpdateNav()
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
function UpdateNav(){
    $(".meni-update").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-meni.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                meniUpdate:"setovano"
            },
            success:function(data){
                $("#forma").html(data);
                $("#naslovForma").html("Update");
                afterUpdateNavFromUpdate();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
function afterUpdateNavFromUpdate(){
    $("#update-nav").on("click", function(){
        var id=$(this).data("id");
        var naziv=document.getElementById("naziv").value;
        var putanja=document.getElementById("putanja").value;
        var roditelj=document.getElementById("roditelj").value;
        var pozicija=document.getElementById("pozicija").value;
        var nivo=document.getElementById("nivo").value;
        $.ajax({
            url:"../php/admin-insert-meni.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                naziv:naziv,
                putanja:putanja,
                roditelj:roditelj,
                pozicija:pozicija,
                nivo:nivo,
                updateNav:"setovano"
            },
            success:function(data){
                console.log(data)
               $("#naslovForma").html("Insert new link");
               $("#forma").html(data.forma);
               $("#dataTables-example").html(data.tabela);
               UpdateNav()
               DeleteNav()
               InsertNav()
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
function UpdateProduct(){
    $(".form-update").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-product.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                formUpdate:"setovano"
            },
            success:function(data){
                $("#forma").html(data);
                $("#naslovForma").html("Update");
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
UpdateProduct();
function DeleteProduct(){
    $(".product-delete").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-product.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                productDelete:"setovano"
            },
            success:function(data){
                $("#dataTables-example").html(data);
                DeleteProduct();
                UpdateProduct();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteProduct();
function UpdateUserPrikazForme(){
    $(".user-update").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-user.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                userUpdate:"setovano"
            },
            success:function(data){
                $("#ispisiOvde").html(data);
                UpdateUser();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
UpdateUserPrikazForme();




function UpdateUser(){
    $("#updateUser").click(function(){
        var id=$(this).data("id");
        var ime=document.getElementById("ime").value;
        var prezime=document.getElementById("prezime").value;
        var adresa=document.getElementById("adresa").value;
        var telefon=document.getElementById("telefon").value;
        var email=document.getElementById("email").value;
        var username=document.getElementById("username").value;
        var aktivan=document.getElementById("aktivan").value;
        var uloga=document.getElementById("uloga").value;
        $.ajax({
            url:"../php/admin-insert-user.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                ime:ime,
                prezime:prezime,
                adresa:adresa,
                telefon:telefon,
                email:email,
                username:username,
                aktivan:aktivan,
                uloga:uloga,
                updateUser:"setovano"
            },
            success:function(data){
                $("#ispisiOvde").html(" ");
               $("#dataTables-example").html(data);
               DeleteUser();
                UpdateUserPrikazForme();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}




function DeleteUser(){
    $(".user-delete").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-user.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                userDelete:"setovano"
            },
            success:function(data){
                $("#dataTables-example").html(data);
                DeleteUser();
                UpdateUserPrikazForme();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteUser();

function RoleInsert(){
    $("#insert-role").click(function(){
        var naziv=document.getElementById("naziv").value;
        
        $.ajax({
            url:"../php/admin-insert-userRole.php",
            method:"post",
            type:"json",
            data:{
                naziv:naziv,
                roleInsert:"setovano"
            },
            success:function(data){
                $("#naziv").val(" ");
                $("#meni-insert-result").html("You added a new row into a database");
                $("#dataTables-example").html(data);
                DeleteRole();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
RoleInsert();

function DeleteRole(){
    $(".role-delete").on("click",function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-userRole.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                roleDelete:"setovano"
            },
            success:function(data){
                $("#dataTables-example").html(data);
                DeleteRole();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteRole();

function BrandInsert(){
    $("#insert-brand").click(function(){
        var naziv=document.getElementById("naziv").value;
        
        $.ajax({
            url:"../php/admin-insert-brand.php",
            method:"post",
            type:"json",
            data:{
                naziv:naziv,
                brandInsert:"setovano"
            },
            success:function(data){
                $("#naziv").val(" ");
                $("#meni-insert-result").html("You added a new row into a database");
                $("#dataTables-example").html(data);
                DeleteBrand();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
BrandInsert();

function DeleteBrand(){
    $(".brand-delete").click(function(){
        var id=$(this).data("id");
        $.ajax({
            url:"../php/admin-insert-brand.php",
            method:"post",
            type:"json",
            data:{
                id:id,
                brandDelete:"setovano"
            },
            success:function(data){
                $("#dataTables-example").html(data);
                DeleteBrand();
            },
            error:function(xhr,status,errMsg){
                console.log(errMsg);
            }
        })
    })
}
DeleteBrand();

