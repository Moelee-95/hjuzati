 Dropzone.autoDiscover = false;

   $(document).ready(function () {
        $("#id_dropzone").dropzone({
            maxFiles: 2000,
            url: "upload/ajax_file_upload_handler.php",
            success: function (file, response) {
                console.log(response);
            }
        });
   })