<?php
class ProductDetails extends Controller
{
	protected $table_name1 = "tbl_category";
	protected $table_name2 = "tbl_product";
	protected $table_name3 = "tbl_brand";
    protected $table_name4 = "tbl_image";
	protected $column1 = "id_product";
	protected $column2 = "id_brand";
	protected $column3 = "id_category";
    public function index()
    {
    	$category = $this->model->getAll($this->table_name1);
    	if(isset($_GET['id'])){
    		$id = $_GET['id'];
    		/*$productdetail = $this->model->getOne($this->table_name2,$this->column1,$val);
    		$value = $productdetail->id_brand;
    		$getImg = $this->model->getImg($productdetail->id_product);
            $getImg = $this->model->getOne($this->table_name4,$this->column1,$productdetail->id_product);
    		$brand =  $this->model->getOne($this->table_name3,$this->column2,$value);*/
            $productdetail = $this->model->laySP($id);
    		$cate =  $this->model->getOne($this->table_name1,$this->column3,$productdetail->id_category);
    		$related = $this->model->getShop(3);
        require APP . 'view/templates/header.php';
        require APP . 'view/product-detail/index.php';
        require APP . 'view/templates/footer.php';
    	}
    	
    }
}
