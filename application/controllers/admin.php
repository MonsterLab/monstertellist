<?php
    class Admin extends CI_Controller {

       public function __construct(){
            parent::__construct();

            $this->load->model('M_article','article');
            $this->load->model('M_user','user');

            $this->load->helper('url');
        } 

        public function index(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );
            $this->load->view('admin/index',$data);
        }

        public function insert(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );

            if($_POST){
                var_dump($_POST);

                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $groupId = trim($_POST['groupId']);

                $this->article->setTitle($title);
                $this->article->setContent($content);
                $this->article->setGroupId($groupId);
                var_dump($this->article);
                $result = $this->article->insert();
                if($result){
                    echo 'operate success!';
                } else {
                    echo 'operate fail!';
                }
            }

            $this->load->view('admin/insert',$data);
        }

        public function delete(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );

            $tid = $this->uri->segment(3,0);
            $this->article->setTid($tid);
            $this->article->delete();
            $this->load->view('admin/delete',$data);
        }

        public function update(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );

            if($_POST){
                $tid = trim($_POST['tid']);
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $groupId = trim($_POST['groupId']);

                $this->article->setTid($tid);
                $this->article->setTitle($title);
                $this->article->setContent($content);
                $this->article->setGroupId($groupId);
                $result = $this->article->update();

                $tid = $this->uri->segment(3,0);
                $this->article->setTid($tid);
                $value = $this->article->search();
                $data['value'] = $value;

                echo $result;
                $this->load->view('admin/update',$data);
            } else {
                $tid = $this->uri->segment(3,0);
                $this->article->setTid($tid);
                $value = $this->article->search();
                $data['value'] = $value;

                $this->load->view('admin/update',$data);
            }
        }

        public function search(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );
            if($_POST){
                $keyword = trim($_POST['title']);
                $this->article->setTitle($keyword);
                $result = $this->article->search();
                $data['result'] = $result;

                $this->load->view('admin/search',$data);
            } else {
                $this->load->view('admin/search',$data);
            }
        }

        public function import(){
            //csv 格式导入
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );
            $this->load->view('admin/import',$data);
        }

        public function outport(){
            $url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $data = array(
                'url' => $url
            );
            $this->load->view('admin/outport',$data);
        }

        public function login(){
            if($_POST){
                $username = trim($_POST['username']);
                $password = trim($_POST['userpassword']);

                $this->user->setUsername($username);
                $this->user->setPassword($password);
                var_dump($this->user->login());
            } else {
                $this->load->view('admin/login');
            }
        }

        public function test(){
     
	    var_dump($this->user);
        }
    }
?>



