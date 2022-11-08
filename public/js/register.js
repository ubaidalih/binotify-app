var http = new XMLHttpRequest()
http.onreadystatechange = function() {
    if (this.readyState === 4) {
        if (this.responseText === "ok") {
            document.getElementById("register-form").submit()
        } else if (this.responseText === "email") {
            document.getElementById("fail-upload").innerText = "Email already registered."
            document.getElementById("email").classList.remove("valid")
            document.getElementById("email").classList.add("invalid")
            document.getElementById("username").classList.remove("invalid")
            document.getElementById("username").classList.add("valid")
        } else if (this.responseText === "username") {
            document.getElementById("fail-upload").innerText = "Username already registered."
            document.getElementById("username").classList.remove("valid")
            document.getElementById("username").classList.add("invalid")
            document.getElementById("email").classList.remove("invalid")
            document.getElementById("email").classList.add("valid")
        } else {
            document.getElementById("fail-upload").innerText = "Email and Username already registered."
            document.getElementById("email").classList.remove("valid")
            document.getElementById("email").classList.add("invalid")
            document.getElementById("username").classList.remove("valid")
            document.getElementById("username").classList.add("invalid")
        }
    }
}
document.getElementById("register-button").addEventListener("click", () => {
    var username = document.getElementById("username").value
    var email = document.getElementById("email").value
    var password = document.getElementById("password").value
    var confirm_password = document.getElementById("confirm-password").value
    var email_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    var username_format = /^[a-zA-Z0-9_]+$/
    if (username && email && password && confirm_password) {
        if (!(email_format.test(email))){
            document.getElementById("fail-upload").innerText = "Invalid email."
        } else if (!(username_format.test(username))){
            document.getElementById("fail-upload").innerText = "Invalid username."
        } else if (password !== confirm_password) {
            document.getElementById("fail-upload").innerText = "Your password does not match your confirmation password."
        }else {
            var params = 'email='+email+'&username='+username+'&password='+password + '&confirm-password='+confirm_password;
            document.getElementById("fail-upload").innerText = ""
            http.open("POST", `http://localhost/binotify-app/public/register/register_check`)
            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            http.send(params)
        }
    } else {
        document.getElementById("fail-upload").innerText = "Please fill all your form."
    }
})