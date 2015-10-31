/**
* @author: José María Valera Reales
*
* I like Lovoo app, but sometimes can be funnier, especially when you can play and
* doing another things at the same time, you know :-)
*/

// .dev
var from_where = "berlin";
var only_verified = true;
var each_ms = 200;
var with_log = true;
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
var btn_yes = new Btn(1), btn_no = new Btn(0);
var si = setInterval(function() {
    var u = $("div[ng-if='user'] div:nth-child(2) .h6");
    var is_u_verified = (u.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no ") == -1);
    var is_u_from_where = (u.find("div:nth-child(1)").text().toLowerCase().indexOf(from_where) != 0);
    var name = u.prev().text();
    if (is_u_from_where && (!only_verified || (only_verified && (is_u_verified)))) {
        btn_yes.click(name);
    } else {
        btn_no.click(name);
    }
    if (with_log) console.log("y: " + btn_yes.names.length + ", n: " + btn_no.names.length);
}, each_ms);


// .min
var from_where="berlin",each_ms=200,with_log=true,
Btn = function(n){ this.names = [];return {'click':function(name){$("span[ng-click='voteUser("+n+"); $event.stopPropagation();']").click();this.names.push(name);},'names':this.names}},
btn_yes = new Btn(1), btn_no = new Btn(0),
si=setInterval(function(){u=$("div[ng-if='user'] div:nth-child(2) .h6"),name=u.prev().text();
((u.find("div:nth-child(1)").text().toLowerCase().indexOf(from_where) != 0) && (u.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no ") == -1))
?btn_yes.click(name) : btn_no.click(name); if(with_log)console.log("y: "+btn_yes.names.length+", n: "+btn_no.names.length);}, each_ms);

// clearInterval(si)
