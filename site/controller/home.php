<?php
class Home extends Controller
{
    protected $table_name1 = "tbl_category";
    protected $table_name2 = "tbl_slider";
    protected $key = "id_category";
    public function index()
    {
        $category = $this->model->getAll($this->table_name1);
        $sliders = $this->model->getAll($this->table_name2);
        $newproduct = $this->model->getShop(8);
        $featureitem = $this->model->getShop(6);
        require APP . 'view/templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/templates/footer.php';

    }
}
