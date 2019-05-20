$("#sortable").sortable({
        update: function() {
            var lista = $('#sortable').sortable('toArray');
            $.ajax({
                url: "http://localhost/seuprojeto/home/ordersortable",
                data: {usuarios: lista},
                type: 'POST',
                dataType: 'json',
                beforeSend: function(data) {

                },
                success: function(data) {
                    if (data.retorno) {
                        $("#sortable").html(data.retorno);
                    }

                }

            });
        }
    });
