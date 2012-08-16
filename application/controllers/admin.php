<?php
    class Admin extends CI_Controller {

       protected $url;
       protected $data;

       public function __construct(){
            parent::__construct();

            $this->load->model('M_article','article');
            $this->load->model('M_user','user');
            $this->load->helper('url');

            $this->url = array(
                    'index' => base_url('admin/index'),
                    'insert' => base_url('admin/insert'),
                    'delete' => base_url('admin/delete'),
                    'update' => base_url('admin/update'),
                    'search' => base_url('admin/search'),
                    'import' => base_url('admin/import'),
                    'outport' => base_url('admin/outport')
                );
            $this->data = array(
                'url' => $this->url
            );
        } 

        public function index(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }

            $this->load->view('admin/index',$this->data);
        }

        public function insert(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }

            if($_POST){
                $title = trim($_POST['title']);
                $content = trim($_POST['content']);
                $groupId = trim($_POST['groupId']);

                $this->article->setTitle($title);
                $this->article->setContent($content);
                $this->article->setGroupId($groupId);
                $result = $this->article->insert();
                
                if($result){
                    echo 'operate success!';
                } else {
                    echo 'operate fail!';
                }
            } else {
                $this->load->view('admin/insert',$this->data);
            }
        }

        public function delete(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }
            
            $tid = $this->uri->segment(3,0);
            $this->article->setTid($tid);
            $this->article->delete();
            $this->load->view('admin/delete',$this->data);
        }

        public function update(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }

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
                $this->data['value'] = $value;

                echo $result;
                $this->load->view('admin/update',$this->data);
            } else {
                $tid = $this->uri->segment(3,0);
                $this->article->setTid($tid);
                $value = $this->article->search();
                $this->data['value'] = $value;

                $this->load->view('admin/update',$this->data);
            }
        }

        public function search(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }
            
            if($_POST){
                $keyword = trim($_POST['title']);
                $this->article->setTitle($keyword);
                $result = $this->article->search();
                $this->data['result'] = $result;

                $this->load->view('admin/search',$this->data);
            } else {
                $this->load->view('admin/search',$this->data);
            }
        }

        public function import(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }
            
            //csv 格式导入
            $this->load->view('admin/import',$this->data);
        }

        public function outport(){
            $userPower = $this->user->checklogin();
            if($userPower <= 0){
                header("Location:login");
            }
            
            $this->load->view('admin/outport',$this->data);
        }

        public function login(){
            if($_POST){
                $username = trim($_POST['username']);
                $password = trim($_POST['userpassword']);

                $this->user->setUsername($username);
                $this->user->setPassword($password);
                $result = $this->user->login();

                if($result){
                    header("Location:index");
                } else {
                    $this->load->view('admin/login');
                }
            } else {
                $this->load->view('admin/login');
            }

        }

        public function logout(){
            $this->user->logout();
            header("Location:login");
        }

        public function test(){
     
	    var_dump($this->user);
        }
    }
?>



