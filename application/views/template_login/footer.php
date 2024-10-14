<!-- jQuery  -->
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/modernizr.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/waves.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.nicescroll.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert.min.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.all.min.js"></script>

<!-- App js -->
<script src="<?= base_url('assets/'); ?>js/app.js"></script>
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
</body>

</html>