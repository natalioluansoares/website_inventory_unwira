<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © UNIVERSITAS KATOLIK WIDYA MANDIRA KUPANG
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/popper.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/modernizr.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/waves.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.slimscroll.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.nicescroll.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.scrollTo.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/pages/datatables.init.js"></script>

<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert.min.js"></script>
<script src="<?= base_url('assets') ?>/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets') ?>/ui/jquery-ui.min.js"></script>

<!-- App js -->
<script src="<?= base_url('assets'); ?>/js/app.js"></script>

<!-- <script src="<?= base_url('assets'); ?>/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js" type="text/javascript">
</script>

<script>
$(function() {
    $('.table-responsive').responsiveTable({
        addDisplayAllBtn: 'btn btn-secondary'
    });
});
</script> -->
<script>
$('.btn-animation').on('click', function(br) {
    //adding animation
    $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + $(this).data("animation") + '  animated');
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<script>
function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.img-preview').html(
                '<img style="width: 46%" class="img-profile card border-left-primary shadow mb-2" src="' + e
                .target.result + '"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#image').change(function() {
    previewImg(this);
});
</script>

<!-- Admin -->
<script>
$(document).ready(function() {
    $('#fakultas').change(function() {
        var fakultas_id = $('#fakultas').val();
        if (fakultas_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_fakultas",
                method: "POST",
                data: {
                    fakultas_id: fakultas_id
                },
                success: function(data) {
                    $('#jurusan').html(data);
                    $('#operator').html('<option value="">Pilih Operator</option>');
                }
            });
        } else {
            $('#jurusan').html('<option value="">Pilih Jurusan</option>');
            $('#operator').html('<option value="">Pilih Operator</option>');
        }
    });
    $('#jurusan').change(function() {
        var jurusan_id = $('#jurusan').val();
        if (jurusan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_user",
                method: "POST",
                data: {
                    jurusan_id: jurusan_id
                },
                success: function(data) {
                    $('#operator').html(data);
                    $('#kate').html('<option value="">Pilih Kategori</option>');
                }
            });
        } else {
            $('#operator').html('<option value="">Pilih Operator</option>');
            $('#kate').html('<option value="">Pilih Kategori</option>');
        }
    });
    $('#operator').change(function() {
        var operator_id = $('#operator').val();
        if (operator_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_kategori",
                method: "POST",
                data: {
                    operator_id: operator_id
                },
                success: function(data) {
                    $('#kate').html(data);
                }
            });
        } else {
            $('#kate').html('<option value="">Pilih Kategori</option>');
        }
    });

    $('#operator').change(function() {
        var ruangan_id = $('#operator').val();
        if (ruangan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_ruangan",
                method: "POST",
                data: {
                    ruangan_id: ruangan_id
                },
                success: function(data) {
                    $('#ruangan').html(data);
                }
            });
        } else {
            $('#ruangan').html('<option value="">Pilih Kategori</option>');
        }
    });

    $('#operator').change(function() {
        var barang_id = $('#operator').val();
        if (barang_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_barang",
                method: "POST",
                data: {
                    barang_id: barang_id
                },
                success: function(data) {
                    $('#barang').html(data);
                }
            });
        } else {
            $('#barang').html('<option value="">Pilih Barang</option>');
        }
    });
    $('#barang').change(function() {
        var kode_id = $('#barang').val();
        if (kode_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_kode_barang",
                method: "POST",
                data: {
                    kode_id: kode_id
                },
                success: function(data) {
                    $('#stok_barang').html(data);
                }
            });
        } else {
            $('#stok_barang').html('<option value="">Pilih Barang</option>');
        }
    });
    $('#barang').change(function() {
        var harga_barang_pinjam_id = $('#barang').val();
        if (harga_barang_pinjam_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>admin/select_harga_barang_pinjam",
                method: "POST",
                data: {
                    harga_barang_pinjam_id: harga_barang_pinjam_id
                },
                success: function(data) {
                    $('#harga_barang_pinjam').html(data);
                }
            });
        } else {
            $('#harga_barang_pinjam').html('<option value="">Harga Barang Pinjam</option>');
        }
    });

});
</script>

