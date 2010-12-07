var media_check = document.forms.couponForm.media_check;
var media_name = document.forms.couponForm.media_name;

var etc_check = document.forms.couponForm.etc_check;
var etc_name = document.forms.couponForm.etc_name;

function checkMedia() {
    if(media_check.checked == true){
        enableMedia();
    }else{
        disableMedia();
    }
}

function enableMedia() {
    media_name.disabled = false;
}

function disableMedia() {
    media_name.disabled = true;
}

function checkEtc() {
    if(etc_check.checked == true){
        enableEtc();
    }else{
        disableEtc();
    }
}

function enableEtc() {
    etc_name.disabled = false;
}

function disableEtc() {
    etc_name.disabled = true;
}