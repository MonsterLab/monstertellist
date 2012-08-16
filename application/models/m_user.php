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

        public function login(){
            $username = $this->getUsername();
            $password = $this->getPassword();

            echo $username.$password;

            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $sqlResult = $this->db->get('user');

            //var_dump($sqlResult->result_array());
            if($sqlResult->row_nums() > 0){
//                $_SESSION['username'] = $username;
//                $_SESSION['power'] = $sqlResult->row()->power;

                echo 'ok';
                return true;
            } else {
                echo 'bu ok!';
                return false;
            }

        }

        public function logout(){
            
        }

        public function getProfile(){

        }

        public function updateProfile(){
            
        }
    }
?>
