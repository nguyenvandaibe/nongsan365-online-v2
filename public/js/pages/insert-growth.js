$(document).ready(function () {

    $('#productGrowthPhotos').on('change', function () {

        previewPhotos(this, 'div.gallery');
    })
});

function previewPhotos(input, photoPlaceholder) {

    if (input.files) {

        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img>'))
                    .attr('src', event.target.result).appendTo(photoPlaceholder)
                    .attr('width', '120px')
                    .attr('height', '120px')
                    .attr('class', 'py-3 pr-3');
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
}
