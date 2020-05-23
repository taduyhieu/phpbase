<?php

class Images extends Controller
{   
    protected $table_name = "tbl_image";
    protected $key_word = "id_image";

    public function index()
    {
        $images = $this->model->getList($this->table_name);
        $products = array();
        foreach($images as $image){
            $product = $this->model->getListById("tbl_product", "id_product", $image->id_product);
            $products[] = $product[0];
        }
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/images/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addImage()
    {
        $this->setAdd();
        $products = $this->model->getList("tbl_product");
        
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/images/add.php';
        require APP . 'view/_templates/footer.php';

    }

    public function setAdd(){
        if (isset($_POST["addNew"])) {
        $num = $_POST["num"];
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        $data = array();
        for($i=1;$i<=$num;$i++){
            if(isset($_FILES["image_url_".$i]) && $_FILES["image_url_".$i]["name"] !=""){
                if($_FILES["image_url_".$i]["type"] =="image/jpeg" || $_FILES["image_url_".$i]["type"]=="image/jpg" || $_FILES["image_url_".$i]["type"]=="image/png"){
                    if($_FILES["image_url_".$i]["error"]==0){
                        $locationFile = $_FILES["image_url_".$i]["tmp_name"];
                        $id_product = $_POST["id_product"];
                        $name = $_FILES["image_url_".$i]["name"];
                        $url_image= "../../public/img";
                        if(!is_dir($url_image)) {
                            mkdir($url_image);
                        }
                        $url_image.="/$name";
                        move_uploaded_file($locationFile,$url_image);
                        $status = 0;
                        if (isset($_POST["status"])) {
                            $status = $_POST["status"];
                        }
                        $data = [
                            "id_product" => $id_product,
                            "url_image" => "img/$name",
                            "status" => $status,
                        ];
                        print_r($data);
                        $this->model->addNew($this->table_name, $data);
                        
                    }
                }
            }
        }
        header('location: ' . URL . 'images');
      }
    }

    public function editImage($id)
    {
        if (isset($id)) {
            $products = $this->model->getList("tbl_product");
            $image = $this->model->getListById($this->table_name, $this->key_word, $id);
            $this->setEdit($id);

            $this->model->sessionStart();
            require APP . 'view/_templates/header.php';
            require APP . 'view/images/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'users/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            print_r($_POST);
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'images');
        }
    } 


    public function deleteImage($id)
    {
        if (isset($id)) {
            $this->model->deleteById($this->table_name, $this->key_word, $id);
        }

        header('location: ' . URL . 'images');
    }
}
?>