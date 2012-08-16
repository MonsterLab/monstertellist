<?php
    session_start();
    class M_user extends CI_Model{
        protected $uid = 0;
        protected $username = 'unknow';
        protected $password = 'none';
        protected $power = 0;


        public function __construct(){
            parent::__construct();

            $this->load->database();
        }

        public function setUid($_uid){
            $this->uid = $_uid;
        }

        public function setUsername($_username){
            $this->username = $_username;
        }

        public function setPassword($_password){
            $this->password = $_password;
        }

        public function setPower($_power){
            $this->power = $_power;
        }

        public function getUid(){
            return $this->uid;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getPower(){
            return $this->power;
        }

        public function register(){
            $username = $this->getUsername();
            $password = $this->getPassword();

            $sqlQuery = array(
                'username' => $username,
                'password' => $password
            );

            $result = $this->db->insert('user',$sqlQuery);
            return  $result;
        }

        public function checklogin(){
            $username = $_SESSION['username'];
            $power = $_SESSION['power'];

            if(!isset($power)){
                return 0;                                                       //0 is stand for not logged
            } else {
                return $power;                                                  //return user power 
            }
        }

        public function login(){
            $username = $this->getUsername();
            $password = $this->getPassword();

            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $sqlResult = $this->db->get('user');

            if($sqlResult->num_rows() > 0){
                $_SESSION['username'] = $username;
                $_SESSION['power'] = $sqlResult->row(1)->power;

                return true;
            } else {
                return false;
            }

        }

        public function logout(){
            $result = session_destroy();
            return $result;
        }

        public function getProfile(){

        }

        public function updateProfile(){
            
        }
    }
?>
