/**$(document).ready(function(){
    console.log("Hello from the script");
    let images = $("a.PP");

    $("a.PP:not(:nth-of-type(1))").hide();
    $("span:not(:nth-of-type(1))").hide();
    let ButtonPrev = $("button#prev");
    let ButtonNext = $("button#next");
    let CurrentImg =1;
    let NumofImg = (images.length);
    console.log(NumofImg);
    ButtonPrev.click(function(e){
        e.preventDefault();
        if(CurrentImg==1){
            $("a.PP:not(:nth-of-type("+ NumofImg+"))").fadeOut("slow");
            $("span:not(:nth-of-type("+ NumofImg+"))").hide();
            $("a.PP:nth-of-type("+ NumofImg+")").fadeIn("slow");
            $("span:not(:nth-of-type("+ NumofImg+"))").show();
            CurrentImg=NumofImg;
        }else{
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeOut("slow");
            $("span:nth-of-type("+ CurrentImg+")").hide();
            CurrentImg--;
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeIn("slow");
            $("span:nth-of-type("+ CurrentImg+")").show();
        }
    });
    ButtonNext.click(function(e){
        e.preventDefault();
        if(CurrentImg==NumofImg){
            $("a.PP:nth-of-type("+CurrentImg+")").fadeOut("slow");
            $("span:nth-of-type("+ CurrentImg+")").hide();
            CurrentImg=1;
            $("a.PP:nth-of-type("+CurrentImg+")").fadeIn("slow");
            $("span:nth-of-type("+ CurrentImg+")").show();
        }else{
            $("a.PP:nth-of-type("+CurrentImg+")").fadeOut("slow");
            $("span:nth-of-type("+ CurrentImg+")").hide();
            CurrentImg++;
            $("a.PP:nth-of-type("+CurrentImg+")").fadeIn("slow");
            $("span:nth-of-type("+ CurrentImg+")").show();
        }
    });
});
*/