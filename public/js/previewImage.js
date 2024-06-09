function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();

    reader.onload = function(){
        var dataURL = reader.result;
        var previewId = input.getAttribute('data-preview-id');
        var output = document.getElementById(previewId);
        output.src = dataURL;
        output.style.display = 'block';
    };

    reader.readAsDataURL(input.files[0]);
}