<!-- User -->
<script>
$(document).ready(function() {
    $('#fakultasoperator').change(function() {
        var fakultas_id = $('#fakultasoperator').val();
        if (fakultas_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>user/select_fakultas",
                method: "POST",
                data: {
                    fakultas_id: fakultas_id
                },
                success: function(data) {
                    $('#jurusanoperator').html(data);
                    // $('#operator').html('<option value="">Pilih Operator</option>');
                }
            });
        } else {
            $('#jurusanoperator').html('<option value="">Pilih Jurusan</option>');
            // $('#operator').html('<option value="">Pilih Operator</option>');
        }
    });
    // $('#jurusanoperator').change(function() {
    //     var jurusan_id = $('#jurusanoperator').val();
    //     if (jurusan_id != '') {
    //         $.ajax({
    //             url: "<?php echo base_url(); ?>user/select_jurusan",
    //             method: "POST",
    //             data: {
    //                 jurusan_id: jurusan_id
    //             },
    //             success: function(data) {
    //                 $('#operator').html(data);
    //             }
    //         });
    //     } else {
    //         $('#operator').html('<option value="">Pilih Operator</option>');
    //     }
    // });
});
</script>

<!-- Hukum -->
<script>
$(document).ready(function() {
    $('#hukumhukum').change(function() {
        var fakultas_id = $('#hukumhukum').val();
        if (fakultas_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_fakultas",
                method: "POST",
                data: {
                    fakultas_id: fakultas_id
                },
                success: function(data) {
                    $('#hukum').html(data);
                    $('#operatorhukum').html('<option value="">Pilih Operator</option>');
                }
            });
        } else {
            $('#hukum').html('<option value="">Pilih Jurusan</option>');
            $('#operatorhukum').html('<option value="">Pilih Operator</option>');
        }
    });
    $('#hukum').change(function() {
        var jurusan_id = $('#hukum').val();
        if (jurusan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_user",
                method: "POST",
                data: {
                    jurusan_id: jurusan_id
                },
                success: function(data) {
                    $('#operatorhukum').html(data);
                    $('#katehukum').html('<option value="">Pilih Kategori</option>');
                }
            });
        } else {
            $('#operatorhukum').html('<option value="">Pilih Operator</option>');
            $('#katehukum').html('<option value="">Pilih Kategori</option>');
        }
    });
    $('#operatorhukum').change(function() {
        var barang_id = $('#operatorhukum').val();
        if (barang_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_barang",
                method: "POST",
                data: {
                    barang_id: barang_id
                },
                success: function(data) {
                    $('#baranghukum').html(data);
                }
            });
        } else {
            $('#baranghukum').html('<option value="">Pilih Barang</option>');
        }
    });
    $('#operatorhukum').change(function() {
        var level_id = $('#operatorhukum').val();
        if (level_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_ruangan",
                method: "POST",
                data: {
                    level_id: level_id
                },
                success: function(data) {
                    $('#ruanganhukum').html(data);
                }
            });
        } else {
            $('#ruanganhukum').html('<option value="">Pilih Kategori</option>');
        }
    });
    $('#operatorhukum').change(function() {
        var operator_id = $('#operatorhukum').val();
        if (operator_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_kategori",
                method: "POST",
                data: {
                    operator_id: operator_id
                },
                success: function(data) {
                    $('#katehukum').html(data);
                }
            });
        } else {
            $('#katehukum').html('<option value="">Pilih Kategori</option>');
        }
    });
    $('#baranghukum').change(function() {
        var kode_id = $('#baranghukum').val();
        if (kode_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_kode_barang",
                method: "POST",
                data: {
                    kode_id: kode_id
                },
                success: function(data) {
                    $('#stok_baranghukum').html(data);
                }
            });
        } else {
            $('#stok_baranghukum').html('<option value="">Pilih Barang</option>');
        }
    });
    $('#baranghukum').change(function() {
        var harga_barang_pinjam_id = $('#baranghukum').val();
        if (harga_barang_pinjam_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>operator_fakultas/select_harga_barang_pinjam",
                method: "POST",
                data: {
                    harga_barang_pinjam_id: harga_barang_pinjam_id
                },
                success: function(data) {
                    $('#harga_barang_pinjam_fakultas').html(data);
                }
            });
        } else {
            $('#harga_barang_pinjam_fakultas').html('<option value="">Harga Barang Pinjam</option>');
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $('#barang_jurusan').change(function() {
        var kode_id = $('#barang_jurusan').val();
        if (kode_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>barang_pinjaman/select_kode",
                method: "POST",
                data: {
                    kode_id: kode_id
                },
                success: function(data) {
                    $('#stok_barang_jurusan').html(data);
                }
            });
        } else {
            $('#stok_barang_jurusan').html('<option value="">Pilih Barang</option>');
        }
    });
    $('#barang_jurusan').change(function() {
        var harga_barang_pinjam_id = $('#barang_jurusan').val();
        if (harga_barang_pinjam_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>barang_pinjaman/select_harga",
                method: "POST",
                data: {
                    harga_barang_pinjam_id: harga_barang_pinjam_id
                },
                success: function(data) {
                    $('#harga_barang_pinjam_jurusan').html(data);
                }
            });
        } else {
            $('#harga_barang_pinjam_jurusan').html('<option value="">Harga Barang Pinjam</option>');
        }
    });

});
</script>
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
var Nato = $('.flash').data('flas');
if (Nato) {
    Swal.fire({
        icon: 'success',
        title: 'Success',
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

<script type="text/javascript">
$(document).on('click', '#delete', function(e) {
    e.preventDefault();
    var nana = $(this).attr('href');


    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data akan Di Hapus !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete!',
        showClass: {
            popup: 'animate__animated animate__swing'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = nana;
        }
    })
})
</script>

<!-- Uang Kas Fakultas -->
<script>
$(document).ready(function() {
    $('#uang_fakultas').change(function() {
        var fakultas_id = $('#uang_fakultas').val();
        if (fakultas_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/uang_kas_fakultas",
                method: "POST",
                data: {
                    fakultas_id: fakultas_id
                },
                success: function(data) {
                    $('#uang_jurusan').html(data);
                    $('#uang_operator').html('<option value="">Pilih Operator</option>');
                }
            });
        } else {
            $('#uang_jurusan').html('<option value="">Pilih Jurusan</option>');
            $('#uang_operator').html('<option value="">Pilih Operator</option>');
        }
    });
    $('#uang_jurusan').change(function() {
        var jurusan_id = $('#uang_jurusan').val();
        if (jurusan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_user",
                method: "POST",
                data: {
                    jurusan_id: jurusan_id
                },
                success: function(data) {
                    $('#uang_operator').html(data);
                    $('#id_donator').html('<option value="">Jumlah Uang Jurusan</option>');
                }
            });
        } else {
            $('#uang_operator').html('<option value="">Pilih Operator</option>');
            $('#id_donator').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });
    $('#uang_operator').change(function() {
        var donator_id = $('#uang_operator').val();
        if (donator_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_uang_kas_masuk",
                method: "POST",
                data: {
                    donator_id: donator_id
                },
                success: function(data) {
                    $('#id_donator').html(data);
                }
            });
        } else {
            $('#id_donator').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $('#uang_fakultas_keluar').change(function() {
        var fakultas_id = $('#uang_fakultas_keluar').val();
        if (fakultas_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/uang_kas_fakultas",
                method: "POST",
                data: {
                    fakultas_id: fakultas_id
                },
                success: function(data) {
                    $('#uang_jurusan_keluar').html(data);
                    $('#uang_operator_keluar').html(
                        '<option value="">Pilih Operator</option>');
                }
            });
        } else {
            $('#uang_jurusan_keluar').html('<option value="">Pilih Jurusan</option>');
            $('#uang_operator_keluar').html('<option value="">Pilih Operator</option>');
        }
    });
    $('#uang_jurusan').change(function() {
        var jurusan_id = $('#uang_jurusan').val();
        if (jurusan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_user",
                method: "POST",
                data: {
                    jurusan_id: jurusan_id
                },
                success: function(data) {
                    $('#uang_operator').html(data);
                    $('#jumlah_uang').html('<option value="">Jumlah Uang Jurusan</option>');
                }
            });
        } else {
            $('#uang_operator').html('<option value="">Pilih Operator</option>');
            $('#jumlah_uang').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });
    $('#uang_operator_keluar').change(function() {
        var donator_id = $('#uang_operator_keluar').val();
        if (donator_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_uang_kas_masuk",
                method: "POST",
                data: {
                    donator_id: donator_id
                },
                success: function(data) {
                    $('#jumlah_uang').html(data);
                }
            });
        } else {
            $('#jumlah_uang').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });
    $('#uang_jurusan_keluar').change(function() {
        var jurusan_id = $('#uang_jurusan_keluar').val();
        if (jurusan_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_user",
                method: "POST",
                data: {
                    jurusan_id: jurusan_id
                },
                success: function(data) {
                    $('#uang_operator_keluar').html(data);
                    $('#perbaiki').html('<option value="">Nama Perbaiki</option>');
                }
            });
        } else {
            $('#uang_operator_keluar').html('<option value="">Pilih Operator</option>');
            $('#perbaiki').html('<option value="">Nama Perbaiki</option>');
        }
    });
    $('#uang_operator_keluar').change(function() {
        var rusak_id = $('#uang_operator_keluar').val();
        if (rusak_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_barang_rusak",
                method: "POST",
                data: {
                    rusak_id: rusak_id
                },
                success: function(data) {
                    $('#perbaiki').html(data);
                    $('#jumlah_uang_pembayaran').html(
                        '<option value="">Jumlah Uang Perbaiki</option>');
                }
            });
        } else {
            $('#perbaiki').html('<option value="">Nama Perbaiki</option>');
            $('#jumlah_uang_pembayaran').html('<option value="">Nama Perbaiki</option>');
        }
    });
    $('#perbaiki').change(function() {
        var uang_id = $('#perbaiki').val();
        if (uang_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_barang_rusak_uang",
                method: "POST",
                data: {
                    uang_id: uang_id
                },
                success: function(data) {
                    $('#jumlah_uang_pembayaran').html(data);
                }
            });
        } else {
            $('#jumlah_uang_pembayaran').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });
    $('#uang_operator_keluar').change(function() {
        var barang_id = $('#uang_operator_keluar').val();
        if (barang_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_barang",
                method: "POST",
                data: {
                    barang_id: barang_id
                },
                success: function(data) {
                    $('#transaksi_barang').html(data);
                    $('#total_transaksi').html(
                        '<option value="">Jumlah Harga Pembayaran</option>');
                }
            });
        } else {
            $('#transaksi_barang').html('<option value="">Nama Barang</option>');
            $('#total_transaksi').html('<option value="">Jumlah Harga Pembayaran</option>');
        }
    });
    $('#transaksi_barang').change(function() {
        var total_id = $('#transaksi_barang').val();
        if (total_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_fakultas/select_total_barang",
                method: "POST",
                data: {
                    total_id: total_id
                },
                success: function(data) {
                    $('#total_transaksi').html(data);
                }
            });
        } else {
            $('#total_transaksi').html('<option value="">Jumlah Harga Pembayaran</option>');
        }
    });

});
</script>
<script>
$(document).ready(function() {
    $('#transaksi').change(function() {
        var total_id = $('#transaksi').val();
        if (total_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_jurusan/select_total_barang",
                method: "POST",
                data: {
                    total_id: total_id
                },
                success: function(data) {
                    $('#totaltransaksi').html(data);
                }
            });
        } else {
            $('#totaltransaksi').html('<option value="">Jumlah Harga Pembayaran</option>');
        }
    });

    $('#perbaiki').change(function() {
        var uang_id = $('#perbaiki').val();
        if (uang_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>uang_kas_jurusan/select_barang_rusak_uang",
                method: "POST",
                data: {
                    uang_id: uang_id
                },
                success: function(data) {
                    $('#jumlahuangpembayaran').html(data);
                }
            });
        } else {
            $('#jumlahuangpembayaran').html('<option value="">Jumlah Uang Jurusan</option>');
        }
    });

});
</script>
</body>

</html>