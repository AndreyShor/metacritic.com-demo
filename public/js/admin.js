function onDeleteArt(){

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var myObj = xmlhttp.responseText;
            alert(myObj);
        }
    }

    xmlhttp.open("POST", "./../../backend/router/admin-routs.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xmlhttp.send("userName=" + userName + "&" + "userPass=" + userPass + "&" + "userEmail=" + userEmail + "&" + "optionOfAction=" + option)
}