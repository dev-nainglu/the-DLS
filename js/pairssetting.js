var l = location.href;
var p = l.split("?");
var d = p[1].split("*");
var lower = d[0];
var upper = d[1];
var citi = d[2].split("-");
var sec = d[3];
var t = 0;
function settings(){
    if(location.href.includes("https://pairs.lv/card_pickup")){
        doClose();
    }
    if(location.href.includes("https://pairs.lv/search/setup_condition/grid/residence_state/1")){
        document.getElementsByClassName('list-item__2eKNf')[0].click();
        
        citi.forEach(val => {
            if(val){
                
                document.getElementsByClassName('list-item__2eKNf')[val].click();
            }
        });
        document.getElementsByClassName('css-15nc23y-pointerStyles-TextButton')[0].click();
        
    }
    setInterval(finishbutt, 2000);
}

function finishbutt(){
    document.getElementsByClassName('css-14a8wnk-pointerStyles')[0].click();
}


settings();
