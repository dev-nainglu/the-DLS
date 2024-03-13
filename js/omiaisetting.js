var l = location.href;
var p = l.split("?");
var d = p[1].split("*");
var lower = d[0];
var upper = d[1];
var citi = d[2].split("-");

var users = document.getElementsByClassName('om-thumbnail-profile-panel');
var osuNum = 0;

function settings(){
    if(location.href.includes("omiai-jp.com/search")){
        document.getElementsByClassName('om-button-search-condition')[0].click();
        document.getElementsByClassName('om-icon-boomerang-mark')[0].click();
        document.getElementById('condition_dialog_begin_age').value = lower;
        document.getElementById('condition_dialog_end_age').value = upper;
        document.getElementsByClassName('om-back-chevron')[26].click();
        document.getElementsByClassName('om-icon-boomerang-mark')[1].click();
        citi.forEach(val => {
            if(val){
                
                document.getElementById('condition_dialog_country_JP-'+val).click();
            }
        });
        document.getElementsByClassName('om-back-chevron')[29].click();
        document.getElementById('condition_btn_ok')[0].click();
        
    }
    setInterval(doO, 4000);
}

function doO(){
if(location.href.includes("omiai-jp.com/search")){
users[osuNum].click();
}
osuNum++;
setTimeout(doClose, 2000);
}

function doClose(){
if(location.href.includes("omiai-jp.com/search#")){
document.getElementsByClassName('btn-dialog-close')[2].click();
}
}

setInterval(doO, 4000);
settings();


