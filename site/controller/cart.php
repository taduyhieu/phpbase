<?php


class Cart extends Controller
{
    protected $table_name = "tbl_product";
    protected $column = "id_product";

    public function updateCart(){
        if(isset($_SESSION["cart"])){
        if(isset($_POST["id"]) && isset($_POST["quantity"])){
            $id = $_POST["id"];
            $quantity = $_POST["quantity"];
            $item = $this->model->laySP($id);
            $cart = $_SESSION["cart"];
            if($_POST["quantity"]){
                if(array_key_exists($id, $cart)){
                    echo "<pre>";
                    print_r($cart[$id]);
                    $cart[$id] = array(
                        'item'=>$item,
                        'quantity'=>$quantity
                    );
                   
                }
            }else{
                unset($cart[$id]);
            }
            $_SESSION["cart"] = $cart;
        }
    }
    }
    public function deleteCart(){

        if(isset($_POST["id"])){
            $cart = $_SESSION["cart"];
            $id = $_POST["id"];
        if(array_key_exists($id, $cart)){
            unset($cart[$id]);
            }
            $_SESSION["cart"] = $cart;
        }
    }
	public function addCart(){
		if(isset($_POST['id'])){
            $id = $_POST['id'];
            $item = $this->model->laySP($id);
			if(!isset($_SESSION["cart"])){
            $cart[$id] = array(
                'item'=>$item,
                'quantity'=>1
            );
            }else{
                $cart = $_SESSION["cart"];
                if(array_key_exists($id, $cart)){
                    $cart[$id] = array(
                        'item'=>$item,
                        'quantity'=>$cart[$id]['quantity'] +1
                    );
                }else{
                    $cart[$id] = array(
                        'item'=>$item,
                        'quantity'=>1
                    );
                }
            }
            $_SESSION["cart"] = $cart;
        }   
	}
    public function thanhtoan(){
        
    }
	
    public function index()
    {
      
        require APP . 'view/templates/header.php';
        require APP . 'view/cart/index.php';
        require APP . 'view/templates/footer.php';
    }
}
