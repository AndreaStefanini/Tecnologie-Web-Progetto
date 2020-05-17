function get_final_amount(){
    let somma=0;
    $("td.total_price").each(function(){
        somma += parseFloat($(this).html());
    });
    $("h3.total_amount").html(somma);
}

function buy_from_cart(){
   
}
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
function update_number_ticket(id_event,steptype){
    let n_ticket = parseInt($("#n_ticket"+id_event).val());
    let single_price = parseFloat($("td#total_price"+id_event).html())/n_ticket;
    if(steptype=="plus"){
        n_ticket++;
    }else{
        n_ticket--;
    }
    let total_price = single_price*n_ticket;
    $("#n_ticket"+id_event).val(n_ticket)
    $("td#total_price"+id_event).html(total_price);
    $.post("update-ticket.php",{
        id: id_event,
        n_ticket:n_ticket
    },function(data,status){
        if(status=="success"){
           if(n_ticket==0){
               alert("l'evento verrà rimosso dal carrello");
               window.location.reload();
           }
        }
    });
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
function confirmPurchase_and_sendEmail(titolo){
    let n_tickets = $("#n_ticket").val();
    $.ajax({
        url:'sendEmail.php',
        method:'POST',
        data:{n_eventi:1,
              n_tickets: n_tickets,
              event: titolo},
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
