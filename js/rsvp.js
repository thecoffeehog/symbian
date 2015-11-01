function updateRsvp(rsvp) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("yes").innerHTML = xhttp.responseText;
    }
  }
  xhttp.open("POST", "updatersvp.php?rsvp="+rsvp, true);
  xhttp.send();
}