<?php  
	class checkout extends Controller
	{
		public function addOrder(){
			$subtotal=0;
			foreach ($_SESSION['cart'] as $key => $value) {
						$total =  $value['item']->price*$value['quantity'];
						$subtotal += $total;
					}
			$data = array(
			"id_user" => $_SESSION['user']->id_user,
			"total" => 	$subtotal,
			"date_order" => date("y/m/d") ,
			"name_receiver" => $_POST['name_receive'],
			"address_receiver" => $_POST['address_receive'],
			"phone_receiver" => $_POST['phone_receive'],
			"status" => 1
			);
			$result = $this->model->addOrder("tbl_order",$data);
		}
		public function addOrderDetail(){
			$id_order = $this->model->getLastID();
			foreach ($_SESSION['cart'] as $key => $value) {
				$data = array(
					"id_order" => $id_order->id_order,
					"id_product" => $value['item']->id_product,
					"amount" =>  $value['quantity'],
					"price" => $value['item']->price,
					"status" => 1
			);
			$result = $this->model->addOrder("tbl_order_detail",$data);
		}
	}
		public function index(){
			$ward = $this->model->getOne("tbl_ward","id_ward",$_SESSION['user']->ward_user);
			$district = $this->model->getOne("tbl_district","id_district",$_SESSION['user']->district_user);
			$province = $this->model->getOne("tbl_province","id_province",$_SESSION['user']->province_user);
				if(isset($_POST["checkout"])){
					$this->addOrder();
					$this->addOrderDetail();
					unset($_SESSION['cart']);
					echo "<script> alert('Đặt hàng thành công!');
					window.location.href = '".URL."account' </script>";
				}
			require APP . 'view/templates/header.php';
			require APP . 'view/checkout/index.php';
			require APP . 'view/templates/footer.php';
		}
	}
?>