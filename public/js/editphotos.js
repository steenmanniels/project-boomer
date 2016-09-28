$(document).ready(function() {
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#real-dropzone", {
        url: APP_URL + "/dashboard/image/uploadphoto",
        maxFileSize: 50,
        addRemoveLinks: true,
        //more dropzone options here
    });

    var existingFiles = [
        { name: "pasfotoniels.PNG", size: 12345678 }
    ];

    for (i = 0; i < existingFiles.length; i++) {
        myDropzone.emit("addedfile", existingFiles[i]);
        //myDropzone.emit("thumbnail", existingFiles[i], "/image/url");
        myDropzone.emit("complete", existingFiles[i]);
        myDropzone.emit("thumbnail", existingFiles[i], APP_URL + "/images/full_size/pasfotoniels.PNG");
    }
});

function addImageToPreview(imageUrl)
{

}