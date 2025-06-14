function f_window() {
  var title = "Form Details";
  var name = document.f.fName.value;
  var email = document.f.fEmail.value;
  var address = document.f.faddress.value;
  var round = document.f.fround.value;
  var gender = "";
  var subject = [];

  for (i = 0; i < document.f.gender.length; i++) {
    if (document.f.gender[i].checked) {
      gender = document.f.gender[i].value;
    }
  }

  for (j = 0; j < document.f.sub.length; j++) {
    if (document.f.sub[j].checked) {
      subject.push(document.f.sub[j].value);
    }
  }

  let p = open(" ", "", "width=400,height=400,left=300,top=200,resizable=yes");

  with (p.document) {
    write("<html><head><title>" + title + "</title></head>");
    write(
      "<body style='background-color: rgb(189, 245, 245); font-weight: bold;'>"
    );
    write("Name: " + name + "<br><br>");
    write("Email: " + email + "<br><br>");
    write("Address: " + address + "<br><br>");
    write("Round: " + round + "<br><br>");
    write("Gender: " + gender + "<br><br>");
    write("Subject: " + subject.join(", ") + "<br><br>");
    write("</body></html>");
    close();
  }
}
