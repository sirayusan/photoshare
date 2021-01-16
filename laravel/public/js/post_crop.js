var $uploadCrop,
rawImg

function readFile(input, modalId, modalBodyId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(modalBodyId).addClass('ready');
            $(modalId).modal('show');
            rawImg = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$uploadCrop = $('#upload-demo').croppie({
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    showZoomer: false,
    enableResize: true,
    enableOrientation: true,
    enforceBoundary: false,
});

$('#cropImagePop').on('shown.bs.modal', function () {
    $uploadCrop.croppie('bind', {
        url: rawImg
    }).then(function () { });
});

$('.image').on('change', function () {
    imageId = $(this).data('id');
    $('#cancelCropBtn').data('id', imageId);
    readFile(this, '#cropImagePop', '#upload-demo');
    $(this).val('');
});

$('#cropImageBtn').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type:'base64',
        format: 'png',
        backgroundColor: '#fff',
    }).then(function (resp) {
        $('.image-output').attr('src', resp);
        $('#cropImage').val(resp);
        $('#cropImagePop').modal('hide');
    });
});
