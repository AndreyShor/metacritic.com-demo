function onRegister(){
    console.log("Hello World");
    const userName = document.getElementById("name-picked").value;
    const userPass = document.getElementById("pass-picked").value;
    const userEmail = document.getElementById("email").value;
    const option = "Register"

    if(userName == "" || userPass == "" || userEmail == ""){
        console.log("You haven't entered all data")
    } else {
        
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

        xmlhttp.open("POST", "./../../backend/router/auth-routs.php");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlhttp.send("userName=" + userName + "&" + "userPass=" + userPass + "&" + "userEmail=" + userEmail + "&" + "optionOfAction=" + option)
    }

}


function onLogin(){
    const userName = document.getElementById("user").value;
    const userPass = document.getElementById("pass").value;
    const option = "Login"

    if(userName == "" || userPass == ""){
        console.log("You haven't entered all data")
    } else {
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          } else {  // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location.replace("/");
            }
        }
        xmlhttp.open("POST", "./../../backend/router/auth-routs.php");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("userName=" + userName + "&" + "userPass=" + userPass + "&" + "optionOfAction=" + option);
        console.log("Send");
    }

}

function onExit(){

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            window.location.replace("/");
        }
    }

    xmlhttp.open("GET", "./../../backend/router/auth-routs.php");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}