function defaultAjaxFunction(data){
    //alert(data);
    return 0;
}



function addedNewOfferSuc(data){
    /*
        addedNewOfferSuc - Function _- VOID
        ::TARGET:: show new data added in data base in active user
        @params:: **data** from ajax request
    */
//    /alert(data);
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
        
    /*
    var newTableRow =
                '<tr class="animated zoomInDown">' +
                    '<th>' + 
                        userInfo.offer + '<sup>EGP</sup>' +
                    '</th>' + 
                    '<th>' +
                        '<div class="cir">' + 
                            '<img class="img-responsive" src="' +
                                userInfo.photo + 
                            '">' +
                        '</div>' +
                    '</th>' + 
                    '<th>' +
                        userInfo.name + 
                    '</th>'+
                    '<th>' +
                        userInfo.time + 
                    '</th>' +
                '</tr>';
*/
//$('div.sessionOffers table tr.head').after(newTableRow); // append values in table
}// end of addedNewOfferSuc function

function chngWalletValue(data){
    "use strict";
    $(".myBalance2").text(moneyFormat(data));
    $(".myBalance").text(data);

}

function editProfile(data){
    var JSONInfo = JSON.parse(data);
    editName(JSONInfo.firstName + " " +JSONInfo.lastName);
    editFirstName(JSONInfo.firstName);
}
function activateButton(){
    return false;
}
function deactivateButton(){
    return false;
}
function deleteCategory(){
    return false;
}
function clearReport(){
    return false;
}
function deleteSession(){
    return false;
}

var ajaxSuccessFunctions = [defaultAjaxFunction ,
    addedNewOfferSuc,
    activateButton,
    deactivateButton, 
    deleteCategory,
    deleteSession,
    clearReport,
    chngWalletValue,
    editProfile
]; // this array for ajax success functions
