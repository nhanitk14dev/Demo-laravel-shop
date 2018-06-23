$(document).on("ready", function() {
    $("#files_upload").fileinput({
        showRemove: false,
        language: COMPOSER_LOCALE,
        showClose: false,
        them: 'fa',
        uploadUrl: mediaPostUpload,
        uploadAsync: false,
        maxFileCount: 8,
        //dataType: 'json',
        //type: 'POST',
        overwriteInitial: false,
    }).on('filebatchpreupload', function(event, data) {
        var n = data.files.length, files = n > 1 ? n + ' files' : 'one file';
        if (!window.confirm("Are you sure you want to upload " + files + "?")) {
            return {
                message: "Upload aborted!", // upload error message
                data:{} // any other data to send that can be referred in `filecustomerror`
            };
        }
    });
});
