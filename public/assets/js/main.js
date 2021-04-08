$(document).ready(function(){

    var images=$('.image');
   

    for(let i=0;i<images.length;i++){

       $(images[i]).on("mouseover",function(){

        $(images[i]).parent().parent().parent().css('border',"2px solid tomato");
        
        
        });
        $(images[i]).on("mouseout",function(){

            $(images[i]).parent().parent().parent().css('border',"2px solid black");
            
            
            });
        
    }

    

});