
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn_clr");



function register() {
    x.style.left = "-410px";
    y.style.left = "20px";
    z.style.left = "125px";
    z.style.background = "linear-gradient(to left, rgb(240, 4, 4),rgb(248, 191, 3))";

}
function login() {
    
    x.style.left = "20px";
    y.style.left = "410px";
    z.style.left = "0";
    z.style.background = "linear-gradient(to right, rgb(240, 4, 4),rgb(248, 191, 3))";

}
function validateLogin(){
    var returnval= true;
    var userid=document.forms['flogin']['luserid'].value;
    var password=document.forms['flogin']['lpassword'].value;
    if(userid===''){
        alert('Userid can not be left blank!');
        return false;
    }
    if (password===''){
        alert('Password can not be left blank!');
        return false;
    }            
    if (password.length < 6){
        alert('Password must contains atleast of 6 characters!');
        return false;
    }
    if (password.length > 20){
        alert('Password can not be longer than 20!');
        return false;
    }
    return returnval;
}
function validateRegister(){
    var returnval= true;
    var userid=document.forms['fregister']['ruserid'].value;
    var password=document.forms['fregister']['rpassword'].value;
    var email=document.forms['fregister']['remail'].value;
    if(userid===''){
        alert('Userid can not be left blank!');
        return false;
    }
    if (email===''){
        alert('Email can not be left blank!');
        return false;
    }
    if (password===''){
        alert('Password can not be left blank!');
        return false;
    }            
    if (password.length < 6){
        alert('Password must contains atleast of 6 characters!');
        return false;
    }
    if (password.length > 20){
        alert('Password can not be longer than 20!');
        return false;
    }
    return returnval;
}