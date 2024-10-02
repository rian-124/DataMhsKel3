<?php 

class Jurusan extends Controller {
    public function index() {

        $data ['judul'] = 'Jurusan'; 
        $data ['jrs']    = $this->model('Jurusan_Models')->getAllJurusan();
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
    public function tambahJurusan() {
        if ($this->model('Jurusan_Models')->tambahDataJurusan($_POST) > 0) 
        {
            Flasher::setFlasher('berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/jurusan');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/jurusan');
        }
    }

    public function cariJurusan() 
    {
        $data ['jrs'] = $this->model('Jurusan_Models')->cariDataJurusan();
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }
}

?>