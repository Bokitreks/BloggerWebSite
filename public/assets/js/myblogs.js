$(document).ready(function(){

    getApprovedBlogs();
    getNotApprovedBlogs();

});


function getApprovedBlogs(){

        let id=document.getElementById('logedUser').dataset.id;
        let token=document.getElementsByName("_token")[0].value;
        console.log(id);

    $.ajax({

        url:"./getApprovedBlogs",
        method:"POST",
        data:{
            "id":id,
            "_token":token
        },
        success:function(data){
            printApprovedBlogs(data);
        },
        error:function(xhr,status,error){
            console.log(xhr);
        }




    });


}

function getNotApprovedBlogs(){
    let id=document.getElementById('logedUser').dataset.id;
    let token=document.getElementsByName("_token")[0].value;
    $.ajax({

        url:"./getNotApprovedBlogs",
        method:"POST",
        data:{
            "id":id,
            "_token":token
        },
        success:function(data){
            printNotApprovedBlogs(data);
        },
        error:function(xhr,status,error){
            console.log(xhr);
        }




    });

}

function printApprovedBlogs(data){
        
    let div=document.getElementById('approved');
    let print='';

    for(let d of data){

        print+=`<div class="row blog">

        <div class="col-md-4 blogImage">
        
        <a href="./showBlog/${d.id}"><img  class="img-fluid image" src="assets/images/${d.img}" alt="${d.img}"/></a>
        
        </div>
        
        <div class="col-md-8 blogText">
        <h3>${d.heading}</h3>
        
        <p>Date posted : ${d.created_at}</p>
        
        <a class="editBlogg" href="./showEditBlog/${d.id}">Edit</a>
        
        <a href="#" class="deleteBlogg" data-id="${d.id}">Delete</a>
        
        </div>
        
        </div>`;



    }

    div.innerHTML=print;

    
    let del=document.getElementsByClassName('deleteBlogg');
    for(let i=0;i<del.length;i++){
        del[i].addEventListener('click',function(e){
            e.preventDefault();
            let id=del[i].dataset.id;
            let token=document.getElementsByName("_token")[0].value;
           $.ajax({

                url:"./deleteBlog",
                method:"POST",
                data:{
                    "id":id,
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

function printNotApprovedBlogs(data){
        
    let div=document.getElementById('notApproved');
    let print='';

    for(let d of data){

        print+=`<div class="row blog">

        <div class="col-md-4 blogImage">
        
        <a href="./showBlog/${d.id}"><img  class="img-fluid image" src="assets/images/${d.img}" alt="${d.img}"/></a>
        
        </div>
        
        <div class="col-md-8 blogText">
        <h3>${d.heading}</h3>
        
        
        <p>Date posted : ${d.created_at}</p>
        
        <a href="./showEditBlog/${d.id}" >Edit</a>
        
        <a href="#" class="deleteBlog" data-id="${d.id}">Delete</a>
        
        </div>
        
        </div>`;

    }

    div.innerHTML=print;
    let del=document.getElementsByClassName('deleteBlog');
    for(let i=0;i<del.length;i++){
        del[i].addEventListener('click',function(e){
            e.preventDefault();
            let id=del[i].dataset.id;
            let token=document.getElementsByName("_token")[0].value;
           $.ajax({

                url:"./deleteBlog",
                method:"POST",
                data:{
                    "id":id,
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