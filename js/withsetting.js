var l = location.href;
var p = l.split("?");
var d = p[1].split("*");
var lower = d[0];
var upper = d[1];
var citi = d[2].split("-");
var sec = d[3];
var u = document.getElementsByClassName("link-area");
var osunum = 0;



function settings(){
    if(location.href.includes("https://with.is/search/edit")){
        document.getElementsByClassName('open-addresses-dialog')[0].click();
        document.getElementById('search_form_addresses_0').click();
        citi.forEach(val => {
            if(val){
                
                document.getElementById('search_form_addresses_'+val).click();
            }
        });
        document.getElementsByClassName('icon-close-dialog')[0].click();
        
        //need to choose age
        document.getElementsByClassName('search-submit-button')[0].click(); //final search button
        
    }
}
function doA(){
        alert(location.href);
        var girls = document.getElementsByClassName('link-area');
        var l = girls[osunum].getAttribute('href');
        location.href = "https://with.is"+l;
        osunum++;

    setTimeout(goBack, 3000);
}

function goBack() {
    if(location.href.includes("https://with.is/users")){
        window.history.back();
    }
  
}
setInterval(settings, 2000);
setInterval(doA, 2000);
