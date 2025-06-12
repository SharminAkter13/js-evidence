function chEmail(){
    var email = document.getElementById(email);
    var emailNaN = /^[^ ]+@[^ ]+\.[a-z]{2,4}$/;
    if (!emailNaN.test(email.value))
    {
        alert("Please enter valid email");
        document.getElementById(email).style.borderColor="#ff0000";
        return false;
    }
    else{
        document.getElementById("email").style.borderColor = "#22BB22";

    }
    return true;
}

function chname(){
    var name = document.getElementById("tname");
     var emailNaN = /^[0-9A-Za-z]{4,11}$/;
    if (!emailNaN.test(email.value))
    {
        alert("Please enter minimum 4 and max 11");
        document.getElementById("tname").style.borderColor="#ff0000";
        return false;
    }
    else{
        document.getElementById("tname").style.borderColor = "#22BB22";

    }
    return true;
}
