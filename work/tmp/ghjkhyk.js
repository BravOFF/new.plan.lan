/**
 * Created by BravovRM on 18.05.2017.
 */
const time = 3000;
const arrElements = document.getElementsByClassName('uk-tab')[0].children;
let i = 0;
const hiddenEl = 3;
setInterval(function() {
    arrElements[i].click();
    if (i<=(arrElements.length-hiddenEl)){i++;}else{i = 0;}
}, time);