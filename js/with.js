
var u = document.getElementsByClassName("link-area");
var num = 0;
function doO(){
    if(location.href.includes("https://with.is/search")){
        var girls = document.getElementsByClassName('link-area');
        var l = girls[num].getAttribute('href');
        location.href = "https://with.is"+l;
        num++;
    }
    
    setTimeout(goBack, 3000);
}

function goBack() {
    if(location.href.includes("https://with.is/users")){
        window.history.back();
    }
  
}


setInterval(doO,  3000);