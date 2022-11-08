var container = document.getElementById('pagination-container') 
function goToAlbumPage(page){
    var xhr = new XMLHttpRequest()

    // check ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200 ){
            container.innerHTML = xhr.responseText;
        }
    }
    var params = 'page='+page
    xhr.open('POST', 'http://localhost/binotify-app/public/Daftaralbum/album/'+page, true)
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(params)
}