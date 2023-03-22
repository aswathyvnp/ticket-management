function validate() {
    let name = document.getElementById("name").value;
    let mail = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    let pass = document.getElementById("password").value;
    let cpass = document.getElementById("password").value;
    let nregx = /^[a-z A-Z]{2,15}$/;
    let regex = /^[a-zA-Z0-9+_.-]+@[a-zA-Z]+\.[a-z A-Z]{2,4}$/;
    let pregx = /^[0-9]{10}$/;
    let paregx = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    if (name == "") {
        document.getElementById("a").innerHTML = "Please enter a name!";
        return false;
    } else if (!nregx.test(name)) {
        document.getElementById("a").innerHTML = "Please enter a valid name!";
        return false;
    } else if (mail == "") {
        document.getElementById("a").innerHTML = "Please enter a email!";
        return false;
    } else if (!regex.test(mail)) {
        document.getElementById("a").innerHTML = "Please enter a valid email!";
        return false;
    } else if (phone == "") {
        document.getElementById("a").innerHTML = "Please enter a phone number!";
        return false;
    } else if (!pregx.test(phone)) {
        document.getElementById("a").innerHTML =
            "Please enter a valid phonenumber!";
        return false;
    } else if (pass == "") {
        document.getElementById("a").innerHTML = "Please enter password!";
        return false;
    } else if (!paregx.test(pass)) {
        document.getElementById("a").innerHTML =
            "Please enter a valid password!";
        return false;
    } else if (cpass == "") {
        document.getElementById("a").innerHTML =
            "Please confirm your password!";
        return false;
    } else {
        return true;
    }
}

// scroll
$(function() {
  $('nav a').on('click', function(e) {
    console.log(this.hash)
    if(this.hash !== ''){
      e.preventDefault()

      const hash = this.hash

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      },
      800)
    }
  })
  // $('.fade').addClass('active')
})


// scroll
