function add_to_cart(ticket){
    $.post("add_purchase.php",{
        ticket:ticket},function(data,status){
            if(status=="success"){
                let newcount =parseInt($("#cart").html());
                newcount += 1;
                $("#cart").html(newcount);
            }
        });
    return 0;
}
function delete_purchase(delete_ticket){
    $.ajax({
        type: "GET",
        data: delete_ticket, 
        url: "delete-purchase.php",
        success: function(){
            window.location.reload();
        }
    });
    return 0;
}
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
$(document).ready(function(){
    let all_content = null;
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "suggestions.php",                             
        success: function(response){                    
            all_content=response; 
        }
    });

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
    
  
    // a variabile use to set a timer an repeat the move function.. a sort of an infinte loop
    var interval = self.setInterval(function(){move()},600);
});
