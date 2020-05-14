function load_unseen_notification(view = ''){
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data){
        document.getElementById("notification").innerHTML= data.notification;
      }
     });
};
function add_to_cart(ticket){
    let n_ticket = parseInt($("#n_ticket").val());
    $.post("add_purchase.php",{
        ticket:ticket,
        n_ticket:n_ticket
        },function(data,status){
            if(status=="success"){
                    $("#cart").html(data);
                
            }
        });
    return 0;
}
function delete_purchase(delete_ticket){
    let n_delete = parseInt($("input#n_delete"+delete_ticket).val());
    let index =0;
    $.post("delete-purchase.php",{
        delete_ticket:delete_ticket,
        n_delete:n_delete
    },function(data,status){
        if(status=="success"){
           
            alert(data);
            /*for(elem in datas){
                $("#tickets"+datas[elem]["id_articolo"]).html(datas[elem]["n_tickets"]);
            }*/
            $("input#n_delete"+delete_ticket).val("")
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
function sendEmail(){

    $.ajax({
        url:'sendEmail.php',
        method:'POST',
        data:{action:'call_email'},
        success: function(response){
            console.log(response);
        }

    });
}
$(document).ready(function(){
    $('#bell').click(function(){
        $('#bell').html('');
        load_unseen_notification('yes');
      });
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
    var interval = self.setInterval(function(){
        move()
    },600);
    setInterval(function(){
        load_unseen_notification();;
    }, 5000);
});


