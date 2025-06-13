function f_window() {
    var title = "Form Details";
    var name = document.f.tname.value;
    var contact = document.f.contact.value;
    var email = document.f.email.value;
    var address = document.f.address.value;
    var session = document.f.session.value;
    var gender = "";
    var subjects = [];

    for (let i = 0; i < document.f.gen.length; i++) {
        if (document.f.gen[i].checked) {
            gender = document.f.gen[i].value;
        }
    }

    for (let j = 0; j < document.f.sub.length; j++) {
        if (document.f.sub[j].checked) {
            subjects.push(document.f.sub[j].value);
        }
    }

    let popup = window.open("", "popupWindow", "width=400,height=400,left=300,top=200,resizable=yes");

    with (popup.document) {
        write("<html><head><title>" + title + "</title></head>");
        write("<body style='background-color:blue; font-weight: bold'>");
        write("<div style='border:1px solid gray; padding:10px; background-color:lightblue; width:300px; height:300px; margin:20px auto;'>");
        write("Name: " + name + "<br/>"+ "<br/>");
        write("Email: " + email + "<br/>"+ "<br/>");
        write("Contact: " + contact + "<br/>"+ "<br/>");
        write("Address: " + address + "<br/>"+ "<br/>");
        write("Session: " + session + "<br/>"+ "<br/>");
        write("Gender: " + gender + "<br/>"+ "<br/>");
        write("Subjects: " + subjects.join(", ") + "<br/>"+ "<br/>");
        write("<br/><input type='button' value='Close me' onclick='self.close();' />"+ "&nbsp");
        write("<input type='button' value='Print' onclick='self.print();' />");
        write("</div></body></html>");
        close();
    }
}
