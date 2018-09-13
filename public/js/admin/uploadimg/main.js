// Xem hình ảnh trước khi upload
function previewImg(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('image').files; 

    // Show khung chứa ảnh xem trước
    $('#formUpload .box-preview-img').show();

    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < 1; i++)
    {
    	// Thêm thẻ img theo i
        $('#formUpload .box-preview-img').append('<img style="margin:10px 0px" width = "100%" src="" id="' + i +'">');

        // Thêm src vào mỗi thẻ img theo id = i
        $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    } 

    // Nút reset form upload
    $('#formUpload .btn-reset').on('click', function() {
        // Làm trống khung chứa hình ảnh xem trước
        $('#formUpload .box-preview-img').html('');

        // Hide khung chứa hình ảnh xem trước
        $('#formUpload .box-preview-img').hide();
    });
}
