var l = location.href;
var p = l.split("?");
var sec = p[1];
var users = document.getElementsByClassName('om-thumbnail-profile-panel');
var osuNum = 0;

function lee(){
   location.href = "https://www.omiai-jp.com/search";
    setInterval(doO, sec);
}

function doO(){
    
if(location.href.includes("https://www.omiai-jp.com/search")){
users[osuNum].click();
}
osuNum++;
setTimeout(doClose, 2000);
}

function doClose(){
if(location.href.includes("https://www.omiai-jp.com/search#")){
document.getElementsByClassName('btn-dialog-close')[2].click();
}
}

setTimeout(lee, 3000);