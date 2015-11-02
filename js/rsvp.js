function setStatus() {
	var xhttp = new XMLHttpRequest();
	var status=document.getElementById("status-text-area").value;
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     alert(xhttp.responseText);
    }
  }
  xhttp.open("GET", "setstatus.php?status="+status, true);
  xhttp.send();
	
}
function follow(username,counter) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     alert(xhttp.responseText);
     document.getElementById("button"+counter).disabled = true;
     document.getElementById("button"+counter).value="Following";
    }
  }
  xhttp.open("GET", "follow.php?username="+username, true);
  xhttp.send();
}