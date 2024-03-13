var homepage = document.getElementById('rootcontainer');
var menu = document.getElementsByClassName('_62ta')[5];
var logout = document.getElementsByClassName('_5luu')[35];
var savenlog1 = document.getElementById('u_b_3');
var savenlog2 = document.getElementById('u_9_3');
var tologin = document.getElementsByClassName('_2zs_')[0];


function runL(){
    if(typeof(homepage) != 'undefined' && homepage != null){
        menu.click(); 
        setTimeout(clickLogout, 4000);
        if(typeof(savenlog1) != 'undefined' && savenlog1 != null){
            savenlog1.click();
        }
        if(typeof(savenlog2) != 'undefined' && savenlog2 != null){
            savenlog2.click();
        }
    }
    
    if(typeof(tologin) != 'undefined' && tologin != null){
        tologin.click();
    }
    
    
}


function clickLogout(){
    if(typeof(logout) != 'undefined' && logout != null){
        logout.click();
    }
}
setTimeout(runL, 1500);
