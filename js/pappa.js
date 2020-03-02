/*function move_to_left(){
    $("img.arrows").each( $("img.arrows").animate({
        right: '+=10px'
    }));
  
};*/

/*function move_to_right(){
   $("img.arrows").animate({
       left: '+=10px',
   },5000,move_to_left());
};*/
$(document).ready(function(){
    console.log("qui ci sono");
    
    //move_to_left();
    $("img.arrows").each(function(){
        $(this).fadeOut(2000);
    });
});
