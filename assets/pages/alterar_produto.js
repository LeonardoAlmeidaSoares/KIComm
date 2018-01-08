$(function(){
	$("#btnSave1").on("click", function(){

		 codProduto = $("#txtCodProduto").val();

		$.ajax({
            url: '../../../index.php/ajaxReq/updateProduto/' + codProduto,
            method: 'POST',
            dataType: 'json',
            data: {
                titulo: $("#txtNomeProduto").val(),
                codCategoria: $("#txtCodCategoria").val(),
                descricao: $("#txtDescricao").text()
            },
            success: function(data){
                alert("Passou");
            }
        });
	});

	$("#btnSave2").on("click", function(){

		 codProduto = $("#txtCodProduto").val();

		$.ajax({
            url: '../../../index.php/ajaxReq/updateProduto/' + codProduto,
            method: 'POST',
            dataType: 'json',
            data: {
                condicao: $('input[name=txtCondicao]:checked').val(),
                estoqueMinimo: $("#txtMinimo").val(),
                status: $("#txtStatus").prop('checked')?1 :0
            },
            success: function(data){
                alert("Passou");
            }
        });
	});

	$("#btnSave3").on("click", function(){

		 codProduto = $("#txtCodProduto").val();

		$.ajax({
            url: '../../../index.php/ajaxReq/updateProduto/' + codProduto,
            method: 'POST',
            dataType: 'json',
            data: {
                estoque: $('#txtEstoque').val(),
                valor: $("#txtValor").val()
            },
            success: function(data){
                alert("Passou");
            }
        });
	});

});