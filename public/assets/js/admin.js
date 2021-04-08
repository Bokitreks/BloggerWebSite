$('document').ready(function(){

    getBlogs();
    getUsers();


    
});


function getUsers(){
    $.ajax({

        url:"./getUsers",
        method:"GET",
        success:function(data){
            printUsers(data);
            console.log(data);
        },
        error:function(xhr,status,error){
            console.log(xhr);
        }


    });
}

function getBlogs(){

    $.ajax({

        url:"./getBlogs",
        method:"GET",
        success:function(data){
            printBlogs(data);
            console.log(data);
        },
        error:function(xhr,status,error){
            console.log(xhr);
        }


    });
    
}


function printBlogs(data){
    
    let table=document.getElementById("listBlogs");
    let print="";
    for(let d of data){
print+=`<tr><td>${d.user_id}</td><td>${d.heading}</td><td>${d.text.substring(0,100)}..</td><td class="timg"><img class="bimg" src="assets/images/${d.img}"/> </td><td class="app">${d.approved}</td><td><a data-id="${d.id}" class="changeBlogStatus" href="#">Change status</a></td><td><a data-id="${d.id}" class="delBlog" href="#">Delete</a></td></tr>`
    }


table.innerHTML=print;
var token=document.getElementsByName("_token")[0].value;
let delBlog=document.getElementsByClassName('delBlog');

for(let i=0;i<delBlog.length;i++){
    delBlog[i].addEventListener('click',function(){

        $.ajax({

             url:"./deleteBlog",
             method:"POST",
             data:{
                 "id":this.dataset.id,
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


    });
}

let changeBlog=document.getElementsByClassName('changeBlogStatus');
let app=document.getElementsByClassName('app');
for(let i=0;i<changeBlog.length;i++){
    if(app[i].innerHTML==0){
        app[i].innerHTML="Not approved";
    }else{
        app[i].innerHTML="Approved";
    }
    changeBlog[i].addEventListener('click',function(){
      
        $.ajax({

            url:"./changeBlogStatus",
            method:"POST",
            data:{
                "id":this.dataset.id,
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

    });

}


}



function printUsers(data){
    let table=document.getElementById("listUsers");
    let print="";
    for(let d of data){
print+=`<tr><td>${d.id}</td><td>${d.firstName}</td><td>${d.lastName}</td><td>${d.mail}</td><td><a data-id="${d.id}" class="delUser" href="#">Delete</a></td></tr>`
    }

table.innerHTML=print;

let del=document.getElementsByClassName('delUser');
var token=document.getElementsByName("_token")[0].value;
for(let i=0;i<del.length;i++){
    del[i].addEventListener('click',function(){

        $.ajax({

            url:"./deleteUser",
            method:"POST",
            data:{
                "id":this.dataset.id,
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


    })
}


}