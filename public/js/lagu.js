var http = new XMLHttpRequest()
http.onreadystatechange = function() {
    if (this.readyState === 4) {
        if (this.responseText === "ok") {
            document.getElementById("mainform").submit()
        } else {
            document.getElementById("fail-upload").innerText = "Song already added."
        }
    }
}
document.getElementById("add-button").addEventListener("click", () => {
    var judul = document.getElementById("judul").value
    var penyanyi = document.getElementById("penyanyi").value
    var tanggal_terbit = document.getElementById("tanggal_terbit").value
    var genre = document.getElementById("genre").value
    if (judul && penyanyi && tanggal_terbit && genre) {
        var params = 'judul='+judul
        document.getElementById("fail-upload").innerText = ""
        http.open("POST", `http://localhost/binotify-app/public/tambahlagu/check`)
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        http.send(params)
    } else {
        document.getElementById("fail-upload").innerText = "Please fill all your form."
    }
})