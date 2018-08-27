function toTop(){var body = $("html, body");body.stop().animate({scrollTop:0}, 1000);}
var spd = 200;
function openBTNS(){
    if($(this).data('open') === false){
        $(".mainBTN").addClass('big');
        $(".non1").fadeIn(spd,function(){
            $(".non2").fadeIn(spd,function(){
                $(".non3").fadeIn(spd);
            });
        });
        $(this).data('open', true);
    }else{
        $(".mainBTN").removeClass('big');
        $(".non3").fadeOut(spd, function(){
            $(".non2").fadeOut(spd, function(){
                $(".non1").fadeOut(spd, function(){
            
                });
            }); 
        });
        $(this).data('open', false);
    }
}

$('.mainBTN').on('click', toTop);
$('.mainBTN').on('dblclick', openBTNS);
$('.cls').on('click', openBTNS);