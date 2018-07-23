$('#file-es').fileinput({
    theme: 'fa',
    language: 'es',
    uploadUrl: '#',
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    overwriteInitial: false,
    maxFileSize: 2000,
    maxFilesNum: 10,
    uploadAsync: false,
    showUpload: false,
    showUploadedThumbs: false,
    previewClass: false,
});
$('#summary').summernote({
    height: 200,
});
$('#description').summernote({
    height: 200,
});
$('.select2').select2({
    tags: true,
    placeholder: "Seleccione una opción",
});

function showListSubcategory(subcategoryid) {
    $('.ul-subcategory' + subcategoryid).toggle();
}
$('.select2').select2({
    tags: true,
    placeholder: "Seleccione una opción",
});

$("#form-product").on('submit', function(event) {
    event.preventDefault();
    var $form = $(this);
    var $button = $form.find("[type='submit']");
    var $url = $form.attr('action');
    var $icon = $form.find("#icon");
    var formData = new FormData(document.getElementById('form-product'));
    formData.append("dato", "valor");

    $.ajax({
        url: $form.attr('action'),
        method: $form.attr('method'),
        data: formData,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            setTimeout(() => {
                $icon.removeClass('fa-save');
                $icon.addClass('fa-spinner fa-spin fa-fw');
            }, 100);
        },
        success: function(data) {
            $.notify({ message: data.response }, { type: 'success' });

        },
        error: function(data) {
            if (data.status == 422) {
                $.each(data.responseJSON.errors, function(key, value) {
                    $icon.removeClass('fa-spinner fa-spin fa-fw');
                    $icon.addClass('fa-save');
                    $('.' + key).append(value);
                    $("#" + key).addClass('is-invalid');
                    $('.alert-danger').show();
                    $('.errors').append(value + "<br>");
                    $('html,body').scrollTop(0);

                });
            }
        }
    });

});

$('input[type="text"], input[type="number"], select, textarea').click(function() {
    if ($(this).find('.is-invalid')) {
        $(this).removeClass('is-invalid');
    }
});


function getProductImages(id) {
    data = JSON.parse(id);
    initialPreview = [];
    initialPreviewConfig = [];
    $.each(data, function(key, value) {
        initialPreview.push(`/images/products/${value.url}`);
    });
    $.each(data, function(index, val) {
        initialPreviewConfig.push({
            type: "image",
            caption: val.name,
            url: `/api/product-image/${val.id}/delete`,
            key: val.id,
            extra: { _token: $("[name='_token']").val() }
        });
    });

    $("#file-es-2").fileinput({
        theme: 'fa',
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        maxFileSize: 2000,
        maxFilesNum: 10,
        uploadAsync: false,
        initialPreviewAsData: true,
        initialPreview,
        initialPreviewConfig,
        deleteExtraData: { _token: $("[name='_token']").val() }

    }).on("filebeforedelete", function(jqXHR) {
        return !confirm("¿Esta seguro de eliminar esta imagen?")
    }).on("filedeleted", function(event, key, jqXHR, data) {
        $.notify({ message: 'Imagen eliminada' }, { type: 'success' });
    });

}

$(document).ready(function() {
    $('#btn-start').trigger("click");
})