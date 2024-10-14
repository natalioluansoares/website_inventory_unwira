<?php 

function cek_betul_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user_peminjam');
    if ($user_session) {
        redirect('transaksi');
    }
}
function cek_login_tidak_benar()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id_user_peminjam');
    if (!$user_session) {
        redirect('peminjam');
    }
}