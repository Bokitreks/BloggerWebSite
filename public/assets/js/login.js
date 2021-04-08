$(document).ready(function(){


    $('#lbutton').on('click',function(){

        //Regular expressions
        var regExpEmail=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9-]+\.[a-z]+(\.[a-z]+)?$/;
        var regExpPassword=/^[A-z0-9.-_]+$/;

        //Getting form values
        var email=$('#lemail').val();
        var password=$('#lpassword').val();

        var errors=0;

        if(regExpEmail.test(email)){
            $('#errorLEmail').html("");
        }else{
            $('#errorLEmail').html("Bad Mail format");
            errors++;
        }
        if(regExpPassword.test(password)){
            $('#errorLPassword').html("");
        }else{
            $('#errorLPassword').html("Bad Password format");
            errors++;
        }


            if(errors==0){

                var token=document.getElementsByName("_token")[0].value;

                $.ajax({
                    url:"./loginUser",                       
                    method:"POST",
                    data:{
                        "email":email,
                        "password":password,
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

            }

    });


});