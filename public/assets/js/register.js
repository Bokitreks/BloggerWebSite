$(document).ready(function(){


    $('#registerButton').on('click',function(){

        //Regular expressions
        var regExpFName=/^[A-Z][a-z]{1,10}$/;
        var regExpLName=/^[A-Z][a-z]{1,30}(\s[A-Z][a-z]{2,10})?$/;
        var regExpEmail=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9-]+\.[a-z]+(\.[a-z]+)?$/;
        var regExpPassword=/^[A-z0-9.-_]+$/;

        //Getting form values
        var fName=$('#fName').val();
        var lName=$('#lName').val();
        var email=$('#email').val();
        var cEmail=$('#cemail').val();
        var password=$('#password').val();
        var cPassword=$('#cpassword').val();

        var errors=0;

        if(regExpFName.test(fName)){
                    $('#errorFN').html("");
        }
        else{
            $('#errorFN').html("Bad First Name format");
            errors++;
        }

        if(regExpLName.test(lName)){
            $('#errorLN').html("");
        }
    else{
    $('#errorLN').html("Bad Last Name format");
    errors++;
    }

    if(regExpEmail.test(email)){
        $('#errorEmail').html("");
    }
    else{
    $('#errorEmail').html("Bad Mail format");
    errors++;
    }

    if(email==cEmail){
        $('#errorCEmail').html("");
    }
    else{
    $('#errorCEmail').html("Mail does not match");
    errors++;
    }

    if(regExpPassword.test(password)){
        $('#errorPassword').html("");
    }
    else{
    $('#errorPassword').html("Bad Password format");
    errors++;
    }

    if(password==cPassword){
        $('#errorCPassword').html("");
    }
    else{
    $('#errorCPassword').html("Password does not match");
    errors++;
    }

        if(errors==0){

            var token=document.getElementsByName("_token")[0].value;

            $.ajax({
                url:"./registerUser",                       
                method:"POST",
                data:{
                    "fName":fName,
                    "lName":lName,
                    "email":email,
                    "password":password,
                    "role_id":1,
                    "_token":token
                },

                success:function(data){
                    alert(data);
                        location.reload();
                },
                error:function(xhr,status,error){
                    console.log(xhr);
                }

            });


            
        }
        else{
            console.log("Form errors");
        }





    });


});