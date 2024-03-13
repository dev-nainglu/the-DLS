var a = document.querySelector('button[aria-label="Like"]');
var b = document.querySelector("a[aria-current='page']");
function doO(){
    if(b.length > 0){
        b.click();
    }
    a.click();
}

setInterval(doO, 3000);