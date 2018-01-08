$(document).ready(function () {

    CKEDITOR.replace("txtDescricao");

    $('.categoria').select2();

    $("#txtNomeProduto").bind('input', function () {
        $(".escreve_nome").html($(this).val());
    });
});