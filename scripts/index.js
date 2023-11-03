$(document).ready(function(){
    $(document).on('click', '.menu-toggle', function() {
        $('.menu').slideToggle();
    });

    $(window).resize(function() {
        var width = $(window).width();
        if (width > 768) {
            $('.menu').show();
        } else {
            $('.menu').hide();
        }
    });

    $("header").load("header.html");
    $("footer").load("footer.html");
    
}); 