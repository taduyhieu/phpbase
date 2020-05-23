<?php 
CLass Logout extends Controller{
	function index(){
		$this->model->Logout();
		header("location:login");
	}
}
?>