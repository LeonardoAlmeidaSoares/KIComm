function calcularValorFinal(servico, produto, desconto, total){

    total = servico + produto - desconto;
    $("#txtValorFinalServico").val(OSREC.CurrencyFormatter.format(servico, {currency: 'BRL'}));
    $("#txtValorFinalProduto").val(OSREC.CurrencyFormatter.format(produto, {currency: 'BRL'}));
    $("#txtValorFinalDesconto").val(OSREC.CurrencyFormatter.format(desconto, {currency: 'BRL'}));
    $("#txtValorFinal").val(OSREC.CurrencyFormatter.format(total, {currency: 'BRL'}));

    $("#txtValorTotal").val(total);
    //console.log(total);
}

function getStatus(codStatus){

    $ret = "";
    
    switch(codStatus){
        case 1001: $ret = "ABERTA"; break;
        case 1002: $ret = "EM ANDAMENTO"; break;
        case 1003: $ret = "PENDENTE"; break;
    }

    return $ret;

}

function paddingNumber(value){
    var str = "" + value
    var pad = "000000"
    var ans = pad.substring(0, pad.length - str.length) + str
    return ans;
}

jQuery(function () {

    var parameters = {
        currency: 'BRL', // If currency is not supplied, defaults to USD
        symbol: 'R$', // Overrides the currency's default symbol
        locale: 'pt_BR', // Overrides the currency's default locale (see supported locales)
        decimal: '.', // Overrides the locale's decimal character
        group: '.', // Overrides the locale's group character (thousand separator)
        pattern: '#.##0,00 !'       // Overrides the locale's default display pattern 
    }

    var valorServico = 0;
    var valorProdutos = 0;
    var valorDesconto = 0;
    var valorTotal = 0;

    CKEDITOR.replace("txtDiagnostico");
    CKEDITOR.replace('txtObs');
    
    $("#tblPendencias").hide();
    $('#txtEntrada').datetimepicker();
    $('#txtPrevisaoSaida').datetimepicker();

    $("#txtCodServico").on("change", function(){
        
        var cod = $("#txtCodServico :selected").val();
        $.ajax({
            url: '../../index.php/ajaxReq/getDadosServico/',
            method: 'POST',
            dataType: 'json',
            data: {
                codigo: cod
            },
            success: function(data){
                $("#txtValorServico").val(OSREC.CurrencyFormatter.format(data[0].valor, {currency: 'BRL'}));
                valorServico = parseFloat(data[0].valor);
                calcularValorFinal(valorServico, valorProdutos, valorDesconto, valorTotal);
            }
        });

    });

    $("#txtCodProduto").on("change", function(){
        
        var cod = $("#txtCodProduto :selected").val();
        $.ajax({
            url: '../../index.php/ajaxReq/getDadosProduto/',
            method: 'POST',
            dataType: 'json',
            data: {
                codigo: cod
            },
            success: function(data){
                $("#txtValorProduto").val(OSREC.CurrencyFormatter.format(data[0].valor, {currency: 'BRL'}));
                valorProdutos = parseFloat(data[0].valor);
                calcularValorFinal(valorServico, valorProdutos, valorDesconto, valorTotal);
            }
        });

    });

    $("#txtCodFuncionario").on("change", function(){
        var cod = $("#txtCodFuncionario :selected").val();
        $.ajax({
            url: '../../index.php/ajaxReq/getPendenciasFuncionario/',
            method: 'POST',
            dataType: 'json',
            data: {
                codFuncionario: cod
            },
            success: function(data){
                $("#tblPendencias").show("slow");
                $("#tblPendencias tbody tr").remove();
                $.each(data, function(index, value){
                    console.log(data[index]);
                    $("#tblPendencias tbody").append(
                        $("<tr>").append(
                            $("<td>").html(paddingNumber(data[index].codOrdemServico))
                        ).append(
                            $("<td>").html(data[index].nome)
                        ).append(
                            $("<td>").html(data[index].data)
                        ).append(
                            $("<td>").html(getStatus(parseInt(data[index].status)))
                        )
                    );
                });
            }
        });
    });
});