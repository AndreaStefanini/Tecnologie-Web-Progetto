function delete_article(id_article, percorso) {
    $.post("delete-article.php", {
        delete: id_article,
        percorso: percorso
    }, function () {
        window.location.reload();
    });
}
function reject_article(id_article, author) {
    let astatus = 2;
    let messagge = $("textarea#reasons").val();
    $.post("admin_operation.php", {
        id_articolo: id_article,
        status: astatus,
        author: author,
        messagge: messagge
    }, function () {
        window.location.reload();
    });
}
function approve_article(id_article, author) {
    let astatus = 1;
    $.post("admin_operation.php", {
        id_articolo: id_article,
        status: astatus,
        author: author
    }, function () {
        window.location.reload();
    });
}
function get_final_amount() {
    let somma = 0;
    $("td.total_price").each(function () {
        somma += parseFloat($(this).html());
    });
    $("h3.total_amount").html(somma);
}

function buy_from_cart() {
    let numero_eventi = $("tbody tr").length;
    let n_tickets=[];
    $("tbody tr td div input").each(function (){
        alert()
        n_tickets.push($(this).val());
    });
    $.post("move_to_acquisti.php", {}, function (data, status) {
        if (status == "success") {
            if (numero_eventi == 1) {
                n_tickets = parseInt($("#n_ticket" + data).val());
            }
            $.post("sendEmail.php", {
                n_tickets: n_tickets,
                bought: "yes",
                id: data,
                numero_eventi: numero_eventi
            }, function (data, status) {
                if (status == "success") {
                    window.location.reload();
                }
            });
        }
    });
}
function load_unseen_notification() {
    $.ajax({
        url: "fetch.php",
        method: "GET",
        data: {},
        dataType: "json",
        success: function (data, status) {
            if (status == "success") {
                $("#notification").html(data.notification);
                $("#labelbell").html(data.unseen_notification);
                $("#labelbell").css("display:inline;");
            }
        }
    });
};
function delete_from_cart(id_event) {
    $.post("remove_all_ticket.php", {
        id: id_event
    }, function () {
        window.location.reload();
    });
}
function add_to_cart(ticket) {
    let n_ticket = parseInt($("#n_ticket").val());
    const max = $("#n_ticket").attr("max");
    if (n_ticket <= max) {
        $.post("add_purchase.php", {
            ticket: ticket,
            n_ticket: n_ticket
        }, function (data, status) {
            if (status == "success") {
                $("#cart").html(data);

            }
        });
    } else {
        alert("Hai tentato di aggiungere più aggiungere più biglietti di quelli disponibili");
    }

    return 0;
}
function update_number_ticket(id_event, steptype) {
    let n_ticket = parseInt($("#n_ticket" + id_event).val());
    let single_price = parseFloat($("td#total_price" + id_event).html()) / n_ticket;
    if (steptype == "plus") {
        n_ticket++;
    } else {
        n_ticket--;
    }
    if (n_ticket <= $('#n_ticket' + id_event).attr('max')) {
        let total_price = single_price * n_ticket;
        $("#n_ticket" + id_event).val(n_ticket)
        $("td#total_price" + id_event).html(total_price.toFixed(2));
        $.post("update-ticket.php", {
            id: id_event,
            n_ticket: n_ticket
        }, function (data, status) {
            if (status == "success") {
                if (n_ticket == 0) {
                    alert("l'evento verrà rimosso dal carrello");
                    window.location.reload();
                }
            }
        });
    }
}
function move() {
    let images = $("img.arrows");
    images.each(function () {
        $(this).animate({
            marginLeft: '20%'
        }, 250).delay(600);
    });
    images.each(function () {
        $(this).animate({
            marginLeft: '0%'
        }, 250).delay(600);
    });
};
function confirmPurchase_and_sendEmail(titolo, id_evento) {
    let n_tickets = $("#n_ticket").val();
    $.ajax({
        url: 'sendEmail.php',
        method: 'POST',
        data: {
            numero_eventi: 1,
            n_tickets: n_tickets,
            event: titolo,
            id: id_evento,
            bought: "no"
        },
        success: function (response) {
            window.location.assign("Acquisti-manager.php");
        }

    });
}
$(document).ready(function () {
    load_unseen_notification();
    $('#bell').click(function () {
        load_unseen_notification();
        $.post("read_notification.php", {}, function () {
            $("#labelbell").css("display:none;");
        });
    });
    let all_content = [];
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "suggestions.php",
        data: {},
        dataType: "json",
        success: function (data) {
            all_content = (data);

        }
    });

    $("#logout").click(function () {
        let logout = "true";
        $.post("logout.php", {
            logout: logout
        }, function (data, status) {
            if (status == "success") {
                window.location.replace("index.php");
            }
        });
    });
    $("#search").on("input", function () {
        let testo = $("#search").val();
        $.each(all_content, function (index, val) {
            if (val.Article_Title.toLowerCase().includes(testo.toLowerCase())) {
                $("#event-suggestion").append("<option value='" + val.Article_Title + "'>" + val.Article_Title + "</option>");
            }
        });
    });


    // a variabile use to set a timer an repeat the move function.. a sort of an infinte loop
    var interval = self.setInterval(function () {
        move()
    }, 600);
    setInterval(function () {
        load_unseen_notification();
    }, 5000);
});
