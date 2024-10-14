<script src="<?= base_url('assets_pinjaman/'); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets_pinjaman/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets_pinjaman/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets_pinjaman/'); ?>js/main.js"></script>
<script src="<?= base_url('assets_pinjaman/') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets_pinjaman/') ?>/sweetalert2/sweetalert.min.js"></script>
<script src="<?= base_url('assets_pinjaman/') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets_pinjaman/') ?>ui/jquery-ui.min.js"></script>


<script>
var Nato = $('.soares').data('flas');
if (Nato) {
    Swal.fire({
        icon: 'error',
        title: 'error',
        text: Nato,
        showClass: {
            popup: 'animate__animated animate__swing'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    })
}
</script>
<script>
var Nato = $('.success').data('flash');
if (Nato) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'success',
        text: Nato,
        showConfirmButton: false,
        timer: 5000
    })
}
</script>

<script type='text/javascript'>
$(document).ready(function() {

    $("#namalengkappeminjam").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>peminjam/userList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#namalengkappeminjam').val(ui.item.label); // display the selected text
            $('#iduserpeminjam').val(ui.item.value); // display the selected text
            return false;
        },
        focus: function(event, ui) {
            $("#namalengkappeminjam").val(ui.item.label);
            $("#iduserpeminjam").val(ui.item.value);
            return false;
        },
    });

});
</script>
</body>

</html>