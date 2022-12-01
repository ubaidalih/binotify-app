function addSubscription(creator_id, subscriber_id) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };
  var params = "creator_id=" + creator_id + "&subscriber_id=" + subscriber_id;
  xhr.open(
    "POST",
    "http://localhost/binotify-app/public/Addsubscription/index",
    true
  );
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(params);
}
