$("#sortable").sortable({

        update: function() {

            let list_ids = $('#sortable').sortable('toArray');

            $.ajax({
                url: "http://localhost/sortable/recebePostSortable.php",
                data: {id_users: list_ids},
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    
                    if (data.return) {
                        $("#sortable").html(data.return);
                    }
                }

            });
        }
    });
