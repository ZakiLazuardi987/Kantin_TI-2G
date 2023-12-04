<?php

class Pegawai_Admin extends Controller {
    public function index()
    {
        $data['title'] = 'Tambah Pegawai';

        $this->view('admin/template/header', $data);
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/pegawai/tambah_pegawai', $data);
        $this->view('admin/template/footer');
    }

}