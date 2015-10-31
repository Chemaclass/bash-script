/**
* @author: José María Valera Reales
*
* I like Lovoo app, but sometimes can be funnier, especially when you can play and
* doing another things at the same time, you know :-)
*
* As you should know, Lovoo is an app (movil&web) where you can "judge the aspect" of other people.
* I mean like FB did in his begining. You can see picture from another persons and say "like"
* or "don't like" it. So, I did an script to say that automatically if the person is from "from_where"
* and should be a verified person. In case the person is from the city I choose before just do
* an auto-click in "like", otherwise just "don't like".
*/

// .dev
// ======================== BEGIN ========================
var from_where = "berlin";
var only_verified = true;
var each_ms = 200;
var with_log = true;
var Btn = function(n) {
    var btn = $("span[ng-click='voteUser(" + n + "); $event.stopPropagation();']");
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
// ========================== END ==========================

// (.min) The same but minified
var from_where="berlin",only_verified=!0,each_ms=200,with_log=!0,
Btn=function(n){var e=$("span[ng-click='voteUser("+n+"); $event.stopPropagation();']");return this.names=[],{click:function(n){e.click(),this.names.push(n)},names:this.names}},
btn_yes=new Btn(1),btn_no=new Btn(0),
si=setInterval(function(){var n=$("div[ng-if='user'] div:nth-child(2) .h6"),
e=-1==n.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no "),
t=0!=n.find("div:nth-child(1)").text().toLowerCase().indexOf(from_where),i=n.prev().text();
t&&(!only_verified||only_verified&&e)?btn_yes.click(i):btn_no.click(i),
with_log&&console.log("y: "+btn_yes.names.length+", n: "+btn_no.names.length)},each_ms);

// Remember -> You can stop the execution with: 'clearInterval(si)'
