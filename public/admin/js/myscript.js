$(document).ready(function() {
    setTimeout(function(){ 
    $('.alert').fadeOut();}, 3000); 
    $("#btn_add_img").on('click', function(){
        
        $("#append_img").append("<div class='col-md-6'><div class='form-group' class='images_detail'><label >Hình ảnh chi tiết</label><input type='file' name='images_detail[]' multiple></div></div>");
    });

    $(".view_pro").on("click", function () {
        var data_id = $(this).attr('id_pro');
        var name = $(this).parents('td').prev().prev().prev().prev().prev().prev().prev().prev().text();
        var qty = $(this).parents("tr").find('.qty').attr('qty_pro');
        var size = $(this).parents("tr").find('.size').val();
        var image = $(this).parents('td').prev().prev().prev().prev().prev().prev().prev().prev().prev().prev().children('img').attr('src');
        var color = $(this).parents("tr").find('.color').val();
        var description	 = $(this).parents("tr").find('.description').val();
        var price = $(this).parents("tr").find('.price').text();
        $.ajax({
            url: "view.php",
            type: "post",
            dataType: "html",
            data: {
                data_id: data_id,
                name : name,
                image : image,
                qty : qty,
                size: size,
                color : color,
                description : description,
                price: price
            } ,
            success: function (data) {
                $('.frame-modal').html(data);
                $('#modal-view-pro').modal();

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }


        });
    });




});