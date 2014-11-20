/**
 * menucolochange.js
 *
 * if we create menu points in wp,
 * that aren't any links,
 * we have to create them as links
 * within the damin interface,
 * where the href is left blanc
 *
 * So the css sees them as links
 * to give them a different look
 * we call this function when the
 * page is loaded, parse the html
 * and change the look
 *
 * author: Sean Hennig
 * contact: http://www.sean-hennig.de
 * date: 2014/11/20
 */
window.onload=changeMenuColor();

function changeMenuColor() {
    var allMenuPoints = document.getElementsByClassName('menu-item');
    var text = "";
    var allMenuPointsChildren; 
    for (var i=0; i<allMenuPoints.length; i++) {
        allMenuPointsChildren = allMenuPoints[i].childNodes;
        var str = allMenuPoints[i].innerHTML;
        var searchpatt1 = /\<a\>/gi;
        var searchpatt2 = /\<\/a\>/gi;
        if (/^\<a\>.+\<\/a\>$/.test(str)) {
            var	str = allMenuPoints[i].innerHTML;
            var res = str.replace(/^\<a\>/i, "");
            var res2 = res.replace(/\<\/a\>/i, ""); 
            allMenuPoints[i].innerHTML = '&nbsp;&nbsp;' + res2;
        }
    }
  
}