<?php 
CLass Login extends Controller{

	protected $table_name = "tbl_user";
    protected $key_word = "mail_user";

	function index(){
	  	if(isset($_COOKIE['mail_user'])){
	  		$_SESSION["isLogin"] =  $this->model->getListById($this->table_name, $this->key_word, $_COOKIE['mail_user']);
	  		return header("location:".URL."home");
	  	}
	  	$this->setLogin();
	  	require APP . 'view/_templates/login.php';
	}
	function setLogin(){
		if(isset($_POST["btnLogin"])){
			$mail_user = $_POST["mail_user"];
			$password = md5($_POST["password"]);
			$user = $this->model->getListById($this->table_name, $this->key_word, $mail_user);
			// print_r($user);
			if(isset($user[0])){
				if($user[0]->mail_user != ""){
					if($user[0]->password == $password){
						if($user[0]->role == "1"){
							if(isset($_POST["remember"])){
								setcookie('mail_user', $mail_user, time() + (86400 * 30), "/");
							}
							$_SESSION["isLogin"] = $user;
							return header("location:".URL."home");
						}
					}
				}
			}
		}
	}
}
?>