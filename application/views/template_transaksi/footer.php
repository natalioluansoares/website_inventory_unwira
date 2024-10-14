<footer id="footer" class="section footer">
    <div class="container">
        <div class="footer-container">
            <div class="footer-center">
                <h3>EXTRAS</h3>
                <a href="#">Brands</a>
                <a href="#">Specials</a>
                <a href="#">Site Map</a>
            </div>
            <div class="footer-center">
                <h3>INFORMATION</h3>
                <a href="<?= base_url('transaksi/about')?>">About Us</a>
                <a href="<?= base_url('transaksi/rule')?>">Rules Transaction</a>
                <a href="#">Contact Us</a>
            </div>
            <div class="footer-center">
                <h3>MY ACCOUNT</h3>
                <a href="" data-bs-toggle="modal" data-bs-target="#kembali">My Account</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#profile">Edit Profile</a>
                <a href="#">Order History</a>
            </div>
            <div class="footer-center">
                <h3>CONTACT US</h3>
                <div>
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    42 Dream House, Dreammy street, 7131 Dreamville, USA
                </div>
                <div>
                    <span>
                        <i class="far fa-envelope"></i>
                    </span>
                    company@gmail.com
                </div>
                <div>
                    <span>
                        <i class="fas fa-phone"></i>
                    </span>
                    456-456-4512
                </div>
                <div>
                    <span>
                        <i class="far fa-paper-plane"></i>
                    </span>
                    Dream City, USA
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<div class="modal fade" id="kembali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <section class="section">
            <div class="testimonial-center container">
                <div class="testimonial">
                    <span>&ldquo;</span>
                    <p>
                        <b>Jenis Kelamin :</b> <?=$this->fungsi->user_login_peminjam()->jenis_kelamin; ?>, <b>Nomor
                            KTP :</b> <?=$this->fungsi->user_login_peminjam()->nomor_ktp; ?>, <b>Nomor Whatsapp :</b>:
                        <?=$this->fungsi->user_login_peminjam()->nomor_whatsapp; ?>
                    </p>
                    <div class="img-cover">
                        <img src="<?= base_url('assets_transaksi/');?>images/kampus.png" alt="" />
                    </div>
                    <h4><?=$this->fungsi->user_login_peminjam()->nama_lengkap_peminjam; ?></h4>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-3" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transaksi/edit_profile'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-control fs-4 text-center">Nama
                                    Lengkap</label>
                                <input type="text" class="form-control text-center fs-4"
                                    value="<?=$this->fungsi->user_login_peminjam()->nama_lengkap_peminjam; ?>"
                                    class="form-control fs-4" readonly>
                                <input type="hidden" class="form-control text-center fs-4"
                                    value="<?=$this->fungsi->user_login_peminjam()->id_user_peminjam; ?>"
                                    class="form-control fs-4" name="id_user_peminjam" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kata Sandi</label>
                                        <input type="password" class="form-control fs-4" name="kata_sandi_baru"
                                            class="form-control fs-4" placeholder="Kata Sandi" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Konfirmasi Kata
                                            Sandi</label>
                                        <input type="password" class="form-control fs-4" name="konfirmasi_kata_sandi"
                                            class="form-control fs-4" placeholder="Konfirmasi Kata Sandi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-control fs-4 text-center">Nomor Whatsapp</label>
                                        <input type="text" class="form-control text-center fs-4" name="nomor_whatsapp"
                                            placeholder="Nomor Whatsapp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary fs-5">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Footer -->

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<!-- Custom Script -->
<script src="<?= base_url('assets_transaksi/');?>js/index.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/fontawesome.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/fontawesome.min.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/regular.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/regular.min.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/solid.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/solid.min.js"></script>
<script src="<?= base_url('assets_transaksi/');?>js/jquery-3.7.0.min.js"></script>
<script src="<?= base_url(); ?>assets_transaksi/ckeditores/ckeditor4/ckeditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
</script>

<script src="<?= base_url('assets_transaksi/') ?>sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets_transaksi/') ?>sweetalert2/sweetalert.min.js"></script>
<script src="<?= base_url('assets_transaksi/') ?>sweetalert2/sweetalert2.all.min.js"></script>

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
</body>

</html>