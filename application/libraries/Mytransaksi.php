<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('assets/vendordompdf/autoload.php');

use Dompdf\Dompdf;

class Mytransaksi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $paper = 'Letter,Zoom', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();
        $this->ci->load->library('fungsi');
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream(($this->ci->fungsi->user_login_peminjam()->nama_lengkap_peminjam) . ".pdf", array("Attachment" => FALSE));
    }
}