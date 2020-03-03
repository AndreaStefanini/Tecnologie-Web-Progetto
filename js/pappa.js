
$(document).ready(function(){
    console.log($("img.arrows"));
    console.log("qui ci sono");
    function move(){
       let images=$("img.arrows");
       images.each(function(){
           $(this).animate({
               marginLeft: '20%'
           },250).delay(600);
       });
       images.each(function(){
           $(this).animate({
                marginLeft: '0%'
           },250).delay(600);
       });
    };
    
    var interval = self.setInterval(function(){move()},600);

    
    
});
