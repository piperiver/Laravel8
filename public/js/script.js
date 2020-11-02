$(document).on('click', '.logo-upload', function(){
    let input = document.getElementById('logo');

    input.onchange = ({ target }) => {
        $('#logo-view').hide();
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
            document.getElementById("logo-view").src = e.target.result;
            $('#logo-view').fadeIn();
        });
        FR.readAsDataURL(target.files[0]);
    };

    input.click();
})
