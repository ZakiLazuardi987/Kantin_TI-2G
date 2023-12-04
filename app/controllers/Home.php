<?php

class Home extends Controller {
    public function index()
    {
        $data['title'] = 'Home';
        //$data['data'] = $this->model('Produk_Model')->getAllProducts();

        
        $this->view('home/index', $data);
        
    }

}