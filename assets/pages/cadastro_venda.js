$(function () {

    var valorTotal = 0;
    var shop_cart = [];

    var parameters = {
        currency: 'BRL', // If currency is not supplied, defaults to USD
        symbol: 'R$', // Overrides the currency's default symbol
        locale: 'pt_BR', // Overrides the currency's default locale (see supported locales)
        decimal: '.', // Overrides the locale's decimal character
        group: '.', // Overrides the locale's group character (thousand separator)
        pattern: '#.##0,00 !'		// Overrides the locale's default display pattern 
    }

    $("#table").dataTable();

    CKEDITOR.replace("txtObs");

    $('#txtAdd').on("click", function (evt) {
        evt.preventDefault();

        var t = $('#table').DataTable();
        if($("#txtQtdProd").val().length === 0){
            swal('Selecionar Quantidade', 'Para Prosseguir, voce deve selecionar a quantidade', 'error');
            exit;
        }
        if(!$.isNumeric( $("#txtQtdProd").val() )){
            swal('Selecionar Quantidade', 'Quantidade não Permitida', 'error');
            exit;
        }
        var qtd = parseFloat($("#txtQtdProd").val());
        $.ajax({
            url: '../../index.php/ajaxReq/getProduto/',
            method: 'POST',
            dataType: 'json',
            data: {
                produto: $("#txtAddProd").val()
            },
            success: function (data) {
                console.log(data);
                t.row.add([
                    data[0].codProduto,
                    data[0].titulo,
                    qtd,
                    OSREC.CurrencyFormatter.format(data[0].valor, {currency: 'BRL'}),
                    OSREC.CurrencyFormatter.format(qtd * data[0].valor, {currency: 'BRL'})
                ]).draw(false);

                valorTotal += (qtd * data[0].valor);

                $("#LblValorTotal").html(OSREC.CurrencyFormatter.format(valorTotal, {currency: 'BRL'}));
                $('#txtAddProd').val("");
                $('#txtQtdProd').val("");

                shop_cart.push({
                    "codProduto": data[0].codProduto,
                    "qtd": qtd,
                    "valor": data[0].valor
                });

                console.log(shop_cart);
                $("#txtLista").val(JSON.stringify(shop_cart));
                $("#txtValorTotal").val(valorTotal);

            }
        });

    });

    var optionsProdutos = {
        sourceData: function (search, success) {
            $.ajax({
                url: '../../index.php/ajaxReq/getListagemProdutos/',
                method: 'POST',
                dataType: 'json',
                data: {
                    txtAddProd: search
                },
                success: function (data) {
                    success(data);
                }
            });
        }
    };

    var optionsClientes = {
        sourceData: function (search, success) {
            $.ajax({
                url: '../../index.php/ajaxReq/getListagemClientes/',
                method: 'POST',
                dataType: 'json',
                data: {
                    txtNome: search
                },
                success: function (data) {
                    success(data);
                }
            });
        }
    };
    $('#txtAddProd').lightAutocomplete(optionsProdutos);
    $("#txtNome").lightAutocomplete(optionsClientes);

    $("#txtNome").on("blur", function () {
        $this = $(this);
        if ($this.val().length === 0) {
            $('#txtAddProd').focus();
            $this.focus();
        } else {
            $.ajax({
                url: '../../index.php/ajaxReq/getCliente/',
                method: 'POST',
                dataType: 'json',
                data: {
                    cliente: $("#txtNome").val()
                },
                success: function (data) {
                    $("#txtCPF").val(data[0].cpf);
                    $("#txtRG").val(data[0].rg);
                    $("#txtCodCliente").val(data[0].codCliente);
                }
            });
        }
    });

    $("#txtCPF").mask("000.000.000-00");

    $("#frmCadVenda").on("submit", function (e) {
        console.log(e);
        
        if($("#txtCodCliente").val().length === 0){
            e.preventDefault();
            swal('Selecionar Cliente', 'Para Prosseguir, voce deve selecionar um cliente ', 'error');
        }
        
        if($("#txtLista").val().length === 0){
            e.preventDefault();
            swal('Selecionar Produtos', 'Para Prosseguir, voce deve selecionar ulgum produto ', 'error');
        }
        
        if (e.originalEvent) {
            e.preventDefault();
            $this = $(this);
            swal({
                title: 'Desconto',
                text: "Deseja Cobrar o Valor Inteiro?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, Valor Inteiro',
                cancelButtonText: 'Não, Aplicar Desconto'
            }).then(function (result) {
                $("#frmCadVenda").submit();
            }).catch(function (err) {
                const {value: name} = swal({
                    title: 'Valor do Desconto',
                    input: 'number',
                    inputPlaceholder: 'Valor',
                    showCancelButton: true
                }).then(function (result2) {
                    $("#txtValorDesconto").val(result2);
                    var result = parseFloat($("#txtValorTotal").val());
                    swal('Desconto Aplicado', 'O Valor Total da Venda foi de ' +
                            OSREC.CurrencyFormatter.format((result - result2), {currency: 'BRL'}), 'info')
                            .then(function(data){
                                $("#frmCadVenda").submit();
                    });
                }).catch(function (err) {
                    swal('Houve Um Desentendimento', 'Suas respostas não batem','error');
                });
            });
        }
    });
});