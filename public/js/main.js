$(document).ready(function () {

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // $('.shot-img').attr('src', e.target.result);
                $('.shot-img').css({
                    'background': 'url(' + e.target.result + ')',
                    'background-size': 'contain',
                    'background-position': 'center center',
                    'background-repeat': 'no-repeat'
                });
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function() {
        readURL(this);
    });

})