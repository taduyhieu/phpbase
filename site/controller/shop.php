<?php
class Shop extends Controller
{
    protected $key = "id_image";
    protected $table_name = "tbl_category";

    public function unsetShop(){
        unset($_SESSION['shop']);
    }
    public function getList(){
        if (isset($_POST['id'])) {
            unset($_SESSION['shop']);
            $_SESSION['shop'] = $this->model->getListByIdCate($_POST['id']);
        }
    }
    public function index()
    {
        $category = $this->model->getAll($this->table_name);
        if(!isset($_SESSION['shop'])){
            $_SESSION['shop'] = $this->model->getShop(9);
        }
        require APP . 'view/templates/header.php';
        require APP . 'view/Shop/index.php';
        require APP . 'view/templates/footer.php';
        // if(!isset($_SESSION['isSearch'])){
        //     unset($_SESSION['shop']);
        // }
    }
}
