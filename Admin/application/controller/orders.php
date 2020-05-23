<?php
class Orders extends Controller
{   
    protected $table_name = "tbl_order";
    protected $table_name2 = "tbl_order_detail";
    protected $key_word = "id_order";
    protected $key_word2 = "id_detail";

    public function index()
    {
        $orders = $this->model->getList($this->table_name);
        $users = array();
        foreach($orders as $order){
            $user = $this->model->getListById("tbl_user", "id_user", $order->id_user);
            $users[] = $user[0];
        }
        $this->model->sessionStart();
        require APP . 'view/_templates/header.php';
        require APP . 'view/orders/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function loadModal(){
        require APP . 'view/orders/order-detail.php';
    }

    public function orderDetail(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $_SESSION['orderDetail'] = $this->model->getDetail($id);
        }
    }

    public function deleteDetail()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->model->deleteById($this->table_name2, $this->key_word2, $id);
            $_SESSION['orderDetail'] = $this->model->getDetail($id);
        }
    }
    public function editOrder($id)
    {
        if (isset($id)) {
            $order = $this->model->getListById($this->table_name, $this->key_word, $id);
            $temTime = strtotime($order[0]->date_order);
            $order[0]->date_order = date("d-m-Y",$temTime);
            $user = $this->model->getListById("tbl_user", "id_user", $order[0]->id_user);
            $this->setEdit($id);
            
            $this->model->sessionStart();
            require APP . 'view/_templates/header.php';
            require APP . 'view/orders/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'orders/index');
        }
    }

    public function setEdit($id){
        if(isset($_POST["updateList"])){
            $this->model->updateList($this->table_name, $this->key_word, $id, $_POST);
            header('location: ' . URL . 'orders/index');
        }
    }  
}
?>