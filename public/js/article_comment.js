var request = new XMLHttpRequest();


document.getElementById("submit_comment").addEventListener('click', function(e){
    e.preventDefault();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id');

    var comment_text = document.getElementById("comment_text").value;
    var action='add_comment'

    if (document.getElementById('rating_5').checked) {
        rate_value = document.getElementById('rating_5').value;
    }

    if (document.getElementById('rating_4').checked) {
        rate_value = document.getElementById('rating_4').value;
    }

    if (document.getElementById('rating_3').checked) {
        rate_value = document.getElementById('rating_3').value;
    }

    if (document.getElementById('rating_2').checked) {
        rate_value = document.getElementById('rating_2').value;
    }

    if (document.getElementById('rating_1').checked) {
        rate_value = document.getElementById('rating_1').value;
    }



    var formData = new FormData();
    formData.append('option', action);
    formData.append('aricle_id', id);
    formData.append('comment_rating', rate_value);
    formData.append('comment_text', comment_text);

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            // window.location.href = "http://localhost/public/view/admin.php";
            var myObj = request.responseText;
            alert(myObj);
        }
    }
    
    request.open("POST", './../../backend/router/user-routs.php', true);
    request.send(formData);
    console.log("send")

    
}, false)