var keyword = document.getElementById('searchkey')
var container = document.getElementById('search-container')
let sorted_by_title = false
let sorted_by_date = false
let genreNow = null

keyword.addEventListener('keyup',function () {
    
    // kill sorted method
    sorted_by_date = false
    sorted_by_title = false
    genreNow = null

    // ajax object
    var xhr = new XMLHttpRequest()

    // initiate page
    let pages = 1


    // check ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200 ){
            container.innerHTML = xhr.responseText;
        }
    }
    var params = 'keyword='+keyword.value+'&page='+pages
    xhr.open('POST', 'http://localhost/binotify-app/public/Home/search', true)
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(params)
})

function goToPage(page){
    var xhr = new XMLHttpRequest()
    let pages = page

    // check ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200 ){
            container.innerHTML = xhr.responseText;
        }
    }

    var params = 'keyword='+keyword.value+'&page='+pages
    
    if(genreNow!=null){
        xhr.open('POST', 'http://localhost/binotify-app/public/Home/filter_genre/'+genreNow, true)
    }
    else if(sorted_by_date){
        xhr.open('POST', 'http://localhost/binotify-app/public/Home/dateSorted', true)
    }
    else if(sorted_by_title){
        xhr.open('POST', 'http://localhost/binotify-app/public/Home/tittleSorted', true)
    }
    else{
        xhr.open('POST', 'http://localhost/binotify-app/public/Home/search', true)
    }

    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(params)
}

function sortTitle(){
    genreNow = null
    sorted_by_date = false
    sorted_by_title = true
    goToPage(1)
}

function sortDate(){
    genreNow= null
    sorted_by_title = false
    sorted_by_date = true
    goToPage(1)
}

function filterGenre(genre){

    genreNow = genre
    goToPage(1)
}