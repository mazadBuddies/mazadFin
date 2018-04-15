function changeFormTitle(name){
    var fontAwesome = '<i class="fa fa-bullseye"></i>';
    $('#formTitle').fadeOut(10).html(fontAwesome + name).fadeIn(400);
    $('#submit1').attr('value',name);
    if(name == 'Sign In'){
        $('.name-1 ').slideUp();
    }else if(name == 'Sign Up'){
        $('#names').prepend(names);
        $('#names').append(userName);
        $('#pass').append(comPassword);
        $('.re').append(gender);
        $('.re').append(image);
        $('.rePassword').append('<script src="js/main.js">');
        $('.firstName').addClass('animated bounceInLeft');
        $('.lastName').addClass('animated bounceInRight');
        $('.userName').addClass('animated bounceInDown');
        $('.rePassword').addClass('animated bounceInDown');
        $('.gender').addClass('animated bounceInDown');
    }
}

changeFormTitle('Sign In');
var names = 
    '<div class="row name-1">' + 
        '<div class="firstName col-6">' + 
            '<label for="firstName" class="col-12">First Name</label>' +
            '<div class="border">' + 
                '<input type="text" name="firstName" class="col-12" placeholder="more than 3 chars"/>'+
            '</div>'+
        '</div>' +
        '<div class="lastName col-6 name-1">' +
            '<label for="lastName" class="col-12">Last Name</label>'+
            '<div class="border">'+
                '<input type="text" name="lastName" class="col-12"  placeholder="more than 3 chars"/>'+
            '</div>'+
        '</div>'+
    '</div>';


    var userName = '<div class="row name-1">' + 
                        '<div class="userName col-12">'+
                            '<label for="userName" class="col-12">Username</label>'+
                            '<div class="border">'+
                                '<input type="text" class="col-12" name="userName"  placeholder="eg. mr.robot"/>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row name-1">'+
                        '<div class="phone col-12">'+
                            '<label for="phoneNumber" class="col-12">Credit Card</label>'+
                            '<div class="border">'+
                                '<input type="text" class="col-12" name="creditCard" placeholder="15 Number"/>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

var comPassword = 
                '<div class="row name-1 re">'+
                    '<div class="rePassword col-12">'+
                        '<label for="comPassword" class="col-12">Password Confirmation</label>'+
                        '<div class="border add-icon">'+
                            '<input type="password" class="col-12" name="comPassword" data-show="true" placeholder="Rewrite password"/>'+
                        '</div>'+
                    '</div>'+
                '</div>';

var gender = 
    '<div class="row name-1">'+
        '<div class="col-12 gender">'+
        '<div class="row">'+
            '<div class="col-4"><p class="gen">Gender</p></div>'+
            '<div class="col-4">'+
                '<input id="gen1" type="radio" class="col-1" name="gender" value="male" checked/>'+
                '<label for="gen1" class="col-11">Male</label>'+
            '</div>'+
            '<div class="col-4">'+
                    '<input id="gen2" type="radio" class="col-1" name="gender" value="female"/>'+
                    '<label for="gen2" class="col-11">Female</label>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';

    var image = '<div class="row name-1">' +
                    '<div class="userName col-12">'+
                        '<label for="userName" class="col-12">Image</label>'+
                            '<div class="border">'+
                                '<input type="file" class="col-12" name="images"  placeholder="eg. mr.robot" id="images"/>'+
                            '</div>'+
                    '</div>'+
                '</div>';

$('div.selectForm span').on("click", function(){
    "use strict";
    $(this).addClass('active').siblings().removeClass('active');
    changeFormTitle($(this).data('name'));
});
// Scroll to specific values
// scrollTo is the same
window.scroll({
  top: 2500, 
  left: 0, 
  behavior: 'smooth' 
});

// Scroll certain amounts from current position 
window.scrollBy({ 
  top: 100, // could be negative value
  left: 0, 
  behavior: 'smooth' 
});
