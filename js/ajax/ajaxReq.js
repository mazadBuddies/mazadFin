function addedNewOfferSuc(data){
    //alert(data);

    return false;
}

function submitForm(form){
    var url = form.attr("action");
    var formData = {};
    $(form).find("input[name]").each(function (index, node) {
        formData[node.name] = node.value;
    });
    $.post(url, formData).done(function (data) {
        //alert(data);
    });
}

function uploadImage(form){
    "use strict";
    $.ajax({
        type:'POST',
        url: $(form).attr('action'),
        data: new FormData($('#mkSession')[0]),
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log("success");
            console.log(data);
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}


function uploadeFile(fileId, fileName, urlDir, form_data, func){
    var property = document.getElementById(fileId).files[0];
    var imageName = property.name;
    var image_exetension = imageName.split('.').pop().toLowerCase();
    if(jQuery.inArray(image_exetension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
        alert("invalid Image");
    }
    var imageSize = property.size;
    if(imageSize > 2000000){
        alert("Image File Size is Very big");
    }else{
        form_data.append(fileName, property);
        $.ajax({
            url: urlDir,
            method: "POST",
            data: form_data,
            contentType:false,
            cache: false,
            processData: false,
            success: func,
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }
}


function makeInsertArray(array, dataForm){
    for(var i=0;i<array.length;i++){
        dataForm.append(array[i].name, array[i].value);
    }
    //console.debug(dataForm);
    return dataForm;
}

function ajaxFileSubmit(e){
    "use strict";
    e.preventDefault();
    var url = $(this).data("url");
    var formData = $(this).serializeArray();
    var method   = $(this).data('method');
    var accept   = String($(this).data('accept'));
    formData = makeInsertArray(formData, new FormData());
    formData.append("ACTION", $(this).data('action'));
    uploadeFile("images", "images", url, formData, function (data){
        console.log(data);
        if(data == accept)//here
        {
            $("form#mkSession").fadeOut(500, function(){
                $(".overlay").fadeOut(500, function(){
                    $(".noti-suc").children("span").text("SESSION ADDED SUCCESSFULLY");
                    $(".noti-suc").animate({right:"0%"}, 1000, function(){
                        $(this).animate({right:"0%"}, 2000, function(){
                            $(this).animate({right:"-100%"}, 1000);
                        });// end of small animate
                    });// end of big animate
                });// end of small fadeOut
            });// end of big fadeOut
        }// end of ig
    });// end of accept action function
}// end of function

function defaultAjaxFunction(data){
    alert(data);
    return 0;
}


function addedNewOfferSuc(data){
    /*
        addedNewOfferSuc - Function _- VOID
        ::TARGET:: show new data added in data base in active user
        @params:: **data** from ajax request
    */
  // alert(data);
    $('div.setOffer .errors').html("");
    var offerErrorArray = JSON.parse(data);
    var errorReprotingLength = offerErrorArray.length;
    
        if(errorReprotingLength > 0){
            for(var i=0; i<errorReprotingLength;i++){
                $('div.setOffer .errors').append("<span class='animated flash'>" + offerErrorArray[i] + "</span>");
                $('div.setOffer .errors span').animate({"display":"block"},3000,function(){
                    "use strict";
                    $(this).slideUp(300);
                });        
            }//end of for
        }//end of if
        
    
//$('div.sessionOffers table tr.head').after(newTableRow); // append values in table
}// end of addedNewOfferSuc function

var ajaxSuccessFunctions = [
    defaultAjaxFunction 
    , activateButton
    , deactivateButton
    , deleteCategory
    , deleteSession
    , clearReport
    , addedNewOfferSuc]; // this array for ajax success functions

function makeInsertArray(array, dataForm){
    for(var i=0;i<array.length;i++){
        dataForm.append(array[i].name, array[i].value);
    }
    //console.debug(dataForm);
    return dataForm;
}
function ajaxSubmit(e){
    e.preventDefault();
    var url      = $(this).data("url");
    var formData = $(this).serializeArray();
    var method   = $(this).data('method');
    var accept   = String($(this).data('accept'));
    var action   = $(this).data('action');
    var functionIndex = 0;
    mkOfferValue();
    if($(this).data('values') != undefined){
        var dataAsString = $(this).data('values');
        var splitedArrayOfDataValue = dataAsString.split('|');
    }
    formData = makeInsertArray(formData, new FormData());
    formData.append("ACTION", action);
    if($(this).data('values') != undefined){
        for(var i = 0; i < splitedArrayOfDataValue.length; i++){
            var currentIndexKeyValue = splitedArrayOfDataValue[i].split("=>");
            formData.append(currentIndexKeyValue[0],currentIndexKeyValue[1]);
        }// end of for
    }//end of if
    if($(this).data('function') != undefined){
        functionIndex = parseInt($(this).data('function'));
    }
    
    $.ajax({
        url: url,
        method: method,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: ajaxSuccessFunctions[functionIndex],
        error: function(data){
            alert("error");
            console.log(data);
        }
    });
}

$(".ajax.click").on("click", ajaxSubmit);
$(".ajax_file.submit").on("submit", ajaxFileSubmit);
$(".ajax.submit").on("submit", ajaxSubmit);