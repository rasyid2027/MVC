$(function() {

    $('.addDataButton').on('click', function() {

        $('#titleModal').html('Add Member Data');
        $('.modal-footer button[type=submit]').html('Add data');
        $('.modal-body form')[0].reset();

    });

    $('.showEditModal').on('click', function() {
        
        $('#titleModal').html('Edit Member Data');
        $('.modal-footer button[type=submit]').html('Edit data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/member/editData');

        const id = $(this).data('id');
        
        $.ajax({
            type: "post",
            url: "http://localhost/phpmvc/public/member/edit",
            data: {
                id : id
            },
            dataType: "json",
            success: function(data) {
                $("#name").val(data.name);
                $("#no_member").val(data.no_member);
                $("#email").val(data.email);
                $("#region").val(data.region);
                $("#id").val(data.id);
                // console.log(data);
            }
        });

    });

});