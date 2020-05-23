<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getList($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getListByLimit($table, $limit)
    {
        $limit = $limit*1000;
        $sql = "SELECT * FROM $table LIMIT $limit, 1000";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getListById($table, $key_word, $id)
    {
        $sql = "SELECT * FROM $table WHERE $key_word = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function addNew($table, $data){
        if(is_array($data)){
            $field="";
            $val="";
            $prepare = array();
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                if($key !="addNew"){
                    if($i==1){
                        $field .=$key;
                        $val .=" ? ";
                    }else{
                        $field .= ','.$key;
                        $val .=", ? ";
                    }
                    $prepare[] = $value;
                }
            }
            $sql = "INSERT INTO ".$table." ($field) VALUES($val)";
            $query = $this->db->prepare($sql);
            $query->execute($prepare);
            unset($prepare);
        }
    }
    public function updateList($table, $key_word, $id, $data){
        if(is_array($data)){
            $val = "";
            $i = 0;
            $tmp = 1;
            $prepare = array();
            foreach ($data as $key => $value) {
                if($key != "updateList"){
                    $i++;
                    if($key == "status"){
                        $tmp = 0;
                    }
                    if($i == 1){
                        $val .= $key." = ? ";
                    } else{
                        $val .= ", ".$key." = ? ";
                    }
                    $prepare[] = $value;
                }
            }
            if($tmp == 1){
                $val .= ", status = '0'";
            }
        }
        $prepare[] = ($id);
        $sql = "UPDATE $table";
        $sql .= " SET ".$val;
        $sql .= " WHERE ".$key_word."= ?";
        $query = $this->db->prepare($sql);
        $query->execute($prepare);
        unset($prepare);
    }
    public function deleteById($table, $key_word, $id)
    {
        $sql = "DELETE FROM $table WHERE $key_word = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }

    public function getDetail($id){
        $sql = "SELECT od.id_order,od.amount, od.price, p.id_product, p.name_product, p.description, c.name_category, b.name_brand FROM tbl_order_detail AS od , tbl_product AS p , tbl_category AS c , tbl_brand AS b WHERE od.id_product = p.id_product AND p.id_category = c.id_category AND p.id_brand = b.id_brand AND od.id_order = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function sessionStart(){
        if(!isset($_SESSION['isLogin'])){
          header("location:".URL."login");
        }
    }
    public function Logout(){
        setcookie('mail_user', "", time() - 3600, "/");
        session_unset(); 
        session_destroy();
    }
}
