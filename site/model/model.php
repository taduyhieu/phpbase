<?php
class Model
{
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Không thể kết nối tới database');
        }
    }
    public function getLastID(){
        $sql = "SELECT id_order FROM `tbl_order` ORDER BY id_order DESC LIMIT 1 ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    public function addOrder($tbl,$data){
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
            $sql = "INSERT INTO ". $tbl . " ($field) VALUES($val)";
            $query = $this->db->prepare($sql);
            $query->execute($prepare);
            unset($prepare);
       }
    }
    public function addNew($table, $data){
       if(is_array($data)){
           $field="";
           $val="";
           $prepare = array();
           $i=0;
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
            $sql = "INSERT INTO ".$table. " ($field) VALUES($val)";
            $query = $this->db->prepare($sql);
            $query->execute($prepare);
            unset($prepare);
       }
   }
    public function update($table, $key_word, $id, $data){
        if(is_array($data)){
            $val = "";
            $i = 0;
            $prepare = array();
            foreach ($data as $key => $value) {
                if($key != "update"){
                    $i++;
                    if($i == 1){
                        $val .= $key." = ? ";
                    } else{
                        $val .= ", ".$key." = ? ";
                    }
                    $prepare[] = $value;
                }
            }
        }
        $prepare[] = ($id);
        $sql = "UPDATE $table";
        $sql .= " SET ".$val;
        $sql .= " WHERE ".$key_word."= ?";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    public function getListByIdCate($id){
        $sql = "SELECT p.name_product,p.price,p.description,p.id_product,p.id_category,i.url_image FROM tbl_product AS p, tbl_image as i WHERE id_category= ? AND i.id_product = p.id_product";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }
     public function getShop($limit)
    
    {
        $sql = "SELECT p.*,img.url_image FROM tbl_product AS p INNER JOIN tbl_image AS img ON p.id_product = img.id_product  ORDER BY rand() ASC limit ".$limit;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function delete($table,$column,$value)
    {
        $sql = "DELETE FROM $table WHERE $column = :value";
        $query = $this->db->prepare($sql);
        $parameters = array(':value' => $value);
        $query->execute($parameters);
    }

    public function login($mail,$password){
        $sql = "SELECT * FROM tbl_user WHERE mail_user = ? and password = ? LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute([$mail, $password]);
        return $query->fetchAll();
    }
    public function getOrder($id)
    {
        $sql = "SELECT * FROM tbl_order WHERE id_user = $id ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getOne($table,$column,$value)
    {
        $sql = "SELECT * FROM $table WHERE $column = :value LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':value' => $value);
        $query->execute($parameters);
        return $query->fetch();
    }

    public function laySP($id){
        $sql = "SELECT p.id_product, p.name_product, p.id_category,p.price,p.sale,p.id_brand,i.url_image,i.url_image,b.name_brand,c.name_category,p.description FROM tbl_product AS p,tbl_brand as b,tbl_image AS i, tbl_category AS c WHERE p.id_product = ? and  i.id_product = p.id_product and p.id_brand = b.id_brand";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        /*return $sql;*/
        return $query->fetch();
    }
    public function getImg($id){
        $sql = "SELECT * FROM tbl_image WHERE id_product =  ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }
    /*public function getBrand($id){
        $sql = "SELECT * FROM tbl_brand WHERE id_brand = $id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
    }*/
    public function getAmount($table,$column)
    {
        $sql = "SELECT COUNT($column) AS Among FROM $table";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch()->Among;
    }
      public function getListById($table, $key_word, $id)
    {
        $sql = "SELECT * FROM $table WHERE $key_word = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function searchItems($key_word){
        $sql = "SELECT p.name_product,p.price,p.description,p.id_product,p.id_category,i.url_image, b.name_brand FROM tbl_product AS p, tbl_image as i, tbl_brand as b WHERE i.id_product = p.id_product AND p.id_brand = b.id_brand
            AND (p.name_product LIKE ? OR b.name_brand LIKE ?)";
        $parameters = array("%".$key_word."%", "%".$key_word."%");
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function loadNumCart(){
        $num = 0;
        if(isset($_SESSION['cart'])){
            $carts = $_SESSION['cart'];
            $num=0;
            foreach ($carts as $cart) {
                $num++;
            }
        }
        return $num;
    }
}
