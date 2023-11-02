$(document).ready(function(){
    var selectedStyle = '';
    var selectedColor = '';

    function updateMainImage() {
        if(selectedColor) {
            var newImageSrc = `./img/sunny_socks_photos/catalogus/Sunny_socks_${selectedStyle}${selectedColor}.jpg`;
            $(".purchaseImage img").attr("src", newImageSrc);
        }
        
    
    }

    // Listener for style change
    $('input[type="radio"][name="style"]').change(function(){
        if ($(this).attr('id') == 'solid') {
            selectedStyle = 'uni_';
        } else {
            selectedStyle = '';
        }   
        updateMainImage();
    });

    // Listener for color change
    $('input[type="radio"][name="colour"]').change(function(){
        selectedColor = $(this).attr('id');
        updateMainImage();
    });
});
