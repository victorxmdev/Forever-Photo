<script>
    var $profilePicture = $('#profilePicture');
    $.get('./api/image.php', function(res) {
        var dataJSON = JSON.parse(res);
        $profilePicture.attr('src', "./uploads/" + dataJSON.image);
    });

    $("#imageInput").on('change', function(e){
        var target = e.target;

        var formData = new FormData();
        formData.append("imagem", target.files[0]);
        $.ajax({
            url: './api/image.php', formData, 
            data: formData,
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(data){
                if(data)
                    $profilePicture.attr('src', "./uploads/" + data);
            }
        })
    });
</script>