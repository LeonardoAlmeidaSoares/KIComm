$(function () {

    $("#txtVencimento").mask("99/99/9999");
    $("#txtValor").mask('000.000.000.000.000,00', {reverse: true});

    $("#txtNome").on("change", function () {
        var cod = $("#txtNome :selected").text();
        $.ajax({
            url: '../../index.php/ajaxReq/getCliente/',
            method: 'POST',
            dataType: 'json',
            data: {
                cliente: cod
            },
            success: function (data) {
                valor = data[0];
                $("#txtEmail").val(valor.email);
                $("#txtCpf").val(valor.cpf);
                $("#txtRg").val(valor.rg);
                $("#txtcodCliente").val(valor.codCliente);
                $("#txtTelefone1").val(valor.telefone_1);
                $("#txtTelefone2").val(valor.telefone_2);
            }
        });
    });

    $("#frmCad").on("submit", function(evt){
        
        if(evt.originalEvent){
            evt.preventDefault();
            swal({
                title: 'Pagamento',
                text: "Pagamento A Vista?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            }).then(function (result) {
                $("#txtPagamentoAVista").val(1);
                $("#frmCad").submit();
            }).catch(function(err){
                $("#txtPagamentoAVista").val(0);
                $("#frmCad").submit();
            });

        }
    });

});