$(function () {
    $("#txtForm").validate({
        ignore: [],
        errorClass: 'invalid-feedback animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function (error, e) {
            jQuery(e).parents('.form-group > div').append(error);
        },
        highlight: function (e) {
            jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        },
        success: function (e) {
            jQuery(e).closest('.form-group').removeClass('is-invalid');
            jQuery(e).remove();
        },
        rules: {
            txtNome: {
                required: true,
                minlength: 6
            },
            txtEmail:{
                email: true,
                required: true
            },
            txtSenha:{
                required: true,
                minlength: 6
            },
            txtCSenha:{
                required: true,
                equalTo: "#txtSenha"
            },
            txtTelefone1:{
                required: true
            }
        },

        messages: {
            txtNome: {
                required: "Cempo Obrigatório",
                minlength: "Minimo de 6 caracteres"
            },
            txtEmail:{
                email: "Preencha um endereço de email válido",
                required: "Esse campo é obrigatório"
            },
            txtSenha:{
                required: "Campo obrigatório",
		minlength: "Sua Senha deve ter no mínimo 6 caracteres"
            },
            txtCSenha:{
                required: "Campo Obrigatório",
                equalTo: "Senhas não conferem"
            },
            txtTelefone1:{
                required: "Campo Obrigatório"
            }
        }
    });
});