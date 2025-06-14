function f_window() {
  var title = "Form Details";
  var name = document.f.fName.value;
  var email = document.f.fEmail.value;
  var address = document.f.faddress.value;
  var round = document.f.fround.value;
  var gender = "";
  var subject = [];

  for (i = 0; i <= document.f.gender.length; i++) {
    if (document.f.gender[i].checked) {
      gender = document.f.gender[i].value;
    }
  }

  for (i = 0; i <= document.f.sub.length; i++) {
    if (document.f.sub[i].checked) {
      subject = document.f.sub[i].value;
    }
  }
}
