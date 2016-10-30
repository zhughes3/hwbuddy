
$(document).ready(function(){
    var files;

    $('input[type=file]').on('change', prepareUpload);
    function prepareUpload(event){
      files = event.target.files;
    };
    $(':button').click(function(){
        var formData = new FormData();
        $.each(files, function(key, value){
            formData.append(key, value);
        });
        alert(formData);
        $.ajax({
            url: 'saveFile.php',  
            type: 'POST',
            data: formData,
            success:function(data){
                                    $('body').html(data);
                                }, 
            cache: false,
            contentType: false,
            processData: false
        });
    });
});