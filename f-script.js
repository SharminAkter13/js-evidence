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
    if (!emailNaN.test(name.value))
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

function f_window(){
    var title = "Title";
    var name =document.f.tname.value;
        var contact =document.f.contact.value;
        var email =document.f.email.value;
    var address =document.f.address.value;
    var session =document.f.session.value;
    var gender ="";
    var subject ="";

  //check if radio button is selected and read selected value 

  for (i=0;i<document.f.gen.length;i++){
    if(document.f.gen[i].checked){
        gender = document.f.gen[i].value;
    }
  }

  for (j=0;j<document.f.sub.length;j++){
    if(document.f.sub[j].checked){
        subject = document.f.sub[j].value;
    }
  }

     // create new window here

     a =open(",",'width=200px,height=200px' )
     
     with(a.document){
     write("<html>");
     write("<head><title>"+title+"</title></head>");
     write("<body style='background-color:lightblue; font-weight: bold'>");
     write("<div style='border:1px solid gray'>Name:"+name+"<br/>");
     write("Address:"+address+"<br/>");
     write("Session:"+session+"<br/>");
     write("Gender:"+gender+"<br/>");
     write("Subject:"+subject+"<br/>");
       write("<input type='button' value='Close me' onclick='self.close();' />");
    write("<input type='button' value='Print' onclick='self.print();' />");
  }
}
