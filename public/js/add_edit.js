var form = document.querySelector('form');

var request = new XMLHttpRequest();

request.upload.addEventListener('load', function(e){
    console.log("hello")
}, false);

form.addEventListener('submit', function(e){
    e.preventDefault();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const option = urlParams.get('option');

    if(option == "editArt"){

        const id = urlParams.get('id');
        
        var e = document.getElementById("genres");
        var genre = e.options[e.selectedIndex].value;


        var formData = new FormData(form);
        formData.append('option', option);
        formData.append('id', id);
        formData.append('genre', genre);
    } 

    if(option == "editUser"){

        const id = urlParams.get('id');
        
        var formData = new FormData(form);
        formData.append('option', option);
        formData.append('id', id);
    } 

    if(option === null){
        var action='addArt'
        var e = document.getElementById("genres");
        var genre = e.options[e.selectedIndex].value;

        var formData = new FormData(form);
        formData.append('option', action);
        formData.append('genre', genre);
    }

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            window.location.href = "http://localhost/public/view/admin.php";
        }
    }
    
    request.open("POST", './../../backend/router/admin-routs.php', true);
    request.send(formData);


    
}, false)