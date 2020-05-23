<?php

class Districts extends Controller
{   
    protected $table_name = "tbl_district";
    protected $key_word = "id_district";

    public function index()
    {
        $districts = $this->model->getList($this->table_name);
        $provinces = array();
        foreach($districts as $district){
            $province = $this->model->getListById("tbl_province", "id_province", $district->id_province);
            $provinces[] = $province[0];
        }


        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/districts/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function addDistrict()
    {
        $this->setAdd();
        $provinces = $this->model->getList("tbl_province");
        
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/districts/add.php';
        require APP . 'view/_templates/footer.php';

    }
    public function setAdd(){
        if(isset($_POST["addNew"])){
            $this->model->addNew($this->table_name, $_POST);
            header('location: ' . URL . 'districts/index');
        }
    }
    public function deleteDistrict($id)
    {
        if (isset($id)) {
            $this->model->deleteById($this->table_name, $this->key_word, $id);
        }

        header('location: ' . URL . 'districts/index');
    }

    public function editDistrict($id)
    {
        if (isset($id)) {
            $district = $this->model->getListById($this->table_name, $this->key_word, $id);
            $provinces = $this->model->getList("tbl_province");
            $this->setEdit($id);
            
            $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
            require APP . 'view/districts/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'districts/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'districts/index');
        }
    }  
}
?>