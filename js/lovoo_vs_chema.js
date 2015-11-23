/**
* @author: José María Valera Reales <Chemaclass>
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

/** @var string City to searh. */
var from_where = "berlin";
/** @var bool Care about if the person was verified before. */
var only_verified = true;
/** @var int Time to exec the function to check the person. */
var each_ms = 200;
/** @var bool Show the logger via console.log. */
var with_log = true;
/** @var int Limit of persons to check. -1 means infinite loop. */
var limit = -1;

/**
* Person object.
* 
* With the members [name, age, city, verifed]
*/
var Person = function(name, age, city, verified) {
    this.name = name;
    this.age = age;
    this.city = city;
    this.verified = verified;
};

/**
* Button object. 
*
* Basically here we can manage easily the list of persons and the onlick event. 
*/
var Btn = function(n) {
    var btn = $("span[ng-click='voteUser(" + n + "); $event.stopPropagation();']");
    this.persons = [];
    return {
        'click':function(person) {
            btn.click();
            this.persons.push(person);
        },
        'persons':this.persons
    }
};

/** @var Btn btn_yes */
var btn_yes = new Btn(1);

/** @var Btn btn_no */
var btn_no = new Btn(0);

/**
* Do each time. This is the main function.
* 
* Check the each person and click to "yes" or "no" if the 
* person is someone who probably we are interested.
*/
var si = setInterval(function() {
    var u = $("div[ng-if='user'] div:nth-child(2) .h6");
    var is_u_verified = (u.find("div:nth-child(3) div")
        .text().toLowerCase().indexOf(" no ") == -1);
    var city = u.find("div:nth-child(1)").first().text().toLowerCase().split(" ")[1];
    var is_u_from_where = (city.indexOf(from_where.toLowerCase()) != -1);
    var name_age = u.prev().text().split(", ");
    var name = name_age[0];
    var age = name_age[1];

    // Create the person.
    var person = new Person(name, age, city, is_u_verified);
    // Put the person inside the correct Btn object.
    if (is_u_from_where && (!only_verified || (only_verified && (is_u_verified)))) {
        btn_yes.click(person);
    } else {
        btn_no.click(person);
    }

    var persons_length = (btn_yes.persons.length + btn_no.persons.length);

    // Should we print the log?
    if (with_log) {
        console.log("yes: " + btn_yes.persons.length 
            + ", no: " + btn_no.persons.length
            + ", total: " + persons_length);
    }    

    // Check if we should to stop it.
    if (limit != -1 && persons_length >= limit) {
        clearInterval(si);
    }
}, each_ms);

// ========================== END ==========================

// (.min) The same but minified
var from_where="berlin",only_verified=!0,each_ms=200,with_log=!0,limit=-1,
Person=function(n,e,t,i){this.name=n,this.age=e,this.city=t,this.verified=i},
Btn=function(n){var e=$("span[ng-click='voteUser("+n+"); $event.stopPropagation();']");return this.persons=[],{click:function(n){e.click(),this.persons.push(n)},persons:this.persons}},
btn_yes=new Btn(1),btn_no=new Btn(0),
si=setInterval(function(){var n=$("div[ng-if='user'] div:nth-child(2) .h6"),
e=-1==n.find("div:nth-child(3) div").text().toLowerCase().indexOf(" no "),
t=n.find("div:nth-child(1)").first().text().toLowerCase().split(" ")[1],
i=0!=t.indexOf(from_where.toLowerCase()),s=n.prev().text().split(", "),o=s[0],r=s[1],l=new Person(o,r,t,e);
i&&(!only_verified||only_verified&&e)?btn_yes.click(l):btn_no.click(l);
var h=btn_yes.persons.length+btn_no.persons.length;
with_log&&console.log("yes: "+btn_yes.persons.length+", no: "+btn_no.persons.length+", total: "+h),
-1!=limit&&h>=limit&&clearInterval(si)},each_ms);

// Remember -> You can stop the execution with: 'clearInterval(si)'
