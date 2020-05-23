<?php

class Provinces extends Controller
{   
    protected $table_name = "tbl_province";
    protected $key_word = "id_province";

    public function index()
    {
        $provinces = $this->model->getList($this->table_name);

        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/provinces/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addProvince()
    {
        $this->setAdd();
        
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/provinces/add.php';
        require APP . 'view/_templates/footer.php';

    }
    public function setAdd(){
        if(isset($_POST["addNew"])){
            $this->model->addNew($this->table_name, $_POST);
            header('location: ' . URL . 'provinces/index');
        }
    }
    public function deleteProvince($id)
    {
        if (isset($id)) {
            $this->model->deleteById($this->table_name, $this->key_word, $id);
        }

        header('location: ' . URL . 'provinces/index');
    }

    public function editProvince($id)
    {
        if (isset($id)) {
            $province = $this->model->getListById($this->table_name, $this->key_word, $id);
            $this->setEdit($id);
            
            $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
            require APP . 'view/provinces/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'provinces/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'provinces/index');
        }
    }  
}
?>