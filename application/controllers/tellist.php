<?php
    class Tellist extends CI_Controller{
        public function  __construct() {
            parent::__construct();
            $this->load->helper('url');
        }

        public function index(){
            $url['search'] = base_url('tellist/search');
            $url['index'] = base_url('tellist/index');
            $data = array(
                'url' => $url
            );
            $this->load->view('tellist/index',$data);
        }

        public function search(){
            $url['search'] = base_url('tellist/search');
            $url['index'] = base_url('tellist/index');
            $data = array(
                'url' => $url
            );
            $this->load->view('tellist/search',$data);
        }
    }

?>
