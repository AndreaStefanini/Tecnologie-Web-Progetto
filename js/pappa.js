
$(document).ready(function(){
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
    // a variabile use to set a timer an repeat the move function.. a sort of an infinte loop
    var interval = self.setInterval(function(){move()},600);

});
