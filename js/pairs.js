var users = document.getElementsByClassName('grid-user-item__yvDsL');
var osuNum = 0;

function doO(){
    if(location.href.includes("https://pairs.lv/search")){
      if(users.length < (osuNum - 2)){
        users[osuNum].click();
      }else{
        users = document.getElementsByClassName('grid-user-item__yvDsL');
        users[osuNum].click();
      }
    }
    osuNum++;
    setTimeout(doClose, 2000);
}
function doClose(){
    if(location.href.includes("https://pairs.lv/user/profile")){
        document.getElementsByClassName('css-5c659f')[0].click();
    }
}
setInterval(doO, 4000);