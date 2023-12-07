<?php

class Pengajuan_User extends Controller {
    public function index()
    {
        $data['title'] = 'Pengajuan Produk';
        $data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('user/template/header', $data);
        $this->view('user/template/navbar');
        $this->view('user/template/sidebar');
        $this->view('user/pengajuan/index', $data);
        $this->view('admin/template/footer');
        
    }
    

}