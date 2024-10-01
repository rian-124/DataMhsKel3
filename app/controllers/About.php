<?php 


class About extends Controller {

    public function index ($nama  = 'nama', $status = 'status', $umur = 0) {

        $data['nama'] = $nama;
        $data['status'] = $status;
        $data['umur'] = $umur;
        $this->view('templates/header');
        $this->view ('about/index', $data);
        $this->view('templates/footer');
    }
    public function page() {
        $this->view('templates/header');
        $this->view ('about/page');
        $this->view('templates/footer');
    }
}