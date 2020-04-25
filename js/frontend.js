
$(document).ready(function(){
    let all_content = null;
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "suggestions.php",                             
        success: function(response){                    
            all_content=response; 
        }
    });
    if($(window).width<=600){
        let content = $(".ordering");
        let cont =0;
        for(cont=cont; cont<content.lenght; cont+=2){
            let newpos = cont +1;
            $(".ordering:nth-child("+cont+")").css({"order": newpos});
            $(".ordering:nth-child("+newpos+")").css({"order" : cont});
        }
    }
    $("#logout").click(function(){
            let logout = "true";
            $.post("logout.php", {
                logout:logout},function(data,status){
                    if(status == "success"){
                        window.location.replace("index.php");
                    }
                });    
    });
    $("#search").on("input",function(){
        let testo = $("#search").val();
        testo += "%";
    });
    $("#delete_article").click(function(){
        
    });
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
