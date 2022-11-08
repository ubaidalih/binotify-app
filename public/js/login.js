var http = new XMLHttpRequest()
http.onreadystatechange = function() {
    if (this.readyState === 4) {
        if (this.responseText === "ok") {
            document.getElementById("login-form").submit()
        } else {
            document.getElementById("fail-upload").innerText = "Wrong email / password."
            document.getElementById("email").classList.remove("valid")
            document.getElementById("email").classList.add("invalid")
            document.getElementById("password").classList.remove("valid")
            document.getElementById("password").classList.add("invalid")
        }
    }
}
document.getElementById("login-button").addEventListener("click", () => {    
    var email = document.getElementById("email").value
    var password = document.getElementById("password").value
    if (email && password) {
        var params = 'email='+email+'&password='+password;
        document.getElementById("fail-upload").innerText = ""
        http.open("POST", `http://localhost/tugas-besar-1/public/login/login_check`)
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.send(params)
    } else {
        document.getElementById("fail-upload").innerText = "Please fill all your form."
    }
})