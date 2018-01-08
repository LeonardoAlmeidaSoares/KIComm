$(function(){
    
    $("#table").dataTable();
    
    $("#btnRemove").on("click", function(evt){
    	evt.preventDefault();
    	cod = $(this).attr("cod");

    	swal({
  			title: 'Voce tem certeza?',
  			text: "Deseja excluir esse cliente?",
  			type: 'question',
  			showCancelButton: true,
  			confirmButtonColor: '#d33',
  			cancelButtonColor: '#3085d6',
 			confirmButtonText: 'Sim',
 			cancelButtonText: 'Não'
		}).then(function (result) {
            $.ajax({
                url: '../index.php/cliente/remove/',
                method: 'POST',
                dataType: 'json',
                data: {
                    codigo: cod
                },
                success: function (data) {
                    console.log(data);
                }
            });
        })
    });    
});