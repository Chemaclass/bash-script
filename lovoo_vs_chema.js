/**
*
* @author: José María Valera Reales
*/

// .dev
var Btn = function(n){
    var btn = $("span[ng-click='voteUser("+n+"); $event.stopPropagation();']");
    this.names = [];
    return {
        'click':function(name) {
            btn.click();
            this.names.push(name);
        },
        'names':this.names
    }
};
var btn_yes = new Btn(1);
var btn_no = new Btn(0);
var si = setInterval(function() {
    var u = $("div[ng-if='user'] div:nth-child(2) .h6");
    var name = u.prev().text();
    if ((u.find("div:nth-child(1)").text().toLowerCase().indexOf("berlin") != 0)
        && (u.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no ") == -1)) {
        btn_yes.click(name);
    } else {
        btn_no.click(name);
    }
    console.log("y: "+btn_yes.names.length+", n: "+btn_no.names.length);
}, 200);


// .min
var Btn = function(n){btn = $("span[ng-click='voteUser("+n+"); $event.stopPropagation();']");this.names = [];return {'click':function(name) {btn.click();this.names.push(name);},'names':this.names}}, btn_yes = new Btn(1), btn_no = new Btn(0), si=setInterval(function(){u=$("div[ng-if='user'] div:nth-child(2) .h6"),name=u.prev().text();((u.find("div:nth-child(1)").text().toLowerCase().indexOf("berlin") != 0) && (u.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no ") == -1))? btn_yes.click(name) : btn_no.click(name); console.log("y: "+btn_yes.names.length+", n: "+btn_no.names.length);}, 200);

// clearInterval(si)
