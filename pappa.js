$(document).ready(function(){
    console.log("Hello from the script");
    let images = $("a:not(.nav-item)");

    $("a:not(.nav-item):not(:nth-of-type(1))").hide();
    let ButtonPrev = $("button#prev");
    let ButtonNext = $("button#next");
    let CurrentImg =1;
    let NumofImg = (images.length);
    console.log(NumofImg);
    ButtonPrev.click(function(e){
        e.preventDefault();
        if(CurrentImg==1){
            $("a:not(.nav-item):not(:nth-of-type("+ NumofImg+"))").fadeOut("slow");
            $("a:not(.nav-item):nth-of-type("+ NumofImg+")").fadeIn("slow");
            CurrentImg=NumofImg;
        }else{
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeOut("slow");
            CurrentImg--;
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeIn("slow");
        }
    });
    ButtonNext.click(function(e){
        e.preventDefault();
        if(CurrentImg==NumofImg){
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeOut("slow");
            CurrentImg=1;
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeIn("slow");
        }else{
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeOut("slow");
            CurrentImg++;
            $("a:not(.nav-item):nth-of-type("+CurrentImg+")").fadeIn("slow");
        }
    });
});