<?php


class Wards extends Controller
{   
    protected $table_name = "tbl_ward";
    protected $key_word = "id_ward";

    public function index()
    {
        $wards = $this->model->getListByLimit($this->table_name, 0);
        $limit = 0;
        $provinces = array();
        $districts = array();
        foreach($wards as $ward){
            $province = $this->model->getListById("tbl_province", "id_province", $ward->id_province);
            $district = $this->model->getListById("tbl_district", "id_district", $ward->id_district);
            $provinces[] = $province[0];
            $districts[] = $district[0];
        }
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/wards/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function list($limit)
    {
        $limit = $limit - 1;
        $wards = $this->model->getListByLimit($this->table_name, $limit);
        $provinces = array();
        $districts = array();
        foreach($wards as $ward){
            $province = $this->model->getListById("tbl_province", "id_province", $ward->id_province);
            $district = $this->model->getListById("tbl_district", "id_district", $ward->id_district);
            $provinces[] = $province[0];
            $districts[] = $district[0];
        }
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/wards/index.php';
        require APP . 'view/_templates/footer.php';
    }    
    public function addWard()
    {
        $this->setAdd();
        $provinces = $this->model->getList("tbl_province");
        
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/wards/add.php';
        require APP . 'view/_templates/footer.php';

    }
    public function setAdd(){
        if(isset($_POST["addNew"])){
            $this->model->addNew($this->table_name, $_POST);
            header('location: ' . URL . 'wards/index');
        }
    }
    public function deleteWard($id)
    {
        if (isset($id)) {
            $this->model->deleteById($this->table_name, $this->key_word, $id);
        }

        header('location: ' . URL . 'wards/index');
    }

    public function editWard($id)
    {
        if (isset($id)) {
            $ward = $this->model->getListById($this->table_name, $this->key_word, $id);
            $provinces = $this->model->getList("tbl_province");
            $districts = $this->model->getListById("tbl_district", "id_province", $ward[0]->id_province);
            $this->setEdit($id);
            
            $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
            require APP . 'view/wards/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'wards/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'wards/index');
        }
    }  
}
?>