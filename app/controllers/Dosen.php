<?php 


class Dosen extends Controller {

    public function index ($nama  = 'nama', $status = 'status', $umur = 0) {

        $data['nama'] = $nama;
        $data['status'] = $status;
        $data['umur'] = $umur;
        $this->view('templates/header');
        $this->view ('dosen/index', $data);
        $this->view('templates/footer');
    }
}