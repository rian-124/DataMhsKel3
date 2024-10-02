<?php 


class Mahasiswa extends Controller{

    public function index () 
    {
        $data ['judul'] = ['Mahasiswa'];
        $data ['mhs']   = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data ['jrs']    = $this->model('jurusan_models')->getAllJurusan();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail ($id) 
    {
        $data ['judul'] = ['Detail Mahasiswa'];
        $data ['mhs']   = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah() 
    {
       if ($this->model('Mahasiswa_Model')->tambahDataMahasiswa($_POST) > 0 ) 
       {
        Flasher::setFlasher('berhasil', 'ditambahkan', 'success');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
       } else {
        Flasher::setFlasher('gagal', 'ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
       }
    }

    public function delete($id) 
    {
        if ($this->model('Mahasiswa_Model')->deleteDataMahasiswa($id) > 0) {
            Flasher::setFlasher('berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    } 

    public function getUbah () {
        echo json_encode($this->model('Mahasiswa_Model')->getMahasiswaById($_POST['id']));
    }

    public function ubah () {
        if($this->model('Mahasiswa_Model')->ubahDataMahasiswa($_POST) > 0)
        {
            Flasher::setFlasher('berhasil', 'di ubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'di ubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari() {

        $data['judul'] = 'cari';
        $data['mhs'] = $this->model('Mahasiswa_Model')->cariDataMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');


    }
}
