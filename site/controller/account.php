<?php
class Account extends Controller
{
    public function index()
    {
        // $a="";
        // $category = $this->model->getAll($this->table_name1);
        // if(!isset($_SESSION['user'])){
        //     $a= $this->getUser();
        // }
        $province = $this->model->getOne('tbl_province','id_province',$_SESSION['user']->province_user);
        $district = $this->model->getOne('tbl_district','id_district',$_SESSION['user']->district_user);
        $ward = $this->model->getOne('tbl_ward','id_ward',$_SESSION['user']->ward_user);
        $order = $this->model->getOrder($_SESSION['user']->id_user);
        require APP . 'view/templates/header.php';
        require APP . 'view/account/index.php';
        require APP . 'view/templates/footer.php';
    }
}
?>