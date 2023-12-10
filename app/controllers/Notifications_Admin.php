<?php

class Notifications_Admin extends Controller {
    public function index()
    {
        //$data['title'] = 'Home Admin';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('admin/template/header');
        $this->view('admin/template/navbar');
        $this->view('admin/template/sidebar');
        $this->view('admin/notifications/index');
        $this->view('admin/template/footer');
    }

    public function notifications()
    {
        //$data['title'] = 'Home Admin';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        $this->view('admin/notifications/detail_notif');
        
    }

}