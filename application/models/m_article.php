<?php

/*
 * @author sivacohan
 * 
 */
class M_article extends CI_Model {
    protected $tid = 0;
    protected $title = 0;       //电话号码
    protected $content = '';
    protected $groupId = 0;

    public function  __construct() {
        parent::__construct();

        $this->load->database();
    }
    
    public function setTid($_tid){
        $this->tid = $_tid;
    }

    public function setTitle($_title){
        $this->title = $_title;
    }

    public function setContent($_content){
        $this->content = $_content;
    }

    public function setGroupId($_groupId){
        $this->groupId = $_groupId;
    }

    public function getTid(){
        return $this->tid;
    }

    public function getTitle(){
        return $this->title;
    }

    public function  getContent(){
        return $this->content;
    }

    public function getGroupId(){
        return $this->groupId;
    }

    public function insert(){
        $title = $this->getTitle();
        $content = $this->getContent();
        $groupId = $this->getGroupId();

        $sqlQuery = array(
            'title' => $title,
            'content' => $content,
            'groupId' => $groupId
        );

        $result = $this->db->insert('article',$sqlQuery);

        return $result;
    }

    public function delete(){
        $tid = $this->getTid();
        $this->db->where('tid',$tid);
        $result = $this->db->delete('article');

        var_dump($result);
    }

    public function update(){
        $tid = $this->getTid();
        $title = $this->getTitle();
        $content = $this->getContent();
        $groupId = $this->getGroupId();

        $sqlQuery = array(
            'title' => $title,
            'content' => $content,
            'groupId' => $groupId
        );

        $this->db->where('tid',$tid);
        $result = $this->db->update('article',$sqlQuery);

        var_dump($result);
    }
    
    /*
     * 需要按照tid进行指定查询时，只需调用setTid()方法
     * 需要按照title或groupId查询时，需调用setTitle(),setGroup()
     * 设置了tid就不能按照title或groupid查询
     */
    public function search(){
        $tid = $this->getTid();
        $title = $this->getTitle();
        $content = $this->getContent();
        $resultT = array();                 //$resultT存储以title查询的返回值
        $resultC = array();                 //$resultC存储以content查询的返回值
        
        //tid 单项查询
        if($tid != ''){
            $this->db->where('tid',$tid);
            $sqlResult = $this->db->get('article');
            foreach($sqlResult->result_array() as $row){
                $result[] = $row;
            }
            return $result;
        }
        if($title != ''){
            $this->db->like('title',$title);
            $sqlResult = $this->db->get('article');

            foreach($sqlResult->result_array() as $row){
                $resultT[] = $row;          
            }
            $sqlResult->free_result();
        }

        if($content != ''){
            $this->db->like('content',$content);
            $sqlResult = $this->db->get('article');

            foreach($sqlResult->result_array() as $row){
                $resultC[] = $row;
            }
            $sqlResult->free_result();
        }

        if($title == '' && $content ==''){
            $sqlResult = $this->db->get('article');
            foreach($sqlResult->result_array() as $row){
                $resultC[] = $row;
            }
            $sqlResult->free_result();
        }

        $result = array_merge($resultT, $resultC);
        return $result;

    }

}

?>
