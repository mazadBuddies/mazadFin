$('div.border').append("<div class='bor'></div>");
$('div.menu-header').append("<div class='ponn'></div>");
if($('div.add-icon').children('input').data('show') === true){
    $('div.add-icon').append('<i class="fa fa-eye show"></i>');}
$('i.show').on('click', function(){
    if($(this).hasClass('fa-eye')){
        $(this).removeClass('fa-eye').addClass('fa-eye-slash').siblings('input').attr('type','text');
    }else{
        $(this).removeClass('fa-eye-slash').addClass('fa-eye').siblings('input').attr('type','password');
    }});
$("input").on('focus', function(){
   "use strict";
    $(this).parent().children('div.bor').animate({width:'100%',left:'0px'});
}).on('blur',function(){
    $(this).parent().children('div.bor').animate({width:'0%',left:'50%'});});
var chatcher;
$('input').on('focus',function(){
    "use strict";
    chatcher = $(this).attr('placeholder');
    $(this).attr('placeholder','');
}).on('blur',function(){
    $(this).attr('placeholder',chatcher);});
// start of append switch content to assig css
var switchName = $('.switch');
switchName.append('<div class="sig"><span class="off">OFF</span><span class="sp"> &nbsp;<span class="dot"> &nbsp;</span></span><span class="on">ON</span></div>');
var child = $(".switch").children('.sig');
$(".switch").each(function( index ) {
    $(this).children('.sig').css("left", $(this).data("off"));
  });

// start of switch code using input hidden 
switchName.append('<input type = "hidden" name=' + switchName.data("name") + ' value="0" class = "switchInput">');
$('.switch').on("click", function(){
    "use strict";
    var child = $(this).children('.sig');
    var val = (child.css('left') == $(this).data('off'))?$(this).data('on'):$(this).data('off');
    child.animate({'left':val}, 100);
    if($(this).data('tar') == false){
        $(this).children("input.switchInput").attr("value", 1);
        $(this).data('tar', true);
    }else{
        $(this).children("input.switchInput").attr("value", 0);
        $(this).data('tar',false);
    }
    //$(this).data('tar');
    //console.log($(this).children("input.switchInput").attr("value"));
});

// start of show value of range input
$('input[type="range"]').on("click", function(){
    "use strict";
    var value = document.getElementById('val');
    value.innerHTML = $('input[type="range"]').val();
});



// start of make tags
var tag = 0;
var tagVal = "";
$("input.tagsInput").on("keypress", function(e){
    if(tag === 0 && e.which == 43){
        $("div.tags").show(500);
        console.log("good");
    }
    if(e.which == 43) {
        tag++;
        $("div.tags").append("<div class='qur'></div>");
        tagVal += $(this).val() + "|";
        $("div.qur:last").text($(this).val());
        $("div.qur:last").animate({"opacity":"1"},500);
        $("input.setTags").attr("value", tagVal);
        $(this).val("");
        $("div.tags").show();
    }
    if($(this).val() == "+")
        $(this).val("");
});

// start of remove tags on double click
$("div.tags").on("dblclick", function(){
    "use strict";
    $("input.tagsInput").val("");
    $(this).hide(500, function(){
        $(this).text("");
        tagVal = "";
        tag=0;
    });
    
});

$("span.title").on("click", function(){
    "use strict";
    $(this).children("ul").fadeOut;
});
// start of toggle botton panel on click
var speedOfSwitchPanel = 200;// this var for speed of open panel
$('.open-panel').on("click", function(){
    "use strict";
    var dataTargetClassDirection = 'div.' + $(this).data('name');
    //console.log($(this).data('name'));
    if($(this).parent().siblings(dataTargetClassDirection).hasClass('hidden')){
        $(this).parent().siblings(dataTargetClassDirection).animate({"opacity":"0.6"},speedOfSwitchPanel).removeClass('hidden');
    }else{
        $(this).parent().siblings(dataTargetClassDirection).animate({"opacity":"0"},speedOfSwitchPanel).addClass('hidden');
    }//end of else 
});//end of toggle panel

/*
function submitForm(form){
    var url = form.attr("action");
    var formData = $(form).serializeArray();
    $.post(url, formData).done(function (data) {
        alert(data);
    });
}
*/

/* zzzz */
