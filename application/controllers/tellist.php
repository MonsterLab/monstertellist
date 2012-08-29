<?php
    class Tellist extends CI_Controller{

        protected $url;
        protected $data;

        public function  __construct() {
            parent::__construct();

            $this->load->model('M_article','article');
            $this->load->helper('url');

            $this->url = array(
                'index' => base_url('tellist/index'),
                'search' => base_url('tellist/search')
            );
            $this->data = array(
                'url' => $this->url
            );
        }

        public function index(){
            $this->load->view('tellist/index',$this->data);
        }

        public function search(){
            if($_GET){
                $title = trim($_GET['title']);
                $content = trim($_GET['content']);

                $this->article->setTitle($title);
                $this->article->setContent($content);
                $result = $this->article->search();
                $this->data['result'] = $result;

                $this->load->view('tellist/search',$this->data);
            } else {
                $this->load->view('tellist/search',$this->data);
            }
        }
        
        public function ajaxSearch(){
            if($_GET){
                $title = trim($_GET['title']);
                $content = trim($_GET['content']);

                $this->article->setTitle($title);
                $this->article->setContent($content);
                $result = $this->article->search();
                $this->data['result'] = $result;

                $result = json_encode($result);
                echo $result;
            }
        }
    }

?>
